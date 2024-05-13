<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class API extends Model
{
    use HasFactory;

    protected $table = 'payment_api';

    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $fillable = ['id', 'value', 'value2', 'command'];
}
