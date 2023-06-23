<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RFID extends Controller
{
    public function __invoke(Request $req, $target)
    {
        if (method_exists($this, $target)) {
            return $this->$target($req);
        } else {
            return Etc::errView(404);
        }
    }

    private function payment(Request $req)
    {
        info('Controller: RFID; Method: payment');

        $input = $req->all();
        $token = $input['token'];
        $cardId = $input['card_id'];

        $api = $this->models['api']::where([
            ['mode', 'Payment'],
            ['token', $token]
        ])->first();

        $kasir = $this->models['kasir_settings']::where('payment_api_id', $api->id)->first();

        $murid = $this->models['murid']::where('card_id', $cardId)->first();
        $setting = $this->models['murid_settings']::where('murid_id', $murid->id)->first();

        $newBalance = $setting->balance - $api->value;
        $newSpent = $setting->spent + $api->value;

        if ($newSpent >= $setting->daily_limit) {
            return response('false');
        }

        app()->call([History::class, 'makePayment'], ['data' => [
            'murid_id' => $murid->id,
            'image' => 'assets/murid_history.jpeg',
            'title' => 'Pembelian',
            'body' => 'Anda telah melakukan pembelian di ' . $api->name,
            'price' => $api->value
        ]]);

        $kasir->update([
            'balance' => $kasir->balance + $api->value
        ]);

        $setting->update([
            'balance' => $newBalance,
            'spent' => $newSpent
        ]);

        $api->update([
            'value' => 0
        ]);

        return response('true');
    }


    private function topup(Request $req)
    {
        info('Controller: RFID; Method: topup');

        $input = $req->all();

        $api = $this->models['api']::where([
            ['mode', 'Topup'],
            ['token', $input['token']]
        ]);

        $murid = $this->models['murid']::where('card_id', $input['card_id'])->first();

        $setting = $this->models['murid_settings']::where('murid_id', $murid->id);

        $setting->update([
            'balance' => $setting->first()->balance + $api->first()->value
        ]);

        $api->update([
            'value' => 0
        ]);

        return response('true');
    }
}
