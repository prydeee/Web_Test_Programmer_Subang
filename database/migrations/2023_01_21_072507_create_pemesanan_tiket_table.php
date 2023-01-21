<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemesananTiketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemesanan_tiket', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('tiket_id')->unsigned();
            $table->bigInteger('kode_tiket')->nullable();
            $table->string('nama');
            $table->enum('status', ['pending', 'check_in'])->default('pending');
            $table->timestamp('waktu_check_in')->nullable();
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
        Schema::dropIfExists('pemesanan_tiket');
    }
}
