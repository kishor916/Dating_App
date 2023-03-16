<x-profileHead :firstName="$firstName" :lastName="$lastName" :user="$user" :currentlyFollowing="$currentlyFollowing">
    <div class="row pt-5">
        @foreach($user->posts as $post)
            <div class="col-4 pb-4">
                <img src="/storage/{{$post->image}}"alt="wrapkit" class="w-100">

            </div>
        @endforeach
    </div>
</x-profileHead>
