<x-profile :firstName="$firstName" :lastName="$lastName"  :user="$user" :currentlyFollowing="$currentlyFollowing" >
    @foreach($followers as $follow)
        <a href="/profile/{{$follow->userDoingTheFollowing->id}}" class="list-group-item list-group-item-action">
{{--            <img class="avatar-tiny" src="{{$post->user->avatar}}" />--}}
                {{$follow->userDoingTheFollowing->first_name}} {{$follow->userDoingTheFollowing->last_name}}
        </a>
    @endforeach
</x-profile>
