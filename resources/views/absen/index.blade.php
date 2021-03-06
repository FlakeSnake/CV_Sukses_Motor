@extends('layouts/admin')
@section('title','View Attendance')

@section('content')
    <div class="container rounded-circle">
        <div class="card shadow mb-4">
            <h1 class="mt-4 ml-3">Attendance History</h1>
            <div class="card-header">
                <a href=" {{ url('/gaji') }}" class="btn btn-primary btn-icon-split">
                    <span class="text">Go To Salary</span>
                </a>
            </div>
            <div class="col-5">
                @if (session('status'))
                <div class="alert alert-success mt-3">
                    {{ session('status') }}
                </div>
                @endif
                @if (session('statusdel'))
                <div class="alert alert-danger mt-3">
                    {{ session('statusdel') }}
                </div>
                @endif
            </div>
            <div class="card-body p-2 m-3">
                <div class="table-responsive">
                    <table class="table table-bordered " id="mydatatable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th style="text-align: center">No</th>
                                <th>Name</th>
                                <th>Total Attendance</th>
                                <th>Attendance Pay</th>
                                <th>Total Attendance Pay</th>
                                <th>Period</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($absen as $abs)
                            <tr>
                                <td style="text-align: center">{{ $loop->iteration }}</td>
                                <td>{{ $abs->gaji->Users->name ?? Null}}</td>
                                <td>{{ $abs->jumlah_hadir }}
                                    @if ($abs->jumlah_hadir == 1)
                                        Day
                                    @else
                                        Days
                                    @endif
                                </td>
                                <td>Rp. {{ number_format($abs->uang_absen, 0, ',', '.') }}</td>
                                <td>Rp. {{ number_format($abs->total_uang_absen, 0, ',', '.') }}</td>
                                <td>{{ date("M-Y",strtotime($abs->gaji->periode_gaji ?? Null)) }}</td>
                                <td class="text-center">
                                    <form action="{{ route('absen.destroy', ['absen' => $abs->id_absensi]) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
