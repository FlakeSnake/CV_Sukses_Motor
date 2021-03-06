<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\gaji;
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

    public function list()
    {
        $user = User::where('total_peminjaman','>',0)->get();
        return view('user.list', compact('user'));
    }

    public function create()
    {
        $users = User::all();
        return view('user.create', compact('users'));
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

        // $request->validate([
        //     'name' =>'required',
        //     'email' => 'required',
        //     'jabatan' =>'required',
        //     'alamat' =>'required',
        //     'no_telp' =>'required',
        //     'jenis_kelamin' =>'required',
        //     'nomor_rekening_bank' => 'required',
        //     'agama' => 'required',
        //     'tempat_kelahiran' =>'required',
        //     'tanggal_kelahiran' => 'required',
        //     'gaji_pokok' => 'required',
        //     'total_peminjaman' => 'required',
        //     'foto_karyawan' => 'image|file'
        //     ]);

        if(User::where('email', $request->email)->count() > 0) {
            return redirect('/user/create')->with('statusdel', 'E-Mail ' . $request->email . ' has been taken!');
        }

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
            'password' => hash::make($request->tanggal_kelahiran),
            //'total_peminjaman' => $request->total_peminjaman,
            // 'foto_karyawan' => $request->file('foto_karyawan')->store('post-images')
        ]);

        if ($request->file('foto_karyawan') == null) {
            $request->foto_karyawan = $request->foto_karyawan;
        }else{
            $request->foto_karyawan = User::where('email', $request->email)->update(['foto_karyawan' => $request->file('foto_karyawan')->store('post-images')]);
        }
        return redirect('/user')->with('status', 'Data ' . $request->name . ' Saved Successfully!');
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
        if(User::where('email', $request->email)->count() > 1) {
            return redirect('/user/'. $user->id .'/edit')->with('statusdel', 'E-Mail ' . $request->email . ' has been taken!');
        }

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

            return redirect('/user')->with('status', 'Data ' . $request->name . ' Successfully Changed!');

    }

    public function editpass(User $user) {
        return view('user.editpass')->with('User', $user);
    }

    public function updatepass(Request $request,User $user)
    {
        if($request->password != $request->password2) {
            return redirect('/user')->with('statusdel', 'The Password is not the same!');
        }
        User::where('id',$user->id)
                ->update([
                    'password' => hash::make($request->password)
                ]);
        return redirect('/user')->with('status','Password for ' . $user->name . ' Successfully Changed!');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/user')->with('status', 'Data ' . $user->name . ' Successfully Deleted!');
    }


}

