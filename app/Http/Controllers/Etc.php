<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Etc extends Controller
{
    public static function errView($code){
        return response()->view("errors.$code");
    }
}
