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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->enum("kategori_transaksi", ["pemesanan", "pembelian"]);
            $table->integer("jumlah_pembayaran");
            $table->integer("total");
            $table->foreignId("user_id")->constrained();
            $table->enum("status_pembayaran", ["DP", "lunas"]);
            $table->text("keterangan");
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
        Schema::dropIfExists('transaksis');
    }
};
