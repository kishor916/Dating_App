<x-home>


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="width: 60rem;">
                    <div class="card-header">{{ __('Inbox') }}</div>
                    @foreach ($messages as $message)

                        <div class="card">
                            <img src="#" class="card-img-top" alt="">
                            <div class="card-body">
                                <a href="#">
                                    {{ $message->sender->first_name }}:
                                </a>
                                <p class="card-text">{{$message->message}}</p>
                                <a href="{{ route('messages.show', $message->sender) }}" class="btn btn-primary">Reply</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


</x-home>
