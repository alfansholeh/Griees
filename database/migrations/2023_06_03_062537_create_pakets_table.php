<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('pakets', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->integer("price");
            $table->integer("active");
            $table->string("spec");
            $table->timestamps();
        });
        DB::table("pakets")->insert([
            "name"=>"Paket Silver",
            "price"=>100000,
            "active"=>3,
            "spec"=>"Fitur lengkap dengan limited storage data dan pengguna"
        ]);
        DB::table("pakets")->insert([
            "name"=>"Paket Platinum",
            "price"=>300000,
            "active"=>6,
            "spec"=>"Fitur lengkap dengan limited storage data dan pengguna"
        ]);
        DB::table("pakets")->insert([
            "name"=>"Paket Gold",
            "price"=>500000,
            "active"=>12,
            "spec"=>"Fitur lengkap dengan unlimited storage data dan pengguna"
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pakets');
    }
};
