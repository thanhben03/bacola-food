<?php

namespace App\Http\Controllers;

use App\Helper\Helper;
use App\Models\BillingAddress;
use App\Models\Category;
use App\Models\Config;
use App\Models\CreateCart;
use App\Models\Order;
use Exception;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class OrderController extends Controller
{
    use Helper;
    // protected $cart_session = null;
    public function __construct()
    {
        $config = Config::first();
        $categories = Category::get();
        View::share([
            'config' => $config,
            'categories' => $categories,
            'cart_session' => null,
        ]);
        // dd($this->cart_session);
    }

    public function checkOrder()
    {
        // return $this->getColumnNameTable('payments');
        $cart_session = $this->getCartSession();
        if (!$cart_session) {
            return redirect()->route('cart.view');
        }
        $billing_address = BillingAddress::where([
            ['user_id', Auth::user()->id],
            ['default_address', 0]
        ])->first();
        return view('client.order', [
            'billing_address' => $billing_address,
            'cart_session' => $this->getCartSession()
        ]);
    }

    public function create(Request $request)
    {
        $cart_session = session()->get('cart') ? session()->get('cart') : null;
        // dd($cart_session);
        $counpon_id = isset($cart_session->counpon) ? $cart_session->counpon['counponModel']->id : null;
        // dd(1);
        $dataOrder = [
            'user_id' => Auth::user()->id,
            'shipping_cost' => $cart_session->ship_cost,
            'payment_method' => 'banking',
            'status' => 1,
            'order_notes' => $request->order_notes,
            'counpon_id' => $counpon_id,
            'total_price' => $cart_session->totalPrice
        ];
        // dd($dataOrder);
        session()->put('dataOrder', $dataOrder);
        return redirect()->route('payment.view');
    }

    public function histories()
    {
        $orders = Order::where('user_id', Auth::user()->id)->withCount('item')->get();
        // dd($orders[0]->products);
        return view('client.my-account', [
            'orders' => $orders,
            'component' => 'order-history'
        ]);
    }

    public function viewHistory($order_id)
    {
        try {
            $order = Order::where([
                'user_id' => Auth::user()->id,
                'id' => $order_id
            ])->first();
            return view('client.my-account', [
                'order' => $order,
                'component' => 'view-history'
            ]);

        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

}
