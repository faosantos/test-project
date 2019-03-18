<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RestController extends Controller
{
    public function getAppTest()
    {
        return json_encode(["message" => "Olá, resposta do servidor!"]);
    }
}
