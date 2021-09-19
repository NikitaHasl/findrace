@extends('layout.main')

@section('title', 'Участники: ' . $race->title)

@section('content')
    <div>
        <h1>Участники</h1>
        <h2>{{ $race->title }}</h2>
        @if($participants->isEmpty())
            <p>Участников нет.</p>
        @else
            <ul>
                @foreach($participants as $participant)
                    <li>{{ $participant->firstname }} {{ $participant->lastname }} &bull;
                        <a href="{{ route('addResults', ['id' => $race->id, 'user' => $participant->id]) }}">Добавить результаты</a></li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
