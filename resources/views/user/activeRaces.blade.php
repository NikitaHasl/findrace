@extends('layout.account')

@section('title', 'Активные забеги')

@section('content')



<div class="run-title">
    Активные забеги
</div>
<div class="run-expl">
Тут собраны забеги, в которых ты точно примешь участие.
</div>

@if(session()->has('success'))
<div class="info-success">{{ session()->get('success') }}</div>
@endif

@if(session()->has('error'))
<div class="info-error">{{ session()->get('error') }}</div>
@endif


@if(count($races) >= 1)
<table>
    <tr class="table-top">
        <th>Название забега</th>
        <th>Дистанция, км</th>
        <th>Дата забега</th>
        <th>Город</th>
        <th>Отменить запись</th>
    </tr>
    @foreach($races as $race)
    <tr class="table-row">
        <th>{{ $race->title }}</th>
        <th>{{ $race->distance }}</th>
        <th>{{ $race->date }}</th>
        <th>{{ $race->city->city_title }}</th>
        <th><a class="table-row-link" href="{{ route( 'unsubscribe', ['race_id' => $race->id]) }}" class="delete" rel="">Отменить</a></th>
    </tr>
    @endforeach
</table>
@endif
@empty(count($races))
<div class="no-run">У вас пока что нет ни одной регистрации на забег.</div>
@endempty




@endsection