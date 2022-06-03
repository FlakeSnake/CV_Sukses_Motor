@extends('layouts/admin')
@section('title','Add Loan')

@section('content')
<div class="container">
    <div class="card shadow mb-4" style="width: 700px;">
        <div class="ml-5">
            <h1 class="mt-3">Add Loan</h1>
            <div class="row ">
                <div class="col-md-8">
                    <form method="post" action="{{ route('peminjaman.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-2">
                            <label for="id_user" class="form-label">Name</label><br>
                            <select oninvalid="this.setCustomValidity('Select a User!')" oninput="this.setCustomValidity('')" class="form-control" name="id_user" id="id_user" required>
                                <option value="" disabled selected>Select User</option>
                                @foreach ($user as $us)
                                    <option value="{{ $us->id }}">{{ $us->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="alasan_peminjaman" class="form-label">Reason for Borrowing</label>
                            <input type="text" oninvalid="this.setCustomValidity('Insert the Reason for Borrowing!')" oninput="this.setCustomValidity('')" class="form-control @error('alasan_peminjaman') is-invalid @enderror" id="alasan_peminjaman" placeholder="Insert the Reason for Borrowing" name="alasan_peminjaman" required>
                            <div class="invalid-feedback">
                                @error('alasan_peminjaman')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="tanggal_peminjaman" class="form-label">Loan Date</label>
                            <input type="date" oninvalid="this.setCustomValidity('Select the Loan Date!')" oninput="this.setCustomValidity('')" class="form-control @error('tanggal_peminjaman') is-invalid @enderror" id="tanggal_peminjaman" name="tanggal_peminjaman" required>
                            <div class="invalid-feedback">
                                @error('tanggal_peminjaman')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="jumlah_peminjaman" class="form-label">Loan Amount</label>
                            <input type="number" oninvalid="this.setCustomValidity('Insert the Loan Amount!')" oninput="this.setCustomValidity('')" class="form-control @error('jumlah_peminjaman') is-invalid @enderror" id="jumlah_peminjaman" placeholder="Insert the Loan Amount" name="jumlah_peminjaman" required>
                            <div class="invalid-feedback">
                                @error('jumlah_peminjaman')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <a href="{{ route('peminjaman.index')}}" class="btn btn-info mb-5"><i class="fas fa-arrow-left"> Cancel</i></a>
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
    document.getElementById("tanggal_peminjaman").setAttribute("max", today);
</script>
@endsection
