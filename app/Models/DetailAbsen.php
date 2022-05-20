<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailAbsen extends Model
{
    protected $table = 'tbl_dtl_jam_hadir';

    protected $primaryKey = 'id_dtl_jam_hadir';

    protected $fillable = [
        'id_lembur',
        'tanggal_lembur',
        'waktu_lembur_awal',
        'waktu_lembur_akhir',
        'jumlah_lembur',
    ];

    public function tbl_lembur()
    {
        return $this->belongsTo('App\Models\lembur');
    }
}
