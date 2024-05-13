<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Views extends Controller
{
    public function __invoke(Request $req, $role, $page)
    {
        info('Controller: Views; Method: __invoke');

        if (!view()->exists("users.$role.$page.index")) {
            return Etc::errView(404);
        };

        if (method_exists($this, $role . $page)) {
            $data = $this->{$role . $page}($req);
            $content = view("users.$role.$page.index", ['data' => $data]);
        } else {
            $content = view("users.$role.$page.index");
        }

        return view("users.$role.index", [
            'content' => $content,
            'except' => Etc::viewsExcept($role . $page)
        ]);
    }

    private function muridhome()
    {
        $data = $this->models['history']::where('murid_id', session()->get('user')->murid_settings->murid_id)
            ->orderBy('id', 'desc')
            ->limit(5)
            ->get();
        return $data;
    }

    private function muridhistory()
    {
        return $this->models['history']::where('murid_id', session()->get('user')->murid_settings->murid_id)
            ->orderBy('id', 'desc')
            ->get();
    }

    private function muridprofile()
    {
        //
    }

    private function kasirhome()
    {
        return $this->models['history']::where('payment_users_id', session()->get('user')->id)
            ->orderBy('id', 'desc')
            ->limit(5)
            ->get();
    }

    private function kasirhistory()
    {
        return $this->models['history']::where('payment_users_id', session()->get('user')->id)
            ->orderBy('id', 'desc')
            ->get();
    }

    private function kasirpayment()
    {
        $api = session()->get('settings')->api;

        $this->models['api']::where('id', $api->id)
            ->update([
                'value' => '',
                'value2' => '',
                'command' => '',
            ]);
    }

    private function adminpayment()
    {
        $api = session()->get('settings')->api;

        $this->models['api']::where('id', $api->id)
            ->update([
                'value' => '',
                'command' => '',
            ]);
    }

    private function adminhome()
    {
        return $this->models['history']::where('payment_users_id', session()->get('user')->id)
            ->orderBy('id', 'desc')
            ->limit(5)
            ->get();
    }

    private function adminhistory()
    {
        return $this->models['history']::where('payment_users_id', session()->get('user')->id)
            ->orderBy('id', 'desc')
            ->get();
    }

    private function admintopup()
    {
        $api = session()->get('settings')->api;

        $this->models['api']::where('id', $api->id)
            ->update([
                'mode' => 'topup',
                'value' => '',
                'command' => '',
            ]);
    }

    private function adminmurid()
    {
        $api = session()->get('settings')->api;

        $this->models['api']::where('id', $api->id)
            ->update([
                'mode' => 'register',
                'value' => '',
                'command' => '',
            ]);
    }
}
