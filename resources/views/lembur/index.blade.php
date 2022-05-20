@extends('layouts/admin')
@section('title','View Loan')

@section('content')
    <div class="container rounded-circle">
        <div class="card shadow mb-4">
            <h1 class="mt-4 ml-3">Overtime History</h1>
            <div class="card-header">
                <a href=" {{ route('lembur.create') }}" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus-square"></i>
                    </span>
                    <span class="text">Add Overtime</span>
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
                                <th>Total Overtime Hours</th>
                                <th>Overtime Pay</th>
                                <th>Total Overtime Pay</th>
                                <th>Period</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lembur as $pm)
                            <tr>
                                <td style="text-align: center">{{ $loop->iteration }}</td>
                                <td>Rp. {{ number_format($pm->total_jam_lembur, 0, ',', '.') }}</td>
                                <td>Rp. {{ number_format($pm->uang_lembur, 0, ',', '.') }}</td>
                                <td>Rp. {{ number_format($pm->total_uang_lembur, 0, ',', '.') }}</td>
                                <td>{{ $pm->periode_gaji }}</td>
                                <td class="text-center">
                                    <a href="{{ url('/peminjaman/'.$pm->id_pinjam.'/edit') }}" class="btn btn-info btn-circle btn-sm"><i class="fas fa-edit"></i></a>
                                    {{-- <form action="{{ route('peminjaman.destroy', ['peminjaman' => $pm->id_pinjam]) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-info btn-circle btn-sm"><i class="fas fa-trash"></i></button>
                                    </form> --}}
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
