<!-- ================================
            START HEADER AREA
================================= -->

<style>

    .float{
        position:fixed;
        width:60px;
        height:60px;
        bottom:40px;
        left:40px;
        background-color:#25d366;
        color:#FFF;
        border-radius:50px;
        text-align:center;
      font-size:30px;
        box-shadow: 2px 2px 3px #999;
      z-index:100;
    }

    .my-float{
        margin-top:16px;
    }
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <a href="https://api.whatsapp.com/send?phone=33771626271&text=Hello%20Gondal,%20Having%20visited%20your%20website,%20I%20would%20like%20to%20know%20more%20about%20tickets%20and%C2%A0umrah%C2%A0packages." class="float" target="_blank">
    <i class="fa fa-whatsapp my-float"></i>
    </a>
    <header class="header-area">
        <div class="header-top-bar padding-right-100px padding-left-100px">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="header-top-content">
                            <div class="header-left">
                                <ul class="list-items">
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            {{ Config::get('languages')[App::getLocale()] }}
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                            @foreach (Config::get('languages') as $lang => $language)
                                                @if ($lang != App::getLocale())
                                                    <a class="dropdown-item" href="{{ route('lang.switch', $lang) }}"> {{$language}}</a>
                                                @endif
                                            @endforeach
                                        </div>
                                    </li>
                                    <li><a href="#"><i class="fa fa-phone mr-1"></i>For Emergency: +33 7 67 77 59 22</a></li>
                                    <li><a href="#"><i class="fa fa-envelope mr-1"></i>hello@gondaltravel.com</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="header-top-content">
                            <div class="header-right d-flex align-items-center justify-content-end">
                                @guest
                                    @if (Route::has('login'))
                                        <a href="{{route('login')}}" class="theme-btn theme-btn-small m-2">{{__('B2B Login')}}</a>
                                    @endif
                                    @if (Route::has('register'))
                                        <a href="{{route('register')}}"
                                           class="theme-btn theme-btn-small theme-btn-transparent mr-1">{{__('B2B Sign-up')}}</a>
                                    @endif
                                @else
                                    <a class="theme-btn theme-btn-small theme-btn-transparent mr-1" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                @endguest
                                <div class="header-right-action">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-menu-wrapper padding-right-100px padding-left-100px">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="menu-wrapper">
                            <a href="#" class="down-button">
                                <!--<i class="la la-angle-down"></i>-->
                                <img src="http://cdn.onlinewebfonts.com/svg/img_568656.png" width="100%">
                                 <i class="la la-angle-down"></i>
                                </a>
                            <div class="logo">
                                <a href="{{url('')}}"><img src="{{asset('images/logo.png')}}"  style="height: 100px; width: 100px; padding: 10px" alt="logo"></a>
                                <div class="menu-toggler">
                                    <i class="la la-bars"></i>
                                    <i class="la la-times"></i>
                                </div><!-- end menu-toggler -->
                            </div><!-- end logo -->
                            <div class="main-menu-content text-center mx-auto">
                                <nav>
                                    <ul>
                                        <li>
                                            <a href="{{route('index')}}">{{__('lang.home')}} </a>
                                        </li>
                                        <li>
                                            <a href="{{route('admin-flights')}}">{{__('lang.flight')}} </a>
                                        </li>
                                         <li>
                                            <a href="{{route('hajj_umrah_listing')}}">{{__('Hajj & Umrah')}} </a>
                                        </li>
                                          <li>
                                            <a href="http://pay.vivawallet.com/gondal" target="_blank">{{__('Payments')}} </a>
                                        </li>
                                        <li>
                                            <a href="{{route('about')}}">{{__('lang.about')}} </a>
                                        </li>
                                        <li>
                                            <a href="{{route('faqs')}}">FAQs </a>
                                        </li>
                                        <li>
                                            <a href="{{route('contact')}}">{{__('lang.contact_us')}}</a>
                                        </li>


                                    </ul>
                                </nav>
                            </div><!-- end main-menu-content -->
                            <div class="nav-btn">
                                @auth
                                    @if(auth()->user()->hasRole('super-admin'))
                                        <a href="{{route('admin-dashboard')}}" class="theme-btn">Admin Dashboard</a>
                                    @elseif(auth()->user()->hasRole('user'))
                                        <a href="{{route('user-dashboard')}}" class="theme-btn">User Dashboard</a>
                                    @elseif(auth()->user()->hasRole('collector'))
                                        <a href="{{route('collector-dashboard')}}" class="theme-btn">Collector Dashboard</a>
                                    @endif
                                @endauth
                            </div><!-- end nav-btn -->
                        </div><!-- end menu-wrapper -->
                    </div><!-- end col-lg-12 -->
                </div><!-- end row -->
            </div><!-- end container-fluid -->
        </div>
    </header>
    <!-- ================================
             END HEADER AREA
    ================================= -->
