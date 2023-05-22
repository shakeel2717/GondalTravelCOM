@if (count($data) != 0)
    <div class="col-lg-12">
        @foreach ($data as $flight)
            {{-- {{ dd($orgdata) }} --}}
            {{-- {{ dd($flight['orignal_data']) }} --}}
            {{-- {{ dd($flight) }} --}}
            <div>
                <div class="EcoTicketWrapper_itineraryContainer__1_OU4">
                    <div class="FlightsTicket_container__3FqKJ">
                        <div role="button"
                             class="BpkTicket_bpk-ticket__2zvVf BpkTicket_bpk-ticket--with-notches__1bqE0">
                            <div
                                class="BpkTicket_bpk-ticket__paper__CB7Z5 BpkTicket_bpk-ticket__main__2C0Rm BpkTicket_bpk-ticket__main--padded__1-hGc BpkTicket_bpk-ticket__main--horizontal__3Wdiw BpkTicket_bpk-ticket__paper--with-notches__bPNdO">
                                <div class="FlightsTicketBody_container__32md1">
                                    <div class="UpperTicketBody_container__10DQ4">
                                        <div class="UpperTicketBody_legsContainer__35vIM">
                                            @foreach ($flight['flight'] as $multi_flight)
                                                <div class="LegDetails_container__3uhle UpperTicketBody_leg__1P6mQ"
                                                     aria-hidden="true">

                                                    <div class="LegInfo_legInfo__2UyXp">
                                                        <div class="LegInfo_routePartialDepart__Ix_Rt">
                                            <span
                                                class="BpkText_bpk-text__2VouB BpkText_bpk-text--lg__1PdnC LegInfo_routePartialTime__ngmkT">
                                                <div><span
                                                        class="BpkText_bpk-text__2VouB BpkText_bpk-text--xl__HqAik">{{ $multi_flight['startlocation'] }}</span></div>
                                            </span>
                                                            <span
                                                                class="BpkText_bpk-text__2VouB BpkText_bpk-text--base__3REoZ"><span
                                                                    class="BpkText_bpk-text__2VouB BpkText_bpk-text--base__3REoZ LegInfo_routePartialCityTooltip__Ao7U-">{{ $multi_flight['startTime'] }}</span></span>
                                                        </div>
                                                        <div class="LegInfo_stopsContainer__2Larg">
                                                            @if ($multi_flight['stay']>0)
                                                                @php
                                                                    $tim = ltrim($multi_flight['time'],'P');
                                                                    $tim2 = ltrim($tim,'T');
                                                                    $tt =  trim(strrev(chunk_split(strrev($tim2),3, ' ')));

                                                                @endphp
                                                                <span
                                                                    class="BpkText_bpk-text__2VouB BpkText_bpk-text--xs__1ycc8 Duration_duration__2Evn6">{{$tt}}</span>
                                                            @else
                                                                <span
                                                                    class="BpkText_bpk-text__2VouB BpkText_bpk-text--xs__1ycc8 Duration_duration__2Evn6">Direct</span>
                                                            @endif
                                                            <div class="LegInfo_stopLine__3Zhmj">
                                                                @if ($multi_flight['stay']>0)
                                                                    @foreach ($multi_flight['stayNames']['stayPlace'] as $stays)
                                                                        <span class="LegInfo_stopDot__3pQwb"></span>
                                                                    @endforeach
                                                                @endif
                                                                <svg
                                                                    version="1.1"
                                                                    id="Layer_1"
                                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                    x="0px"
                                                                    y="0px"
                                                                    viewBox="0 0 12 12"
                                                                    enable-background="new 0 0 12 12"
                                                                    xml:space="preserve"
                                                                    class="LegInfo_planeEnd__sWZ93"
                                                                >
                                                    <path
                                                        fill="#898294"
                                                        d="M3.922,12h0.499c0.181,0,0.349-0.093,0.444-0.247L7.949,6.8l3.233-0.019C11.625,6.791,11.989,6.44,12,6 c-0.012-0.44-0.375-0.792-0.818-0.781L7.949,5.2L4.866,0.246C4.77,0.093,4.602,0,4.421,0L3.922,0c-0.367,0-0.62,0.367-0.489,0.71 L5.149,5.2l-2.853,0L1.632,3.87c-0.084-0.167-0.25-0.277-0.436-0.288L0,3.509L1.097,6L0,8.491l1.196-0.073 C1.382,8.407,1.548,8.297,1.632,8.13L2.296,6.8h2.853l-1.716,4.49C3.302,11.633,3.555,12,3.922,12"
                                                    ></path>
                                                </svg>
                                                            </div>
                                                            @if ($multi_flight['stay']>0)
                                                                <div class="LegInfo_stopsLabelContainer__1S6VX">
                                                                    <span
                                                                        class="BpkText_bpk-text__2VouB BpkText_bpk-text--xs__1ycc8 LegInfo_stopsLabelRed__33562">{{ $multi_flight['stay'] }} stay</span>&nbsp;
                                                                    <div>
                                                        <span
                                                            class="BpkText_bpk-text__2VouB BpkText_bpk-text--xs__1ycc8 LegInfo_stopStation__1Xusz">
                                                            @if ($multi_flight['stay']>0)
                                                                @foreach ($multi_flight['stayNames']['stayPlace'] as $stays)
                                                                    <span
                                                                        class="BpkText_bpk-text__2VouB BpkText_bpk-text--xs__1ycc8">
                                                                {{ $stays }}
                                                              </span>
                                                                @endforeach
                                                            @endif
                                                        </span>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                            <p class="number_of_seats">
                                                                {{ $flight['number_of_bookable_seats'] }} Places |
                                                                @if(isset($flight['bags']))
                                                                    <svg-icon _ngcontent-kiy-c179=""
                                                                              tooltipposition="top"
                                                                              class="p-element help withBag">
                                                                        <svg width="14" height="11" viewBox="0 0 14 11"
                                                                             fill="none"
                                                                             xmlns="http://www.w3.org/2000/svg"
                                                                             _ngcontent-kiy-c179="" aria-hidden="true">
                                                                            <path
                                                                                d="M9.51675 1.81639V2.31639H10.0168H12.1118C12.7324 2.31639 13.183 2.7829 13.183 3.29414V9.03579C13.183 9.54703 12.7324 10.0135 12.1118 10.0135H1.57125C0.950589 10.0135 0.5 9.54703 0.5 9.03579V3.29414C0.5 2.7829 0.950589 2.31639 1.57125 2.31639H3.66626H4.16626V1.81639V1.10831C4.16626 0.942162 4.24341 0.779992 4.37744 0.664932V1.13909V1.81639V2.31639H4.87744H8.82194H9.32194V1.81639V1.13909V0.679476C9.44586 0.793439 9.51675 0.949047 9.51675 1.10831V1.81639ZM4.87744 0.639095H4.40955C4.52303 0.553596 4.67148 0.5 4.8447 0.5H8.83831C9.01153 0.5 9.15998 0.553596 9.27346 0.639095H8.82194H4.87744Z"
                                                                                stroke="#33CC66"
                                                                                _ngcontent-kiy-c179=""></path>
                                                                        </svg>
                                                                    </svg-icon>
                                                                {{$flight['bags']}}
                                                                @endif
                                                            </p>
                                                        </div>
                                                        <div class="LegInfo_routePartialArrive__1fHVy">
                                            <span
                                                class="BpkText_bpk-text__2VouB BpkText_bpk-text--lg__1PdnC LegInfo_routePartialTime__ngmkT">
                                                <div>
                                                <div><span
                                                        class="BpkText_bpk-text__2VouB BpkText_bpk-text--xl__HqAik">{{ $multi_flight['endlocation'] }}</span></div>
                                                </div>
                                            </span>
                                                            <span
                                                                class="BpkText_bpk-text__2VouB BpkText_bpk-text--base__3REoZ"><span
                                                                    class="BpkText_bpk-text__2VouB BpkText_bpk-text--base__3REoZ LegInfo_routePartialCityTooltip__Ao7U-">{{ $multi_flight['endTime'] }}</span></span>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="LogoImage_container__2Q2Ny LegLogo_logoContainer__1Zf8A UpperTicketBody_legLogo__1hiX0">
                                                        <div class="LegLogo_legImage__1UtsM mx-auto">
                                                            <div
                                                                class="BpkImage_bpk-image__2I7xR BpkImage_bpk-image--no-background__2z8-K"
                                                                style="height: 0px; padding-bottom: 50%;">
                                                                <img class="BpkImage_bpk-image__img__2GKxn"
                                                                     src="//www.skyscanner.net/images/airlines/small/{{$multi_flight['code']}}.png"/>
                                                            </div>
                                                            <p class="flight-class-name">
                                                                Class: {{ $flight['class'] ?? ''}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="BpkTicket_bpk-ticket__punchline__3RrZS BpkTicket_bpk-ticket__punchline--vertical-with-notches__X5A_h"
                                role="presentation" aria-hidden="true">
                                <div
                                    class="BpkTicket_bpk-ticket__notch__1Lmml BpkTicket_bpk-ticket__notch--top__34E7T"></div>
                                <div
                                    class="BpkTicket_bpk-ticket__notch__1Lmml BpkTicket_bpk-ticket__notch--bottom__3jnt0"></div>
                            </div>
                            <div
                                class="BpkTicket_bpk-ticket__paper__CB7Z5 BpkTicket_bpk-ticket__stub__1hhWH Ticket_stub__2xFvd BpkTicket_bpk-ticket__stub--padded__3Jd5L BpkTicket_bpk-ticket__stub--horizontal__19YlI BpkTicket_bpk-ticket__paper--with-notches__bPNdO"
                            >
                                <div class="TicketStub_horizontalStubContainer__3XTrJ">
                                    <span
                                        class="BpkText_bpk-text__2VouB BpkText_bpk-text--xs__1ycc8 DealsFrom_dealsText__1Wrhc">Starting From</span>
                                    <div class="">
                                        <div class="Price_mainPriceContainer__3EbKF"><span
                                                class="BpkText_bpk-text__2VouB BpkText_bpk-text--lg__1PdnC BpkText_bpk-text--bold__NhE9P">€{{$flight['price']}}</span>
                                        </div>
                                    </div>
                                    <span></span>
                                    <form action="{{ route('multi-flight') }}" method='post'>
                                        @csrf
                                        <input type="hidden" name="data" value="{{json_encode($flight)}}">
                                        <input type="hidden" name="orgdata"
                                               value="{{json_encode($flight['orignal_data'])}}">
                                        <input type="hidden" name="airline" value="{{json_encode($airline)}}">
                                        <input type="hidden" name="aircraft" value="{{json_encode($aircraft)}}">
                                        <div class="btn-box text-center">
                                            <button type="submit" class="theme-btn theme-btn-small w-100">View Details
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@else
    <div class="col-lg-8">
        <p class="alert-danger text-center">No Result Found</p>
    </div>
@endif

{{-- {{ die('test') }} --}}
