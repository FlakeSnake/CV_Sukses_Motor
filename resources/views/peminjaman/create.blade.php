@extends('layouts/admin')
@section('title','Add Loan')

@section('content')
<div class="container">
    <div class="card shadow mb-4" style="width: 700px;">
        <div class="ml-5">
            <h1 class="mt-3">Add Loan</h1>
            <div class="row ">
                <div class="col-md-8">
                    <form method="post" action="{{ route('peminjaman.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-2">
                            <label for="" class="form-label">Name</label><br>
                            <select class="form-control" name="id_user" id="id_user">
                                @foreach ($user as $us)
                                    <option value="{{ $us->id }}">{{ $us->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="alasan_peminjaman" class="form-label">Reason for Borrowing</label>
                            <input type="text" class="form-control @error('alasan_peminjaman') is-invalid @enderror" id="alasan_peminjaman" placeholder="Insert the Reason for Borrowing" name="alasan_peminjaman" value="{{ old('alasan_peminjaman')}}" required>
                            <div class="invalid-feedback">
                                @error('alasan_peminjaman')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="tanggal_peminjaman" class="form-label">Loan Date</label>
                            <input type="date" class="form-control @error('tanggal_peminjaman') is-invalid @enderror" id="tanggal_peminjaman" name="tanggal_peminjaman" value="{{ old('tanggal_peminjaman')}}" required>
                            <div class="invalid-feedback">
                                @error('tanggal_peminjaman')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="jumlah_peminjaman" class="form-label">Loan Amount</label>
                            <input type="number" class="form-control @error('jumlah_peminjaman') is-invalid @enderror" id="jumlah_peminjaman" placeholder="Insert the Loan Amount" name="jumlah_peminjaman" value="{{ old('jumlah_peminjaman')}}" required>
                            <div class="invalid-feedback">
                                @error('jumlah_peminjaman')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <a href="{{ route('peminjaman.index')}}" class="btn btn-info mb-5"><i class="fas fa-arrow-left"> Cancel</i></a>
                        <button type="submit" class="btn btn-primary mb-5">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
