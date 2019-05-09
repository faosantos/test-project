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
    Route::get('user/{id}/roles', 'Painel\UserController@roles');
    
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


