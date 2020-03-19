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
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::namespace('API')->group(function() {
    Route::get('/', 'SiteController@index');

    Route::group(['prefix' => 'expenses'], function () {
        Route::get('/', 'ExpensesController@index');
        Route::get('/create', 'ExpensesController@create');
        Route::put('/store', 'ExpensesController@store');
        Route::get('/{expense_site}/edit', 'ExpensesController@edit');
        Route::post('/{expense_site}/edit', 'ExpensesController@update');
        Route::delete('/{expense_site}/delete', 'ExpensesController@delete');
    });

    Route::group(['prefix' => 'incomes'], function () {
        Route::get('/', 'IncomesController@index');
        Route::get('/create', 'IncomesController@create');
        Route::put('/store', 'IncomesController@store');
        Route::get('/{income_site}/edit', 'IncomesController@edit');
        Route::post('/{income_site}/edit', 'IncomesController@update');
        Route::delete('/{income_site}/delete', 'IncomesController@delete');
    });
});