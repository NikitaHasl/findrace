<!doctype html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <script defer src="{{ asset('assets/js/app.js') }}"></script>
    <script src="https://kit.fontawesome.com/e4abfd569e.js" crossorigin="anonymous"></script>
    <title>@yield('title')</title>
    @yield('head-extra')
</head>

<body>
    <nav class="nav">
        <div class="color-block"><a class="logo-text" href="{{ route('index') }}">FindRace</a></div>
    </nav>
    <main class="container">
        <div class="left-side">
            <img class="run-img" src="{{ asset('assets/images/run_reglog.png') }}">
            <div class="white-parallelogram">
            </div>
        </div>
       
            @yield('content')
      
    </main>
    <footer></footer>
</body>

</html>