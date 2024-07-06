<?php

namespace App\Http\Controllers;

use App\Helper\Helper;
use App\Helper\TraitResponseMessage;
use App\Models\BillingAddress;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Category;
use App\Models\Config;
use App\Models\Counpon;
use App\Models\CreateCart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class CartController extends Controller
{
    use TraitResponseMessage, Helper;
    public function __construct()
    {
        View::share([
            'config' => Config::first(),
            'categories' => Category::get(),
        ]);
    }
    public function viewCart()
    {
        // dd($current_time->getTimestamp());
        $cart_session = session()->get('cart') ? session()->get('cart') : null;
        $cartItems = new Collection();
        $user_id = Auth::user()->id;
        $ship_address = Auth::user()->string_ship_address;
        $cart = Cart::where('user_id', $user_id)->first();


        $config = Config::first();
        $get_freeship = $config->get_freeship;
        // dd($cart_session);
        if ($cart && $cart_session != null) {
            $new_cart = new CreateCart();
            foreach ($cart->cart_items as $item) {
                $cartItems[] = $item->product;
            }
            $new_cart->pushCartInDbToSession($cart->cart_items);
            $new_cart->ship_cost = $cart->ship_cost;
            session()->put('cart', $new_cart);
        }
        $cart_session = session()->get('cart');

        // neu ton tai gio hang thi moi gan dia chi ship
        if (isset($cart_session)) {
            $cart_session->ship_address = $ship_address;
        }
        // dd($cart_session);
        return view('client.cart', [
            'cart_session' => $cart_session,
        ]);
    }

    public function updateCart($product_id, $action)
    {
        try {
            $product = Product::where('id', $product_id)->first();
            if (!$product) {
                return $this->responseError('Product is not found');
            }
            $old_cart = session()->get('cart') ? session()->get('cart') : null;
            $cart = new CreateCart($old_cart);
            $cart->updateCart($product_id, $action);
            $currentCart = $cart->products[$product_id];
            session()->put('cart', $cart);

            return $this->responseSuccess('Change product success!', [
                'currentCart' => $currentCart,
                'subTotalPrice' => $cart->subTotalPrice,
                'totalPrice' => $cart->totalPrice
            ]);
        } catch (\Throwable $th) {
            return $this->responseError($th->getMessage());
        }
    }

    public function addCart($product_id)
    {
        // return $this->responseSuccess('123');
        $product = Product::where('id', $product_id)->first();
        $old_cart = session()->get('cart') ? session()->get('cart') : null;
        // dd($product);
        if (!$product) {
            $this->responseError('Product is not found');
        }

        try {
            $cart = new CreateCart($old_cart);
            $cart->createCart($product, $product_id);

            session()->put('cart', $cart);

            return $this->responseSuccess('Add product to cart success', [...$cart->products[$product_id], 'subTotalPrice' => $cart->subTotalPrice]);
        } catch (\Throwable $th) {
            return $this->responseError('Add product to cart failed', $th);
        }
    }

    public function applyCounpon(Request $request)
    {
        try {
            $code = $request->counpon_code;
            // dd($code);
            $old_cart = session()->get('cart') ? session()->get('cart') : null;
            $cart = new CreateCart($old_cart);
            $cart->applyCounpon($code);
            session()->put('cart', $cart);
            $data = [
                'totalPrice' => $cart->totalPrice,
                'counpon' => $cart->counpon
            ];
            return $this->responseSuccess('Sử dụng mã thành công !', $data);
        } catch (\Throwable $th) {
            return $this->responseError($th->getMessage());
        }
    }

    public function removeItem($product_id)
    {
        try {
            $product = Product::where('id', $product_id)->first();
            if (!$product) {
                return $this->responseError('Product is not found');
            }
            $old_cart = session()->get('cart') ? session()->get('cart') : null;
            $cart = new CreateCart($old_cart);
            $cart->updateCart($product_id, 'remove-item');
            Cart::where('user_id', Auth::user()->id)->delete();
            session()->put('cart', $cart);
            if ($cart->totalQuantity == 0) {
                session()->forget('cart');
                session()->save();
            }
            return $this->responseSuccess('Remove product success!');
        } catch (\Throwable $th) {
            return $this->responseError($th->getMessage());
        }
    }

    public function deleteAllCart(Request $request)
    {

        try {
            Session::forget('cart');
            Session::save();
            return $this->responseSuccess('All products have been removed');
        } catch (\Throwable $th) {
            return $this->responseError($th->getMessage());
        }
    }

    public function changeAddressInCart(Request $request)
    {
        $payload = $request->all();
        $billing = new BillingAddress();
        $new_billing = $billing->changeAddressInCart($payload);

        return $new_billing;
    }
}
