<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

// Items
Route::resource('item', 'ItemController');
Route::get('api/items', 'ItemController@listing');

// Purchase
Route::get('purchase/get/{recurse}', 'PurchaseController@getRecurse');
Route::resource('purchase', 'PurchaseController');
Route::get('purchase/getsupplier/{ruc}', 'PurchaseController@getSupplier');
Route::get('dropdown-payment-conditions', 'PurchaseController@getPayments');

// Payment Condition
Route::resource('paymentcondition', 'PaymentconditionController');
Route::get('api/paymentconditions', 'PaymentconditionController@listing');

// Categories
Route::resource('category', 'CategoryController');
Route::get('api/categories', 'CategoryController@listing');
Route::get('dropdown-categories', 'CategoryController@getCategories');
Route::post('categoryadd', 'CategoryController@add');

// Brands
Route::resource('brand', 'BrandController');
Route::get('api/brands', 'BrandController@listing');
Route::get('dropdown-brands', 'BrandController@getBrands');
Route::post('brandadd', 'BrandController@add');

// Measures
Route::resource('measure', 'MeasureController');
Route::get('api/measures', 'MeasureController@listing');
Route::get('dropdown-measures', 'MeasureController@getMeasures');
Route::post('measureadd', 'MeasureController@add');

// Suppliers
Route::resource('supplier', 'SupplierController');
Route::get('api/suppliers', 'SupplierController@listing');

// Customers
Route::resource('customer', 'CustomerController');
Route::get('api/customers', 'CustomerController@listing');

// Warehouses
Route::resource('warehouse', 'WarehouseController');
Route::get('api/warehouses', 'WarehouseController@listing');

