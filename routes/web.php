<?php

use Illuminate\Support\Facades\Route;

/* Controllers */
use App\Http\Controllers\Test;
use App\Http\Controllers\Auth;
use App\Http\Controllers\Views;

/* Middlewares */
use App\Http\Middleware\ValidateUser;
use App\Http\Middleware\ValidateAccess;
use App\Http\Middleware\RenewSettings;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/test', Test::class);

Route::get('/auth/login', function () {
    return view('auth.login');
});

Route::get('/{role}/{page}', Views::class)
    ->middleware(
        [
            ValidateUser::class,
            ValidateAccess::class,
            RenewSettings::class,
        ]
    );

Route::get('/', function () {
    $access = session()->get('user')->role->access;
    return redirect("/$access/home");
});

Route::post('/auth/{method}', Auth::class);
