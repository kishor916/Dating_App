<x-profileHead :firstName="$firstName" :lastName="$lastName"  :user="$user" :currentlyFollowing="$currentlyFollowing" :profile_picture="$profile_picture">
<div>
        @foreach($followings as $following)

        <a href="/profile/{{$following->userBeingFollowed->id}}">
            <img class="avatar-tiny w-10" src="{{dd($following->userBeingFollowed->profile_picture)}}"> {{$following->userBeingFollowed->first_name}} {{$following->userBeingFollowed->last_name}}
        </a>
    @endforeach
</div>


</x-profileHead>

