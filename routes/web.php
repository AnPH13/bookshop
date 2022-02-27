<?php

use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\InvoiceDetailController;
use App\Http\Controllers\Admin\ListAddress;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductImageController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\User\HomeController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::match(['get', 'post'], '/login', [AuthController::class, 'login'])->middleware('guest')->name('login');
Route::match(['get', 'post'], '/register', [AuthController::class, 'register'])->middleware('guest')->name('register');

Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth.basic')->name('logout');

Route::group([
    'middleware' => ['AuthAdminMiddleware'],
    'prefix' => 'admin'
], function () {
    Route::resource('invoice', InvoiceController::class);
    Route::resource('invoice-detail', InvoiceDetailController::class);
    // Route::resource('list-address',ListAddress::class);
    Route::resource('product', ProductController::class);
    Route::resource('review', ReviewController::class);
    Route::resource('user', UserController::class);
    Route::resource('product-image', ProductImageController::class);
});
Route::prefix('/')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home.index');
    Route::get('{id}/show', [HomeController::class, 'show'])->name('home.show');
});
Route::prefix('list')->group(function () {
    Route::get('/', [HomeController::class, 'list_index'])->name('list.index');
});
Route::group(['middleware' => 'auth'], function () {
    Route::prefix('cart')->group(function () {
        Route::get('/', [HomeController::class, 'cart_index'])->name('cart.index');
        Route::get('add/{id}', [HomeController::class, 'cart_add'])->name('cart.add');
        Route::delete('{id}/delete', [HomeController::class, 'cart_delete'])->name('cart.delete');
    });
    Route::group(['prefix' => 'love'],function () {
        Route::get('/', [HomeController::class, 'love_index'])->name('love.index');
        Route::delete('{id}/delete', [HomeController::class, 'love_delete'])->name('love.delete');
        Route::get('add/{id}', [HomeController::class, 'love_add'])->name('love.add');
    });
});
