<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/register', 'API\RegisterController@register');
Route::post('/login', 'API\RegisterController@login');
Route::post('forget/pass','API\ApiController@forget_pass');
Route::post('password/reset','API\ApiController@forget_pass');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware'=>'auth:api','prefix'=>'categories'],function (){
    Route::post('all','API\ApiController@categories');
    Route::post('subcategories','API\ApiController@subcategories');
    Route::post('products','API\ApiController@products');
    Route::post('products/detalis','API\ApiController@products_detalis');
    Route::post('Banner/home','API\ApiController@Banner');
    Route::post('fave/product','API\ApiController@fave_product');
    Route::post('add/fave/product','API\ApiController@add_fave_product');
    Route::post('filter/product','API\ApiController@filter');
    Route::post('edit/profile','API\ApiController@edit_profile');
    Route::post('profile','API\ApiController@profile');
    Route::post('style','API\ApiController@style');
    Route::post('style/product','API\ApiController@style_id');
    Route::post('size','API\ApiController@size');
    Route::post('size/product','API\ApiController@size_product_id');
    Route::post('standard/gold','API\ApiController@standard_gold');
    Route::post('standard/gold/product','API\ApiController@standard_gold_product');
    Route::post('add/rate/comment','API\ApiController@add_rate_comment');
    Route::post('create/order','API\ApiController@add_order');
    Route::post('myorder','API\ApiController@myorder');
    Route::post('order/details','API\ApiController@order_details');
    Route::post('add/cart','API\ApiController@add_cart');
    Route::post('cart','API\ApiController@cart');
    Route::post('plusCart','API\ApiController@plusCart');
    Route::post('minCart','API\ApiController@minCart');
    Route::post('deleteCart','API\ApiController@deleteCart');
    Route::post('contact/us','API\ApiController@contact_us');
    Route::post('best/diamond','API\ApiController@best_diamond');
});
