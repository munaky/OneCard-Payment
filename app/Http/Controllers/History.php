<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\History as H;

class History extends Controller
{
    public static function makePayment($data){
        info('Controller: History; Method: makePayment');

        H::create([
            'murid_id' => $data['murid_id'],
            'image' => $data['image'],
            'title' => $data['title'],
            'body' => $data['body'],
            'price' => $data['price']
        ]);

    }
}
