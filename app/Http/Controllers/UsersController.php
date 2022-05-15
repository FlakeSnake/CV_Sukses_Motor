<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Hash;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    public function create()
    {
        $this->authorize('create', User::class);
        return view('user.create');
    }

    public function store(Request $request) {
       $this-> authorize('create', User::class);

       $request->validate([
            'name' =>'required|min:5',
            'email' => 'required',
            'jabatan' =>'required',
            'alamat' =>'required',
            'no_telp' =>'required',
            'jenis_kelamin' =>'required',
            'nomor_rekening_bank' => 'required',
            'foto_karyawan' => 'required',
            'agama' => 'required',
            'tempat_kelahiran' =>'required',
            'tanggal_kelahiran' => 'required',
            'gaji_pokok' => 'required',
            'total_peminjaman' => 'required'
        ]);

        //$validateData = $request->validate
            User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'jabatan' => $request->jabatan,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'jenis_kelamin' => $request->jenis_kelamin,
            'nomor_rekening_bank' => $request->nomor_rekening_bank,
            'foto_karyawan' => $request->foto_karyawan,
            'agama' => $request->agama,
            'tempat_kelahiran' => $request->tempat_kelahiran,
            'tanggal_kelahiran' => $request->tanggal_kelahiran,
            'gaji_pokok' => $request->gaji_pokok,
            'total_peminjaman' => $request->total_peminjaman,
        ]);
        return redirect('/home')->with('status', 'Data Saved Successfully !');
    }

    public function show($user)
    {
        $user = User::find($user);
        return view('user.show')->with('User', $user);
    }




}

