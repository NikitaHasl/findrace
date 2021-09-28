@extends('layout.account')

@section('title', 'Изменение данных')

@section('content')

<h4 class="feed__title">Настройки профиля</h4>

<form action="{{ route('account.user.update', ['user' => $user]) }}" method="post">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="firstname">Имя</label>
        <input type="text" class="form-control" id="firstname" name="firstname" value="{{ $user->firstname }}">
    </div>
    <div class="form-group">
        <label for="lastname">Фамилия</label>
        <input type="text" class="form-control" id="lastname" name="lastname" value="{{ $user->lastname }}">
    </div>

    <div class="form-group">
        <label for="birthday">День рождения</label>
        <input type="date" class="form-control" id="birthday" name="birthday" value="{{ $user->birthday }}">
    </div>

    <div class="form-group">
        <label for="gender">Пол</label>
        <select name="gender_id" id="gender" class="form-control">
            @foreach($genders as $gender)
            <option value="{{ $gender->id }}" @if($gender->id == $user->gender_id) selected @endif>
                {{$gender->gender}}
            </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
    </div>
    <br>
    <input class="form-control" type="submit" value="Обновить данные">

</form>

@endsection