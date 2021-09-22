@extends('layout.main')

@section('title', 'Вход')

@section('content')
    <div class="login">
        <h1 class="login__header">Вход</h1>
        @foreach($errors->all() as $error)
            <p class="error">{{ $error }}</p>
        @endforeach
        <form action="/login" method="post">
            @csrf
            <label class="login__field">Почта: <input type="email" name="email"></label>
            <label class="login__field">Пароль: <input type="password" name="password"></label>
            <label class="login__field"><input type="checkbox" name="remember">
                Запомнить меня</label>
            <input class="login__btn" type="submit" value="Войти">
        </form>
        <br>
        @if(Route::has('password.request'))
        <a href="{{ route('password.request') }}">Забыли пароль?</a>
        @endif
    </div>
@endsection
