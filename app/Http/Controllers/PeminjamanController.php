<?php

namespace App\Http\Controllers;

use App\Models\peminjaman;
use App\Models\User;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peminjaman = peminjaman::all();
        return view('peminjaman.index', compact('peminjaman'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();
        $peminjaman = peminjaman::has('Users')->get();
        return view('peminjaman.create', ['user' => $user, 'peminjaman' => $peminjaman]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        peminjaman::create([
            'users_id' => $request->users_id,
            'alasan_peminjaman' => $request->alasan_peminjaman,
            'tanggal_peminjaman' => $request->tanggal_peminjaman,
            'jumlah_peminjaman' => $request->jumlah_peminjaman,
        ]);
        return redirect('/peminjaman')->with('status', 'Data Saved Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function show(peminjaman $peminjaman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function edit(peminjaman $peminjaman)
    {
        //
        return view('peminjaman.edit')->with('peminjaman', $peminjaman);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, peminjaman $peminjaman)
    {
        //
        peminjaman::where('id_pinjam', $peminjaman->id_pinjam)
            ->update([
                'alasan_peminjaman' => $request->alasan_peminjaman,
                'tanggal_peminjaman' => $request->tanggal_peminjaman,
                'jumlah_peminjaman' => $request->jumlah_peminjaman,
            ]);

        return redirect('/peminjaman')->with('status', 'Data Successfully Changed!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function destroy(peminjaman $peminjaman)
    {
        //
        $peminjaman->delete();
        return redirect('/peminjaman')->with('status', 'Data Successfully Deleted');
    }
}
