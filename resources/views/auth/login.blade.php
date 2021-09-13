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
        <button class="nav__button"><a href="{{route('register')}}">Регистрация</a></button>
    </div>
</nav>
<main class="container">
    <div class="login">
        <h1 class="login__header">Вход</h1>
        @foreach($errors->all() as $error)
            <p class="error">{{ $error }}</p>
        @endforeach
        <form action="/login" method="post">
            @csrf
            <label class="login__field">Почта: <input type="email" name="email"></label>
            <label class="login__field">Пароль: <input type="password" name="password"></label>
            <label class="login__field"><input type="checkbox" name="remember">
                Запомнить меня</label>
            <input class="login__btn" type="submit" value="Войти">
        </form>
    </div>
</main>
<footer></footer>
</body>
</html>
