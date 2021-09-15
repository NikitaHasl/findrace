@extends('layout.main')

@section('title', 'Все забеги')

@section('content')
    <section class="filter">
        <p class="filter__header">Фильтры</p>
        <div class="filter__option">
            <div class="filter__titleBlock">
                <span class="filter__title">Город</span>
                <span class="filter__expand">+</span>
            </div>
            <div class="filter__cities">
                <div class="filter__cityOption">
                    <input type="checkbox" id="moscow" name="cities">
                    <label for="moscow">Москва</label>
                </div>
                <div class="filter__cityOption">
                    <input type="checkbox" id="petersburg" name="cities">
                    <label for="petersburg">Санкт-Петербург</label>
                </div>
                <div class="filter__cityOption">
                    <input type="checkbox" id="kazan" name="cities">
                    <label for="kazan">Казань</label>
                </div>
            </div>
        </div>
        <div class="filter__option">
            <div class="filter__titleBlock">
                <span class="filter__title">Дата</span>
                <span class="filter__expand">+</span>
            </div>
        </div>
        <div class="filter__option">
            <div class="filter__titleBlock">
                <span class="filter__title">Тип забега</span>
                <span class="filter__expand">+</span>
            </div>
        </div>
        <div class="filter__option">
            <div class="filter__titleBlock">
                <span class="filter__title">Местность</span>
                <span class="filter__expand">+</span>
            </div>
        </div>
        <div class="filter__option">
            <div class="filter__titleBlock">
                <span class="filter__title">Друзья</span>
                <span class="filter__expand">+</span>
            </div>
        </div>
        <button class="filter__btn">Применить</button>
    </section>
    <section class="feed">
        <p class="feed__header">Все забеги</p>
        @auth
            @if(Auth::user()->hasRole(\App\Models\Role::ORGANIZER))
                <p><a href="{{ route('races.create') }}">Создать забег</a></p>
            @endif
        @endauth
        @foreach($races as $race)
            <a href="{{ route('races.show', ['race' => $race]) }}">
                <div class="feed__item">
                    <p class="feed__title">{{ $race->title }}</p>
                    <div class="feed__block">
                        <p class="feed__address">{{ $race->city->city }}</p>
                        <div class="feed__expand">
                            <i class="fas fa-caret-right"></i>
                        </div>
                    </div>
                    <div class="feed__block">
                        <p class="feed_date">{{ $race->date->isoFormat('LL') }}</p>
                        <p class="feed__distance">{{ round($race->distance / 1000) }}&nbsp;км</p>
                    </div>
                </div>
            </a>
        @endforeach
    </section>
@endsection
