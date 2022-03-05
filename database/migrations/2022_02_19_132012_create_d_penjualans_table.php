<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDPenjualansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('d_penjualans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_h_penjualan')->constrained('h_penjualans');
            $table ->integer('id_obat');
            $table->string('nama_obat');
            $table->float('jumlah');
            $table->string('satuan');
            $table->double('harga');
            $table->double('subtotal');
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
        Schema::dropIfExists('d_penjualans');
    }
}
