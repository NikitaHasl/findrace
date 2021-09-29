<!doctype html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/stylesMain.css') }}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <script defer src="{{ asset('assets/js/app.js') }}"></script>
    <title>@yield('title')</title>
    @yield('head-extra')
</head>

<body>
    <div class="wrapper">

        <header class="header">
            <a class="logo-text" href="{{ route('index') }}">FindRace</a>
            <a class="account-text" href="{{ route('index') }}">Главная</a>
            @auth
            <a class="account-text" href="#">Чат</a>
            <a class="account-text" href="{{ route('account') }}">Профиль</a>
            @else
            <a class="account-text" href="{{ route('login') }}">Войти</a>
            <a class="account-text" href="{{ route('register') }}">Регистрация</a>
            @endauth
        </header>

        <main class="main">
            @yield('content')
        </main>

        <footer class="footer">
            <div class="footer-left">
                <a class="account-text" href="{{ route('index') }}">Все забеги</a>
            </div>
            <div class="footer-right">
                <a class="account-text" href="#">Правила использования</a>
                <a class="account-text" href="#">Политика конфиденциальности</a>
                <span class="account-text">FindRace&copy;2021</span>
            </div>
        </footer>

    </div>

@stack('js')

</body>

</html>