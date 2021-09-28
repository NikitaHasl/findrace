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

        <div class="user-info">{{$user->firstname}}</div>
        <div class="user-info">since {{$user->created_at->toDateString()}}</div>
    </div>

    <div class="right-side">

        <a href="{{route('account.user.index')}}">
            Настройки профиля
        </a>


    </div>


</div>





@endsection