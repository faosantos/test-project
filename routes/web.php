<?php

// use Symfony\Component\Routing\Annotation\Route;

// use Illuminate\Routing\Route;


Route::group(['prefix' => 'painel'], function () {

    Route::get('/', 'PainelController@index');
    
});



Auth::routes();



// Route::get('/', 'SiteController@index');


 Route::get('/', function () {
     return view('welcome');
 });


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/post/{id}/update', 'HomeController@update');

Route::get('/role-permission', 'HomeController@rolesPermission');

//Route::get('/painel', 'PainelController@index');
