<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class API extends Controller
{
    public function tokenvalue(){
        $api = Etc::getSession()['settings']->api;

        $data = $this->models['api']::where('token', $api->token)
        ->first();

        return response($data->value);
    }

    public function checking(){
        $api = Etc::getSession()['settings']->api;

        $data = $this->models['api']::where('token', $api->token)
        ->first();

        return response()->json([
            'value' => $data->value,
            'command' => $data->command,
        ]);
    }
}
