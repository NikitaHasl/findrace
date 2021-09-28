@extends('layout.reglog')

@section('title', 'Вход')

@section('content')

<div class=registration-header>
    <div class="registration-title">Сброс пароля</div>
    <div class="registration-text">Задай новый пароль для твоего аккаунта!</div>
</div>

<form class="reset-form" method="POST" action="{{ route('password.update') }}">
    @csrf

    <input type="hidden" name="token" value="{{ request()->token }}">

    <div class="form-group">
        <label for="email" class="registration-field">E-mail</label>
        <input id="email" type="email" name="email" placeholder="Введи свою почту">

        @error('email')
        <p class="error-message">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="password" class="registration-field">Новый пароль</label>
        <input id="password" type="password" name="password" placeholder="Введи новый пароль">

        @error('password')
        <p class="error-message">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="password-confirm"></label>
        <input id="password-confirm" type="password" name="password_confirmation" placeholder="Повтори пароль">

        @error('password-confirm')
        <p class="error-message">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <input class="registration-btn" type="submit" value="Отправить">
    </div>
</form>

@endsection