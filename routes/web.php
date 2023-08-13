<?php

use App\Models\Page;
use App\Models\User;
use App\Models\Brand;
use App\Models\Order;
use App\Models\Service;

use App\Models\HomeContent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AttributeController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\AdminPeopleManagement;
use App\Http\Controllers\HomeContentController;
use App\Http\Controllers\SubscribeController;

Route::get('/', function () {

    $services = Service::all();
    // $page = Page::where('slug'=>'about-us')->first();
    $page = Page::where('slug', 'about-us')->first();

    $brands = Brand::latest()->take(4)->get();
    $brand_count = Brand::count();

    $why_choose = HomeContent::where('id',1)->first();
    $contact_info = HomeContent::where('id',2)->first();
    $count_user = User::count();
    $count_order = Order::count();
    return view('frontend.layouts.home', compact('services', 'page', 'brands', 'why_choose', 'brand_count', 'count_user', 'count_order','contact_info'));
})->name('home');

Route::post('subscribe', [SubscribeController::class, 'store'])->name('subscribe');


Route::get('/user/contact', [ContactController::class, 'contact'])->name('user.contact');
Route::post('/user/contact', [ContactController::class, 'store'])->name('user.contact');



Route::get('/refund-policy', function () {
    return view('frontend.layouts.refund_policy');
})->name('refund-policy');
Route::get('/term-condition', function () {
    return view('frontend.layouts.term_condition');
})->name('term_condition');
Route::get('/privacy-policy', function () {
    return view('frontend.layouts.privacy_policy');
})->name('privacy_policy');
Route::get('/order-cancelation-policy', function () {
    return view('frontend.layouts.order_cancel_policy');
})->name('order_cancel_policy');


// coupon update by user

Route::post('coupon_used_count/{id}', [CouponController::class, 'coupon_update_by_user'])->name('coupon_used_count');

