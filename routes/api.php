<?php

// api.php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::group(['prefix' => 'api'], function () {
    Route::post('/task/create', 'TaskController@store');
    Route::get('/task/edit/{id}', 'TaskController@edit');
    Route::post('/task/update/{id}', 'TaskController@update');
    Route::delete('/task/delete/{id}', 'TaskController@delete');
    Route::get('/tasks', 'TaskController@index');
//});
