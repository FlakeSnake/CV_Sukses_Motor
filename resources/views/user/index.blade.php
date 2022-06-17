@extends('layouts/admin')
@section('title','View Users')

@section('content')
    <div class="container rounded-circle">
        <div class="card shadow mb-4">
            <h1 class="mt-4 ml-3">Users List</h1>
            <div class="card-header">
                {{-- <a href="" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus-square"></i>
                    </span>
                    <span class="text">Print Out</span> --}}
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
            <div class="card-body p-1 m-2">
                <div class="table-responsive">
                    <table class="table table-bordered" id="mydatatable" width="100%" cellspacing="100">
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
                            @foreach($users as $us)
                            <tr>
                                <td style="text-align: center">{{ $loop->iteration }}</td>
                                <td style="max-width: 50px">{{ $us->name }}</td>
                                <td style="max-width: 100px">{{ $us->email}}</td>
                                <td style="max-width: 100px">{{ $us->no_telp }}</td>
                                <td style="max-width: 150px">{{ $us->alamat }}</td>
                                <td class="text-center" style="max-width: 100px">
                                    <form action="{{ route('user.destroy', ['user' => $us->id]) }}" method="POST" >
                                        <a href="{{ url('/user/'.$us->id) }}" class="btn btn-info btn-circle btn-sm"><i class="fas fa-exclamation-circle"></i></a>
                                        <a href="{{ route('user.editpass',['user'=>$us->id])}}" class="btn btn-info btn-circle btn-sm"><i class="fas fa-key"></i></a>
                                        <a href="{{ url('/user/'.$us->id.'/edit') }}" class="btn btn-info btn-circle btn-sm"><i class="fas fa-edit"></i></a>
                                        @method('delete')
                                        @csrf
                                        <button @if($us->peminjaman()->exists() || $us->gaji()->exists() || $us->email == 'admin@gmail.com')  disabled @endif  type="submit"  class="btn btn-danger btn-circle btn-sm ml-1"><i class="fas fa-trash-alt"></i></button>
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
