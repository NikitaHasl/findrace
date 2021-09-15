<?php

use App\Http\Controllers\AccountController;
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

Route::get('/filterRace/{filter?}', [RaceController::class, 'filterRace'])
    ->name('filterRace.show');

Route::get('/logout', function () {
    return view('auth.logout');
})->name('logout');

Route::get('/login', function() {
    return view('auth.login');
})->name('login');

Route::get('/register', function() {
    return view('auth.register');
})->name('register');

Route::get('/account', [AccountController::class, 'index'])->name('account');

Route::get('/subscribe/{id}', [AccountController::class, 'subscribe'])->where('id', '\d+')->name('subscribe');

