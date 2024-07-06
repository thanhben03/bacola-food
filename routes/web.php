<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\CounponController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductClientController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductWishListController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WeekendDiscountController;
use App\Http\Middleware\CheckLogin;
use Illuminate\Support\Facades\Route;



// Account Controller
Route::post('/account/update-info', [UserController::class, 'updateInfo'])->name('account.update');
Route::post('/account/change-password', [UserController::class, 'changePassword'])->name('account.change-password');


// Home Controller
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/account', [HomeController::class, 'account'])->name('account');

Route::prefix('/my-account')->middleware('CheckLogin')->controller(HomeController::class)->name('myaccount.')->group(function () {
    Route::get('/', [HomeController::class, 'myAccount'])->name('index');
    Route::get('/edit-account', 'showEditAccount')->name('show-edit-account');
    Route::get('/edit-address', 'editAddress')->name('edit-address');
    Route::get('/edit-address/billing', 'showEditBilling')->name('show-edit-billing');
    Route::post('/edit-address/billing', 'editBilling')->name('edit-billing');
    Route::get('/edit-address/default', 'showEditDefaultAddress')->name('show-default-address');
    Route::post('/edit-address/default', 'editDefaultAddress')->name('edit-default-address');
});



// Product Client Controller
Route::get('/product/{slug}', [ProductClientController::class, 'viewProduct'])->name('product.view');
Route::get('/product', [ProductClientController::class, 'showAllProduct'])->name('product.all');
Route::get('/shop/{slug?}/{subcategory?}', [ProductClientController::class, 'productCategory'])->name('product.category');
// Route::get('/product-category/{category}/{subcategory}', [ProductClientController::class, 'productSubCategory'])->name('product.sub-category');

// Wishlist Controller

Route::prefix('wishlist')->controller(ProductWishListController::class)->middleware('CheckLogin')->name('wishlist.')->group(function () {
    Route::get('/', 'view')->name('view');
    Route::get('/add/{product_id}', 'add')->name('add');
    Route::get('/add-to-product/{product_id}', 'addOne')->name('addOne');
    Route::post('/applyAction', 'applyAction')->name('applyAction');
    Route::get('/delete-one/{product_id}', 'deleteOne')->name('deleteOne');
});

// Cart Controller

Route::prefix('cart')->controller(CartController::class)->name('cart.')->middleware('CheckLogin')->group(function () {
    Route::get('/', 'viewCart')->name('view');
    Route::post('/apply-counpon', 'applyCounpon')->name('apply-counpob');
    Route::get('/add/{product_id}', 'addCart')->name('add');
    Route::get('/update/{product_id}/{action}', 'updateCart')->name('update');
    Route::get('/remove-item/{product_id}', 'removeItem')->name('remove-item');
    Route::get('/deleteAllCart', 'deleteAllCart')->name('deleteAll');
    Route::post('/change-address', 'changeAddressInCart')->name('change-address');
});


// Order Controller
Route::get('/order', [OrderController::class, 'checkOrder'])->name('order.check');
Route::get('/my-account/histories', [OrderController::class, 'histories'])->name('order.histories');
Route::get('/my-account/view-history/{order_id}', [OrderController::class, 'viewHistory'])->name('order.view-history');
Route::post('/order', [OrderController::class, 'create'])->name('order.create');


// Payment Controller
Route::get('/payment', [PaymentController::class, 'pay'])->name('payment.view');
// Route::post('/payment', [PaymentController::class, 'pay'])->name('payment.view');
Route::post('/payment/create', [PaymentController::class, 'createPay'])->name('payment.create');
Route::get('/payment/return', [PaymentController::class, 'payReturn'])->name('payment.return');


// API
Route::resource('configs', ConfigController::class);
Route::resource('products', ProductController::class);
Route::resource('categories', CategoryController::class);
Route::resource('sub-categories', SubCategoryController::class);
Route::resource('banners', BannerController::class);
Route::resource('sliders', SliderController::class);
Route::resource('counpons', CounponController::class);
Route::resource('weekend-discounts', WeekendDiscountController::class);

Route::post('filter/price', [ProductClientController::class, 'filterByPrice']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
