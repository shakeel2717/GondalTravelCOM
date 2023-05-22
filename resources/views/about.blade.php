@extends('main.app')
@section('content')


    <!-- ================================
    START BREADCRUMB AREA
================================= -->
    <section class="breadcrumb-area bread-bg-9">
        <div class="breadcrumb-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-content">
                            {{-- <h2 class="sec__title line-height-50 text-white" >
                                <div class="typewrite"  data-period="2000" data-type='[ " {{__('lang.about_title_p1')}} <br> {{__('lang.about_title_p2')}}"]'>
                                  <span class="wrap" ></span>
                                </div>
                              </h2> --}}
                            <div class="section-heading ">
                                <h2 class="sec__title line-height-50 text-white">
                                    {{__('lang.about_title_p1')}} <br> {{__('lang.about_title_p2')}}</h2>
                            </div>
                        </div><!-- end breadcrumb-content -->
                    </div><!-- end col-lg-12 -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end breadcrumb-wrap -->
        <div class="bread-svg-box">
            <svg class="bread-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 10" preserveAspectRatio="none"><polygon points="100 0 50 10 0 0 0 10 100 10"></polygon></svg>
        </div><!-- end bread-svg -->
    </section><!-- end breadcrumb-area -->
    <!-- ================================
        END BREADCRUMB AREA
    ================================= -->

    <!-- ================================
        START INFO AREA
    ================================= -->
    <section class="info-area padding-top-100px padding-bottom-70px">
        <div class="container">
            <div class="row" >
                <div class="col-lg-4 responsive-column" style="display:grid;">
                    <div class="card-item" data-toggle="tooltip" data-placement="top" title="hello word">
                        <div class="card-img">
                            <img src="images/img21.jpg" alt="about-img">
                        </div>
                        <div class="card-body">
                            <h3 class="card-title mb-2">{{__('lang.about_q1')}}</h3>
                            <p class="card-text">
                                {{__('lang.about_q1_a')}}
                            </p>
                        </div>
                    </div><!-- end card-item -->
                </div><!-- end col-lg-4 -->
                <div class="col-lg-4 responsive-column" style="display:grid;">
                    <div class="card-item ">
                        <div class="card-img">
                            <img src="images/img22.jpg" alt="about-img">
                        </div>
                        <div class="card-body">
                            <h3 class="card-title mb-2">{{__('lang.about_q2')}}</h3>
                            <p class="card-text">
                                {{__('lang.about_q2_a')}}
                            </p>
                        </div>
                    </div><!-- end card-item -->
                </div><!-- end col-lg-4 -->
                <div class="col-lg-4 responsive-column" style="display:grid;">
                    <div class="card-item ">
                        <div class="card-img">
                            <img src="images/img23.jpg" alt="about-img">
                        </div>
                        <div class="card-body">
                            <h3 class="card-title mb-2">{{__('lang.about_q3')}}</h3>
                            <p class="card-text">
                                {{__('lang.about_q3_a')}}
                            </p>
                        </div>
                    </div><!-- end card-item -->
                </div><!-- end col-lg-4 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end info-area -->
    <!-- ================================
        END INFO AREA
    ================================= -->

    <!-- ================================
        START ABOUT AREA
    ================================= -->
    <section class="about-area padding-bottom-90px overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading margin-bottom-40px">
                        <h2 class="sec__title">{{__('lang.about')}}</h2>
                        <h4 class="title font-size-16 line-height-26 pt-4 pb-2">
                            {{__('lang.about_q1_a')}}</h4>
                        <p class="sec__desc font-size-16 pb-3">
                            {{__('lang.about_msg1_p1')}}</p>
                        <p class="sec__desc font-size-16 pb-3">
                            {{__('lang.about_msg1_p2')}}
                        </p>
                    </div><!-- end section-heading -->
                </div><!-- end col-lg-6 -->
                <div class="col-lg-5 ml-auto">
                    <div class="image-box about-img-box">
                        <img src="images/img24.jpg" alt="about-img" class="img__item img__item-1">
                        <img src="images/img25.jpg" alt="about-img" class="img__item img__item-2">
                    </div>
                </div><!-- end col-lg-5 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end about-area -->
    <!-- ================================
        END ABOUT AREA
    ================================= -->

    <!-- ================================
        START ABOUT AREA
    ================================= -->
    <section class="about-area padding-bottom-90px overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 ">
                    <div class="image-box about-img-box">
                        <img src="images/img24.jpg" alt="about-img" class="img__item img__item-1">
                        <img src="images/img25.jpg" alt="about-img" class="img__item img__item-2">
                    </div>
                </div><!-- end col-lg-5 -->
                <div class="col-lg-6 ml-auto">
                    <div class="section-heading margin-bottom-40px">
                        <h2 class="sec__title">{{__('lang.about_q4')}}</h2>
                        <h4 class="title font-size-16 line-height-26 pt-4 pb-2">
                            {{__('lang.about_q1_a')}}</h4>
                        <p class="sec__desc font-size-16 pb-3">
                            {{__('lang.about_msg2_p1')}}
                        </p>
                        <p class="sec__desc font-size-16 pb-3">
                            {{__('lang.about_msg2_p2')}}
                        </p>
                        <p class="sec__desc font-size-16 pb-3">
                            {{__('lang.about_msg2_p3')}}
                        </p>
                        <p class="sec__desc font-size-16 pb-3">

                        </p>
                    </div><!-- end section-heading -->
                </div><!-- end col-lg-6 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end about-area -->
    <!-- ================================
        END ABOUT AREA
    ================================= -->

    <!-- ================================
        START ABOUT AREA
    ================================= -->
    <section class="about-area padding-bottom-90px overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading margin-bottom-40px">
                        <h2 class="sec__title">{{__('lang.about_q5')}}</h2>
                        <h4 class="title font-size-16 line-height-26 pt-4 pb-2">
                            {{__('lang.about_a3')}}
                        </h4>
                        <p class="sec__desc font-size-16 pb-3">
                            {{__('lang.about_msg3_p1')}}
                        </p>
                        <p class="sec__desc font-size-16 pb-3">
                            {{__('lang.about_msg3_p2')}}
                        </p>
                        <p class="sec__desc font-size-16 pb-3">
                            {{__('lang.about_msg3_p3')}}
                        </p>
                    </div><!-- end section-heading -->
                </div><!-- end col-lg-6 -->
                <div class="col-lg-5 ml-auto">
                    <div class="image-box about-img-box">
                        <img src="images/img24.jpg" alt="about-img" class="img__item img__item-1">
                        <img src="images/img25.jpg" alt="about-img" class="img__item img__item-2">
                    </div>
                </div><!-- end col-lg-5 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end about-area -->
    <!-- ================================
        END ABOUT AREA
    ================================= -->

    <!-- ================================
        STAR FUNFACT AREA
    ================================= -->
    <section class="funfact-area padding-bottom-70px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading text-center">
                        <h2 class="sec__title">{{__('lang.about_cal')}}</h2>
                    </div><!-- end section-heading -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
            <div class="counter-box counter-box-2 margin-top-60px mb-0">
                <div class="row">
                    <div class="col-lg-3 responsive-column">
                        <div class="counter-item counter-item-layout-2 d-flex">
                            <div class="counter-icon flex-shrink-0">
                                <i class="la la-users"></i>
                            </div>
                            <div class="counter-content">
                                <div>
                                    <span class="counter" data-from="0" data-to="200"  data-refresh-interval="5">0</span>
                                    <span class="count-symbol">+</span>
                                </div>
                                <p class="counter__title">{{__('lang.partners')}}</p>
                            </div><!-- end counter-content -->
                        </div><!-- end counter-item -->
                    </div><!-- end col-lg-3 -->
                    <div class="col-lg-3 responsive-column">
                        <div class="counter-item counter-item-layout-2 d-flex">
                            <div class="counter-icon flex-shrink-0">
                                <i class="la la-building"></i>
                            </div>
                            <div class="counter-content">
                                <div>
                                    <span class="counter" data-from="0" data-to="3"  data-refresh-interval="5">0</span>
                                    <span class="count-symbol">k</span>
                                </div>
                                <p class="counter__title">{{__('lang.properties')}}</p>
                            </div><!-- end counter-content -->
                        </div><!-- end counter-item -->
                    </div><!-- end col-lg-3 -->
                    <div class="col-lg-3 responsive-column">
                        <div class="counter-item counter-item-layout-2 d-flex">
                            <div class="counter-icon flex-shrink-0">
                                <i class="la la-globe"></i>
                            </div>
                            <div class="counter-content">
                                <div>
                                    <span class="counter" data-from="0" data-to="400"  data-refresh-interval="5">0</span>
                                    <span class="count-symbol">+</span>
                                </div>
                                <p class="counter__title">{{__('lang.destinations')}}</p>
                            </div><!-- end counter-content -->
                        </div><!-- end counter-item -->
                    </div><!-- end col-lg-3 -->
                    <div class="col-lg-3 responsive-column">
                        <div class="counter-item counter-item-layout-2 d-flex">
                            <div class="counter-icon flex-shrink-0">
                                <i class="la la-check-circle"></i>
                            </div>
                            <div class="counter-content">
                                <div>
                                    <span class="counter" data-from="0" data-to="40"  data-refresh-interval="5">0</span>
                                    <span class="count-symbol">k</span>
                                </div>
                                <p class="counter__title">{{__('lang.booking')}}</p>
                            </div><!-- end counter-content -->
                        </div><!-- end counter-item -->
                    </div><!-- end col-lg-3 -->
                </div><!-- end row -->
            </div><!-- end counter-box -->
        </div><!-- end container -->
    </section>
    <!-- ================================
        END FUNFACT AREA
    ================================= -->
    {{-- <script>//made by vipul mirajkar thevipulm.appspot.com
        var TxtType = function(el, toRotate, period) {
                this.toRotate = toRotate;
                this.el = el;
                this.loopNum = 0;
                this.period = parseInt(period, 10) || 2000;
                this.txt = '';
                this.tick();
                this.isDeleting = false;
            };

            TxtType.prototype.tick = function() {
                var i = this.loopNum % this.toRotate.length;
                var fullTxt = this.toRotate[i];

                if (this.isDeleting) {
                this.txt = fullTxt.substring(0, this.txt.length - 1);
                } else {
                this.txt = fullTxt.substring(0, this.txt.length + 1);
                }

                this.el.innerHTML = '<span class="wrap">'+this.txt+'</span>';

                var that = this;
                var delta = 200 - Math.random() * 100;

                if (this.isDeleting) { delta /= 2; }

                if (!this.isDeleting && this.txt === fullTxt) {
                delta = this.period;
                this.isDeleting = true;
                } else if (this.isDeleting && this.txt === '') {
                this.isDeleting = false;
                this.loopNum++;
                delta = 500;
                }

                setTimeout(function() {
                that.tick();
                }, delta);
            };

            window.onload = function() {
                var elements = document.getElementsByClassName('typewrite');
                for (var i=0; i<elements.length; i++) {
                    var toRotate = elements[i].getAttribute('data-type');
                    var period = elements[i].getAttribute('data-period');
                    if (toRotate) {
                      new TxtType(elements[i], JSON.parse(toRotate), period);
                    }
                }
                // INJECT CSS
                var css = document.createElement("style");
                css.type = "text/css";
                css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid #fff}";
                document.body.appendChild(css);
            };</script> --}}
@endsection
