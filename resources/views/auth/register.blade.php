<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <title>Регистрация</title>
        <style>
            label {
                display: block;
            }
            .error {
                color: red;
                font-weight: bold;
            }
        </style>
    </head>
    <body>
        <h1>Регистрация</h1>
        @foreach($errors->all() as $error)
            <p class="error">{{ $error }}</p>
        @endforeach
        <form action="/register" method="post">
            @csrf
            <label>Имя: <input name="name"></label>
            <label>Почта: <input type="email" name="email"></label>
            <label>Пароль: <input type="password" name="password"></label>
            <label>Повтор пароля: <input type="password"
                name="password_confirmation"></label>
            <input type="submit" value="Зарегистрироваться">
        </form>
    </body>
</html>
