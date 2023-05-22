@extends('main.app')
{{-- {{ dd($data) }} --}}
@if (count($data) != 0)
    @section('content')
        <section class="breadcrumb-area bread-bg-6">
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
                                    <li><a href="{{ route('index') }}">Home</a></li>
                                    <li>Flight Booking</li>
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
        </section>
        <section class="booking-area padding-top-100px padding-bottom-70px">
            <form action="{{ route('store.multiflight') }}" id="payment-form" method="POST">
                @csrf
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="form-box">
                                <div class="form-content">
                                    <div class="contact-form-action">
                                        <?php
                                        $count = 1;
                                        ?>
                                        <div class="row">
                                            <div class="col-lg-6 responsive-column">
                                                <div class="input-box">
                                                    <label class="label-text">Passenger Email</label>
                                                    <div class="form-group">
                                                        <span class="fa fa-envelope form-icon"></span>
                                                        <input class="form-control" type="email" name="email"
                                                            placeholder="e.g info@gondaltravel.com" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 responsive-column">
                                                <div class="input-box">
                                                    <label class="label-text">Passenger Contact No</label>
                                                    <div class="form-group">
                                                        <link rel="stylesheet"
                                                            href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
                                                        <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>



                                                        <div class="form-group">

                                                            <input id="phone" type="tel"class="form-control"
                                                                name="contact_no" required/>

                                                        </div>





                                                        <script>
                                                            const phoneInputField = document.querySelector("#phone");
                                                            const phoneInput = window.intlTelInput(phoneInputField, {
                                                                utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
                                                            });
                                                        </script>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        @for ($i = 0; $i < $data['adult']; $i++)
                                            <div class="form-title-wrap">
                                                <h3 class="title">{{ $count }} Adult Passenger Details</h3>
                                            </div>
                                            <input name="age[]" value="Adult" hidden>
                                            <div class="row">
                                                <div class="col-lg-6 responsive-column">
                                                    <div class="input-box">
                                                        <label class="label-text">Prénom / Given Name / Firstname</label>
                                                        <div class="form-group">
                                                            <span class="fa fa-user form-icon"></span>
                                                            <input class="form-control" type="text" name="name[]"
                                                                placeholder="e.g Harry James" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 responsive-column">
                                                    <div class="input-box">
                                                        <label class="label-text">Nom / Surname / Lastname</label>
                                                        <div class="form-group">
                                                            <span class="fa fa-user form-icon"></span>
                                                            <input class="form-control" type="text" name="surname[]"
                                                                placeholder="e.g Brown" required>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-lg-4 responsive-column">
                                                    @include('partials.countries', ['isArray' => true])
                                                </div>
                                                <div class="col-lg-4 responsive-column">
                                                    <div class="input-box">
                                                        <label class="label-text">Gender</label>
                                                        <div class="form-group">
                                                            <span class="fa fa-child form-icon"></span>
                                                            <select name="gender[]" style="height: 50px"
                                                                class="form-control" id="" required>
                                                                <option value="">Please Select Gender</option>
                                                                <option value="Male">Male</option>
                                                                <option value="Female">Female</option>
                                                                <option value="Others">Other</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 responsive-column">
                                                    <div class="input-box">
                                                        <label class="label-text">Passenger DOB</label>
                                                        <div class="form-group">
                                                            <span class="fa fa-calendar form-icon"></span>
                                                            <input type="date" class="form-control" name="dob[]"
                                                                required>
                                                        </div>
                                                    </div>
                                                </div>







                                                <div class="col-lg-4 responsive-column">
                                                    <div class="input-box">
                                                        <label class="label-text">Passport or ID number</label>
                                                        <div class="form-group">
                                                            <span class="fa fa-id-card form-icon"></span>
                                                            <input type="text" class="form-control"
                                                                placeholder="Passport or ID Number" name="pidno[]"
                                                                required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 responsive-column">
                                                    <div class="input-box">
                                                        <label class="label-text">Passport or ID Expiry Date</label>
                                                        <div class="form-group">
                                                            <span class="fa fa-calendar form-icon"></span>
                                                            <input type="date" class="form-control" name="pied[]"
                                                                required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @php
                                                $count++;
                                            @endphp
                                        @endfor
                                        <?php
                                        $count = 1;
                                        ?>
                                        @for ($i = 0; $i < $data['child']; $i++)
                                            <div class="form-title-wrap">
                                                <input name="age[]" value="Child" hidden>
                                                <h3 class="title">{{ $count }} Child Passenger Details</h3>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6 responsive-column">
                                                    <div class="input-box">
                                                        <label class="label-text">Prénom / Given Name / Firstname</label>
                                                        <div class="form-group">
                                                            <span class="fa fa-user form-icon"></span>
                                                            <input class="form-control" type="text" name="name[]"
                                                                placeholder="e.g Harry James" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 responsive-column">
                                                    <div class="input-box">
                                                        <label class="label-text">Nom / Surname / Lastname</label>
                                                        <div class="form-group">
                                                            <span class="fa fa-user form-icon"></span>
                                                            <input class="form-control" type="text" name="surname[]"
                                                                placeholder="e.g Brown" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!--<div class="col-lg-6 responsive-column">-->
                                                <!--    <div class="input-box">-->
                                                <!--        <label class="label-text">Passenger Contact No</label>-->
                                                <!--        <div class="form-group">-->
                                                <!--            <span class="fa fa-address-book form-icon"></span>-->
                                                <!--            <input class="form-control" type="number" name="contact_no[]" placeholder="Contact No" required>-->
                                                <!--        </div>-->
                                                <!--    </div>-->
                                                <!--</div>-->
                                                <div class="col-lg-4 responsive-column">
                                                    @include('partials.countries', ['isArray' => true])
                                                </div>
                                                <div class="col-lg-4 responsive-column">
                                                    <div class="input-box">
                                                        <label class="label-text">Gender</label>
                                                        <div class="form-group">
                                                            <span class="fa fa-child form-icon"></span>
                                                            <select name="gender[]" style="height: 50px"
                                                                class="form-control" id="" required>
                                                                <option value="">Please Select Gender</option>
                                                                <option value="Male">Male</option>
                                                                <option value="Female">Female</option>
                                                                <option value="Others">Other</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 responsive-column">
                                                    <div class="input-box">
                                                        <label class="label-text">Passenger DOB</label>
                                                        <div class="form-group">
                                                            <span class="fa fa-calendar form-icon"></span>
                                                            <input type="date" class="form-control" name="dob[]"
                                                                required>
                                                        </div>
                                                    </div>
                                                </div>




                                                <div class="col-lg-4 responsive-column">
                                                    <div class="input-box">
                                                        <label class="label-text">Passport or ID number</label>
                                                        <div class="form-group">
                                                            <span class="fa fa-id-card form-icon"></span>
                                                            <input type="text" class="form-control"
                                                                placeholder="Passport or ID Number" name="pidno[]"
                                                                required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 responsive-column">
                                                    <div class="input-box">
                                                        <label class="label-text">Passport or ID Expiry Date</label>
                                                        <div class="form-group">
                                                            <span class="fa fa-calendar form-icon"></span>
                                                            <input type="date" class="form-control" name="pied[]"
                                                                required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @php
                                                $count++;
                                            @endphp
                                        @endfor
                                        <?php
                                        $count = 1;
                                        ?>

                                        @if (isset($data['infant']))
                                            @for ($i = 0; $i < $data['infant']; $i++)
                                                <div class="form-title-wrap">
                                                    <input name="age[]" value="Infant" hidden>
                                                    <h3 class="title">{{ $count }} Infant Passenger Details</h3>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6 responsive-column">
                                                        <div class="input-box">
                                                            <label class="label-text">Prénom / Given Name / Firstname</label>
                                                            <div class="form-group">
                                                                <span class="fa fa-user form-icon"></span>
                                                                <input class="form-control" type="text" name="name[]"
                                                                    placeholder="e.g Harry James" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 responsive-column">
                                                        <div class="input-box">
                                                            <label class="label-text">Nom / Surname / Lastname</label>
                                                            <div class="form-group">
                                                                <span class="fa fa-user form-icon"></span>
                                                                <input class="form-control" type="text"
                                                                    name="surname[]" placeholder="e.g Brown" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!--<div class="col-lg-6 responsive-column">-->
                                                    <!--    <div class="input-box">-->
                                                    <!--        <label class="label-text">Passenger Contact No</label>-->
                                                    <!--        <div class="form-group">-->
                                                    <!--            <span class="fa fa-address-book form-icon"></span>-->
                                                    <!--            <input class="form-control" type="number" name="contact_no[]" placeholder="Contact No" required>-->
                                                    <!--        </div>-->
                                                    <!--    </div>-->
                                                    <!--</div>-->
                                                    <div class="col-lg-4 responsive-column">
                                                        @include('partials.countries', ['isArray' => true])
                                                    </div>
                                                    <div class="col-lg-4 responsive-column">
                                                        <div class="input-box">
                                                            <label class="label-text">Gender</label>
                                                            <div class="form-group">
                                                                <span class="fa fa-child form-icon"></span>
                                                                <select name="gender[]" style="height: 50px"
                                                                    class="form-control" id="" required>
                                                                    <option value="">Please Select Gender</option>
                                                                    <option value="Male">Male</option>
                                                                    <option value="Female">Female</option>
                                                                    <option value="Others">Other</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 responsive-column">
                                                        <div class="input-box">
                                                            <label class="label-text">Passenger DOB</label>
                                                            <div class="form-group">
                                                                <span class="fa fa-calendar form-icon"></span>
                                                                <input type="date" class="form-control" name="dob[]"
                                                                    required>
                                                            </div>
                                                        </div>
                                                    </div>







                                                    <div class="col-lg-4 responsive-column">
                                                        <div class="input-box">
                                                            <label class="label-text">Passport or ID number</label>
                                                            <div class="form-group">
                                                                <span class="fa fa-id-card form-icon"></span>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Passport or ID Number" name="pidno[]"
                                                                    required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 responsive-column">
                                                        <div class="input-box">
                                                            <label class="label-text">Passport or ID Expiry Date</label>
                                                            <div class="form-group">
                                                                <span class="fa fa-calendar form-icon"></span>
                                                                <input type="date" class="form-control" name="pied[]"
                                                                    required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @php
                                                    $count++;
                                                @endphp
                                            @endfor
                                        @endif
                                        <div class="col-lg-12">
                                            @if ($payment == 'cash')
                                                <div class="input-box">
                                                    <div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="payment_method" value="cash"
                                                                id="flexRadioDefault2" checked>
                                                            <label class="form-check-label" for="flexRadioDefault2">
                                                                Pay by Cash.
                                                            </label>
                                                        </div>
                                                        <br>
                                                    </div>
                                                </div>
                                            @elseif($payment == 'card')
                                                <div class="input-box">
                                                    <div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="payment_method" value="card"
                                                                id="flexRadioDefault1" checked>
                                                            <label class="form-check-label" for="flexRadioDefault1">
                                                                Pay by Card.
                                                            </label>
                                                        </div>
                                                        <div class="content" id="payment-card">
                                                            <script src="https://js.stripe.com/v3/"></script>
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <div class="form-group">
                                                                        <input type="hidden" class="form-control"
                                                                            name="amount" placeholder="Enter Amount"
                                                                            value="{{ $data['price'] }}" />
                                                                        <label for="card-element mt-1">
                                                                            Enter Card
                                                                        </label>
                                                                        <div id="card-element">
                                                                            <!-- A Stripe Element will be inserted here. -->
                                                                        </div>
                                                                        <!-- Used to display form errors. -->
                                                                        <div id="card-errors" role="alert"></div>
                                                                        {{-- {{ dd($error) }} --}}
                                                                        @if ($error)
                                                                            <div class="alert alert-danger">
                                                                                <ul>
                                                                                    <li>{{ $error }}</li>
                                                                                </ul>
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                    </div>
                                                </div>
                                            @endif
                                            <input type="hidden" name="data" value="{{ json_encode($data) }}">
                                            <input type="hidden" name="orgdata" value="{{ json_encode($orgdata) }}">
                                            <input type="hidden" name="newPrice" value="{{ $newPrice }}">
                                            <input type="hidden" name="price" value="{{ $orgPrice }}">
                                            <input type="hidden" name="collectorProfit" value="{{ $collectorProfit }}">
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
                            @include('partials.multi-flight-booking-details')
                        </div><!-- end col-lg-4 -->
                    </div><!-- end row -->
                </div><!-- end container -->
            </form>
        </section>
        <!-- <script>
            var publishable_key =
                'pk_test_51IeGmOKiAX2uoKP0J4UEIL9CHl2Qjk5ts5Q5QYqhURftZ0LGCrR2begOYOX7cse4akYJQwoUw4WjaxUqD76VKnYf00uIiY9MIr';
        </script>
                <script src="{{ asset('/js/card.js') }}"></script> -->
    @endsection
@else
    <div class="col-lg-8">
        <p class="alert-danger text-center">No Result Found</p>
    </div>
@endif
