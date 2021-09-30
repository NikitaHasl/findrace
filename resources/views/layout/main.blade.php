<!doctype html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/compiled/styles.css') }}">
    <script defer src="{{ asset('assets/js/app.js') }}"></script>
    <script src="https://kit.fontawesome.com/e4abfd569e.js" crossorigin="anonymous"></script>
    <title>@yield('title')</title>
    @yield('head-extra')
</head>

<body class="preload">
    <nav class="nav">
        <a class="nav__logo" href="{{ route('index') }}">FindRace</a>
        <div class="nav__auth">
            @auth
            <a class="nav__item nav__item--active" href="{{ route('index') }}">Главная</a>
            <a class="nav__item" href="{{ route('userSearch') }}">Чат</a>
            <a class="nav__item" href="{{ route('account') }}">Профиль</a>
            @else
            <a class="nav__item nav__item--active" href="{{ route('index') }}">Главная</a>
            <a class="nav__item" href="{{ route('login') }}">Войти</a>
            <a class="nav__item" href="{{ route('register') }}">Регистрация</a>
            @endauth
        </div>
    </nav>
    <main class="container">
        @yield('content')
    </main>
    <footer></footer>
</body>

</html>
