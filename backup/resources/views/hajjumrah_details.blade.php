@extends('main.app')

@section('content')
    <section class="breadcrumb-area bread-bg-6 py-0">
        <div class="breadcrumb-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-btn">
                            <a class="d-none" data-fancybox="gallery" data-src="images/destination-img2.jpg"
                               data-caption="Showing image - 02" data-speed="700"></a>
                            <a class="d-none" data-fancybox="gallery" data-src="images/destination-img3.jpg"
                               data-caption="Showing image - 03" data-speed="700"></a>
                            <a class="d-none" data-fancybox="gallery" data-src="images/destination-img4.jpg"
                               data-caption="Showing image - 04" data-speed="700"></a>
                        </div><!-- end breadcrumb-btn -->
                    </div><!-- end col-lg-12 -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end breadcrumb-wrap -->
    </section>

    

    <!-- ================================
        START TOUR DETAIL AREA
    ================================= -->
    <section class="tour-detail-area padding-bottom-90px">
        <div class="single-content-navbar-wrap menu section-bg" id="single-content-navbar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="single-content-nav" id="single-content-nav">
                            <ul>
                                <li><a data-scroll="description" href="#" class="scroll-link active">Package Details</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end single-content-navbar-wrap -->


        <div class="single-content-box">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="single-content-wrap padding-top-60px">
                            <div id="description" class="page-scroll">
                                <div class="single-content-item pb-4">
                                    <h3 class="title font-size-26">{{$flight->title}}</h3>
                                    <div class="d-flex align-items-center pt-2">
                                        <p class="mr-2"> {{$flight->way_of_flight}}</p>
                                        
                                    </div>
                                </div><!-- end single-content-item -->
                                <div class="section-block"></div>
                                <div class="single-content-item py-4">
                                    <div class="row">
                                      
                                       <div class="col-lg-12">
                                          <h4 class="title font-size-20">Description</h4>
                                                        <h2 class="font-size-15  font-weight-medium"><span class="font-size-13 d-inline-block ml-1 text-gray"></span>{{$flight->hajjumrah->description}}</h3>
                                                    
                                            </div><!-- end col-lg-12 -->
                                            
                                       
                                            
                                            <br>
                                            
                                            <div class="col-lg-4 col-sm-4">
                                                <div class="single-feature-titles text-center mb-3">
                                                    <i class="fas fa-plane-departure"></i>
                                                    <h3 class="title font-size-15 font-weight-medium">Package Start Date :  {{$flight->hajjumrah->start_date}}
                                                     </h3>
                                                    
                                                   
                                                    <span class="font-size-13"> </span>
                                                </div>
                                            </div><!-- end col-lg-4 -->
                                            <div class="col-lg-4 col-sm-4">
                                                <div class="single-feature-titles text-center mb-3">
                                                    <strong style="font-size: small;">Total Stay</strong><br>
                                                    <i class="fas fa-circle" style="color: Red;"></i>
                                                    <span class="font-size-13 mt-n2">{{$flight->hajjumrah->total_stay}}:Days</span>
                                                </div>
                                            </div><!-- end col-lg-4 -->
                                            <div class="col-lg-4 col-sm-4">
                                                <div class="single-feature-titles text-center mb-3">
                                                    <i class="fas fa-plane-arrival"></i>
                                                    <h3 class="title font-size-15 font-weight-medium">Package End Date : {{$flight->hajjumrah->end_date}}</h3>
                                                    <span class="font-size-13">{{$flight->date_of_flight}}  {{$flight->land_time}}</span>
                                                </div>
                                            </div><!-- end col-lg-4 -->
                                            <div class="col-lg-12">
                                                <div class="single-feature-titles border-bottom py-3 mb-4 row" >
                                                    <div class="col-lg-6 text-center">
                                                        <h3 class="font-size-15  font-weight-medium">Airline Going:<span class="font-size-13 d-inline-block ml-1 text-gray"></span>{{$flight->hajjumrah->airline_going}}</h3>
                                                    </div>
                                                    <div class="col-lg-6 text-center">
                                                        <h3 class="font-size-15 font-weight-medium">Airline Return:<span class="font-size-13 d-inline-block ml-1 text-gray"></span>{{$flight->hajjumrah->airline_return}}</h3>
                                                    </div>
                                                   
                                                </div>
                                            </div><!-- end col-lg-12 -->
                                            <br>
                                          <div class="col-lg-8">
                                          <h4 class="title font-size-20">Madina </h4>
                                                        <h2 class="font-size-15  font-weight-medium">Hotel : <span class="font-size-13 d-inline-block ml-1 text-gray"></span>{{$flight->hajjumrah->madina_hotel_name}}</h3>
                                                        <h2 class="font-size-15  font-weight-medium">Night Stay : <span class="font-size-13 d-inline-block ml-1 text-gray"></span>{{$flight->hajjumrah->madina_night_stay}}</h3>
                                                        <h2 class="font-size-15  font-weight-medium">Distance : <span class="font-size-13 d-inline-block ml-1 text-gray"></span>{{$flight->hajjumrah->madina_distance}}</h3>

                                            </div><!-- end col-lg-12 -->
                                            
                                               <div class="col-lg-4">
                                          <h4 class="title font-size-20">Makkah </h4>
                                                        <h2 class="font-size-15  font-weight-medium">Hotel : <span class="font-size-13 d-inline-block ml-1 text-gray"></span>{{$flight->hajjumrah->makkah_hotel_name}}</h3>
                                                        <h2 class="font-size-15  font-weight-medium">Night Stay : <span class="font-size-13 d-inline-block ml-1 text-gray"></span>{{$flight->hajjumrah->makkah_night_Stay}}</h3>
                                                        <h2 class="font-size-15  font-weight-medium">Distance : <span class="font-size-13 d-inline-block ml-1 text-gray"></span>{{$flight->hajjumrah->makkah_distance}}</h3>

                                            </div><!-- end col-lg-12 -->
                                            
                                        <div class="col-lg-12">
                                            <div class="single-feature-titles text-center border-top border-bottom py-3 mb-4">
                                                <!--<h3 class="title font-size-15 font-weight-medium">Total flight time:<span class="font-size-13 d-inline-block ml-1 text-gray"></span>{{$flight->duration}}</h3>-->
                                            </div>
                                        </div><!-- end col-lg-12 -->
                                        <div class="col-lg-4 responsive-column">
                                            <div class="single-tour-feature d-flex align-items-center mb-3">
                                                <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                    <i class="fas fa-plane"></i>
                                                </div>
                                                <div class="single-feature-titles">
                                                    <h3 class="title font-size-15 font-weight-medium">Adults</h3>
                                                    <span class="font-size-13">{{$flight->adults}}</span>
                                                </div>
                                            </div><!-- end single-tour-feature -->
                                        </div><!-- end col-lg-4 -->
                                         <div class="col-lg-4 responsive-column">
                                            <div class="single-tour-feature d-flex align-items-center mb-3">
                                                <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                    <i class="fas fa-plane"></i>
                                                </div>
                                                <div class="single-feature-titles">
                                                    <h3 class="title font-size-15 font-weight-medium">Childrens</h3>
                                                    <span class="font-size-13">{{$flight->childrens}}</span>
                                                </div>
                                            </div><!-- end single-tour-feature -->
                                        </div><!-- end col-lg-4 -->
                                        <div class="col-lg-4 responsive-column">
                                            <div class="single-tour-feature d-flex align-items-center mb-3">
                                                <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                    <i class="fas fa-plane"></i>
                                                </div>
                                                <div class="single-feature-titles">
                                                    <h3 class="title font-size-15 font-weight-medium">Infants</h3>
                                                    <span class="font-size-13">{{$flight->infants}}</span>
                                                </div>
                                            </div><!-- end single-tour-feature -->
                                        </div><!-- end col-lg-4 -->
                                        <div class="col-lg-4 responsive-column">
                                            <div class="single-tour-feature d-flex align-items-center mb-3">
                                                <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                    <i class="fas fa-plane"></i>
                                                </div>
                                                <div class="single-feature-titles">
                                                    <h3 class="title font-size-15 font-weight-medium">Pnr #</h3>
                                                    <span class="font-size-13">{{$flight->pnr_no}}</span>
                                                </div>
                                            </div><!-- end single-tour-feature -->
                                        </div><!-- end col-lg-4 -->
                                        <div class="col-lg-4 responsive-column">
                                            <div class="single-tour-feature d-flex align-items-center mb-3">
                                                <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                    <i class="fas fa-chair"></i>
                                                </div>
                                                <div class="single-feature-titles">
                                                    <h3 class="title font-size-15 font-weight-medium">Seats Left</h3>
                                                    <span class="font-size-13"> {{$flight->seats_left}}</span>
                                                </div>
                                            </div><!-- end single-tour-feature -->
                                        </div><!-- end col-lg-4 -->
                                        <div class="col-lg-4 responsive-column">
                                            <div class="single-tour-feature d-flex align-items-center mb-3">
                                                <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                    <i class="fas fa-suitcase-rolling"></i>
                                                </div>
                                                <div class="single-feature-titles">
                                                    <h3 class="title font-size-15 font-weight-medium">Adult Baggage</h3>
                                                    <span class="font-size-13">{{$flight->adult_baggage}}</span>
                                                </div>
                                            </div><!-- end single-tour-feature -->
                                        </div><!-- end col-lg-4 -->
                                        
                                        
                                        
                                        <div class="col-lg-3 responsive-column">
                                            <div class="single-tour-feature d-flex align-items-center mb-3">
                                                <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                    <i class="fas fa-hotel"></i>
                                                </div>
                                                <div class="single-feature-titles">
                                                    <h3 class="title font-size-15 font-weight-medium">Quadruple room</h3>
                                                    <span class="font-size-13">{{$flight->hajjumrah->chamber_room_price_4}}</span>
                                                </div>
                                            </div><!-- end single-tour-feature -->
                                        </div><!-- end col-lg-4 -->
                                        
                                        <div class="col-lg-3 responsive-column">
                                            <div class="single-tour-feature d-flex align-items-center mb-3">
                                                <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                    <i class="fas fa-hotel"></i>
                                                </div>
                                                <div class="single-feature-titles">
                                                    <h3 class="title font-size-15 font-weight-medium">Triple room</h3>
                                                    <span class="font-size-13">{{$flight->hajjumrah->chamber_room_price_3}}</span>
                                                </div>
                                            </div><!-- end single-tour-feature -->
                                        </div><!-- end col-lg-4 -->
                                        
                                        <div class="col-lg-3 responsive-column">
                                            <div class="single-tour-feature d-flex align-items-center mb-3">
                                                <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                    <i class="fas fa-hotel"></i>
                                                </div>
                                                <div class="single-feature-titles">
                                                    <h3 class="title font-size-15 font-weight-medium">Double Room</h3>
                                                    <span class="font-size-13">{{$flight->hajjumrah->chamber_room_price_2}}</span>
                                                </div>
                                            </div><!-- end single-tour-feature -->
                                        </div><!-- end col-lg-4 -->
                                        
                                        <div class="col-lg-3 responsive-column">
                                            <div class="single-tour-feature d-flex align-items-center mb-3">
                                                <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                    <i class="fas fa-hotel"></i>
                                                </div>
                                                <div class="single-feature-titles">
                                                    <h3 class="title font-size-15 font-weight-medium">Singl Room</h3>
                                                    <span class="font-size-13">{{$flight->hajjumrah->chamber_room_price_1}}</span>
                                                </div>
                                            </div><!-- end single-tour-feature -->
                                        </div><!-- end col-lg-4 -->
                                        
                                    </div><!-- end row -->
                                </div><!-- end single-content-item -->
                                <div class="section-block"></div>
                            </div><!-- end description -->
                        </div><!-- end single-content-wrap -->
                     
                           
                    
                    </div><!-- end col-lg-8 -->
                    <div class="col-lg-4">
                        <div class="sidebar single-content-sidebar mb-0">
                            <div class="sidebar-widget single-content-widget">
                                <div class="sidebar-widget-item">
                                    <div class="sidebar-book-title-wrap mb-3">
                                        <h3>Price From : {{$flight->hajjumrah->price_from}}</h3>
                                        <!--<p><span class="text-form">Price</span><span class="text-value ml-2 mr-1">{{$flight->price}}</span> <span class="before-price">{{$flight->price}}</span></p>-->
                                    </div>
                                </div><!-- end sidebar-widget-item -->
                                <div class="sidebar-widget-item">
                                    <div class="contact-form-action">
                                        <!--<form action="#">-->
                                        <!--    <div class="input-box">-->
                                        <!--        <label class="label-text"><h5>Date</h5></label>-->
                                        <!--        <div class="form-group">-->
                                        <!--            <i class="fas fa-calendar-week form-icon"></i>-->
                                        <!--            <input class="form-control" type="text" value="{{$flight->date_of_flight}}"  readonly>-->
                                        <!--        </div>-->
                                        <!--    </div>-->
                                        <!--</form>-->
                                    </div>
                                </div><!-- end sidebar-widget-item -->
                                <div class="sidebar-widget-item">
                                    <div class="qty-box mb-2 d-flex align-items-center justify-content-between">
                                        <label class="font-size-16">Adults <span>Age 18+</span></label>
                                        <div class="qtyBtn d-flex align-items-center">
                                            <p></p>
                                        </div>
                                    </div><!-- end qty-box -->
                                    <div class="qty-box mb-2 d-flex align-items-center justify-content-between">
                                        <label class="font-size-16">Children <span>2-12 years old</span></label>
                                        <div class="qtyBtn d-flex align-items-center">
                                            <p></p>
                                        </div>
                                    </div><!-- end qty-box -->
                                    <div class="qty-box mb-2 d-flex align-items-center justify-content-between">
                                        <label class="font-size-16">Infants <span>0-2 years old</span></label>
                                        <div class="qtyBtn d-flex align-items-center">
                                            <p></p>
                                        </div>
                                    </div><!-- end qty-box -->
                                </div><!-- end sidebar-widget-item -->
                                <form action="{{route('hajjumrah_form')}}" method='post'>
                                    @csrf
                                    <input type="hidden" value = "{{$flight->id}}" name="id"/>
                                    <div class="input-box">
                                       
                                       
                                    </div>
                                    <div class="btn-box pt-2">
                                        <input type="hidden" name="data" value="" >
                                        <div class="btn-box text-center">
                                            <button type="submit"  class="theme-btn theme-btn-small w-100"><i class="fas fa-shopping-cart"></i> Reserve Now</button>
                                        </div>
                                    </div>
                                </form>
                            </div><!-- end sidebar-widget -->
                        </div><!-- end sidebar -->
                    </div><!-- end col-lg-4 -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end single-content-box -->



    </section><!-- end tour-detail-area -->
    <!-- ================================
        END TOUR DETAIL AREA
    ================================= -->

@endsection
