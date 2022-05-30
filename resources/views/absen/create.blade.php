@extends('layouts/admin')
@section('title','Add Attendance')

@section('content')
<div class="container">
    <div class="card shadow mb-4" style="width: 700px;">
        <div class="ml-5">
            <h1 class="mt-3">Add Attendance</h1>
            <div class="row ">
                <div class="col-md-8">
                    <form method="post" action="{{ route('absen.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-2">
                            {{-- <label for="id_gaji" class="form-label">Name</label><br>
                            <select class="form-control" name="id_gaji" id="id_gaji">
                                @foreach ($gaji as $gj)
                                    <option value="{{ $gj->id_user }}" id="{{$gj->id_user}}"> {{ $gj->Users->name }}</option>
                                @endforeach
                            </select> --}}
                            <input name="id_gaji" type="hidden" value=" {{ $id_gaji }}">
                            @error('{{$user->name}}')
                            {{$message}}
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="jumlah_hadir" class="form-label">Total Attendance</label>
                            <input type="number" class="form-control @error('jumlah_hadir') is-invalid @enderror" id="jumlah_hadir" name="jumlah_hadir" value="{{ old('jumlah_hadir')}}" required>
                            <div class="invalid-feedback">
                                @error('jumlah_hadir')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <a href="{{ route('gaji.index')}}" class="btn btn-info mb-5"><i class="fas fa-arrow-left"> Cancel</i></a>
                        <button type="submit" class="btn btn-primary mb-5">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
