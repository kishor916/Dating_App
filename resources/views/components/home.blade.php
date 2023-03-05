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
    @vite(['resources/css/app.css'])
    @vite(['resources/js/app.js'])
</head>
<body style="background: linear-gradient(to left bottom, #ddabdc, #d0aae0, #c2a9e4, #b2a8e7, #a0a8e8, #8fadea, #7db1ea, #6db5e8, #62bde4, #60c4dc, #69c9d3, #78cec9);">
{{dd($user)}};
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
                    <div class=" me-2"> <a href="/profile" class="nav-item nav-link ">Profile</a></div>
                    <div class=" me-2"> <a href="#home" class="nav-item nav-link ">Message</a></div>
                    <div class="me-2">
                        <form action="/logout" method="POST" class="d-inline">
                            @csrf
                            <button class="btn btn-sm btn-secondary">Sign Out</button>
                        </form>
                    </div>

                </div>

            </div>
        </div>

    </nav>
</div>

@if (session()->has('success'))
    <div class="container container--narrow">
        <div class="alert alert-success text-center">{{session('success')}}</div>
        {{-- this line is being ised to check it session has been created and <success> is being used to display a temp message --}}
    </div>
@endif


{{ $slot }}


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
</body>
</html>
