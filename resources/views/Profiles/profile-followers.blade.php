<x-profileHead :firstName="$firstName" :lastName="$lastName" :user="$user" :currentlyFollowing="$currentlyFollowing" >
    @foreach($followers as $follow)
        <a href="/profile/{{$follow->userDoingTheFollowing->id}}" class="list-group-item list-group-item-action">
            {{--<img class="avatar-tiny w-100" src="/storage/{{$->profile_picture}}" />--}}
                {{$follow->userDoingTheFollowing->first_name}} {{$follow->userDoingTheFollowing->last_name}}
        </a>
    @endforeach
</x-profileHead>
