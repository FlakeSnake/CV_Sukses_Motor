@extends('layouts/admin')
@section('title','Add Overtime')

@section('content')
<div class="container">
    <div class="card shadow mb-4" style="width: 700px;">
        <div class="ml-5">
            <h1 class="mt-3">Add Overtime</h1>
            <div class="row ">
                <div class="col-md-8">
                    <form method="post" action="{{ route('lembur.store') }}" enctype="multipart/form-data">
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
                            <label for="total_jam_lembur" class="form-label">Total Overtime Hours</label>
                            <input type="number" class="form-control @error('total_jam_lembur') is-invalid @enderror" id="total_jam_lembur" name="total_jam_lembur" value="{{ old('total_jam_lembur')}}" required>
                            <div class="invalid-feedback">
                                @error('total_jam_lembur')
                                {{$message}}
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary mb-5">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
