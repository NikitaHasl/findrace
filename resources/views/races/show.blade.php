@extends('layout.main')

@section('title', $race->title)

@section('content')
    <div class="race">
        <div class="race__description">
            <div class="race__infoBlock">
                <img class="race__header" src="{{ asset('assets/images/run_background.png') }}">
                <p class="race__title">{{ $race->title }}</p>
                <span class="race__info">{{ $race->date->isoFormat('LL') }}</span>
                <span class="race__info">{{ $race->distance }}&nbsp;км</span>
                <span class="race__time">{{$race->date->format('H:i')}}</span>
                <p class="race__text">{{ $race->description }}</p>
                <div class="race__btn race__favBtn">
                    <i class="far fa-heart"></i>
                    <span>В избранное</span>
                </div>
                <div class="race__btn race__shareBtn">
                    <i class="fas fa-share-square"></i>
                    <span>Поделиться</span>
                </div>
            </div>
            <div class="race__infoBlock">
                <div class="race__infoItem">
                    <div class="race__infoTitle">Место старта</div>
                    <div class="race__infoContent">{{$race->start}}</div>
                </div>
                <div class="race__infoItem">
                    <div class="race__infoTitle">Место финиша</div>
                    <div class="race__infoContent">{{$race->finish}}</div>
                </div>
                <div class="race__infoItem">
                    <div class="race__infoTitle">Время старта</div>
                    <div class="race__infoContent">{{$race->date->format('H:i')}} Начало забега</div>
                </div>
                <div class="race__infoItem">
                    <div class="race__infoTitle">Дистанция</div>
                    <div class="race__infoContent">{{$race->distance}}</div>
                </div>
            </div>
        </div>
        <div class="race__signUp">
            @if(Auth::user() && Auth::user()->hasRole(\App\Models\Role::USER))
                <div class="race__infoBlock race__signUpBlock">
                    <p class="race__infoTitle left">Запишись на дистанцию</p>
                    <p class="race__infoContent left">Ждем тебя на нашем забеге</p>
                    <div class="race__form">
                        @if(session()->has('success'))
                            <div class="race__infoContent left">{{ session()->get('success') }}</div>
                        @endif
                        @if(session()->has('error'))
                            <div class="race__infoContent left">{{ session()->get('error') }}</div>
                        @endif
                        <a href="{{ route('subscribe', ['id' => $race->id]) }}">Записаться</a>
                    </div>
                </div>
            @elseif(Auth::id() === $race->organizer_id)
                <div class="race__infoBlock race__signUpBlock">
                    <div class="race__form">
                        <a href="{{ route('addResults', ['id' => $race->id]) }}">Добавить результаты</a>
                        <a href="{{ route('listParticipants', ['race' => $race]) }}">Список участников</a>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
