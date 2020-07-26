<?php

Route::get('/panel','CategoriesController@panel')->name('index');


Route::get('categories','CategoriesController@index')->name('categories');
Route::get('categories/{id}/clothes','CategoriesController@index')->name('categories.clothes');
Route::get('categories/create','CategoriesController@create')->name('categories.create');
Route::post('categories','CategoriesController@store')->name('categories.store');
Route::get('categories/{id}','CategoriesController@edit')->name('categories.edit');;
Route::put('categories/{id}','CategoriesController@update')->name('categories.update');;
Route::delete('categories/{id}','CategoriesController@delete')->name('categories.delete');;


Route::get('products','ProductsController@index')->name('products');
Route::get('products/create','ProductsController@create')->name('products.create');
Route::post('products','ProductsController@store')->name('products.store');
Route::get('products/{id}','ProductsController@show')->name('products.show');
Route::get('products/{id}','ProductsController@edit')->name('products.edit');
Route::put('products/{id}','ProductsController@update')->name('products.update');
Route::delete('products/{id}','ProductsController@delete')->name('products.delete');

Route::resource('tags', 'TagsController');
// GET /admin/tags -> index (tags.index)
// GET /admin/tags/ -> show (tags.show)
// GET /admin/tags//edit -> edit (tags.edit)
// GET /admin/tags/create -> create (tags.create)
// POST /admin/tags -> store (tags.store)
// PUT /admin/tags/ -> update (tags.update)
// DELETE /admin/tags/ -> destroy (tags.destroy)
Route::resource('roles', 'RolesController');

