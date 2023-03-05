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
            <form class="ml-2 d-inline" action="/create-follow/{{$user}}" method="POST">
                @csrf
                <button class="btn btn-primary btn-sm">Follow <i class="fas fa-user-plus"></i></button>
                <!-- <button class="btn btn-danger btn-sm">Stop Following <i class="fas fa-user-times"></i></button> -->
            </form>
                <div class="  d-flex">

                <div class=" pe-4"><strong>125</strong>Post</div>
                <div class="pe-4"><strong>125</strong>Following</div>
                <div class="pe-4"><strong>125</strong>Followers</div>
                </div>
            <div class="pt-3 font-weight-medium">Bio</div>
            <div>Mayalu is a dating website that helps people find their perfect match.</div>
            <div><a href="#">www.mayalu.org.com</a></div>
        </div>


        </div>
    <section/>
{{--    <div class="row pt-5">--}}
{{--        <div class="col-4">--}}
{{--            <img src="https://www.wrappixel.com/demos/ui-kit/wrapkit/assets/images/testimonial/1.jpg"--}}
{{--                 alt="wrapkit" class="w-100">--}}

{{--        </div>--}}
{{--        <div class="col-4">--}}
{{--            <img src="https://www.wrappixel.com/demos/ui-kit/wrapkit/assets/images/testimonial/1.jpg"--}}
{{--                 alt="wrapkit" class="w-100">--}}

{{--        </div>--}}
{{--        <div class="col-4">--}}
{{--            <img src="https://www.wrappixel.com/demos/ui-kit/wrapkit/assets/images/testimonial/1.jpg"--}}
{{--                 alt="wrapkit" class="w-100">--}}

{{--        </div>--}}

{{--    </div>--}}

</div>
</x-home>
