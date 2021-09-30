@extends('layout.account')

@section('title', 'Изменение аватара')

@section('content')

<div class="settings-general">
    <div class="settings-text">
        <div class="settings-title">
            Настройки аватара
        </div>
        <div class="settings-expl">
            Измени свой аватар
        </div>
    </div>
    @if($user->avatar)
    <img class="img-update" src="{{ asset('storage/' . $user->avatar) }}">
    @else
    <img class="img-update" src="https://bootdey.com/img/Content/avatar/avatar1.png">
    @endif

    <form action="{{ route('account.avatar.update') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="avatar" class="settings-field">Новый аватар</label>
            <input type="file" class="form-control" id="avatar" name="avatar" required accept=".jpg,.jpeg,.png,.bmp,.gif,.svg,.webp,image/jpeg,image/png,image/bmp,image/x-bmp,image/gif,image/svg+xml,image/webp">
        </div>

        <div class="settings-expl">Максимальный размер 315&nbsp;&times;&nbsp;315</div>

        <br>
        <input class="update-btn avatar-btn" type="submit" value="Обновить аватар">
    </form>
    <br><br>
    @if($user->avatar)
    <form action="{{ route('account.avatar.destroy') }}" method="post">
        @csrf
        @method('DELETE')
        <input class="update-btn" type="submit" value="Удалить аватар">
    </form>
</div>
@endif

@endsection