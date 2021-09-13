<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('assets/css/compiled/styles.css')}}">
    <script defer src="{{asset('assets/js/app.js')}}"></script>
    <script src="https://kit.fontawesome.com/e4abfd569e.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body class="preload">
    <nav class="nav">
        <a href="{{route('index')}}"><i class="nav__logo fas fa-running"></i></a>
        <div class="nav__auth">
            @auth
                <button class="nav__button"><a href="{{route('logout')}}">Выйти</a></button>
            @else
                <button class="nav__button"><a href="{{route('login')}}">Войти</a></button>
                <button class="nav__button"><a href="{{route('register')}}">Регистрация</a></button>
            @endauth
        </div>
    </nav>
    <main class="container">
        <section class="filter">
            <p class="filter__header">Фильтры</p>
            <div class="filter__option">
                <div class="filter__titleBlock">
                    <span class="filter__title">Город</span>
                    <span class="filter__expand">+</span>
                </div>
                <div class="filter__cities">
                    <div class="filter__cityOption">
                        <input type="checkbox" id="moscow" name="cities">
                        <label for="moscow">Москва</label>
                    </div>
                    <div class="filter__cityOption">
                        <input type="checkbox" id="petersburg" name="cities">
                        <label for="petersburg">Санкт-Петербург</label>
                    </div>
                    <div class="filter__cityOption">
                        <input type="checkbox" id="kazan" name="cities">
                        <label for="kazan">Казань</label>
                    </div>
                </div>
            </div>
            <div class="filter__option">
                <div class="filter__titleBlock">
                    <span class="filter__title">Дата</span>
                    <span class="filter__expand">+</span>
                </div>
            </div>
            <div class="filter__option">
                <div class="filter__titleBlock">
                    <span class="filter__title">Тип забега</span>
                    <span class="filter__expand">+</span>
                </div>
            </div>
            <div class="filter__option">
                <div class="filter__titleBlock">
                    <span class="filter__title">Местность</span>
                    <span class="filter__expand">+</span>
                </div>
            </div>
            <div class="filter__option">
                <div class="filter__titleBlock">
                    <span class="filter__title">Друзья</span>
                    <span class="filter__expand">+</span>
                </div>
            </div>
            <button class="filter__btn">Применить</button>
        </section>
        <section class="feed">
            <p class="feed__header">Все забеги</p>
            <a href="{{route('run')}}">
                <div class="feed__item">
                    <p class="feed__title">Анивское кольцо 2021 </p>
                    <div class="feed__block">
                        <p class="feed__address">г. Анива на городской площади.</p>
                        <div class="feed__expand">
                            <i class="fas fa-caret-right"></i>
                        </div>
                    </div>
                    <div class="feed__block">
                        <p class="feed_date">11 сентября 2021</p>
                        <p class="feed__distance">10 км</p>
                    </div>
                </div>
            </a>
            <a href="{{route('run')}}">
                <div class="feed__item">
                    <p class="feed__title">Анивское кольцо 2021 </p>
                    <div class="feed__block">
                        <p class="feed__address">г. Анива на городской площади.</p>
                        <div class="feed__expand">
                            <i class="fas fa-caret-right"></i>
                        </div>
                    </div>
                    <div class="feed__block">
                        <p class="feed_date">11 сентября 2021</p>
                        <p class="feed__distance">10 км</p>
                    </div>
                </div>
            </a>
            <a href="{{route('run')}}">
                <div class="feed__item">
                    <p class="feed__title">Анивское кольцо 2021 </p>
                    <div class="feed__block">
                        <p class="feed__address">г. Анива на городской площади.</p>
                        <div class="feed__expand">
                            <i class="fas fa-caret-right"></i>
                        </div>
                    </div>
                    <div class="feed__block">
                        <p class="feed_date">11 сентября 2021</p>
                        <p class="feed__distance">10 км</p>
                    </div>
                </div>
            </a>
            <a href="{{route('run')}}">
                <div class="feed__item">
                    <p class="feed__title">Анивское кольцо 2021 </p>
                    <div class="feed__block">
                        <p class="feed__address">г. Анива на городской площади.</p>
                        <div class="feed__expand">
                            <i class="fas fa-caret-right"></i>
                        </div>
                    </div>
                    <div class="feed__block">
                        <p class="feed_date">11 сентября 2021</p>
                        <p class="feed__distance">10 км</p>
                    </div>
                </div>
            </a>
        </section>
    </main>
    <footer></footer>
</body>
</html>
