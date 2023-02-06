<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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





//Admin Routes
Route::group(['namespace' => 'Admins'],function(){
	Route::get('admin/home','HomeController@index')->name('admin.home');
	Route::resource('admin/categories','CategoryController');
	Route::resource('admin/products','ProductController');
	Route::get('admin/orders','OrderController@index')->name('admin.order');
	Route::get('admin/customer','CustomerController@user')->name('admin.customer');
	Route::get('admin/login', 'Auth\LoginController@showLoginForm')->name('admin.login');
	Route::post('admin/login', 'Auth\LoginController@login')->name('admin.login_account');
});


Auth::routes();
Route::get('/', 'WelcomePageController@welcomePage')->name('welcome.page');
// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/about',function(){
	return view('about');
});
Route::get('/contact',function(){
	return view('contact');
});
Route::get('/product-detail/{id}', 'ProductController@productDetail')->name('product.detail');
Route::get('/all-product', 'ProductController@index')->name('all.product');
Route::get('/categories/products/{id}', 'ProductController@productByCategory')->name('product.by.category');
Route::post('/add-to-cart','CartController@addToCart')->name('customer.add.to.cart');
Route::get('/view-cart','CartController@viewCart')->name('customer.view.cart');
Route::put('/update-cart/{id}','CartController@updateCart')->name('customer.update.cart');
Route::delete('/remove-cart/{id}','CartController@removeCart')->name('customer.remove.cart');
Route::get('/callback', 'ConfirmOrderController@callback')->name('callback');
Route::get('/user/{id}', 'Auth\AuthController@getUser')->name('customer.get.info');

// forgot password
Route::get('forgot-password','Auth\ForgotPasswordController@forgotPassword')->name('forgot-password');
Route::get('forgot-password/{token}','Auth\ForgotPasswordController@forgotPasswordValidate');
Route::post('forgot-password','Auth\ForgotPasswordController@resetPassword')->name('forgot-password');
Route::put('reset-password','Auth\ChangePasswordController@updatePassword')->name('reset-password');
Route::put('update-account/{id}','Auth\AuthController@updateAccount')->name('update-account');

// setting
Route::get('setting','SettingController@index')->name('setting');