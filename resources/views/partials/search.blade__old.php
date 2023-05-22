<div class="container">
    <div class="row">
        <div class="col-lg-10 mx-auto responsive--column-l">
            <div class="hero-content pb-5">
                <div class="section-heading">
                    <h2 class="sec__title cd-headline zoom">
                        {{__('lang.title')}} <span class="cd-words-wrapper">
                                <b class="is-visible">{{__('lang.message')}}</b>
                                <b>{{__('lang.message1')}}</b>
                                <b>{{__('lang.message2')}}</b>
                                <b>{{__('lang.message3')}}</b>
                                <b>{{__('lang.message4')}}</b>
                                </span>

                        {{__('lang.waiting')}}
                    </h2>
                </div>
            </div><!-- end hero-content -->
            <div class="section-tab text-center pl-4">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center active" id="flight-tab" data-toggle="tab"
                           href="#flight" role="tab" aria-controls="flight" aria-selected="true">
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
                                <a class="nav-link active" id="one-way-tab" data-toggle="tab" href="#one-way" role="tab"
                                   aria-controls="one-way" aria-selected="true">
                                    {{__('lang.one_way')}}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="round-trip-tab" data-toggle="tab" href="#round-trip" role="tab" aria-controls="round-trip" aria-selected="false">
                                    {{__('lang.round_trip')}}
                                </a>
                            </li></br>
                        
                        </ul>
                    </div><!-- end section-tab -->

                   @if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-warning') }}">{{ Session::get('message') }}</p>
