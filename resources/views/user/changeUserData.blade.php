@extends('layout.account')

@section('title', 'Изменение данных')

@section('content')

<div class="settings-general">
    <div class="settings-text">
        <div class="settings-title">
            Настройки профиля
        </div>
        <div class="settings-expl">
            Измени информацию о себе
        </div>
    </div>
    @if(session()->has('success'))
    <div class="success">{{ session()->get('success') }}</div>
    @endif

    @if(session()->has('error'))
    <div class="info-error">{{ session()->get('error') }}</div>
    @endif

    <i class="fas fa-chevron-down arrow"></i>
    <form class="change-info-form" action="{{ route('account.user.update', ['user' => $user]) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="firstname" class="settings-field">Имя</label>
            <input type="text" class="form-control" id="firstname" name="firstname" value="{{ $user->firstname }}">
        </div>
        <div class="form-group">
            <label for="lastname" class="settings-field">Фамилия</label>
            <input type="text" class="form-control" id="lastname" name="lastname" value="{{ $user->lastname }}">
        </div>

        <div class="form-group">
            <label for="birthday" class="settings-field">День рождения</label>
            <input type="date" id="birthday" name="birthday" value="{{ $user->birthday }}">
        </div>

        <div class="form-group">
            <label for="gender" class="settings-field">Пол</label>
            <select name="gender_id" id="gender">
                @foreach($genders as $gender)
                <option value="{{ $gender->id }}" @if($gender->id == $user->gender_id) selected @endif>
                    {{$gender->gender}}
                </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="email" class="settings-field">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
        </div>
        <br>
        <input class="update-btn" type="submit" value="Обновить данные">

    </form>
</div>

@endsection