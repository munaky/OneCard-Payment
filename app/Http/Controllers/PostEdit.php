<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostEdit extends Controller
{
    public function __invoke(Request $req, $target)
    {
        if (method_exists($this, $target)) {
            return $this->$target($req);
        } else {
            return Etc::errView(404);
        }
    }

    private function password(Request $req)
    {
        $input = $req->all();
        $user = session()->get('user');

        if ($input['old_pass'] != $user->password || $input['new_pass'] != $input['ver_pass']) {
            return back();
        }

        $this->models['users']::find($user->id)
            ->update([
                'password' => $input['ver_pass']
            ]);

            return back();
    }

    private function dailylimit(){
        $data = session()->get('settings');

        $this->models['murid_settings']::find($data->id)
            ->update([
                    'daily_limit' => $data->daily_limit + 5000
                ]);

        return back();
    }

    private function increaselimit(){
        $data = session()->get('settings');

        $this->models['murid_settings']::find($data->id)
            ->update([
                    'daily_limit' => $data->daily_limit + 5000
                ]);

        return back();
    }

    private function decreaselimit(){
        $data = session()->get('settings');

        $this->models['murid_settings']::find($data->id)
            ->update([
                    'daily_limit' => $data->daily_limit - 5000
                ]);

        return back();
    }
}
