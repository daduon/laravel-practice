<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admins\UserController;
use App\Http\Controllers\Admins\ProductController;
use App\Http\Controllers\Admins\CategoryController;
use App\Http\Controllers\Websites\ConfirmOrderController;
use App\Http\Controllers\Websites\HomeController;
use App\Http\Controllers\Websites\CustomerController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [UserController::class, 'index']);

Route::post('/user-store', [UserController::class, 'userPostRegistration']);

Route::get('/login', [UserController::class, 'userLoginIndex']);

Route::post('/login', [UserController::class, 'userPostLogin']);

Route::get('/dashboard', [UserController::class,'dashboard']);

Route::get('/logout', [UserController::class, 'logout'])->name('admin.logout');

// category
Route::get('/categories',[CategoryController::class,'index'])->name('admin.category');
Route::get('/categories-create',[CategoryController::class,'create'])->name('admin.category.create');
Route::post('/categories-store',[CategoryController::class,'store'])->name('admin.category.store');
Route::get('/categories-edit/{id}',[CategoryController::class,'edit'])->name('admin.category.edit');
Route::post('/categories-update/{id}',[CategoryController::class,'update'])->name('admin.category.update');
Route::delete('/categories-delete/{id}',[CategoryController::class,'destroy'])->name('admin.category.destroy');

// product
Route::get('/product',[ProductController::class,'index'])->name('admin.product');
Route::get('/product-create',[ProductController::class,'create'])->name('admin.product.create');
Route::post('/product-store',[ProductController::class,'store'])->name('admin.product.store');
Route::get('/product-edit/{id}',[ProductController::class,'edit'])->name('admin.product.edit');
Route::post('/product-update/{id}',[ProductController::class,'update'])->name('admin.product.update');
Route::delete('/product-destroy/{id}',[ProductController::class,'destroy'])->name('admin.product.destroy');
Route::get('/product-show/{id}',[ProductController::class,'show'])->name('admin.product.show');


// websites
Route::get('websites/register',[CustomerController::class,'register'])->name('website.register');
Route::get('websites/login',[CustomerController::class,'login'])->name('website.login');
Route::post('websites/create-customer',[CustomerController::class,'createCustomer'])->name('website.create_customer');
Route::post('websites/customer-login',[CustomerController::class,'customerLogin'])->name('websites.customer_login');
Route::get('websites/logout', [CustomerController::class, 'logout'])->name('website.logout');

Route::get('websites',[HomeController::class,'index'])->name('website.home');
Route::get('websites/cart',[HomeController::class,'cart'])->name('cart');
Route::get('websites/add-to-cart/{id}',[HomeController::class,'addToCart'])->name('add.to.cart');
Route::patch('websites/update-cart',[HomeController::class,'updateCart'])->name('update.cart');
Route::delete('websites/remove-from-cart',[HomeController::class,'remove'])->name('remove.from.cart');
Route::get('websites/cart/callback', [ConfirmOrderController::class,'callback'])->name('callback');

