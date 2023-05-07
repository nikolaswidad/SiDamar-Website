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
        Schema::create('arsip_films', function (Blueprint $table) {
            $table->id();
            $table->string('produser');
            $table->string('sutradara');
            $table->string('distributor');
            $table->string('email');
            $table->string('nomor_telepon');
            $table->string('medsos');
            $table->string('rumah_produksi');
            $table->string('judul_film');
            $table->string('tahun_produksi');
            $table->string('durasi');
            $table->string('kategori');
            $table->string('link_film');
            //boolean type for pernyaataan
            $table->boolean('pernyataan');
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
        Schema::dropIfExists('arsip_films');
    }
};
