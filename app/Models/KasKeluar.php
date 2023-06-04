<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KasKeluar extends Model
{
    use HasFactory;
    protected $fillable = [
        "created_at",
        "jenis_pengeluaran",
        "jumlah_pengeluaran",
        "keterangan",
        "user_id",
        "bukti",
        "usaha_id",
        "day_id"
    ];

    public function day(){
        return $this->belongsTo(Day::class);
    }
}
