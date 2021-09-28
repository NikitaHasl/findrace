@extends('layout.account')

@section('title', 'Изменение пароля')

@section('content')


<h4 class="feed__title">Изменение пароля</h4>

<form method="POST" action="{{ route('user-password.update') }}">
    @csrf
    @method('PUT')

    @if (session('status') == "password-updated")
    <div class="alert alert-success">
        Изменение пароля прошло успешно!
    </div>
    @endif

    <div class="form-group">
        <label for="current_password">Текущий пароль</label>
        <input id="current_password" type="password" class="form-control @error('current_password', 'updatePassword') is-invalid @enderror" name="current_password" required>

        @error('current_password', 'updatePassword')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

    </div>

    <div class="form-group">
        <label for="password">Новый пароль</label>
        <input id="password" type="password" class="form-control @error('password', 'updatePassword') is-invalid @enderror" name="password" required>

        @error('password', 'updatePassword')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

    </div>

    <div class="form-group">
        <label for="password-confirm">Повтор пароля</label>
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
    </div>
    <br>
    <input class="form-control" type="submit" value="Обновить данные">
</form>

<h4 class="feed__title">Удалить профиль</h4>
<form action="{{ route('account.user.destroy', ['user' => $user ]) }}" method="post" rel="{{ $user }}" class="delete">
    @csrf
    @method('DELETE')
    <input class="form-control" type="submit" value="Удалить профиль">
</form>

@endsection