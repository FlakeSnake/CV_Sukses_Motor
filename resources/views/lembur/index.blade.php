@extends('layouts/admin')
@section('title','View Overtime')

@section('content')
    <div class="container rounded-circle">
        <div class="card shadow mb-4">
            <h1 class="mt-4 ml-3">Overtime History</h1>
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
                                <th>Name</td>
                                <th>Date</th>
                                <th>Hour Start</th>
                                <th>Hour End</th>
                                <th>Total Overtime Hours</th>

                                <th>Total Overtime Pay</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lembur as $lmbr)
                            <tr>
                                <td style="text-align: center">{{ $loop->iteration }}</td>
                                <td>{{ $lmbr->gaji->Users->name ?? Null }}</td>
                                <td>{{ date("d-M-Y",strtotime($lmbr->tanggal_lembur ?? Null))  }}</td>
                                <td>{{ $lmbr->waktu_jam_awal     ?? Null }}</td>
                                <td>{{ $lmbr->waktu_jam_akhir ?? Null }}</td>
                                <td>{{ $lmbr->total_jam_lembur ?? Null }}
                                    @if ($lmbr->total_jam_lembur == 1)
                                        Hour
                                    @else
                                        Hours
                                    @endif
                                </td>
                                {{-- <td>Rp. {{ number_format($lmbr->uang_lembur, 0, ',', '.') ?? Null  }}</td> --}}
                                <td>Rp. {{ number_format($lmbr->total_uang_lembur, 0, ',', '.') ?? Null  }}</td>
                                <td class="text-center">
                                    <form action="{{ route('lembur.destroy', ['lembur' => $lmbr->id_lembur]) }}" method="POST">
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
