<?php

namespace App\Http\Controllers;

error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
date_default_timezone_set('Asia/Ho_Chi_Minh');
// use Faker\Core\Number;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    protected $config;

    public function __construct()
    {
        $startTime = date("YmdHis");
        $expire = date('YmdHis', strtotime('+15 minutes', strtotime($startTime)));
        $this->config = [
            'vnp_TmnCode' => 'CLSYSBRO',
            'vnp_HashSecret' => 'GTZJGJDORAQSKHKHHGTVLJGYHAWQGSOB',
            'vnp_Url' => 'https://sandbox.vnpayment.vn/paymentv2/vpcpay.html',
            'vnp_Returnurl' => route('payment.return'),
            'vnp_apiUrl' => 'http://sandbox.vnpayment.vn/merchant_webapi/merchant.html',
            'apiUrl' => "https://sandbox.vnpayment.vn/merchant_webapi/api/transaction",
            'startTime' => $startTime,
            'expire' => $expire
        ];
        // dd($this->config);
    }
    public function pay()
    {
        $cart_session = session()->get('cart') ? session()->get('cart') : null;
        try {
            $amount = $cart_session->totalPrice;
            return view('client.pay', [
                'amount' => $amount
            ]);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function createPay(Request $request)
    {
        // dd($request->amount);
        // dd(intval($request->all()));
        try {
            $this->config['amount'] = $request->amount;
            $this->config['language'] = $request->language;
            $this->config['bankCode'] = $request->bankCode;
            $vnp_TxnRef = rand(1, 10000); //Mã giao dịch thanh toán tham chiếu của merchant
            $vnp_Amount = $request->amount; // Số tiền thanh toán
            $vnp_Locale = $this->config['language']; //Ngôn ngữ chuyển hướng thanh toán
            $vnp_BankCode = $this->config['bankCode']; //Mã phương thức thanh toán
            $vnp_IpAddr = $_SERVER['REMOTE_ADDR']; //IP Khách hàng thanh toán
            $inputData = array(
                'vnp_Version' => '2.1.0',
                'vnp_TmnCode' => $this->config['vnp_TmnCode'],
                'vnp_Amount' => $vnp_Amount * 100,
                'vnp_Command' => 'pay',
                'vnp_CreateDate' => date('YmdHis'),
                'vnp_CurrCode' => 'VND',
                'vnp_IpAddr' => $vnp_IpAddr,
                'vnp_Locale' => $vnp_Locale,
                'vnp_OrderInfo' => "Thanh toan GD:$vnp_TxnRef",
                'vnp_OrderType' => 'other',
                'vnp_ReturnUrl' => $this->config['vnp_Returnurl'],
                'vnp_TxnRef' => $vnp_TxnRef,
                'vnp_ExpireDate' => $this->config['expire'],
            );
            if (isset($vnp_BankCode) && $vnp_BankCode != '') {
                $inputData['vnp_BankCode'] = $vnp_BankCode;
            }

            ksort($inputData);
            $query = '';
            $i = 0;
            $hashdata = '';
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashdata .= '&' . urlencode($key) . '=' . urlencode($value);
                } else {
                    $hashdata .= urlencode($key) . '=' . urlencode($value);
                    $i = 1;
                }
                $query .= urlencode($key) . '=' . urlencode($value) . '&';
            }

            $vnp_Url = $this->config['vnp_Url'] . '?' . $query;
            if (isset($this->config['vnp_HashSecret'])) {
                $vnpSecureHash = hash_hmac('sha512', $hashdata, $this->config['vnp_HashSecret']); //
                $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
            }

            return redirect($vnp_Url);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function payReturn(Request $request)
    {
        try {
            $dataOrder = session()->get('dataOrder') ?: null;
            $order = Order::create($dataOrder);
            $data_return = $request->all();
            if ($order->wasRecentlyCreated) {
                // order duoc tao moi
                $this->savePayment($data_return, $order->id);
            }
            return view('client.pay-return', [
                'config' => $this->config,
            ])->with('msg', 'GD Thành Công !');
        } catch (\Throwable $th) {
            return view('client.pay-return', [
                'config' => $this->config,
            ])->with('msg', $th->getMessage());
        }
    }

    public function savePayment($data, $order_id)
    {
        // dd($data);
        $result = $data['vnp_ResponseCode'] == 00 ? true : false;
        try {
            Payment::create([
                'order_code' => $data['vnp_TxnRef'],
                'order_id' => $order_id,
                'amount' => $data['vnp_Amount'],
                'content' => $data['vnp_OrderInfo'],
                'vnpay_code' => $data['vnp_TransactionNo'],
                'bank_code' => $data['vnp_BankCode'],
                'result' => $result,
            ]);
        } catch (\Throwable $th) {
            return '123';
            return $th->getMessage();
        }
    }
}
