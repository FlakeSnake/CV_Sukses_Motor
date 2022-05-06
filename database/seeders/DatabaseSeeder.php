<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\absen;
use App\Models\lembur;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        absen::create(
            [ 'uang_absen' => 25000]
        );

        lembur::create(
            [ 'uang_lembur' => 10000]
        );
    }
}
