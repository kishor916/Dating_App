<x-app :user="$user">

    <div class="container pt-2">
        <section class="relative h-72  flex flex-col justify-center align-center text-center space-y-4 mb-4">
            <div class="z-10">
                <div id="animate-me" class="font-bold uppercase text-black ">
                    Welcome {{Auth::user()->first_name}} <span class="text-black"> To Mayalu</span>
                </div>
                <p class="text-2xl text-gray-200 font-bold my-4">
                    Find your partner here
                </p>
                <div>
                    <p class="inline-block border-2 border-white text-white py-2 px-4 rounded-xl uppercase mt-2 hover:text-black hover:border-black">
                        Start searching your lover</p>
                </div>
            </div>
        </section>

        <div class="container mt-4 pt-2 ">
            <div class="row">
                <div class="col-md-8">
                    <!-- Search bar -->
                    <form action="#" method="POST">

                        <div class="form-row d-flex">
                            <div class="col-md-3 mb-3 pe-2">
                                <label for="distance">Distance</label>
                                <input type="number" class="form-control" id="distance" name="distance"
                                       placeholder="Enter distance in miles">
                            </div>
                            <div class="col-md-3 mb-3 pe-2">
                                <label for="age">Age</label>
                                <input type="number" class="form-control" id="age" name="age" placeholder="Enter age">
                            </div>
                            <div class="col-md-3 mb-3 pe-2 ">
                                <label for="gender">Gender</label>
                                <select class="form-control" id="gender" name="gender">
                                    <option value="">-- Select Gender --</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="col-md-3 mb-3 pe-2">
                                <label for="location">Location</label>
                                <input type="text" class="form-control" id="location" name="location"
                                       placeholder="Enter location">
                            </div>

                            <div class="col-md-3 mb-3 pt-4 px-2">
                                <button class="btn btn-primary" type="submit">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- Card section -->


        <div class="container">
            <div class="row">
                @foreach($cards as $card)
                    @if($card->id !== Auth::user()->id)
                        <div class="col-md-3 mb-3">
                            <div class="card" style="width: 18rem;">

                                <img src="/storage/{{$card->profile_picture}}" class="card-img-top" alt="Doctor 1"
                                     width="300"
                                     height="200">
                                <div class="card-body">
                                    <h5 class="card-title">{{$card->first_name}} {{$card->last_name}}</h5>
                                    <p class="card-text">{{$card->gender}}</p>
                                    <a href="/profile/{{$card->id}}" class="btn btn-primary mr-2">View Profile</a>
                                    <a href="#" class="btn btn-success">Follow</a>
                                </div>
                            </div>
                        </div>

                    @endif
                @endforeach
            </div>
            <div class="mt-6 p-4">
                {{$cards->links()}}
            </div>

        </div>
    </div>
</x-app>

























