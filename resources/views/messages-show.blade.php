{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--    <div class="container">--}}
{{--        <div class="row justify-content-center">--}}
{{--            <div class="col-md-8">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-header">{{ __('Conversation with') }} {{ $user->name }}</div>--}}

{{--                    <div class="card-body">--}}
{{--                        <ul>--}}
{{--                            @foreach ($messages as $message)--}}
{{--                                <li>--}}
{{--                                    <strong>{{ $message->sender->name }}</strong>: {{ $message->message }}--}}
{{--                                </li>--}}
{{--                            @endforeach--}}
{{--                        </ul>--}}

{{--                        <form method="post" action="{{ route('messages.store', $user) }}">--}}
{{--                            @csrf--}}

{{--                            <div class="form-group">--}}
{{--                                <label for="message">{{ __('Message') }}</label>--}}
{{--                                <textarea id="message" name="message" class="form-control{{ $errors->has('message') ? ' is-invalid' : '' }}" required>{{ old('message') }}</--}}


{{--@extends('layouts.app')--}}

{{--                                    @section('content')--}}
{{--                                        <div class="row">--}}
{{--                                        <div class="col-md-3">--}}
{{--                                        <h3>Conversations</h3>--}}
{{--                                        <ul class="list-unstyled">--}}
{{--                                        @foreach($messages as $message)--}}
{{--                                            <li>--}}
{{--                                            <a href="{{ route('messages.show', $message->sender->first_name ) }}">--}}
{{--                                            {{ $conversation->recipient->name }}--}}
{{--                                            {{ $message->sender->first_name }}--}}
{{--                                            </a>--}}
{{--                                            </li>--}}
{{--                                        @endforeach--}}
{{--                                        </ul>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-md-9">--}}
{{--                                        <h3>{{ $recipient->name }}</h3>--}}
{{--                                        <hr>--}}
{{--                                        <div class="messages">--}}
{{--                                        @foreach($conversation as $message)--}}
{{--                                            <div class="message">--}}
{{--                                            <p class="meta">{{ $message->sender->name }} <span>{{ $message->created_at->diffForHumans() }}</span></p>--}}
{{--                                            <p>{{ $message->body }}</p>--}}
{{--                                            </div>--}}
{{--                                        @endforeach--}}
{{--                                        </div>--}}
{{--                                        <form action="{{ route('messages.store', $recipient->username) }}" method="POST">--}}
{{--                                        @csrf--}}
{{--                                        <div class="form-group">--}}
{{--                                        <textarea name="body" class="form-control"></textarea>--}}
{{--                            </div>--}}
{{--                            <button type="submit" class="btn btn-primary">Send</button>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--@endsection--}}

<x-home>
    <div class="row">
        <div class="col-md-3">
            <h3>Conversations</h3>
            <ul class="list-unstyled">
                @foreach($messages as $message)
                    <li>
                        <a href="{{ route('messages.show', $message->receiver->first_name) }}">
                            {{ $message->receiver->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-9">
            <h3>{{ $receiver->first_name }}</h3>
            <hr>
            <div class="messages">
                @foreach($messages as $message)
                    <div class="message">
                        <p class="meta">{{ $message->sender->first_name }} <span>{{ $message->created_at->diffForHumans() }}</span></p>
                        <p>{{ $message->body }}</p>
                    </div>
                @endforeach
            </div>
            <form action="{{ route('messages.store', $receiver->first_name) }}" method="POST">
                @csrf
                <div class="form-group">
                    <textarea name="body" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Send</button>
            </form>
        </div>
    </div>
</x-home>
