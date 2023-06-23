<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/* Models */
use App\Models\MuridSettings;
use App\Models\KasirSettings;
use App\Models\AdminSettings;

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

        if (method_exists($this, $user->role->access)) {
            $this->{$user->role->access}($user);
        }

        return $next($request);
    }

    private function murid($user)
    {
        $settings = MuridSettings::where('payment_users_id', $user->id)
            ->first();

        session()->put('settings', $settings);
    }

    private function kasir($user)
    {
        $settings = KasirSettings::with('api')
            ->where('payment_users_id', $user->id)
            ->first();

        session()->put('settings', $settings);
    }

    private function admin($user)
    {
        $settings = AdminSettings::with('api')
            ->where('payment_users_id', $user->id)
            ->first();

        info($settings);

        session()->put('settings', $settings);
    }
}
