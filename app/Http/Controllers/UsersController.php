<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
        return view('user.create');
    }

    public function store(Request $request) {

        // return $request->file('foto_karyawan')->store('post-images');

        // $user = new User;
        // $user->name = $request->input('name');
        // $user->email = $request->input('email');
        // $user->jabatan = $request->input('jabatan');
        // $user->alamat = $request->input('alamat');
        // $user->no_telp = $request->input('no_telp');
        // $user->jenis_kelamin = $request->input('jenis_kelamin');
        // $user->nomor_rekening_bank = $request->input('nomor_rekening_bank');
        // $user->agama = $request->input('agama');
        // $user->tempat_kelahiran = $request->input('tempat_kelahiran');
        // $user->tanggal_kelahiran = $request->input('tanggal_kelahiran');
        // $user->gaji_pokok = $request->input('gaji_pokok');
        // $user->total_peminjaman = $request->input('total_peminjaman');
        // $user->foto_karyawan = $request->input('image');
        // $user->save();
        // return redirect('/home')->with('status', 'Data Saved Successfully !');

        // return $request->file('foto_karyawan')->store('post-images');

        $request->validate([
            'name' =>'required',
            'email' => 'required',
            'jabatan' =>'required',
            'alamat' =>'required',
            'no_telp' =>'required',
            'jenis_kelamin' =>'required',
            'nomor_rekening_bank' => 'required',
            'agama' => 'required',
            'tempat_kelahiran' =>'required',
            'tanggal_kelahiran' => 'required',
            'gaji_pokok' => 'required',
            'total_peminjaman' => 'required',
            'foto_karyawan' => 'image|file'
            ]);

            User::create([
            'name' => $request->name,
            'email' => $request->email,
            'jabatan' => $request->jabatan,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'jenis_kelamin' => $request->jenis_kelamin,
            'nomor_rekening_bank' => $request->nomor_rekening_bank,
            'agama' => $request->agama,
            'tempat_kelahiran' => $request->tempat_kelahiran,
            'tanggal_kelahiran' => $request->tanggal_kelahiran,
            'gaji_pokok' => $request->gaji_pokok,
            'total_peminjaman' => $request->total_peminjaman,
            'foto_karyawan' => $request->file('foto_karyawan')->store('post-images')
        ]);
        return redirect('/home')->with('status', 'Data Saved Successfully !');
    }

    public function show($user)
    {
        $user = User::find($user);
        return view('user.show')->with('User', $user);
    }

    public function edit(User $user) {

        return view('user.edit')->with('User', $user);
    }

    public function update(Request $request, User $user)
    {
        User::where('id', $user->id)
            ->update([
            'name' => $request->name,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'jenis_kelamin' => $request->jenis_kelamin,
            'nomor_rekening_bank' => $request->nomor_rekening_bank,
            'agama' => $request->agama,
            'tempat_kelahiran' => $request->tempat_kelahiran,
            'tanggal_kelahiran' => $request->tanggal_kelahiran,
            'gaji_pokok' => $request->gaji_pokok,
            ]);

            if ($request->file('foto_karyawan') == null) {
                $user->foto_karyawan = $user->foto_karyawan;
            }else{
                $user->foto_karyawan = User::where('id', $user->id)->update(['foto_karyawan' => $request->file('foto_karyawan')->store('post-images')]);
            }

            return redirect('/user')->with('status', 'Data Successfully Changed!');

    }

    public function editpass(User $user) {
        return view('user.editpass')->with('User', $user);
    }

    public function updatepass(Request $request,User $user){

        $request->validate([
            'password' =>'required'
            ]);

        User::where('id',$user->id)
                ->update([
                    'password' => hash::make($request->password)
                ]);
        return redirect('/user')->with('status','Password Pegawai berhasil di update !');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/user')->with('status', 'Data Successfully Deleted');
    }


}