@endif
                    <div class="tab-content" id="myTabContent3">
                        <div class="tab-pane fade show active" id="one-way" role="tabpanel"
                             aria-labelledby="one-way-tab">
                            <div class="contact-form-action">
                                <form action="{{route('search')}}" method="Post" class="row align-items-center">
                                    @csrf
                                    <input type="hidden" name="flight" value="1" >
                                    <input type="hidden" name="ammout" value="1000000" >
                                    <div class="col-lg-5 pr-0">
                                        <div class="input-box">
                                            <i class="fa fa-plane"></i>
                                            <label class="label-text">{{__('lang.flying_from')}}</label>
                                            <div class="form-group">
                                                <input id="autocomplete" class="form-control" name="from" type="text"
                                                       placeholder="{{__('lang.city_airport')}}" required>
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-3 -->
                                    <div class="col-lg-2 text-center">
                                        <button type="button" style="background-color: white; color: #287dfa; border: none; outline: none;">
                                        <i class="fas fa-exchange-alt font-size-40 margin-top-20px"  onclick="change()"></i>
                                        </button>
                                    </div><!-- end col-lg-2 -->
                                    <div class="col-lg-5">
                                        <div class="input-box">
                                            <i class="fa fa-plane"></i>
                                            <label class="label-text">{{__('lang.flying_to')}}</label>
                                            <div class="form-group">
                                                <input id="autocompleteto" class="form-control" name="to" type="text"
                                                       placeholder="{{__('lang.city_airport')}}" required>
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-3 -->
                                    <div class="col-lg-3 pr-0">
                                        <div class="input-box">
                                            <label class="label-text">{{__('lang.departing')}}</label>
                                            <div class="form-group">
                                                <span class="fa fa-calendar form-icon"></span>
                                                <input class="date-range form-control" type="text"
                                                       name="daterange-single" readonly required>
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-3 -->
                                    <div class="col-lg-3 pr-0">
                                        <div class="input-box">
                                            <label class="label-text">{{__('lang.passengers')}}</label>
                                            <div class="form-group">
                                                <div class="dropdown dropdown-contain gty-container">
                                                    <a class="dropdown-toggle dropdown-btn" href="#" role="button"
                                                       data-toggle="dropdown" aria-expanded="false">
                                                        <span class="adult" data-text="{{__('lang.adult')}}" data-text-multi="{{__('lang.adults')}}"></span>
                                                        -
                                                        <span class="children" data-text="{{__('lang.child')}}"
                                                              data-text-multi="{{__('lang.children')}}"></span>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-wrap">
                                                        <div class="dropdown-item">
                                                            <div class="qty-box d-flex align-items-center justify-content-between">
                                                                <label>{{__('lang.adults')}}</label>
                                                                <div class="qtyBtn d-flex align-items-center">
                                                                    <div class="qtyDec"><i class="fa fa-minus"></i>
                                                                    </div>
                                                                    <input type="text" name="adult_number" value="1">
                                                                    <div class="qtyInc" ><i class="fa fa-plus" ></i></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="dropdown-item">
                                                            <div class="qty-box d-flex align-items-center justify-content-between">
                                                                <label>{{__('lang.children')}}</label>
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
                                                                <label>{{__('lang.infants')}}</label>
                                                                <div class="qtyBtn d-flex align-items-center">
                                                                    <div class="qtyDec"><i class="fa fa-minus"></i>
                                                                    </div>
                                                                    <input type="text" name="infants_number" value="0"
                                                                           class="qty-input">
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
                        <div class="tab-pane fade" id="round-trip" role="tabpanel" aria-labelledby="round-trip-tab">
                            <div class="contact-form-action">
                                <form action="{{route('search')}}" method="Post" class="row align-items-center">
                                    @csrf
                                    <input type="hidden" name="flight" value="2" >
                                    <input type="hidden" name="ammout" value="1000000" >
                                    <div class="col-lg-5 pr-0">
                                        <div class="input-box">
                                            <i class="fa fa-map-marker-alt"></i>
                                            <label class="label-text">{{__('lang.flying_from')}}</label>
                                            <div class="form-group">
                                                <input id="auto_complete_round_from" class="form-control" name="from" type="text"
                                                       placeholder="{{__('lang.city_airport')}}" required>
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-3 -->
                                    <div class="col-lg-2 text-center">
                                        <button type="button" style="background-color: white; color: #287dfa; border: none; outline: none;">
                                            <i class="fas fa-exchange-alt font-size-40 margin-top-20px"  onclick="changer()"></i>
                                        </button>
                                    </div><!-- end col-lg-2 -->
                                    <div class="col-lg-5">
                                        <div class="input-box">
                                            <i class="fa fa-map-marker-alt"></i>
                                            <label class="label-text">{{__('lang.flying_to')}}</label>
                                            <div class="form-group">
                                                <input id="auto_complete_round_to" class="form-control" name="to" type="text"
                                                       placeholder="{{__('lang.city_airport')}}" required>
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-3 -->

                                    <div class="col-lg-3 pr-0">
                                        <div class="input-box">
                                            <label class="label-text">{{__('lang.departing')}} - {{__('lang.returning')}}</label>
                                            <div class="form-group">
                                                <span class="fa fa-calendar form-icon"></span>
                                                <input class="date-range form-control" type="text" name="daterange"
                                                       readonly>
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-3 -->
                                    <div class="col-lg-3 pr-0">
                                        <div class="input-box">
                                            <label class="label-text">{{__('lang.passengers')}}</label>
                                            <div class="form-group">
                                                <div class="dropdown dropdown-contain gty-container">
                                                    <a class="dropdown-toggle dropdown-btn" href="#" role="button"
                                                       data-toggle="dropdown" aria-expanded="false">
                                                        <span class="adult" data-text="{{__('lang.adult')}}" data-text-multi="{{__('lang.adults')}}"></span>
                                                        -
                                                        <span class="children" data-text="{{__('lang.child')}}"
                                                              data-text-multi="{{__('lang.children')}}"></span>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-wrap">
                                                        <div class="dropdown-item">
                                                            <div class="qty-box d-flex align-items-center justify-content-between">
                                                                <label>{{__('lang.adults')}}</label>
                                                                <div class="qtyBtn d-flex align-items-center">
                                                                    <div class="qtyDec"><i class="fa fa-minus"></i>
                                                                    </div>
                                                                    <input type="text" name="adult_number" value="1">
                                                                    <div class="qtyInc" ><i class="fa fa-plus" ></i></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="dropdown-item">
                                                            <div class="qty-box d-flex align-items-center justify-content-between">
                                                                <label>{{__('lang.children')}}</label>
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
                                                                <label>{{__('lang.infants')}}</label>
                                                                <div class="qtyBtn d-flex align-items-center">
                                                                    <div class="qtyDec"><i class="fa fa-minus"></i>
                                                                    </div>
                                                                    <input type="text" name="infants_number" value="0"
                                                                           class="qty-input">
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
                    </div>
                </div><!-- end tab-pane -->
            </div>
        </div><!-- end col-lg-12 -->
    </div><!-- end row -->
</div><!-- end container -->
<script>
    function change(){
        var from = document.getElementById('autocomplete');
        var to = document.getElementById('autocompleteto');
        var temp = from.value;
        from.value = to.value;
        to.value = temp;
    }
    function changer(){
        var from = document.getElementById('auto_complete_round_from');
        var to = document.getElementById('auto_complete_round_to');
        var temp = from.value;
        from.value = to.value;
        to.value = temp;
    }
</script>
