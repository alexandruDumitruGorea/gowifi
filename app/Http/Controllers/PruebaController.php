<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PruebaController extends Controller
{
    function prueba() {
        var_dump(__DIR__);
    }
}
