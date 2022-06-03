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
                            <input type="password" oninvalid="this.setCustomValidity('Insert a new Password!')" oninput="this.setCustomValidity('')" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Insert new Password" name="password" required>
                            <div class="invalid-feedback">
                                @error('password')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="password2" class="form-label">Password Confirmation</label>
                            <input type="password" oninvalid="this.setCustomValidity('Insert the new Password for confirmation!')" oninput="this.setCustomValidity('')" class="form-control @error('password2') is-invalid @enderror" id="password2" placeholder="Insert the new Password for confirmation" name="password2" required>
                            <div class="invalid-feedback">
                                @error('password2')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <a href="{{ route('user.index')}}" class="btn btn-info mb-5"><i class="fas fa-arrow-left"> Cancel</i></a>
                        <button type="submit" class="btn btn-primary mb-5">Submit</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
