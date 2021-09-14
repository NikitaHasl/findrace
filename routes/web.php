<?php

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

Route::get('/logout', function () {
    return view('auth.logout');
});

Route::get('/', function () {
    return view('index');
})
    ->name('index');

Route::get('login', function() {
    return view('auth/login');
})
    ->name('login');

Route::get('register', function() {
    return view('auth/register');
})
    ->name('register');

Route::get('/run', function() {
    return view('run');
})
    ->name('run');
