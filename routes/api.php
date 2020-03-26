<?php

Route::namespace('API')->group(function() {

    Route::get('/categories/list', 'CategoriesController@index');

    Route::group(['prefix' => 'payments'], function (){
        Route::get('/', 'FinancesController@index');
        Route::post('/payment', 'FinancesController@store');
        Route::put('/payment/{finance}', 'FinancesController@update');
        Route::delete('/payment/{finance}', 'FinancesController@delete');
    });

        Route::group(['prefix' => 'auth'], function (){
            Route::post('/register', 'RegisterController@register');
            Route::post('/login', 'LoginController@login');

});




   /* Route::post('/logout', 'LoginController@logout');*/
});





