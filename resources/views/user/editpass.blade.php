@extends('layouts/admin')
@section('title','Edit Password')

@section('content')
<div class="container">
    <div class="card shadow mb-4" style="width: 700px;">
        <div class="ml-5">
            <h1 class="mt-3">Change Password</h1>
            <div class="row ">
                <div class="col-md-8">
                    <form method="POST" action="{{ route('user.updatepass',['user'=>$User->id])}}">
                        @csrf
                        @method('PATCH')
                        <div class="mb-2">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Masukkan Password" name="password">
                            <div class="invalid-feedback">
                                @error('password')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="password2" class="form-label">Konfirmasi Password</label>
                            <input type="password" class="form-control @error('password2') is-invalid @enderror" id="password2" placeholder="Masukkan Password" name="password_confirmation">
                            <div class="invalid-feedback">
                                @error('password_confirmation')
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
