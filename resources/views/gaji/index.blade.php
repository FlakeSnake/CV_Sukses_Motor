@extends('layouts/admin')
@section('title','View Salary')

@section('content')
    <div class="container rounded-circle">
        <div class="card shadow mb-4">
            <h1 class="mt-4 ml-3">Salary History</h1>
            <div class="card-header">
                <a href=" {{ route('gaji.create') }}" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus-square"></i>
                    </span>
                    <span class="text">Add Salary</span>
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
                                <th>Total Salary</th>
                                <th>Period</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($gaji as $pm)
                            <tr>
                                <td style="text-align: center">{{ $loop->iteration }}</td>
                                <td>{{ $pm->users->name }}</td>
                                <td>Rp. {{ number_format($pm->total_gaji, 0, ',', '.') }}</td>
                                <td>{{ date("M-Y",strtotime($pm->periode_gaji)) }}</td>
                                <td class="text-center">
                                    {{-- <li class="nav-item dropdown"> --}}
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-fw fa-edit"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right animated--grow-in" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ url('/absen/'.$pm->id_gaji.'/tambah') }}">Attendent</a>
                                            <a class="dropdown-item" href="{{ url('/lembur/'.$pm->id_gaji.'/tambah') }}">Overtime</a>
                                        </div>
                                    {{-- </li> --}}
                                        {{-- <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" data-toggle="collapse" data-target="#collapseAction{{ $loop->iteration }}"
                                            aria-expanded="true" aria-controls="collapseAction{{ $loop->iteration }}">
                                            <i class="fas fa-fw fa-folder"></i>
                                        </a>
                                        <div id="collapseAction{{ $loop->iteration }}" class="collapse" aria-labelledby="headingAction{{ $loop->iteration }}"
                                            data-parent="#accordionSidebar">
                                            <div class="bg-white py-2 collapse-inner rounded">
                                                <a class="collapse-item btn btn-info btn-circle btn-sm fas fa-plus-square" href="{{ url('/absen/'.$pm->id_gaji.'/tambah') }}"></a> Attendent<br>
                                                <a class="collapse-item btn btn-info btn-circle btn-sm fas fa-plus-square" href="{{ url('/lembur/'.$pm->id_gaji.'/tambah') }}"></a> Overtime
                                            </div>
                                        </div> --}}

                                    {{-- <a href="{{ url('/lembur/'.$pm->id_gaji.'/tambah') }}" class="btn btn-info btn-circle btn-sm"><i class="fas fa-edit"></i></a> --}}
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
