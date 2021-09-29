@extends('layout.account')

@section('title', 'Созданные забеги')

@section('content')

@auth
@if(Auth::user()->hasRole(\App\Models\Role::ORGANIZER))

<div class="run-title">
    Мои созданные забеги
</div>
<div class="run-expl">
    Тут собраны все забеги, которые ты создал.
</div>

<div class="race__form">
    @if(session()->has('success'))
    <div class="alert alert-success">{{ session()->get('success') }}</div>
    @endif
    @if(session()->has('error'))
    <div class="alert alert-warning">{{ session()->get('error') }}</div>
    @endif
</div>


@if(count($races) >= 1)
<table>
    <tr class="table-top">
        <th>Название забега</th>
        <th>Дата забега</th>
        <th>Город</th>
        <th>Дистанция, км</th>
        <th>Список участников</th>
        <th>Добавить результаты</th>
    </tr>
    @foreach($races as $race)
    <tr class="table-row">
        <th>{{ $race->title }}</th>
        <th>{{ $race->date->format('Y-m-d') }}</th>
        <th>{{ $race->city->city }}</th>
        <th>{{ $race->distance }}</th>
        <th><a class="table-row-link" href="{{ route('listParticipants', ['race' => $race]) }}">Показать</a></th>
        <th><a class="table-row-link" href="{{ route('addResults', ['id' => $race->id]) }}">Добавить</a></th>
    </tr>
    @endforeach
</table>
@endif
@empty(count($races))
<div class="no-run">Вы пока что не создали ни одного забега.</div>
@endempty

@endif
@endauth

@endsection