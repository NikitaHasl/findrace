@extends('layout.main')

@section('title', 'Создать забег')


@section('content')
    <div class="profile">
        <p class="profile__name">{{$profile[0]->firstname}} {{$profile[0]->lastname}}</p>
        <p class="profile__email">{{$profile[0]->email}}</p>
        <p class="profile__birthday">{{$profile[0]->birthday}}</p>
        <button>Написать сообщение</button>
    </div>
@endsection
