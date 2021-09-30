@extends('layout.index')

@section('title', 'Все забеги')

@section('content')

<div class="filter">
    <form action="{{route('index')}}" method="get">
        <p class="filter__header">Фильтры</p>
        <div class="filter__option">
            <div class="filter__titleBlock">
                <span class="filter__title">Город</span>
                <span class="filter__expand">+</span>
            </div>
            <div class="filter__block">
                @foreach($cities as $city)
                <p class="filter_option"><input type="checkbox" name="{{$city->city_title}} city" value="{{$city->id}}">{{$city->city_title}}</p>
                @endforeach
            </div>
        </div>
        <div class="filter__option">
            <div class="filter__titleBlock">
                <span class="filter__title">Тип забега</span>
                <span class="filter__expand">+</span>
            </div>
            <div class="filter__block">
                @foreach($types as $type)
                <p class="filter_option"><input type="checkbox" name="{{$type->type_of_race}} type" value="{{$type->id}}">{{$type->type_of_race}}</p>
                @endforeach
            </div>
        </div>
        <button class="filter__btn">Применить</button>
    </form>
</div>

<div class="feed">
    <div class="search">
        <form action="{{ route('search') }}" method="get">
            @csrf
            <input class="nav_form" type="search" name="string">
            <button class="nav__button" type="submit"><i class="fas fa-search"></i></button>
        </form>
    </div>
    <p class="feed__header">Все забеги</p>
    @foreach($races as $race)
    <a href="{{ route('races.show', ['race' => $race]) }}">

        <div class="feed__item">
            <img class="feed__img" src="{{ $race->picture ? asset('storage/' . $race->picture) : asset('assets/images/run_background.png') }}">
            <div class="feed__block">
                <p class="feed__title">{{ $race->title }}</p>

                <p class="feed__address">{{ $race->city->city_title }}</p>
                <p class="feed_date">{{ $race->date->isoFormat('LL') }}</p>
                <p class="feed__distance">{{ $race->distance }}&nbsp;км</p>
            </div>
        </div>
    </a>
    @endforeach
</div>
@endsection
