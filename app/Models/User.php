<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $table = 'Users';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'jabatan',
        'alamat',
        'no_telp',
        'jenis_kelamin',
        'nomor_rekening_bank',
        'foto_karyawan',
        'agama',
        'tempat_kelahiran',
        'tanggal_kelahiran',
        'gaji_pokok',
        'total_peminjaman',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function peminjaman() {
        return $this->belongsTo('App\Models\peminjaman','id', 'id_user');
    }

    public function pembayaran() {
        return $this->hasMany('App\Models\Pembayaran');
    }

    public function gaji() {
        return $this->belongsTo('App\Models\gaji','id','id_user');
    }

    // public function lembur() {
    //     return $this->belongsTo('App\Models\lembur','id','id_gaji');
    // }

    // public function absen() {
    //     return $this->hasMany('App\Models\absen','id','id_gaji');
    // }

}
