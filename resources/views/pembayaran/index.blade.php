@extends('layouts/admin')
@section('title','View Payment')

@section('content')
    <div class="container rounded-circle">
        <div class="card shadow mb-4">
            <h1 class="mt-4 ml-3">Payment History</h1>
            <div class="card-header">
                <a href="" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus-square"></i>
                    </span>
                    <span class="text">Add Payment</span>
                </a>
            </div>
            <div class="col-5">
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
                                <th>E-Mail</th>
                                <th>No. Telp</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pembayaran as $pb)
                            <tr>
                                <td style="text-align: center">{{ $loop->iteration }}</td>
                                <td>{{ $pb->users->name }}</td>
                                {{-- <td>{{ $pb->no}}</td>
                                <td>{{ $pb->no_telp }}</td>
                                <td style="max-width: 200px">{{ $pb->alamat }}</td>
                                <td class="text-center">
                                    <form action="{{ route('user.destroy', ['user' => $pb->id]) }}" method="POST">
                                        <a href="{{ url('/user/'.$pb->id) }}" class="btn btn-info btn-circle btn-sm"><i class="fas fa-exclamation-circle"></i></a>
                                        <a href="{{ route('user.editpass',['user'=>$pb->id])}}" class="btn btn-info btn-circle btn-sm"><i class="fas fa-key"></i></a>
                                        <a href="{{ url('/user/'.$pb->id.'/edit') }}" class="btn btn-info btn-circle btn-sm"><i class="fas fa-edit"></i></a>
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
