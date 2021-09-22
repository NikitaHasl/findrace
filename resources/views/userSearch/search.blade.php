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
    <form action="{{route('searchForUser')}}" method="get">
        <input type="text" placeholder="Имя" name="firstname">
        <input type="text" placeholder="Фамилия" name="lastname">
        <input type="submit">
    </form>
@endsection
