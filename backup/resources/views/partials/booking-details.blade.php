@if (isset($data))

    <div class="form-box booking-detail-form">
        <div class="form-title-wrap">
            <h3 class="title">Booking Details</h3>
        </div><!-- end form-title-wrap -->
        <div class="form-content">
            <div class="card-item shadow-none radius-none mb-0">
                <div class="card-img pb-4">
                    <img src='https://daisycon.io/images/airline/?iata={{ $data['fcode'] }}' alt="plane-img">
                </div>
                <div class="card-body p-0">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h3 class="card-title">{{ $data['from'][0] }} to {{ $data['to'][count($data['to']) - 1] }}
                            </h3>
                            <p class="card-meta">{{ $data['type'] }} </p>
                        </div>
                    </div>
                    <div class="section-block"></div>
                    <ul class="list-items list-items-2 list-items-flush py-2">
                        <li class="font-size-15"><span class="w-auto d-block mb-n1"><i
                                    class="fas fa-plane-departure mr-1 font-size-17"></i>Take off From
                                {{ $data['from'][0] }}</span>{{ $data['takeoffD'] }} {{ $data['takeoffT'] }}
                        </li>

                        @php
                            $timeiyaa = ltrim($data['time'], 'P');
                            $timeiyatwo = ltrim($timeiyaa, 'T');
                            $t2 = trim(strrev(chunk_split(strrev($timeiyatwo), 3, ' ')));

                        @endphp

                        <li class="font-size-15"><i
                                class="fa fa-clock-o mr-1 text-black font-size-17"></i>{{ $t2 }}
                        </li>
                        <li class="font-size-15"><span class="w-auto d-block mb-n1"><i
                                    class="fas fa-plane-arrival mr-1 font-size-17"></i>Landing in
                                {{ $data['to'][count($data['to']) - 1] }}</span>{{ $data['landD'] }} {{ $data['landT'] }}
                        </li>
                    </ul>
                    <h3 class="card-title pb-3">Order Details</h3>
                    <div class="section-block"></div>
                    <ul class="list-items list-items-2 py-3">
                        <li><span>Flight Type:</span>{{ $data['type'] }}</li>
                        <li><span>Flight Class:</span>{{ $data['class'] }}</li>
                        <li><span>Adult Fare:</span>{{ $data['adult'] }} X €{{ $data['aprice'] }} =
                            €{{ (int) $data['adult'] * (int) $data['aprice'] }}</li>
                        <li><span>Child Fare:</span>{{ $data['child'] }} X €{{ $data['cprice'] }} =
                            €{{ (int) $data['child'] * (int) $data['cprice'] }}</li>
                        @if (isset($data['infant']))
                            <li><span>Infant Fare:</span>{{ $data['infant'] }} X €{{ $data['iprice'] }} =
                                €{{ (int) $data['infant'] * (int) $data['iprice'] }}</li>
                        @endif

                        @if (isset($data['infant']))
                            <li><span>Total
                                    Passengers:</span>{{ (int) $data['adult'] + (int) $data['child'] + (int) $data['infant'] }}
                            </li>
                        @else
                            <li><span>Total Passengers:</span>{{ (int) $data['adult'] + (int) $data['child'] }}</li>
                        @endif
                    </ul>
                    <div class="section-block"></div>
                    <ul class="list-items list-items-2 pt-3">
                        <li><span>Total Margin:</span>€{{ $margin }}</li>
                    </ul>
                    <ul class="list-items list-items-2">
                        <li><span>Total Price:</span><b>€{{ $newPrice }}</b></li>
                    </ul>
                </div>
            </div><!-- end card-item -->
        </div><!-- end form-content -->
    </div><!-- end form-box -->
@elseif(isset($data2))
    <div class="form-box booking-detail-form">
        <div class="form-title-wrap">
            <h3 class="title">Booking Details</h3>
        </div><!-- end form-title-wrap -->
        <div class="form-content">
            <div class="card-item shadow-none radius-none mb-0">
                <!-- <div class="card-img pb-4">
                <img src="">
            </div> -->
                <div class="card-body p-0">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h3 class="card-title">{{ $data2->flight_from }} to {{ $data2->flight_to }}</h3>
                            <p class="card-meta">{{ $data2->way_of_flight }} </p>
                        </div>
                    </div>
                    <div class="section-block"></div>
                    <ul class="list-items list-items-2 list-items-flush py-2">
                        <li class="font-size-15"><span class="w-auto d-block mb-n1"><i
                                    class="fas fa-plane-departure mr-1 font-size-17"></i>Take off From
                                {{ $data2->flight_from }} </span>{{ $data2->date_of_flight }}
                            {{ $data2->take_off_time }}
                        </li>
                        <li class="font-size-15">Duration : <i class="fa fa-clock-o mr-1 text-black font-size-17"></i>

                            @php
                                $timeiya = ltrim($data2->duration, 'P');
                                $timeiya2 = ltrim($timeiya, 'T');
                                $t = trim(strrev(chunk_split(strrev($timeiya2), 3, ' ')));

                            @endphp
                            {{ $t }}
                        </li>
                        <li class="font-size-15"><span class="w-auto d-block mb-n1"><i
                                    class="fas fa-plane-arrival mr-1 font-size-17"></i>Landing in
                                {{ $data2->flight_to }} </span>{{ $data2->date_of_flight }} {{ $data2->land_time }}
                        </li>
                    </ul>
                    <h3 class="card-title pb-3">Order Details</h3>
                    <div class="section-block"></div>
                    <ul class="list-items list-items-2 py-3">
                        <li><span>Flight Type:</span>{{ $data2->way_of_flight }}</li>
                        <li><span>Flight Class:</span>{{ $data2->flight_type }}</li>
                        <li><span>Adult Fare:</span>{{ $data2->adults }} X RS {{ $data2->price }} =
                            RS{{ (int) $data2->adults * (int) $data2->price }}</li>
                        <li><span>Child Fare:</span>{{ $data2->childrens }} X RS {{ $data2->price }} =
                            RS{{ (int) $data2->childrens * (int) $data2->price }}</li>
                        <li><span>Infant Fare:</span>{{ $data2->infants }} X RS {{ $data2->price }} =
                            RS{{ (int) $data2->infants * (int) $data2->price }}</li>
                        <li><span>Total Passengers:</span>{{ $data2->adults + $data2->childrens + $data2->infants }}
                        </li>
                    </ul>
                    <div class="section-block"></div>
                    <ul class="list-items list-items-2 pt-3">
                        <li><span>Total Price:</span>€{{ $data2->price }}</li>
                    </ul>
                </div>
            </div><!-- end card-item -->
        </div><!-- end form-content -->
    </div><!-- end form-box -->

@endif
