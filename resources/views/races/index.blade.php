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
    <title>Document</title>
</head>
<body class="preload">
    <nav class="nav">
        <a href="{{ route('index') }}"><i class="nav__logo fas fa-running"></i></a>
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
        <section class="filter">
            <form action="{{route('filterRace.show')}}" method="get">
                <p class="filter__header">Фильтры</p>
                <div class="filter__option">
                    <div class="filter__titleBlock">
                        <span class="filter__title">Город</span>
                        <span class="filter__expand">+</span>
                    </div>
                    <div class="filter__block">
                        <div class="filter__item">
                            <input type="checkbox" id="moscow" name="id city1" value="1">
                            <label for="moscow">Москва</label>
                        </div>
                        <div class="filter__item">
                            <input type="checkbox" id="petersburg" name="id city2" value="2">
                            <label for="petersburg">Санкт-Петербург</label>
                        </div>
                        <div class="filter__item">
                            <input type="checkbox" id="kazan" name="id city3" value="3">
                            <label for="kazan">Казань</label>
                        </div>
                    </div>
                </div>
                <div class="filter__option">
                    <div class="filter__titleBlock">
                        <span class="filter__title">Дата</span>
                        <span class="filter__expand">+</span>
                    </div>
                    <div class="filter__block">TEST</div>
                </div>
                <div class="filter__option">
                    <div class="filter__titleBlock">
                        <span class="filter__title">Тип забега</span>
                        <span class="filter__expand">+</span>
                    </div>
                    <div class="filter__block">
                        <div class="filter__item">
                            <input type="checkbox" id="run" name="id type1" value="1">
                            <label for="run">Забег</label>
                        </div>
                        <div class="filter__item">
                            <input type="checkbox" id="swim" name="id type2" value="2">
                            <label for="swim">Плавание</label>
                        </div>
                        <div class="filter__item">
                            <input type="checkbox" id="cycle" name="id type3" value="3">
                            <label for="cycle">Велогонка</label>
                        </div>
                        <div class="filter__item">
                            <input type="checkbox" id="triathlon" name="id type3" value="3">
                            <label for="triathlon">Триатлон</label>
                        </div>
                    </div>
                </div>
                <div class="filter__option">
                    <div class="filter__titleBlock">
                        <span class="filter__title">Местность</span>
                        <span class="filter__expand">+</span>
                    </div>
                    <div class="filter__block">TEST</div>
                </div>
                <div class="filter__option">
                    <div class="filter__titleBlock">
                        <span class="filter__title">Друзья</span>
                        <span class="filter__expand">+</span>
                    </div>
                    <div class="filter__block">TEST</div>
                </div>
                <button class="filter__btn">Применить</button>
            </form>
        </section>
        <section class="feed">
            <p class="feed__header">Все забеги</p>
            @foreach($races as $race)
                <a href="{{ route('races.show', ['race' => $race]) }}">
                    <div class="feed__item">
                        <p class="feed__title">{{ $race->title }}</p>
                        <div class="feed__block">
                            <p class="feed__address">{{ $race->city->city }}</p>
                            <div class="feed__expand">
                                <i class="fas fa-caret-right"></i>
                            </div>
                        </div>
                        <div class="feed__block">
                            <p class="feed_date">{{ $race->date->isoFormat('LL') }}</p>
                            <p class="feed__distance">{{ round($race->distance / 1000) }}&nbsp;км</p>
                        </div>
                    </div>
                </a>
            @endforeach
        </section>
    </main>
    <footer></footer>
</body>
</html>
