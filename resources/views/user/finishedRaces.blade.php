@extends('layout.account')

@section('title', 'Прошедшие забеги')

@section('content')


<div class="run-title">
    Прошедшие забеги
</div>
<div class="run-expl">
    Тут собраны все забеги, в которых ты принял участие и данные по ним.
</div>


@if(count($races) >= 1)
<table>
    <tr class="table-top">
        <th>Название забега</th>
        <th>Дата забега</th>
        <th>Город</th>
        <th>Дистанция, км</th>
        <th>Твое время</th>
        <th>Место</th>
    </tr>
    @foreach($races as $race)
    <tr class="table-row">
        <th>{{ $race->title }}</th>
        <th>{{ $race->date->format('Y-m-d') }}</th>
        <th>{{ $race->city->city }}</th>
        <th>{{ $race->distance }}</th>
        <th>@if($race->finish_time)
            {{ $race->finish_time }}
            @else
            нет инфо
            @endif
        </th>
        <th>@if($race->place)
            {{ $race->place }}
            @else
            нет инфо
            @endif
        </th>
    </tr>
    @endforeach
</table>
@endif
@empty(count($races))
<div class="no-run">Вы пока что не участвовали ни в одном забеге.</div>
@endempty




@endsection