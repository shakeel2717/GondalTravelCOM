@extends('main.app')

@section('content')
    <section class="breadcrumb-area bread-bg-6">
        <form action="{{route('store.flight')}}" id="payment-form" method="POST">
            @csrf
            <div class="breadcrumb-wrap">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="breadcrumb-content">
                                <div class="section-heading">
                                    <h2 class="sec__title text-white">Flight Booking</h2>
                                </div>
                            </div><!-- end breadcrumb-content -->
                        </div><!-- end col-lg-6 -->
                        <div class="col-lg-6">
                            <div class="breadcrumb-list text-right">
                                <ul class="list-items">
                                    <li><a href="{{route('index')}}">Home</a></li>
                                    <li>Flight Booking</li>
                                </ul>
                            </div><!-- end breadcrumb-list -->
                        </div><!-- end col-lg-6 -->
                    </div><!-- end row -->
                </div><!-- end container -->
            </div><!-- end breadcrumb-wrap -->
            <div class="bread-svg-box">
                <svg class="bread-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 10"
                     preserveAspectRatio="none">
                    <polygon points="100 0 50 10 0 0 0 10 100 10"></polygon>
                </svg>
            </div><!-- end bread-svg -->
    </section>
    <section class="booking-area padding-top-100px padding-bottom-70px">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="form-box">

                        <div class="form-content">
                            <div class="contact-form-action">
                                <?php
                                $count = 1;
                                ?>
                                @for($i= 0; $i < request()->get('qtyInput'); $i++)
                                    <div class="form-title-wrap">
                                        <h3 class="title">{{$count}} Passenger Details</h3>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 responsive-column">
                                            <div class="input-box">
                                                <label class="label-text">{{$count}} Passenger Full Name</label>
                                                <div class="form-group">
                                                    <span class="fa fa-user form-icon"></span>
                                                    <input class="form-control" type="text" name="name[]"
                                                           value="{{auth()->user()->name ?? ''}}"
                                                           placeholder="First name" required>
                                                </div>
                                            </div>
                                        </div><!-- end col-lg-6 -->
                                        <div class="col-lg-6 responsive-column">
                                            <div class="input-box">
                                                <label class="label-text">{{$count}} Passenger Email</label>
                                                <div class="form-group">
                                                    <span class="fa fa-envelope form-icon"></span>
                                                    <input class="form-control" type="email" name="email[]"
                                                           value="{{auth()->user()->email ?? ''}}"
                                                           placeholder="Email address" required>
                                                </div>
                                            </div>
                                        </div><!-- end col-lg-6 -->
                                        <div class="col-lg-6 responsive-column">
                                            <div class="input-box">
                                                <label class="label-text">{{$count}} Passenger Contact No</label>
                                                <div class="form-group">
                                                    <span class="fa fa-address-book form-icon"></span>
                                                    <input class="form-control" type="number" name="contact_no[]"
                                                           value="{{auth()->user()->phone ?? ''}}"
                                                           placeholder="Contact No" required>
                                                </div>
                                            </div>
                                        </div><!-- end col-lg-6 -->
                                        <div class="col-lg-6 responsive-column">
                                            <div class="input-box">
                                                <label class="label-text">{{$count}} Passenger Age Group</label>
                                                <div class="form-group">
                                                    <span class="fa fa-child form-icon"></span>
                                                    <select name="age_group[]" style="height: 50px" class="form-control"
                                                            id="" required>
                                                        <option value="">Please Select Age Group</option>
                                                        <option value="Adult">Adult</option>
                                                        <option value="Children">Children</option>
                                                        <option value="Infant">Infant</option>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-lg-12">
                                            <div class="input-box">
                                                <label class="label-text">{{$count}} Passenger Address Line</label>
                                                <div class="form-group">
                                                    <span class="fa fa-map form-icon"></span>
                                                    <input class="form-control" type="text" name="address[]"
                                                           value="{{auth()->user()->address ?? ''}}"
                                                           placeholder="Address line" required>
                                                </div>
                                            </div>
                                        </div><!-- end col-lg-12 -->
                                        <div class="col-lg-6 responsive-column">
                                            @include('partials.countries',['isArray' => true])
                                        </div><!-- end col-lg-6 -->

                                        <div class="col-lg-6 responsive-column">
                                            <div class="input-box">
                                                <label class="label-text">{{$count}} Passenger City</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="city[]"
                                                           value="{{auth()->user()->city ?? ''}}" required>
                                                </div>
                                            </div>
                                        </div><!-- end col-lg-6 -->
                                        <div class="col-lg-6 responsive-column">
                                            <div class="input-box">
                                                <label class="label-text">{{$count}} Passenger DOB</label>
                                                <div class="form-group">
                                                    <input type="date" class="form-control" name="dob[]"
                                                           value="{{auth()->user()->city ?? ''}}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 responsive-column">
                                            <div class="input-box">
                                                <label class="label-text">{{$count}} Passenger Id Name</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="id_name[]" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 responsive-column">
                                            <div class="input-box">
                                                <label class="label-text">{{$count}} Passenger Id No</label>
                                                <div class="form-group">
                                                    <input type="number" class="form-control" name="id_no[]" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @php
                                        $count++;
                                    @endphp
                                @endfor
                                <div class="col-lg-12">
                                    <div class="input-box">
                                        <div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="payment_method"
                                                       value="card" id="flexRadioDefault1" checked>
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Pay by Card.
                                                </label>
                                            </div>
                                            <div class="content" id="payment-card">
                                                <script src="https://js.stripe.com/v3/"></script>
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <input type="hidden" class="form-control" name="amount"
                                                                   placeholder="Enter Amount" value="{{request()->get('price')}}"/>
                                                            <label for="card-element mt-1">
                                                                Enter Card
                                                            </label>
                                                            <div id="card-element">
                                                                <!-- A Stripe Element will be inserted here. -->
                                                            </div>
                                                            <!-- Used to display form errors. -->
                                                            <div id="card-errors" role="alert"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                        </div>
                                    </div>
                                    <div class="input-box">
                                        <div>
                                            <input type="submit" class="btn btn-primary float-right"
                                                   value="Book">
                                        </div>
                                    </div>
                                </div><!-- end col-lg-12 -->

                            </div><!-- end contact-form-action -->
                        </div><!-- end form-content -->
                    </div><!-- end form-box -->
                </div><!-- end col-lg-8 -->
                <div class="col-lg-4">
                    @include('partials.booking-details')
                </div><!-- end col-lg-4 -->
            </div><!-- end row -->
        </div><!-- end container -->
        </form>
    </section>
    <script>
        var publishable_key = 'sk_test_51IREVmHqFRjOgHlr4bbdbazwS9mGCPbIMN0D93bkZCXn1MjmutLKa3mgIM1U43kpBL1gBtnt2PuhM7BztJcZwVZ700AUWJOfTC';
    </script>
    <script src="{{asset('/js/card.js')}}"></script>

@endsection
