@extends('layout.reglog')

@section('title', 'Вход')

@section('content')

<div class=registration-header>
    <div class="registration-title">Вход в аккаунт</div>
    <div class="registration-text">Мы рады твоему возвращению!</div>
</div>

<form class="login-form" action="/login" method="post">
    @csrf
    <div class="form-group">
    <label for="email" class="registration-field">E-mail</label>
        <input type="email" id="email" name="email" placeholder="Введи свою почту">
        @error('email')
        <p class="error-message">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="password" class="registration-field">Пароль</label>
        <input type="password" id="password" name="password" placeholder="Введи пароль">
        @error('password')
        <p class="error-message">{{ $message }}</p>
        @enderror
    </div>
    <div class="forgot-password">
        @if(Route::has('password.request'))
        <a class="forgot-password-text" href="{{ route('password.request') }}">Забыли пароль?</a>
        @endif
    </div>
    <input class="registration-btn" type="submit" value="Вход">
</form>

@endsection