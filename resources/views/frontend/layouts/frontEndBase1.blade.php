<!doctype html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{ asset("frontEnd/img/favicon.png") }}" type="image/png">

    <title>SAD Africa </title>
    @include("FrontEnd.layouts._fStyle")
</head>
<body>

@include("FrontEnd.layouts._menu")
@yield('content')
{{--<div class="container col-md-12">
    <div class="row col-sm-12">
        <div class=" main_title ">
            @yield('content')
        </div>
        <div class=" main_title col-sm">
            <br/><br/><br/><br/>
            <div class="container">
                <h2>{{__('last')}} {{__('events')}}</h2>
                <p class="mb-3"> Here list latest event and calendar</p><br>
                <div class="jumbotron ">
                    <div class="row">
                        <div class="col-md-offset-2">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    {!! $calendar->calendar() !!}
                                    {!! $calendar->script() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>--}}


<!--================Courses Area =================-->
{{--<section class="courses_area p_120">
    <div class="container">
        <div class="main_title">
            <h2>Popular Courses</h2>
            <p>There is a moment in the life of any aspiring astronomer that it is time to buy that first telescope. It’s exciting to think about setting up your own viewing station.</p>
        </div>
        <div class="row courses_inner">
            <div class="col-lg-9">
                <div class="grid_inner">
                    <div class="grid_item wd55">
                        <div class="courses_item">
                            <img src="{{ asset("frontEnd/img/courses/course-1.jpg") }}" alt="">
                            <div class="hover_text">
                                <a class="cat" href="#">{{ __('show') }}</a>
                                <a href="#"><h4>Developpement web</h4></a>
                                <ul class="list">
                                    <li><a href="#"><i class="lnr lnr-users"></i> 355</a></li>
                                    <li><a href="#"><i class="lnr lnr-bubble"></i> 35</a></li>
                                    <li><a href="#"><i class="lnr lnr-user"></i> T. Robert</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="grid_item wd44">
                        <div class="courses_item">
                            <img src="{{ asset("frontEnd/img/courses/course-2.jpg") }}" alt="">
                            <div class="hover_text">
                                <a class="cat" href="#">Free</a>
                                <a href="#"><h4>Japanease Language Class</h4></a>
                                <ul class="list">
                                    <li><a href="#"><i class="lnr lnr-users"></i> 355</a></li>
                                    <li><a href="#"><i class="lnr lnr-bubble"></i> 35</a></li>
                                    <li><a href="#"><i class="lnr lnr-user"></i> T. Robert</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="grid_item wd44">
                        <div class="courses_item">
                            <img src="{{ asset("frontEnd/img/courses/course-4.jpg") }}" alt="">
                            <div class="hover_text">
                                <a class="cat" href="#">Free</a>
                                <a href="#"><h4>Japanease Language Class</h4></a>
                                <ul class="list">
                                    <li><a href="#"><i class="lnr lnr-users"></i> 355</a></li>
                                    <li><a href="#"><i class="lnr lnr-bubble"></i> 35</a></li>
                                    <li><a href="#"><i class="lnr lnr-user"></i> T. Robert</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="grid_item wd55">
                        <div class="courses_item">
                            <img src="{{ asset("frontEnd/img/courses/course-5.jpg") }}" alt="">
                            <div class="hover_text">
                                <a class="cat" href="#">Free</a>
                                <a href="#"><h4>Japanease Language Class</h4></a>
                                <ul class="list">
                                    <li><a href="#"><i class="lnr lnr-users"></i> 355</a></li>
                                    <li><a href="#"><i class="lnr lnr-bubble"></i> 35</a></li>
                                    <li><a href="#"><i class="lnr lnr-user"></i> T. Robert</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="course_item">
                    <img src="{{ asset("frontEnd/img/courses/course-3.jpg") }}" alt="">
                    <div class="hover_text">
                        <a class="cat" href="#">Free</a>
                        <a href="#"><h4>Japanease Language Class</h4></a>
                        <ul class="list">
                            <li><a href="#"><i class="lnr lnr-users"></i> 355</a></li>
                            <li><a href="#"><i class="lnr lnr-bubble"></i> 35</a></li>
                            <li><a href="#"><i class="lnr lnr-user"></i> T. Robert</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>--}}
<!--================End Courses Area =================-->


<!--================ start footer Area  =================-->
@include('FrontEnd.layouts.footer')
<!--================ End footer Area  =================-->

@include("FrontEnd.layouts._fJsScript")


</body>
</html>