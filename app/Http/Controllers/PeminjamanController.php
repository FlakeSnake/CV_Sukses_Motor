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
        return view('peminjaman.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        peminjaman::create($request->all());
        $peminjaman = User::findOrFail($request->id_user);
        $peminjaman->total_peminjaman += $request->jumlah_peminjaman;
        $peminjaman->save();

        return redirect('/peminjaman')->with('status', 'Loan Data For ' . User::where('id', $request->id_user)->first()->name . ' Saved Successfully!');
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
            $bayar = $request->jumlah_peminjaman;
            User::where('id', $peminjaman->id_user)
                ->update([
                    'total_peminjaman' => $bayar
                ]);

        return redirect('/peminjaman')->with('status', 'Data Successfully Changed!');
        // $user = User::where('id', $peminjaman->id_user)->first()->total_peminjaman;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function destroy(peminjaman $peminjaman)
    {
        $user = User::where('id', $peminjaman->id_user)->first()->total_peminjaman;
        if( $user >= $peminjaman->jumlah_peminjaman) {
            $bayar = $user - $peminjaman->jumlah_peminjaman;
            peminjaman::Where('id_pinjam', 'id_pinjam')->delete();
             User::where('id', $peminjaman->id_user)
            ->update([
                'total_peminjaman' => $bayar
            ]);
            $peminjaman->delete();
            return redirect('/peminjaman')->with('status', 'Loan Data for ' . User::where('id', $peminjaman->id_user)->first()->name . ' Successfully Deleted!');
        } else {
            return redirect('/peminjaman')->with('statusdel', 'This User Already have Payment!');
        }
    }
}
