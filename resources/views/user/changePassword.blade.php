@extends('layout.account')

@section('title', 'Изменение пароля')

@section('content')

<div class="settings-password">
    <div class="settings-text">
        <div class="settings-title">
            Задай новый пароль
        </div>
        <div class="settings-expl">
            Задай новый пароль для твоего аккаунта
        </div>
    </div>
    <form class="change-password-form" method="POST" action="{{ route('user-password.update') }}">
        @csrf
        @method('PUT')

        @if (session('status') == "password-updated")
        <div class="info-success">
            Изменение пароля прошло успешно!
        </div>
        @endif

        <div class="form-group">
            <label for="current_password" class="settings-field">Текущий пароль</label>
            <input id="current_password" type="password" class="form-control @error('current_password', 'updatePassword') is-invalid @enderror" name="current_password" placeholder="Введи текущий пароль" required>

            @error('current_password', 'updatePassword')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="password" class="settings-field">Новый пароль</label>
            <input id="password" type="password" class="form-control @error('password', 'updatePassword') is-invalid @enderror" name="password" placeholder="Введи новый пароль" required>

            @error('password', 'updatePassword')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

        </div>

        <div class="form-group">
            <label for="password-confirm"></label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Повтори пароль" required>
        </div>
        <input class="update-btn" type="submit" value="Обновить пароль">
    </form>

    <div>
        <form action="{{ route('account.user.destroy', ['user' => $user ]) }}" method="post" rel="{{ $user }}" class="delete">
            @csrf
            @method('DELETE')
            <input class="delete-btn" type="submit" value="Удалить аккаунт">
        </form>
    </div>
</div>

@endsection