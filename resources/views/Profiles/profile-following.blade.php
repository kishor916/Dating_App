<x-profileHead :firstName="$firstName" :lastName="$lastName"  :user="$user" :currentlyFollowing="$currentlyFollowing" >
<div>
        @foreach($followings as $following)
        <a href="/profile/{{$following->userBeingFollowed->id}}" class="list-group-item list-group-item-action">
                        {{--<img class="avatar-tiny" src="/storage/{{$user->profile_picture}}" />--}}
            {{$following->userBeingFollowed->first_name}} {{$following->userBeingFollowed->last_name}}
        </a>
    @endforeach
</div>


</x-profileHead>
