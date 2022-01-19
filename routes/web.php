<?php

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

Route::get('/home', 'HomeController@index')->name('home');

Route::name('admin.')->group(function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::group(['prefix' => 'managemen'], function () {
            Route::group(['prefix' => 'produk'], function () {
                Route::resource('kategori', 'Admin\CategoryController')->middleware('is_admin');
                Route::resource('ukuran', 'Admin\SizeController')->middleware('is_admin');
            });
            Route::resource('produk', 'Admin\ProductController')->middleware('is_admin');
            Route::resource('admin', 'Admin\AdminController')->middleware('is_admin');
        });
        Route::get('dashboard', 'Admin\AdminController@dashboard')->middleware('is_admin');
    });
});

Route::get('customer/produk', 'Customer\ProductController@index')->name('customer.produk.index');
Route::get('customer/produk/{id}', 'Customer\ProductController@show')->name('customer.produk.show');
Route::get('customer/produk/image/{imageName}', 'Customer\ProductController@image')->name('customer.produk.image');
Route::get('customer/carts', 'Customer\CartController@index')->name('customer.carts.index');
Route::get('customer/carts/add/{id}', 'Customer\CartController@add')->name('customer.carts.add');
Route::patch('customer/carts/update', 'Customer\CartController@update')->name('customer.carts.update');
Route::delete('customer/carts/remove', 'Customer\CartController@remove')->name('customer.carts.remove');