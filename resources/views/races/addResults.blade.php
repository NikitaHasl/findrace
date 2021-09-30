@extends('layout.account')

@section('title', 'Добавить результаты')

@section('content')

<div class="settings-general">
    <div class="settings-text">
        <div class="settings-title">
            Добавить результаты забега
        </div>
        <div class="settings-expl">
            Тут можно добавить резльтаты по каждому участнику
        </div>
        <h3>Забег {{ $race->title }}</h3>
    </div>

    @foreach($errors->all() as $error)
    <p class="error">{{ $error }}</p>
    @endforeach

    @if(count($race->users) >= 1)
    <form action=" {{ route('updateResults', ['race' => $race]) }} " method="post">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="title"></label>
            <input type="hidden" name="title" id="title" value="{{ $race->title }}" readonly>
        </div>

        <div class="form-group">
            <label for="user_id" class="settings-field">Участник забега</label>
            <select required name="user_id" id="user_id">
                @foreach($race->users as $user)
                <option value="{{ $user->id }}" @if(isset($user_id) && $user_id==$user->id) selected @endif>
                    {{ $user->firstname }} {{ $user->lastname }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="finish_time" class="settings-field">Время (в секундах) </label>
            <input required type="number" name="finish_time" id="finish_time">
        </div>

        <div class="form-group">
            <label for="place" class="settings-field">Место</label>
            <input required type="number" name="place" id="place">
        </div>
        <br>
        <input class="update-btn create-btn" type="submit" value="Сохранить результат">
    </form>
    <form class="back-btn" action="{{ route('account.races') }}" method="get">
        @csrf
        <input class="update-btn" type="submit" value="Обратно">
    </form>

    @endif

    @empty(count($race->users))
    <div>Еще никто не записался на данный забег.</div>

    <form class="back-form" action="{{ route('account.races') }}" method="get">
        @csrf
        <input class="update-btn" type="submit" value="Обратно">
    </form>
    @endempty
</div>


@endsection