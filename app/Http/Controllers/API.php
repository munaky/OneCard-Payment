<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class API extends Controller
{
    public function SetValue(Request $req){
        $this->models['api']::find(session()->get('settings')->api->id)
            ->update([
                'value' => $req->get('value')
            ]);

        return back();
    }
}
