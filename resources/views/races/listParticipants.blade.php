@extends('layout.account')

@section('title', 'Список участников')

@section('content')


<div class="run-title">
    Участники забега
</div>
<div class="run-expl">
    Тут собрана вся информация об участниках забега {{ $race->title }}.
</div>

@if(count($participants) >= 1)
    <table>
        <tr class="table-top">
            <th>Фото</th>
            <th>Имя</th>
            <th>Фамилия</th>
            <th>Время</th>
            <th>Место</th>
        </tr>
        @foreach($participants as $participant)
        <tr class="table-row">
            <th>@if($participant->avatar)
                <img class="img-org-displ" src="{{ asset('storage/' . $participant->avatar) }}">
                @endif
            </th>
            <th>{{ $participant->firstname }}</th>
            <th>{{ $participant->lastname }}</th>
            <th>@if($participant->finish_time)
                {{ $participant->finish_time }}
                @else
                нет инфо
                @endif
            </th>
            <th>@if($participant->place)
                {{ $participant->place }}
                @else
                нет инфо
                @endif
            </th>
        </tr>
        @endforeach
    </table>
@endif
@empty(count($participants))
    <div class="no-run">Еще никто не записался на данный забег.</div>
@endempty

<form class="back-form back-left" action="{{ route('account.races') }}" method="get">
    <input class="update-btn" type="submit" value="Обратно">
</form>

@endsection
