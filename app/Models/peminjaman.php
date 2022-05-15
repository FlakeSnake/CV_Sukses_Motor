<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class peminjaman extends Model
{

    protected $table = 'tbl_peminjaman';

    protected $fillable = [
        'users_id',
        'alasan_peminjaman',
        'tanggal_peminjaman',
        'jumlah_peminjaman',
    ];

    public function Users()
    {
        return $this->belongsTo('App\Models\Users');
    }
}