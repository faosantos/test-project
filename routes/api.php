<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Aqui é onde você pode registrar as rotas da API para o seu aplicativo. Estes
| rotas são carregadas pelo RouteServiceProvider dentro de um grupo que
| é atribuído o grupo de middleware "api". Aproveite para criar sua API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get("getAppTest", "RestController@getAppTest");