<?php

Route::namespace('API')->group(function() {

    Route::get('/categories/list', 'CategoriesController@index');

    Route::group(['prefix' => 'payments'], function (){
        Route::get('/', 'PaymentsController@index');
        Route::post('/payment', 'PaymentsController@store');

    /*Route::PUT('/payment/{finance}', 'PaymentsController@update');
    Route::DELETE('/payment/{finance}', 'PaymentsController@delete');

    });

Route::group(['namespace' => 'Auth', 'prefix' => 'auth'], function (){

    Route::post('/register', 'RegisterController@register');
    Route::post('/login', 'LoginController@login');
    Route::post('/logout', 'LoginController@logout');*/

    });
});




