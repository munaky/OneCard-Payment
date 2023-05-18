<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/* Models */
use App\Models\MuridSettings;

class RenewSettings
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = session()->get('user');

        if ($user->role->access === 'murid') {
            self::murid($user);
        }

        return $next($request);
    }

    private function murid($user)
    {
        $settings = MuridSettings::where('payment_users_id', $user->id)
            ->first();

        session()->put('settings', $settings);
    }
}
