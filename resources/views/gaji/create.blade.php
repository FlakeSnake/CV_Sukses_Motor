@extends('layouts/admin')
@section('title','Add Salary')

@section('content')
<div class="container">
    <div class="card shadow mb-4" style="width: 700px;">
        <div class="ml-5">
            <h1 class="mt-3">Add Salary</h1>
            <div class="row ">
                <div class="col-md-8">
                    <form method="post" action="{{ route('gaji.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-2">
                            <label for="" class="form-label">Name</label><br>
                            <select oninvalid="this.setCustomValidity('Select the User!')" oninput="this.setCustomValidity('')" class="form-control" name="id_user" id="id_user" required>
                                <option value="" disabled selected>Select User</option>
                                @foreach ($user as $us)
                                    <option value="{{ $us->id }}">{{ $us->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="periode_gaji" class="form-label">Period</label>
                            <input type="month"  oninvalid="this.setCustomValidity('Select the Period!')" oninput="this.setCustomValidity('')" class="form-control @error('periode_gaji') is-invalid @enderror" id="periode_gaji" placeholder="Insert the Total Payment" name="periode_gaji" value="{{ old('periode_gaji')}}" required>
                            <div class="invalid-feedback">
                                @error('periode_gaji')
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

    today = year + '-' + month;
    document.getElementById("periode_gaji").setAttribute("max", today);
</script>
@endsection
