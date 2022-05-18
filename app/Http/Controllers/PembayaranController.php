<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PembayaranController extends Controller
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
        $pembayaran = Pembayaran::all();
        return view('pembayaran.index', compact('pembayaran'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();
        $pembayaran = Pembayaran::has('Users')->get();
        return view('pembayaran.create', ['user' => $user, 'pembayaran' => $pembayaran]);
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
        Pembayaran::create([
            'users_id' => $request->users_id,
            'tanggal_pembayaran' => $request->tanggal_pembayaran,
            'keterangan_pembayaran' => $request->keterangan_pembayaran,
            'metode_pembayaran' => $request->metode_pembayaran,
            'jumlah_pembayaran' => $request->jumlah_pembayaran,
        ]);
        return redirect('/pembayaran')->with('status', 'Data Saved Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Pembayaran $pembayaran)
    {
        //
        return view('pembayaran.edit')->with('Pembayaran', $pembayaran);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pembayaran $pembayaran)
    {
        //
        Pembayaran::where('id_bayar', $pembayaran->id_bayar)
            ->update([
            'tanggal_pembayaran' => $request->tanggal_pembayaran,
            'keterangan_pembayaran' => $request->keterangan_pembayaran,
            'metode_pembayaran' => $request->metode_pembayaran,
            'jumlah_pembayaran' => $request->jumlah_pembayaran,
            ]);

            return redirect('/pembayaran')->with('status', 'Data Successfully Changed!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembayaran $pembayaran)
    {
        //
        $pembayaran->delete();
        return redirect('/pembayaran')->with('status', 'Data Successfully Deleted');
    }
}
