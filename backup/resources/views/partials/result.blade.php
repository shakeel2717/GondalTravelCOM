<div class="col-lg-8">
    @if($data[0]['type'] == 'One Way')
    @php
    $count = 0;
    @endphp
    @foreach($data as $flight)
    {{-- {{ dd($flight) }} --}}
    @if(count($flight['to'])-1 == 0)
    <div id="resultDataForScroll">
        <div class="EcoTicketWrapper_itineraryContainer__1_OU4" id="flimg{{$flight['fcode']}}" flight-price="{{$flight['aprice']}}">
            <div class="FlightsTicket_container__3FqKJ">
                <div role="button" class="BpkTicket_bpk-ticket__2zvVf BpkTicket_bpk-ticket--with-notches__1bqE0">
                    <div class="BpkTicket_bpk-ticket__paper__CB7Z5 BpkTicket_bpk-ticket__main__2C0Rm BpkTicket_bpk-ticket__main--padded__1-hGc BpkTicket_bpk-ticket__main--horizontal__3Wdiw BpkTicket_bpk-ticket__paper--with-notches__bPNdO">
                        <div class="FlightsTicketBody_container__32md1">
                            <div class="UpperTicketBody_container__10DQ4">
                                <div class="UpperTicketBody_legsContainer__35vIM">
                                    <div class="LegDetails_container__3uhle UpperTicketBody_leg__1P6mQ" aria-hidden="true">
                                        <div class="LogoImage_container__2Q2Ny LegLogo_logoContainer__1Zf8A UpperTicketBody_legLogo__1hiX0">
                                            <div class="LegLogo_legImage__1UtsM">
                                                <div class="BpkImage_bpk-image__2I7xR BpkImage_bpk-image--no-background__2z8-K" style="height: 0px; padding-bottom: 50%;">
                                                    <img class="BpkImage_bpk-image__img__2GKxn" src="//www.skyscanner.net/images/airlines/small/{{$flight['fcode']}}.png" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="LegInfo_legInfo__2UyXp">
                                            <div class="LegInfo_routePartialDepart__Ix_Rt">
                                                <span class="BpkText_bpk-text__2VouB BpkText_bpk-text--lg__1PdnC LegInfo_routePartialTime__ngmkT">
                                                    <div><span class="BpkText_bpk-text__2VouB BpkText_bpk-text--xl__HqAik">{{$flight['takeoffT']}}</span></div>
                                                </span>
                                                <span class="BpkText_bpk-text__2VouB BpkText_bpk-text--base__3REoZ"><span class="BpkText_bpk-text__2VouB BpkText_bpk-text--base__3REoZ LegInfo_routePartialCityTooltip__Ao7U-">{{$flight['from'][0]}}</span></span>
                                            </div>
                                            <div class="LegInfo_stopsContainer__2Larg">
                                                @php
                                                $timeiya = ltrim($flight['time'],'P');
                                                $timeiya2 = ltrim( $timeiya,'T');
                                                $t = trim(strrev(chunk_split(strrev($timeiya2),3, ' ')));

                                                @endphp
                                                <span class="BpkText_bpk-text__2VouB BpkText_bpk-text--xs__1ycc8 Duration_duration__2Evn6">{{$t}}</span>
                                                <div class="LegInfo_stopLine__3Zhmj">
                                                    <svg version="1.1" id="Layer_1" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 12 12" enable-background="new 0 0 12 12" xml:space="preserve" class="LegInfo_planeEnd__sWZ93">
                                                        <path fill="#898294" d="M3.922,12h0.499c0.181,0,0.349-0.093,0.444-0.247L7.949,6.8l3.233-0.019C11.625,6.791,11.989,6.44,12,6 c-0.012-0.44-0.375-0.792-0.818-0.781L7.949,5.2L4.866,0.246C4.77,0.093,4.602,0,4.421,0L3.922,0c-0.367,0-0.62,0.367-0.489,0.71 L5.149,5.2l-2.853,0L1.632,3.87c-0.084-0.167-0.25-0.277-0.436-0.288L0,3.509L1.097,6L0,8.491l1.196-0.073 C1.382,8.407,1.548,8.297,1.632,8.13L2.296,6.8h2.853l-1.716,4.49C3.302,11.633,3.555,12,3.922,12"></path>
                                                    </svg>
                                                </div>
                                                <div class="LegInfo_stopsLabelContainer__1S6VX">
                                                    <span class="BpkText_bpk-text__2VouB BpkText_bpk-text--xs__1ycc8 LegInfo_stopsLabelGreen__1Y9h_">Direct</span>&nbsp;
                                                    <div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="LegInfo_routePartialArrive__1fHVy">
                                                <span class="BpkText_bpk-text__2VouB BpkText_bpk-text--lg__1PdnC LegInfo_routePartialTime__ngmkT">
                                                    <div><span class="BpkText_bpk-text__2VouB BpkText_bpk-text--xl__HqAik">{{$flight['landT']}}</span></div>
                                                </span>
                                                <span class="BpkText_bpk-text__2VouB BpkText_bpk-text--base__3REoZ"><span class="BpkText_bpk-text__2VouB BpkText_bpk-text--base__3REoZ LegInfo_routePartialCityTooltip__Ao7U-">{{$flight['to'][count($flight['to'])-1]}}</span></span>
                                            </div>

                                            <div class="flight-footer" style="text-align:center; margin:0 auto;">
                                                <span>{{$flight['seats']}} Seats | Class: {{$flight['class_type'][0]['class']}} | {{$flight['weight']}}</span>
                                                <br />
                                                <span>{{$flight['name'][0]}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="BpkTicket_bpk-ticket__punchline__3RrZS BpkTicket_bpk-ticket__punchline--vertical-with-notches__X5A_h" role="presentation" aria-hidden="true">
                        <div class="BpkTicket_bpk-ticket__notch__1Lmml BpkTicket_bpk-ticket__notch--top__34E7T"></div>
                        <div class="BpkTicket_bpk-ticket__notch__1Lmml BpkTicket_bpk-ticket__notch--bottom__3jnt0"></div>
                    </div>
                    <div class="BpkTicket_bpk-ticket__paper__CB7Z5 BpkTicket_bpk-ticket__stub__1hhWH Ticket_stub__2xFvd BpkTicket_bpk-ticket__stub--padded__3Jd5L BpkTicket_bpk-ticket__stub--horizontal__19YlI BpkTicket_bpk-ticket__paper--with-notches__bPNdO">
                        <div class="TicketStub_horizontalStubContainer__3XTrJ">
                            <span class="BpkText_bpk-text__2VouB BpkText_bpk-text--xs__1ycc8 DealsFrom_dealsText__1Wrhc">Starting From</span>
                            <div class="">
                                <div class="Price_mainPriceContainer__3EbKF"><span class="BpkText_bpk-text__2VouB BpkText_bpk-text--lg__1PdnC BpkText_bpk-text--bold__NhE9P" id="flightPrice">€{{$flight['aprice']}}</span></div>
                            </div>
                            <span></span>
                            <form action="{{route('single-flight')}}" method='post'>
                                @csrf
                                <input type="hidden" name="data" value="{{json_encode($flight)}}">
                                <input type="hidden" name="orgdata" value="{{json_encode($orgdata[$count])}}">
                                <div class="btn-box text-center">
                                    <button type="submit" class="theme-btn theme-btn-small w-100">View Details</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @elseif(count($flight['to'])-1 == 1)
    <div>
        <div class="EcoTicketWrapper_itineraryContainer__1_OU4" id="flimg{{$flight['fcode']}}" flight-price="{{$flight['aprice']}}">
            <div class="FlightsTicket_container__3FqKJ">
                <div role="button" class="BpkTicket_bpk-ticket__2zvVf BpkTicket_bpk-ticket--with-notches__1bqE0">
                    <div class="BpkTicket_bpk-ticket__paper__CB7Z5 BpkTicket_bpk-ticket__main__2C0Rm BpkTicket_bpk-ticket__main--padded__1-hGc BpkTicket_bpk-ticket__main--horizontal__3Wdiw BpkTicket_bpk-ticket__paper--with-notches__bPNdO">
                        <div class="FlightsTicketBody_container__32md1">
                            <div class="UpperTicketBody_container__10DQ4">
                                <div class="UpperTicketBody_legsContainer__35vIM">
                                    <div class="LegDetails_container__3uhle UpperTicketBody_leg__1P6mQ" aria-hidden="true">
                                        <div class="LogoImage_container__2Q2Ny LegLogo_logoContainer__1Zf8A UpperTicketBody_legLogo__1hiX0">
                                            <div class="LegLogo_legImage__1UtsM">
                                                <?php if ($flight['name'][0] != $flight['name'][1]) { ?>
                                                    <div class="BpkImage_bpk-image__2I7xR BpkImage_bpk-image--no-background__2z8-K" style="height: 0px; padding-bottom: 50%;">
                                                        <img class="BpkImage_bpk-image__img__2GKxn" src="//www.skyscanner.net/images/airlines/small/{{$flight['code'][0]}}.png" />
                                                    </div>
                                                    <div class="BpkImage_bpk-image__2I7xR BpkImage_bpk-image--no-background__2z8-K" style="height: 0px; padding-bottom: 50%;">
                                                        <img class="BpkImage_bpk-image__img__2GKxn" src="//www.skyscanner.net/images/airlines/small/{{$flight['code'][1]}}.png" />
                                                    </div>
                                                <?php } else { ?>
                                                    <div class="BpkImage_bpk-image__2I7xR BpkImage_bpk-image--no-background__2z8-K" style="height: 0px; padding-bottom: 50%;">
                                                        <img class="BpkImage_bpk-image__img__2GKxn" src="//www.skyscanner.net/images/airlines/small/{{$flight['fcode']}}.png" />
                                                    </div>
                                                <?php } ?>

                                            </div>
                                        </div>
                                        <div class="LegInfo_legInfo__2UyXp">
                                            <div class="LegInfo_routePartialDepart__Ix_Rt">
                                                <span class="BpkText_bpk-text__2VouB BpkText_bpk-text--lg__1PdnC LegInfo_routePartialTime__ngmkT">
                                                    <div><span class="BpkText_bpk-text__2VouB BpkText_bpk-text--xl__HqAik">{{$flight['takeoffT']}}</span></div>
                                                </span>
                                                <span class="BpkText_bpk-text__2VouB BpkText_bpk-text--base__3REoZ"><span class="BpkText_bpk-text__2VouB BpkText_bpk-text--base__3REoZ LegInfo_routePartialCityTooltip__Ao7U-">{{$flight['from'][0]}}</span></span>
                                            </div>
                                            <div class="LegInfo_stopsContainer__2Larg">
                                                @php
                                                $tim = ltrim($flight['time'],'P');
                                                $tim2 = ltrim($tim,'T');
                                                $tt = trim(strrev(chunk_split(strrev($tim2),3, ' ')));

                                                @endphp
                                                <span class="BpkText_bpk-text__2VouB BpkText_bpk-text--xs__1ycc8 Duration_duration__2Evn6">{{$tt}}</span>
                                                <div class="LegInfo_stopLine__3Zhmj">
                                                    <span class="LegInfo_stopDot__3pQwb"></span>
                                                    <svg version="1.1" id="Layer_1" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 12 12" enable-background="new 0 0 12 12" xml:space="preserve" class="LegInfo_planeEnd__sWZ93">
                                                        <path fill="#898294" d="M3.922,12h0.499c0.181,0,0.349-0.093,0.444-0.247L7.949,6.8l3.233-0.019C11.625,6.791,11.989,6.44,12,6 c-0.012-0.44-0.375-0.792-0.818-0.781L7.949,5.2L4.866,0.246C4.77,0.093,4.602,0,4.421,0L3.922,0c-0.367,0-0.62,0.367-0.489,0.71 L5.149,5.2l-2.853,0L1.632,3.87c-0.084-0.167-0.25-0.277-0.436-0.288L0,3.509L1.097,6L0,8.491l1.196-0.073 C1.382,8.407,1.548,8.297,1.632,8.13L2.296,6.8h2.853l-1.716,4.49C3.302,11.633,3.555,12,3.922,12"></path>
                                                    </svg>
                                                </div>
                                                <div class="LegInfo_stopsLabelContainer__1S6VX">
                                                    <span class="BpkText_bpk-text__2VouB BpkText_bpk-text--xs__1ycc8 LegInfo_stopsLabelRed__33562">1 stop</span>&nbsp;
                                                    <div>
                                                        <span class="BpkText_bpk-text__2VouB BpkText_bpk-text--xs__1ycc8 LegInfo_stopStation__1Xusz">
                                                            <span class="BpkText_bpk-text__2VouB BpkText_bpk-text--xs__1ycc8">
                                                                {{$flight['to'][0]}}
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="LegInfo_routePartialArrive__1fHVy">
                                                <span class="BpkText_bpk-text__2VouB BpkText_bpk-text--lg__1PdnC LegInfo_routePartialTime__ngmkT">
                                                    <div>
                                                        <div><span class="BpkText_bpk-text__2VouB BpkText_bpk-text--xl__HqAik">{{$flight['landT']}}</span></div>
                                                    </div>
                                                </span>
                                                <span class="BpkText_bpk-text__2VouB BpkText_bpk-text--base__3REoZ"><span class="BpkText_bpk-text__2VouB BpkText_bpk-text--base__3REoZ LegInfo_routePartialCityTooltip__Ao7U-">{{$flight['to'][count($flight['to'])-1]}}</span></span>
                                            </div>
                                            <div class="flight-footer" style="text-align:center; margin:0 auto;">
                                                <span>{{$flight['seats']}} Seats | Class: {{$flight['class_type'][0]['class']}} | {{$flight['weight']}}</span>
                                                <?php if ($flight['name'][0] != $flight['name'][1]) {
                                                    $flight_name = $flight['name'][0] . ' + ' . $flight['name'][1];
                                                } else {
                                                    $flight_name = $flight['name'][0];
                                                } ?>
                                                <br /><span>{{$flight_name}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="BpkTicket_bpk-ticket__punchline__3RrZS BpkTicket_bpk-ticket__punchline--vertical-with-notches__X5A_h" role="presentation" aria-hidden="true">
                        <div class="BpkTicket_bpk-ticket__notch__1Lmml BpkTicket_bpk-ticket__notch--top__34E7T"></div>
                        <div class="BpkTicket_bpk-ticket__notch__1Lmml BpkTicket_bpk-ticket__notch--bottom__3jnt0"></div>
                    </div>
                    <div class="BpkTicket_bpk-ticket__paper__CB7Z5 BpkTicket_bpk-ticket__stub__1hhWH Ticket_stub__2xFvd BpkTicket_bpk-ticket__stub--padded__3Jd5L BpkTicket_bpk-ticket__stub--horizontal__19YlI BpkTicket_bpk-ticket__paper--with-notches__bPNdO">
                        <div class="TicketStub_horizontalStubContainer__3XTrJ">
                            <span class="BpkText_bpk-text__2VouB BpkText_bpk-text--xs__1ycc8 DealsFrom_dealsText__1Wrhc">Starting From</span>
                            <div class="">
                                <div class="Price_mainPriceContainer__3EbKF"><span class="BpkText_bpk-text__2VouB BpkText_bpk-text--lg__1PdnC BpkText_bpk-text--bold__NhE9P" id="flightPrice">€{{$flight['aprice']}}</span></div>
                            </div>
                            <span></span>
                            <form action="{{route('single-flight')}}" method='post'>
                                @csrf
                                <input type="hidden" name="data" value="{{json_encode($flight)}}">
                                <input type="hidden" name="orgdata" value="{{json_encode($orgdata[$count])}}">
                                <div class="btn-box text-center">
                                    <button type="submit" class="theme-btn theme-btn-small w-100">View Details</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @elseif(count($flight['to'])-1 > 1)
    <div>
        <div class="EcoTicketWrapper_itineraryContainer__1_OU4" id="flimg{{$flight['fcode']}}" flight-price="{{$flight['aprice']}}">
            <div class="FlightsTicket_container__3FqKJ">
                <div role="button" class="BpkTicket_bpk-ticket__2zvVf BpkTicket_bpk-ticket--with-notches__1bqE0">
                    <div class="BpkTicket_bpk-ticket__paper__CB7Z5 BpkTicket_bpk-ticket__main__2C0Rm BpkTicket_bpk-ticket__main--padded__1-hGc BpkTicket_bpk-ticket__main--horizontal__3Wdiw BpkTicket_bpk-ticket__paper--with-notches__bPNdO">
                        <div class="FlightsTicketBody_container__32md1">
                            <div class="UpperTicketBody_container__10DQ4">
                                <div class="UpperTicketBody_legsContainer__35vIM">
                                    <div class="LegDetails_container__3uhle UpperTicketBody_leg__1P6mQ" aria-hidden="true">
                                        <div class="LogoImage_container__2Q2Ny LegLogo_logoContainer__1Zf8A UpperTicketBody_legLogo__1hiX0">
                                            <div class="LegLogo_legImage__1UtsM">
                                                <div class="BpkImage_bpk-image__2I7xR BpkImage_bpk-image--no-background__2z8-K" style="height: 0px; padding-bottom: 50%;">
                                                    <img class="BpkImage_bpk-image__img__2GKxn" src="//www.skyscanner.net/images/airlines/small/{{$flight['fcode']}}.png" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="LegInfo_legInfo__2UyXp">
                                            <div class="LegInfo_routePartialDepart__Ix_Rt">
                                                <span class="BpkText_bpk-text__2VouB BpkText_bpk-text--lg__1PdnC LegInfo_routePartialTime__ngmkT">
                                                    <div><span class="BpkText_bpk-text__2VouB BpkText_bpk-text--xl__HqAik">{{$flight['takeoffT']}}</span></div>
                                                </span>
                                                <span class="BpkText_bpk-text__2VouB BpkText_bpk-text--base__3REoZ"><span class="BpkText_bpk-text__2VouB BpkText_bpk-text--base__3REoZ LegInfo_routePartialCityTooltip__Ao7U-">{{$flight['from'][0]}}</span></span>
                                            </div>
                                            <div class="LegInfo_stopsContainer__2Larg">
                                                @php
                                                $timer = ltrim($flight['time'],'P');
                                                $timer2 = ltrim($timer,'T');
                                                $ttt = trim(strrev(chunk_split(strrev($timer2),3, ' ')));

                                                @endphp
                                                <span class="BpkText_bpk-text__2VouB BpkText_bpk-text--xs__1ycc8 Duration_duration__2Evn6">{{$ttt}}</span>
                                                <div class="LegInfo_stopLine__3Zhmj">
                                                    <span class="LegInfo_stopDot__3pQwb"></span><span class="LegInfo_stopDot__3pQwb"></span>
                                                    <svg version="1.1" id="Layer_1" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 12 12" enable-background="new 0 0 12 12" xml:space="preserve" class="LegInfo_planeEnd__sWZ93">
                                                        <path fill="#898294" d="M3.922,12h0.499c0.181,0,0.349-0.093,0.444-0.247L7.949,6.8l3.233-0.019C11.625,6.791,11.989,6.44,12,6 c-0.012-0.44-0.375-0.792-0.818-0.781L7.949,5.2L4.866,0.246C4.77,0.093,4.602,0,4.421,0L3.922,0c-0.367,0-0.62,0.367-0.489,0.71 L5.149,5.2l-2.853,0L1.632,3.87c-0.084-0.167-0.25-0.277-0.436-0.288L0,3.509L1.097,6L0,8.491l1.196-0.073 C1.382,8.407,1.548,8.297,1.632,8.13L2.296,6.8h2.853l-1.716,4.49C3.302,11.633,3.555,12,3.922,12"></path>
                                                    </svg>
                                                </div>
                                                <div class="LegInfo_stopsLabelContainer__1S6VX">
                                                    <span class="BpkText_bpk-text__2VouB BpkText_bpk-text--xs__1ycc8 LegInfo_stopsLabelRed__33562">{{count($flight['to'])-1}} stops</span>&nbsp;
                                                    <div>
                                                        @for ($i = 0; $i < count($flight['to'])-1; $i++) <span class="BpkText_bpk-text__2VouB BpkText_bpk-text--xs__1ycc8 LegInfo_stopStation__1Xusz"><span class="BpkText_bpk-text__2VouB BpkText_bpk-text--xs__1ycc8">{{$flight['to'][$i]}}</span></span>
                                                            @endfor
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="LegInfo_routePartialArrive__1fHVy">
                                                <span class="BpkText_bpk-text__2VouB BpkText_bpk-text--lg__1PdnC LegInfo_routePartialTime__ngmkT">
                                                    <div>
                                                        <div><span class="BpkText_bpk-text__2VouB BpkText_bpk-text--xl__HqAik">{{$flight['landT']}}</span></div>
                                                    </div>
                                                </span>
                                                <span class="BpkText_bpk-text__2VouB BpkText_bpk-text--base__3REoZ"><span class="BpkText_bpk-text__2VouB BpkText_bpk-text--base__3REoZ LegInfo_routePartialCityTooltip__Ao7U-">{{$flight['to'][count($flight['to'])-1]}}</span></span>
                                            </div>
                                            <div class="flight-footer" style="text-align:center; margin:0 auto;">
                                                <span>{{$flight['seats']}} Seats | Class: {{$flight['class_type'][0]['class']}} | {{$flight['weight']}}</span>
                                                <?php if ($flight['name'][0] != $flight['name'][1]) {
                                                    $flight_name = $flight['name'][0] . ' + ' . $flight['name'][1];
                                                } else {
                                                    $flight_name = $flight['name'][0];
                                                } ?>
                                                <br /><span>{{$flight_name}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="BpkTicket_bpk-ticket__punchline__3RrZS BpkTicket_bpk-ticket__punchline--vertical-with-notches__X5A_h" role="presentation" aria-hidden="true">
                        <div class="BpkTicket_bpk-ticket__notch__1Lmml BpkTicket_bpk-ticket__notch--top__34E7T"></div>
                        <div class="BpkTicket_bpk-ticket__notch__1Lmml BpkTicket_bpk-ticket__notch--bottom__3jnt0"></div>
                    </div>
                    <div class="BpkTicket_bpk-ticket__paper__CB7Z5 BpkTicket_bpk-ticket__stub__1hhWH Ticket_stub__2xFvd BpkTicket_bpk-ticket__stub--padded__3Jd5L BpkTicket_bpk-ticket__stub--horizontal__19YlI BpkTicket_bpk-ticket__paper--with-notches__bPNdO">
                        <div class="TicketStub_horizontalStubContainer__3XTrJ">
                            <span class="BpkText_bpk-text__2VouB BpkText_bpk-text--xs__1ycc8 DealsFrom_dealsText__1Wrhc">Starting From</span>
                            <div class="">
                                <div class="Price_mainPriceContainer__3EbKF"><span class="BpkText_bpk-text__2VouB BpkText_bpk-text--lg__1PdnC BpkText_bpk-text--bold__NhE9P" id="flightPrice">€{{$flight['aprice']}}</span></div>
                            </div>
                            <span></span>
                            <form action="{{route('single-flight')}}" method='post'>
                                @csrf
                                <input type="hidden" name="data" value="{{json_encode($flight)}}">
                                <input type="hidden" name="orgdata" value="{{json_encode($orgdata[$count])}}">
                                <div class="btn-box text-center">
                                    <button type="submit" class="theme-btn theme-btn-small w-100">View Details</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    @php
    $count++;
    @endphp
    @endforeach

    @elseif($data[0]['type'] == 'Return')
    @php
    $count = 0;
    @endphp
    @foreach($data as $flight)
    @if(count($flight['to'])-1 == 0)
    <div>
        <div class="EcoTicketWrapper_itineraryContainer__1_OU4" id="flimg{{$flight['fcode']}}" flight-price="{{$flight['aprice']}}">
            <div class="FlightsTicket_container__3FqKJ">
                <div role="button" class="BpkTicket_bpk-ticket__2zvVf BpkTicket_bpk-ticket--with-notches__1bqE0">
                    <div class="BpkTicket_bpk-ticket__paper__CB7Z5 BpkTicket_bpk-ticket__main__2C0Rm BpkTicket_bpk-ticket__main--padded__1-hGc BpkTicket_bpk-ticket__main--horizontal__3Wdiw BpkTicket_bpk-ticket__paper--with-notches__bPNdO">
                        <div class="FlightsTicketBody_container__32md1">
                            <div class="UpperTicketBody_container__10DQ4">
                                <div class="UpperTicketBody_legsContainer__35vIM">
                                    <div class="LegDetails_container__3uhle UpperTicketBody_leg__1P6mQ" aria-hidden="true">
                                        <div class="LogoImage_container__2Q2Ny LegLogo_logoContainer__1Zf8A UpperTicketBody_legLogo__1hiX0">
                                            <div class="LegLogo_legImage__1UtsM">
                                                <div class="BpkImage_bpk-image__2I7xR BpkImage_bpk-image--no-background__2z8-K" style="height: 0px; padding-bottom: 50%;">
                                                    <img class="BpkImage_bpk-image__img__2GKxn" src="//www.skyscanner.net/images/airlines/small/{{$flight['fcode']}}.png" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="LegInfo_legInfo__2UyXp">
                                            <div class="LegInfo_routePartialDepart__Ix_Rt">
                                                <span class="BpkText_bpk-text__2VouB BpkText_bpk-text--lg__1PdnC LegInfo_routePartialTime__ngmkT">
                                                    <div><span class="BpkText_bpk-text__2VouB BpkText_bpk-text--xl__HqAik">{{$flight['takeoffT']}}</span></div>
                                                </span>
                                                <span class="BpkText_bpk-text__2VouB BpkText_bpk-text--base__3REoZ"><span class="BpkText_bpk-text__2VouB BpkText_bpk-text--base__3REoZ LegInfo_routePartialCityTooltip__Ao7U-">{{$flight['from'][0]}}</span></span>
                                            </div>
                                            <div class="LegInfo_stopsContainer__2Larg">
                                                @php
                                                $timers = ltrim($flight['time'],'P');
                                                $timers2 = ltrim($timers,'T');
                                                $tttt = trim(strrev(chunk_split(strrev($timers2),3, ' ')));

                                                @endphp
                                                <span class="BpkText_bpk-text__2VouB BpkText_bpk-text--xs__1ycc8 Duration_duration__2Evn6">{{$tttt}}</span>
                                                <div class="LegInfo_stopLine__3Zhmj">
                                                    <svg version="1.1" id="Layer_1" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 12 12" enable-background="new 0 0 12 12" xml:space="preserve" class="LegInfo_planeEnd__sWZ93">
                                                        <path fill="#898294" d="M3.922,12h0.499c0.181,0,0.349-0.093,0.444-0.247L7.949,6.8l3.233-0.019C11.625,6.791,11.989,6.44,12,6 c-0.012-0.44-0.375-0.792-0.818-0.781L7.949,5.2L4.866,0.246C4.77,0.093,4.602,0,4.421,0L3.922,0c-0.367,0-0.62,0.367-0.489,0.71 L5.149,5.2l-2.853,0L1.632,3.87c-0.084-0.167-0.25-0.277-0.436-0.288L0,3.509L1.097,6L0,8.491l1.196-0.073 C1.382,8.407,1.548,8.297,1.632,8.13L2.296,6.8h2.853l-1.716,4.49C3.302,11.633,3.555,12,3.922,12"></path>
                                                    </svg>
                                                </div>
                                                <div class="LegInfo_stopsLabelContainer__1S6VX">
                                                    <span class="BpkText_bpk-text__2VouB BpkText_bpk-text--xs__1ycc8 LegInfo_stopsLabelGreen__1Y9h_">Direct</span>&nbsp;
                                                    <div></div>
                                                </div>
                                            </div>
                                            <div class="LegInfo_routePartialArrive__1fHVy">
                                                <span class="BpkText_bpk-text__2VouB BpkText_bpk-text--lg__1PdnC LegInfo_routePartialTime__ngmkT">
                                                    <div><span class="BpkText_bpk-text__2VouB BpkText_bpk-text--xl__HqAik">{{$flight['landT']}}</span></div>
                                                </span>
                                                <span class="BpkText_bpk-text__2VouB BpkText_bpk-text--base__3REoZ"><span class="BpkText_bpk-text__2VouB BpkText_bpk-text--base__3REoZ LegInfo_routePartialCityTooltip__Ao7U-">{{$flight['to'][count($flight['to'])-1]}}</span></span>
                                            </div>
                                            <div class="flight-footer" style="text-align:center; margin:0 auto;">
                                                <span>{{$flight['seats']}} Seats | Class: {{$flight['class_type'][0]['class']}} | {{$flight['weight']}}</span>
                                                <br />
                                                <span>{{$flight['name'][0]}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="LegDetails_container__3uhle UpperTicketBody_leg__1P6mQ" aria-hidden="true">
                                        <div class="LogoImage_container__2Q2Ny LegLogo_logoContainer__1Zf8A UpperTicketBody_legLogo__1hiX0">
                                            <div class="LegLogo_legImage__1UtsM">
                                                <div class="BpkImage_bpk-image__2I7xR BpkImage_bpk-image--no-background__2z8-K" style="height: 0px; padding-bottom: 50%;">
                                                    <img class="BpkImage_bpk-image__img__2GKxn" src="//www.skyscanner.net/images/airlines/small/{{$flight['fcode']}}.png" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="LegInfo_legInfo__2UyXp">
                                            <div class="LegInfo_routePartialDepart__Ix_Rt">
                                                <span class="BpkText_bpk-text__2VouB BpkText_bpk-text--lg__1PdnC LegInfo_routePartialTime__ngmkT">
                                                    <div><span class="BpkText_bpk-text__2VouB BpkText_bpk-text--xl__HqAik">{{$flight['btakeoffT']}}</span></div>
                                                </span>
                                                <span class="BpkText_bpk-text__2VouB BpkText_bpk-text--base__3REoZ"><span class="BpkText_bpk-text__2VouB BpkText_bpk-text--base__3REoZ LegInfo_routePartialCityTooltip__Ao7U-">{{$flight['bfrom'][0]}}</span></span>
                                            </div>
                                            <div class="LegInfo_stopsContainer__2Larg">
                                                @php
                                                $time2= ltrim($flight['btime'],'P');
                                                $timee2 = ltrim( $time2,'T');
                                                $t2 = trim(strrev(chunk_split(strrev($timee2),3, ' ')));

                                                @endphp
                                                <span class="BpkText_bpk-text__2VouB BpkText_bpk-text--xs__1ycc8 Duration_duration__2Evn6">{{$t2}}</span>
                                                <div class="LegInfo_stopLine__3Zhmj">
                                                    <svg version="1.1" id="Layer_1" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 12 12" enable-background="new 0 0 12 12" xml:space="preserve" class="LegInfo_planeEnd__sWZ93">
                                                        <path fill="#898294" d="M3.922,12h0.499c0.181,0,0.349-0.093,0.444-0.247L7.949,6.8l3.233-0.019C11.625,6.791,11.989,6.44,12,6 c-0.012-0.44-0.375-0.792-0.818-0.781L7.949,5.2L4.866,0.246C4.77,0.093,4.602,0,4.421,0L3.922,0c-0.367,0-0.62,0.367-0.489,0.71 L5.149,5.2l-2.853,0L1.632,3.87c-0.084-0.167-0.25-0.277-0.436-0.288L0,3.509L1.097,6L0,8.491l1.196-0.073 C1.382,8.407,1.548,8.297,1.632,8.13L2.296,6.8h2.853l-1.716,4.49C3.302,11.633,3.555,12,3.922,12"></path>
                                                    </svg>
                                                </div>
                                                <div class="LegInfo_stopsLabelContainer__1S6VX">
                                                    <span class="BpkText_bpk-text__2VouB BpkText_bpk-text--xs__1ycc8 LegInfo_stopsLabelGreen__1Y9h_">Direct</span>&nbsp;
                                                    <div></div>
                                                </div>
                                            </div>
                                            <div class="LegInfo_routePartialArrive__1fHVy">
                                                <span class="BpkText_bpk-text__2VouB BpkText_bpk-text--lg__1PdnC LegInfo_routePartialTime__ngmkT">
                                                    <div><span class="BpkText_bpk-text__2VouB BpkText_bpk-text--xl__HqAik">{{$flight['blandT']}}</span></div>
                                                </span>
                                                <span class="BpkText_bpk-text__2VouB BpkText_bpk-text--base__3REoZ"><span class="BpkText_bpk-text__2VouB BpkText_bpk-text--base__3REoZ LegInfo_routePartialCityTooltip__Ao7U-">{{$flight['bto'][count($flight['bto'])-1]}}</span></span>
                                            </div>
                                            <div class="flight-footer" style="text-align:center; margin:0 auto;">
                                                <span>{{$flight['seats']}} Seats | Class: {{$flight['class_type'][1]['class']}} | {{$flight['weight']}}</span>
                                                <br />
                                                <span>{{$flight['name'][0]}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="BpkTicket_bpk-ticket__punchline__3RrZS BpkTicket_bpk-ticket__punchline--vertical-with-notches__X5A_h" role="presentation" aria-hidden="true">
                        <div class="BpkTicket_bpk-ticket__notch__1Lmml BpkTicket_bpk-ticket__notch--top__34E7T"></div>
                        <div class="BpkTicket_bpk-ticket__notch__1Lmml BpkTicket_bpk-ticket__notch--bottom__3jnt0"></div>
                    </div>
                    <div class="BpkTicket_bpk-ticket__paper__CB7Z5 BpkTicket_bpk-ticket__stub__1hhWH Ticket_stub__2xFvd BpkTicket_bpk-ticket__stub--padded__3Jd5L BpkTicket_bpk-ticket__stub--horizontal__19YlI BpkTicket_bpk-ticket__paper--with-notches__bPNdO">
                        <div class="TicketStub_horizontalStubContainer__3XTrJ">
                            <span class="BpkText_bpk-text__2VouB BpkText_bpk-text--xs__1ycc8 DealsFrom_dealsText__1Wrhc">Starting From</span>
                            <div class="">
                                <div class="Price_mainPriceContainer__3EbKF"><span class="BpkText_bpk-text__2VouB BpkText_bpk-text--lg__1PdnC BpkText_bpk-text--bold__NhE9P" id="flightPrice">€{{$flight['aprice']}}</span></div>
                            </div>
                            <span></span>
                            <form action="{{route('single-flight')}}" method='post'>
                                @csrf
                                <input type="hidden" name="data" value="{{json_encode($flight)}}">
                                <input type="hidden" name="orgdata" value="{{json_encode($orgdata[$count])}}">
                                <div class="btn-box text-center">
                                    <button type="submit" class="theme-btn theme-btn-small w-100">View Details</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @elseif(count($flight['to'])-1 == 1)
    <div>
        <div class="EcoTicketWrapper_itineraryContainer__1_OU4" id="flimg{{$flight['fcode']}}" flight-price="{{$flight['aprice']}}">
            <div class="FlightsTicket_container__3FqKJ">
                <div role="button" class="BpkTicket_bpk-ticket__2zvVf BpkTicket_bpk-ticket--with-notches__1bqE0">
                    <div class="BpkTicket_bpk-ticket__paper__CB7Z5 BpkTicket_bpk-ticket__main__2C0Rm BpkTicket_bpk-ticket__main--padded__1-hGc BpkTicket_bpk-ticket__main--horizontal__3Wdiw BpkTicket_bpk-ticket__paper--with-notches__bPNdO">
                        <div class="FlightsTicketBody_container__32md1">
                            <div class="UpperTicketBody_container__10DQ4">
                                <div class="UpperTicketBody_legsContainer__35vIM">
                                    <div class="LegDetails_container__3uhle UpperTicketBody_leg__1P6mQ" aria-hidden="true">
                                        <div class="LogoImage_container__2Q2Ny LegLogo_logoContainer__1Zf8A UpperTicketBody_legLogo__1hiX0">
                                            <div class="LegLogo_legImage__1UtsM">
                                                <div class="BpkImage_bpk-image__2I7xR BpkImage_bpk-image--no-background__2z8-K" style="height: 0px; padding-bottom: 50%;">
                                                    <img class="BpkImage_bpk-image__img__2GKxn" src="//www.skyscanner.net/images/airlines/small/{{$flight['fcode']}}.png" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="LegInfo_legInfo__2UyXp">
                                            <div class="LegInfo_routePartialDepart__Ix_Rt">
                                                <span class="BpkText_bpk-text__2VouB BpkText_bpk-text--lg__1PdnC LegInfo_routePartialTime__ngmkT">
                                                    <div><span class="BpkText_bpk-text__2VouB BpkText_bpk-text--xl__HqAik">{{$flight['takeoffT']}}</span></div>
                                                </span>
                                                <span class="BpkText_bpk-text__2VouB BpkText_bpk-text--base__3REoZ"><span class="BpkText_bpk-text__2VouB BpkText_bpk-text--base__3REoZ LegInfo_routePartialCityTooltip__Ao7U-">{{$flight['from'][0]}}</span></span>
                                            </div>
                                            <div class="LegInfo_stopsContainer__2Larg">
                                                @php
                                                $timeri = ltrim($flight['time'],'P');
                                                $timeri2 = ltrim($timeri,'T');
                                                $ti = trim(strrev(chunk_split(strrev($timeri2),3, ' ')));

                                                @endphp
                                                <span class="BpkText_bpk-text__2VouB BpkText_bpk-text--xs__1ycc8 Duration_duration__2Evn6">{{$ti}}</span>
                                                <div class="LegInfo_stopLine__3Zhmj">
                                                    <span class="LegInfo_stopDot__3pQwb"></span>
                                                    <svg version="1.1" id="Layer_1" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 12 12" enable-background="new 0 0 12 12" xml:space="preserve" class="LegInfo_planeEnd__sWZ93">
                                                        <path fill="#898294" d="M3.922,12h0.499c0.181,0,0.349-0.093,0.444-0.247L7.949,6.8l3.233-0.019C11.625,6.791,11.989,6.44,12,6 c-0.012-0.44-0.375-0.792-0.818-0.781L7.949,5.2L4.866,0.246C4.77,0.093,4.602,0,4.421,0L3.922,0c-0.367,0-0.62,0.367-0.489,0.71 L5.149,5.2l-2.853,0L1.632,3.87c-0.084-0.167-0.25-0.277-0.436-0.288L0,3.509L1.097,6L0,8.491l1.196-0.073 C1.382,8.407,1.548,8.297,1.632,8.13L2.296,6.8h2.853l-1.716,4.49C3.302,11.633,3.555,12,3.922,12"></path>
                                                    </svg>
                                                </div>
                                                <div class="LegInfo_stopsLabelContainer__1S6VX">
                                                    <span class="BpkText_bpk-text__2VouB BpkText_bpk-text--xs__1ycc8 LegInfo_stopsLabelRed__33562">1 stop</span>&nbsp;
                                                    <div>
                                                        <span class="BpkText_bpk-text__2VouB BpkText_bpk-text--xs__1ycc8 LegInfo_stopStation__1Xusz">
                                                            <span class="BpkText_bpk-text__2VouB BpkText_bpk-text--xs__1ycc8">
                                                                {{$flight['to'][0]}}
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="LegInfo_routePartialArrive__1fHVy">
                                                <span class="BpkText_bpk-text__2VouB BpkText_bpk-text--lg__1PdnC LegInfo_routePartialTime__ngmkT">
                                                    <div>
                                                        <div><span class="BpkText_bpk-text__2VouB BpkText_bpk-text--xl__HqAik">{{$flight['landT']}}</span></div>
                                                    </div>
                                                </span>
                                                <span class="BpkText_bpk-text__2VouB BpkText_bpk-text--base__3REoZ"><span class="BpkText_bpk-text__2VouB BpkText_bpk-text--base__3REoZ LegInfo_routePartialCityTooltip__Ao7U-">{{$flight['to'][count($flight['to'])-1]}}</span></span>
                                            </div>
                                            <div class="flight-footer" style="text-align:center; margin:0 auto;">
                                                <span>{{$flight['seats']}} Seats | Class: {{$flight['class_type'][0]['class']}} | {{$flight['weight']}}</span>
                                                <?php if ($flight['name'][0] != $flight['name'][1]) {
                                                    $flight_name = $flight['name'][0] . ' + ' . $flight['name'][1];
                                                } else {
                                                    $flight_name = $flight['name'][0];
                                                } ?>
                                                <br /><span>{{$flight_name}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="LegDetails_container__3uhle UpperTicketBody_leg__1P6mQ" aria-hidden="true">
                                        <div class="LogoImage_container__2Q2Ny LegLogo_logoContainer__1Zf8A UpperTicketBody_legLogo__1hiX0">
                                            <div class="LegLogo_legImage__1UtsM">
                                                <div class="BpkImage_bpk-image__2I7xR BpkImage_bpk-image--no-background__2z8-K" style="height: 0px; padding-bottom: 50%;">
                                                    <img class="BpkImage_bpk-image__img__2GKxn" src="//www.skyscanner.net/images/airlines/small/{{$flight['fcode']}}.png" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="LegInfo_legInfo__2UyXp">
                                            <div class="LegInfo_routePartialDepart__Ix_Rt">
                                                <span class="BpkText_bpk-text__2VouB BpkText_bpk-text--lg__1PdnC LegInfo_routePartialTime__ngmkT">
                                                    <div><span class="BpkText_bpk-text__2VouB BpkText_bpk-text--xl__HqAik">{{$flight['btakeoffT']}}</span></div>
                                                </span>
                                                <span class="BpkText_bpk-text__2VouB BpkText_bpk-text--base__3REoZ"><span class="BpkText_bpk-text__2VouB BpkText_bpk-text--base__3REoZ LegInfo_routePartialCityTooltip__Ao7U-">{{$flight['bfrom'][0]}}</span></span>
                                            </div>
                                            <div class="LegInfo_stopsContainer__2Larg">
                                                @php
                                                $timee2 = ltrim($flight['btime'],'P');
                                                $timeee2 = ltrim($timee2,'T');
                                                $tt2 = trim(strrev(chunk_split(strrev($timeee2),3, ' ')));

                                                @endphp
                                                <span class="BpkText_bpk-text__2VouB BpkText_bpk-text--xs__1ycc8 Duration_duration__2Evn6">{{$tt2}}</span>
                                                <div class="LegInfo_stopLine__3Zhmj">
                                                    <span class="LegInfo_stopDot__3pQwb"></span>
                                                    <svg version="1.1" id="Layer_1" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 12 12" enable-background="new 0 0 12 12" xml:space="preserve" class="LegInfo_planeEnd__sWZ93">
                                                        <path fill="#898294" d="M3.922,12h0.499c0.181,0,0.349-0.093,0.444-0.247L7.949,6.8l3.233-0.019C11.625,6.791,11.989,6.44,12,6 c-0.012-0.44-0.375-0.792-0.818-0.781L7.949,5.2L4.866,0.246C4.77,0.093,4.602,0,4.421,0L3.922,0c-0.367,0-0.62,0.367-0.489,0.71 L5.149,5.2l-2.853,0L1.632,3.87c-0.084-0.167-0.25-0.277-0.436-0.288L0,3.509L1.097,6L0,8.491l1.196-0.073 C1.382,8.407,1.548,8.297,1.632,8.13L2.296,6.8h2.853l-1.716,4.49C3.302,11.633,3.555,12,3.922,12"></path>
                                                    </svg>
                                                </div>
                                                <div class="LegInfo_stopsLabelContainer__1S6VX">
                                                    <span class="BpkText_bpk-text__2VouB BpkText_bpk-text--xs__1ycc8 LegInfo_stopsLabelRed__33562">1 stop</span>&nbsp;
                                                    <div>
                                                        <span class="BpkText_bpk-text__2VouB BpkText_bpk-text--xs__1ycc8 LegInfo_stopStation__1Xusz">
                                                            <span class="BpkText_bpk-text__2VouB BpkText_bpk-text--xs__1ycc8">
                                                                {{$flight['bto'][0]}}
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="LegInfo_routePartialArrive__1fHVy">
                                                <span class="BpkText_bpk-text__2VouB BpkText_bpk-text--lg__1PdnC LegInfo_routePartialTime__ngmkT">
                                                    <div>
                                                        <div><span class="BpkText_bpk-text__2VouB BpkText_bpk-text--xl__HqAik">{{$flight['blandT']}}</span></div>
                                                    </div>
                                                </span>
                                                <span class="BpkText_bpk-text__2VouB BpkText_bpk-text--base__3REoZ"><span class="BpkText_bpk-text__2VouB BpkText_bpk-text--base__3REoZ LegInfo_routePartialCityTooltip__Ao7U-">{{$flight['bto'][count($flight['bto'])-1]}}</span></span>
                                            </div>
                                            <div class="flight-footer" style="text-align:center; margin:0 auto;">
                                                <span>{{$flight['seats']}} Seats | Class: {{$flight['class_type'][0]['class']}} | {{$flight['weight']}}</span>
                                                <?php if ($flight['name'][0] != $flight['name'][1]) {
                                                    $flight_name = $flight['name'][0] . ' + ' . $flight['name'][1];
                                                } else {
                                                    $flight_name = $flight['name'][0];
                                                } ?>
                                                <br /><span>{{$flight_name}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="BpkTicket_bpk-ticket__punchline__3RrZS BpkTicket_bpk-ticket__punchline--vertical-with-notches__X5A_h" role="presentation" aria-hidden="true">
                        <div class="BpkTicket_bpk-ticket__notch__1Lmml BpkTicket_bpk-ticket__notch--top__34E7T"></div>
                        <div class="BpkTicket_bpk-ticket__notch__1Lmml BpkTicket_bpk-ticket__notch--bottom__3jnt0"></div>
                    </div>
                    <div class="BpkTicket_bpk-ticket__paper__CB7Z5 BpkTicket_bpk-ticket__stub__1hhWH Ticket_stub__2xFvd BpkTicket_bpk-ticket__stub--padded__3Jd5L BpkTicket_bpk-ticket__stub--horizontal__19YlI BpkTicket_bpk-ticket__paper--with-notches__bPNdO">
                        <div class="TicketStub_horizontalStubContainer__3XTrJ">
                            <span class="BpkText_bpk-text__2VouB BpkText_bpk-text--xs__1ycc8 DealsFrom_dealsText__1Wrhc">Starting From</span>
                            <div class="">
                                <div class="Price_mainPriceContainer__3EbKF"><span class="BpkText_bpk-text__2VouB BpkText_bpk-text--lg__1PdnC BpkText_bpk-text--bold__NhE9P" id="flightPrice">€{{$flight['aprice']}}</span></div>
                            </div>
                            <span></span>
                            <form action="{{route('single-flight')}}" method='post'>
                                @csrf
                                <input type="hidden" name="data" value="{{json_encode($flight)}}">
                                <input type="hidden" name="orgdata" value="{{json_encode($orgdata[$count])}}">
                                <div class="btn-box text-center">
                                    <button type="submit" class="theme-btn theme-btn-small w-100">View Details</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @elseif(count($flight['to'])-1 > 1)
    <div>
        <div class="EcoTicketWrapper_itineraryContainer__1_OU4" id="flimg{{$flight['fcode']}}" flight-price="{{$flight['aprice']}}">
            <div class="FlightsTicket_container__3FqKJ">
                <div role="button" class="BpkTicket_bpk-ticket__2zvVf BpkTicket_bpk-ticket--with-notches__1bqE0">
                    <div class="BpkTicket_bpk-ticket__paper__CB7Z5 BpkTicket_bpk-ticket__main__2C0Rm BpkTicket_bpk-ticket__main--padded__1-hGc BpkTicket_bpk-ticket__main--horizontal__3Wdiw BpkTicket_bpk-ticket__paper--with-notches__bPNdO">
                        <div class="FlightsTicketBody_container__32md1">
                            <div class="UpperTicketBody_container__10DQ4">
                                <div class="UpperTicketBody_legsContainer__35vIM">
                                    <div class="LegDetails_container__3uhle UpperTicketBody_leg__1P6mQ" aria-hidden="true">
                                        <div class="LogoImage_container__2Q2Ny LegLogo_logoContainer__1Zf8A UpperTicketBody_legLogo__1hiX0">
                                            <div class="LegLogo_legImage__1UtsM">
                                                <div class="BpkImage_bpk-image__2I7xR BpkImage_bpk-image--no-background__2z8-K" style="height: 0px; padding-bottom: 50%;">
                                                    <img class="BpkImage_bpk-image__img__2GKxn" src="//www.skyscanner.net/images/airlines/small/{{$flight['fcode']}}.png" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="LegInfo_legInfo__2UyXp">
                                            <div class="LegInfo_routePartialDepart__Ix_Rt">
                                                <span class="BpkText_bpk-text__2VouB BpkText_bpk-text--lg__1PdnC LegInfo_routePartialTime__ngmkT">
                                                    <div><span class="BpkText_bpk-text__2VouB BpkText_bpk-text--xl__HqAik">{{$flight['takeoffT']}}</span></div>
                                                </span>
                                                <span class="BpkText_bpk-text__2VouB BpkText_bpk-text--base__3REoZ"><span class="BpkText_bpk-text__2VouB BpkText_bpk-text--base__3REoZ LegInfo_routePartialCityTooltip__Ao7U-">{{$flight['from'][0]}}</span></span>
                                            </div>
                                            <div class="LegInfo_stopsContainer__2Larg">
                                                @php
                                                $timerii = ltrim($flight['time'],'P');
                                                $timerii2 = ltrim($timerii ,'T');
                                                $tii = trim(strrev(chunk_split(strrev($timerii2),3, ' ')));

                                                @endphp

                                                <span class="BpkText_bpk-text__2VouB BpkText_bpk-text--xs__1ycc8 Duration_duration__2Evn6">{{$tii}}</span>
                                                <div class="LegInfo_stopLine__3Zhmj">
                                                    <span class="LegInfo_stopDot__3pQwb"></span><span class="LegInfo_stopDot__3pQwb"></span>
                                                    <svg version="1.1" id="Layer_1" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 12 12" enable-background="new 0 0 12 12" xml:space="preserve" class="LegInfo_planeEnd__sWZ93">
                                                        <path fill="#898294" d="M3.922,12h0.499c0.181,0,0.349-0.093,0.444-0.247L7.949,6.8l3.233-0.019C11.625,6.791,11.989,6.44,12,6 c-0.012-0.44-0.375-0.792-0.818-0.781L7.949,5.2L4.866,0.246C4.77,0.093,4.602,0,4.421,0L3.922,0c-0.367,0-0.62,0.367-0.489,0.71 L5.149,5.2l-2.853,0L1.632,3.87c-0.084-0.167-0.25-0.277-0.436-0.288L0,3.509L1.097,6L0,8.491l1.196-0.073 C1.382,8.407,1.548,8.297,1.632,8.13L2.296,6.8h2.853l-1.716,4.49C3.302,11.633,3.555,12,3.922,12"></path>
                                                    </svg>
                                                </div>
                                                <div class="LegInfo_stopsLabelContainer__1S6VX">
                                                    <span class="BpkText_bpk-text__2VouB BpkText_bpk-text--xs__1ycc8 LegInfo_stopsLabelRed__33562">{{count($flight['to'])-1}} stops</span>&nbsp;
                                                    <div>
                                                        @for ($i = 0; $i < count($flight['to'])-1; $i++) <span class="BpkText_bpk-text__2VouB BpkText_bpk-text--xs__1ycc8 LegInfo_stopStation__1Xusz"><span class="BpkText_bpk-text__2VouB BpkText_bpk-text--xs__1ycc8">{{$flight['to'][$i]}}</span></span>
                                                            @endfor
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="LegInfo_routePartialArrive__1fHVy">
                                                <span class="BpkText_bpk-text__2VouB BpkText_bpk-text--lg__1PdnC LegInfo_routePartialTime__ngmkT">
                                                    <div>
                                                        <div><span class="BpkText_bpk-text__2VouB BpkText_bpk-text--xl__HqAik">{{$flight['landT']}}</span></div>
                                                    </div>
                                                </span>
                                                <span class="BpkText_bpk-text__2VouB BpkText_bpk-text--base__3REoZ"><span class="BpkText_bpk-text__2VouB BpkText_bpk-text--base__3REoZ LegInfo_routePartialCityTooltip__Ao7U-">{{$flight['to'][count($flight['to'])-1]}}</span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="LegDetails_container__3uhle UpperTicketBody_leg__1P6mQ" aria-hidden="true">
                                        <div class="LogoImage_container__2Q2Ny LegLogo_logoContainer__1Zf8A UpperTicketBody_legLogo__1hiX0">
                                            <div class="LegLogo_legImage__1UtsM">
                                                <div class="BpkImage_bpk-image__2I7xR BpkImage_bpk-image--no-background__2z8-K" style="height: 0px; padding-bottom: 50%;">
                                                    <img class="BpkImage_bpk-image__img__2GKxn" src="//www.skyscanner.net/images/airlines/small/{{$flight['fcode']}}.png" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="LegInfo_legInfo__2UyXp">
                                            <div class="LegInfo_routePartialDepart__Ix_Rt">
                                                <span class="BpkText_bpk-text__2VouB BpkText_bpk-text--lg__1PdnC LegInfo_routePartialTime__ngmkT">
                                                    <div><span class="BpkText_bpk-text__2VouB BpkText_bpk-text--xl__HqAik">{{$flight['btakeoffT']}}</span></div>
                                                </span>
                                                <span class="BpkText_bpk-text__2VouB BpkText_bpk-text--base__3REoZ"><span class="BpkText_bpk-text__2VouB BpkText_bpk-text--base__3REoZ LegInfo_routePartialCityTooltip__Ao7U-">{{$flight['bfrom'][0]}}</span></span>
                                            </div>
                                            <div class="LegInfo_stopsContainer__2Larg">
                                                @php
                                                $timeee2 = ltrim($flight['btime'],'P');
                                                $timeeee2 = ltrim($timeee2,'T');
                                                $ttt2 = trim(strrev(chunk_split(strrev($timeeee2),3, ' ')));

                                                @endphp
                                                <span class="BpkText_bpk-text__2VouB BpkText_bpk-text--xs__1ycc8 Duration_duration__2Evn6">{{$ttt2}}</span>
                                                <div class="LegInfo_stopLine__3Zhmj">
                                                    <span class="LegInfo_stopDot__3pQwb"></span><span class="LegInfo_stopDot__3pQwb"></span>
                                                    <svg version="1.1" id="Layer_1" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 12 12" enable-background="new 0 0 12 12" xml:space="preserve" class="LegInfo_planeEnd__sWZ93">
                                                        <path fill="#898294" d="M3.922,12h0.499c0.181,0,0.349-0.093,0.444-0.247L7.949,6.8l3.233-0.019C11.625,6.791,11.989,6.44,12,6 c-0.012-0.44-0.375-0.792-0.818-0.781L7.949,5.2L4.866,0.246C4.77,0.093,4.602,0,4.421,0L3.922,0c-0.367,0-0.62,0.367-0.489,0.71 L5.149,5.2l-2.853,0L1.632,3.87c-0.084-0.167-0.25-0.277-0.436-0.288L0,3.509L1.097,6L0,8.491l1.196-0.073 C1.382,8.407,1.548,8.297,1.632,8.13L2.296,6.8h2.853l-1.716,4.49C3.302,11.633,3.555,12,3.922,12"></path>
                                                    </svg>
                                                </div>
                                                <div class="LegInfo_stopsLabelContainer__1S6VX">
                                                    <span class="BpkText_bpk-text__2VouB BpkText_bpk-text--xs__1ycc8 LegInfo_stopsLabelRed__33562">{{count($flight['bto'])-1}} stops</span>&nbsp;
                                                    <div>
                                                        @for ($i = 0; $i < count($flight['bto'])-1; $i++) <span class="BpkText_bpk-text__2VouB BpkText_bpk-text--xs__1ycc8 LegInfo_stopStation__1Xusz"><span class="BpkText_bpk-text__2VouB BpkText_bpk-text--xs__1ycc8">{{$flight['bto'][$i]}}</span></span>
                                                            @endfor
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="LegInfo_routePartialArrive__1fHVy">
                                                <span class="BpkText_bpk-text__2VouB BpkText_bpk-text--lg__1PdnC LegInfo_routePartialTime__ngmkT">
                                                    <div>
                                                        <div><span class="BpkText_bpk-text__2VouB BpkText_bpk-text--xl__HqAik">{{$flight['blandT']}}</span></div>
                                                    </div>
                                                </span>
                                                <span class="BpkText_bpk-text__2VouB BpkText_bpk-text--base__3REoZ"><span class="BpkText_bpk-text__2VouB BpkText_bpk-text--base__3REoZ LegInfo_routePartialCityTooltip__Ao7U-">{{$flight['bto'][count($flight['bto'])-1]}}</span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="BpkTicket_bpk-ticket__punchline__3RrZS BpkTicket_bpk-ticket__punchline--vertical-with-notches__X5A_h" role="presentation" aria-hidden="true">
                        <div class="BpkTicket_bpk-ticket__notch__1Lmml BpkTicket_bpk-ticket__notch--top__34E7T"></div>
                        <div class="BpkTicket_bpk-ticket__notch__1Lmml BpkTicket_bpk-ticket__notch--bottom__3jnt0"></div>
                    </div>
                    <div class="BpkTicket_bpk-ticket__paper__CB7Z5 BpkTicket_bpk-ticket__stub__1hhWH Ticket_stub__2xFvd BpkTicket_bpk-ticket__stub--padded__3Jd5L BpkTicket_bpk-ticket__stub--horizontal__19YlI BpkTicket_bpk-ticket__paper--with-notches__bPNdO">
                        <div class="TicketStub_horizontalStubContainer__3XTrJ">
                            <span class="BpkText_bpk-text__2VouB BpkText_bpk-text--xs__1ycc8 DealsFrom_dealsText__1Wrhc">Starting From</span>
                            <div class="">
                                <div class="Price_mainPriceContainer__3EbKF"><span class="BpkText_bpk-text__2VouB BpkText_bpk-text--lg__1PdnC BpkText_bpk-text--bold__NhE9P" id="flightPrice">€{{$flight['aprice']}}</span></div>
                            </div>
                            <span></span>
                            <form action="{{route('single-flight')}}" method='post'>
                                @csrf
                                <input type="hidden" name="data" value="{{json_encode($flight)}}">
                                <input type="hidden" name="orgdata" value="{{json_encode($orgdata[$count])}}">
                                <div class="btn-box text-center">
                                    <button type="submit" class="theme-btn theme-btn-small w-100">View Details</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    @php
    $count++;
    @endphp
    @endforeach

    @endif
</div><!-- end col-lg-8 -->
{{--@foreach($data as $flight)--}}
{{-- <div class="card-item flight-card flight--card card-item-list card-item-list-2">--}}
{{-- <div class="card-img">--}}
{{-- <img src="https://daisycon.io/images/airline/?iata={{$flight['fcode']}}" alt="flight-logo-img">--}}
{{-- </div>--}}
{{-- <div class="card-body">--}}
{{-- <div class="card-top-title d-flex justify-content-between">--}}
{{-- <div>--}}
{{-- <h3 class="card-title font-size-17">{{$flight['from'][0]}}</h3>--}}
{{-- <p class="card-meta font-size-14">{{$flight['type']}} flight</p>--}}
{{-- </div>--}}
{{-- <div>--}}
{{-- <div class="text-right">--}}
{{-- <span class="font-weight-regular font-size-14 d-block">Total Price:</span>--}}
{{-- <h6 class="font-weight-bold color-text">€{{$flight['price']}}</h6>--}}
{{-- <span class="font-weight-regular font-size-14 d-block">1 Adult Price:</span>--}}
{{-- <h6 class="font-weight-bold color-text" id="flightPrice">€{{$flight['aprice']}}</h6>--}}
{{-- </div>--}}
{{-- </div>--}}
{{-- </div><!-- end card-top-title -->--}}

{{-- <div class="flight-details py-3">--}}
{{-- <div class="flight-time pb-3">--}}
{{-- <div class="flight-time-item take-off d-flex">--}}
{{-- <div class="flex-shrink-0 mr-2">--}}
{{-- <i class="fas fa-plane-departure"></i>--}}
{{-- </div>--}}
{{-- <div>--}}
{{-- <h3 class="card-title font-size-15 font-weight-medium mb-0">Take off From {{$flight['from'][0]}}</h3>--}}
{{-- <p class="card-meta font-size-14">{{$flight['fromDate'][0]}}</p>--}}
{{-- </div>--}}
{{-- </div>--}}
{{-- <div class="flight-time-item landing d-flex">--}}
{{-- <div class="flex-shrink-0 mr-2">--}}
{{-- <i class="fas fa-plane-arrival"></i>--}}
{{-- </div>--}}
{{-- <div>--}}
{{-- <h3 class="card-title font-size-15 font-weight-medium mb-0">Landing to {{$flight['to'][count($flight['to'])-1]}}</h3>--}}
{{-- <p class="card-meta font-size-14">{{$flight['toDate'][count($flight['toDate'])-1]}}</p>--}}
{{-- </div>--}}
{{-- </div>--}}
{{-- </div><!-- end flight-time -->--}}
{{-- <p class="font-size-14 text-lg-center"><span class="color-text-2 mr-1"><strong>Total Stop:</strong></span>{{count($flight['to'])-1}}</p>--}}
{{-- <p class="font-size-14 text-lg-center"><span class="color-text-2 mr-1"><strong>Total Time:</strong></span>{{$flight['time']}}</p>--}}
{{-- </div><!-- end flight-details -->--}}
{{-- <form action="{{route('single-flight')}}" method='post'>--}}
{{-- @csrf--}}
{{-- <input type="hidden" name="data" value="{{json_encode($flight)}}" >--}}
{{-- <div class="btn-box text-center">--}}
{{-- <button type="submit"  class="theme-btn theme-btn-small w-100">View Details</button>--}}
{{-- </div>--}}
{{-- </form>--}}
{{-- </div><!-- end card-body -->--}}
{{-- </div><!-- end card-item -->--}}
{{--@endforeach--}}
{{--<div>--}}
{{-- <div class="EcoTicketWrapper_itineraryContainer__1_OU4" id="flimg{{$flight['fcode']}}" flight-price="{{$flight['aprice']}}">--}}
{{-- <div class="FlightsTicket_container__3FqKJ">--}}

{{-- <div role="button" class="BpkTicket_bpk-ticket__2zvVf BpkTicket_bpk-ticket--with-notches__1bqE0">--}}
{{-- <div class="BpkTicket_bpk-ticket__paper__CB7Z5 BpkTicket_bpk-ticket__main__2C0Rm BpkTicket_bpk-ticket__main--padded__1-hGc BpkTicket_bpk-ticket__main--horizontal__3Wdiw BpkTicket_bpk-ticket__paper--with-notches__bPNdO">--}}
{{-- <div class="FlightsTicketBody_container__32md1">--}}
{{-- <div class="UpperTicketBody_container__10DQ4">--}}
{{-- <div class="UpperTicketBody_legsContainer__35vIM">--}}
{{-- <div class="LegDetails_container__3uhle UpperTicketBody_leg__1P6mQ" aria-hidden="true">--}}
{{-- <div class="LogoImage_container__2Q2Ny LegLogo_logoContainer__1Zf8A UpperTicketBody_legLogo__1hiX0">--}}
{{-- <div class="LegLogo_legImage__1UtsM">--}}
{{-- <div class="BpkImage_bpk-image__2I7xR BpkImage_bpk-image--no-background__2z8-K" style="height: 0px; padding-bottom: 50%;">--}}
{{-- <img class="BpkImage_bpk-image__img__2GKxn" alt="PIA" src="//www.skyscanner.net/images/airlines/small/PK.png" />--}}
{{-- </div>--}}
{{-- </div>--}}
{{-- </div>--}}
{{-- <div class="LegInfo_legInfo__2UyXp">--}}
{{-- <div class="LegInfo_routePartialDepart__Ix_Rt">--}}
{{-- <span class="BpkText_bpk-text__2VouB BpkText_bpk-text--lg__1PdnC LegInfo_routePartialTime__ngmkT">--}}
{{-- <div><span class="BpkText_bpk-text__2VouB BpkText_bpk-text--xl__HqAik">08:00</span></div>--}}
{{-- </span>--}}
{{-- <span class="BpkText_bpk-text__2VouB BpkText_bpk-text--base__3REoZ"><span class="BpkText_bpk-text__2VouB BpkText_bpk-text--base__3REoZ LegInfo_routePartialCityTooltip__Ao7U-">KHI</span></span>--}}
{{-- </div>--}}
{{-- <div class="LegInfo_stopsContainer__2Larg">--}}
{{-- <span class="BpkText_bpk-text__2VouB BpkText_bpk-text--xs__1ycc8 Duration_duration__2Evn6">1h 45</span>--}}
{{-- <div class="LegInfo_stopLine__3Zhmj">--}}
{{-- <svg--}}
{{-- version="1.1"--}}
{{-- id="Layer_1"--}}
{{-- xmlns:xlink="http://www.w3.org/1999/xlink"--}}
{{-- x="0px"--}}
{{-- y="0px"--}}
{{-- viewBox="0 0 12 12"--}}
{{-- enable-background="new 0 0 12 12"--}}
{{-- xml:space="preserve"--}}
{{-- class="LegInfo_planeEnd__sWZ93"--}}
{{-- >--}}
{{-- <path--}}
{{-- fill="#898294"--}}
{{-- d="M3.922,12h0.499c0.181,0,0.349-0.093,0.444-0.247L7.949,6.8l3.233-0.019C11.625,6.791,11.989,6.44,12,6 c-0.012-0.44-0.375-0.792-0.818-0.781L7.949,5.2L4.866,0.246C4.77,0.093,4.602,0,4.421,0L3.922,0c-0.367,0-0.62,0.367-0.489,0.71 L5.149,5.2l-2.853,0L1.632,3.87c-0.084-0.167-0.25-0.277-0.436-0.288L0,3.509L1.097,6L0,8.491l1.196-0.073 C1.382,8.407,1.548,8.297,1.632,8.13L2.296,6.8h2.853l-1.716,4.49C3.302,11.633,3.555,12,3.922,12"--}}
{{-- ></path>--}}
{{-- </svg>--}}
{{-- </div>--}}
{{-- <div class="LegInfo_stopsLabelContainer__1S6VX">--}}
{{-- <span class="BpkText_bpk-text__2VouB BpkText_bpk-text--xs__1ycc8 LegInfo_stopsLabelGreen__1Y9h_">Direct</span>&nbsp;--}}
{{-- <div></div>--}}
{{-- </div>--}}
{{-- </div>--}}
{{-- <div class="LegInfo_routePartialArrive__1fHVy">--}}
{{-- <span class="BpkText_bpk-text__2VouB BpkText_bpk-text--lg__1PdnC LegInfo_routePartialTime__ngmkT">--}}
{{-- <div><span class="BpkText_bpk-text__2VouB BpkText_bpk-text--xl__HqAik">09:45</span></div>--}}
{{-- </span>--}}
{{-- <span class="BpkText_bpk-text__2VouB BpkText_bpk-text--base__3REoZ"><span class="BpkText_bpk-text__2VouB BpkText_bpk-text--base__3REoZ LegInfo_routePartialCityTooltip__Ao7U-">LHE</span></span>--}}
{{-- </div>--}}
{{-- </div>--}}
{{-- </div>--}}
{{-- <div class="LegDetails_container__3uhle UpperTicketBody_leg__1P6mQ" aria-hidden="true">--}}
{{-- <div class="LogoImage_container__2Q2Ny LegLogo_logoContainer__1Zf8A UpperTicketBody_legLogo__1hiX0">--}}
{{-- <div class="LegLogo_legImage__1UtsM">--}}
{{-- <div class="BpkImage_bpk-image__2I7xR BpkImage_bpk-image--no-background__2z8-K" style="height: 0px; padding-bottom: 50%;">--}}
{{-- <img class="BpkImage_bpk-image__img__2GKxn" alt="PIA" src="//www.skyscanner.net/images/airlines/small/PK.png" />--}}
{{-- </div>--}}
{{-- </div>--}}
{{-- </div>--}}
{{-- <div class="LegInfo_legInfo__2UyXp">--}}
{{-- <div class="LegInfo_routePartialDepart__Ix_Rt">--}}
{{-- <span class="BpkText_bpk-text__2VouB BpkText_bpk-text--lg__1PdnC LegInfo_routePartialTime__ngmkT">--}}
{{-- <div><span class="BpkText_bpk-text__2VouB BpkText_bpk-text--xl__HqAik">22:00</span></div>--}}
{{-- </span>--}}
{{-- <span class="BpkText_bpk-text__2VouB BpkText_bpk-text--base__3REoZ"><span class="BpkText_bpk-text__2VouB BpkText_bpk-text--base__3REoZ LegInfo_routePartialCityTooltip__Ao7U-">LHE</span></span>--}}
{{-- </div>--}}
{{-- <div class="LegInfo_stopsContainer__2Larg">--}}
{{-- <span class="BpkText_bpk-text__2VouB BpkText_bpk-text--xs__1ycc8 Duration_duration__2Evn6">1h 45</span>--}}
{{-- <div class="LegInfo_stopLine__3Zhmj">--}}
{{-- <svg--}}
{{-- version="1.1"--}}
{{-- id="Layer_1"--}}
{{-- xmlns:xlink="http://www.w3.org/1999/xlink"--}}
{{-- x="0px"--}}
{{-- y="0px"--}}
{{-- viewBox="0 0 12 12"--}}
{{-- enable-background="new 0 0 12 12"--}}
{{-- xml:space="preserve"--}}
{{-- class="LegInfo_planeEnd__sWZ93"--}}
{{-- >--}}
{{-- <path--}}
{{-- fill="#898294"--}}
{{-- d="M3.922,12h0.499c0.181,0,0.349-0.093,0.444-0.247L7.949,6.8l3.233-0.019C11.625,6.791,11.989,6.44,12,6 c-0.012-0.44-0.375-0.792-0.818-0.781L7.949,5.2L4.866,0.246C4.77,0.093,4.602,0,4.421,0L3.922,0c-0.367,0-0.62,0.367-0.489,0.71 L5.149,5.2l-2.853,0L1.632,3.87c-0.084-0.167-0.25-0.277-0.436-0.288L0,3.509L1.097,6L0,8.491l1.196-0.073 C1.382,8.407,1.548,8.297,1.632,8.13L2.296,6.8h2.853l-1.716,4.49C3.302,11.633,3.555,12,3.922,12"--}}
{{-- ></path>--}}
{{-- </svg>--}}
{{-- </div>--}}
{{-- <div class="LegInfo_stopsLabelContainer__1S6VX">--}}
{{-- <span class="BpkText_bpk-text__2VouB BpkText_bpk-text--xs__1ycc8 LegInfo_stopsLabelGreen__1Y9h_">Direct</span>&nbsp;--}}
{{-- <div></div>--}}
{{-- </div>--}}
{{-- </div>--}}
{{-- <div class="LegInfo_routePartialArrive__1fHVy">--}}
{{-- <span class="BpkText_bpk-text__2VouB BpkText_bpk-text--lg__1PdnC LegInfo_routePartialTime__ngmkT">--}}
{{-- <div><span class="BpkText_bpk-text__2VouB BpkText_bpk-text--xl__HqAik">23:45</span></div>--}}
{{-- </span>--}}
{{-- <span class="BpkText_bpk-text__2VouB BpkText_bpk-text--base__3REoZ"><span class="BpkText_bpk-text__2VouB BpkText_bpk-text--base__3REoZ LegInfo_routePartialCityTooltip__Ao7U-">KHI</span></span>--}}
{{-- </div>--}}
{{-- </div>--}}
{{-- </div>--}}
{{-- </div>--}}
{{-- </div>--}}
{{-- <div class="FlightsTicketBody_bodyHorizontalRule__1wA_I FlightsTicketBody_horizontalRule__2VR2x"></div>--}}
{{-- <div class="FlightsTicketBody_lowerBodyContainer__Y2dUU">--}}
{{-- <div class="FlightsTicketBody_placeholder__6OkAM"></div>--}}
{{-- <div class="SafetyScore_container__Y6w_g">--}}
{{-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" class="SafetyScore_safetyIcon__zQcLI" style="width: 1.125rem; height: 1.125rem;">--}}
{{-- <path--}}
{{-- d="M22.192 2.943a2.562 2.562 0 0 0-1.442-1.454 26.458 26.458 0 0 0-17.5 0 2.562 2.562 0 0 0-1.442 1.454A3.867 3.867 0 0 0 1.5 4.416v6.542a12.483 12.483 0 0 0 3.45 8.137 24.682 24.682 0 0 0 5.184 4.363 3.481 3.481 0 0 0 3.732 0 24.709 24.709 0 0 0 5.185-4.363 12.48 12.48 0 0 0 3.45-8.137V4.416a3.87 3.87 0 0 0-.309-1.473zM11.706 9.135a2.39 2.39 0 0 0-1.07 1.07l-.567 1.133a1.195 1.195 0 0 1-2.138 0l-.567-1.133a2.4 2.4 0 0 0-1.069-1.07l-1.134-.567a1.196 1.196 0 0 1 0-2.138l1.133-.567a2.391 2.391 0 0 0 1.07-1.07L7.93 3.66h.001a1.196 1.196 0 0 1 2.138 0l.567 1.133a2.391 2.391 0 0 0 1.07 1.07l1.133.567a1.196 1.196 0 0 1 0 2.138zm6.21 4.72a.797.797 0 0 1-.357.357l-.755.378a1.594 1.594 0 0 0-.713.713l-.378.755a.797.797 0 0 1-1.426 0l-.378-.755a1.594 1.594 0 0 0-.713-.713l-.755-.378a.797.797 0 0 1 0-1.426l.755-.378a1.587 1.587 0 0 0 .713-.713h.001l.377-.755a.797.797 0 0 1 1.426 0l.378.755a1.587 1.587 0 0 0 .713.713l.755.378a.797.797 0 0 1 .357 1.069z"--}}
{{-- ></path>--}}
{{-- </svg>--}}
{{-- &nbsp;<span class="BpkText_bpk-text__2VouB BpkText_bpk-text--xs__1ycc8 SafetyScore_text__20f4h">3/5 rating for COVID-19 safety measures</span>--}}
{{-- </div>--}}
{{-- </div>--}}
{{-- </div>--}}
{{-- </div>--}}
{{-- <div class="BpkTicket_bpk-ticket__punchline__3RrZS BpkTicket_bpk-ticket__punchline--vertical-with-notches__X5A_h" role="presentation" aria-hidden="true">--}}
{{-- <div class="BpkTicket_bpk-ticket__notch__1Lmml BpkTicket_bpk-ticket__notch--top__34E7T"></div>--}}
{{-- <div class="BpkTicket_bpk-ticket__notch__1Lmml BpkTicket_bpk-ticket__notch--bottom__3jnt0"></div>--}}
{{-- </div>--}}
{{-- <div--}}
{{-- class="BpkTicket_bpk-ticket__paper__CB7Z5 BpkTicket_bpk-ticket__stub__1hhWH Ticket_stub__2xFvd BpkTicket_bpk-ticket__stub--padded__3Jd5L BpkTicket_bpk-ticket__stub--horizontal__19YlI BpkTicket_bpk-ticket__paper--with-notches__bPNdO"--}}
{{-- >--}}
{{-- <div class="TicketStub_horizontalStubContainer__3XTrJ">--}}
{{-- <span class="BpkText_bpk-text__2VouB BpkText_bpk-text--xs__1ycc8 DealsFrom_dealsText__1Wrhc">4 deals from</span>--}}
{{-- <div class="">--}}
{{-- <div class="Price_mainPriceContainer__3EbKF"><span class="BpkText_bpk-text__2VouB BpkText_bpk-text--lg__1PdnC BpkText_bpk-text--bold__NhE9P">£61</span></div>--}}
{{-- </div>--}}
{{-- <span></span>--}}
{{-- <button type="button" class="BpkButtonBase_bpk-button__1Sw0Y TicketStub_ctaButton__7Xfvg">--}}
{{-- Select&nbsp;--}}
{{-- <span style="line-height: 1.125rem; display: inline-block; margin-top: 0.1875rem; vertical-align: top;">--}}
{{-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" class="BpkIcon_bpk-icon--rtl-support__2Hf3Z" fill="white" style="width: 1.125rem; height: 1.125rem;">--}}
{{-- <path fill-rule="evenodd" d="M2.69 12a1.5 1.5 0 0 0 1.5 1.5h11.379l-4.94 4.94a1.5 1.5 0 0 0 2.122 2.12L21.31 12l-8.56-8.56a1.5 1.5 0 0 0-2.122 2.12l4.94 4.94H4.19a1.5 1.5 0 0 0-1.5 1.5z"></path>--}}
{{-- </svg>--}}
{{-- </span>--}}
{{-- </button>--}}
{{-- </div>--}}
{{-- </div>--}}
{{-- </div>--}}
{{-- </div>--}}
{{-- </div>--}}
{{--</div>--}}