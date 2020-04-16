<?php

Route::namespace('Admin')->group(function() {
    /*'middleware'=>'auth'  чтобы защитить маршрут при входе*/
    Route::group(['prefix' => 'admin', 'middleware'=>['auth', 'admin']], function () {

        Route::get('/', 'AdminController@index');

        Route::group(['prefix' => 'expenses'], function () {
            Route::get('/', 'ExpensesController@index');
            Route::get('/create', 'ExpensesController@create');
            Route::put('/store', 'ExpensesController@store');
            Route::get('/{id}/edit', 'ExpensesController@edit');
            Route::post('/{id}/edit', 'ExpensesController@update');
        });

        Route::group(['prefix' => 'incomes'], function () {
            Route::get('/', 'IncomesController@index');
            Route::get('/create', 'IncomesController@create');
            Route::put('/store', 'IncomesController@store');
            Route::get('/{id}/edit', 'IncomesController@edit');
            Route::post('/{id}/edit', 'IncomesController@update');
        });
    });
});

Auth::routes();

Route::group(['middleware'=>'admin'], function () {
    Route::get('/home', 'HomeController@index')->name('admin');
});
/*Route::post('logout', 'Auth\LoginController@logout')->name('logout');*/
Route::get('/warning', 'WarningController@index');
