<x-home>


<div class="container mt-4 pt-5">
    <div class="row">
        <div class="col-md-8">
            <!-- Search bar -->
            <form action="#" method="POST" >
                <div class="col-sm-4">
                    <label for="">Location</label>
                    <input type="text" name="location" id="location" >
                </div>

                <div class="form-row d-flex">
                    <div class="col-md-3 mb-3 pe-2">
                        <label for="distance">Distance</label>
                        <input type="number" class="form-control" id="distance" name="distance" placeholder="Enter distance in miles">
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
                        <input type="text" class="form-control" id="location" name="location" placeholder="Enter location">
                    </div>

                    <div class="col-md-3 mb-3 pt-4 px-2">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </div>
            </form>




            <!-- Card section -->

            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSttyb3Xqxti1vWn6sFQXO0nFKi0QtEn-1HWQ&usqp=CAU/300x200" class="card-img-top" alt="Doctor 1" width="300" height="200">
                        <div class="card-body">
                            <h5 class="card-title">Dr. John Doe</h5>
                            <p class="card-text">Speciality: Cardiology</p>
                            <p class="card-text">Rating: 4.8</p>
                            <a href="#" class="btn btn-primary mr-2">View Profile</a>
                            <a href="#" class="btn btn-success">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
    </div>
</div>
</div>



    <script text="text/javascript" src=" "></script>

    <script>
        $(document).ready(function(){
            var autocomplete;
            var to= 'location';
            autocomplete = new google.maps.places.Autocomplete((document.getElementById(to)), {
                types:['geocode'],
            })
        })
    </script>
</x-home>


















