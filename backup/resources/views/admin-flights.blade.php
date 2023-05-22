@extends('main.app')

@section('content')
    @php

        $flights = App\Models\flightpackage::all();

    @endphp
    </br>
    {{-- <div class="container">
        <div class="row">
            @foreach ($flights as $flight)

                <div class="col-12 col-sm-8 col-md-6 col-lg-4">
                    <div class="card">

                        <a href="{{ route('viewpackages', $flight->id) }}">
                            <img class="card-img" src="{{ asset('images/packages/' . $flight->image) }}" alt="hotel-img">
                        </a>

                        <div class="card-body">
                            <h4 class="card-title">{{ $flight->title }}</h4>
                            <h6 class="card-subtitle mb-2 text-muted">Airline: {{ $flight->airline }}</h6>
                            <h6 class="card-subtitle mb-2 text-muted">Date Flight: {{ $flight->date_of_flight }}</h6>
                            <h6 class="card-subtitle mb-2 text-muted">Flight Type: {{ $flight->flight_type }}</h6>

                            <div class="buy d-flex justify-content-between align-items-center">
                                <div class="price text-success">
                                    <h5 class="mt-4">${{ $flight->price }}</h5>
                                </div>


                            </div>

                            <a href="{{ route('viewpackages', $flight->id) }}" style="align:right;"
                                class="btn btn-info btn-block mt-3"><i class="fas fa-shopping-cart"></i> Book Now</a>




                        </div>
                    </div>
                </div>

            @endforeach
        </div>
    </div> --}}
    <!-- ================================
        START TRENDING AREA
    ================================= -->
    <section class="trending-area position-relative section-bg section-padding ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading text-center">
                        <h2 class="sec__title">OUR FLIGHTS</h2>
                    </div><!-- end section-heading -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
            <div class="row padding-top-50px">
                @foreach ($flights as $flight)
                    <div class="col-lg-4 padding-bottom-50px">

                        <div class="card-item trending-card mb-0">
                            <div class="card-img">
                                <a href="{{ route('viewpackages', $flight->id) }}" class="d-block" style="object-fit: cover; height:300px;">
                                    <img src="{{ asset('images/packages/' . $flight->image) }}" alt="hotel-img" >
                                </a>
                            </div>
                            <div class="card-body">
                                <h3 class="card-title">{{ $flight->title }}</h3>
                                <p class="card-meta">Airline: {{ $flight->airline }}</p>
                                <p class="card-meta">Date Flight: {{ $flight->date_of_flight }}</p>
                                <p class="card-meta">Flight Type: {{ $flight->flight_type }}</p>

                                <div class="card-price d-flex align-items-center justify-content-between">
                                    <p>
                                        <span class="price__num">${{ $flight->price }}</span>
                                    </p>

                                </div>
                                <a href="{{ route('viewpackages', $flight->id) }}" style="text-align:center; "
                                    class="theme-btn btn-block mt-3"><i class="fas fa-shopping-cart"></i> Book Now</a>
                            </div>
                        </div><!-- end card-item -->

                    </div>
                    @endforeach
            </div><!-- end col-lg-12 -->
            <!-- end row -->
        </div><!-- end container -->
        <svg class="hero-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 10" preserveAspectRatio="none">
            <path d="M0 10 0 0 A 90 59, 0, 0, 0, 100 0 L 100 10 Z"></path>
        </svg>
    </section><!-- end trending-area -->
    <!-- ================================
        END TRENDING AREA
    ================================= -->
@endsection
