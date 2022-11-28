<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerentalansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perentalans', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('kendaraan_id');
            $table->unsignedBigInteger('user_id');
            $table->string('nama');
            $table->string('tipe_kendaraan');
            $table->string('merk_kendaraan');
            $table->string('foto_sim');
            $table->string('foto_ktp');
            $table->date('tanggal_pinjam');
            $table->string('lama_rental');
            $table->integer('harga');
            $table->integer('total_harga');

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
        Schema::dropIfExists('perentalans');
    }
}
