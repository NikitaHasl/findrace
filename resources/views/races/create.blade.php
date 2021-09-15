@extends('layout.main')

@section('title', 'Создать забег')

@section('head-extra')
    <style>
        label {
            display: block;
        }
    </style>
@endsection

@section('content')
    <div class="login">
        <h1>Создать забег</h1>
        @foreach($errors->all() as $error)
            <p class="error">{{ $error }}</p>
        @endforeach
        <form action="{{ route('races.store') }}" method="post">
            @csrf
            <label>Название: <input required type="text" name="title"></label>
            <label>Город: <select required name="city">
                @foreach($cities as $city)
                    <option value="{{ $city->id }}">{{ $city->city }}</option>
                @endforeach
            </select></label>
            <label>Тип: <select required name="type">
                @foreach($raceTypes as $type)
                    <option value="{{ $type->id }}">{{ $type->type_of_race }}</option>
                @endforeach
            </select></label>
            <label>Дата: <input required type="date" name="date"></label>
            <label>Время: <input required type="time" name="time"></label>
            <label>Дистанция: <input required type="number" name="distance"></label>
            <label>Описание: <textarea required name="description"></textarea></label>
            <label>Место начала: <input required type="text" name="start"></label>
            <label>Место окончания: <input required type="text" name="finish"></label>
            <input type="submit" value="Создать забег">
        </form>
    </div>
@endsection
