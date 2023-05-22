<div class="section-tab text-center pl-4">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link d-flex align-items-center active" id="flight-tab" data-toggle="tab" href="#flight" role="tab" aria-controls="flight" aria-selected="true">
                <i class="fa fa-plane mr-1"></i>{{__('lang.flight')}}
            </a>
        </li>
        <li class="nav-item">
            <a disabled class="nav-link d-flex align-items-center">
                <i class="fa fa-bus mr-1"></i>{{__('lang.bus')}}
            </a>
        </li>
    </ul>
</div><!-- end section-tab -->
<div class="tab-content search-fields-container" id="myTabContent">
    <div class="tab-pane fade show active" id="flight" role="tabpanel" aria-labelledby="flight-tab">
        <div class="section-tab section-tab-2 pb-3">
            <ul class="nav nav-tabs" id="myTab3" role="tablist">
                <li class="nav-item">
                    <a class="nav-link" id="one-way-tab" data-toggle="tab" href="#one-way" role="tab" aria-controls="one-way" aria-selected="true">
                        {{__('lang.one_way')}}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" id="round-trip-tab" data-toggle="tab" href="#round-trip" role="tab" aria-controls="round-trip" aria-selected="false">
                        {{__('lang.round_trip')}}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="multi-city-tab" data-toggle="tab" href="#multi-city" role="tab" aria-controls="multi-city" aria-selected="false">
                        {{__('lang.multi_city')}}
                    </a>
                </li>
            </ul>
        </div><!-- end section-tab -->

        {{-- <p class="alert alert-success">text here</p> --}}

        @if(Session::has('message'))
        <p class="alert {{ Session::get('alert-class', 'alert-warning') }}">{{ Session::get('message') }}</p>
        @endif
        <div class="tab-content" id="myTabContent3">
            <div class="tab-pane fade" id="one-way" role="tabpanel" aria-labelledby="one-way-tab">
                <div class="contact-form-action">
                    <form action="{{route('search')}}" method="Post" class="row align-items-center">
                        @csrf
                        <input type="hidden" name="flight" value="1">
                        <input type="hidden" name="ammout" value="1000000">
                        <div class="col-lg-5 pr-0">
                            <div class="input-box">
                                <i class="fa fa-plane"></i>
                                <label class="label-text">{{__('lang.flying_from')}}</label>
                                <div class="form-group">
                                    <input id="autocomplete" class="js-example-basic-single form-control" name="from" type="text" placeholder="{{__('lang.city_airport')}}" autocomplete="off" required>
                                </div>
                            </div>
                        </div><!-- end col-lg-3 -->
                        <div class="col-lg-2 text-center">
                            <button type="button" style="background-color: white; color: #0d233e; border: none; outline: none;">
                                <i class="fas fa-exchange-alt font-size-40 margin-top-20px" onclick="change()"></i>
                            </button>
                        </div><!-- end col-lg-2 -->
                        <div class="col-lg-5">
                            <div class="input-box">
                                <i class="fa fa-plane"></i>
                                <label class="label-text">{{__('lang.flying_to')}}</label>
                                <div class="form-group">
                                    <input id="autocompleteto" class=" js-example-basic-single form-control autocomplete" name="to" type="text" placeholder="{{__('lang.city_airport')}}" autocomplete="off" required>
                                </div>
                            </div>
                        </div><!-- end col-lg-3 -->
                        <div class="col-lg-3 pr-0">
                            <div class="input-box">
                                <label class="label-text">{{__('lang.departing')}}</label>
                                <div class="form-group">
                                    <span class="fa fa-calendar form-icon"></span>
                                    <input class="date-range form-control" type="text" name="daterange-single" readonly required>
                                </div>
                            </div>
                        </div><!-- end col-lg-3 -->
                        <div class="col-lg-3 pr-0">
                            <div class="input-box">
                                <label class="label-text">{{__('lang.passengers')}}</label>
                                <div class="form-group">
                                    <div class="dropdown dropdown-contain gty-container">
                                        <a class="dropdown-toggle dropdown-btn" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                                            <span class="adult" data-text="{{__('lang.adult')}}" data-text-multi="{{__('lang.adults')}}"></span>
                                            -
                                            <span class="children" data-text="{{__('lang.child')}}" data-text-multi="{{__('lang.children')}}"></span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-wrap">
                                            <div class="dropdown-item">
                                                <div class="qty-box d-flex align-items-center justify-content-between">
                                                    <label>{{__('lang.adults')}} <br>(+12Y)</label>
                                                    <div class="qtyBtn d-flex align-items-center">
                                                        <div class="qtyDec"><i class="fa fa-minus"></i>
                                                        </div>
                                                        <input type="text" name="adult_number" value="1">
                                                        <div class="qtyInc"><i class="fa fa-plus"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dropdown-item">
                                                <div class="qty-box d-flex align-items-center justify-content-between">
                                                    <label>{{__('lang.children')}} <br>(2Y-11Y)</label>
                                                    <div class="qtyBtn d-flex align-items-center">
                                                        <div class="qtyDec"><i class="fa fa-minus"></i>
                                                        </div>
                                                        <input type="text" name="child_number" value="0">
                                                        <div class="qtyInc"><i class="fa fa-plus"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dropdown-item">
                                                <div class="qty-box d-flex align-items-center justify-content-between">
                                                    <label>{{__('lang.infants')}} <br>(-2Y)</label>
                                                    <div class="qtyBtn d-flex align-items-center">
                                                        <div class="qtyDec"><i class="fa fa-minus"></i>
                                                        </div>
                                                        <input type="text" name="infants_number" value="0" class="qty-input">
                                                        <div class="qtyInc"><i class="fa fa-plus"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end dropdown -->
                                </div>
                            </div>
                        </div><!-- end col-lg-3 -->
                        <div class="col-lg-2 pr-0">
                            <div class="input-box">
                                <div class="input-box">
                                    <label class="label-text">{{__('lang.coach')}}</label>
                                    <div class="form-group select-contain w-auto">
                                        <select class="select-contain-select">
                                            <option value="1" selected>Economy</option>
                                            <option value="2">Business</option>
                                            <option value="3">First class</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end col-lg-3 -->
                        <div class="col-lg-1 pr-0">
                            <div class="input-box">
                                <div class="input-box">
                                    <label class="label-text">Days</label>
                                    <div class="form-group select-contain w-auto">
                                        <select class="select-contain-select" name="duration">
                                            <option value="+3" selected>3+</option>
                                            <option value="-3">3-</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end col-lg-3 -->
                        <div class="col-lg-3">
                            <button class="theme-btn w-100 text-center margin-top-20px" type="submit">
                                {{__('lang.search_now')}}
                            </button>
                        </div>
                    </form>
                </div>
            </div><!-- end tab-pane -->

            <div class="tab-pane fade  active  show" id="round-trip" role="tabpanel" aria-labelledby="round-trip-tab">
                <div class="contact-form-action">
                    <form action="{{route('search')}}" method="Post" class="row align-items-center">
                        @csrf
                        <input type="hidden" name="flight" value="2">
                        <input type="hidden" name="ammout" value="1000000">
                        <div class="col-lg-5 pr-0">
                            <div class="input-box">
                                <i class="fa fa-plane"></i>
                                <label class="label-text">{{__('lang.flying_from')}}</label>
                                <div class="form-group">
                                    <input id="auto_complete_round_from" class="form-control" name="from" type="text" placeholder="{{__('lang.city_airport')}}" autocomplete="off" required>
                                </div>
                            </div>
                        </div><!-- end col-lg-3 -->
                        <div class="col-lg-2 text-center">
                            <button type="button" style="background-color: white; color: #0d233e; border: none; outline: none;">
                                <i class="fas fa-exchange-alt font-size-40 margin-top-20px" onclick="changer()"></i>
                            </button>
                        </div><!-- end col-lg-2 -->
                        <div class="col-lg-5">
                            <div class="input-box">
                                <i class="fa fa-plane"></i>
                                <label class="label-text">{{__('lang.flying_to')}}</label>
                                <div class="form-group">
                                    <input id="auto_complete_round_to" class="form-control" name="to" type="text" placeholder="{{__('lang.city_airport')}}" autocomplete="off" required>
                                </div>
                            </div>
                        </div><!-- end col-lg-3 -->
                        <div class="col-lg-3 pr-0">
                            <div class="input-box">
                                <label class="label-text">{{__('lang.departing')}}
                                    - {{__('lang.returning')}}</label>
                                <div class="form-group">
                                    <span class="fa fa-calendar form-icon"></span>
                                    <input class="date-range form-control" type="text" name="datefilter" readonly required>
                                </div>
                            </div>
                        </div><!-- end col-lg-3 -->
                        <div class="col-lg-3 pr-0">
                            <div class="input-box">
                                <label class="label-text">{{__('lang.passengers')}}</label>
                                <div class="form-group">
                                    <div class="dropdown dropdown-contain gty-container">
                                        <a class="dropdown-toggle dropdown-btn" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                                            <span class="adult" data-text="{{__('lang.adult')}}" data-text-multi="{{__('lang.adults')}}"></span>
                                            -
                                            <span class="children" data-text="{{__('lang.child')}}" data-text-multi="{{__('lang.children')}}"></span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-wrap">
                                            <div class="dropdown-item">
                                                <div class="qty-box d-flex align-items-center justify-content-between">
                                                    <label>{{__('lang.adults')}} <br>(+12Y)</label>
                                                    <div class="qtyBtn d-flex align-items-center">
                                                        <div class="qtyDec"><i class="fa fa-minus"></i>
                                                        </div>
                                                        <input type="text" name="adult_number" value="1">
                                                        <div class="qtyInc"><i class="fa fa-plus"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dropdown-item">
                                                <div class="qty-box d-flex align-items-center justify-content-between">
                                                    <label>{{__('lang.children')}} <br>(2Y-11Y)</label>
                                                    <div class="qtyBtn d-flex align-items-center">
                                                        <div class="qtyDec"><i class="fa fa-minus"></i>
                                                        </div>
                                                        <input type="text" name="child_number" value="0">
                                                        <div class="qtyInc"><i class="fa fa-plus"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dropdown-item">
                                                <div class="qty-box d-flex align-items-center justify-content-between">
                                                    <label>{{__('lang.infants')}} <br>(-2Y)</label>
                                                    <div class="qtyBtn d-flex align-items-center">
                                                        <div class="qtyDec"><i class="fa fa-minus"></i>
                                                        </div>
                                                        <input type="text" name="infants_number" value="0" class="qty-input">
                                                        <div class="qtyInc"><i class="fa fa-plus"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end dropdown -->
                                </div>
                            </div>
                        </div><!-- end col-lg-3 -->
                        <div class="col-lg-3 pr-0">
                            <div class="input-box">
                                <label class="label-text">{{__('lang.coach')}}</label>
                                <div class="form-group select-contain select-contain-shadow w-auto">
                                    <select class="select-contain-select" name="coach">
                                        <option value="ECONOMY" selected>{{__('lang.economy')}}</option>
                                        <option value="PREMIUM_ECONOMY">{{__('lang.premium_economy')}}</option>
                                        <option value="BUSINESS">{{__('lang.business_class')}}</option>
                                        <option value="FIRST">{{__('lang.first_class')}}</option>
                                    </select>
                                </div>
                            </div>
                        </div><!-- end col-lg-3 -->
                        <div class="col-lg-3">
                            <button type="submit" class="theme-btn w-100 text-center margin-top-20px">{{__('lang.search_now')}}</button>
                        </div>
                    </form>
                </div>
            </div><!-- end tab-pane -->

            <div class="tab-pane fade  multi-flight-wrap" id="multi-city" role="tabpanel" aria-labelledby="multi-city-tab">

                <form action="{{ route('flight.testing') }}" method="post" class="multi-cities-form">
                    @csrf
                    <input type="hidden" name="flight_type" value="multi-city">
                    <div class="row contact-form-action multi-flight-field d-flex align-items-center">
                        <div class="col-lg-4 pr-0">
                            <div class="input-box">
                                <label class="label-text">Flying from</label>
                                <div class="form-group">
                                    <span class="la la-map-marker form-icon"></span>
                                    <select name="flying_from[]" class="js-example-basic-single form-control"></select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 pr-0">
                            <div class="input-box">
                                <label class="label-text">Flying to</label>
                                <div class="form-group">
                                    <span class="la la-map-marker form-icon"></span>
                                    <select name="flying_to[]" class="js-example-basic-single form-control"></select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 pr-0">
                            <div class="input-box">
                                <label class="label-text">Departing</label>
                                <div class="form-group">
                                    <span class="la la-calendar form-icon"></span>
                                    <input class="date-range form-control date-multi-picker" type="text" name="daterange_single[]">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1 multi-flight-delete-wrap pt-3 pl-3 d-block" style="display: none !important;">
                            <button class="multi-flight-remove" type="button">
                                <i class="la la-remove"></i>
                            </button>
                        </div>
                    </div>

                    <div class="advanced-wrap">
                        <a class="btn collapse-btn theme-btn-hover-gray font-size-15" data-toggle="collapse" href="#collapseTwo" role="button" aria-expanded="false" aria-controls="collapseTwo">
                            Advanced Search <i class="la la-angle-down ml-1"></i>
                        </a>
                        <div class="pt-3 collapse" id="collapseTwo">
                            <div class="row">
                                <div class="col-lg-12 col-12">
                                    <div class="input-box">
                                        <label class="label-text">Preferences Airlines</label>
                                        <div class="form-group">
                                            <select name="preferences_airlines[]" class="js-preferences-airlines form-control" multiple></select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-12">
                                    <div class="input-box">
                                        <label class="label-text">Avoid Airlines</label>
                                        <div class="form-group">
                                            <select name="avoid_airlines[]" class="js-airlines form-control" multiple></select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="custom-checkbox d-inline-block mr-4">
                                        <input type="checkbox" id="baggage_check" name="baggage_check" value="baggage">
                                        <label for="baggage_check">Baggage</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-lg-3 pr-0">
                            <div class="form-group">
                                <button class="theme-btn add-flight-city margin-top-40px w-100" type="button">
                                    <i class="la la-plus mr-1"></i>
                                    Add another flight
                                </button>
                            </div>
                        </div>
                        <div class="col-lg-3 pr-0">
                            <div class="input-box">
                                <label class="label-text">Passengers</label>
                                <div class="form-group">
                                    <div class="dropdown dropdown-contain gty-container">
                                        <a class="dropdown-toggle dropdown-btn" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                                            <span class="adult" data-text="Adult" data-text-multi="Adults">0 Adult</span>
                                            -
                                            <span class="children" data-text="Child" data-text-multi="Children">0 Children</span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-wrap">
                                            <div class="dropdown-item">
                                                <div class="qty-box d-flex align-items-center justify-content-between">
                                                    <label>Adults <br>(+12Y)</label>
                                                    <div class="qtyBtn d-flex align-items-center">
                                                        <div class="qtyDec"><i class="la la-minus"></i>
                                                        </div>
                                                        <input type="text" name="adult_number" min="1" value="1">
                                                        <div class="qtyInc"><i class="la la-plus"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dropdown-item">
                                                <div class="qty-box d-flex align-items-center justify-content-between">
                                                    <label>Children <br>(2Y-11Y)</label>
                                                    <div class="qtyBtn d-flex align-items-center">
                                                        <div class="qtyDec"><i class="la la-minus"></i>
                                                        </div>
                                                        <input type="text" name="child_number" min="0" value="0">
                                                        <div class="qtyInc"><i class="la la-plus"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dropdown-item">
                                                <div class="qty-box d-flex align-items-center justify-content-between">
                                                    <label>Infant (baby) <br> (-2Y)</label>
                                                    <div class="qtyBtn d-flex align-items-center">
                                                        <div class="qtyDec"><i class="la la-minus"></i>
                                                        </div>
                                                        <input type="text" name="held_infant" min="0" value="0" class="qty-input">
                                                        <div class="qtyInc"><i class="la la-plus"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end dropdown -->
                                </div>
                            </div>
                        </div><!-- end col-lg-3 -->
                        <div class="col-lg-3 pr-0">
                            <div class="input-box">
                                <label class="label-text">Coach</label>
                                <div class="form-group">
                                    <div class="select-contain select-contain-shadow w-auto">
                                        <select class="select-contain-select" name="cabin">
                                            <option value="economy">Economy</option>
                                            <option value="business">Business</option>
                                            <option value="first_class">First class</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end col-lg-3 -->
                        <div class="col-lg-3">
                            <button type="submit" class="theme-btn w-100 text-center margin-top-20px">Search
                                Now
                            </button>
                        </div>
                    </div>
                </form>
            </div><!-- end tab-pane -->
        </div>
    </div><!-- end tab-pane -->
</div>