@section('Users','active')
@extends('layouts/admin')
@section('title','Show User')

@section('content')
<div class="container rounded-circle">
    <div class="row">

        <div class="col-6">
            <a href="{{ route('user.index')}}" class="btn btn-primary "><i class="fas fa-arrow-left"> Back</i></a>
            <div class="card mt-2">

                <div class="card-body">

                    <h4 class="card-title ml-4"><i class="fas fa-user-tie" style="color:orangered"></i> User Information </h4>

                    <div class="card-body p-2 m-3">
                        <div class="table-responsive">

                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Nama</td>
                                        <td>{{ $User->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tempat Lahir</td>
                                        <td>{{ $User->tempat_kelahiran }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Lahir</td>
                                        <td>{{ date('d-F-Y', strtotime($User->tanggal_kelahiran)) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Kelamin</td>
                                        <td>{{ $User->jenis_kelamin }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nomor Telepon</td>
                                        <td>{{ $User->no_telp }}</td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td style="max-width: 200px">{{ $User->alamat }}</td>
                                    </tr>
                                    <tr>
                                        <td>Jabatan</td>
                                        <td>{{ $User->jabatan }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nomor Rekening Bank</td>
                                        <td>{{ $User->nomor_rekening_bank }}</td>
                                    </tr>
                                    <tr>
                                        <td>Agama</td>
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
                    <h4 class="card-title"><img src="{{ asset('assets/image/pp.jpg') }}" alt="" style="width: 100%"></h4>

    </div>
</div>
@endsection
