<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KasirSettings extends Model
{
    use HasFactory;

    protected $table = 'payment_kasir_settings';

    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $fillable = ['payment_users_id', 'payment_api_id', 'balance'];

    public function api() {
        return $this->belongsTo(API::class, 'payment_api_id');
    }
}
