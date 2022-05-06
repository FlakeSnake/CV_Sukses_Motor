<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // return view('auth.login');

});

Route::get('/halo', function () {
    return "Halo Ahok";
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'login'])->name('login');

Route::get('/admin', function () {
    return view('layouts.admin');
});

Route::get('/home', function () {
    return view('dashboard');
});
