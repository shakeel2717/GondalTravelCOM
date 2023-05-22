@extends('main.app')


@section('content')
<!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">-->


    <!-- ================================
    START HERO-WRAPPER AREA
================================= -->
    <section class="hero-wrapper fade-in-up">
        @include('partials.alerts')
        <div class="hero-box hero-bg-6">
            @include('partials.search',['isArray' => false])
            <svg class="hero-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 10" preserveAspectRatio="none">
                <path d="M0 10 0 0 A 90 59, 0, 0, 0, 100 0 L 100 10 Z"></path>
            </svg>
        </div>
    </section><!-- end hero-wrapper -->
    <!-- ================================
        END HERO-WRAPPER AREA
    ================================= -->

  


<!--HAJJ UMRAH START -->

  <section class="hotel-area section-bg  padding-top-70px  padding-bottom-80px overflow-hidden padding-right-100px padding-left-100px reveal ">
        <div class="container-fluid">
            <div class="section-heading text-center">
                        <h2 class="sec__title line-height-55">Hajj & Umrah Packages</h2>
                    </div><!-- end section-heading -->
                 
   <div id="carouselExampleIndicators" style="" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    @foreach($flights2 as $key => $flight2)
      <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}"></li>
    @endforeach
  </ol>
  <div class="carousel-inner">
    @foreach($flights2 as $key => $flight2)
      <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
        <a href="{{ route('hajj_umrah_listing') }}">
          <img class="d-block w-100" src="{{ $flight2->image }}" style="height:400px;" alt="Slide {{ $key }}">
        </a>
        <div class="carousel-caption">
          <button class="theme-btn theme-btn-large m-2" type="submit">Reserve</button>
        </div>
      </div>
    @endforeach
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
           
        </div><!-- end container-fluid -->
    </section><!-- end hotel-area -->

<!--HAJJ UMRAH END-->
    <!-- ================================
       START HOTEL AREA
   ================================= -->
    <section class="hotel-area section-bg  padding-top-70px  padding-bottom-80px overflow-hidden padding-right-100px padding-left-100px reveal ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading text-center">
                        <h2 class="sec__title line-height-55">Most Popular Destination</h2>
                    </div><!-- end section-heading -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
            <div class="row padding-top-50px">
                <div class="col-lg-12">
                    <div class="hotel-card-wrap">
                        <div class="hotel-card-carousel carousel-action">
                            @foreach($flights as $flight)
                                <div class="card-item mb-0">
                                    <div class="card-img">
                                        <a href="{{route('viewpackages', $flight->id)}}" class="d-block">
                                            <img src="{{ asset($flight->image)}}" alt="hotel-img">
                                        </a>
                                        <span class="badge">{{__('lang.best_seller')}}</span>
                                        <div class="add-to-wishlist icon-element" data-toggle="tooltip"
                                             data-placement="top" title="Bookmark">
                                            <i class="la la-heart-o"></i>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h3 class="card-title"><a
                                                href="{{route('viewpackages', $flight->id)}}">{{$flight->title}}</a>
                                        </h3>
                                        <p class="card-meta"></p>
                                        <!--<div class="card-rating">-->
                                        <!--    <span class="badge text-white">4.4/5</span>-->
                                        <!--    <span class="review__text">{{__('lang.average')}}</span>-->
                                        <!--    <span class="rating__text">(30 {{__('lang.reviews')}})</span>-->
                                        <!--</div>-->
                                        <div class="card-price d-flex align-items-center justify-content-between">
                                            <p>
                                                <span class="price__from">{{__('lang.from')}}</span>
                                                <span class="price__num">{{$flight->price}}</span>
                                                <span class="price__text">{{__('lang.per_night')}}</span>
                                            </p>
                                            <a href="{{route('viewpackages', $flight->id)}}"
                                               class="btn-text">{{__('lang.see_details')}}<i
                                                    class="la la-angle-right"></i></a>
                                        </div>
                                    </div>
                                </div><!-- end card-item -->
                            @endforeach
                        </div><!-- end hotel-card-carousel -->
                    </div>
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container-fluid -->
    </section><!-- end hotel-area -->
    <!-- ================================
        END HOTEL AREA
    ================================= -->

    <!-- ================================
        START ABOUT AREA
    ================================= -->
    <section class="about-area padding-bottom-80px  padding-top-80px overflow-hidden reveal">
        <div class="container ">
            <div class="row ">
                <div class="col-lg-5 ml-auto" style="margin-bottom:50px;">
                    <div class="image-box about-img-box">
                        <img src="images/img24.jpg" alt="about-img" class="img__item img__item-1">
                        <img src="images/img25.jpg" alt="about-img" class="img__item img__item-2">
                    </div>
                </div><!-- end col-lg-5 -->
                <div class="col-lg-6 ml-auto mt-100">
                    <div class="section-heading margin-bottom-40px">
                        <h2 class="sec__title">{{__('lang.about')}} Gondal Travel</h2>
                        <h4 class="title font-size-16 line-height-26 pt-4 pb-2">
                            {{__('lang.about_q1_a')}}</h4>
                        <p class="sec__desc font-size-16 pb-3">
                            {{__('lang.about_msg1_p1')}}</p>
                        <p class="sec__desc font-size-16 pb-3">
                            {{__('lang.about_msg1_p2')}}
                        </p>
                    </div><!-- end section-heading -->
                </div><!-- end col-lg-6 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end about-area -->
    <!-- ================================
        END ABOUT AREA
    ================================= -->
    <div class="section-block"></div>

