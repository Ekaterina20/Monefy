<?php

Route::namespace('API')->group(function() {

    Route::middleware('auth:api')
        ->get('/categories/list', 'CategoriesController@list');

    Route::group(['prefix' => 'payments', 'middleware' => 'auth:api'], function (){
        Route::get('/', 'FinancesController@list');
        Route::post('/payment', 'FinancesController@store');
        Route::put('/payment/{id}', 'FinancesController@update');
        Route::delete('/payment/{id}', 'FinancesController@delete');
    });

        Route::group(['prefix' => 'auth'], function (){
            Route::post('/register', 'AuthController@register');
            Route::post('/login', 'AuthController@login');
    });
});





