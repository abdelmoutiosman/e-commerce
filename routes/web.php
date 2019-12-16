<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();
//scout search
use Illuminate\Http\Request;
Route::get('/search', function (Request $request) {
    $all_product=App\Models\Product::search($request->search)->paginate(1);
    return view('pages.search_result',compact('all_product'));
});

//frontend routes ===========================================================================================================================
Route::get('/', 'HomeController@index');

//route for product
//all product
Route::get('/all-products', 'HomeController@all_product');
//show product
Route::get('/view-product/{product_id}', 'HomeController@show_product');
//show product with category
Route::get('/product-by-category/{category_id}', 'HomeController@show_product_category');
//show product with brand
Route::get('/product-by-brand/{brand_id}', 'HomeController@show_product_brand');

//route for shoping cart
//show cart
Route::get('/show-cart', 'CartController@show_cart');
//add cart
Route::post('/add-to-cart', 'CartController@add_to_cart');
//delete cart
Route::get('/delete-cart/{row_id}', 'CartController@delete_cart');
//update cart
Route::post('/update-cart', 'CartController@update_cart');

//route for contact us
//show contact us
Route::get('/show-contact', 'HomeController@show_contact');
//add contact us
Route::post('/add-contact', 'HomeController@add_contact');

//route for review
Route::post('/add-review','HomeController@add_review');

//route of checkout
Route::get('/logout-customer', 'CheckoutController@logout_customer');
Route::get('/checkout', 'CheckoutController@checkout');
Route::get('/login-checkout', 'CheckoutController@login_checkout');
Route::post('/customer-registeration','CheckoutController@customer_register');
Route::post('/customer-login','CheckoutController@customer_login');
//customer account
Route::get('/customer-account/{customer_id}', 'CheckoutController@account');
Route::post('/edit-password-customer/{customer_id}', 'CheckoutController@edit_password');
Route::post('/edit-profile-customer/{customer_id}', 'CheckoutController@edit_profile');
//add shipping
Route::post('/save-shipping','CheckoutController@save_shipping');
//route of payment
Route::get('/payment', 'CheckoutController@payment');
Route::post('/order-place', 'CheckoutController@order_place');






//backend routes ============================================================================================================================
Route::get('/logout', 'SuperAdminController@logout');
Route::get('/admin', 'AdminController@index');
Route::post('/admin-dashboard', 'AdminController@dashboard');
Route::get('/dashboard', 'SuperAdminController@index');
Route::get('/forget-password', 'AdminController@forget_password');
Route::post('/update_password', 'AdminController@update_password');

//admin profile
Route::get('/edit-profile/{admin_id}', 'SuperAdminController@edit_profile');
Route::post('/update-profile/{admin_id}', 'SuperAdminController@update_profile');
//admin changepassword
Route::get('/edit-password/{admin_id}', 'SuperAdminController@edit_password');
Route::post('/update-password/{admin_id}', 'SuperAdminController@update_password');

//category related route
Route::get('/all-category', 'CategoryController@all_category');
Route::get('/add-category', 'CategoryController@index');
Route::post('/save-category', 'CategoryController@save_catgory');
Route::get('/edit-category/{category_id}', 'CategoryController@edit_category');
Route::post('/update-category/{category_id}', 'CategoryController@update_category');
Route::get('/delete-category/{category_id}', 'CategoryController@delete_category');
Route::get('/unactive-category/{category_id}', 'CategoryController@unactive');
Route::get('/active-category/{category_id}', 'CategoryController@active');

//brand related route
Route::get('/all-brand', 'BrandController@all_brand');
Route::get('/add-brand', 'BrandController@index');
Route::post('/save-brand', 'BrandController@save_brand');
Route::get('/edit-brand/{brand_id}', 'BrandController@edit_brand');
Route::post('/update-brand/{brand_id}', 'BrandController@update_brand');
Route::get('/delete-brand/{brand_id}', 'BrandController@delete_brand');
Route::get('/unactive-brand/{brand_id}', 'BrandController@unactive');
Route::get('/active-brand/{brand_id}', 'BrandController@active');

//product related route
Route::get('/all-product', 'ProductController@all_product');
Route::get('/add-product', 'ProductController@index');
Route::post('/save-product', 'ProductController@save_product');
Route::get('/delete-product/{product_id}', 'ProductController@delete_product');
Route::get('/unactive-product/{product_id}', 'ProductController@unactive');
Route::get('/active-product/{product_id}', 'ProductController@active');

//slider related route
Route::get('/all-slider', 'SliderController@all_slider');
Route::get('/add-slider', 'SliderController@index');
Route::post('/save-slider', 'SliderController@save_slider');
Route::get('/delete-slider/{slider_id}', 'SliderController@delete_slider');
Route::get('/unactive-slider/{slider_id}', 'SliderController@unactive');
Route::get('/active-slider/{slider_id}', 'SliderController@active');

//contactus related route
Route::get('/all-contact', 'ContactController@all_contact');
Route::get('/delete-contact/{contact_id}','ContactController@delete_contact');

//customer related route
Route::get('/all-customer', 'CustomerController@all_customer');
Route::get('/delete-customer/{customer_id}','CustomerController@delete_customer');
Route::get('/unactive-customer/{customer_id}', 'CustomerController@unactive');
Route::get('/active-customer/{customer_id}', 'CustomerController@active');

//order related route
Route::get('/manage-order','OrderController@manage_order');
Route::get('/delete-order/{order_id}', 'OrderController@delete_order');
Route::get('/pending-order/{order_id}', 'OrderController@pending');
Route::get('/accept-order/{order_id}', 'OrderController@accepted');
Route::get('/reject-order/{order_id}', 'OrderController@rejected');
Route::get('/view-order/{order_id}', 'OrderController@view_order');

//setting related route
Route::get('/setting-index', 'SettingController@index');
Route::post('/setting-update/{id}', 'SettingController@update');


