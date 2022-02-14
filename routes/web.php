<?php

use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\InvoiceDetailController;
use App\Http\Controllers\Admin\ListAddress;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
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

Route::match(['get', 'post'], '/', [AuthController::class, 'login'])->middleware('guest')->name('login');

Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth.basic')->name('logout');

Route::group([
                'middleware'=>['auth','throttle:10'],
                'prefix' => 'admin'
            ],function () {
    Route::resource('invoice',InvoiceController::class);
    Route::resource('invoice-detail', InvoiceDetailController::class);
    Route::resource('list-address',ListAddress::class);
    Route::resource('product',ProductController::class);
    Route::resource('review',ReviewController::class);
    Route::resource('user',UserController::class);
});
