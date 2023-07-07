<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MuridSettings extends Model
{
    use HasFactory;

    protected $table = 'payment_murid_settings';

    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $fillable = ['payment_users_id', 'murid_id', 'balance', 'spent', 'daily_limit', 'pin', 'disable'];

    public function role() {
        return $this->belongsTo(Role::class);
    }

    public function murid() {
        return $this->hasOne(Murid::class);
    }
}
