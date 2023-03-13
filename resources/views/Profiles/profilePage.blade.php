@extends('layouts.app')
@section('content')
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
                    <form class="ml-2 d-inline" action="/create-follow/{{$user->id}}" method="POST">
                        @csrf
                        <button class="btn btn-primary btn-sm">Follow <i class="fas fa-user-plus"></i></button>
                        <!-- <button class="btn btn-danger btn-sm">Stop Following <i class="fas fa-user-times"></i></button> -->
                    </form>
                <form class="ml-2 d-inline" action="/remove-follow/{{$user->id}}" method="POST">
                    @csrf
                    <button class="btn btn-primary btn-sm">Unfollow <i class="fas fa-user-plus"></i></button>
                    <!-- <button class="btn btn-danger btn-sm">Stop Following <i class="fas fa-user-times"></i></button> -->
                </form>

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
                <button type="button" class=" btn btn btn-outline-primary  mx-1 font-bold" data-bs-toggle="modal" data-bs-target="#signupModal">Edit Avatar</button>
                @endif
            </div>
            <div class="ps-3">
                @if($user->id == Auth::user()->id)
                <button class="btn bg-gray btn-outline-dark  mx-1 font-bold"><a href="/profile/{{$user->id}}/edit">Edit Profile</a></button>
                @endif
            </div>
                <div class="ps-3">
                    @if($user->id == Auth::user()->id)
                        <button class="btn btn-outline-dark mx-1 font-bold bg-gary-300 hover-gray-500"> <a href="/p/create">Add  New Post</a></button>
                    @endif
                </div>
            </div>

                <div class="  d-flex pt-2">
                <div class=" pe-4"><strong>{{$user->posts->count()}}</strong>Post</div>
                    <div class="pe-4"><strong>125</strong> <a href="/profile/{{$user->id}}/follower">follower</a></div>
                    <div class="pe-4"><strong>125</strong>Followers</div>
                </div>
            <div class="pt-2">
                <p class="text-xl font-bold">Bio</p>
            <p class="px-2">{{$user->bio}}</p>
            </div>

        </div>
    <div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
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

                            <input type="file" class="form-control-file" id="image" name="profile_picture">

                            @if ($errors->has('profile_picture'))
                                <strong>{{ $errors->first('profile_picture') }}</strong>
                            @endif
                        </div>
                        <button type="submit" class="btn ">Sign Up</button>
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


    <div class="row pt-5">
        @foreach($user->posts as $post)
        <div class="col-4 pb-4">
            <img src="/storage/{{$post->image}}"alt="wrapkit" class="w-100">

        </div>
        @endforeach
    </div>

</div>
<div>
@endsection
