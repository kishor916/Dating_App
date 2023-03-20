@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Messages</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form method="post" action="{{ route('messages.store') }}">
            @csrf
            <div class="form-group">
                <label for="recipient_id">Recipient:</label>
                <select name="recipient_id" id="recipient_id" class="form-control">
                    <option value="">-- Select a recipient --</option>
                    @foreach (auth()->user()->followings as $following)
                        <option value="{{ $following->id }}">{{ $following->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="body">Message:</label>
                <textarea name="body" id="body" class="form-control" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Send Message</button>
        </form>

        <hr>

        <h2>Received Messages</h2>

        @foreach ($messages as $message)
            @if ($message->recipient_id == auth()->user()->id)
                <div class="card mb-3">
                    <div class="card-header">
                        From: {{ $message->sender_name }}
                    </div>
                    <div class="card-body">
                        {{ $message->body }}
                    </div>
                    <div class="card-footer text-muted">
                        {{ $message->created_at->diffForHumans() }}
                    </div>
                </div>
            @endif
        @endforeach

        <hr>

        <h2>Sent Messages</h2>

        @foreach ($messages as $message)
            @if ($message->sender_id == auth()->user()->id)
                <div class="card mb-3">
                    <div class="card-header">
                        To: {{ $message->recipient_name }}
                    </div>
                    <div class="card-body">
                        {{ $message->body }}
                    </div>
                    <div class="card-footer text-muted">
                        {{ $message->created_at->diffForHumans() }}
                    </div>
                </div>
            @endif
        @endforeach
    </div>
@endsection
