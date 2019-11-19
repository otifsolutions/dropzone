<?php

Route::group(['namespace'=>'Otifsolutions\Dropzone\Http\Controllers'], function () {




    Route::post('/image/upload/store','UploadFileController@fileStore');
    Route::post('/image/delete','UploadFileController@fileDestroy');
    Route::delete('image/delete/{id}','UploadFilesController@destroy');




});

