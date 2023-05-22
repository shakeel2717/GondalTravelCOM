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
                                <h2 class="sec__title text-white">{{__('lang.flight_list')}}</h2>
                            </div>
                        </div><!-- end breadcrumb-content -->
                    </div><!-- end col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="breadcrumb-list text-right">
                            <ul class="list-items">
                                <li><a href="{{route('index')}}">{{__('lang.home')}}</a></li>
                                <li>{{__('lang.flight')}}</li>
                                <li>{{__('lang.flight_list')}}</li>
                            </ul>
                        </div><!-- end breadcrumb-list -->
                    </div><!-- end col-lg-6 -->
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
        START CONTACT AREA
    ================================= -->
    <section class="contact-area section--padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="form-box">
                        <div class="form-title-wrap">
                            <h3 class="title">{{__('lang.message7')}}</h3>
                            <p class="font-size-15">{{__('lang.message8')}}</p>
                        </div><!-- form-title-wrap -->
                        <div class="form-content ">
                            <div class="contact-form-action">
                                                                @if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif
                                <form method="post" action="{{route('querymail')}}" class="row">

                                    @csrf
                                    <div class="col-lg-6 responsive-column">
                                        <div class="input-box">
                                            <label class="label-text">{{__('lang.your_name')}}</label>
                                            <div class="form-group">
                                                <span class="la la-user form-icon"></span>
                                                <input class="form-control" type="text" name="name" placeholder="{{__('lang.your_name')}}">
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-6 responsive-column">
                                        <div class="input-box">
                                            <label class="label-text">{{__('lang.your_email')}}</label>
                                            <div class="form-group">
                                                <span class="la la-envelope-o form-icon"></span>
                                                <input class="form-control" type="email" name="email" placeholder="{{__('lang.your_name')}}">
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-12">
                                        <div class="input-box">
                                            <label class="label-text">{{__('lang.message6')}}</label>
                                            <div class="form-group">
                                                <span class="la la-pencil form-icon"></span>
                                                <textarea class="message-control form-control" name="message" placeholder="{{__('lang.write_message')}}"></textarea>
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-12 -->
                                    <div class="col-lg-12">
                                        <div class="btn-box">
                                            <button type="submit" class="theme-btn">{{__('lang.send_message')}}</button>
                                        </div>
                                    </div><!-- end col-lg-12 -->
                                </form>
                            </div><!-- end contact-form-action -->
                        </div><!-- end form-content -->
                    </div><!-- end form-box -->
                </div><!-- end col-lg-8 -->
                <div class="col-lg-4">
                    <div class="form-box">
                        <div class="form-title-wrap">
                            <h3 class="title">Contact Us</h3>
                        </div><!-- form-title-wrap -->
                        <div class="form-content">
                            <div class="address-book">
                                <ul class="list-items contact-address">
                                    <li>
                                        <i class="la la-map-marker icon-element"></i>
                                        <h5 class="title font-size-16 pb-1">{{__('lang.address')}}</h5>
                                        <p>
                                        </p>
                                    </li>
                                    <li>
                                        <i class="la la-phone icon-element"></i>
                                        <h5 class="title font-size-16 pb-1">{{__('lang.phone')}}</h5>
                                        <p>+33 7 67 77 59 22</p>
                                    </li>
                                    <li>
                                        <i class="la la-envelope-o icon-element"></i>
                                        <h5 class="title font-size-16 pb-1">{{__('lang.email2')}}</h5>
                                        <p>nrgondal@gmail.com</p>
                                    </li>
                                </ul>
                                <ul class="social-profile text-center">
                                    <li><a href="#"><i class="lab la-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="lab la-twitter"></i></a></li>
                                    <li><a href="#"><i class="lab la-instagram"></i></a></li>
                                    <li><a href="#"><i class="lab la-linkedin-in"></i></a></li>
                                    <li><a href="#"><i class="lab la-youtube"></i></a></li>
                                </ul>
                            </div>
                        </div><!-- end form-content -->
                    </div><!-- end form-box -->
                </div><!-- end col-lg-4 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end contact-area -->
    <!-- ================================
        END CONTACT AREA
    ================================= -->

    <!-- ================================
        START MAP AREA
    ================================= -->
    <section class="map-area padding-bottom-100px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="map-container">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12486.919948851046!2d2.366971198798762!3d48.857227272411066!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e671e19ff53a01%3A0x36401da7abfa068d!2sCath%C3%A9drale%20Notre-Dame%20de%20Paris!5e0!3m2!1sen!2s!4v1623859722317!5m2!1sen!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div><!-- end map-container -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end map-area -->
    <!-- ================================
        END MAP AREA
    ================================= -->

@endsection
