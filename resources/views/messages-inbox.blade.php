<x-home>


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Inbox') }}</div>

                    <div class="card-body">
                        <ul>
                            @foreach ($messages as $message)
                                <li>
                                    <a href="{{ route('messages.show', $message->sender) }}">
                                        {{ $message->sender->name }}: {{ $message->message }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-home>
