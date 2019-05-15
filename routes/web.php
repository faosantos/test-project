<?php

Route::group(['prefix' => 'painel'], function(){    
    //PostController
    Route::get('posts', 'Painel\PostController@index');
    
    //PermissionController
    Route::get('permissions', 'Painel\PermissionController@index');
    Route::get('permission/{id}/roles', 'Painel\PermissionController@roles');
    
    //RoleController
    Route::get('roles', 'Painel\RoleController@index');
    Route::get('role/{id}/permissions', 'Painel\RoleController@permissions');

    //UserController
    Route::get('users', 'Painel\UserController@index');
    Route::get('user/{id}/roles', 'Painel\UserController@roles'); //lista uma permissão do usuario
    // Route::get('user/{id}/user', 'Painel\UserController@show'); //lista um usuario
    Route::get('/include', 'Painel\UserController@create');
    Route::post('/include', 'Painel\UserController@store');
    Route::get('/delete-user/{id}', 'Painel\UserController@destroy');
    // Route::get('/user/add', 'Painel\UserController@create');
    // Route::post('/user/add', 'Painel\UserController@store');
    // Route::get('user/{id}', 'Painel\UserController@show');//listar o usuario
    // Route::get('user/delete/{id}', 'Painel\UserController@destroy');
    Route::post('/user/update/{id}', 'Painel\UserController@update');

    // Route::get('users/include-user', 'UserController@create')->name('users');
    // Route::get('user/{id}/alter-user', 'UserController@edit')->name('alter-user');
     
    //PainelController
    Route::get('/', 'Painel\PainelController@index');

    // //ImageGalleryCntroller
    // Route::get('gallerys', 'Painel\ImageGalleryController');
    // Route::post('gallerys', 'Painel\ImageGalleryController');
    // Route::delete('gallerys/{id}', 'Painel\ImageGalleryController');

    //ImageGalleryCntroller
     Route::get('gallerys', 'Painel\ImageGalleryController@index');
     Route::post('gallerys', 'Painel\ImageGalleryController@upload');
     Route::delete('gallerys/{id}', 'Painel\ImageGalleryController@destroy');
});

Route::auth();

Route::get('/', 'Portal\SiteController@index');


