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
                        <a class="list-group-item" href="#">
                            <div class="d-flex justify-content-between align-items-center">
                                <div><i class="fe-icon-tag mr-1 text-muted"></i>
                                    <div class="d-inline-block font-weight-medium text-uppercase">Настройки профиля</div>
                                </div><span class="badge badge-secondary">4</span>
                            </div>
                        </a>
                    </nav>
                </div>
            </div>
            <div class="col-lg-8 pb-5">
                <div>
                    <h3 class="feed__title">МОИ НАСТРОЙКИ</h3>
                </div><br><br>
                @if(session()->has('success'))
                    <div>{{ session()->get('success') }}</div><br>
                @endif

                @if(session()->has('error'))
                    <div>{{ session()->get('error') }}</div>
                @endif

                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach

                <h4 class="feed__title">Аватар</h4>

                <form action="{{ route('account.avatar.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="avatar">Новый аватар</label>
                        <input type="file" class="form-control" id="avatar" name="avatar" required accept=".jpg,.jpeg,.png,.bmp,.gif,.svg,.webp,image/jpeg,image/png,image/bmp,image/x-bmp,image/gif,image/svg+xml,image/webp">
                    </div>

                    <p>Максимальный размер 315&nbsp;&times;&nbsp;315</p>

                    <br>
                    <input class="form-control" type="submit" value="Обновить аватар">
                </form>

                @if($user->avatar)
                    <br>
                    <form action="{{ route('account.avatar.destroy') }}" method="post">
                        @csrf
                        @method('DELETE')
                        <input class="form-control" type="submit" value="Удалить аватар">
                    </form>
                @endif

                <br><br>
                <h4 class="feed__title">Настройки профиля</h4>

                <form action="{{ route('account.user.update', ['user' => $user]) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="firstname">Имя</label>
                        <input type="text" class="form-control" id="firstname" name="firstname" value="{{ $user->firstname }}">
                    </div>
                    <div class="form-group">
                        <label for="lastname">Фамилия</label>
                        <input type="text" class="form-control" id="lastname" name="lastname" value="{{ $user->lastname }}">
                    </div>

                    <div class="form-group">
                        <label for="birthday">День рождения</label>
                        <input type="date" class="form-control" id="birthday" name="birthday" value="{{ $user->birthday }}">
                    </div>

                    <div class="form-group">
                        <label for="gender">Пол</label>
                        <select name="gender_id" id="gender" class="form-control">
                            @foreach($genders as $gender)
                            <option value="{{ $gender->id }}" @if($gender->id == $user->gender_id) selected @endif>
                                {{$gender->gender}}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                    </div>
                    <br>
                    <input class="form-control" type="submit" value="Обновить данные">

                </form>
                <br><br>
                <h4 class="feed__title">Изменение пароля</h4>

                <form method="POST" action="{{ route('user-password.update') }}">
                    @csrf
                    @method('PUT')

                    @if (session('status') == "password-updated")
                    <div class="alert alert-success">
                        Изменение пароля прошло успешно!
                    </div>
                    @endif

                    <div class="form-group">
                        <label for="current_password">Текущий пароль</label>
                        <input id="current_password" type="password" class="form-control @error('current_password', 'updatePassword') is-invalid @enderror" name="current_password" required>

                        @error('current_password', 'updatePassword')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>

                    <div class="form-group">
                        <label for="password">Новый пароль</label>
                        <input id="password" type="password" class="form-control @error('password', 'updatePassword') is-invalid @enderror" name="password" required>

                        @error('password', 'updatePassword')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>

                    <div class="form-group">
                        <label for="password-confirm">Повтор пароля</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>
                    <br>
                    <input class="form-control" type="submit" value="Обновить данные">
                </form>


                <br>
                <br><br>
                <h4 class="feed__title">Удалить профиль</h4>
                <form action="{{ route('account.user.destroy', ['user' => $user ]) }}" method="post" rel="{{ $user }}" class="delete">
                    @csrf
                    @method('DELETE')
                    <input class="form-control" type="submit" value="Удалить профиль">
                </form>

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
                    if (confirm("Вы уверены, что хотите удалить ваш аккаунт ?")) {
                        submit("/account/user/destroy" + rel).then(() => {
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
