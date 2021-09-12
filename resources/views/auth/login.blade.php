<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <title>Вход</title>
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
        <h1>Вход</h1>
        @foreach($errors->all() as $error)
            <p class="error">{{ $error }}</p>
        @endforeach
        <form action="/login" method="post">
            @csrf
            <label>Почта: <input type="email" name="email"></label>
            <label>Пароль: <input type="password" name="password"></label>
            <label><input type="checkbox" name="remember">
                Запомнить меня</label>
            <input type="submit" value="Войти">
        </form>
    </body>
</html>
