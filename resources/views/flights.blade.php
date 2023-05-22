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
                            <h2 class="sec__title text-white">Flight List</h2>
                        </div>
                    </div><!-- end breadcrumb-content -->
                </div><!-- end col-lg-6 -->
                <div class="col-lg-6">
                    <div class="breadcrumb-list text-right">
                        <ul class="list-items">
                            <li><a href="index.html">Home</a></li>
                            <li>Flight</li>
                            <li>Flight List</li>
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
                    <div class="card card-body">
                        @include('partials.flight-search')
                    </div><!-- end filter-bar -->
                </div><!-- end filter-wrap -->
            </div><!-- end col-lg-12 -->
            <div class="col-lg-12">
                <div class="filter-wrap margin-bottom-30px">
                    <div class="filter-bar d-flex align-items-center justify-content-between">
                        <div class="filter-bar-filter d-flex flex-wrap align-items-center">
                            <div>
                                <h3 class="title font-size-24">{{count($data)}} Flights found</h3>
                            </div>
                        </div><!-- end filter-bar-filter -->
                        <div class="select-contain">
                            <select class="select-contain-select">
                                <option value="1">Short by default</option>
                                <option value="2">Popular Flight</option>
                                <option value="3">Price: low to high</option>
                                <option value="4">Price: high to low</option>
                                <option value="5">A to Z</option>
                            </select>
                        </div><!-- end select-contain -->
                    </div><!-- end filter-bar -->
                </div><!-- end filter-wrap -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
        <div class="row">
            @include('partials.sidebar')
            @include('partials.result')
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end card-area -->
<!-- ================================
        END CARD AREA
    ================================= -->

@endsection
@section("scripts")
<script>
    function showHideSearchFlights() {
        var div = document.getElementById("showHideSearchFlights");
        if (div.style.display === "none") {
            div.style.display = "block";
        } else {
            div.style.display = "none";
        }
    }

    function showAllFlights() {
        var divs = document.querySelectorAll('div[id^="flimg"]');
        for (var i = 0; i < divs.length; i++) {
            divs[i].style.display = "block";
        }
    }

    function showOnlyThis(iata) {
        showAllFlights()
        console.log(iata);
        var divs = document.querySelectorAll('div[id^="flimg"]');
        console.log(divs);
        console.log("Looop start");
        console.log(divs.length);
        for (var i = 0; i < divs.length; i++) {
            console.log("in the loop");
            console.log(divs[i].id);
            if (divs[i].id === iata) {
                console.log("matched");
                // divs[i].style.display = "block";
            } else {
                console.log("not matched");
                divs[i].style.display = "none";
            }
        }
        console.log("Looop end");
    }

    function livePriceFilter() {
        showAllFlights()
        document.getElementById('filterByPriceFilter').value = document.getElementById('filterByPriceFilterSlide').value;
        var currentFilteredPrice = parseFloat(document.getElementById("filterByPriceFilterSlide").value);
        const elements = document.querySelectorAll('[flight-price]');
        elements.forEach((element) => {
            var price = parseFloat(element.getAttribute('flight-price'));
            if (currentFilteredPrice < price) {
                console.log(currentFilteredPrice);
                console.log(price);
                element.style.display = "none";
            } else {
                console.log(currentFilteredPrice);
                console.log(price);
                console.log("Less Then");
            }
        });
    }
</script>
@endsection