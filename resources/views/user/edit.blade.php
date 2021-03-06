@extends('layouts/admin')
@section('title','Edit User')

@section('content')
<div class="container">
    <a href="{{ route('user.index')}}" class="btn btn-info mb-2"><i class="fas fa-arrow-left"> Cancel</i></a>
    <div class="card shadow mb-4" style="width: 700px;">
        <div class="ml-5">
            <h1 class="mt-3">Edit user profile</h1>
            <div class="row ">
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
                <div class="col-md-8">
                    <form method="POST" action="{{ route('user.update',['user'=>$User->id])}}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="mb-2">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" pattern="[a-zA-Z ]+" oninvalid="this.setCustomValidity('Insert a valid Name!')" oninput="this.setCustomValidity('')" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Insert your Name" name="name" value="{{ $User->name}}" required>
                            <div class="invalid-feedback">
                                @error('name')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="email" class="form-label">E-Mail</label>
                            <input type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" oninvalid="this.setCustomValidity('Insert a valid E-Mail!\nhint : hint : name@subdomain.domain')" oninput="this.setCustomValidity('')" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Insert your E-Mail" name="email" value="{{ $User->email}}" required>
                            <div class="invalid-feedback">
                                @error('email')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="tempat_kelahiran" class="form-label">Place of Birth</label>
                            <input type="text" pattern="[a-zA-Z ]+" oninvalid="this.setCustomValidity('Insert a Place of Birth!')" oninput="this.setCustomValidity('')" class="form-control @error('tempat_kelahiran') is-invalid @enderror" id="tempat_kelahiran" placeholder="Insert your Place of Birth" name="tempat_kelahiran" value="{{ $User->tempat_kelahiran}}" required>
                            <div class="invalid-feedback">
                                @error('tempat_kelahiran')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="date" class="form-label">Birthday</label>
                            <input type="date" min="1990-01-01"  oninvalid="this.setCustomValidity('Select the Birthday Date!')" oninput="this.setCustomValidity('')" class="form-control @error('tanggal_kelahiran') is-invalid @enderror" id="tanggal_kelahiran" name="tanggal_kelahiran" value="{{ $User->tanggal_kelahiran}}" required>
                            <div class="invalid-feedback">
                                @error('tanggal_kelahiran')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="jenis_kelamin" class="form-label">Gender</label><br>
                            <ul style="float: right"><input type="radio" name="jenis_kelamin" value="Perempuan" {{ "Perempuan" == $User->jenis_kelamin ? 'checked' : null }}>Female</ul>
                            <ul><input type="radio" name="jenis_kelamin" value="Laki-laki" {{ "Laki-laki" == $User->jenis_kelamin ? 'checked' : null }}>Male</ul>
                        </div>
                        <div class="mb-2">
                            <label for="no_telp" class="form-label">Phone Number</label>
                            <input type="tel" pattern="08[0-9]{6}[0-9]+" oninvalid="this.setCustomValidity('Insert a valid Phone Number!\nhint : 07xxxxxx or 08xxxxxx')" oninput="this.setCustomValidity('')" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp" placeholder="Insert your Phone Number" name="no_telp" value="{{ $User->no_telp}}" required>
                            <div class="invalid-feedback">
                                @error('no_telp')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="alamat" class="form-label">Address</label>
                            <input type="text" oninvalid="this.setCustomValidity('Insert a Address!')" oninput="this.setCustomValidity('')" class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="Insert your Address" name="alamat" value="{{ $User->alamat}}" required>
                            <div class="invalid-feedback">
                                @error('alamat')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="nomor_rekening_bank" class="form-label">Bank Account</label>
                            <input type="number" pattern="[0-9]{10}[0-9]+" oninvalid="this.setCustomValidity('Insert a valid Bank Account!')" oninput="this.setCustomValidity('')" class="form-control @error('nomor_rekening_bank') is-invalid @enderror" id="nomor_rekening_bank" placeholder="Insert your Bank Account" name="nomor_rekening_bank" value="{{ $User->nomor_rekening_bank}}">
                            <div class="invalid-feedback">
                                @error('nomor_rekening_bank')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="agama" class="form-label">Religion</label>
                            <select oninvalid="this.setCustomValidity('Select the Religion!')" oninput="this.setCustomValidity('')" class="form-control" name="agama" id="agama" required>
                                <option value="" disabled selected>Select the Religion</option>
                                <option value="Islam" {{ "Islam" == $User->agama ? 'selected' : null }}>Islam</option>
                                <option value="Buddha" {{ "Buddha" == $User->agama ? 'selected' : null }}>Buddha</option>
                                <option value="Kristen" {{ "Kristen" == $User->agama ? 'selected' : null }}>Kristen</option>
                                <option value="Katolik" {{ "Katolik" == $User->agama ? 'selected' : null }}>Katolik</option>
                                <option value="Hindu" {{ "Hindu" == $User->agama ? 'selected' : null }}>Hindu</option>
                                <option value="Konghucu" {{ "Konghucu" == $User->agama ? 'selected' : null }}>Konghucu</option>
                            </select>
                            <div class="invalid-feedback">
                                @error('agama')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="gaji_pokok" class="form-label">Primary Salary</label>
                            <input type="number" min="0" oninvalid="this.setCustomValidity('Insert a valid Primary Salary!')" oninput="this.setCustomValidity('')" class="form-control @error('gaji_pokok') is-invalid @enderror" id="gaji_pokok" placeholder="Insert your Primary Salary" name="gaji_pokok" value="{{ $User->gaji_pokok}}" required>
                            <div class="invalid-feedback">
                                @error('gaji_pokok')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="foto_karyawan" class="form-label">Profile Picture</label>
                            <input type="file" class="form-control @error('foto_karyawan') is-invalid @enderror" id="foto_karyawan" name="foto_karyawan" value="{{ $User->foto_karyawan}}">
                            <div class="invalid-feedback">
                                @error('foto_karyawan')
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
<script>
    var today = new Date();
    var day = today.getDate();
    var month = today.getMonth() + 1;
    var year = today.getFullYear() - 15;

    if (day < 10) {
        day = '0' + day;
    }

    if (month < 10) {
        month = '0' + month;
    }

    today = year + '-' + month + '-' + day;
    document.getElementById("tanggal_kelahiran").setAttribute("max", today);
</script>
@endsection
