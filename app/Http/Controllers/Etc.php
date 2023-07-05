<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Etc extends Controller
{
    public static function errView($code){
        return response()->view("errors.$code");
    }

    public static function notify($code){
        $message = require base_path('app/Etc/messages.php');

        return response()->json($message[$code]);
    }
}
