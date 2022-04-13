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

    //Invite
    Route::view('invite', 'invite')->name('invite');

    //Join
    Route::group(['namespace' => 'Join','prefix' => 'join'], function (){
        Route::get('/', 'CreateController')->name('join.create');
        Route::post('/', 'StoreController')->name('join.store');
        Route::get('/organization/{organization_id}', 'OrganizationController')->name('join.organization');
    });

    //Articles
    Route::group(['namespace' => 'Article', 'prefix' => 'articles'], function(){
        Route::get('/', 'IndexController')->name('articles.index');
        Route::get('/create', 'CreateController')->name('articles.create');
        Route::post('/', 'StoreController')->name('articles.store');
        Route::get('/{article}/edit', 'EditController')->name('articles.edit');
        Route::patch('/{article}', 'UpdateController')->name('articles.update');
        Route::delete('/{article}', 'DeleteController')->name('articles.delete');
    });


    //Admin routes
    Route::group(['middleware' => 'is_admin'], function (){

        //Categories
        Route::group(['namespace' => 'Category', 'prefix' => 'categories'], function(){
            Route::get('/', 'IndexController')->name('categories.index');
            Route::get('/create', 'CreateController')->name('categories.create');
            Route::post('/', 'StoreController')->name('categories.store');
            Route::get('/{category}/edit', 'EditController')->name('categories.edit');
            Route::patch('/{category}', 'UpdateController')->name('categories.update');
            Route::delete('/{category}', 'DeleteController')->name('categories.delete');
        });
    });

});
