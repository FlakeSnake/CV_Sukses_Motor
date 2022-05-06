<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('jabatan');
            $table->string('alamat');
            $table->string('no_telp');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('nomor_rekening_bank')->nullable();
            $table->string('foto_karyawan')->nullable();
            $table->string('agama');
            $table->string('tempat_kelahiran');
            $table->date('tanggal_kelahiran');
            $table->integer('gaji_pokok');
            $table->integer('total_peminjaman');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
