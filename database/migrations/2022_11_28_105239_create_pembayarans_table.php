<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('kendaraan_id');
            $table->unsignedBigInteger('user_id');
            $table->string('nama');
            $table->string('nama_kendaraan');
            $table->integer('total_harga');
            $table->string('metode_pembayaran');
            $table->string('bukti_pembayaran');

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
        Schema::dropIfExists('pembayarans');
    }
}
