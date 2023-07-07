<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostCreate extends Controller
{
    public function __invoke(Request $req, $target)
    {
        if (method_exists($this, $target)) {
            return $this->$target($req);
        } else {
            return Etc::errView(404);
        }
    }

    private function murid(Request $req)
    {
        $input = $req->all();
        $api = session()->get('settings')->api;

        $murid = $this->models['murid']::with('murid_settings')
            ->where('card_id', $input['card_id'])
            ->first();

        if ($murid->murid_settings) {
            return back();
        }

        $user = $this->models['users']::create([
            'name' => $murid->name,
            'role_id' => 3,
            'username' => $input['username'],
            'password' => $input['password'],
        ]);

        $this->models['murid_settings']::create([
            'payment_users_id' => $user->id,
            'murid_id' => $murid->id,
            'pin' => $input['pin'],
        ]);

        $this->models['api']::where('id', $api->id)
            ->update([
                'value' => ''
            ]);

        return back();
    }
}
