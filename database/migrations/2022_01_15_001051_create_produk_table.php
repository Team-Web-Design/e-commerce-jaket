<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_produk');
            $table->string('jenis_bahan');
            $table->string('gambar_1');
            $table->string('gambar_2');
            $table->string('gambar_3');
            $table->text('deskripsi');
            $table->integer('stok');
            $table->double('harga');
            $table->unsignedBigInteger('id_ukuran');
            $table->unsignedBigInteger('id_kategori');
            $table->foreign('id_ukuran')->references('id')->on('ukuran');
            $table->foreign('id_kategori')->references('id')->on('kategori');
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
        Schema::dropIfExists('produk');
    }
}
