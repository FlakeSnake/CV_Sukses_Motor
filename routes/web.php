<?php

use App\Http\Controllers\UsersController;
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

// Route::get('/user', [UsersController::class, 'index'])->name('user.index');
// Route::get('/user/create', [UsersController::class, 'create']);
// Route::post('/user/store', [UsersController::class, 'store']);
// Route::get('/user/{id}', [UsersController::class, 'show'])->name('user.show');
// Route::get('/user/{id}/edit', [UsersController::class, 'edit'])->name('user.edit');
// Route::patch('/user/', [UsersController::class, 'update'])->name('user.update');
// Route::delete('/user/{user}', [UsersController::class, 'destroy'])->name('user.destroy');


Route::middleware('auth')->group(function () {

    Route::get('/user/{user}/editpass', [UsersController::class, 'editpass'])->name('user.editpass');
    Route::patch('/user/{user}', [UsersController::class, 'updatepass'])->name('user.updatepass');
    Route::resource('user', UsersController::class);


});
