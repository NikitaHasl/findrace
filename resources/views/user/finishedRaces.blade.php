@extends('layout.account')

@section('title', 'Прошедшие забеги')

@section('content')

<h3 class="feed__title">МОИ ПРОШЕДШИЕ ЗАБЕГИ</h3>
</div><br>
@if(session()->has('success'))
<div>{{ session()->get('success') }}</div><br>
@endif

@if(session()->has('error'))
<div>{{ session()->get('error') }}</div>
@endif

@forelse($races as $race)
<div>
    <div>
        <h4><i>{{ $race->title }}</i></h4>
    </div>
    <div>{{ $race->date }}</div>
    <div>{{ $race->distance }} км</div>
    <div>Твое время: {{$race->finish_time}}</div>
    <div>Твое место: {{$race->place}}</div>
    <div><a href="{{ route('races.show', ['race' => $race]) }}">Подробне...</a></div>
    <div><a href="{{ route( 'unsubscribe', ['race_id' => $race->id]) }}" class="delete" rel="">Отменить</a></div>
</div><br><br>
@empty
<br><br><br>
<div>У вас пока что нет ни одной регистрации на забег!</div>
<div><a href="{{ route('index')}}">Записаться на мой первый забег</a></div>
@endforelse
</div>


@endsection