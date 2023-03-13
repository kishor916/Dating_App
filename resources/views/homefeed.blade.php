<x-home>

<<<<<<< HEAD

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</head>
<body style="background: linear-gradient(to left bottom, #ddabdc, #d0aae0, #c2a9e4, #b2a8e7, #a0a8e8, #8fadea, #7db1ea, #6db5e8, #62bde4, #60c4dc, #69c9d3, #78cec9);">
<div class="container-fluid bar">
    <nav class="navbar  fixed-top navbar-fixed-top shadow-sm navbar-expand-lg py-3 py-lg-0 px-lg-5">
        <a href="index.html" class="navbar-brand ml-lg-3">
            <h1 class="m-0 display-5"><span class="text-primary">Mayalu</h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"  aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse px-lg-3" id="navbarSupportedContent" style="font-weight: 600; font-size: large;">
            <div class="navbar-nav ms-auto mb-2 mb-lg-0">
                <div class="d-flex align-items-center ms-auto mb-2 mb-lg-0 ">
                    <div class="  me-2"><a href="{{ route('homefeed.show') }}" class="nav-item nav-link active">Home</a></div>
                    <div class=" me-2"> <a href="/profile/{{{Auth::user()->id}}}" class="nav-item nav-link ">Profile</a></div>
                    <div class=" me-2"> <a href="#home" class="nav-item nav-link ">Message</a></div>
                    <div class="me-2"> <div class="me-2">
                            <form class="inline" method="POST" action="/logout">
                                @csrf
                                <button type="submit">Logout</button>
                            </form></div>

                </div>

            </div>
        </div>
    </nav>
</div>
<div class="container pt-5">
    <div class="row">
        <div class="col-12">
            <div id="animate-me" class="text-center pt-5">Welcome {{Auth::user()->first_name}}  to Mayalu</div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 text-center pt-2">
            <h3>Find your partner here</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-12 text-center pt-2">
            <p>Start searching your lover</p>
        </div>
    </div>

</div>
<div class="container mt-4 pt-5 ">
=======

<div class="container mt-4 pt-5">
>>>>>>> follow
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



<<<<<<< HEAD
<div>

    <footer class="bg-light py-3 "style="border-radius: 5px">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <h5>About Mayalu</h5>
                    <p class="text-muted">Mayalu is a dating website that helps people find their perfect match.</p>
                </div>
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <h5>Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <h5>Contact Us</h5>
                    <ul class="list-unstyled">
                        <li>Email: info@mayalu.com</li>
                        <li>Phone: +1 555-123-4567</li>
                        <li>Address: 123 Main Street, Sydeny, USA</li>
                    </ul>
                </div>
            </div>
            <div class="text-center mt-4">
                <p class="mb-0">© 2023 Mayalu. All rights reserved.</p>
            </div>
        </div>
    </footer>
</div>


<script>
    $(document).ready(function() {
        $('#animate-me').animate({ fontSize: '3em' }, 1000);
    });
</script>
</body>
</html>
=======
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


















