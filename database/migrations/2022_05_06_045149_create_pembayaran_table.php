<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_pembayaran', function (Blueprint $table) {
            $table->id('id_bayar');
            $table->foreignId('users_id')
                  ->constrained('users')
                  ->cascadeOnDelete()
                  ->cascadeOnUpdate();
            $table->date('tanggal_pembayaran');
            $table->string('keterangan_pembayaran');
            $table->string('metode_pembayaran');
            $table->integer('jumlah_pembayaran');
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
        Schema::dropIfExists('tbl_pembayaran');
    }
}
