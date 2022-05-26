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
            <div class="col-4">
                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif
                @if (session('statusdel'))
                <div class="alert alert-danger">
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
                                <th>Hour Start</th>
                                <th>Hour End</th>
                                <th>Total Overtime Hours</th>
                                <th>Overtime Pay</th>
                                <th>Total Overtime Pay</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lembur as $lmbr)
                            <tr>
                                <td style="text-align: center">{{ $loop->iteration }}</td>
                                <td>{{ $lmbr->waktu_jam_awal }}</td>
                                <td>{{ $lmbr->waktu_jam_akhir }}</td>
                                <td>{{ $lmbr->total_jam_lembur }}</td>
                                <td>Rp. {{ number_format($lmbr->uang_lembur, 0, ',', '.') }}</td>
                                <td>Rp. {{ number_format($lmbr->total_uang_lembur, 0, ',', '.') }}</td>
                                <td class="text-center">
                                    <form action="{{ route('lembur.destroy', ['lembur' => $lmbr->id_lembur]) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-info btn-circle btn-sm"><i class="fas fa-trash"></i></button>
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
