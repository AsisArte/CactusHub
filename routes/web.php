<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\Admin\AdminController;

Route::get('/',
'App\Http\Controllers\IndexController'
)->name('index');

//каталог
Route::get('/catalog/index',
'App\Http\Controllers\CatalogController@index'
)->name('catalog.index');

Route::get('/catalog/category/{slug}',
'App\Http\Controllers\CatalogController@category'
)->name('catalog.category');

Route::get('/catalog/product/{slug}',
'App\Http\Controllers\CatalogController@product'
)->name('catalog.product');

//корзина
Route::get('/basket/index', 
'App\Http\Controllers\BasketController@index'
)->name('basket.index');

Route::get('/basket/checkout', 
'App\Http\Controllers\BasketController@checkout'
)->name('basket.checkout');

Route::post('/basket/add/{id}', 
'App\Http\Controllers\BasketController@add'
)->where('id', '[0-9]+'
)->name('basket.add');

Route::post('/basket/plus/{id}', 
'App\Http\Controllers\BasketController@plus'
)->where('id', '[0-9]+'
)->name('basket.plus');

Route::post('/basket/minus/{id}', 
'App\Http\Controllers\BasketController@minus'
)->where('id', '[0-9]+'
)->name('basket.minus');

Route::post('/basket/remove/{id}', 
'App\Http\Controllers\BasketController@remove'
)->where('id', '[0-9]+'
)->name('basket.remove');

Route::post('/basket/clear', 
'App\Http\Controllers\BasketController@clear'
)->name('basket.clear');

//Регистрация и аутентификация
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::namespace('Admin')->name('admin.')->prefix('admin')->middleware('auth', 'admin')->group(function () {
    //Route::get('index', 'App\Http\Controllers\Admin\AdminController')->name('index');
//});
