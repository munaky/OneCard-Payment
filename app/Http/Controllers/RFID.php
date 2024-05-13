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

    private function get(Request $req)
    {
        $input = $req->all();

        $mode = $this->models['api']::where('token', $input['token'])->first()->mode;
        $murid = $this->models['murid']::with('murid_settings')
            ->where('card_id', $input['card_id'])
            ->first();

        if($murid->murid_settings && $murid->murid_settings->disable){
            return response()->json(['Kartu Anda Diblokir']);
        }

        return  self::{$mode}($req);
    }

    private function payment(Request $req)
    {
        $input = $req->all();
        $token = $input['token'];
        $cardId = $input['card_id'];

        $api = $this->models['api']::where([
            ['mode', 'payment'],
            ['token', $token],
            ['value', '!=', ''],
        ])->first();

        if (!$api) {
            return response()->json(["Pembayaran Gagal"]);
        }

        $kasir = $this->models['kasir_settings']::where('payment_api_id', $api->id)->first();

        $murid = $this->models['murid']::where('card_id', $cardId)->first();
        $setting = $this->models['murid_settings']::where('murid_id', $murid->id)->first();

        $newBalance = $setting->balance - $api->value;
        $newSpent = $setting->spent + $api->value;

        if ($newSpent >= $setting->daily_limit) {
            $api->update([
                'value2' => $cardId,
                'command' => 'pin_required'
            ]);
            return response()->json(["Limit Tercapai"]);
        }

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
            'value' => 0
        ]);

        return response()->json(['Pembayaran Berhasil']);
    }


    private function topup(Request $req)
    {
        $input = $req->all();
        $token = $input['token'];
        $cardId = $input['card_id'];

        $api = $this->models['api']::where([
            ['mode', 'topup'],
            ['token', $token],
            ['value', '!=', ''],
        ])->first();

        if (!$api) {
            return response()->json(["Topup Gagal"]);
        }

        $admin = $this->models['admin_settings']::where('payment_api_id', $api->id)->first();

        $murid = $this->models['murid']::where('card_id', $cardId)->first();
        $setting = $this->models['murid_settings']::where('murid_id', $murid->id)->first();

        $newBalance = $setting->balance + $api->value;

        app()->call([History::class, 'make'], ['data' => [
            'payment_users_id' => $admin->payment_users_id,
            'murid_id' => 0,
            'image' => 'assets/murid_history.jpeg',
            'title' => 'Topup',
            'body' => 'Anda telah mengirim saldo ke ' . $murid->name,
            'price' => $api->value
        ]]);

        app()->call([History::class, 'make'], ['data' => [
            'payment_users_id' => 0,
            'murid_id' => $murid->id,
            'image' => 'assets/murid_history.jpeg',
            'title' => 'Topup',
            'body' => 'Anda telah menerima saldo',
            'price' => $api->value
        ]]);

        $setting->update([
            'balance' => $newBalance
        ]);

        $api->update([
            'value' => 0
        ]);

        return response()->json(['Topup Berhasil']);
    }

    private function register(Request $req)
    {
        $input = $req->all();
        $token = $input['token'];
        $cardId = $input['card_id'];

        $api = $this->models['api']::where([
            ['mode', 'register'],
            ['token', $token],
        ])->first();

        $murid = $this->models['murid']::with('murid_settings')
            ->where('card_id', $cardId)
            ->first();

        if (!$api || $murid === null || $murid->murid_settings) {
            return response()->json(["Verifikasi Gagal"]);
        }

        $api->update([
            'value' => $cardId
        ]);

        return response()->json(['Verifikasi Berhasil']);
    }
}
