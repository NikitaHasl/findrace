@extends('layout.account')

@section('title', 'Аккаунт')

@section('content')

<div class="inside">
    <div class="left-side">
        <div class="blue-block"></div>
        @if($user->avatar)
        <img src="{{ asset('storage/' . $user->avatar) }}">
        @else
        <img src="https://bootdey.com/img/Content/avatar/avatar1.png">
        @endif

        <div class="user-name">{{$user->firstname}}</div>
        <div class="user-since">на сайте с {{$user->created_at->toDateString()}}</div>
        <div class="run-info">
            <div class="run-number">
                @if($activeRaces)
                {{$activeRaces}}
                @else
                0
                @endif
            </div>
            <div class="run-number"> @if($finishedRaces)
                {{$finishedRaces}}
                @else
                0
                @endif
            </div>
        </div>

        <div class="run-link">
            <div class="run-active">
                <a class="run-text" href="{{route('account.active')}}">Активные забеги</a>
            </div>
            <div class="run-finished">
                <a class="run-text" href="{{route('account.finished')}}">Прошедшие забеги</a>
            </div>
        </div>
        @auth
        @if(Auth::user()->hasRole(\App\Models\Role::ORGANIZER))
        <div class="create-block">
            <div class="create-title">Создать забег</div>
            <div class="create-expl">Ты можешь создавать новые забеги</div>

            <form action="{{ route('races.create') }}" method="get">
                @csrf
                <input class="logout-btn" type="submit" value="Создать">
            </form>
        </div>
        @endif
        @endauth
    </div>

    <div class="right-side">
        <div class="main-data">Основные данные</div>
        <div class="list-data">

            <div><a class="list-data-option" href="{{route('account.data')}}"><i class="fas fa-cog"></i> Настройка данных</a></div>
            <div class="line"></div>
            <div><a class="list-data-option" href="{{route('account.password')}}"><i class="fas fa-lock"></i> Изменить пароль</a></div>
            <div class="line"></div>
            <div><a class="list-data-option" href="{{route('account.avatar')}}"><i class="fas fa-user-circle"></i> Изменить фото профиля</a></div>
            <div class="line"></div>
        </div>
        <div class="expl-data">Ты можешь менять основные данные,
            изменить пароль и фото профиля</div>

        <form action="/logout" method="post">
            @csrf
            <input class="logout-btn" type="submit" value="Выход">
        </form>

        @auth
        @if(Auth::user()->hasRole(\App\Models\Role::ORGANIZER))
        <div class="statistic-block">
            <div class="create-title">Статистика по созданным забегам</div>
            <div class="create-expl">Ты можешь посмотреть все данные, по твоим созданным
                забегам и мероприятиям.</div>

            <form action="{{ route('account.races') }}" method="get">
                @csrf
                <input class="logout-btn watch-btn" type="submit" value="Смотреть">
            </form>
        </div>
        @endif
        @endauth
    </div>


</div>

@endsection