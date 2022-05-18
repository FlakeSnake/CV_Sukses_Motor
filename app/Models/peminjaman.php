<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class peminjaman extends Model
{

    protected $table = 'tbl_peminjaman';
    protected $primaryKey = 'id_pinjam';

    protected $fillable = [
        'id_user',
        'alasan_peminjaman',
        'tanggal_peminjaman',
        'jumlah_peminjaman',
    ];

    public function Users()
    {
        return $this->belongsTo('App\Models\User', 'id_user', 'id');
    }
}
