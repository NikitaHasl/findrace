<!doctype html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('assets/css/compiled/styles.css')}}">
    <script defer src="{{asset('assets/js/app.js')}}"></script>
    <script src="https://kit.fontawesome.com/e4abfd569e.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Account</title>
</head>

<body>

    <div class="container mt-5">
        <nav class="nav">
            <a href="{{ route('index') }}"><i class="nav__logo fas fa-running"></i></a>
            <div class="nav__auth">
                <button class="nav__button"><a href="{{ route('index') }}">На главную</a></button>
                <button class="nav__button"><a href="{{ route('logout') }}">Выйти</a></button>
            </div>
        </nav>
        <div class="row">
            <div class="col-lg-4 pb-5">
                <!-- Account Sidebar-->
                <div class="author-card pb-3">
                    <div class="author-card-profile">
                        <div class="author-card-avatar">
                            @if($user->avatar)
                                <img src="{{ asset('storage/' . $user->avatar) }}">
                            @else
                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png">
                            @endif
                        </div>
                        <div class="author-card-details">
                            <h5 class="author-card-name text-lg">{{$user->firstname}} {{$user->lastname}}</h5><span class="author-card-position">присоединился {{$user->created_at->toDateString()}}</span>
                        </div>
                    </div>
                </div>
                <div class="wizard">
                    <nav class="list-group list-group-flush">
                        <a class="list-group-item" href="{{route('account.active')}}">
                            <div class="d-flex justify-content-between align-items-center">
                                <div><i class="fe-icon-shopping-bag mr-1 text-muted"></i>
                                    <div class="d-inline-block font-weight-medium text-uppercase">Мои текущие забеги</div>
                                </div><span class="badge badge-secondary">6</span>
                            </div>
                        </a>
                        <a class="list-group-item" href="{{route('account.finished')}}">
                            <div class="d-flex justify-content-between align-items-center">
                                <div><i class="fe-icon-shopping-bag mr-1 text-muted"></i>
                                    <div class="d-inline-block font-weight-medium text-uppercase">Мои прошедшие забеги</div>
                                </div><span class="badge badge-secondary">6</span>
                            </div>
                        </a>
                        <a class="list-group-item" href="#">
                            <div class="d-flex justify-content-between align-items-center">
                                <div><i class="fe-icon-heart mr-1 text-muted"></i>
                                    <div class="d-inline-block font-weight-medium text-uppercase">Мои награды</div>
                                </div><span class="badge badge-secondary">3</span>
                            </div>
                        </a>
                        <a class="list-group-item" href="{{route('account.user.index')}}">
                            <div class="d-flex justify-content-between align-items-center">
                                <div><i class="fe-icon-tag mr-1 text-muted"></i>
                                    <div class="d-inline-block font-weight-medium text-uppercase">Настройки профиля</div>
                                </div><span class="badge badge-secondary">4</span>
                            </div>
                        </a>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {

            const datatablesSimple = document.getElementById('datatablesSimple');
            if (datatablesSimple) {
                new simpleDatatables.DataTable(datatablesSimple);
            }

            const el = document.querySelectorAll(".delete");
            el.forEach(function(e, k) {
                e.addEventListener('click', function() {
                    const rel = e.getAttribute("rel");
                    if (confirm("Вы уверены, что хотите отменить регистрацию забега под номером " + rel + " ?")) {
                        submit("/account/unsubscribe/" + rel).then(() => {
                            location.reload();
                        })
                    }
                });
            })
        });
        async function submit(url) {
            let response = await fetch(url, {
                method: 'DELETE',
            });
            let result = await response.json();
            return result.ok;
        }
    </script>

</body>

</html>
