<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usaha extends Model
{
    use HasFactory;

    protected $fillable = [
        "nama",
        "bidang",
        "jumlah_pegawai",
        "activated_at"
    ];

    public function users(){
        return $this->hasMany(User::class);
    }
    public function pegawai(){
        return $this->users()->where("jabatan_id", Jabatan::where("jabatan_name", "pegawai")->first()->id);
    }
}
