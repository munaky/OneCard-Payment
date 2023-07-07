<?php

use Illuminate\Support\Facades\Route;

/* Controllers */
use App\Http\Controllers\Test;
use App\Http\Controllers\Auth;
use App\Http\Controllers\Views;
use App\Http\Controllers\RFID;
use App\Http\Controllers\API;
use App\Http\Controllers\PostUpdate;
use App\Http\Controllers\PostCreate;

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

Route::match(['get', 'post'], '/test', Test::class);

Route::get('/auth/login', function () {
    return view('auth.login');
});
Route::get('/auth/logout', [Auth::class, 'logout']);

Route::post('/post/update/{method}', PostUpdate::class);
Route::post('/post/create/{method}', PostCreate::class);

Route::get('/{role}/{page}', Views::class)
    ->middleware(
        [
            ValidateUser::class,
            ValidateAccess::class,
            RenewSettings::class,
        ]
    );

Route::get('/', function () {
    if(session()->missing('user')){
        return redirect('/auth/login');
    }

    $access = session()->get('user')->role->access;
    return redirect("/$access/home");
});

Route::post('/auth/{method}', Auth::class);

Route::match(['get', 'post'], '/api/rfid/{method}', RFID::class);

/*
    API
*/

Route::post('/api/get/tokenvalue', [API::class, 'tokenvalue']);
