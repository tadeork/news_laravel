<?php

Route::get('/', function(){
    return redirect('/posts');
});

Route::get('/view/all', 'PostController@indexAll');
Route::get('/view/{id}', 'PostController@view');

Route::group(['middleware'=>'web'], function(){
    Route::auth();
    Route::get('/admin', function(){
        return redirect('/posts');
    });

    /**
     * Recurso de Post para todas los accesos
     */
    Route::resource('/posts', 'PostController');
});
