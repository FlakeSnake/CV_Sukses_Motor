@extends('layouts/admin')
@section('title','Create User')

@section('content')
<div class="container">
    <div class="card shadow mb-4" style="width: 700px;">
        <div class="ml-5">
            <h1 class="mt-3">Add User</h1>
            <div class="row ">
                <div class="col-md-8">
                    <form method="post" action="{{ route('user.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-2">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Insert your Name" name="name" value="{{ old('name')}}" required>
                            <div class="invalid-feedback">
                                @error('name')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="email" class="form-label">E-Mail</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Insert your Email" name="email" value="{{ old('email')}}" required>
                            <div class="invalid-feedback">
                                @error('email')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="tempat_kelahiran" class="form-label">Place of Birth</label>
                            <input type="text" class="form-control @error('tempat_kelahiran') is-invalid @enderror" id="tempat_kelahiran" placeholder="Insert your Place of Birth" name="tempat_kelahiran" value="{{ old('tempat_kelahiran')}}" required>
                            <div class="invalid-feedback">
                                @error('tempat_kelahiran')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="date" class="form-label">Birthday</label>
                            <input type="date" class="form-control @error('tanggal_kelahiran') is-invalid @enderror" id="tanggal_kelahiran" placeholder="Insert your Birthday" name="tanggal_kelahiran" value="{{ old('tanggal_kelahiran')}}" required>
                            <div class="invalid-feedback">
                                @error('tanggal_kelahiran')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="" class="form-label">Gender</label><br>
                            <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                                <option value="Laki-Laki" id="jenis_kelamin" name="jenis_kelamin" value="{{old('jenis_kelamin')}}">Laki - Laki</option>
                                <option value="Perempuan" id="jenis_kelamin" name="jenis_kelamin" value="{{old('jenis_kelamin')}}">Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="no_telp" class="form-label">Phone Number</label>
                            <input type="text" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp" placeholder="Insert your Phone Number" name="no_telp" value="{{ old('no_telp')}}" required>
                            <div class="invalid-feedback">
                                @error('no_telp')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="alamat" class="form-label">Address</label>
                            <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="Insert your Address" name="alamat" value="{{ old('alamat')}}" required>
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
                            <input type="text" class="form-control @error('agama') is-invalid @enderror" id="agama" placeholder="Insert your Religion" name="agama" value="{{ old('agama')}}" required>
                            <div class="invalid-feedback">
                                @error('agama')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="gaji_pokok" class="form-label">Gaji Pokok</label>
                            <input type="text" class="form-control @error('gaji_pokok') is-invalid @enderror" id="gaji_pokok" placeholder="Insert your Religion" name="gaji_pokok" value="{{ old('gaji_pokok')}}" required>
                            <div class="invalid-feedback">
                                @error('gaji_pokok')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        {{-- <div class="mb-2">
                            <label for="total_peminjaman" class="form-label">Total Peminjaman</label>
                            <input type="text" class="form-control @error('total_peminjaman') is-invalid @enderror" id="total_peminjaman" placeholder="Insert your Religion" name="total_peminjaman" value="{{ old('total_peminjaman')}}">
                            <div class="invalid-feedback">
                                @error('total_peminjaman')
                                {{$message}}
                                @enderror
                            </div>
                        </div> --}}
                        <div class="mb-2">
                            <label for="">Profile Picture</label>
                            <input type="file" name="foto_karyawan" class="form-control">
                            @error('foto_karyawan')
                                {{ $message }}
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mb-5">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
