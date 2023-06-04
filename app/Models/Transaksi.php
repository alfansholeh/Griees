<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        "kategori_transaksi",
        "jumlah_pembayaran",
        "total",
        "user_id",
        "status_pembayaran",
        "keterangan",
        "usaha_id",
        "day_id"
    ];
    public function details(){
        return $this->hasMany(DetailTransaksi::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function day(){
        return $this->belongsTo(Day::class);
    }
}
