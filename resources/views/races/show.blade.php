<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/compiled/styles.css') }}">
    <script defer src="{{ asset('assets/js/app.js') }}"></script>
    <script src="https://kit.fontawesome.com/e4abfd569e.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body class="preload">
    <nav class="nav">
        <a href="{{ route('index') }}"><i class="nav__logo fas fa-running"></i></a>
        <div class="nav__auth">
            <button class="nav__button"><a href="{{ route('login') }}">Войти</a></button>
            <button class="nav__button"><a href="{{ route('register') }}">Регистрация</a></button>
        </div>
    </nav>
    <main class="container">
        <div class="race">
            <div class="race__signUp">
                <img class="race__header" src="{{ asset('assets/images/run_background.png') }}">
                <div class="race__form">
                    <button>Записаться</button>
                    <button>Отложить</button>
                </div>
            </div>
            <div class="race__description">
                <p class="race__title">{{ $race->title }}</p>
                <p class="race__address">{{ $race->city->city }}</p>
                <span class="race__date">{{ $race->date->toFormattedDateString() }}</span>
                <span class="race__length">{{ $race->distance }}&nbsp;м</span>
                <p class="race__subTitle">Описание</p>
                <p class="race__text">{{ $race->description }}</p>
            </div>
            {{-- <div class="race__distanceBlock">
                <p>Дистанции</p>
                <div class="race__distance">
                    <span>42km</span>
                    <i class="fas fa-running"></i>
                    <span class="race__price">700 ₽</span>
                </div>
                <div class="race__distance">
                    <span>21km</span>
                    <i class="fas fa-running"></i>
                    <span class="race__price">700 ₽</span>
                </div>
                <div class="race__distance">
                    <span>10km</span>
                    <i class="fas fa-running"></i>
                    <span class="race__price">700 ₽</span>
                </div>
            </div> --}}
        </div>
    </main>
    <footer></footer>
</body>
</html>
