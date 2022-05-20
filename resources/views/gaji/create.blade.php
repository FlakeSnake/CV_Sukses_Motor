@extends('layouts/admin')
@section('title','Add Salary')

@section('content')
<div class="container">
    <div class="card shadow mb-4" style="width: 700px;">
        <div class="ml-5">
            <h1 class="mt-3">Add Salary</h1>
            <div class="row ">
                <div class="col-md-8">
                    <form method="post" action="{{ route('gaji.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-2">
                            <label for="" class="form-label">Name</label><br>
                            <select class="form-control" name="users_id" id="users_id">
                                @foreach ($user as $us)
                                    <option value="{{ $us->id }}">{{ $us->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="tanggal_pembayaran" class="form-label">Payment Date</label>
                            <input type="date" class="form-control @error('tanggal_pembayaran') is-invalid @enderror" id="tanggal_pembayaran" name="tanggal_pembayaran" value="{{ old('tanggal_pembayaran')}}" required>
                            <div class="invalid-feedback">
                                @error('tanggal_pembayaran')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="keterangan_pembayaran" class="form-label">Payment Information</label>
                            <input type="text" class="form-control @error('keterangan_pembayaran') is-invalid @enderror" id="keterangan_pembayaran" placeholder="Insert the Payment Information" name="keterangan_pembayaran" value="{{ old('keterangan_pembayaran')}}" required>
                            <div class="invalid-feedback">
                                @error('keterangan_pembayaran')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="metode_pembayaran" class="form-label">Payment Method</label><br>
                            <select class="form-control" name="metode_pembayaran" id="metode_pembayaran">
                                <option value="Transfer" id="metode_pembayaran" name="metode_pembayaran" value="{{old('metode_pembayaran')}}">Transfer</option>
                                <option value="Cash" id="metode_pembayaran" name="metode_pembayaran" value="{{old('metode_pembayaran')}}">Cash</option>
                            </select>
                            <div class="invalid-feedback">
                                @error('keterangan_pembayaran')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="jumlah_pembayaran" class="form-label">Total Payment</label>
                            <input type="number" class="form-control @error('jumlah_pembayaran') is-invalid @enderror" id="jumlah_pembayaran" placeholder="Insert the Total Payment" name="jumlah_pembayaran" value="{{ old('jumlah_pembayaran')}}" required>
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