Route::get('/dashboard', function () {
    $orders = Order::where('user_id', Auth::user()->id)->get();
    return view('dashboard', compact('orders'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Service routes
Route::get('service/logo_design', [ServiceController::class, 'logo_design'])->name('logo_design');
Route::get('service/{slug}', [ServiceController::class, 'service_details'])->name('service_details');
Route::get('service/{slug}/{package}', [ServiceController::class, 'service_package_details'])->name('service_package_details');
Route::get('service_price/{slug}', [ServiceController::class, 'service_price_details'])->name('service_price_details');
Route::get('menu/service_list_menu', [ServiceController::class, 'menu_services'])->name('menu_services');
Route::post('service/portfolio_more', [PortfolioController::class, 'load_more'])->name('load_more');

// cart
Route::get('cart', [CartController::class, 'cartList'])->name('cartList');
Route::get('cart/addtocart', [CartController::class, 'addToCart'])->name('addCart');
Route::post('cart', [CartController::class, 'addToCart'])->name('addToCart');
Route::get('cart/update', [CartController::class, 'updateCart'])->name('updateCart');
Route::get('cart/remove/{id}', [CartController::class, 'removeCart'])->name('removeCart');
Route::post('cart/clear', [CartController::class, 'clearCart'])->name('clearCart');


// pages

Route::get('pages/{slug}', [PageController::class, 'pages_by_slug'])->name('page_details');
Route::get('menu/pages', [PageController::class, 'menu_pages'])->name('menu_pages');


require __DIR__ . '/auth.php';

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    Route::get('/admin/add_customer', [AdminPeopleManagement::class, 'index'])->name('admin.add_customer');
    Route::post('/admin/add_customer', [AdminPeopleManagement::class, 'user_store']);
    Route::get('/admin/user_list', [AdminPeopleManagement::class, 'user_list'])->name('admin.user_list');
    Route::get('/admin/add_package', [PackageController::class, 'package_create'])->name('admin.add_package');
    Route::post('/admin/add_package', [PackageController::class, 'package_store']);
    Route::get('/admin/edit_package/{id}', [PackageController::class, 'edit_package'])->name('admin.edit_package');
    Route::post('/admin/update_package/{id}', [PackageController::class, 'update_package'])->name('admin.update_package');
    Route::get('/admin/delete_package/{id}', [PackageController::class, 'package_delete'])->name('admin.delete_package');
    Route::get('/admin/package_list', [PackageController::class, 'package_list'])->name('admin.package_list');
    Route::get('/admin/package_attribute', [PackageController::class, 'attribute_store'])->name('admin.package_attribute');
    Route::get('/admin/add_service', [ServiceController::class, 'create_service'])->name('admin.add_service');
    Route::post('/admin/add_service', [ServiceController::class, 'store_service']);
    Route::get('/admin/edit_service/{id}', [ServiceController::class, 'edit_service'])->name('admin.edit_service');
    Route::post('/admin/update_service/{id}', [ServiceController::class, 'update_service'])->name('admin.update_service');
    Route::get('/admin/delete_service/{id}', [ServiceController::class, 'service_delete'])->name('admin.delete_service');
    Route::get('/admin/service_list', [ServiceController::class, 'service_list'])->name('admin.service_list');
    //
    Route::post('/admin/service/attributes', [ServiceController::class, 'attributes'])->name('admin.service.attributes');

    Route::get('/admin/add_attribute', [AttributeController::class, 'create'])->name('admin.create_attribute');
    Route::post('/admin/add_attribute', [AttributeController::class, 'store'])->name('admin.add_attribute');
    Route::get('/admin/edit_attribute/{id}', [AttributeController::class, 'edit'])->name('admin.edit_attribute');
    Route::post('/admin/update_attribute/{id}', [AttributeController::class, 'update'])->name('admin.update_attribute');
    Route::get('/admin/delete_attribute/{id}', [AttributeController::class, 'destroy'])->name('admin.delete_attribute');
    Route::get('/admin/attribute_list', [AttributeController::class, 'attribute_list'])->name('admin.attribute_list');




    // order

    Route::get('/admin/order_list', [OrderController::class, 'order_list'])->name('admin.order_list');
    // Route::get('/admin/make_order',[OrderController::class, 'create_order'])->name('admin.order');

    Route::post('api/fetch-packages', [OrderController::class, 'fetchPackage']);
    Route::get('admin/order/{id}', [OrderController::class, 'order_edit'])->name('admin.order_edit');
    Route::get('admin/order_details/{id}', [OrderController::class, 'order_show_admin'])->name('admin.order_show');
    Route::post('admin/order/{id}', [OrderController::class, 'order_update'])->name('admin.order_update');
    Route::get('admin/order_delete/{id}', [OrderController::class, 'order_delete'])->name('admin.order_delete');


    // portfolio

    Route::get('/admin/add_portfolio', [PortfolioController::class, 'portfolio_create'])->name('admin.add_portfolio');
    Route::post('/admin/add_portfolio', [PortfolioController::class, 'portfolio_store']);
    Route::get('/admin/edit_portfolio/{id}', [PortfolioController::class, 'portfolio_edit'])->name('admin.edit_portfolio');
    Route::post('/admin/update_portfolio/{id}', [PortfolioController::class, 'portfolio_update'])->name('admin.update_portfolio');
    Route::get('/admin/delete_portfolio/{id}', [PortfolioController::class, 'portfolio_destroy'])->name('admin.delete_portfolio');
    Route::get('/admin/portfolio_list', [PortfolioController::class, 'portfolio_list'])->name('admin.portfolio_list');

    // contact

    Route::get('/admin/contact_list', [ContactController::class, 'contact_list'])->name('admin.contact_list');
    Route::get('/admin/contact_delete/{id}', [ContactController::class, 'contact_delete'])->name('admin.contact_delete');
    Route::get('admin/contact_details/{contact}',[ContactController::class,'show'])->name('contact_show');
    Route::post('admin/contact_read/{contact}',[ContactController::class,'update'])->name('contact_read');


    //coupon

    Route::get('/admin/add_coupon', [CouponController::class, 'coupon_create'])->name('admin.add_coupon');
    Route::post('/admin/add_coupon', [CouponController::class, 'coupon_store']);
    Route::get('/admin/edit_coupon/{id}', [CouponController::class, 'coupon_edit'])->name('admin.edit_coupon');
    Route::post('/admin/update_coupon/{id}', [CouponController::class, 'coupon_update'])->name('admin.update_coupon');
    Route::get('/admin/delete_coupon/{id}', [CouponController::class, 'coupon_destroy'])->name('admin.delete_coupon');
    Route::get('/admin/coupon_list', [CouponController::class, 'coupon_list'])->name('admin.coupon_list');



    // Pages

    Route::get('/admin/add_page', [PageController::class, 'page_create'])->name('admin.add_page');
    Route::post('/admin/add_page', [PageController::class, 'page_store']);
    Route::get('/admin/edit_page/{id}', [PageController::class, 'page_edit'])->name('admin.edit_page');
    Route::get('/admin/edit_page_slug/{slug}', [PageController::class, 'page_edit_by_slug'])->name('admin.edit_page_slug');
    Route::post('/admin/update_page/{slug}', [PageController::class, 'page_update'])->name('admin.update_page');
    Route::get('/admin/delete_page/{slug}', [PageController::class, 'page_destroy'])->name('admin.delete_page');
    Route::get('/admin/page_list', [PageController::class, 'page_list'])->name('admin.page_list');



    // order file download

    Route::get('/admin/order_file_download/{id}', [OrderController::class, 'download'])->name('admin.order_file_download');


    // Brands

    Route::get('/admin/brand/create', [BrandController::class, 'create'])->name('brand_create');
    Route::post('/admin/brand/create', [BrandController::class, 'store'])->name('brand_create');
    Route::get('admin/brand/list', [BrandController::class, 'brand_backend_list'])->name('brand_list');
    Route::get('admin/brand/edit/{brand}', [BrandController::class, 'edit'])->name('brand_edit');
    Route::post('admin/brand/update/{brand}', [BrandController::class, 'update'])->name('brand_update');
    Route::get('admin/brand/delete/{brand}', [BrandController::class, 'destroy'])->name('brand_delete');

    // whyChooseUS

    Route::get('admin/content/create', [HomeContentController::class, 'create'])->name('content_create');
    Route::post('admin/content/create', [HomeContentController::class, 'store'])->name('content_create');
    Route::get('admin/content/edit/{homeContent}', [HomeContentController::class, 'edit'])->name('content_edit');
    Route::post('admin/content/update/{homeContent}', [HomeContentController::class, 'update'])->name('content_update');


    // subscriber

    Route::get('admin/subscriber/list', [SubscribeController::class, 'subscriber_list'])->name('subscriber_list');
    Route::get('admin/subscriber/delete/{subscribe}', [SubscribeController::class, 'destroy'])->name('subscriber_delete');
});

// Route::middleware(['auth', 'role:agent'])->group(function () {
//     Route::get('/agent/dashboard', [AgentController::class, 'index'])->name('agent.dashboard');
// });

// Route::get('/admin/login',[AdminController::class, 'AdminLogin'])->name('admin.login');
// Route::get('/agent/dashboard',[AgentController::class, 'index'])->name('agent.dashboard');
