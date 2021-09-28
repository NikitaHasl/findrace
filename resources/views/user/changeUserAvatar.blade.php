@extends('layout.account')

@section('title', 'Изменение пароля')

@section('content')

<h4 class="feed__title">Аватар</h4>

<form action="{{ route('account.avatar.update') }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="avatar">Новый аватар</label>
        <input type="file" class="form-control" id="avatar" name="avatar" required accept=".jpg,.jpeg,.png,.bmp,.gif,.svg,.webp,image/jpeg,image/png,image/bmp,image/x-bmp,image/gif,image/svg+xml,image/webp">
    </div>

    <p>Максимальный размер 315&nbsp;&times;&nbsp;315</p>

    <br>
    <input class="form-control" type="submit" value="Обновить аватар">
</form>

@if($user->avatar)
<br>
<form action="{{ route('account.avatar.destroy') }}" method="post">
    @csrf
    @method('DELETE')
    <input class="form-control" type="submit" value="Удалить аватар">
</form>
@endif

@endsection