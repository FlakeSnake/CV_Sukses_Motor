@extends('layouts/admin')
@section('title','Edit User')

@section('content')
<div class="container">
    <a href="{{ route('user.index')}}" class="btn btn-info mb-2"><i class="fas fa-arrow-left"> Cancel</i></a>
    <div class="card shadow mb-4" style="width: 700px;">
        <div class="ml-5">
            <h1 class="mt-3">Edit user profile</h1>
            <div class="row ">
                <div class="col-md-8">
                    <form method="POST" action="{{ route('user.update',['user'=>$User->id])}}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="mb-2">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Insert your Name" name="name" value="{{ $User->name}}">
                            <div class="invalid-feedback">
                                @error('name')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="email" class="form-label">E-Mail</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Insert your E-Mail" name="email" value="{{ $User->email}}">
                            <div class="invalid-feedback">
                                @error('email')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="tempat_kelahiran" class="form-label">Place of Birth</label>
                            <input type="text" class="form-control @error('tempat_kelahiran') is-invalid @enderror" id="tempat_kelahiran" placeholder="Insert your Place of Birth" name="tempat_kelahiran" value="{{ $User->tempat_kelahiran}}">
                            <div class="invalid-feedback">
                                @error('tempat_kelahiran')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="date" class="form-label">Birthday</label>
                            <input type="date" class="form-control @error('tanggal_kelahiran') is-invalid @enderror" id="tanggal_kelahiran" name="tanggal_kelahiran" value="{{ $User->tanggal_kelahiran}}">
                            <div class="invalid-feedback">
                                @error('tanggal_kelahiran')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="jenis_kelamin" class="form-label">Gender</label><br>
                            <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                                <option value="Laki-laki" {{ "Laki-laki" == $User->jenis_kelamin ? 'selected' : null }}>Laki - Laki</option>
                                <option value="Perempuan" {{ "Perempuan" == $User->jenis_kelamin ? 'selected' : null }}>Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="no_telp" class="form-label">Phone Number</label>
                            <input type="text" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp" placeholder="Insert your Phone Number" name="no_telp" value="{{ $User->no_telp}}">
                            <div class="invalid-feedback">
                                @error('no_telp')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="alamat" class="form-label">Address</label>
                            <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="Insert your Address" name="alamat" value="{{ $User->alamat}}">
                            <div class="invalid-feedback">
                                @error('alamat')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="nomor_rekening_bank" class="form-label">Bank Account</label>
                            <input type="text" class="form-control @error('nomor_rekening_bank') is-invalid @enderror" id="nomor_rekening_bank" placeholder="Insert your Bank Account" name="nomor_rekening_bank" value="{{ $User->nomor_rekening_bank}}">
                            <div class="invalid-feedback">
                                @error('nomor_rekening_bank')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="agama" class="form-label">Religion</label>
                            <input type="text" class="form-control @error('agama') is-invalid @enderror" id="agama" placeholder="Insert your Religion" name="agama" value="{{ $User->agama}}">
                            <div class="invalid-feedback">
                                @error('agama')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="gaji_pokok" class="form-label">Gaji Pokok</label>
                            <input type="text" class="form-control @error('gaji_pokok') is-invalid @enderror" id="gaji_pokok" placeholder="Insert your Primary Salary" name="gaji_pokok" value="{{ $User->gaji_pokok}}">
                            <div class="invalid-feedback">
                                @error('gaji_pokok')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="foto_karyawan" class="form-label">Profile Picture</label>
                            <input type="file" class="form-control @error('foto_karyawan') is-invalid @enderror" id="foto_karyawan" name="foto_karyawan" value="{{ $User->foto_karyawan}}">
                            <div class="invalid-feedback">
                                @error('foto_karyawan')
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
