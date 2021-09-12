<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <title>Выход</title>
    </head>
    <body>
        <h1>Выход</h1>
        <form action="/logout" method="post">
            @csrf
            <input type="submit" value="Выйти">
        </form>
    </body>
</html>
