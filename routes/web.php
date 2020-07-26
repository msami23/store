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


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');


        Route::get('/category/{id}', 'CategoriesController@index')
            ->name('category')
            ->where([
                'id' => '\d+'
            ]);
        Route::get('/product/{id}', 'ProductsController@show')
            ->name('product.details')
            ->where([
                'id' => '\d+'
            ]);

        Route::post('cart', 'CartController@store')->name('cart.store');
        Route::get('cart', 'CartController@index')->name('cart');
        Route::put('cart', 'CartController@update')->name('cart.update');
        Route::get('cart/remove/{product_id}', 'CartController@remove')->name('cart.remove');

        Route::get('orders', 'OrdersController@store')->name('orders')->middleware('auth');
        Route::get('orders/create', 'OrdersController@store')->name('orders.store')->middleware('auth');



Route::get('notifications', 'NotificationController@index')->name('notifications');
Route::get('notifications/{id}', 'NotificationController@show')->name('notifications.show');

Route::get('download/{id}','FileController@download');
Route::get('view-file/{id}','FileController@view');















