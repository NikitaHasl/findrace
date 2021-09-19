@extends('layout.main')

@section('title', 'Добавить результаты забега')

@section('head-extra')
    <style>
        label {
            display: block;
        }
    </style>
@endsection

@section('content')
    <div class="login">
        <h1>Добавить результаты забега</h1>
        @foreach($errors->all() as $error)
            <p class="error">{{ $error }}</p>
        @endforeach
        <form action=" {{ route('updateResults', ['race' => $race]) }} " method="post">
            @csrf
            @method('put')
            <label>Название: {{ $race->title }} </label>
            <label>Участник: <select required name="user_id">
                    @foreach($race->users as $user)
                        <option value="{{ $user->id }}"
                            @if(isset($user_id) && $user_id == $user->id) selected @endif
                        >{{ $user->firstname }} {{ $user->lastname }}</option>
                    @endforeach
                </select></label>
            <label>Время (в секундах): <input required type="number" name="finish_time"></label>
            <label>Место: <input required type="number" name="place"></label>
            <input type="submit" value="Сохранить результат">
        </form>
    </div>
@endsection
