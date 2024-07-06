<?php

namespace App\Http\Controllers;

use App\Helper\TraitResponseMessage;
use App\Models\Category;
use App\Models\Config;
use App\Models\CreateCart;
use App\Models\Product;
use App\Models\ProductWishList;
use Error;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View as FacadesView;
// use Illuminate\View\View;

class ProductWishListController extends Controller
{
    use TraitResponseMessage;
    public function __construct()
    {
        $config = Config::first();
        $categories = Category::all();
        FacadesView::share([
            'config' => $config,
            'categories' => $categories,
            'cart_session' => null
        ]);
    }
    public function view()
    {
        $user_id = Auth::user()->id;
        $wishlists = ProductWishList::where('user_id', $user_id)->get();
        if ($wishlists->count() == 0) {
            $wishlists = null;
        }

        return view('client.wish-list', [
            'wishlists' => $wishlists
        ]);
    }
    public function add($product_id)
    {
        $product = Product::where('id', $product_id);
        if ($product == null) {
            return $this->responseError('Product is not found');
        }
        $user_id = Auth::user()->id;
        try {
            $wishLists = ProductWishList::firstOrCreate([
                'product_id' => $product_id
            ], [
                'user_id' => $user_id
            ]);

            return $this->responseSuccess('Add product to wishlist success!', $wishLists);
        } catch (\Throwable $th) {
            return $this->responseError('Add product to wishlist failed!', $th->getMessage());
        }
    }

    public function applyAction(Request $request)
    {
        $type = $request->action;
        // dd($type);
        switch ($type) {
            case 'add_to_cart_selected':
                $this->addToCart($request->productIds);
                break;
            case 'remove_selected':
                return $this->delete($request->selectedIds);
                break;
            default:
                # code...
                break;
        }
    }
    public function delete($selectedIds)
    {
        try {
            ProductWishList::whereIn('id', $selectedIds)
                            ->where('user_id', Auth::user()->id)
                            ->delete();
            return $this->responseSuccess('Delete Success!');
        } catch (\Throwable $th) {
            return $this->responseError($th->getMessage());
        }
        // $user_id = Auth::user()->id;
        // switch ($payload['type']) {
        //     case 'single':
        //         $exists_wish = ProductWishList::where('product_id', $product_id)->first();
        //         $a = 1;
        //         if ($a) {
        //             $err = new Error("error 1", 400);
        //         } else {
        //             $err = new Error("error 2", 401);
        //         }
        //         // return $err->getStatusCode();

        //         break;
        //     case 'multiple':

        //         break;
        //     case 'single':

        //         break;

        //     default:

        //         break;
        // }
    }

    public function addOne($product_id)
    {
        try {
            $product = Product::where('id', $product_id)->first();
            $old_cart = session()->get('cart') ? session()->get('cart') : null;
            $cart_session = new CreateCart($old_cart);
            $cart_session->createCart($product, $product_id);
            session()->put('cart', $cart_session);
            $this->deleteByIdProduct([$product_id]);
            return $this->responseSuccess('Add to cart success!');
        } catch (\Throwable $th) {
            return $this->responseError($th->getMessage());
            
        }
    }
    public function deleteOne($product_id)
    {
        try {
            ProductWishList::where('product_id', $product_id)->delete();
            return $this->responseSuccess('Remove Item Success!');
        } catch (\Throwable $th) {
            return $this->responseError($th->getMessage());

        }
    }
    public function addToCart($productIds)
    {
        $old_cart = session()->get('cart') ? session()->get('cart') : null;
        $cart_session = new CreateCart($old_cart);
        $productItems = Product::whereIn('id', $productIds)->get();
        try {
            $cart_session->pushMultipleCartToSession($productItems);
            session()->put('cart', $cart_session);
            $this->deleteByIdProduct($productIds);
            return $this->responseSuccess('Add to cart success!');
        } catch (\Throwable $th) {
            return $this->responseError($th->getMessage());
        }
    }

    public function deleteByIdProduct($productIds)
    {
        try {
            ProductWishList::whereIn('product_id', $productIds)->delete();
        } catch (\Throwable $th) {
            return $this->responseError($th->getMessage());
        }
    }
}
