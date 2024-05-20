<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_transaksi')->unique();
            $table->unsignedBigInteger('id_barang');
            $table->date('tgl_transaksi');
            $table->integer('total_bayar');
            $table->integer('kembalian');
            $table->integer('uang_pembeli');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
};
