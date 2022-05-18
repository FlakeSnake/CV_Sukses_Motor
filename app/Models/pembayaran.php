<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pembayaran extends Model
{

    protected $table = 'tbl_pembayaran';
    protected $primaryKey = 'id_bayar';

    protected $fillable = [
        'users_id',
        'tanggal_pembayaran',
        'keterangan_pembayaran',
        'metode_pembayaran',
        'jumlah_pembayaran',
    ];

    public function Users()
    {
        return $this->belongsTo('App\Models\User');
    }
}
