<?php

Route::namespace('Admin')->group(function() {
    /*'middleware'=>'auth'  чтобы защитить маршрут при входе*/
    Route::group(['prefix' => 'admin', 'middleware'=>'auth'], function () {
        Route::get('/', 'AdminController@index');

        Route::group(['prefix' => 'expenses'], function () {
            Route::get('/', 'ExpensesController@index');
            Route::get('/create', 'ExpensesController@create');
            Route::put('/store', 'ExpensesController@store');
        });

        Route::group(['prefix' => 'incomes'], function () {
            Route::get('/', 'IncomesController@index');
            Route::get('/create', 'IncomesController@create');
            Route::put('/store', 'IncomesController@store');
        });
    });
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('admin');
/*Route::post('logout', 'Auth\LoginController@logout')->name('logout');*/
