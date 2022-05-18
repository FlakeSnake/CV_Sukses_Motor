@extends('layouts/admin')
@section('title','Dashboard')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="">
                <h1 style="text-align: center">Welcome {{ Auth::user()->name }}</h1>
                <div class="">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h3 style="text-align: center">You are logged in!</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<img src="assets\image\images.jpg" style="margin-left: auto; margin-right: auto; display: block; width: 60%">
@endsection
