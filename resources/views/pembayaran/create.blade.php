@extends('layouts/admin')
@section('title','Add Payment')

@section('content')
<div class="container">
    <div class="card shadow mb-4" style="width: 700px;">
        <div class="ml-5">
            <h1 class="mt-3">Add Payment</h1>
            <div class="row ">
                <div class="col-md-8">
                    <form method="post" action="{{ route('pembayaran.store') }}" enctype="multipart/form-data">
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
                            <input type="date" class="form-control @error('tanggal_pembayaran') is-invalid @enderror" id="tanggal_pembayaran" name="tanggal_pembayaran" value="{{ old('tanggal_pembayaran')}}">
                            <div class="invalid-feedback">
                                @error('tanggal_pembayaran')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="keterangan_pembayaran" class="form-label">Payment Information</label>
                            <input type="text" class="form-control @error('keterangan_pembayaran') is-invalid @enderror" id="keterangan_pembayaran" placeholder="Insert the Payment Information" name="keterangan_pembayaran" value="{{ old('keterangan_pembayaran')}}">
                            <div class="invalid-feedback">
                                @error('keterangan_pembayaran')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="metode_pembayaran" class="form-label">Payment Method</label><br>
                            <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                                <option value="Transfer" id="metode_pembayaran" name="metode_pembayaran" value="{{old('metode_pembayaran')}}">Transfer</option>
                                <option value="Cash" id="metode_pembayaran" name="metode_pembayaran" value="{{old('metode_pembayaran')}}">Cash</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="jumlah_pembayaran" class="form-label">Total Payment</label>
                            <input type="number" class="form-control @error('jumlah_pembayaran') is-invalid @enderror" id="jumlah_pembayaran" placeholder="Insert the Total Payment" name="jumlah_pembayaran" value="{{ old('jumlah_pembayaran')}}">
                            <div class="invalid-feedback">
                                @error('jumlah_pembayaran')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        {{-- <div class="mb-2">
                            <label for="alamat" class="form-label">Address</label>
                            <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="Insert your Address" name="alamat" value="{{ old('alamat')}}">
                            <div class="invalid-feedback">
                                @error('alamat')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="" class="form-label">Role</label><br>
                            <select class="form-control" name="jabatan" id="jabatan">
                                <option value="Admin" id="jabatan" name="jabatan" value="{{old('jabatan')}}">Admin</option>
                                <option value="Pegawai" id="jabatan" name="jabatan" value="{{old('jabatan')}}">Pegawai</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="nomor_rekening_bank" class="form-label">Bank Account</label>
                            <input type="text" class="form-control @error('nomor_rekening_bank') is-invalid @enderror" id="nomor_rekening_bank" placeholder="Insert your Bank Account" name="nomor_rekening_bank" value="{{ old('nomor_rekening_bank')}}">
                            <div class="invalid-feedback">
                                @error('nomor_rekening_bank')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="agama" class="form-label">Religion</label>
                            <input type="text" class="form-control @error('agama') is-invalid @enderror" id="agama" placeholder="Insert your Religion" name="agama" value="{{ old('agama')}}">
                            <div class="invalid-feedback">
                                @error('agama')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="gaji_pokok" class="form-label">Gaji Pokok</label>
                            <input type="text" class="form-control @error('gaji_pokok') is-invalid @enderror" id="gaji_pokok" placeholder="Insert your Religion" name="gaji_pokok" value="{{ old('gaji_pokok')}}">
                            <div class="invalid-feedback">
                                @error('gaji_pokok')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="total_peminjaman" class="form-label">Total Peminjaman</label>
                            <input type="text" class="form-control @error('total_peminjaman') is-invalid @enderror" id="total_peminjaman" placeholder="Insert your Religion" name="total_peminjaman" value="{{ old('total_peminjaman')}}">
                            <div class="invalid-feedback">
                                @error('total_peminjaman')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="">Profile Picture</label>
                            <input type="file" name="foto_karyawan" class="form-control">
                            @error('foto_karyawan')
                                {{ $message }}
                            @enderror
                        </div> --}}
                        <button type="submit" class="btn btn-primary mb-5">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
