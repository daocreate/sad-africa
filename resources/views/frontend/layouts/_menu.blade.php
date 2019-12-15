<!--================Header Menu Area =================-->
<header class="header_area">
    <div class="top_menu row m0">
        <div class="container">
            <div class="float-left">
                <ul class="list header_social">
                    <li><a href="facebook.com/sad-africa" title="facebook" target="_blank"><i class="fa fa-2x fa-facebook"></i></a></li>
                    <li><a href="twiter.com/sad-africa" title="twiter" target="_blank><i class="fa fa-2x fa-twitter"></i></a></li>
                  <!--  <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                    <li><a href="#"><i class="fa fa-behance"></i></a></li>
                    -->
                </ul>
            </div>
            <div class="float-right">
                <a class="dn_btn" href="#"><i class="fa fa-2x fa-map-marker"></i> {{__('site')}} </a>
                <a class="dn_btn" href="tel:+237671447937"><i class="fa fa-2x fa-phone"></i> {{__('sad_tel')}}</a>
                <a class="dn_btn" href="sad_africa@gmail.com"><i class="fa fa-2x fa-envelope"></i> {{__('sad_email')}}</a>
            </div>
        </div>
    </div>
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">

            <div class="container">
                <!--languege -->
                <div class="float-right">
                    <ul class="navbar-nav ml-auto">
                        @php $locale = session()->get('locale'); @endphp
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                @switch($locale)
                                @case('fr')
                                <img src="{{asset('img/fr.png')}}" width="30px" height="20x"> Fr
                                @break
                                @default
                                <img src="{{asset('img/us.png')}}" width="30px" height="20x"> En
                                @endswitch
                                <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="lang/en"><img src="{{asset('img/us.png')}}" width="30px" height="20x"> English</a>
                                <a class="dropdown-item" href="lang/fr"><img src="{{asset('img/fr.png')}}" width="30px" height="20x"> French</a>
                            </div>
                        </li>
                    </ul>

                </div>
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="{{route('home')}}"><img src="{{ asset("frontEnd/img/logo.png") }}" alt="SAID Consulting" style="height: 76px; width: 140px"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto">
                        <li class="nav-item active"><a class="nav-link" href="{{ route('home') }}">
                                <i class=" fa fa-home fa-2x" aria-hidden="true"></i> {{__('home')}}</a>
                        </li>
                        {{--<li class="nav-item"><a class="nav-link" href="{{ route('languages') }}">
                                <i class="fa fa-language fa-2x" aria-hidden="true"></i> {{__('language_trans')}}</a>
                        </li>--}}

                        <li class="nav-item submenu dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-graduation-cap fa-2x" aria-hidden="true"></i> {{__('courses')}}</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="{{ route('course_list') }}">{{__('courses')}}</a>
                                <li class="nav-item"><a class="nav-link" href="#">{{__('courses_details')}}</a></li>
                            </ul>
                        </li>
                        <li class="nav-item submenu dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{__('immovable')}}</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="#">{{__('immovable')}}</a>
                                <li class="nav-item"><a class="nav-link" href="#">{{__('courses_details')}}</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#">{{__('contact')}}</a></li>
                        <li class="nav-item submenu dropdown">
                            @auth
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            @if(Auth::user()->getFirstMediaUrl('avatar', 'thumb'))
                                <img src="{{Auth::user()->getFirstMediaUrl('avatar', 'thumb') }}" class="avatar1" />
                             @else
                                <img src="{{asset("img/profile.png")}}" class="avatar1"/>
                             @endif
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                           {{-- <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>--}}
                                <ul class="dropdown-menu">
                                     <li class="nav-item"><a class="nav-link" href="{{ route("profile.show") }}">{{__('user_profile')}}</a></li>
                                    @if( auth()->user()->hasRole('admin') || auth()->user()->hasRole('manager'))
                                        <li class="nav-item"><a class="nav-link" href="{{ route("backIndex") }}">{{__('backend')}}</a></li>
                                    @endif
                                    <li class="nav-item"><a class="nav-link" href="{{ route("logout1") }}">{{__('logout')}}</a></li>
                                </ul>
                            @else
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{__('login')}}</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="{{ route("login") }}">{{__('login')}}</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route("singup") }}">{{__('singup')}}</a></li>
                            </ul>
                            @endauth
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
<!--================Header Menu Area =================-->