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

Route::get('/', 'Frontend\HomeController@index');
Route::get('/product/{slug}', 'Frontend\ProductController@detail');
Route::prefix('/shop')->group(function()
{
    Route::get('/', 'Frontend\ShopController@index');
});
Route::match(['get', 'post'], '/login', 'Auth\AuthController@login')->name('login');
Route::match(['get', 'post'], '/cart', 'FrontEnd\CartController@index')->name('cart');
Route::match(['get', 'post'], '/checkout', 'FrontEnd\CheckoutController@index')->name('checkout');
Route::match(['get', 'post'], '/register', 'Auth\AuthController@register');

Route::group(['middleware' => 'auth'], function () {
    Route::prefix('/panel')->group(function()
    {
        Route::get('/dashboard', 'Backend\DashboardController@index');
        Route::prefix('/master-data')->group(function()
        {
            Route::prefix('/users')->group(function()
            {
                Route::get('/', 'Backend\UsersController@index');
                Route::match(['get', 'post'], '/create', 'Backend\UsersController@create');
                Route::match(['get', 'post'], '/update/{id}', 'Backend\UsersController@update');
            });
            Route::prefix('/banner')->group(function()
            {
                Route::get('/', 'Backend\BannerController@index');
                Route::match(['get', 'post'], '/create', 'Backend\BannerController@create');
                Route::match(['get', 'post'], '/update/{id}', 'Backend\BannerController@update');
            });
            Route::prefix('/category-products')->group(function()
            {
                Route::get('/', 'Backend\CategoryProductsController@index');
                Route::match(['get', 'post'], '/create', 'Backend\CategoryProductsController@create');
                Route::match(['get', 'post'], '/update/{id}', 'Backend\CategoryProductsController@update');
            });
            Route::prefix('/products')->group(function()
            {
                Route::get('/', 'Backend\ProductsController@index');
                Route::match(['get', 'post'], '/create', 'Backend\ProductsController@create');
                Route::match(['get', 'post'], '/update/{id}', 'Backend\ProductsController@update');
                Route::post('/deletePhoto', 'Backend\ProductsController@deletePhoto');
            });
        });   
        Route::post('logout', 'Auth\AuthController@logout')->name('logout');
    });
});