@section('Users','active')
@extends('layouts/admin')
@section('title','List Loan')

@section('content')
<div class="container rounded-circle">
    <div class="card shadow mb-4">
        <h1 class="mt-4 ml-3">List All Loans</h1>
        <div class="card-header">
            <div class="card-body p-1 m-2">
                <div class="table-responsive">
                    <table class="table table-bordered" id="mydatatable" width="100%" cellspacing="100">
                        <thead>
                            <tr>
                                <th style="text-align: center">No</th>
                                <th>Name</th>
                                <th>Loan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user as $us)
                            <tr>
                                <td style="text-align: center">{{ $loop->iteration }}</td>
                                <td style="max-width: 50px">{{ $us->name }}</td>
                                <td style="max-width: 100px">Rp. {{ number_format($us->total_peminjaman, 0, ',', '.') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
