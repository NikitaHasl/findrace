@extends('layout.reglog')

@section('title', 'Вход')

@section('content')

<div class=registration-header>
    <div class="registration-title">Восстановление пароля</div>
    <div class="registration-text">Мы отправим на твою почту ссылку для сброса старого пароля!</div>
</div>

@if (session('status'))
<div class="alert-success">
    {{ session('status') }}
</div>
@endif

<form class="recovery-form" method="post" action="{{ route('password.email') }}">
    @csrf
    <div class="form-group">
        <label for="email" class="registration-field">E-mail</label>
        <input id="email" type="email" name="email" placeholder="Введи свою почту">
        @error('email')
        <p class="error-message">{{ $message }}</p>
        @enderror
    </div>
    <input class="registration-btn" type="submit" value="Отправить">
</form>

@endsection