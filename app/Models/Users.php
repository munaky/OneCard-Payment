<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    protected $table = 'payment_users';

    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $fillable = ['name', 'role_id', 'username', 'password'];

    public function role() {
        return $this->belongsTo(Role::class);
    }

    public function murid_settings() {
        return $this->hasOne(MuridSettings::class, 'payment_users_id');
    }
}
