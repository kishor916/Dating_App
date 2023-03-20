<x-homefeed :user="$user" :cards="$cards">

    <!-- Card section -->


    <div class="container">
        <div class="row">
            @foreach($cards as $card)
                @if($card->id !== Auth::user()->id)
                    <div class="col-md-3 mb-3">
                        <div class="card" style="width: 18rem;">

                            <img src="/storage/{{$card->profile_picture}}" class="card-img-top" alt="Doctor 1"
                                 width="300"
                                 height="200">
                            <div class="card-body">
                                <h5 class="card-title">{{$card->first_name}} {{$card->last_name}}</h5>
                                <p class="card-text">{{$card->gender}}</p>
                                <a href="/profile/{{$card->id}}" class="btn btn-primary mr-2">View Profile</a>
                                <a href="#" class="btn btn-success">Follow</a>
                            </div>
                        </div>
                    </div>

                @endif
            @endforeach
        </div>
        <div class="mt-6 p-4">
            {{$cards->links()}}
        </div>

    </div>
</x-homefeed>


























