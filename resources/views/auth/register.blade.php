@extends('layout.main')

@section('title', 'Регистрация')

@section('content')
    <div class="registration">
        <h1 class="registration__header">Регистрация</h1>
        @foreach($errors->all() as $error)
            <p class="error">{{ $error }}</p>
        @endforeach
        <form action="/register" method="post">
            @csrf
            <label class="registration__field">Имя: <input name="firstname"></label>
            <label class="registration__field">Фамилия: <input name="lastname"></label>
            <label class="registration__field">Почта: <input type="email" name="email"></label>
            <label class="registration__field">Пароль: <input type="password" name="password"></label>
            <label class="registration__field">Повтор пароля: <input type="password" name="password_confirmation"></label>
            <fieldset>
                <legend>Роль</legend>
                <label class="registration__field"><input type="radio" name="role" value="user" checked> Участник</label>
                <label class="registration__field"><input type="radio" name="role" value="organizer"> Организатор</label>
            </fieldset>
            <input class="registration__btn" type="submit" value="Зарегистрироваться">
        </form>
    </div>
@endsection
