<?php

use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\SlidersController;
use App\Http\Controllers\Admin\TagsController;
use App\Http\Controllers\Admin\PostersController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\CommentsController;
use App\Http\Controllers\Admin\OrdersController;

use App\Http\Controllers\Auth\GooglesController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CartsController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [IndexController::class, 'index'])->name('home.index');
Route::get('cart', [IndexController::class, 'cart'])->name('home.cart');
Route::get('product/{product}', [IndexController::class, 'product'])->name('home.product');
Route::get('category/{category}', [IndexController::class, 'category'])->name('home.category');

Route::post('cart', [CartsController::class, 'store'])->name('carts.store');
Route::post('update-cart', [CartsController::class, 'updateCart'])->name('carts.cart-update');
Route::post('remove-cart', [CartsController::class, 'removeCart'])->name('carts.remove-cart');
Route::post('clear-cart', [CartsController::class, 'clearAllCart'])->name('carts.cart-all-clear');

Route::post('comment/{product}', [IndexController::class, 'comment'])->name('comment');

Auth::routes();

Route::get('google', [GooglesController::class, 'next']);
Route::get('callback-google', [GooglesController::class, 'handleCallback']);

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('index', [HomeController::class, 'index'])->name('admin.index');

    Route::resource('categories', CategoriesController::class);
    Route::resource('tags', TagsController::class);
    Route::resource('sliders', SlidersController::class);
    Route::resource('posters', PostersController::class);
    Route::resource('users', UsersController::class);
    Route::resource('products', ProductsController::class);
    Route::resource('comments', CommentsController::class);
    Route::post('comment-reply/{comment}', [CommentsController::class, 'reply'])->name('comments.reply');
    Route::resource('orders', OrdersController::class);
});

Route::post('request', [CartsController::class, 'request'])->name('pay.request')->middleware('auth');
Route::get('callback/pay', [CartsController::class, 'verify'])->name('pay.callback');



