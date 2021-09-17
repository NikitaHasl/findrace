<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/compiled/styles.css') }}">
    <script defer src="{{ asset('assets/js/app.js') }}"></script>
    <script src="https://kit.fontawesome.com/e4abfd569e.js" crossorigin="anonymous"></script>
    <title>@yield('title')</title>
    @yield('head-extra')
</head>
<body class="preload">
    <nav class="nav">
        <a href="{{ route('index') }}"><i class="nav__logo fas fa-running"></i></a>
        <div>
            <form action="{{ route('search') }}" method="get">
                @csrf
                <input type="search" name="string">
                <button type="submit"><i class="fas fa-search"></i></button>
            </form>
        </div>
        <div class="nav__auth">
            @auth
                <button class="nav__button"><a href="{{ route('logout') }}">Выйти</a></button>
            @else
                <button class="nav__button"><a href="{{ route('login') }}">Войти</a></button>
                <button class="nav__button"><a href="{{ route('register') }}">Регистрация</a></button>
            @endauth
        </div>
    </nav>
    <main class="container">
        @yield('content')
    </main>
    <footer></footer>
</body>
</html>
