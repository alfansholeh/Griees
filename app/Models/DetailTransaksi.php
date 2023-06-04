<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    use HasFactory;
    protected $fillable = [
        "produk_id",
        "transaksi_id",
        "jumlah"
    ];
    public function produk(){
        return $this->belongsTo(Produk::class);
    }
    public function transaksi(){
        return $this->belongsTo(Transaksi::class);
    }
}
