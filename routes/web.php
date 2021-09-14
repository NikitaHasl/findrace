<?php

use App\Http\Controllers\RaceController;
use Illuminate\Support\Facades\Route;

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

Route::resource('races', RaceController::class)
    ->except(['edit', 'update', 'destroy']);
Route::get('/', [RaceController::class, 'index'])->name('index');

Route::get('/logout', function () {
    return view('auth.logout');
})->name('logout');

Route::get('/login', function() {
    return view('auth.login');
})->name('login');

Route::get('/register', function() {
    return view('auth.register');
})->name('register');
