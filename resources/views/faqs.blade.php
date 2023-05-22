@extends('main.app')
@section('content')

    <!-- ================================
    START BREADCRUMB AREA
================================= -->
    <section class="breadcrumb-area bread-bg">
        <div class="breadcrumb-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-content">
                            <div class="section-heading">
                                <h2 class="sec__title line-height-55 text-white">{{__('lang.faq_msg1_p1')}}
                                    <br> {{__('lang.faq_msg1_p2')}}</h2>
                                <p class="sec__desc pt-2 text-white">{{__('lang.join')}} 3000+ {{__('lang.locals')}} 1400+ {{__('lang.contributors_from')}} 2000 {{__('lang.cities')}}</p>
                            </div>
                            <div class="btn-box pt-4">
                                <a href="#" data-toggle="modal" data-target="#signupPopupForm" class="theme-btn border-0">{{__('lang.register_now')}}</a>
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
    <section class="info-area info-bg padding-top-100px padding-bottom-40px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading text-center">
                        <h2 class="sec__title">{{__('lang.covid_update')}}</h2>
                    </div><!-- end section-heading -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
            <div class="row padding-top-50px d-block">
                <p>
                <li>{{__('lang.travel_restrictions')}}</li>
                    <li>{{__('lang.covid_19_alert')}}</li>
                <li>{{__('lang.ticket_time')}} </li>
            <li> {{__('lang.ticket_issue')}}</li></p>
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end info-area -->
    <!-- ================================
        END INFO AREA
    ================================= -->

    <div class="section-block"></div>



    <!-- ================================
        START INFO AREA
    ================================= -->
    <section class="info-area info-bg padding-top-50px padding-bottom-60px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading text-center">
                        <h2 class="sec__title">{{__('lang.notes')}}</h2>
                    </div><!-- end section-heading -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
            <div class="row padding-top-50px">
                <p >
                        {{__('lang.notes_1')}}
                        <br>
                        {{__('lang.notes_2')}}
                        <br>
                        {{__('lang.notes_3')}}
                        <br>
                        {{__('lang.notes_4')}}
                        <br>
                        {{__('lang.notes_5')}}
                        <br>
                        {{__('lang.notes_6')}}
                        <br>
                        {{__('lang.notes_7')}}
                </p>
                <br>
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end info-area -->
    <!-- ================================
        END INFO AREA
    ================================= -->

    <div class="section-block"></div>

    <!-- ================================
        START FAQ AREA
    ================================= -->
    <section class="faq-area section--padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading text-center">
                        <h2 class="sec__title">{{__('lang.faqs')}}</h2>
                    </div><!-- end section-heading -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
            <div class="row padding-top-40px">
                <div class="col-lg-7">
                    <div class="accordion accordion-item" id="accordionExample">
                        <div class="card">
                            <div class="card-header" id="faqHeadingOne">
                                <h2 class="mb-0">
                                    <button class="btn btn-link d-flex align-items-center justify-content-between" type="button" data-toggle="collapse" data-target="#faqCollapseOne" aria-expanded="true" aria-controls="faqCollapseOne">
                                        <span>{{__('lang.faq_q1')}}</span>
                                        <i class="la la-minus"></i>
                                        <i class="la la-plus"></i>
                                    </button>
                                </h2>
                            </div>
                            <div id="faqCollapseOne" class="collapse show" aria-labelledby="faqHeadingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    <p>{{__('lang.faq_a')}}</p>
                                </div>
                            </div>
                        </div><!-- end card -->
                        <div class="card">
                            <div class="card-header" id="faqHeadingTwo">
                                <h2 class="mb-0">
                                    <button class="btn btn-link d-flex align-items-center justify-content-between" type="button" data-toggle="collapse" data-target="#faqCollapseTwo" aria-expanded="false" aria-controls="faqCollapseTwo">
                                        <span>{{__('lang.faq_q2')}}</span>
                                        <i class="la la-minus"></i>
                                        <i class="la la-plus"></i>
                                    </button>
                                </h2>
                            </div>
                            <div id="faqCollapseTwo" class="collapse" aria-labelledby="faqHeadingTwo" data-parent="#accordionExample">
                                <div class="card-body">
                                    <p>{{__('lang.faq_a')}}</p>
                                </div>
                            </div>
                        </div><!-- end card -->
                        <div class="card">
                            <div class="card-header" id="faqHeadingThree">
                                <h2 class="mb-0">
                                    <button class="btn btn-link d-flex align-items-center justify-content-between" type="button" data-toggle="collapse" data-target="#faqCollapseThree" aria-expanded="false" aria-controls="faqCollapseThree">
                                        <span> {{__('lang.faq_q3')}}</span>
                                        <i class="la la-minus"></i>
                                        <i class="la la-plus"></i>
                                    </button>
                                </h2>
                            </div>
                            <div id="faqCollapseThree" class="collapse" aria-labelledby="faqHeadingThree" data-parent="#accordionExample">
                                <div class="card-body">
                                    <p>{{__('lang.faq_a')}}</p>
                                </div>
                            </div>
                        </div><!-- end card -->
                        <div class="card">
                            <div class="card-header" id="faqHeadingFour">
                                <h2 class="mb-0">
                                    <button class="btn btn-link d-flex align-items-center justify-content-between" type="button" data-toggle="collapse" data-target="#faqCollapseFour" aria-expanded="false" aria-controls="faqCollapseFour">
                                        <span> {{__('lang.faq_q4')}}</span>
                                        <i class="la la-minus"></i>
                                        <i class="la la-plus"></i>
                                    </button>
                                </h2>
                            </div>
                            <div id="faqCollapseFour" class="collapse" aria-labelledby="faqHeadingFour" data-parent="#accordionExample">
                                <div class="card-body">
                                    <p>{{__('lang.faq_a')}}</p>
                                </div>
                            </div>
                        </div><!-- end card -->
                        <div class="card">
                            <div class="card-header" id="faqHeadingFive">
                                <h2 class="mb-0">
                                    <button class="btn btn-link d-flex align-items-center justify-content-between" type="button" data-toggle="collapse" data-target="#faqCollapseFive" aria-expanded="false" aria-controls="faqCollapseFive">
                                        <span>{{__('lang.faq_q5')}}</span>
                                        <i class="la la-minus"></i>
                                        <i class="la la-plus"></i>
                                    </button>
                                </h2>
                            </div>
                            <div id="faqCollapseFive" class="collapse" aria-labelledby="faqHeadingFive" data-parent="#accordionExample">
                                <div class="card-body">
                                    <p>{{__('lang.faq_a')}}</p>
                                </div>
                            </div>
                        </div><!-- end card -->
                    </div>
                    <div class="accordion-help-text pt-2">
                        <p class="font-size-14 font-weight-regular">{{__('lang.faq_q7')}} <a href="#" class="color-text">{{__('lang.help_center')}}</a> {{__('lang.or')}} <a href="#" class="color-text">{{__('lang.contact_us2')}}</a></p>
                    </div>
                </div><!-- end col-lg-7 -->
                <div class="col-lg-5">
                    <div class="faq-forum pl-4">
                        <div class="form-box">
                            <div class="form-title-wrap">
                                <h3 class="title">{{__('lang.faq_q6')}}</h3>
                            </div><!-- form-title-wrap -->
                            <div class="form-content">
                                <div class="contact-form-action">
                                    <form method="post">
                                        <div class="input-box">
                                            <label class="label-text">{{__('lang.your_name')}}</label>
                                            <div class="form-group">
                                                <span class="la la-user form-icon"></span>
                                                <input class="form-control" type="text" name="text" placeholder="{{__('lang.your_name')}}">
                                            </div>
                                        </div>
                                        <div class="input-box">
                                            <label class="label-text">{{__('lang.your_email')}}</label>
                                            <div class="form-group">
                                                <span class="la la-envelope-o form-icon"></span>
                                                <input class="form-control" type="email" name="email" placeholder="{{__('lang.your_email')}}">
                                            </div>
                                        </div>
                                        <div class="input-box">
                                            <label class="label-text">{{__('lang.message6')}}</label>
                                            <div class="form-group">
                                                <span class="la la-pencil form-icon"></span>
                                                <textarea class="message-control form-control" name="message" placeholder="{{__('lang.write_message')}}"></textarea>
                                            </div>
                                        </div>
                                        <div class="btn-box">
                                            <button type="button" class="theme-btn">{{__('lang.send_message')}}</button>
                                        </div>
                                    </form>
                                </div><!-- end contact-form-action -->
                            </div><!-- end form-content -->
                        </div><!-- end form-box -->
                    </div><!-- end faq-forum -->
                </div><!-- end col-lg-4 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end faq-area -->
    <!-- ================================
        END FAQ AREA
    ================================= -->

@endsection
