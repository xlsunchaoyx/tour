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

// 订单管理
Route::post('/sale_order/{id}', 'SaleOrderController@update')->where('id', '[0-9]+');
Route::get('/sale_order/{id}/delete', 'SaleOrderController@destroy')->where('id', '[0-9]+');
Route::resource('sale_order', 'SaleOrderController');


// 出团计划
Route::resource('plan', 'PlanController');

// 产品线路
Route::resource('product', 'ProductController');

// 报表
Route::resource('report', 'ReportController');

// 系统设置
Route::resource('system', 'SystemController');

