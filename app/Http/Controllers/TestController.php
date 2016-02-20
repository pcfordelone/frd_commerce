<?php

namespace FRD\Http\Controllers;

use Illuminate\Http\Request;
use FRD\Http\Requests;
use FRD\Http\Controllers\Controller;

class TestController extends Controller
{
    public function getExemplo()
    {
        return 'oi';
    }

    public function getSuperExemplo()
    {
        return 'Super Exemplo';
    }
}
