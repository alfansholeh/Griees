<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $fillable=[
        "nama",
        "ukuran",
        "harga",
        "gambar",
        "deskripsi",
        "varian_id",
        "stok",
        "usaha_id"
    ];

    public function varian(){
        return $this->belongsTo(Varian::class);
    }
}
