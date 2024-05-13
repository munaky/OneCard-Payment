<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Auth extends Controller
{
    public function __invoke(Request $req, $target)
    {
        if (method_exists($this, $target)) {
            return $this->$target($req);
        } else {
            return Etc::errView(404);
        }
    }

    private function login(Request $req)
    {
        info('Controller: Auth; Method: login');

        $input = $req->all();

        $user = $this->models['users']::with(['role', 'murid_settings'])
            ->where([
                ['username', $input['username']],
                ['password', $input['password']]
            ])
            ->first();

        if ($user === null) {
            return back();
        }

        session()->put('user', $user);

        return redirect("/".$user->role->access."/home");
    }

    public static function logout()
    {
        info('Controller: Auth; Method: logout');

        session()->flush();
        return redirect('/auth/login');
    }
}
