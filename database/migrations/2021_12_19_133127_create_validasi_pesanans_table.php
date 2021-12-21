<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateValidasiPesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('validasi_pesanans', function (Blueprint $table) {
            $table->id();
            $table->String('alamat');
            $table->string('no_hp');
            $table->String('Upload_design')->nullable();
            $table->String('rekening');
            $table->String('review_pesanan');
            $table->String('bukti_pembayaranphp')->nullable();
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
        Schema::dropIfExists('validasi_pesanans');
    }
}
