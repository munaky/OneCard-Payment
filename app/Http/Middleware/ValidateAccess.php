<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/* Controllers */
use App\Http\Controllers\Etc;

/* Models */
use App\Models\Users;

class ValidateAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $req, Closure $next): Response
    {
        $data = session()->get('user');
        $access = explode('/', $req->path())[0];

        if ($data->role->access !== $access) {
            return Etc::errView(403);
        }

        return $next($req);
    }
}
