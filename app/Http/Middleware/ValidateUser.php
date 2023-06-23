<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/* Controllers */
use App\Http\Controllers\Auth;

/* Models */
use App\Models\Users;

class ValidateUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $req, Closure $next): Response
    {
        $data = session()->get('user');

        if($data === null){
            return redirect('/auth/login');
        }

        $user = Users::where(
                [
                    ['username', $data->username],
                    ['password', $data->password]
                ]
            )
            ->first();

        if ($user === null) {
            return Auth::logout();
        }

        return $next($req);
    }
}
