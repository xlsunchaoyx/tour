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
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => 'auth:web'], function () {
    // 订单管理
    Route::post('/sale_order/{id}', 'SaleOrderController@update')->where('id', '[0-9]+');
    Route::get('/sale_order/{id}/delete', 'SaleOrderController@destroy')->where('id', '[0-9]+');
    Route::get('/sale_order/{id}/confirm', 'SaleOrderController@confirm')->where('id', '[0-9]+');
    Route::get('/sale_order/{id}/cancel', 'SaleOrderController@cancel')->where('id', '[0-9]+');
    Route::resource('sale_order', 'SaleOrderController');
    Route::get('/sale_order/{id}/add_to_plan', 'SaleOrderController@load_add_to_plan')->where('id', '[0-9]+');
    Route::post('/sale_order/{id}/add_to_plan', 'SaleOrderController@add_to_plan')->where('id', '[0-9]+');


    // 产品线路
    Route::post('/product/{id}', 'ProductController@update')->where('id', '[0-9]+');
    Route::get('/product/{id}/delete', 'ProductController@destroy')->where('id', '[0-9]+');
    Route::get('/product/{id}/up', 'ProductController@up')->where('id', '[0-9]+');
    Route::get('/product/{id}/down', 'ProductController@down')->where('id', '[0-9]+');
    Route::resource('product', 'ProductController');

    // 报表
    Route::resource('report', 'ReportController');

    // 系统设置
    Route::get('system', 'SystemController@index');
    Route::get('/system/{id}/delete', 'SystemController@destroy')->where('id', '[0-9]+');



    // 出团计划
    Route::get('/plan/{id}/delete', 'PlanController@destroy')->where('id', '[0-9]+');
    Route::get('/plan/{id}/confirm', 'PlanController@confirm')->where('id', '[0-9]+');
    Route::post('/plan/{id}', 'PlanController@update')->where('id', '[0-9]+');
    Route::resource('plan', 'PlanController');
});
