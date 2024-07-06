<?php

namespace App\Models;

use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PHPUnit\Framework\Constraint\Count;

class CreateCart extends Model
{
    use HasFactory;

    public $products = null;
    public $ship_cost = 20000;
    public $ship_address = 0;
    public $subTotalPrice = 0;
    public $totalPrice = 0;
    public $totalQuantity = 0;
    public $counpon = null;
    public $current_percent_freeship = 0;
    public $remain_to_get_freeship = 0;

    public function __construct($cart = null)
    {
        if ($cart) {
            $this->products = $cart->products;
            $this->subTotalPrice = $cart->subTotalPrice;
            $this->totalPrice = $cart->totalPrice;
            $this->totalQuantity = $cart->totalQuantity;
            $this->ship_cost = $cart->ship_cost;
            $this->ship_address = $cart->ship_address;
            $this->counpon = $cart->counpon;
            $this->current_percent_freeship = $cart->current_percent_freeship;
            $this->remain_to_get_freeship = $cart->remain_to_get_freeship;
            // $this->ship_address = $cart->ship_address;
        }
    }

    public function createCart($product, $id)
    {

        $newProduct = [
            'qty' => 0,
            'price' => $product->price,
            'product_info' => $product
        ];

        if ($this->products) {
            if (array_key_exists($id, $this->products)) {
                $newProduct = $this->products[$id];
                // dd("product exitst");
            }
        }

        $newProduct['qty']++;
        $newProduct['price'] = $newProduct['qty'] * $product['price'];
        // dd($newProduct['qty'],$product['price'], $this->subTotalPrice);
        // dd($newProduct['price']);
        // dd($this->subTotalPrice, $newProduct['price']);
        $this->subTotalPrice += $product['price'];
        $this->products[$id] = $newProduct;
        $this->totalQuantity++;
        $this->checkFreeShip();
        $this->totalPrice = $this->subTotalPrice + $this->ship_cost;
    }

    public function updateCart($product_id, $action)
    {
        $currentProduct = $this->products[$product_id];
        switch ($action) {
            case 'add':
                $currentProduct['qty']++;
                $currentProduct['price'] = $currentProduct['qty'] * $currentProduct['product_info']->price;
                $this->totalQuantity++;
                $this->subTotalPrice += $currentProduct['product_info']->price;
                $this->products[$product_id] = $currentProduct;
                $this->checkFreeShip();
                $this->totalPrice = $this->subTotalPrice + $this->ship_cost;

                if ($this->counpon) {
                    // dd('1');
                    $this->updatePriceWithCounpon();
                }

                break;
            case 'minus':
                if ($currentProduct['qty'] <= 1) {
                    throw new Exception('Số lượng không thể nhỏ hơn 0');
                }
                $currentProduct['qty']--;
                $currentProduct['price'] = $currentProduct['qty'] * $currentProduct['product_info']->price;
                $this->totalQuantity--;
                $this->subTotalPrice -= $currentProduct['product_info']->price;
                $this->products[$product_id] = $currentProduct;
                $this->checkFreeShip();
                $this->totalPrice = $this->subTotalPrice + $this->ship_cost;
                if ($this->counpon) {
                    $this->updatePriceWithCounpon();
                }

                break;
            case 'remove-item':
                $this->totalQuantity -= $currentProduct['qty'];
                $this->subTotalPrice -= $currentProduct['price'];
                $this->totalPrice = $this->subTotalPrice + $this->ship_cost;
                $this->checkFreeShip();

                unset($this->products[$product_id]);
                $this->handleCounpon();
                break;
            default:
                # code...
                break;
        }
    }

    public function pushMultipleCartToSession($cartItems)
    {
        foreach ($cartItems as $item) {
            $newProduct = [
                'qty' => 1,
                'price' => $item->price,
                'product_info' => $item
            ];
            // đang làm ở đây
            $product_id = $item->id;
            $this->products[$product_id] = $newProduct;
            $this->totalQuantity += 1;
            $this->subTotalPrice += $item->price;
        }
        $this->totalPrice = $this->subTotalPrice + $this->ship_cost;
        // dd($this);
    }

    public function pushCartInDbToSession($cartItems)
    {
        $totalQuantity = 0;
        $subTotalPrice = 0;
        foreach ($cartItems as $item) {
            dd($this);
            $newProduct = [
                'qty' => $item->qty,
                'price' => $item->product->price,
                'product_info' => $item->product
            ];
            $totalQuantity += $item->qty;
            $subTotalPrice = $totalQuantity * $item->product->price;
            $product_id = $item->product->id;
            $this->products[$product_id] = $newProduct;
            $this->totalQuantity = $totalQuantity;
            $this->subTotalPrice = $subTotalPrice;
        }
        $this->totalPrice = $this->subTotalPrice;
    }

    public function applyCounpon($code)
    {
        $exits_counpon = Counpon::where('code', $code)->first();

        if (!$exits_counpon) {
            // return $this->responseError('');
            throw new Exception('Counpon không tồn tại trên hệ thống', 400);
        }

        $current_time = strtotime(Carbon::now());
        $coupon_expired = strtotime($exits_counpon->end_day);
        $expired = $current_time < $coupon_expired;
        if (!$expired) {
            throw new Exception('Counpon đã hết hạn sử dụng', 400);
        }
        if ($exits_counpon->remain == 0) {
            throw new Exception('Counpon đã hết lượt sử dụng', 400);
        }


        if ($this->counpon) {
            throw new Exception('Bạn chỉ phép sử dụng một mã giảm giá !');
        }
        $this->handleCounpon($exits_counpon);
    }

    public function updatePriceWithCounpon()
    {
        // $amount_discount = $this->counpon['amount_discount'];
        // $this->totalPrice = $this->subTotalPrice - $amount_discount;
        $this->handleCounpon();
    }

    public function handleCounpon($exits_counpon = null)
    {
        //nếu apply coupon thì $exits_counpon tồn tại và $this->counpon sẽ là null
        if ($exits_counpon == null && !$this->counpon) {
            return 0;
        }
        $exits_counpon = isset($exits_counpon) ? $exits_counpon : $this->counpon['counponModel'];
        $rate = isset($exits_counpon->rate) ? floatval($exits_counpon->rate) : $this->counpon['rate'];
        $amount_discount = ($rate / 100) * $this->subTotalPrice;
        // dd($amount_discount);

        $this->totalPrice -= intval($amount_discount);
        // dd($this->totalPrice);
        $this->counpon = [
            'code' => $exits_counpon->code,
            'counponModel' => $exits_counpon,
            'amount_discount' => $amount_discount
        ];
    }

    public function checkFreeShip()
    {
        $config = Config::first();
        $get_freeship = $config->get_freeship;
        $current_percent = $this->subTotalPrice / $get_freeship;
        $this->current_percent_freeship = $current_percent * 100;
        $this->remain_to_get_freeship = $get_freeship - $this->subTotalPrice;
        if ($this->current_percent_freeship >= 100) {
            $this->totalPrice -= $this->ship_cost;
            $this->ship_cost = 0;
            $this->current_percent_freeship = 100;
            $this->remain_to_get_freeship = 0;
        } else {
            $this->ship_cost = 20000;
        }
    }
}
