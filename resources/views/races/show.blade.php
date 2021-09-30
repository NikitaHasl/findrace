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
                @if(Auth::user()->hasRole(\App\Models\Role::ORGANIZER) && Auth::id() === $race->organizer_id && !is_null($race->organizer_id))
                    <button><a href="{{ route('addResults', ['id' => $race->id]) }}">Добавить результаты</a></button>
                    <button><a href="{{ route('listParticipants', ['race' => $race]) }}">Список участников</a></button>
                @elseif($subscribers->contains(Auth::id()))
                    <button disabled>Вы уже записаны.</button>
                @elseif(Auth::user()->hasRole(\App\Models\Role::USER))
                    <button><a href="{{ route('subscribe', ['id' => $race->id]) }}">Записаться</a></button>
                @endif
            <!-- <button>Отложить</button> -->
            </div>
        </div>
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
                    @if(Auth::id() === $race->organizer_id)
                        <a href="{{ route('addResults', ['id' => $race->id]) }}">Добавить результаты</a>
                        <a href="{{ route('listParticipants', ['race' => $race]) }}">Список участников</a>
                    @elseif(Auth::user() && Auth::user()->hasRole(\App\Models\Role::USER))
                        <a href="{{ route('subscribe', ['id' => $race->id]) }}">Записаться</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
