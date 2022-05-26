@section('Users','active')
@extends('layouts/admin')
@section('title','Show User')

@section('content')
<div class="container rounded-circle">
    <div class="row">

        <div class="col-6">
            @if(Auth::user()->jabatan == 'Admin')
            <a href="{{ route('user.index')}}" class="btn btn-primary "><i class="fas fa-arrow-left"> Back</i></a>
            @endif
            @if(Auth::user()->jabatan == 'Pegawai')
            <a href="{{ url('/home')}}" class="btn btn-primary "><i class="fas fa-arrow-left"> Back</i></a>
            @endif
            <div class="card mt-2">

                <div class="card-body">

                    <h4 class="card-title ml-4"><i class="fas fa-user-tie" style="color:orangered"></i> User Information </h4>

                    <div class="card-body p-2 m-3">
                        <div class="table-responsive">

                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Name</td>
                                        <td>{{ $User->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>E-Mail</td>
                                        <td>{{ $User->email }}</td>
                                    </tr>
                                    <tr>
                                        <td>Place of Birth</td>
                                        <td>{{ $User->tempat_kelahiran }}</td>
                                    </tr>
                                    <tr>
                                        <td>Birthday</td>
                                        <td>{{ date('d-F-Y', strtotime($User->tanggal_kelahiran)) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Gender</td>
                                        <td>{{ $User->jenis_kelamin }}</td>
                                    </tr>
                                    <tr>
                                        <td>Phone Number</td>
                                        <td>{{ $User->no_telp }}</td>
                                    </tr>
                                    <tr>
                                        <td>Address</td>
                                        <td style="max-width: 200px">{{ $User->alamat }}</td>
                                    </tr>
                                    <tr>
                                        <td>Role</td>
                                        <td>{{ $User->jabatan }}</td>
                                    </tr>
                                    <tr>
                                        <td>Bank Account</td>
                                        <td>{{ $User->nomor_rekening_bank }}</td>
                                    </tr>
                                    <tr>
                                        <td>Religion</td>
                                        <td>{{ $User->agama }}</td>
                                    </tr>
                                    <tr>
                                        <td>Gaji Pokok</td>
                                        <td>Rp. {{ number_format($User->gaji_pokok, 0, ',', '.') }}</td>
                                    </tr>
                                    <tr>
                                        <td>Total Peminjaman</td>
                                        <td>Rp. {{ number_format($User->total_peminjaman, 0, ',', '.') }}</td>
                                    </tr>
                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card mt-5" style="width: 100%;">
                <div class="card-body">
                    <h4 class="card-title ml-4"><i class="fas fa-image" style="color:orangered"></i> User Profile Picture </h4>
                    @if ($User->foto_karyawan)
                    <h4 class="card-title"><img src="{{ asset('storage/'. $User->foto_karyawan) }}" alt="" style="width: 100%"></h4>
                    @else
                    <h4 class="card-title"><img src="{{ asset('assets/image/PP.jpg') }}" alt="" style="width: 100%"></h4>
                    @endif

    </div>
</div>
@endsection
