<!DOCTYPE html>
<html lan="eng">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script defer src="https://use.fontawesome.com/releases/v5.5.0/js/all.js"
            integrity="sha384-GqVMZRt5Gn7tB9D9q7ONtcp4gtHIUEW/yG7h98J7IpE3kpi+srfFyyB/04OV6pG0" crossorigin="anonymous">
    </script>
    <script defer src="https://use.fontawesome.com/releases/v5.5.0/js/all.js"
            integrity="sha384-GqVMZRt5Gn7tB9D9q7ONtcp4gtHIUEW/yG7h98J7IpE3kpi+srfFyyB/04OV6pG0" crossorigin="anonymous">
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,400;0,700;1,400;1,700&display=swap"
          rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</head>
<body style="background: linear-gradient(to left bottom, #ddabdc, #d0aae0, #c2a9e4, #b2a8e7, #a0a8e8, #8fadea, #7db1ea, #6db5e8, #62bde4, #60c4dc, #69c9d3, #78cec9);">
    <section class="vh-30" style="background: linear-gradient(to left bottom, #ddabdc, #d0aae0, #c2a9e4, #b2a8e7, #a0a8e8, #8fadea, #7db1ea, #6db5e8, #62bde4, #60c4dc, #69c9d3, #78cec9);">
        <div class="container h-50">
            <div class="row d-flex justify-content-center align-items-center h-50">
                <div class="col-lg-7 col-xl-8">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-4">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Edit Profile</p>

                                    <form class="mx-1 mx-md-4" method="POST" action="/profile/{{$user->id}}" enctype="multipart/form-data"  >
                                        @csrf
                                        @method('PATCH')

                                        <div class="d-flex flex-row align-items-center mb-4">

                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" id="form3Example1c" name="first_name" value="{{old('first_name')?? $user->first_name}}" class="form-control" />
                                                <label class="form-label" for="form3Example1c">First Name</label>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" id="form3Example1c" value="{{old('last_name')?? $user->last_name}}" name="last_name" class="form-control" />
                                                <label class="form-label" for="form3Example1c">Last Name</label>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                <textarea name="bio" cols="20" rows="6" type="text" class="form-control"
                                                          placeholder="Bio"></textarea>
                                                <label class="form-label" for="form3Example4c">Bio</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center  mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                <label for="gender" class="form-label">Gender</label>
                                                <select class="form-select" id="gender" name="gender">
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                    <option value="other">Other</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                <label for="address" class="form-label">Address</label>
                                                <textarea name="address" class="form-control" id="address" rows="3" placeholder="Enter address"></textarea>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                <label for="dob" class="form-label">Date of Birth</label>
                                                <input name="date_of_birth" type="date" class="form-control" id="dob" pattern="\d{4}-\d{2}-\d{2}" required>

                                            </div>
                                        </div>

                                        <div class="form-check d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button type="submit" class="btn btn-primary btn-lg">Save Changes</button>
                                            <button class="btn  btn-lg"><a href="/profile/{{$user->id}}">Cancel</a> </button>
                                        </div>

                                    </form>

                                </div>

                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                                         class="img-fluid" alt="Sample image">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


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
</body>
</html>
























