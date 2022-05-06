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
            $table->integer('total_jam_lembur');
            $table->integer('uang_lembur');
            $table->integer('total_uang_lembur');
            $table->date('periode_gaji');
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
