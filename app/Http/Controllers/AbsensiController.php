<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\absen;
use App\Models\DetailAbsen;
use App\Models\gaji;
use App\Models\User;

class AbsensiController extends Controller
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
        $absen = absen::all();
        return view('absen.index', compact('absen'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $detail = DetailAbsen::all();
        $gaji = gaji::all();
        $user = User::all();
        return view('absen.create', compact('user', 'detail', 'gaji'));
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
        // absen::create([
        //     'id_gaji' => $request->id_gaji,
        //     'jumlah_hadir' => $request->jumlah_hadir,
        //     'periode_gaji' => $request->periode_gaji,
        // ]);

        // return redirect('/absen')->with('status', 'Data Saved Successfully !');

        $total = $request->jumlah_hadir * 15000;
        absen::create([
            'id_gaji' => $request->id_gaji,
            'jumlah_hadir' => $request->jumlah_hadir,
            'total_uang_absen' => $total
        ]);

        $jumlah_gaji = gaji::where('id_gaji', $request->id_gaji)->first()->total_gaji;
        gaji::where('id_gaji', $request->id_gaji)
            ->update([
                'total_gaji' => $jumlah_gaji + $total
            ]);

        return redirect('/absen')->with('status', 'Data Saved Successfully !');
    }

    public function tambah(gaji $gaji, Request $request)
    {
        $id_gaji = gaji::where('id_gaji', $request->id_gaji)->first()->id_gaji;
        //dd($id_gaji);
        return view('absen.create', compact('id_gaji'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function show(absen $absen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function edit(absen $absen)
    {
        //
        return view('absen.edit')->with('absen', $absen);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, absen $absen)
    {
        //
        absen::where('id_bayar', $absen->id_bayar)
            ->update([
            'tanggal_absen' => $request->tanggal_absen,
            'keterangan_absen' => $request->keterangan_absen,
            'metode_absen' => $request->metode_absen,
            'jumlah_absen' => $request->jumlah_absen,
            ]);

            return redirect('/absen')->with('status', 'Data Successfully Changed!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function destroy(absen $absen)
    {
        //
        $absen->delete();
        return redirect('/absen')->with('status', 'Data Successfully Deleted');
    }
}
