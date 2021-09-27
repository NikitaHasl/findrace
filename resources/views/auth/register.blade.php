@extends('layout.reglog')

@section('title', 'Регистрация')

@section('content')
<div class="right-side registration">
    <div class=registration-header>
        <div class="registration-title">Регистрируйся и беги</div>
        <div class="registration-text">Присоединяйся к нам и бегай по всей России!</div>
    </div>

    <form class="registration-form" action="/register" method="post">
        @csrf

        <div class="form-group">
            <label for="firstname" class="registration-field">Имя</label>
            <input type="text" name="firstname" id="firstname" placeholder="Введи свое имя">
            @error('firstname')
            <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="lastname" class="registration-field">Фамилия</label>
            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Введи свою фамилию">
            @error('lastname')
            <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="email" class="registration-field">E-mail</label>
            <input type="email" id="email" name="email" placeholder="Введи свою почту">
            @error('email')
            <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="password" class="registration-field">Пароль</label>
            <input type="password" id="password" name="password" placeholder="Задай свой пароль">
            @error('password')
            <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="password_confirmation" class="registration-field"></label>
            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Повтори пароль">
            @error('password_confirmation')
            <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <fieldset>
                <legend class="registration-field">Роль</legend>
                <label class="registration-field">
                    <input type="radio" name="role" value="user" checked>Участник</label>
                <label class="registration-field">
                    <input type="radio" name="role" value="organizer">Организатор</label>
            </fieldset>
        </div>

        <div class="form-group">
            <input class="registration-btn" type="submit" value="Зарегистрироваться">
        </div>
    </form>
</div>
@endsection