@extends('layouts/admin')
@section('title','Edit Loan')

@section('content')
<div class="container">
    <div class="card shadow mb-4" style="width: 700px;">
        <div class="ml-5">
            <h1 class="mt-3">Edit user profile</h1>
            <div class="row ">
                <div class="col-md-8">
                    <form method="POST" action="{{ route('peminjaman.update',['peminjaman'=>$peminjaman->id_pinjam])}}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="mb-2">
                            <label for="alasan_peminjaman" class="form-label">Reason for Borrowing</label>
                            <input type="text" class="form-control @error('alasan_peminjaman') is-invalid @enderror" id="alasan_peminjaman" placeholder="Masukkan tempat lahir" name="alasan_peminjaman" value="{{ $peminjaman->alasan_peminjaman}}">
                            <div class="invalid-feedback">
                                @error('alasan_peminjaman')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="tanggal_peminjaman" class="form-label">Loan Date</label>
                            <input type="date" class="form-control @error('tanggal_peminjaman') is-invalid @enderror" id="tanggal_peminjaman" placeholder="Enter Payment Date" name="tanggal_peminjaman" value="{{ $peminjaman->tanggal_peminjaman}}">
                            <div class="invalid-feedback">
                                @error('tanggal_peminjaman')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="jumlah_peminjaman" class="form-label">Loan Amount</label><br>
                            <input type="text" class="form-control @error('jumlah_peminjaman') is-invalid @enderror" id="jumlah_peminjaman" placeholder="Enter Payment Date" name="jumlah_peminjaman" value="{{ $peminjaman->jumlah_peminjaman}}">
                            <div class="invalid-feedback">
                                @error('jumlah_peminjaman')
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
