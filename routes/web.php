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

// Route::get('/', function () {
//     return view('layouts.home');
// });

Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::get('product/detail/{id}/{slug}', 'App\Http\Controllers\HomeController@detail')->name('product.detail');

Route::get('product/category/{id}/{slug}', 'App\Http\Controllers\HomeController@category')->name('product.category');

Route::post('product/{id}/comment', 'App\Http\Controllers\HomeController@comment')->name('product.comment');

Route::get('search', 'App\Http\Controllers\HomeController@search')->name('search');

Route::get('/cart/add/{id}', 'App\Http\Controllers\Auth\CartController@add')->name('product.cart');

Route::get('/cart/show', 'App\Http\Controllers\Auth\CartController@show')->name('cart.show');

Route::get('/cart/delete/{rowId}', 'App\Http\Controllers\Auth\CartController@delete')->name('cart.delete');

Route::get('/cart/removeall', 'App\Http\Controllers\Auth\CartController@removeall')->name('cart.removeall');

Route::post('/cart/update', 'App\Http\Controllers\Auth\CartController@update')->name('cart.update');

Route::post('/cart/sendemail', 'App\Http\Controllers\Auth\CartController@sendMail')->name('cart.sendemail');

Route::get('/cart/complete', 'App\Http\Controllers\Auth\CartController@complete')->name('cart.complete');

Route::middleware(['auth'])->group(function () {

    Route::get('logout', 'App\Http\Controllers\Auth\LoginController@logout');

    Route::prefix('admin')->group(function () {
        Route::get('home', 'App\Http\Controllers\Admin\HomeController@index')->name('admin.home');

        Route::prefix('category')->group(function () {

            Route::get('/', 'App\Http\Controllers\Admin\CategoryController@index')->name('admin.category');

            Route::post('store', 'App\Http\Controllers\Admin\CategoryController@store')->name('category.store');

            Route::get('edit/{id}', 'App\Http\Controllers\Admin\CategoryController@edit')->name('category.edit');

            Route::post('update/{id}', 'App\Http\Controllers\Admin\CategoryController@update')->name('category.update');

            Route::get('delete/{id}', 'App\Http\Controllers\Admin\CategoryController@delete')->name('category.delete');
        });

        Route::prefix('product')->group(function () {
            Route::get('/', 'App\Http\Controllers\Admin\ProductController@index')->name('admin.product');

            Route::get('create', 'App\Http\Controllers\Admin\ProductController@create')->name('product.create');

            Route::post('add', 'App\Http\Controllers\Admin\ProductController@add')->name('product.add');

            Route::get('edit/{id}', 'App\Http\Controllers\Admin\ProductController@edit')->name('product.edit');

            Route::post('update/{id}', 'App\Http\Controllers\Admin\ProductController@update')->name('product.update');

            Route::get('delete/{id}', 'App\Http\Controllers\Admin\ProductController@delete')->name('product.delete');
        });


    });


});


