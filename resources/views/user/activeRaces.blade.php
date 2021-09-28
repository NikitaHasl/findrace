@extends('layout.account')

@section('title', 'Активные забеги')

@section('content')


            <div class="col-lg-8 pb-5">
                <div>
                    <h3 class="feed__title">МОИ ТЕКУЩИЕ ЗАБЕГИ</h3>
                </div><br>
                @if(session()->has('success'))
                <div>{{ session()->get('success') }}</div><br>
                @endif

                @if(session()->has('error'))
                <div>{{ session()->get('error') }}</div>
                @endif

                @forelse($races as $race)
                <div>
                    <div>
                        <h4><i>{{ $race->title }}</i></h4>
                    </div>
                    <div>{{ $race->date }}</div>
                    <div>{{ $race->distance }} км</div>
                    <div><a href="{{ route('races.show', ['race' => $race]) }}">Подробнее...</a></div>
                    <div><a href="{{ route( 'unsubscribe', ['race_id' => $race->id]) }}" class="delete" rel="">Отменить</a></div>
                </div><br><br>
                @empty
                <br><br><br>
                <div>У вас пока что нет ни одной регистрации на забег!</div>
                <div><a href="{{ route('index')}}">Записаться на мой первый забег</a></div>
                @endforelse
            </div>
  >

@endsection 