<!doctype html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{ asset("frontEnd/img/favicon.png") }}" type="image/png">

    <title>SAD Africa </title>
    @include("frontend.layouts._fStyle")
</head>
<body>

@include("frontend.layouts._menu")

<!--================Home Banner Area =================-->
<section class="home_banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
        <div class="container">
            <div class="banner_content text-center">
                <h3>We Ensure better Vocational <br />for a better world</h3>
                <p>In the history of modern astronomy, there is probably no one greater leap forward than the building and launch of the space telescope known as the Hubble.</p>
                <a class="main_btn" href="#">Get Started</a>
            </div>
        </div>
    </div>
</section>
<!--================End Home Banner Area =================-->

<!--================Finance Area =================-->
<section class="finance_area">
    <div class="container">
        <div class="finance_inner row">
            <div class="col-lg-3 col-sm-6">
                <div class="finance_item">
                    <div class="media">
                        <div class="d-flex">
                            <i class="fa fa-html5"></i>
                        </div>
                        <div class="media-body">
                            <h5>{{__('web_development')}}</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="finance_item">
                    <div class="media">
                        <div class="d-flex">
                            <i class="fa fa-shield"></i>
                        </div>
                        <div class="media-body">
                            <h5>{{__('it_security')}}</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="finance_item">
                    <div class="media">
                        <div class="d-flex">
                            <i class="fa fa-microchip "></i>
                        </div>
                        <div class="media-body">
                            <h5>{{__('automation')}}</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="finance_item">
                    <div class="media">
                        <div class="d-flex">

                            <i class="fa fa-code-fork" aria-hidden="true"></i>
                        </div>
                        <div class="media-body">
                            <h5>{{__('network')}}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Finance Area =================-->

<!--================Courses Area =================-->
<section class="courses_area p_120">

    @include('frontend.courses.courses')
</section>
<!--================End Courses Area =================-->

<!--================Team Area =================-->
{{--<section class="team_area p_120">
    <div class="container">
        <div class="main_title">
            <h2>Meet Our Faculty</h2>
            <p>There is a moment in the life of any aspiring astronomer that it is time to buy that first telescope. It’s exciting to think about setting up your own viewing station.</p>
        </div>
        <div class="row team_inner">
            <div class="col-lg-3 col-sm-6">
                <div class="team_item">
                    <div class="team_img">
                        <img class="rounded-circle" src="{{ asset("frontEnd/img/team/team-1.jpg") }}" alt="">
                        <div class="hover">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                    <div class="team_name">
                        <h4>Ethel Davis</h4>
                        <p>Managing Director (Sales)</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="team_item">
                    <div class="team_img">
                        <img class="rounded-circle" src="{{ asset("frontEnd/img/team/team-2.jpg") }}" alt="">
                        <div class="hover">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                    <div class="team_name">
                        <h4>Ethel Davis</h4>
                        <p>Managing Director (Sales)</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="team_item">
                    <div class="team_img">
                        <img class="rounded-circle" src="{{ asset("frontEnd/img/team/team-3.jpg") }}" alt="">
                        <div class="hover">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                    <div class="team_name">
                        <h4>Ethel Davis</h4>
                        <p>Managing Director (Sales)</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="team_item">
                    <div class="team_img">
                        <img class="rounded-circle" src="{{ asset("frontEnd/img/team/team-4.jpg") }}" alt="">
                        <div class="hover">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                    <div class="team_name">
                        <h4>Ethel Davis</h4>
                        <p>Managing Director (Sales)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>--}}
<!--================End Team Area =================-->
<!--================Testimonials Area =================-->
<section class="testimonials_area p_120">
    <div class="container">
        <div class="testi_slider owl-carousel">
            @foreach ($formations as $key => $formation)
                <div class="item">
                    <div class="testi_item">
                        <img src="{{$formation->getFirstMediaUrl('formation') }}" class="avatar-wrap" alt="{{ $formation->label }}" style="width: 7rem; height: 7rem;"  />
                        <h4>{{  $formation->category->name }}</h4>
                        <ul class="list">
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                        </ul>
                        <p>{{  $formation->category->description }}</p>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>
<!--================End Testimonials Area ================= -->
{{-- Section video Youtube --}}

{{-- end Section video --}}

