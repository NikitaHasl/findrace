<!doctype html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('assets/css/compiled/styles.css')}}">
    <script defer src="{{asset('assets/js/app.js')}}"></script>
    <link rel="stylesheet" href="{{asset('assets/css/compiled/styles_account.css')}}">
    <script defer src="{{asset('assets/js/app.js')}}"></script>
    <script src="https://kit.fontawesome.com/e4abfd569e.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Account</title>
</head>

<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-4 pb-5">
                <!-- Account Sidebar-->
                <div class="author-card pb-3">
                    <div class="author-card-cover" style="background-image: url(https://demo.createx.studio/createx-html/img/widgets/author/cover.jpg);"><a class="btn btn-style-1 btn-white btn-sm" href="#" data-toggle="tooltip" title="" data-original-title="You currently have 290 Reward points"><i class="fa fa-award text-md"></i>&nbsp;290 points</a></div>
                    <div class="author-card-profile">
                        <div class="author-card-avatar"><img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="Daniel Adams">
                        </div>
                        <div class="author-card-details">
                            <h5 class="author-card-name text-lg">{{$user->firstname}} {{$user->lastname}}</h5><span class="author-card-position">joined {{$user->created_at->toDateString()}}</span>
                        </div>
                    </div>
                </div>
                <div class="wizard">
                    <nav class="list-group list-group-flush">
                        <a class="list-group-item" href="#">
                            <div class="d-flex justify-content-between align-items-center">
                                <div><i class="fe-icon-shopping-bag mr-1 text-muted"></i>
                                    <div class="d-inline-block font-weight-medium text-uppercase">Мои забеги</div>
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
                        <a class="list-group-item" href="{{ route('logout') }}">
                            <div class="d-flex justify-content-between align-items-center">
                                <div><i class="fe-icon-tag mr-1 text-muted"></i>
                                    <div class="d-inline-block font-weight-medium text-uppercase">Выход</div>
                                </div><span class="badge badge-secondary">4</span>
                            </div>
                        </a>
                    </nav>
                </div>
            </div>
            <div class="col-lg-8 pb-5">

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</body>

</html>