<x-profileHead :firstName="$firstName" :lastName="$lastName"  :user="$user" :currentlyFollowing="$currentlyFollowing" :profile_picture="$profile_picture">

<div class="list-group pt-5">
        @foreach($followers as $follow)
            <a href="/profile/{{$follow->userDoingTheFollowing->id}}" class="list-group-item list-group-item-action">
              {{--  <img class="avatar-tiny w-100" src="{{$user->profileImage()}}" alt="no image">--}}
                {{$follow->userDoingTheFollowing->first_name}} {{$follow->userDoingTheFollowing->last_name}}
            </a>
        @endforeach
    </div>

</x-profileHead>
