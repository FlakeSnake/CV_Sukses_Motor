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
                            <label for="tanggal_lembur" class="form-label">Overtime Date</label>
                            <input type="date" oninvalid="this.setCustomValidity('Select the Overtime Date!')" oninput="this.setCustomValidity('')" class="form-control @error('tanggal_lembur') is-invalid @enderror" id="tanggal_lembur" name="tanggal_lembur" required>
                            <div class="invalid-feedback">
                                @error('tanggal_lembur')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="waktu_jam_awal" class="form-label">Overtime Hour Start</label>
                            <input type="time" oninvalid="this.setCustomValidity('Select the Start Hour!')" oninput="this.setCustomValidity('')" class="form-control @error('waktu_jam_awal') is-invalid @enderror" id="waktu_jam_awal" name="waktu_jam_awal" required>
                            <div class="invalid-feedback">
                                @error('waktu_jam_awal')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="waktu_jam_akhir" class="form-label">Overtime Hour End</label>
                            <input type="time" oninvalid="this.setCustomValidity('Select the End Hour!')" oninput="this.setCustomValidity('')" class="form-control @error('waktu_jam_akhir') is-invalid @enderror" id="waktu_jam_akhir" name="waktu_jam_akhir" required>
                            <div class="invalid-feedback">
                                @error('waktu_jam_akhir')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="total_jam_lembur" class="form-label">Total Hours Overtime</label>
                            <input type="number" min="1" max="4" oninvalid="this.setCustomValidity('Insert the valid Total Hours Overtime!\nHint : 1-4')" oninput="this.setCustomValidity('')" class="form-control @error('total_jam_lembur') is-invalid @enderror" id="total_jam_lembur" name="total_jam_lembur" required>
                            <div class="invalid-feedback">
                                @error('total_jam_lembur')
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
<script>
    var today = new Date();
    var day = today.getDate();
    var month = today.getMonth() + 1;
    var year = today.getFullYear();

    if (day < 10) {
        day = '0' + day;
    }

    if (month < 10) {
        month = '0' + month;
    }

    today = year + '-' + month + '-' + day;
    document.getElementById("tanggal_lembur").setAttribute("max", today);
</script>
@endsection
