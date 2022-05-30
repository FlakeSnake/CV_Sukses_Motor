<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\absen;
use App\Models\lembur;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create(
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => '$2y$10$t0k7x5fgl.r.Z55sRU6U/O84XuHYMWOzmX0dcTD8svqygmtcgMH9K',
                'jabatan' => 'Admin',
                'no_telp' => '089123456789',
                'alamat' => 'jln.admin',
                'jenis_kelamin' => 'Laki-laki',
                'agama' => 'Kristen',
                'tempat_kelahiran' => 'Palembang',
                'tanggal_kelahiran' => '1999-08-21',
                'gaji_pokok' => 1500000
            ]
        );
    }
}
