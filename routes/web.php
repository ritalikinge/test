<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductManagementsController;
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

Route::get('/', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::post('/submit_registration', [HomeController::class, 'submit_registration']);
Route::post('/submit_login', [HomeController::class, 'submit_login']);

Route::group(['middleware' => ['CheckLogin', 'PreventBackHistory']], function () {
    Route::get('/all_product', [ProductController::class, 'index']);
    Route::resource('/product_managements', ProductManagementsController::class);
    Route::get('/add_to_carts/{id}', [ProductController::class, 'add_to_cart']);
    Route::post('/cart', [ProductController::class, 'cart_model']);
    Route::get('/logout', [HomeController::class, 'logout']);
});
