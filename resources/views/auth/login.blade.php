@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="">
                <div class="col-form-label" style="text-align: center; background: white; margin-left: 37%; margin-right: 37%; font-weight: 1000; border-radius: 20px">{{ __('CV Sukses Motor') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row" style="margin-left: 24%">
                            <div class="col-md-8" style="">
                                <input type ="text" placeholder="E-Mail Address" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                </span>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="card" style="text-align: center">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            {{-- <label for="email" class="col-md-3 col-form-label " style="background: white; opacity: 80%; font-weight: 1000; border-radius: 15px; text-align: center">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-7" style="margin-left: 8.5%">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus style="opacity: 60%">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> --}}
                        </div>

                        <div class="form-group row" style="margin-left: 24%">
                            <div class="col-md-8">
                                <input type ="password" placeholder="Password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            {{-- <label for="password" class="col-md-3 col-form-label" style="background: white; opacity: 80%; font-weight: 1000; border-radius: 15px; text-align: center">{{ __('Password') }}</label>

                            <div class="col-md-7" style="margin-left: 8.5%">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" style="opacity: 60%">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> --}}
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary" style="border-radius: 30px; padding: 0 20% 0 19%">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
