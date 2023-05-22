<div class="dashboard-nav dashboard--nav">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="menu-wrapper">
                    <div class="logo mr-5">
                        <a href="{{url('')}}"><img src="{{asset('images/logo2.png')}}" alt="logo"></a>
                        <div class="menu-toggler py-1">
                            <i class="fa fa-bars"></i>
                            <!--<i class="fa fa-times"></i>-->
                        </div><!-- end menu-toggler -->
                        <div class="user-menu-open py-1">
                            <i class="fa fa-user"></i>
                        </div><!-- end user-menu-open -->
                    </div>
                    <div class="nav-btn ml-auto">
                        <div class="notification-wrap d-flex align-items-center">
                            <div class="notification-item">
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle" id="userDropdownMenu" data-toggle="dropdown"
                                       aria-haspopup="true" aria-expanded="false">
                                        <div class="d-flex align-items-center">

                                            @if(auth('web')->user()->img_url == null)
                                                <div class="avatar avatar-sm flex-shrink-0 mr-2">
                                                    <img alt="team-img"
                                                        src="{{asset('images/blank.png')}}">
                                                </div>
                                            @else
                                                <div class="avatar avatar-sm flex-shrink-0 mr-2">
                                                    <img alt="team-img"
                                                         src="{{asset('images/userprofileimage/'.auth()->user()->img_url)}}">
                                                </div>
                                            @endif
                                            <span class="font-size-14 font-weight-bold">{{auth()->user()->name}}</span>
                                        </div>
                                    </a>
                                    <div class="dropdown-menu dropdown-reveal dropdown-menu-md dropdown-menu-right">
                                        <div class="dropdown-item drop-reveal-header user-reveal-header">
                                            <h6 class="title text-uppercase">Welcome!</h6>
                                        </div>
                                        <div class="list-group drop-reveal-list user-drop-reveal-list">
                                            <a href="{{route('flights.index')}}"
                                               class="list-group-item list-group-item-action">
                                                <div class="msg-body">
                                                    <div class="msg-content">
                                                        <h3 class="title"><i class="fa fa-plane mr-2"></i>Flights</h3>
                                                    </div>
                                                </div><!-- end msg-body -->
                                            </a>
                                            <a href="{{route('users.index')}}"
                                               class="list-group-item list-group-item-action">
                                                <div class="msg-body">
                                                    <div class="msg-content">
                                                        <h3 class="title"><i class="fa fa-user mr-2"></i>All Users</h3>
                                                    </div>
                                                </div><!-- end msg-body -->
                                            </a>
                                            {{--                                            <a href="{{route('users.collectors')}}" class="list-group-item list-group-item-action">--}}
                                            {{--                                                <div class="msg-body">--}}
                                            {{--                                                    <div class="msg-content">--}}
                                            {{--                                                        <h3 class="title"><i class="fa fa-user mr-2"></i>All Collectors</h3>--}}
                                            {{--                                                    </div>--}}
                                            {{--                                                </div><!-- end msg-body -->--}}
                                            {{--                                            </a>--}}
                                            <a href="{{route('profile.edit', auth()->id())}}"
                                               class="list-group-item list-group-item-action">
                                                <div class="msg-body">
                                                    <div class="msg-content">
                                                        <h3 class="title"><i class="fa fa-gear mr-2"></i>Settings</h3>
                                                    </div>
                                                </div><!-- end msg-body -->
                                            </a>
                                            <div class="section-block"></div>
                                            <a class="list-group-item list-group-item-action"
                                               href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                  class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </div><!-- end dropdown-menu -->
                                </div>
                            </div><!-- end notification-item -->
                        </div>
                    </div><!-- end nav-btn -->
                </div><!-- end menu-wrapper -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container-fluid -->
</div><!-- end dashboard-nav -->
