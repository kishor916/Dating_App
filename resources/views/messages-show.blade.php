

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
            @if($message->receiver_id == auth()->user()->id)
                <h3>{{ $message->sender->first_name }} {{$message->sender->id}}</h3>
            @endif

                @foreach($messages as $message)

                    <hr>
                    <div class="messages">
                    <div class="message">
                        <p class="meta">{{ $message->sender->first_name }} {{ $message->sender->last_name }} <span>{{ $message->created_at }}</span></p>
                        <p>{{ $message->message }}</p>
                    </div>
                        @endforeach

                    </div>

                    @if($message->receiver_id == auth()->user()->id)

            <form action="/messages/{{$message->sender->id}}" method="post">
                @endif
                @csrf
                <div class="form-group">
                    <label for="message" class="text-muted mb-1"><small>Message</small></label>
                    <textarea name="message" class="form-control" id="message"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Send</button>
            </form>
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






        </div>

    </div>


</x-home>
