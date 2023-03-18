<x-home>

    <section id="header">
        <div class="container-fluid p-5" >
            <div class="row">
                <div class="col-3 pt-5 ps-5 ">
                    <img src="https://www.wrappixel.com/demos/ui-kit/wrapkit/assets/images/testimonial/1.jpg"
                         alt="wrapkit" class="rounded-circle img-fluid" style="max-height: 200px"/>
                </div>
                <div class="col-9 pt-5">
                    <div><h1>{{$firstName}} {{$lastName}}</h1></div>
                    @auth
                        {{--                {{dd($user)}}--}}
                        {{--                if the user is not currentfollowing and the user is not the loggin in user the show follow button--}}
                        @if(!$currentlyFollowing AND auth()->user()->id !== $user)
                            <form class="ml-2 d-inline" action="/create-follow/{{$user}}" method="POST">
                                @csrf
                                <button class="btn btn-primary btn-sm">Follow <i class="fas fa-user-plus"></i></button>
                                <!-- <button class="btn btn-danger btn-sm">Stop Following <i class="fas fa-user-times"></i></button> -->
                            </form>
                        @endif

                        @if($currentlyFollowing)
                            <form class="ml-2 d-inline" action="/remove-follow/{{$user}}" method="POST">
                                @csrf

                                <button class="btn btn-danger btn-sm">Stop Following <i class="fas fa-user-times"></i></button>
                            </form>

{{--                            <form class="ml-2 d-inline" action="#" method="POST">--}}
{{--                                @csrf--}}

                                <button class="btn btn-primary btn-sm"><a href={{route('message.create')}}>Message</a></button>
{{--                            </form>--}}
                        @endif

                        @if(auth()->user()->id == $user)
                            <a href="#" class="btn btn-secondary btn-sm">Manage Avatar</a>
                        @endif
                    @endauth



                    <div class="profile-nav nav nav-tabs pt-2 mb-4">
{{--                        <a href="/profile/{{$user}}" class="profile-nav-link nav-item nav-link {{ Request::segment(3) == "" ? "active" : '' }} ">Posts:</a>--}}
                        <a href="/profile/{{$user}}/followers" class="profile-nav-link nav-item nav-link {{ Request::segment(3) == "followers" ? "active" : '' }} ">Followers</a>
                        <a href="/profile/{{$user}}}/following" class="profile-nav-link nav-item nav-link {{ Request::segment(3) == "following" ? "active" : '' }} ">Following</a>
                    </div>
                    <div class="profile-slot-content">
                        {{$slot}}
                    </div>
                    <div class="pt-3 font-weight-medium">Bio</div>
                    <div>Mayalu is a dating website that helps people find their perfect match.</div>
                    <div><a href="#">www.mayalu.org.com</a></div>
                </div>


            </div>
        </div>
            <section/>

</x-home>
