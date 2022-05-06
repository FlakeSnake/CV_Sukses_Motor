<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDtlJamLemburTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_dtl_jam_hadir', function (Blueprint $table) {
            $table->id('id_dtl_jam_lembur');
            $table->unsignedBigInteger('id_lembur');
            $table->foreign('id_lembur')->references('id_lembur')->on('tbl_lembur');
            $table->date('tanggal_lembur');
            $table->time('waktu_lembur_awal');
            $table->time('waktu_lembur_akhir');
            $table->integer('jumlah_lembur');
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
        Schema::dropIfExists('tbl_dtl_jam_hadir');
    }
}
