<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHPenjualansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('h_penjualans', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_resep');
            $table->date('tanggal');
            $table->string('no_rm_pasien');
            $table->string('no_registrasi_pasien');
            $table->string('nama_pasien');
            $table->string('jenis_pasien');
            $table->double('total');
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
        Schema::dropIfExists('h_penjualans');
    }
}
