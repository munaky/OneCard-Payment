<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostUpdate extends Controller
{
    public function __invoke(Request $req, $target)
    {
        if (method_exists($this, $target)) {
            return $this->$target($req);
        } else {
            return Etc::errView(404);
        }
    }

    public function tokenvalue(Request $req)
    {
        info($req->all());
        $this->models['api']::find(session()->get('settings')->api->id)
            ->update([
                'value' => $req->get('value')
            ]);

        return response('true');
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

    private function pin(Request $req)
    {
        $this->models['murid_settings']::find(session()->get('settings')->id)
            ->update([
                'pin' => $req->get('pin')
            ]);

        return back();
    }

    private function dailylimit(Request $req)
    {
        $data = session()->get('settings');

        $this->models['murid_settings']::find($data->id)
            ->update([
                'daily_limit' => $req->get('method') == 'decrease' ? $data->daily_limit - 5000 : $data->daily_limit + 5000
            ]);

        return back();
    }

    private function blockcard(Request $req)
    {
        $this->models['murid_settings']::find(session()->get('settings')->id)
            ->update([
                'disable' => $req->get('status') ? 1 : 0
            ]);

        return back();
    }

    private function paymentwithpin(Request $req)
    {
        $input = $req->get('pin');
        $kasirSettings = session()->get('settings');

        $api = $this->models['api']::where([
            ['mode', 'payment'],
            ['token', $kasirSettings->api->token],
            ['value', '!=', ''],
        ])
            ->first();

        if (!$api) {
            return back();
        }

        $kasir = $this->models['kasir_settings']::where('payment_api_id', $api->id)->first();

        $murid = $this->models['murid']::where('card_id', $api->value2)->first();
        $setting = $this->models['murid_settings']::where([
            ['murid_id', $murid->id],
            ['pin', $input],
        ])
            ->first();

        if (!$setting) {
            return back();
        }

        $newBalance = $setting->balance - $api->value;
        $newSpent = $setting->spent + $api->value;

        app()->call([History::class, 'make'], ['data' => [
            'payment_users_id' => 0,
            'murid_id' => $murid->id,
            'image' => 'assets/murid_history.jpeg',
            'title' => 'Pembelian',
            'body' => 'Anda telah melakukan pembelian di ' . $api->name,
            'price' => $api->value
        ]]);

        app()->call([History::class, 'make'], ['data' => [
            'payment_users_id' => $kasir->payment_users_id,
            'murid_id' => 0,
            'image' => 'assets/murid_history.jpeg',
            'title' => 'Penjualan',
            'body' => 'Anda telah menerima saldo dari ' . $murid->name,
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
            'value' => '',
            'value2' => '',
            'command' => ''
        ]);

        return back();
    }
}
