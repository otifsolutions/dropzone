<?php

Route::group(['namespace'=>'Otif\Dropzone\Http\Controllers'], function () {


    Route::get('/image/upload','UploadFileController@dropzone');

    Route::post('/image/upload/store','UploadFileController@fileStore');
    Route::post('/image/delete','UploadFileController@fileDestroy');
    Route::delete('image/delete/{id}','UploadFilesController@destroy');
//dropzone test
    Route::get('/mydropzone',function(){
        return view('Dropzone::mydropzone');
    });



});

