<?php

namespace App\Http\Controllers;

use App\Models\DetailAbsen;
use App\Models\gaji;
use App\Models\lembur;
use App\Models\User;
use Illuminate\Http\Request;

class LemburController extends Controller
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
        $lembur = lembur::all();
        return view('lembur.index', compact('lembur'));

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
        return view('lembur.create', compact('detail','user','gaji'));
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
        lembur::create([
            'id_gaji' => $request->id_gaji,
            'total_jam_lembur' => $request->total_jam_lembur,
            'periode_gaji' => $request->periode_gaji,
        ]);

        return redirect('/lembur')->with('status', 'Data Saved Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\lembur  $lembur
     * @return \Illuminate\Http\Response
     */
    public function show(lembur $lembur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\lembur  $lembur
     * @return \Illuminate\Http\Response
     */
    public function edit(lembur $lembur)
    {
        //
        return view('lembur.edit')->with('lembur', $lembur);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\lembur  $lembur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, lembur $lembur)
    {
        //
        lembur::where('id_bayar', $lembur->id_bayar)
            ->update([
            'tanggal_lembur' => $request->tanggal_lembur,
            'keterangan_lembur' => $request->keterangan_lembur,
            'metode_lembur' => $request->metode_lembur,
            'jumlah_lembur' => $request->jumlah_lembur,
            ]);

            return redirect('/lembur')->with('status', 'Data Successfully Changed!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\lembur  $lembur
     * @return \Illuminate\Http\Response
     */
    public function destroy(lembur $lembur)
    {
        //
        $lembur->delete();
        return redirect('/lembur')->with('status', 'Data Successfully Deleted');
    }
}
