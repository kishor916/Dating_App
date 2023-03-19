<x-profile :firstName="$firstName" :lastName="$lastName"  :user="$user" :currentlyFollowing="$currentlyFollowing" :currentFollowers="$currentFollowers" >

        @foreach($followings as $following)
        <a href="/profile/{{$following->userBeingFollowed->id}}" class="list-group-item list-group-item-action">
                        <img class="avatar-tiny" src="$" />
            {{$following->userBeingFollowed->first_name}} {{$following->userBeingFollowed->last_name}}
        </a>
    @endforeach


</x-profile>
