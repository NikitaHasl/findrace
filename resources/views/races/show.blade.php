@extends('layout.main')

@section('title', $race->title)

@section('content')
    <div class="race">
        <div class="race__signUp">
            <img class="race__header" src="{{ asset('assets/images/run_background.png') }}">
            <div class="race__form">
                @if(session()->has('success'))
                    <div class="alert alert-success">{{ session()->get('success') }}</div>
                @endif
                @if(session()->has('error'))
                    <div class="alert alert-warning">{{ session()->get('error') }}</div>
                @endif
                @auth
                    @if(Auth::user()->hasRole(\App\Models\Role::ORGANIZER))
                        <button><a href="{{ route('addResults', ['id' => $race->id]) }}">Добавить результаты</a>
                        </button>
                    @elseif(Auth::user()->hasRole(\App\Models\Role::USER))
                        <button><a href="{{ route('subscribe', ['id' => $race->id]) }}">Записаться</a></button>
                    @endif
                @endauth
            <!-- <button>Отложить</button> -->
            </div>
        </div>
        <div class="race__description">
            <p class="race__title">{{ $race->title }}</p>
            <p class="race__address">{{ $race->city->city }}</p>
            <span class="race__date">{{ $race->date->isoFormat('LL') }}</span>
            <span class="race__length">{{ $race->distance }}&nbsp;км</span>
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
