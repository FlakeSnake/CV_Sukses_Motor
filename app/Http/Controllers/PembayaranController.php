<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\peminjaman;
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
        $peminjaman = peminjaman::all();
        if(count($peminjaman) == 0) {
            return redirect('/pembayaran')->with('statusdel','There is no Loan right now!');
        }
        $user = User::where('total_peminjaman','>',0)->get();
        return view('pembayaran.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::findorFail($request->users_id);
        if($user->total_peminjaman >= $request->jumlah_pembayaran){
            if($request->metode_pembayaran == 'Transfer' && $user->nomor_rekening_bank == null) {
                return redirect('/pembayaran')->with('statusdel', User::where('id', $request->users_id)->first()->name . ' doesn`t have a Bank Account!');
            }
            Pembayaran::create($request->all());
            $user->total_peminjaman -= $request->jumlah_pembayaran;
            $user->save();
            return redirect('/pembayaran')->with('status','Payment Data for ' . User::where('id', $request->users_id)->first()->name . ' Saved Successfully!');
        }else{
            if($user->total_peminjaman == 0) {
                return redirect('/pembayaran')->with('statusdel', User::where('id', $request->users_id)->first()->name . ' doesn`t have a Loan!');
            }
            return redirect('/pembayaran/create')->with('statusdel', User::where('id', $request->users_id)->first()->name . '`s  debt' . ' Is Rp.' .  User::where('id', $request->users_id)->first()->total_peminjaman);
        }
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembayaran $pembayaran)
    {
        $user = User::where('id', $pembayaran->users_id)->first()->total_peminjaman;
        $bayar = $user + $pembayaran->jumlah_pembayaran;
        pembayaran::Where('id_bayar', 'id_bayar')->delete();
        User::where('id', $pembayaran->users_id)
        ->update([
            'total_peminjaman' => $bayar
        ]);

        $pembayaran->delete();
        return redirect('/pembayaran')->with('status', 'Payment Data For ' . User::where('id', $pembayaran->users_id)->first()->name . ' Successfully Deleted!');
    }
}
