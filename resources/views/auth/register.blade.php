@extends('layout.reglog')

@section('title', 'Регистрация')

@section('content')

<div class=registration-header>
    <div class="registration-title">Регестрируйся и беги</div>
    <div class="registration-text">Присоединяйся к нам и бегай по всей России!</div>
</div>


@foreach($errors->all() as $error)
<p class="error">{{ $error }}</p>
@endforeach

<div class=registration-form>
    <form action="/register" method="post">
        @csrf

        <div class="form-group">
            <label class="registration-field">Имя <input name="firstname" placeholder="Введи свое имя"></label>
        </div>

        <!-- <label class="registration__field">Фамилия: <input name="lastname"></label> -->
        <div class="form-group">
            <label class="registration-field">E-mail: <input type="email" name="email" placeholder="Введи свою почту"></label>
        </div>
        <div class="form-group">
            <label class="registration-field">Пароль: <input type="password" name="password" placeholder="Задай свой пароль"></label>
        </div>
        <div class="form-group">
            <label class="registration-field"><input type="password" name="password_confirmation" value="Повтори пароль"></label>
        </div>
        <div class="form-group">
            <fieldset>
                <legend>Роль</legend>
                <label class="registration-field"><input type="radio" name="role" value="user" checked> Участник</label>
                <label class="registration-field"><input type="radio" name="role" value="organizer"> Организатор</label>
            </fieldset>
        </div>
        <div class="form-group">
            <input class="registration-btn" type="submit" value="Зарегистрироваться">
        </div>
    </form>
</div>

@endsection