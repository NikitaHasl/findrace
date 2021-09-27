@extends('layout.main')

@section('title', 'Результаты поиска')


@section('content')
    <div class="userList">
        @foreach($users as $user)
            <div class="user">
                <span class="user__firstName">{{$user->firstname}}</span>
                <span class="user__firstName">{{$user->lastname}}</span>
                <a class="user__profile" href="{{route('profile.show', ['id' => $user->id])}}">Profile</a>
            </div>
        @endforeach
    </div>
@endsection
