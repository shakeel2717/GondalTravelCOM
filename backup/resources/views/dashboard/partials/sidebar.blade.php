<!-- ================================
       START DASHBOARD NAV
================================= -->
<div class="sidebar-nav">
    <div class="sidebar-nav-body">
        <div class="side-menu-close">
            <i class="fa fa-times"></i>
        </div><!-- end menu-toggler -->
        <div class="author-content">
            <div class="d-flex align-items-center">

                @if(auth()->user()->img_url == null)
                <div class="author-img avatar-sm">
                    <img src="{{asset('images/blank.png')}}">
                </div>
                @else
                <div class="author-img avatar-sm">
                    <img src="{{asset('images/images/userprofileimage/'.auth('web')->user()->img_url)}}" alt="testimonial image">
                </div>
                @endif

                <div class="author-bio">
                    <h4 class="author__title">{{auth()->user()->name}}</h4>
                    <span class="author__meta">Member Since {{auth()->user()->created_at->format('Y-M')}}</span>
                </div>
            </div>
        </div>
        <div class="sidebar-menu-wrap">
            <ul class="sidebar-menu toggle-menu list-items">
                @if(auth()->user()->hasRole('super-admin'))
                <li class="{{Request::is('dashboard/admin') ? 'page-active' : ''}}"><a href="{{route('admin-dashboard')}}"><i class="fas fa-th-large  mr-2 text-color-1"></i>Dashboard</a>
                </li>


                <!--<li class="{{Request::is('dashboard/admin') ? 'page-active' : ''}}"><a-->
                <!--                           href="{{route('currencyconverter')}}"><i class="fas fa-th-large  mr-2 text-color-1"></i>Currency Converter</a></li>-->



                <li class="{{Request::is('dashboard/admin/products') ? 'page-active' : ''}}">
                    <a href="{{route('products.index')}}"><i class="fa fa-plane mr-2 text-color-1"></i>Flights</a>
                </li>
                <li class="{{Request::is('dashboard/admin/all-bookings') ? 'page-active' : ''}}"><a href="{{route('all-bookings')}}"><i class="fa fa-shopping-cart mr-2 text-color-1"></i>Bookings</a></li>
                <li class="{{Request::is('dashboard/admin/all-bookings') ? 'page-active' : ''}}"><a href="{{route('all-bookings.new')}}"><i class="fa fa-shopping-cart mr-2 text-color-1"></i>New Bookings</a></li>
                <li class="{{Request::is('dashboard/admin/iframe') ? 'page-active' : ''}}"><a href="{{route('iframe')}}"><i class="fa fa-shopping-cart mr-2 text-color-1"></i>Iframe</a></li>




                <li class="{{Request::is('dashboard/admin/all-bookings') ? 'page-active' : ''}}"><a href="{{route('uploadticket')}}"><i class="fa fa-plane mr-2 text-color-1"></i>Modify Ticket</a></li>



                <!--<li class="{{Request::is('dashboard/admin/collectors') ? 'page-active' : ''}}">-->
                <!--            <span class="side-menu-icon toggle-menu-icon">-->
                <!--                <i class="la la-angle-down"></i>-->
                <!--            </span>-->
                <!--                <a href="{{route('uploadticket')}}"><i class="la la-list mr-2"></i>Modify Ticket</a>-->
                <!--            </li>                              -->


                <li class="{{Request::is('dashboard/admin/collectors') ? 'page-active' : ''}}">
                    <span class="side-menu-icon toggle-menu-icon">
                        <i class="la la-angle-down"></i>
                    </span>
                    <a href="#"><i class="la la-list mr-2"></i>Packages</a>
                    <ul class="toggle-drop-menu">
                        <li><a href="{{route('all.packages')}}"><i class="fa fa-text-width mr-2 text-color-1"></i>All
                                Packages</a></li>
                        <li><a href="{{route('create.package')}}"><i class="fa fa-text-width mr-2 text-color-1"></i>Add
                                New Package</a></li>

                    </ul>
                </li>

                <li class="{{Request::is('dashboard/admin/collectors') ? 'page-active' : ''}}">
                    <span class="side-menu-icon toggle-menu-icon">
                        <i class="la la-angle-down"></i>
                    </span>
                    <a href="#"><i class="la la-list mr-2"></i>Hajj & Umrah</a>
                    <ul class="toggle-drop-menu">
                        <li><a href="{{route('all.hajjumrah')}}"><i class="fa fa-text-width mr-2 text-color-1"></i>All Hajj & Umrah packages</a></li>
                        <li><a href="{{route('create.hajjumrah')}}"><i class="fa fa-text-width mr-2 text-color-1"></i>Add
                                New Hajj & Umrah</a></li>

                    </ul>
                </li>







                <li class="{{Request::is('dashboard/admin/contactus') ? 'page-active' : ''}}"><a href="{{route('contactus')}}"><i lass="fa fa-users mr-2 text-color-1"></i>Contact-us</a></li>


                <!--  <li class="{{Request::is('dashboard/admin/collector') ? 'page-active' : ''}}">
                        <a href="{{route('collectorr')}}"><i class="fa fa-users mr-2 text-color-1"></i>Collectors</a>
                    </li> -->



                <li class="{{Request::is('dashboard/admin/collectors') ? 'page-active' : ''}}">
                    <span class="side-menu-icon toggle-menu-icon">
                        <i class="la la-angle-down"></i>
                    </span>
                    <a href="#"><i class="la la-list mr-2"></i>All Collectors</a>
                    <ul class="toggle-drop-menu">
                        <li><a href="{{route('collectorr')}}"><i class="fa fa-text-width mr-2 text-color-1"></i>Add
                                Account of Collector</a></li>
                        <li><a href="{{route('customers')}}"><i class="fa fa-text-width mr-2 text-color-1"></i>Collectors</a>
                        </li>
                        <li><a href="{{route('collectors_accounts')}}"><i class="fa fa-text-width mr-2 text-color-1"></i>Collector Accounts</a></li>

                    </ul>
                </li>


                <li class="{{Request::is('dashboard/admin/collectors') ? 'page-active' : ''}}">
                    <span class="side-menu-icon toggle-menu-icon">
                        <i class="la la-angle-down"></i>
                    </span>
                    <a href="#"><i class="la la-list mr-2"></i>All Users</a>
                    <ul class="toggle-drop-menu">
                        <li><a href="{{route('all.users')}}"><i class="fa fa-text-width mr-2 text-color-1"></i>All
                                Users</a></li>
                        <li><a href="{{route('customers')}}"><i class="fa fa-text-width mr-2 text-color-1"></i>Customers</a>
                        </li>
                        <li><a href="{{route('collectors')}}"><i class="fa fa-text-width mr-2 text-color-1"></i>Collectors</a>
                        </li>
                        <li><a href="{{route('admins')}}"><i class="fa fa-text-width mr-2 text-color-1"></i>Admins</a></li>
                    </ul>
                </li>
                <li class="{{Request::is('dashboard/admin/commissions') ? 'page-active' : ''}}"><a href="{{route('commissions.index')}}"><i class="fa fa-text-width mr-2 text-color-1"></i>Commissions</a>
                </li>
                @endif
                @if(auth()->user()->hasRole('user'))
                <li class="{{Request::is('dashboard/user') ? 'page-active' : ''}}"><a href="{{url('dashboard/user')}}"><i class="fas fa-th-large  mr-2 text-color-1"></i>Dashboard</a>
                </li>
                <li class="{{Request::is('dashboard/user/my-bookings') ? 'page-active' : ''}}"><a href="{{url('dashboard/user/my-bookings')}}"><i class="fa fa-shopping-cart  mr-2 text-color-1"></i>
                        Bookings</a></li>
                @endif

                @if(auth()->user()->hasRole('collector'))
                <li class="{{Request::is('dashboard/collector') ? 'page-active' : ''}}"><a href="{{url('dashboard/collector')}}"><i class="fas fa-th-large  mr-2 text-color-1"></i>
                        Dashboard </a>
                </li>

                @php
                $wallet = App\Models\collectorcashinhand::where('collector_id', auth('web')->id())->first();

                @endphp

                @if($wallet)
                <li style="font-size: 20px;" class="{{Request::is('dashboard/collector/collector-accounts') ? 'page-active' : ''}}">
                    <a href="">
                        <i class="fa fa-wallet mr-2 text-color-1"></i>
                        <b>Wallet : {{$wallet->total_cash_in_hand}}</b>
                    </a>
                </li>
                @endif
                <li class="{{Request::is('dashboard/collector/collector-accounts') ? 'page-active' : ''}}"><a href="{{url('dashboard/collector/history')}}"><i class="fas fa-list-ul text-color-1"></i>
                        History</a>
                </li>
                <li class="{{Request::is('dashboard/collector/collector-accounts') ? 'page-active' : ''}}"><a href="{{url('dashboard/collector/account')}}"><i class="fa fa-file-invoice-dollar mr-2 text-color-1"></i>
                        Accounts</a>
                </li>

                @endif

                @if(auth()->user()->hasRole('super-admin'))
                <li class="{{Request::is('setting.list') ? 'page-active' : ''}}">
                    <a href="{{  route('setting.list') }}">
                        <i class="fa fa-user mr-2 text-color-1"></i>
                        Setting
                    </a>
                </li>
                @endif

                <li class="{{Request::is('dashboard/user/my-profile') ? 'page-active' : ''}}">
                    <a href="{{url('dashboard/user/my-profile')}}">
                        <i class="fa fa-user mr-2 text-color-1"></i>
                        Profile
                    </a>
                </li>

                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-power-off mr-2 text-color-1"></i>{{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div><!-- end sidebar-menu-wrap -->
    </div>
</div><!-- end sidebar-nav -->
<!-- ================================
       END DASHBOARD NAV
================================= -->