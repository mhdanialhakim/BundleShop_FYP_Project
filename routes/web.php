<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MainPageController;
use Symfony\Component\Routing\RouteCompiler;
use App\Http\Controllers\LoginRegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('auth.login');
// });

Route::get('/',[MainPageController::class,'home']);

//loginlogout
Route::controller(LoginRegisterController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
});

//Admin Dashboard
Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

//User admin
Route::get('/index-user', [CustomerController::class, 'index'])->name('index-user');
Route::get('/formcreate-user', [CustomerController::class, 'registerform'])->name('formcreate-user');
Route::post('/register-user', [CustomerController::class, 'create'])->name('register-user');
Route::get('/show-user/{id}', [CustomerController::class, 'show'])->name('show-user');
Route::get('/editform-user/{id}', [CustomerController::class, 'editForm'])->name('editform-user');
Route::post('/edit-user/{id}', [CustomerController::class, 'update'])->name('edit-user');
Route::delete('/delete-user/{id}', [CustomerController::class, 'delete'])->name('delete-user');

//Product admin
Route::get('/index-product', [ProductController::class, 'index'])->name('index-product')->middleware('auth');
Route::get('/addform-product', [ProductController::class, 'addform'])->name('addform-product');
Route::post('/store-product', [ProductController::class, 'store'])->name('store-product');
Route::get('/show-product/{id}', [ProductController::class, 'show'])->name('show-product');
Route::get('/editform-product/{id}', [ProductController::class, 'editForm'])->name('editform-product');
Route::post('/edit-product/{id}', [ProductController::class, 'updatee'])->name('edit-product');
Route::delete('/delete-product/{id}', [ProductController::class, 'delete'])->name('delete-product');

//Order admin
Route::get('/index-order', [OrderController::class, 'index'])->name('index-order')->middleware('auth');
Route::get('/delivered/{id}', [OrderController::class, 'delivered']);
Route::get('/hold_delayed/{id}', [OrderController::class, 'hold_delayed']);
Route::get('/admin_cancel/{id}', [OrderController::class, 'admin_cancel']);
Route::get('/show-order/{id}', [OrderController::class, 'show'])->name('show-order');

//Main Page
Route::get('/home', [MainPageController::class, 'home'])->name('home');
Route::get('/shop/{grade?}', [MainPageController::class, 'shop'])->name('shop');
Route::get('/product/{id}', [MainPageController::class, 'product'])->name('product');
Route::post('/add_cart/{id}', [MainPageController::class, 'add_cart']);
Route::get('/show_cart', [MainPageController::class, 'show_cart']);
Route::get('/remove_cart/{id}', [MainPageController::class, 'remove_cart']);
Route::get('/checkout_page', [MainPageController::class, 'checkout_page']);
Route::get('/checkout_order', [MainPageController::class, 'checkout_order']);
Route::get('/confirmation', [MainPageController::class, 'confirmation']);
Route::get('/orders', [MainPageController::class, 'orders'])->name('delievered_order');
Route::get('/cancel_order/{id}', [MainPageController::class, 'cancel_order']);
Route::get('/receive_order/{id}', [MainPageController::class, 'receive_order']);
Route::get('/profile/{id?}', [MainPageController::class, 'profile'])->name('profile');
Route::get('/edit_profile_form/{id?}', [MainPageController::class, 'edit_profile_form'])->name('update_profile_form');
Route::put('/update_profile/{id?}', [MainPageController::class, 'update_profile']);



