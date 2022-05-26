<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lembur extends Model
{
    protected $table = 'tbl_lembur';

    protected $primaryKey = 'id_lembur';

    protected $fillable = [
        'id_gaji',
        'tanggal_lembur',
        'waktu_lembur_awal',
        'waktu_lembur_akhir',
        'total_jam_lembur',
        'uang_lembur',
        'total_uang_lembur',

    ];

    public function gaji()
    {
        return $this->hasMany('App\Models\gaji', 'id_gaji', 'id_user');
    }

    public function dtl_jam_hadir() {
        return $this->hasMany('App\Models\DetailAbsen');
    }
}
