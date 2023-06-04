<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPaket extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "paket_id",
        "metode",
        "bukti"
    ];

    public function paket(){
        return $this->belongsTo(Paket::class);
    }
}
