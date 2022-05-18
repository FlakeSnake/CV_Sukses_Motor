@extends('layouts/admin')
@section('title','View Loan')

@section('content')
    <div class="container rounded-circle">
        <div class="card shadow mb-4">
            <h1 class="mt-4 ml-3">Loan History</h1>
            <div class="card-header">
                <a href=" {{ route('peminjaman.create') }}" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus-square"></i>
                    </span>
                    <span class="text">Add Loan</span>
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
                                <th>Name</th>
                                <th>Reason for Borrowing</th>
                                <th>Loan Date</th>
                                <th>Loan Amount</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($peminjaman as $pm)
                            <tr>
                                <td style="text-align: center">{{ $loop->iteration }}</td>
                                <td>{{ $pm->users->name }}</td>
                                <td>{{ $pm->alasan_peminjaman}}</td>
                                <td>{{ $pm->tanggal_peminjaman}}</td>
                                <td>Rp. {{ number_format($pm->jumlah_peminjaman, 0, ',', '.') }}</td>
                                <td class="text-center">
                                    <form action="{{ route('peminjaman.destroy', ['peminjaman' => $pm->id_pinjam]) }}" method="POST">
                                        <a href="{{ url('/peminjaman/'.$pm->id_pinjam.'/edit') }}" class="btn btn-info btn-circle btn-sm"><i class="fas fa-edit"></i></a>
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
