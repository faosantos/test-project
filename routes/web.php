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
    Route::get('user/{id}/user', 'Painel\UserController@one_user'); //lista um usuario
    Route::get('/include', 'Painel\UserController@create');
    Route::post('/include', 'Painel\UserController@store');
    Route::get('/delete-user/{id}', 'Painel\UserController@destroy');
    Route::post('/user/update/{id}', 'Painel\UserController@update');
     
    //PainelController
    Route::get('/', 'Painel\PainelController@index');

    //ImageGalleryController
     Route::get('gallerys', 'Painel\ImageGalleryController@index');
     Route::post('gallerys', 'Painel\ImageGalleryController@upload');
     Route::delete('gallerys/{id}', 'Painel\ImageGalleryController@destroy');
});

Route::auth();

Route::get('/', 'Portal\SiteController@index');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');


