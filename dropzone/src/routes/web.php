<?php

Route::group(['namespace'=>'Otif\Dropzone\Http\Controllers'], function () {


    Route::get('/package','UploadFileController@index');
    Route::post('/package','UploadFileController@store');
    Route::post('/searchFile','UploadFileController@search');


    Route::get('/image/upload','UploadFileController@dropzone');
//    Route::get('/image/upload','UploadFileController@fileCreate');
    Route::post('/image/upload/store','UploadFileController@fileStore');
    Route::post('/image/delete','UploadFileController@fileDestroy');


    Route::get('/images/{id}','UploadFileController@getAssetLink');


    Route::get('/check','UploadFileController@mycheck');

});

