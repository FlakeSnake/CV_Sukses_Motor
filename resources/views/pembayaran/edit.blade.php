@extends('layouts/admin')
@section('title','Edit User')

@section('content')
<div class="container">
    <div class="card shadow mb-4" style="width: 700px;">
        <div class="ml-5">
            <h1 class="mt-3">Edit user profile</h1>
            <div class="row ">
                <div class="col-md-8">
                    <form method="POST" action="{{ route('pembayaran.update',['pembayaran'=>$Pembayaran->id_bayar])}}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="mb-2">
                            <label for="tanggal_pembayaran" class="form-label">Payment Date</label>
                            <input type="date" class="form-control @error('tanggal_pembayaran') is-invalid @enderror" id="tanggal_pembayaran" placeholder="Enter Payment Date" name="tanggal_pembayaran" value="{{ $Pembayaran->tanggal_pembayaran}}" required>
                            <div class="invalid-feedback">
                                @error('tanggal_pembayaran')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="keterangan_pembayaran" class="form-label">Payment Note</label>
                            <input type="text" class="form-control @error('keterangan_pembayaran') is-invalid @enderror" id="keterangan_pembayaran" placeholder="Masukkan tempat lahir" name="keterangan_pembayaran" value="{{ $Pembayaran->keterangan_pembayaran}}" required>
                            <div class="invalid-feedback">
                                @error('keterangan_pembayaran')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="metode_pembayaran" class="form-label">Payment Method</label><br>
                            <select class="form-control" name="metode_pembayaran" id="metode_pembayaran">
                                <option value="Transfer"    {{ "Transfer" == $Pembayaran->metode_pembayaran ? 'selected' : null }}>Transfer</option>
                                <option value="Cash"        {{ "Cash" == $Pembayaran->metode_pembayaran ? 'selected' : null }}>Cash</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="jumlah_pembayaran" class="form-label">Total Payment</label>
                            <input type="text" class="form-control @error('jumlah_pembayaran') is-invalid @enderror" id="jumlah_pembayaran" placeholder="Masukkan No telepon" name="jumlah_pembayaran" value="{{ $Pembayaran->jumlah_pembayaran}}" required>
                            <div class="invalid-feedback">
                                @error('jumlah_pembayaran')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mb-5">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
