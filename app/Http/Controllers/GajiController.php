<?php

namespace App\Http\Controllers;

use App\Models\gaji;
use App\Models\User;
use Illuminate\Http\Request;

class GajiController extends Controller
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
        $gaji = gaji::all();
        return view('gaji.index', compact('gaji'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();
        return view('gaji.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $gajiuser = User::where('id', $request->id_user)->first()->gaji_pokok;
        gaji::create([
            'id_user' => $request->id_user,
            'total_gaji' => $gajiuser,
            'periode_gaji' => $request->periode_gaji,
        ]);
        return redirect('/gaji')->with('status', 'Salary Data for ' . User::where('id', $request->id_user)->first()->name . ' in ' . date("M-Y",strtotime($request->periode_gaji)) . ' Saved Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\gaji  $gaji
     * @return \Illuminate\Http\Response
     */
    public function show(gaji $gaji)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\gaji  $gaji
     * @return \Illuminate\Http\Response
     */
    public function edit(gaji $gaji)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\gaji  $gaji
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, gaji $gaji)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\gaji  $gaji
     * @return \Illuminate\Http\Response
     */
    public function destroy(gaji $gaji)
    {
        //
    }
}
