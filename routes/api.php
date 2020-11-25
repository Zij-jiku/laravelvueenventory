<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('register', 'AuthController@register');
});

// EmployeeController Route
Route::apiResource('/employee' , 'Api\EmployeeController');

// SupplierController Route
Route::apiResource('/supplier' , 'Api\SupplierController');

// CategoryController Route
Route::apiResource('/category' , 'Api\CategoryController');

// ProductController Route
Route::apiResource('/product' , 'Api\ProductController');

// ExpenseController Route
Route::apiResource('/expense' , 'Api\ExpenseController');

// SalaryController Route
Route::post('/salary/paid/{id}' , 'Api\SalaryController@paid');
Route::get('/salary' , 'Api\SalaryController@allsalary');
Route::get('/salary/view/{id}' , 'Api\SalaryController@viewsalary');
Route::get('/salary/edit/{id}' , 'Api\SalaryController@editsalary');
Route::post('/salary/update/{id}' , 'Api\SalaryController@updatesalary');










