@extends('layout.main')

@section('title', 'Профиль')


@section('content')
    <div class="profile">
        <p class="profile__name">{{$profile->firstname}} {{$profile->lastname}}</p>
        <p class="profile__email">{{$profile->email}}</p>
        <p class="profile__birthday">{{$profile->birthday}}</p>
        <a href="{{route('chat.show', ['profile' => $profile->id])}}"><button>Написать сообщение</button></a>
    </div>
@endsection
