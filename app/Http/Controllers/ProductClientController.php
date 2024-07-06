<?php

namespace App\Http\Controllers;

use App\Helper\TraitResponseMessage;
use App\Models\Category;
use App\Models\Config;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\SubCategory;
use Faker\Core\Number;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ProductClientController extends Controller
{
    use TraitResponseMessage;
    protected $categories;
    public function __construct()
    {
        $configs = Config::first();
        $this->categories = Category::get();
        View::share([
            'config' => $configs,
            'categories' => $this->categories
        ]);
    }
    public function viewProduct($slug)
    {
        $cart_session = session()->get('cart') ? session()->get('cart') : null;
        $categories = Category::withCount('products')->get();
        $product = Product::where('slug', $slug)->first();
        $category_id = $product->category[0]->id;
        $related_products = ProductCategory::with('product')
            ->where('category_id', $category_id)
            ->get();
        $randomProducts = Product::inRandomOrder()->limit(5)->get();
        // dd($related_products[0]->product);
        return view('client.view-product', [
            'product' => $product,
            'categories' => $categories,
            'related_products' => $related_products,
            'randomProducts' => $randomProducts,
            'cart_session' => $cart_session,
        ]);
    }

    public function showAllProduct()
    {
        $brands =  $this->getBrandInArrayProducts(Product::all());
        $categories = $this->categories;
        // dd($categories);
        return view('client.all-product', [
            'categories' => $categories,
            'brands' => $brands
        ]);
    }

    public function productCategory($category, $subcategory = null)
    {
        $cart_session = session()->get('cart') ?: null;
        $request = request();
        $limit = 6;

        $getCategory = Category::where('slug', $category)->first();
        if ($subcategory) {
            // dd($subcategory);
            $products = $this->getProductsBySubCategory($subcategory);
        }
        else if (!$subcategory && $category) {
            $products = Product::whereHas('category', function ($query) use ($getCategory) {
                $query->where('category_id', $getCategory->id);
            });
        } else {
            $display = str_replace('-','_',$request->query('display')) ?: null;
            $products = $this->getDisplayProducts($display);
            // dd($products)
            // dd($products->get());


        }
        $priceSelect = $maxPrice = $this->formatMaxPrice($products->max('price'));
        // search product
        if ($request->has('s')) {
            $s = $request->query('s');
            $products = $this->getProductsBySearch($s);
        }

        if ($request->has('maxprice')) {
            $priceSelect = $priceFilter = $this->formatMaxPrice($request->query('maxprice'));
            $products = $this->filterByPrice($priceFilter, $getCategory, $products);
        }

        // filter by brand
        if ($request->has('brand')) {
            $brandSelect = $request->query('brand');
            $brandSelect = explode(',', $brandSelect);
            $products = $this->filterByBrand($brandSelect, $products);
            session()->put('brandSelect', $brandSelect);
        }

        // filter by orderby
        if ($request->has('orderby')) {
            $orderby = $request->query('orderby');
            $products = $this->filterOrderBy($orderby, $products);
            // $selectedFilter['orderbySelect'] = $orderby;
        }

        // limit perpage
        if ($request->has('show')) {
            $limit = intval($request->query('show'));
        }

        $categories = $this->categories;

        $brands = $this->getBrandInArrayProducts($products);
        $products = $products->paginate($limit);
        $step = $this->getStepForPrice($maxPrice);
        // dd($maxPrice);
        return view('client.all-product', [
            'categories' => $categories,
            'category' => $category,
            'subcategory' => $subcategory,
            'brands' => $brands,
            'maxPrice' => $maxPrice,
            'products' => $products,
            // 'selectedFilter' => $selectedFilter
            'priceSelect' => $priceSelect,
            'step' => $step,
            'cart_session' => $cart_session
        ]);
    }

    public function getDisplayProducts($display)
    {

        return $display != null ? Product::where($display, 1) : Product::where('id','>=', 1);
    }

    public function formatMaxPrice($maxPrice)
    {

        return round($maxPrice, -6);
    }

    public function getStepForPrice($maxPrice)
    {
        $step = 0;
        $length = strlen($maxPrice);
        switch ($length) {
            case '6':
                $step = 10000;
                break;
            case '7':
            case '8':
            case '9':
                $step = 1000000;
                break;
            default:
                break;
        }
        return $step;
    }

    public function getProductsBySubCategory($subcategory)
    {
        $getSubcategory = SubCategory::where('slug', $subcategory)->first();
        $products = Product::join('product_categories', 'products.id', '=', 'product_categories.product_id')
            ->where('product_categories.subcategory_id', $getSubcategory->id);

        return $products;
    }

    public function getProductsBySearch($keyword)
    {
        return Product::where('title', 'like', '%'.$keyword.'%');
    }

    public function getBrandInArrayProducts($products)
    {
        $brands = new Collection();
        $productsByBrand = $products->get()->groupBy('brand');

        foreach ($productsByBrand as $product) {
            $brands[] = [
                'brand' => $product->first()->brand,
                'count' => $product->count()
            ];
        }
        return $brands;
    }

    // public function getAllBrandOfProducts($products)
    // {
    //     $brands = new Collection();
    //     $productsByBrand = $products->get()->groupBy('brand');
    //     // dd($products)
    //     foreach ($productsByBrand as $product) {
    //         $brands[] = [
    //             'brand' => $product->first()->brand,
    //             'count' => $product->count()
    //         ];
    //     }
    //     return $brands;
    // }

    public function filterByPrice($maxprice, $getCategory, $products)
    {
        $query = $products->where(
            'price',
            '<=',
            $maxprice
        );

        return $query;
    }

    public function filterByBrand($brand, $products)
    {
        $query = $products->whereIn('brand', $brand);

        return $query;
    }

    public function filterOrderBy($orderby, $products)
    {
        $colunm = $type = '';

        if ($orderby == 'date') {
            $colunm = 'updated_at';
            $type = 'DESC';
        }
        if ($orderby == 'price') {
            $colunm = 'price';
            $type = 'ASC';
        }
        if ($orderby == 'price-desc') {
            $colunm = 'price';
            $type = 'DESC';
        }

        $products = $products->orderBy($colunm, $type);
        return $products;
    }

    public function limitPerPage($limit, $products)
    {
        return $products->limit($limit);
    }

    
}
