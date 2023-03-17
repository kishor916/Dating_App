<x-main>
    <div class="container pt-2">
    <div class="row">
        <div class="col-2 pt-4 ">
            <img src="/storage/{{$user->profile_picture}}"
                alt="wrapkit" class="rounded-circle img-fluid w-100"/>
        </div>

        <div class="col-9 pt-5 ">
            <div class="d-flex justify-content-between align-items-baseline">

                <h1 class="text-5xl font-bold">{{$user->first_name}} <span>{{$user->last_name}}</span></h1>
                    {{--                {{dd($user)}}--}}
                    {{--                if the user is not currentfollowing and the user is not the loggin in user the show follow button--}}
                @if(!$currentlyFollowing AND auth()->user()->id !== $user->id)
                    <form class="ml-2 d-inline" action="/create-follow/{{$user->id}}" method="POST">
                        @csrf
                        <button class="btn btn-primary btn-sm">Follow <i class="fas fa-user-plus"></i></button>
                        <!-- <button class="btn btn-danger btn-sm">Stop Following <i class="fas fa-user-times"></i></button> -->
                    </form>
                @endif
                @if($currentlyFollowing)
                <form class="ml-2 d-inline" action="/remove-follow/{{$user->id}}" method="POST">
                    @csrf
                    <button class="btn btn-primary btn-sm">Unfollow <i class="fas fa-user-plus"></i></button>
                    <!-- <button class="btn btn-danger btn-sm">Stop Following <i class="fas fa-user-times"></i></button> -->
                </form>
                @endif


                    {{--@if($currentlyFollowing)
                        <form class="ml-2 d-inline" action="/remove-follow/{{$user}}" method="POST">
                            @csrf

                            <button class="btn btn-danger btn-sm">Stop Following <i class="fas fa-user-times"></i></button>
                        </form>--}}

                        {{--                    <form class="ml-2 d-inline" action="#" method="POST">--}}
                        {{--                        @csrf--}}

                        {{--                        <button class="btn btn-primary btn-sm">Message <i class="fas fa-user-plus"></i></button>--}}
                        {{--                    </form>--}}

            </div>
            <div class="d-flex pt-2">
            <div>
                @if($user->id == Auth::user()->id)
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#signupModal" style="background-color: dimgray">Edit Avatar</button>
                @endif
            </div>
            <div class="ps-3">
                @if($user->id == Auth::user()->id)
                <button class="btn btn-secondary"><a href="/profile/{{$user->id}}/edit">Edit Profile</a></button>
                @endif
            </div>
                <div class="ps-3">
                    @if($user->id == Auth::user()->id)
                        <button class="btn btn-secondary"> <a href="/p/create">Add  New Post</a></button>
                    @endif
                </div>
            </div>

               {{-- <div class="  d-flex pt-2">
                    <div class=" pe-4"><button class="btn  btn-outline-dark text-sm mx-1 font-bold bg-gary-300 hover-gray-500"><span><strong>{{$user->posts->count()}}</strong></span><a href="/profile/{{$user->id}}">  Post</a></button></div>
                    <div class="pe-4"><button class="btn btn-outline-dark text-sm mx-1 font-bold bg-gary-300 hover-gray-500"><span><strong>15</strong></span> <a href="/profile/{{$user->id}}/follower">  followers</a></button></div>
                    <div class="pe-4"><button class="btn btn-outline-dark text-sm mx-1 font-bold bg-gary-300 hover-gray-500"><span><strong>128</strong></span> <a href="/profile/{{$user->id}}/following">  following</a></button></div>

                </div>--}}

            <div class="pt-2">
                <p class="text-xl font-bold">Bio</p>
            <p class="px-2">{{$user->bio}}</p>
            </div>

            <div class="profile-nav nav nav-tabs pt-2 mb-4">
                <a href="/profile/{{$user->id}}" class="profile-nav-link text-xl nav-item text-black nav-link {{ Request::segment(3) == "" ? "active" : '' }} "><span><strong>{{$user->posts->count()}}</strong></span> Posts:</a>
                <a href="/profile/{{$user->id}}/follower" class="profile-nav-link text-xl text-black nav-item nav-link {{Request::segment(3) == "follower" ? "active": ""}} "> <span><strong></strong></span> Followers</a>
                <a href="/profile/{{$user->id}}/following" class="profile-nav-link text-xl text-black nav-item nav-link {{ Request::segment(3) == "following" ? "active" : "" }} ">Following</a>
            </div>

        </div>
    <div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-blue-100">
                    <h5 class="modal-title" id="signupModalLabel">Upload Profile Picture</h5>
                    <button type="button" class=    "text-gray-400 text-3xl font-bold hover:text-gray-500 focus:outline-none focus:text-gray-500 transition ease-in-out duration-150" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body bg-blue-100">
                    <form method="POST" action="/i" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <label for="image" class="col-md-4 col-form-label">Post Image</label>

                            <input type="file" class="form-control-file" id="image" name="profile_picture">

                            @if ($errors->has('profile_picture'))
                                <strong>{{ $errors->first('profile_picture') }}</strong>
                            @endif
                        </div>
                    <div class="pt-2">
                        <button type="submit" class="btn btn-info">Post</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


        <div class="modal fade" id="follow" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-blue-100">
                        <h5 class="modal-title" id="signupModalLabel">Upload Profile Picture</h5>
                        <button type="button" class="text-gray-400 text-3xl font-bold hover:text-gray-500 focus:outline-none focus:text-gray-500 transition ease-in-out duration-150" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body bg-blue-100">
                        <form method="POST" action="/i" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <label for="image" class="col-md-4 col-form-label">Post Image</label>

                            </div>
                            <button type="submit" class="btn ">Sign Up</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="profile-slot-content">
            {{$slot}}
        </div>

</div>
<div>
</div>
    </div>
</x-main>


