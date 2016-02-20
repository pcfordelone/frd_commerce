<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', ['as' => 'home', 'uses' => 'StoreController@index']);
Route::get('/home', ['as' => 'home', 'uses' => 'StoreController@index']);
Route::get('category/{id}', ['as' => 'category', 'uses' => 'StoreController@category']);
Route::get('product/{id}', ['as' => 'product', 'uses' => 'StoreController@product']);
Route::get('tag/{id}', ['as' => 'tag', 'uses' => 'StoreController@tag']);

Route::get('cart', ['as' => 'cart', 'uses' => 'CartController@index']);
Route::get('cart/add/{id}', ['as' => 'cart.add', 'uses' => 'CartController@add']);
Route::post('cart/update/{id}', ['as' => 'cart.update', 'uses' => 'CartController@update']);
Route::get('cart/destroy/{id}', ['as' => 'cart.destroy', 'uses' => 'CartController@destroy']);


Route::group(['middleware' => 'auth'], function() {
    Route::get('checkout.placeOrder', ['as' => 'checkout.place', 'uses' => 'CheckoutController@place']);
    Route::get('order', ['as' => 'order', 'uses' => 'StoreController@order']);
    Route::get('profile/{id}', ['as' => 'user.profile.create', 'uses' => 'StoreController@userProfile']);
    Route::post('profile/{id}', ['as' => 'user.profile.store', 'uses' => 'StoreController@userProfileStore']);
    Route::get('orders', ['as' => 'orders', 'uses' => 'StoreController@orders']);
    Route::get('orderdetail/{id}', ['as' => 'order.detail', 'uses' => 'StoreController@orderDetail']);
});

/**
 * Admin Group Route
 */
Route::group(['prefix' => 'admin', 'middleware' => ['auth.admin']], function() {

    Route::pattern('id', '[0-9]+');

    Route::group(['prefix' => 'categories'], function()
    {
        Route::get('/', ['as' => 'categories.index', 'uses' => 'AdminCategoriesController@index']);

        Route::get('create', ['as' => 'category.new','uses' => 'AdminCategoriesController@create']);
        Route::post('create', ['as' => 'category.create','uses' => 'AdminCategoriesController@store']);

        Route::get('edit/{id}', ['as' => 'category.edit','uses' => 'AdminCategoriesController@edit']);
        Route::put('edit/{id}', ['as' => 'category.edit','uses' => 'AdminCategoriesController@update']);

        Route::get('destroy/{id}', ['as' => 'category.destroy', 'uses' => 'AdminCategoriesController@destroy']);
    });

    Route::group(['prefix' => 'products'], function()
    {
        Route::get('/', ['as' => 'products.index', 'uses' => 'AdminProductsController@index']);

        Route::get('create', ['as' => 'product.new', 'uses' => 'AdminProductsController@create']);
        Route::post('create', ['as' => 'products.store', 'uses' => 'AdminProductsController@store']);

        Route::get('edit/{id}', ['as' => 'product.edit', 'uses' => 'AdminProductsController@edit']);
        Route::put('edit/{id}', ['as' => 'products.update', 'uses' => 'AdminProductsController@update']);

        Route::get('destroy/{id}', ['as' => 'product.destroy', 'uses' => 'AdminProductsController@destroy']);

        Route::get('{id}/images', ['as' => 'products.images', 'uses' => 'AdminProductsController@images']);
        Route::get('{id}/image/create', ['as' => 'products.image.create', 'uses' => 'AdminProductsController@createImage']);
        Route::post('{id}/image/store', ['as' => 'products.image.store', 'uses' => 'AdminProductsController@storeImage']);
        Route::get('{id}/image/destroy', ['as' => 'products.image.destroy', 'uses' => 'AdminProductsController@destroyImage']);
    });

    Route::group(['prefix' => 'users'], function() {
        Route::get('/', ['as' => 'users.index', 'uses' => 'AdminUsersController@index']);
        Route::get('/orders/{id}', ['as' => 'users.orders.index', 'uses' => 'AdminUsersController@userOrders']);
    });

    Route::group(['prefix' => 'orders'], function() {
        Route::get('/', ['as' => 'orders.index', 'uses' => 'AdminOrdersController@index']);
        Route::get('/show/{id}', ['as' => 'orders.show', 'uses' => 'AdminOrdersController@show']);
        Route::post('/show/{id}', ['as' => 'orders.update', 'uses' => 'AdminOrdersController@update']);
        Route::get('/destroy/{id}', ['as' => 'orders.destroy', 'uses' => 'AdminOrdersController@destroy']);
    });
});

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
    'exemplo'  => 'TestController'
]);