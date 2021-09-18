@extends('layout.main')

@section('title', 'Все забеги')

@section('content')
<section class="filter">
    <form action="{{route('index')}}" method="get">
        <p class="filter__header">Фильтры</p>
        <div class="filter__option">
            <div class="filter__titleBlock">
                <span class="filter__title">Город</span>
                <span class="filter__expand">+</span>
            </div>
            <div class="filter__block">
                @foreach($cities as $city)
                <p>{{$city->city}}<input type="checkbox" name="{{$city->city}} city" value="{{$city->id}}"></p>
                @endforeach
            </div>
            <div class="filter__option">
                <div class="filter__titleBlock">
                    <span class="filter__title">Дата</span>
                    <span class="filter__expand">+</span>
                </div>
                <div class="filter__block">TEST</div>
            </div>
        </div>
        <div class="filter__option">
            <div class="filter__titleBlock">
                <span class="filter__title">Тип забега</span>
                <span class="filter__expand">+</span>
            </div>
            <div class="filter__block">
                @foreach($types as $type)
                <p>{{$type->type_of_race}}<input type="checkbox" name="{{$type->type_of_race}} type" value="{{$type->id}}"></p>
                @endforeach
            </div>
        </div>
        <div class="filter__option">
            <div class="filter__titleBlock">
                <span class="filter__title">Местность</span>
                <span class="filter__expand">+</span>
            </div>
            <div class="filter__block">TEST</div>
        </div>
        <div class="filter__option">
            <div class="filter__titleBlock">
                <span class="filter__title">Друзья</span>
                <span class="filter__expand">+</span>
            </div>
            <div class="filter__block">TEST</div>
        </div>
        <button class="filter__btn">Применить</button>
    </form>
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
                <p class="feed__distance">{{ $race->distance }}&nbsp;км</p>
            </div>
        </div>
    </a>
    @endforeach
</section>
@endsection