<section class="cta-area padding-top-100px padding-bottom-180px text-center bread-bg-9 reveal" >
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h2 class="sec__title text-white line-height-55">Let us show you the world <br> Discover our most popular destinations</h2>
                </div><!-- end section-heading -->
                <div class="btn-box padding-top-35px">
                    <a href="{{route('register')}}" class="theme-btn border-0">Join with us</a>
                </div>
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
    <svg class="cta-svg" viewBox="0 0 500 150" preserveAspectRatio="none"><path d="M-31.31,170.22 C164.50,33.05 334.36,-32.06 547.11,196.88 L500.00,150.00 L0.00,150.00 Z"></path></svg>
</section><!-- end cta-area -->

<section class="clientlogo-area padding-top-20px padding-bottom-90px text-center " style="background-color: #fff;">
    <div class="container " >
        <div class="row" >
            <div class="col-lg-12">
                <div class="client-logo">
                    <div class="client-logo-item">
                        <img src="images/client-logo.png" alt="brand image">
                    </div><!-- end client-logo-item -->
                    <div class="client-logo-item">
                        <img src="images/client-logo2.png" alt="brand image">
                    </div><!-- end client-logo-item -->
                    <div class="client-logo-item">
                        <img src="images/client-logo3.png" alt="brand image">
                    </div><!-- end client-logo-item -->
                    <div class="client-logo-item">
                        <img src="images/client-logo4.png" alt="brand image">
                    </div><!-- end client-logo-item -->
                    <div class="client-logo-item">
                        <img src="images/client-logo5.png" alt="brand image">
                    </div><!-- end client-logo-item -->
                    <div class="client-logo-item">
                        <img src="images/client-logo6.png" alt="brand image">
                    </div><!-- end client-logo-item -->
                </div><!-- end client-logo -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end clientlogo-area -->
<!-- ================================
       START CLIENTLOGO AREA
================================= -->
<script>function reveal() {
    var reveals = document.querySelectorAll(".reveal");

    for (var i = 0; i < reveals.length; i++) {
      var windowHeight = window.innerHeight;
      var elementTop = reveals[i].getBoundingClientRect().top;
      var elementVisible = 150;

      if (elementTop < windowHeight - elementVisible) {
        reveals[i].classList.add("active");
      } else {
        reveals[i].classList.remove("active");
      }
    }
  }

  window.addEventListener("scroll", reveal);</script>
@endsection

