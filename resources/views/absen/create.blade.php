@extends('layouts/admin')
@section('title','Add Attendent')

@section('content')
<div class="container">
    <div class="card shadow mb-4" style="width: 700px;">
        <div class="ml-5">
            <h1 class="mt-3">Add Attendent</h1>
            <div class="row ">
                <div class="col-md-8">
                    <form method="post" action="{{ route('absen.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-2">
                            <label for="id_gaji" class="form-label">Name</label><br>
                            <select class="form-control" name="id_gaji" id="id_gaji">
                                @foreach ($gaji as $gj)
                                    <option value="{{ $gj->id_gaji }}">
                                @foreach ($user as $us)
                                {{ $us->name }}</option>
                                @endforeach

                                @endforeach

                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="jumlah_hadir" class="form-label">Total Attendent</label>
                            <input type="number" class="form-control @error('jumlah_hadir') is-invalid @enderror" id="jumlah_hadir" name="jumlah_hadir" value="{{ old('jumlah_hadir')}}" required>
                            <div class="invalid-feedback">
                                @error('jumlah_hadir')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="periode_gaji" class="form-label">Period</label>
                            <input type="month" class="form-control @error('periode_gaji') is-invalid @enderror" id="periode_gaji" placeholder="Insert the Total Payment" name="periode_gaji" value="{{ old('periode_gaji')}}" required>
                            <div class="invalid-feedback">
                                @error('periode_gaji')
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
