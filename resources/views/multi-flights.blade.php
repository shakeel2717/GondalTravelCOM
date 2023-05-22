@extends('main.app')
@section('content')
    <!-- ================================
            START BREADCRUMB AREA
        ================================= -->
    <section class="breadcrumb-area bread-bg-6">
        <div class="breadcrumb-wrap">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="breadcrumb-content">
                            <div class="section-heading">
                                <h2 class="sec__title text-white">Multi Destination Flight List</h2>
                            </div>
                        </div><!-- end breadcrumb-content -->
                    </div><!-- end col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="breadcrumb-list text-right">
                            <ul class="list-items">
                                <li><a href="index.html">Home</a></li>
                                <li>Flight</li>
                                <li>Multi Destination Flight List</li>
                            </ul>
                        </div><!-- end breadcrumb-list -->
                    </div><!-- end col-lg-6 -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end breadcrumb-wrap -->
        <div class="bread-svg-box">
            <svg class="bread-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 10" preserveAspectRatio="none">
                <polygon points="100 0 50 10 0 0 0 10 100 10"></polygon>
            </svg>
        </div><!-- end bread-svg -->
    </section><!-- end breadcrumb-area -->
    <!-- ================================
                END BREADCRUMB AREA
            ================================= -->
    <!-- ================================
            START CARD AREA
        ================================= -->
    <section class="card-area section--padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="filter-wrap margin-bottom-30px">
                        <div class="filter-bar align-items-center justify-content-between">
                            <div class="row">
                                <div class="col-lg-3 my-auto">
                                    <div class="filter-bar-filter align-items-center">
                                        <div>
                                            <h3 class="title font-size-24">{{ count($data) }} Flights found</h3>
                                            <h6>{{$passenger}} Passenger</h6>
                                            {{-- {{dd(count($data['data']))  }} --}}
                                        </div>
                                    </div><!-- end filter-bar-filter -->
                                </div>
                                @foreach ( $places as $locations)
                                <div class="col-lg-3 my-auto">
                                    <div class="select-contain">
                                        <div class="single-content-item pb-4">
                                            <table>
                                                <tr>
                                                    <td><b>From:</b> {{ $locations['startLocation'] }} </td>
                                                    <td><b>To:</b> {{ $locations['endLocation'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2"><b> Departure:</b>
                                                        {{ $places[0]['FlightDateTime']['date'] }}</td>
                                                </tr>

                                            </table>

                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div><!-- end filter-bar -->
                    </div><!-- end filter-wrap -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
            <div class="row">
                @include('partials.results-multi')
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end card-area -->
    <!-- ================================
                END CARD AREA
            ================================= -->
@endsection
