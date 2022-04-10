<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['namespace' => 'App\Http\Controllers', 'middleware' => 'auth'], function(){
    //Billing
    Route::group(['namespace' => 'Billing', 'prefix' => 'billing'], function(){
        Route::get('/', 'IndexController')->name('billing.index');
    });

    //Checkout
    Route::group(['namespace' => 'Checkout', 'prefix' => 'checkout'], function(){
        Route::get('/{plan}', 'CheckoutController')->name('checkout.checkout');
    });

    //Articles
    Route::group(['namespace' => 'Article', 'prefix' => 'articles'], function(){
        Route::get('/', 'IndexController')->name('articles.index');
    });
});
