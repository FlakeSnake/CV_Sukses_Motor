@extends('layouts/admin')
@section('title','View Payment')

@section('content')
    <div class="container rounded-circle">
        <div class="card shadow mb-4">
            <h1 class="mt-4 ml-3">Payment History</h1>
            <div class="card-header">
                <a href=" {{ route('pembayaran.create') }}" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus-square"></i>
                    </span>
                    <span class="text">Add Payment</span>
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
                                <th>Payment Date</th>
                                <th>Total Payment</th>
                                <th>Note</th>
                                <th>Method</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pembayaran as $pb)
                            <tr>
                                <td style="text-align: center">{{ $loop->iteration }}</td>
                                <td>{{ $pb->users->name }}</td>
                                <td>{{ $pb->tanggal_pembayaran}}</td>
                                <td>Rp. {{ number_format($pb->jumlah_pembayaran, 0, ',', '.') }}</td>
                                <td style="max-width: 200px">{{ $pb->keterangan_pembayaran }}</td>
                                <td>{{ $pb->metode_pembayaran }}</td>
                                <td class="text-center">
                                    <form action="{{ route('pembayaran.destroy', ['pembayaran' => $pb->id_bayar]) }}" method="POST">
                                        <a href="{{ url('/pembayaran/'.$pb->id_bayar.'/edit') }}" class="btn btn-info btn-circle btn-sm"><i class="fas fa-edit"></i></a>
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
