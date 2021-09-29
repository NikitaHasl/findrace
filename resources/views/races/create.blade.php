@extends('layout.account')

@section('title', 'Создать забег')

@section('content')
<div class="settings-general">
    <div class="settings-text">
        <div class="settings-title">
            Создать забег
        </div>
        <div class="settings-expl">
            Тут ты можешь создать свой забег
        </div>
    </div>

    @if(session()->has('success'))
    <div class="success">{{ session()->get('success') }}</div>
    @endif

    @foreach($errors->all() as $error)
    <div class="info-error">{{ $error }}</div>
    @endforeach

    <form action="{{ route('races.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="title" class="settings-field">Название</label>
            <input required type="text" name="title" id="title">
        </div>

        <div class="form-group">
            <label for="city" class="settings-field">Город</label>
            <select required name="city" id="city">
                @foreach($cities as $city)
                <option value="{{ $city->id }}">{{ $city->city }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="type" class="settings-field">Тип</label>
            <select required name="type" id="type">
                @foreach($raceTypes as $type)
                <option value="{{ $type->id }}">{{ $type->type_of_race }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="status" class="settings-field">Статус</label>
            <select required name="status" id="status">
                @foreach($raceStatuses as $status)
                <option value="{{ $status->id }}">{{ $status->status }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="date" class="settings-field">Дата </label>
            <input required type="date" name="date" id="date">
        </div>
        <div class="form-group">
            <label for="time" class="settings-field">Время </label>
            <input required type="time" name="time" id="time">
        </div>
        <div class="form-group">
            <label for="distance" class="settings-field">Дистанция</label>
            <input required type="number" name="distance" id="distance">
        </div>
        <div class="form-group">
            <label for="description" class="settings-field">Описание</label>
            <textarea required name="description" id="description"></textarea>
        </div>
        <div class="form-group">
            <label for="start" class="settings-field">Место начала</label>
            <input required type="text" name="start" id="start">
        </div>
        <div class="form-group">
            <label for="finish" class="settings-field">Место окончания</label>
            <input required type="text" name="finish" id="finish">
        </div>
        <input class="update-btn create-btn" type="submit" value="Создать забег">
    </form>
</div>

@endsection