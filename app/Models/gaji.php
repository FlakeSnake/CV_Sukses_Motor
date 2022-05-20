<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gaji extends Model
{
    protected $table = 'tbl_gaji';
    protected $primaryKey = 'id_gaji';

    protected $fillable = [
        'id_user',
        'total_gaji',
        'periode_gaji',
    ];

    public function Users()
    {
        return $this->belongsTo('App\Models\User','id_user','id');
    }

    public function tbl_lembur() {
        return $this->hasMany('App\Models\lembur');
    }

    public function tbl_absensi() {
        return $this->hasMany('App\Models\absensi');
    }
}
