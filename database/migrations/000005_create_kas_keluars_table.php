<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kas_keluars', function (Blueprint $table) {
            $table->id();
            $table->enum("jenis_pengeluaran", ["Gaji", "Belanja Bahan", "Lainnya"]);
            $table->integer("jumlah_pengeluaran");
            $table->foreignId("user_id")->constrained();
            $table->string("keterangan");
            $table->string("bukti");
            $table->foreignId("usaha_id")->constrained();
            $table->foreignId("day_id")->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kas_keluars');
    }
};
