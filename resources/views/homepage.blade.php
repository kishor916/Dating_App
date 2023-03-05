<x-layout>

    <section id="header">


    <div class="container">

        <div class="container-left">
            <p class="text-small">Because you deserve better!</p>
            <h1 class="title">
                Get noticed for <span class="title-s">who</span> you are,
                <span class="title-s">not what</span> you look like.
            </h1>
            <p class="text">
                You’re more than just a photo. You have stories to tell, and
                passions to share, and things to talk about that are more
                interesting than the weather. Because you deserve what dating
                deserves: better.
            </p>

            <div class="stats-container">
                <div class="stats">
                    <h1 class="stats-title">15k+</h1>
                    <p class="stats-text">Dates and matches made everyday</p>
                </div>

                <div class="stats">
                    <h1 class="stats-title stats-title-brown">1,456</h1>
                    <p class="stats-text">New members signup every day</p>
                </div>

                <div class="stats">
                    <h1 class="stats-title">1M+</h1>
                    <p class="stats-text">Members from around the world</p>
                </div>
            </div>
        </div>
        <div class="container-right">
            <img class="couples-img couples-img-desktop" src="{{ Vite::asset('resources/images/couples.png') }}"
                 alt="" />
{{--            <img src="{{ Vite::asset('resources/images/details.png') }}" class="details-img" />--}}
        </div>

    </div>
    </section>
    <div class="container features-container">
        <div class="py-5 service-6">
            <div class="container">
                <!-- Row  -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-md-4 wrap-service6-box">
                        <div class="card border-0 bg-success-gradiant text-white mb-4">
                            <div class="card-body">
                                <h6 class="font-weight-medium text-white">Advanced matching algorithms</h6>
                                <p class="mt-3">Our app uses state-of-the-art algorithms to find the perfect match for
                                    you.</p>
                                <a href="#" class="linking">Learn More</a>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-md-4 wrap-service6-box">
                        <div class="card border-0 bg-info-gradiant text-white mb-4">
                            <div class="card-body">
                                <h6 class="font-weight-medium text-white">Secure and private messaging</h6>
                                <p class="mt-3">Our messaging system ensures that your conversations are private and
                                    secure.</p>
                                <a href="#f4" class="linking">Learn More</a>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-md-4 wrap-service6-box">
                        <div class="card border-0 bg-danger-gradiant text-white mb-4">
                            <div class="card-body">
                                <h6 class="font-weight-medium text-white">Personalized profiles</h6>
                                <p class="mt-3">Our profiles allow you to personalize your information and showcase
                                    your personality.</p>
                                <a href="#f4" class="linking">Learn More</a>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-12 mt-3 text-center">
                        <a class="btn btn-outline-success btn-md"><span>View Details</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="testimonial10 py-5 bg-success-gradiant">

        <div class="container">
            <div class="owl-carousel owl-theme text-center testi10">

                <div class="item">
                    <div class="quote-bg">
                        <h3 class="font-weight-light text-white">I had tried several dating sites in the past, but
                            Mayalu was the first one where I truly felt a connection with someone. I met my current
                            partner on the site and we have been together for over a year now. Thank you, Mayalu!</h3>
                    </div>
                    <div class="customer-thumb my-3"><img
                            src="https://www.wrappixel.com/demos/ui-kit/wrapkit/assets/images/testimonial/1.jpg"
                            alt="wrapkit" class="rounded-circle" /></div>
                    <h6 class="text-white mb-0 font-weight-medium">Michael Anderson</h6>
                    <span class="text-white">user</span>
                </div>

                <div class="item">
                    <div class="quote-bg">
                        <h3 class="font-weight-light text-white">Mayalu was a breath of fresh air compared to other
                            dating sites. The user interface is clean and easy to use, and the profiles are detailed
                            enough to help you find someone who matches your interests. I highly recommend giving it a
                            try!</h3>
                    </div>
                    <div class="customer-thumb my-3"><img
                            src="https://www.wrappixel.com/demos/ui-kit/wrapkit/assets/images/testimonial/2.jpg"
                            alt="wrapkit" class="rounded-circle" /></div>
                    <h6 class="text-white mb-0 font-weight-medium">Michael Anderson</h6>
                    <span class="text-white">user</span>
                </div>

                <div class="item">
                    <div class="quote-bg">
                        <h3 class="font-weight-light text-white">I was skeptical about online dating, but Mayalu changed
                            my mind. I met a wonderful person who shares my passions and we have been inseparable ever
                            since. Thanks to Mayalu for helping me find my soulmate.</h3>
                    </div>
                    <div class="customer-thumb my-3"><img
                            src="https://www.wrappixel.com/demos/ui-kit/wrapkit/assets/images/testimonial/3.jpg"
                            alt="wrapkit" class="rounded-circle" /></div>
                    <h6 class="text-white mb-0 font-weight-medium">Michael Anderson</h6>
                    <span class="text-white">user</span>
                </div>

            </div>
        </div>
    </div>

    <div class="py-5 bg-light c2a1"
         style="background-image:url({{Vite::asset('resources/images/date.jpg')}})">


        <div class="row justify-content-center">
            <div class="col-md-7 text-center">
                <h2 class="mb-3 text-white font-weight-medium"> Find Your Perfect Match Today!</h2>
                <p class="font-weight-light text-white op-8">Don't wait any longer, sign up for Mayalu today and take the first step towards finding your soulmate!</p>
                <button type="button" class="btn btn-danger-gradiant btn-md border-0 text-white mt-3 text-uppercase" data-bs-toggle="modal" data-bs-target="#signupModal">join us now</button>
            </div>
        </div>


    </div>
</x-layout>
