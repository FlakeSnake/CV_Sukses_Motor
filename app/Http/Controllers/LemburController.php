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
        $users = User::all();
        $gaji = gaji::all();
        $lembur = lembur::all();
        return view('lembur.index', compact('lembur', 'users', 'gaji'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // $detail = DetailAbsen::all();
        // $gaji = gaji::all();
        // $user = User::all();
        // return view('lembur.create', compact('detail','user','gaji'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $total = $request->total_jam_lembur * 15000;
        // lembur::create([
        //     'name' => $request->name,
        //     'id_gaji' =>$request->id_gaji,
        //     'total_jam_lembur' => $request->total_jam_lembur,
        //     'periode_gaji' => $request->periode_gaji,
        //     'total_uang_lembur' => $total
        // ]);

        $total = $request->total_jam_lembur * 15000;
        // $period = gaji::where('id_gaji', $request->id_gaji)->first()->total_gaji;
        lembur::create([
            'id_gaji' => $request->id_gaji,
            'tanggal_lembur' => $request->tanggal_lembur,
            'waktu_jam_awal' => $request->waktu_jam_awal,
            'waktu_jam_akhir' => $request->waktu_jam_akhir,
            'total_jam_lembur' => $request->total_jam_lembur,
            'total_uang_lembur' => $total,
            // 'periode_gaji' => $period,
        ]);

        $jumlah_gaji = gaji::where('id_gaji', $request->id_gaji)->first()->total_gaji;
        gaji::where('id_gaji', $request->id_gaji)
            ->update([
                'total_gaji' => $jumlah_gaji + $total
            ]);

        return redirect('/lembur')->with('status', 'Data Saved Successfully !');
    }

    public function tambah(gaji $gaji, Request $request)
    {
        $id_gaji = gaji::where('id_gaji', $request->id_gaji)->first()->id_gaji;
        //dd($id_gaji);
        return view('lembur.create', compact('id_gaji'));
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
    public function destroy(lembur $lembur, Request $request)
    {
        // $gaji = gaji::findorFail($request->id_gaji);
        // if($gaji->total_gaji >= $request->total_jam_lembur){
        //     lembur::create($request->all());
        //     $gaji->total_gaji -= $request->total_jam_lembur * 15000;
        // }
        $lembur = lembur::find('id_gaji');
        $gaji = gaji::find($lembur->total_uang_lembur);
        $gaji->total_gaji += $lembur->jumlah;
        $gaji->save();
        lembur::where('id','id_lembur')->delete();
        $lembur->delete();
        return redirect('/lembur')->with('status', 'Data Successfully Deleted');
    }
}
