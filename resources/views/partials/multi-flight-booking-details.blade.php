@if (count($data) != 0)
{{-- {{ dd($data) }} --}}
    {{-- {{ dd($data['flight'][0]['code']) }} --}}
    <div class="form-box booking-detail-form">
        <div class="form-title-wrap">
            <h3 class="title">Booking Details</h3>
        </div><!-- end form-title-wrap -->
        <div class="form-content">
            <div class="card-item shadow-none radius-none mb-0">
                @foreach ($data['flight'] as $multi_flight)
                    <div class="card-img pb-4">
                        <img src='https://daisycon.io/images/airline/?iata={{ $multi_flight['code'] }}' alt="plane-img">
                    </div>
                    <div class="card-body p-0">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h3 class="card-title">{{ $multi_flight['startlocation'] }} to
                                    {{ $multi_flight['endlocation'] }}</h3>
                                <p class="card-meta">{{ $data['type'] }} </p>
                            </div>
                        </div>
                        <div class="section-block"></div>
                        {{-- {{ dd($data) }} --}}
                        <ul class="list-items list-items-2 list-items-flush py-2">
                            <li class="font-size-15"><span class="w-auto d-block mb-n1"><i
                                        class="fas fa-plane-departure mr-1 font-size-17"></i>Take off From
                                    {{ $multi_flight['startlocation'] }}</span> {{ $multi_flight['startDate'] }} {{ $multi_flight['startTime'] }}
                            </li>

                                @php
                                    $tim = ltrim($multi_flight['time'], 'P');
                                    $tim2 = ltrim($tim, 'T');
                                    $tt = trim(strrev(chunk_split(strrev($tim2), 3, ' ')));

                                @endphp

                                <li class="font-size-15"><i class="fa fa-clock-o mr-1 text-black font-size-17"></i>{{$tt}}
                                </li>
                                <li class="font-size-15"><span class="w-auto d-block mb-n1"><i
                                            class="fas fa-plane-arrival mr-1 font-size-17"></i>Landing in
                                        {{ $multi_flight['endlocation'] }}</span>{{ $multi_flight['endDate'] }} {{ $multi_flight['endTime'] }}
                                </li>
                        </ul>
                @endforeach
                <h3 class="card-title pb-3">Order Details</h3>
                <div class="section-block"></div>
                <ul class="list-items list-items-2 py-3">
                    <li><span>Flight Type:</span>{{ $data['type'] }}</li>
                    <li><span>Flight Class:</span>{{ $data['cabin'] }}</li>
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
                    <li><span>Total Price:</span>€{{ $newPrice }}</li>
                </ul>
            </div>
        </div><!-- end card-item -->
    </div><!-- end form-content -->
    </div><!-- end form-box -->
@else
    <div class="col-lg-8">
        <p class="alert-danger text-center">No Result Found</p>
    </div>
@endif
