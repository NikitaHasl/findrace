@extends('layout.main')

@section('title', $race->title)

@section('content')
    <div class="race">
        <div class="race__signUp">
            <img class="race__header" src="{{ asset('assets/images/run_background.png') }}">
            <div class="race__form">
                <button>Записаться</button>
                <button>Отложить</button>
            </div>
        </div>
        <div class="race__description">
            <p class="race__title">{{ $race->title }}</p>
            <p class="race__address">{{ $race->city->city }}</p>
            <span class="race__date">{{ $race->date->isoFormat('LL') }}</span>
            <span class="race__length">{{ round($race->distance / 1000) }}&nbsp;км</span>
            <p class="race__subTitle">Описание</p>
            <p class="race__text">{{ $race->description }}</p>
        </div>
        {{-- <div class="race__distanceBlock">
            <p>Дистанции</p>
            <div class="race__distance">
                <span>42km</span>
                <i class="fas fa-running"></i>
                <span class="race__price">700 ₽</span>
            </div>
            <div class="race__distance">
                <span>21km</span>
                <i class="fas fa-running"></i>
                <span class="race__price">700 ₽</span>
            </div>
            <div class="race__distance">
                <span>10km</span>
                <i class="fas fa-running"></i>
                <span class="race__price">700 ₽</span>
            </div>
        </div> --}}
    </div>
@endsection