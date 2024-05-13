<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class Etc extends Controller
{
    public static function errView($code){
        return response()->view("errors.$code");
    }

    public static function notify($code){
        $message = require base_path('app/Etc/messages.php');

        return response()->json($message[$code]);
    }

    public static function viewsExcept($page){
        $except = require base_path('app/Etc/viewsExcept.php');

        return array_key_exists($page, $except) ? $except[$page] : [];
    }

    public static function getSession()
    {
        $sessionId = Cookie::get('laravel_session');

        session()->setId($sessionId);

        return session()->all();
    }

    public static function any($params){
    }
}
