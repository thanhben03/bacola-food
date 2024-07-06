<?php

namespace App\Http\Controllers;

use App\Helper\Helper;
use App\Models\Banner;
use App\Models\BillingAddress;
use App\Models\Category;
use App\Models\Config;
use App\Models\Product;
use App\Models\Slider;
use App\Models\WeekendDiscount;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    use Helper;

    public function __construct()
    {
        // dd(Auth::user()->id);
        $configs = Config::first();
        $categories = Category::withCount('products')->get();

        View::share([
            'config' => $configs,
            'categories' => $categories,
            'cart_session' => null
        ]);
    }
    public function index()
    {
        // cart session
        $cart_session = session()->get('cart') ? session()->get('cart') : null;
    // dd($cart_session);
        // dd(gettype($cart_session));
        $banners = Banner::where('status', 1)->get();
        $weekend_discounts = WeekendDiscount::where('status', 1)->take(2)->get();
        $sliders = Slider::where('status', 1)->get();
        $trending_product1 = Product::where('trending_product', '=', 1)->take(5)->get();
        $products = Product::get();
        $trending_product = $this->filterProduct($products, 'trending_product');
        $best_sellers = $this->filterProduct($products, 'best_seller');
        $hot_product = DB::table('hot_product')
            ->join('products', 'hot_product.product_id', '=', 'products.id')
            ->first();
            // dd($hot_product->end_day);
        $hot_product->end_day = $this->convertDateNonZero($hot_product);
        $new_products = Product::orderBy('created_at', 'desc')->take(8)->get();
        $isHome = true;

        // $count_categories = Category::withCount('products')->get();
        // dd($count_categories);
        return view('client.home', compact('isHome', 'weekend_discounts', 'hot_product', 'new_products', 'sliders', 'banners', 'trending_product', 'best_sellers', 'cart_session'));
    }

    public function filterProduct($products, $type)
    {
        return array_filter($products->toArray(), function ($product) use ($type) {
            return $product[$type];
        });
    }

    public function convertDateNonZero($product)
    {
        return Carbon::parse($product->end_day)->format('Y-n-j');
    }

    public function account()
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }
        return view('client.account');
    }

    public function myAccount()
    {
        // dd(Auth::user()->default_address_user);
        if (!Auth::check()) {
            return redirect()->route('account');
        }
        return view('client.my-account', [
            'component' => 'default'
        ]);
    }

    public function editAddress()
    {
        // $user_id = Auth::user()->id;
        // dd(Auth::user()->string_default_address);
        // 
        // $billing_address = Auth::user()->bill
        // dd($billing_address->string_shp);
        return view('client.my-account', [
            'component' => 'edit-address',
            // 'billing_address' => $billing_address
        ]);
    }

    public function showEditBilling()
    {
        $user_id = Auth::user()->id;
        $billing_address = BillingAddress::where([
            ['user_id', $user_id],
            ['default_address', 0]
        ])->firstOrNew();
        // dd($billing_address);
        return view('client.my-account', [
            'component' => 'billing',
            'billing_address' => $billing_address
        ]);
    }

    public function editBilling(Request $request)
    {
        $payload = $request->all();
        // dd($payload);


        $user_id = Auth::user()->id;
        $currentBilling = BillingAddress::where([
            ['user_id', $user_id],
            ['default_address', 0],
        ])->first();

        try {
            $currentBilling->fill($payload);
            $currentBilling->save();
            return redirect()->back()->with('msg', 'Update success!');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors([
                'error' => 'There are some error while updating !'
            ]);
        }
    }

    public function showEditDefaultAddress()
    {
        $user_id = Auth::user()->id;
        $default_address = BillingAddress::where([
            ['user_id', $user_id],
            ['default_address', 1]
        ])->firstOrNew();
        // dd($default_address->first_name);
        return view('client.my-account', [
            'default_address' => $default_address,
            'component' => 'default-address',
        ]);
    }

    public function editDefaultAddress(Request $request)
    {
        $payload = $request->all();
        $user_id = Auth::user()->id;
        $currentBilling = BillingAddress::where([
            ['user_id', $user_id],
            ['default_address', 1],
        ])->first();

        try {
            $currentBilling->fill($payload);
            $currentBilling->save();
            return redirect()->back()->with('msg', 'Update success!');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors([
                'error' => 'There are some error while updating !'
            ]);
        }
    }

    public function showEditAccount()
    {
        return view('client.my-account', [
            'component' => 'edit-account',
            'user' => Auth::user()
        ]);
    }
}