<!--================Pagkages Area =================-->
{{--<section class="packages_area p_120">
    <div class="container">
        <div class="row packages_inner">
            <div class="col-lg-4">
                <div class="packages_text">
                    <h3>Choose <br />Course Packages</h3>
                    <p>There is a moment in the life of any aspiring astronomer that it is time to buy that first telescope. It’s exciting to think about setting up your own viewing station.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="packages_item">
                    <div class="pack_head">
                        <i class="lnr lnr-graduation-hat"></i>
                        <h3>Premium</h3>
                        <p>For the individuals</p>
                    </div>
                    <div class="pack_body">
                        <ul class="list">
                            <li><a href="#">Secure Online Transfer</a></li>
                            <li><a href="#">Unlimited Styles for interface</a></li>
                            <li><a href="#">Reliable Customer Service</a></li>
                        </ul>
                    </div>
                    <div class="pack_footer">
                        <h4>£399.00</h4>
                        <a class="main_btn" href="#">Join Now</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="packages_item">
                    <div class="pack_head">
                        <i class="lnr lnr-diamond"></i>
                        <h3>Exclusive</h3>
                        <p>For the individuals</p>
                    </div>
                    <div class="pack_body">
                        <ul class="list">
                            <li><a href="#">Secure Online Transfer</a></li>
                            <li><a href="#">Unlimited Styles for interface</a></li>
                            <li><a href="#">Reliable Customer Service</a></li>
                        </ul>
                    </div>
                    <div class="pack_footer">
                        <h4>£399.00</h4>
                        <a class="main_btn" href="#">Join Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>--}}
<!--================End Pagkages Area =================-->

<!--================Latest Blog Area =================-->
{{--<section class="latest_blog_area p_120">
    <div class="container">
        <div class="main_title">
            <h2>Latest Posts From Blog</h2>
            <p>There is a moment in the life of any aspiring astronomer that it is time to buy that first telescope. It’s exciting to think about setting up your own viewing station.</p>
        </div>
        <div class="row latest_blog_inner">
            <div class="col-lg-3 col-md-6">
                <div class="l_blog_item">
                    <img class="img-fluid" src="{{ asset("frontEnd/img/latest-blog/l-blog-1.jpg") }}" alt="">
                    <a class="date" href="#">25 October, 2018  |  By Mark Wiens</a>
                    <a href="single-blog.html"><h4>Addiction When Gambling Becomes A Problem</h4></a>
                    <p>Computers have become ubiquitous in almost every facet of our lives. At work, desk jockeys spend hours in front of their desktops, while delivery</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="l_blog_item">
                    <img class="img-fluid" src="{{ asset("frontEnd/img/latest-blog/l-blog-2.jpg") }}" alt="">
                    <a class="date" href="#">25 October, 2018  |  By Mark Wiens</a>
                    <a href="single-blog.html"><h4>Addiction When Gambling Becomes A Problem</h4></a>
                    <p>Computers have become ubiquitous in almost every facet of our lives. At work, desk jockeys spend hours in front of their desktops, while delivery</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="l_blog_item">
                    <img class="img-fluid" src=" {{ asset("frontEnd/img/latest-blog/l-blog-3.jpg") }}" alt="">
                    <a class="date" href="#">25 October, 2018  |  By Mark Wiens</a>
                    <a href="single-blog.html"><h4>Addiction When Gambling Becomes A Problem</h4></a>
                    <p>Computers have become ubiquitous in almost every facet of our lives. At work, desk jockeys spend hours in front of their desktops, while delivery</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="l_blog_item">
                    <img class="img-fluid" src="{{ asset("frontEnd/img/latest-blog/l-blog-4.jpg") }}" alt="">
                    <a class="date" href="#">25 October, 2018  |  By Mark Wiens</a>
                    <a href="single-blog.html"><h4>Addiction When Gambling Becomes A Problem</h4></a>
                    <p>Computers have become ubiquitous in almost every facet of our lives. At work, desk jockeys spend hours in front of their desktops, while delivery</p>
                </div>
            </div>
        </div>
    </div>
</section>--}}
<!--================End Latest Blog Area =================-->

<!--================ start footer Area  =================-->
@include('frontend.layouts.footer')
<!--================ End footer Area  =================-->

@include("frontend.layouts._fJsScript")

</body>
</html>