@extends('layout.main')

@section('title', 'Создать забег')


@section('content')
    <div class="chat">
        <div class="chat__messageSection">
            <div class="chat__previousMessages">
                @foreach($messages as $message)
                    @if($message->recipient_id == $author_id)
                        <div class="message message--other">
                            <div class="message__content">{{$message->content}}</div>
                        </div>
                    @else
                        <div class="message message--own">
                            <div class="message__content">{{$message->content}}</div>
                        </div>
                    @endif
                @endforeach
            </div>
            <form action="{{route('chat.store', ['recipient' => $recipient[0]->id])}}" method="post">
                @csrf
                <input class="chat__input" type="text" name="message">
                <input class="chat__submit" type="submit" value="Отправить">
            </form>
        </div>
        <div class="chat__profile">
                <p class="profile__name">{{$recipient[0]->firstname}} {{$recipient[0]->lastname}}</p>
        </div>
    </div>
@endsection
