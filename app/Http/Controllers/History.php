<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\History as H;

class History extends Controller
{
    public static function make($data){
        info('Controller: History; Method: makePayment');

        H::create([
            'payment_users_id' => $data['payment_users_id'],
            'murid_id' => $data['murid_id'],
            'image' => $data['image'],
            'title' => $data['title'],
            'body' => $data['body'],
            'price' => $data['price']
        ]);
    }
}
