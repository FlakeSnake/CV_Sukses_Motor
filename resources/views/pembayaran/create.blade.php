@extends('layouts/admin')
@section('title','Add Payment')

@section('content')
<div class="container">
    <div class="card shadow mb-4" style="width: 700px;">
        <div class="ml-5">
            <h1 class="mt-3">Add Payment</h1>
            <div class="row ">
                <div class="col-md-8">
                    <form method="post" action="{{ route('pembayaran.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-2">
                            <label for="" class="form-label">Name</label><br>
                            <select oninvalid="this.setCustomValidity('Select a User!')" oninput="this.setCustomValidity('')" class="form-control" name="users_id" id="users_id" required>
                                <option value="" disabled selected>Select User</option>
                                @foreach ($user as $us)
                                    <option value="{{ $us->id }}">{{ $us->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="tanggal_pembayaran" class="form-label">Payment Date</label>
                            <input type="date" oninvalid="this.setCustomValidity('Select the Payment Date!')" oninput="this.setCustomValidity('')" class="form-control @error('tanggal_pembayaran') is-invalid @enderror" id="tanggal_pembayaran" name="tanggal_pembayaran" required>
                            <div class="invalid-feedback">
                                @error('tanggal_pembayaran')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="keterangan_pembayaran" class="form-label">Payment Information</label>
                            <input type="text"  oninvalid="this.setCustomValidity('Insert a Payment Information!')" oninput="this.setCustomValidity('')" class="form-control @error('keterangan_pembayaran') is-invalid @enderror" id="keterangan_pembayaran" placeholder="Insert the Payment Information" name="keterangan_pembayaran" required>
                            <div class="invalid-feedback">
                                @error('keterangan_pembayaran')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="metode_pembayaran" class="form-label">Payment Method</label><br>
                            <select oninvalid="this.setCustomValidity('Select the Payment Method!')" oninput="this.setCustomValidity('')" class="form-control" name="metode_pembayaran" id="metode_pembayaran" required>
                                <option value="" disabled selected>Select the Payment Method</option>
                                <option value="Transfer" id="metode_pembayaran" name="metode_pembayaran">Transfer</option>
                                <option value="Cash" id="metode_pembayaran" name="metode_pembayaran">Cash</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="jumlah_pembayaran" class="form-label">Total Payment</label>
                            <input type="number" oninvalid="this.setCustomValidity('Insert the Total Payment!')" oninput="this.setCustomValidity('')" class="form-control @error('jumlah_pembayaran') is-invalid @enderror" id="jumlah_pembayaran" placeholder="Insert the Total Payment" name="jumlah_pembayaran" required>
                            <div class="invalid-feedback">
                                @error('jumlah_pembayaran')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <a href="{{ route('pembayaran.index')}}" class="btn btn-info mb-5"><i class="fas fa-arrow-left"> Cancel</i></a>
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
    document.getElementById("tanggal_pembayaran").setAttribute("max", today);
</script>
@endsection
