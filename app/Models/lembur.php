<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lembur extends Model
{
    protected $fillable = [
        'id_gaji',
        'total_jam_lembur',
        'uang_lembur',
        'total_uang_lembur',
        'periode_gaji',
    ];

    public function tbl_gaji()
    {
        return $this->belongsTo('App\Models\gaji');
    }

    public function tbl_dtl_jam_hadir() {
        return $this->hasMany('App\Models\DetailAbsen');
    }
}