@section('scripts')

    <script id="multifilghts-template" type="text/x-handlebars-template">
        <div class="contact-form-action multi-flight-field d-flex align-items-center">
            <div class="col-lg-4 pr-0">
                <div class="input-box">
                    <label class="label-text">Flying from</label>
                    <div class="form-group">
                        <span class="la la-map-marker form-icon"></span>
                        <select name="flying_from[]"
                                class="js-example-basic-single form-control"></select>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 pr-0">
                <div class="input-box">
                    <label class="label-text">Flying to</label>
                    <div class="form-group">
                        <span class="la la-map-marker form-icon"></span>
                        <select name="flying_to[]"
                                class="js-example-basic-single form-control"></select>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 pr-0">
                <div class="input-box">
                    <label class="label-text">Departing</label>
                    <div class="form-group">
                        <span class="la la-calendar form-icon"></span>
                        <input class="date-range form-control date-multi-picker" type="text"
                               name="daterange_single[]">
                    </div>
                </div>
            </div>
            <div class="col-lg-1 multi-flight-delete-wrap pt-3 pl-3 d-block">
                <button class="multi-flight-remove" type="button">
                    <i class="la la-remove"></i>
                </button>
            </div>
        </div>
    </script>

    <script>
        function change() {
            var from = document.getElementById('autocomplete');
            var to = document.getElementById('autocompleteto');
            var temp = from.value;
            from.value = to.value;
            to.value = temp;
        }

        function changer() {
            var from = document.getElementById('auto_complete_round_from');
            var to = document.getElementById('auto_complete_round_to');
            var temp = from.value;
            from.value = to.value;
            to.value = temp;
        }

        function singleDatePiker() {
            $('input[name="daterange_single[]"]:last').daterangepicker({
                singleDatePicker: true,
                minDate: new Date(),
                locale: {format: "YYYY-MM-DD"},
            });
        }

        function appendsAirports() {

            $('.js-example-basic-single').slice(-2).select2({
                width: '100%',
                allowClear: false,

                ajax: {
                    url: "{{ url('/api/search/airports') }}",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        console.log(params);
                        return {
                            q: params.term, // search term
                            page: params.page
                        };
                    },
                    processResults: function (data, params) {
                        params.page = params.page || 1;
                        return {
                            results: data.items,
                            pagination: {
                                more: (params.page * 30) < data.total_count
                            }
                        };
                    },
                    cache: true
                },
                placeholder: 'City or airport',
                minimumInputLength: 1,
                templateResult: formatRepo,
                templateSelection: formatRepoSelection
            });

            function formatRepo(repo) {
                if (repo.loading) {
                    return repo.text;
                }

                let $container = $(
                    '<div class="autocomplete-result">' +
                    '<div class="airport-name"></div>' +
                    '<div class="autocomplete-location"></div>' +
                    '</div>'
                );

                $container.find(".airport-name").html('<b>' + repo.iata + '</b> - ' + repo.name);
                $container.find(".autocomplete-location").html(repo.city + ', ' + repo.country);

                return $container;
            }

            function formatRepoSelection(repo) {
                return repo.full_name || repo.text;
            }
        }

        function appendsAirlines() {

            $('.js-airlines').select2({
                width: '100%',
                allowClear: false,
                maximumSelectionLength:3,
                ajax: {
                    url: "{{ url('/api/search/airlines') }}",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        console.log(params);
                        return {
                            q: params.term, // search term
                            page: params.page
                        };
                    },
                    processResults: function (data, params) {
                        params.page = params.page || 1;
                        return {
                            results: data.items,
                            pagination: {
                                more: (params.page * 30) < data.total_count
                            }
                        };
                    },
                    cache: true
                },
                placeholder: ' Avoid airlines',
                minimumInputLength: 1,
                templateResult: formatRepo,
                templateSelection: formatRepoSelection
            });

            function formatRepo(repo) {
                if (repo.loading) {
                    return repo.text;
                }

                let $container = $(
                    '<div class="autocomplete-result">' +
                    '<div class="airport-name"></div>' +
                    '</div>'
                );
                $container.find(".airport-name").html('<b>' + repo.name + '</b> - ' + repo.iata);
                return $container;
            }

            function formatRepoSelection(repo) {
                return repo.name || repo.text;
            }
        }

        function preferencesAirlines() {

            $('.js-preferences-airlines').select2({
                width: '100%',
                allowClear: false,
                maximumSelectionLength:3,
                ajax: {
                    url: "{{ url('/api/search/airlines') }}",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        console.log(params);
                        return {
                            q: params.term, // search term
                            page: params.page
                        };
                    },
                    processResults: function (data, params) {
                        params.page = params.page || 1;
                        return {
                            results: data.items,
                            pagination: {
                                more: (params.page * 30) < data.total_count
                            }
                        };
                    },
                    cache: true
                },
                placeholder: ' Preferences Airlines',
                minimumInputLength: 1,
                templateResult: formatRepo,
                templateSelection: formatRepoSelection
            });

            function formatRepo(repo) {
                if (repo.loading) {
                    return repo.text;
                }

                let $container = $(
                    '<div class="autocomplete-result">' +
                    '<div class="airport-name"></div>' +
                    '</div>'
                );
                $container.find(".airport-name").html('<b>' + repo.name + '</b> - ' + repo.iata);
                return $container;
            }

            function formatRepoSelection(repo) {
                return repo.name || repo.text;
            }
        }

        $(document).ready(function () {
            appendsAirports();
            singleDatePiker();
            appendsAirlines();
            preferencesAirlines();

            $(document).on('click', '.add-flight-city', function () {

                let count = $('.multi-flight-field').length;
                if (count < 4) {
                    let source = $('#multifilghts-template').html();
                    $(source).insertAfter(".multi-flight-field:last")
                    appendsAirports();
                    singleDatePiker();
                }

            });
        });
    </script>
@endsection
