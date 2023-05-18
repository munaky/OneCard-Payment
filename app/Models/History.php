<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $table = 'payment_history';

    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $fillable = ['murid_id', 'image', 'title', 'body', 'price'];

    public function murid() {
        return $this->belongsTo(Murid::class);
    }
}
