<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLemburTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_lembur', function (Blueprint $table) {
            $table->id('id_lembur');
            $table->unsignedBigInteger('id_gaji');
            $table->foreign('id_gaji')->references('id_gaji')->on('tbl_gaji');
            $table->date('tanggal_lembur');
            $table->time('waktu_jam_awal');
            $table->time('waktu_jam_akhir');
            $table->integer('uang_lembur')->default(15000);
            $table->integer('total_uang_lembur')->nullable();
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
        Schema::dropIfExists('tbl_lembur');
    }
}
