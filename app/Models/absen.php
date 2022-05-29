<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class absen extends Model
{
    protected $table = 'tbl_absensi';

    protected $primaryKey = 'id_absensi';

    protected $fillable = [
        'id_gaji',
        'jumlah_hadir',
        'uang_absen',
        'total_uang_absen',
        'periode_gaji',
    ];

    public function tbl_gaji()
    {
        return $this->belongsTo('App\Models\gaji', 'id_gaji', 'id_user');
    }

    public function Users()
    {
        return $this->belongsTo('App\Models\User','id_gaji','id');
    }
}
