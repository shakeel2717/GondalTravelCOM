
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
    START PAYMENT AREA
================================= -->
    <section class="payment-area section-bg section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-box payment-received-wrap mb-0">
                        <div class="form-title-wrap">
                            <div class="step-bar-wrap text-center">
                                <ul class="step-bar-list d-flex align-items-center justify-content-around">
                                    <li class="step-bar flex-grow-1 step-bar-active">
                                        <span class="icon-element"></span>
                                        <p class="pt-2 color-text-2">Your Booking & Payment Details</p>
                                    </li>
                                    <li class="step-bar flex-grow-1 step-bar-active">
                                        <span class="icon-element"></span>
                                        <p class="pt-2 color-text-2">Booking Completed!</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="form-content">
                            <div class="payment-received-list">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-check icon-element flex-shrink-0 mr-3 ml-0"></i>
                                    <div>
                                        <h3 class="title pb-1">Thanks {{$name}}!</h3>
                                        <h3 class="title">Your booking is confirmed.</h3>
                                    </div>
                                </div>
                                <ul class="list-items list-items-3 list-items-4 py-4">
                                    <li><span class="text-black font-weight-bold">Your PNR Number is: </span></li><h1>
                                    {{$pnr}}</h1>
                                </ul>
                                <ul class="list-items list-items-3 list-items-4 py-4">
                                    <li><span class="text-black font-weight-bold">Your Total Ammount</span>€{{$total}}</li>
                                </ul>
                                <ul class="list-items py-4">
                                    <li><i class="fas fa-check text-success"></i> You Will receive you ticket Via Email at
                                        {{$email}}</li>
                                    <li><i class="fas fa-check text-success"></i> Your <strong class="text-black">payment</strong> will be handled by Gondal Travels, the <strong class="color-text-2">'Payment'</strong> section below has more details</li>
                                    <li><i class="fas fa-check text-success"></i> Make changes to your booking or ask the properly a question in just a few clicks</li>
                                </ul>

                                <h3 class="title"><a href="#" class="text-black">For More Information Contact:</a></h3>
                                <br>
                                <h4 class="title"><a href="#" class="text-black">Gondal Travels</a></h4>
                                <!--<p>New York City, NY, USA</p>-->
                                {{--                                <p class="py-1"><a href="#" class="text-color">Click for directions on Google maps <i class="la la-arrow-right"></i></a></p>--}}
                                <p><strong class="text-black mr-1">Phone:</strong>+33 7 67 77 59 22</p>
                                <p><strong class="text-black mr-1">Email:</strong>infosupport@gondaltravel.com</p>
                                <br>
                                <div class="btn-box pb-4">
                                    <a href="{{route('ItineraryMulti', $pnr)}}" class="theme-btn mb-2 mr-2"> Download Receipt</a>
                                    <a href="{{route('contact')}}" class="theme-btn border-0 text-white bg-7">Cancel your booking</a>
                                </div>

                            </div><!-- end card-item -->
                        </div>
                    </div><!-- end payment-card -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
    <!-- ================================
        END PAYMENT AREA
    ================================= -->
    @if(empty(session()->get('flight')))
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
        <section class="tour-detail-area padding-bottom-90px">
            <br>
            <div class="container">
                <p class="text-center">You Already printed pdf</p>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="btn-box mt-3 text-center">
                        <a href="{{route('index')}}" class="theme-btn"><i class="fa fa-refresh mr-1"></i>Go Back</a>
                    </div><!-- end btn-box -->
                </div><!-- end col-lg-12 -->
            </div>
            <br>
        </section>
    @else

        <section class="tour-detail-area padding-bottom-90px">
            <div class="single-content-navbar-wrap menu section-bg" id="single-content-navbar">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="single-content-nav" id="single-content-nav">
                                <ul>
                                    <li><a data-scroll="description" href="#description" class="scroll-link active">Your Booked Flight
                                            Details</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end single-content-navbar-wrap -->
            <div class="single-content-box">
                <div class="container">
                    <br>
                    <p class="">Ticket booked by non-registered users will be considered guest booking and will expire in 2 hours and you won't be able to re-ticket.Please print this ticket before it disappears !
                        (Registered users can see their history of tickets)
                    </p>
                    <br>
                    <div class="row">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Type</th>
                                <th scope="col">Id</th>
                                <th scope="col">PRN-NO</th>
                                <th scope="col">Title</th>
                                <th scope="col">Location</th>
                                <th scope="col">Order Date</th>
                                <th scope="col">Departure Date</th>
                                <th scope="col">Price</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @php
                                $ses = session()->get('flight');
                            @endphp
                            <tr>
                                <th scope="row"><i class="fa fa-plane mr-1 font-size-18"></i>Flight</th>
                                <th scope="row">{{$ses['id']}}</th>
                                <th scope="row">{{$ses['prn_no']}}</th>
                                <td>
                                    <p class="title">{{$ses->from}}
                                        to {{$ses->to}}</p>
                                </td>
                                <td>{{$ses->user->country ?? "Booked By Guest"}}/ {{$ses->user->city ?? "Booked By Guest"}}</td>
                                <td>{{$ses->created_at->format('Y-D-M')}}</td>
                                <td>{{str_replace('T','  ',$ses->departure)}}</td>
                                <td>$ {{$ses->amount}}</td>
                                <td>
                                    <div class="table-content">
                                        <div style="display: flex">
                                            <form action="{{route('ticket.pdf')}}"
                                                  method="get">
                                                @csrf
                                                <input type="hidden" name="ticket_id"
                                                       value="{{$ses->id}}">
                                                <button type="submit"
                                                        class="theme-btn theme-btn-small mr-3">Pdf
                                                </button>
                                            </form>
                                            <form action="{{route('flight.cancel')}}" method="POST">
                                                @csrf
                                                <input type="hidden" name="ticket_id"
                                                       value="{{$ses->id}}">
                                                <button type="submit"
                                                        class="theme-btn theme-btn-small">Cancel
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>

                            </tr>
                            </tbody>
                        </table>
                    </div><!-- end row -->
                </div><!-- end container -->
                <br>
            </div>
        </section>
    @endif


@endsection
