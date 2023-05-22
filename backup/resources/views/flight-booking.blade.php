@extends('main.app')

@section('content')

@if (isset($data))

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
    <form action="{{ route('store.flight') }}" id="payment-form" method="POST">
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
                                    <div class="col-md-6">
                                        <div class="input-box">
                                            <label class="label-text">Admin Email</label>
                                            <div class="form-group">
                                                <span class="fa fa-envelope form-icon"></span>
                                                <input class="form-control" type="email" name="admin_email" placeholder="e.g info@gondaltravel.com" value="travelgondal@gmail.com" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-box">
                                            <label class="label-text">Admin Phone</label>
                                            <div class="form-group">
                                                <span class="fa fa-envelope form-icon"></span>
                                                <input class="form-control" type="string" name="admin_phone" placeholder="923011212123" value="+33767775922" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 responsive-column">
                                        <div class="input-box">
                                            <label class="label-text">Passenger Email</label>
                                            <div class="form-group">
                                                <span class="fa fa-envelope form-icon"></span>
                                                <input class="form-control" type="email" name="email" placeholder="e.g info@gondaltravel.com" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 responsive-column">
                                        <div class="input-box">
                                            <label class="label-text">Passenger Contact No</label>
                                            <div class="form-group">
                                                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
                                                <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>

                                                <div class="form-group">

                                                    <input id="phone" type="tel" class="form-control" name="contact_no" value="+" />

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

                                @for ($i = 0; $i < $data['adult']; $i++) <div class="form-title-wrap">
                                    <h3 class="title">{{ $count }} Adult Passenger Details</h3>
                            </div>
                            <input name="age[]" value="Adult" hidden>
                            <div class="row">
                                <div class="col-lg-6 responsive-column">
                                    <div class="input-box">
                                        <label class="label-text">Prénom / Given Name / Firstname</label>
                                        <div class="form-group">
                                            <span class="fa fa-user form-icon"></span>
                                            <input class="form-control" type="text" name="name[]" placeholder="e.g Harry James" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 responsive-column">
                                    <div class="input-box">
                                        <label class="label-text">Nom / Surname / Lastname</label>
                                        <div class="form-group">
                                            <span class="fa fa-user form-icon"></span>
                                            <input class="form-control" type="text" name="surname[]" placeholder="e.g Brown" required>
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
                                            <select name="gender[]" style="height: 50px" class="form-control" id="" required>
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
                                            <input type="date" class="form-control" name="dob[]" required id="adultAge" onblur="checkAdultAge();">
                                            <small class="text-danger" id="checkAdultAgeValidated"></small>
                                        </div>
                                    </div>
                                </div>







                                <div class="col-lg-4 responsive-column">
                                    <div class="input-box">
                                        <label class="label-text">Passport or ID number</label>
                                        <div class="form-group">
                                            <span class="fa fa-id-card form-icon"></span>
                                            <input type="text" class="form-control" placeholder="Passport or ID Number" name="pidno[]" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 responsive-column">
                                    <div class="input-box">
                                        <label class="label-text">Passport or ID Expiry Date</label>
                                        <div class="form-group">
                                            <span class="fa fa-calendar form-icon"></span>
                                            <input type="date" class="form-control" name="pied[]" required>
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
                            @for ($i = 0; $i < $data['child']; $i++) <div class="form-title-wrap">
                                <input name="age[]" value="Child" hidden>
                                <h3 class="title">{{ $count }} Child Passenger Details</h3>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 responsive-column">
                                <div class="input-box">
                                    <label class="label-text">Prénom / Given Name / Firstname</label>
                                    <div class="form-group">
                                        <span class="fa fa-user form-icon"></span>
                                        <input class="form-control" type="text" name="name[]" placeholder="e.g Harry James" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 responsive-column">
                                <div class="input-box">
                                    <label class="label-text">Nom / Surname / Lastname</label>
                                    <div class="form-group">
                                        <span class="fa fa-user form-icon"></span>
                                        <input class="form-control" type="text" name="surname[]" placeholder="e.g Brown" required>
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
                                        <select name="gender[]" style="height: 50px" class="form-control" id="" required>
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
                                        <input type="date" class="form-control" name="dob[]" required id="childAge" onblur="checkChildAge();">
                                        <small class="text-danger" id="checkChildAgeValidated"></small>
                                    </div>
                                </div>
                            </div>




                            <div class="col-lg-4 responsive-column">
                                <div class="input-box">
                                    <label class="label-text">Passport or ID number</label>
                                    <div class="form-group">
                                        <span class="fa fa-id-card form-icon"></span>
                                        <input type="text" class="form-control" placeholder="Passport or ID Number" name="pidno[]" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 responsive-column">
                                <div class="input-box">
                                    <label class="label-text">Passport or ID Expiry Date</label>
                                    <div class="form-group">
                                        <span class="fa fa-calendar form-icon"></span>
                                        <input type="date" class="form-control" name="pied[]" required>
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
                        @for ($i = 0; $i < $data['infant']; $i++) <div class="form-title-wrap">
                            <input name="age[]" value="Infant" hidden>
                            <h3 class="title">{{ $count }} Infant Passenger Details</h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 responsive-column">
                            <div class="input-box">
                                <label class="label-text">Prénom / Given Name / Firstname</label>
                                <div class="form-group">
                                    <span class="fa fa-user form-icon"></span>
                                    <input class="form-control" type="text" name="name[]" placeholder="e.g Harry James" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 responsive-column">
                            <div class="input-box">
                                <label class="label-text">Nom / Surname / Lastname</label>
                                <div class="form-group">
                                    <span class="fa fa-user form-icon"></span>
                                    <input class="form-control" type="text" name="surname[]" placeholder="e.g Brown" required>
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
                                    <select name="gender[]" style="height: 50px" class="form-control" id="" required>
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
                                    <input type="date" class="form-control" name="dob[]" required id="infantAge" onblur="checkInfantAge();">
                                    <small class="text-danger" id="checkInfantAgeValidated"></small>
                                </div>
                            </div>
                        </div>







                        <div class="col-lg-4 responsive-column">
                            <div class="input-box">
                                <label class="label-text">Passport or ID number</label>
                                <div class="form-group">
                                    <span class="fa fa-id-card form-icon"></span>
                                    <input type="text" class="form-control" placeholder="Passport or ID Number" name="pidno[]" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 responsive-column">
                            <div class="input-box">
                                <label class="label-text">Passport or ID Expiry Date</label>
                                <div class="form-group">
                                    <span class="fa fa-calendar form-icon"></span>
                                    <input type="date" class="form-control" name="pied[]" required>
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
                        <div class="input-box">
                            <div>
                                <div class="mb-0">Payment Method: {{ $payment }}</div>
                                <small>Go Back to Change your Payment method</small>
                                <br>
                            </div>
                        </div>
                        <div class="input-box">
                            <div>
                                <div class="mb-0"></div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="ticketStatus" value="hold" id="hold" checked>
                                    <label class="form-check-label" for="hold">
                                        Ticket on Hold
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="ticketStatus" value="confirm" id="confirm">
                                    <label class="form-check-label" for="confirm">
                                        Ticket is Confirmed
                                    </label>
                                </div>
                                <br>
                            </div>
                        </div>
                        <input type="hidden" name="data" value="{{ json_encode($data) }}">
                        <input type="hidden" name="payment_method" value="{{ $payment }}">
                        <input type="hidden" name="orgdata" value="{{ json_encode($orgdata) }}">
                        <input type="hidden" name="newPrice" value="{{ $newPrice }}">
                        <input type="hidden" name="price" value="{{ $orgPrice }}">
                        <input type="hidden" name="collectorProfit" value="{{ $collectorProfit }}">
                        <div class="input-box mb-5">
                            <div>
                                <input type="submit" class="btn btn-primary float-right" value="Book">
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
<!-- <script>
            var publishable_key =
                'pk_test_51IeGmOKiAX2uoKP0J4UEIL9CHl2Qjk5ts5Q5QYqhURftZ0LGCrR2begOYOX7cse4akYJQwoUw4WjaxUqD76VKnYf00uIiY9MIr';
        </script>
        <script src="{{ asset('/js/card.js') }}"></script> -->
@elseif(isset($data2))
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
                            <li>Flight Bookings</li>
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
    <form action="{{ route('store.flight') }}" id="payment-form" method="POST">
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

                                @for ($i = 0; $i < $data2->adults; $i++)
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
                                                    <input class="form-control" type="text" name="name[]" placeholder="e.g Harry James" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 responsive-column">
                                            <div class="input-box">
                                                <label class="label-text">Nom / Surname / Lastname</label>
                                                <div class="form-group">
                                                    <span class="fa fa-user form-icon"></span>
                                                    <input class="form-control" type="text" name="surname[]" placeholder="e.g Brown" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 responsive-column">
                                            <div class="input-box">
                                                <label class="label-text">Passenger Contact No</label>
                                                <div class="form-group">
                                                    <span class="fa fa-address-book form-icon"></span>
                                                    <input class="form-control" type="number" name="contact_no[]" placeholder="Contact No" required>
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
                                                    <select name="gender[]" style="height: 50px" class="form-control" id="" required>
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
                                                    <input type="date" class="form-control" name="dob[]" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 responsive-column">
                                            <div class="input-box">
                                                <label class="label-text">Passport or ID number</label>
                                                <div class="form-group">
                                                    <span class="fa fa-id-card form-icon"></span>
                                                    <input type="text" class="form-control" placeholder="Passport or ID Number" name="pidno[]" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 responsive-column">
                                            <div class="input-box">
                                                <label class="label-text">Passport or ID Expiry Date</label>
                                                <div class="form-group">
                                                    <span class="fa fa-calendar form-icon"></span>
                                                    <input type="date" class="form-control" name="pied[]" required>
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
                                    @for ($i = 0; $i < $data2->childrens; $i++)
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
                                                        <input class="form-control" type="text" name="name[]" placeholder="e.g Harry James" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 responsive-column">
                                                <div class="input-box">
                                                    <label class="label-text">Nom / Surname / Lastname</label>
                                                    <div class="form-group">
                                                        <span class="fa fa-user form-icon"></span>
                                                        <input class="form-control" type="text" name="surname[]" placeholder="e.g Brown" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 responsive-column">
                                                <div class="input-box">
                                                    <label class="label-text">Passenger Contact No</label>
                                                    <div class="form-group">
                                                        <span class="fa fa-address-book form-icon"></span>
                                                        <input class="form-control" type="number" name="contact_no[]" placeholder="Contact No" required>
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
                                                        <select name="gender[]" style="height: 50px" class="form-control" id="" required>
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
                                                        <input type="date" class="form-control" name="dob[]" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4 responsive-column">
                                                <div class="input-box">
                                                    <label class="label-text">Passport or ID number</label>
                                                    <div class="form-group">
                                                        <span class="fa fa-id-card form-icon"></span>
                                                        <input type="text" class="form-control" placeholder="Passport or ID Number" name="pidno[]" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 responsive-column">
                                                <div class="input-box">
                                                    <label class="label-text">Passport or ID Expiry Date</label>
                                                    <div class="form-group">
                                                        <span class="fa fa-calendar form-icon"></span>
                                                        <input type="date" class="form-control" name="pied[]" required>
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
                                        @for ($i = 0; $i < $data2->infants; $i++)
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
                                                            <input class="form-control" type="text" name="name[]" placeholder="e.g Harry James" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 responsive-column">
                                                    <div class="input-box">
                                                        <label class="label-text">Nom / Surname / Lastname</label>
                                                        <div class="form-group">
                                                            <span class="fa fa-user form-icon"></span>
                                                            <input class="form-control" type="text" name="surname[]" placeholder="e.g Brown" required>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-lg-6 responsive-column">
                                                    <div class="input-box">
                                                        <label class="label-text">Passenger Contact No</label>
                                                        <div class="form-group">
                                                            <span class="fa fa-address-book form-icon"></span>
                                                            <input class="form-control" type="number" name="contact_no[]" placeholder="Contact No" required>
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
                                                            <select name="gender[]" style="height: 50px" class="form-control" id="" required>
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
                                                            <input type="date" class="form-control" name="dob[]" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 responsive-column">
                                                    <div class="input-box">
                                                        <label class="label-text">Passport or ID number</label>
                                                        <div class="form-group">
                                                            <span class="fa fa-id-card form-icon"></span>
                                                            <input type="text" class="form-control" placeholder="Passport or ID Number" name="pidno[]" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 responsive-column">
                                                    <div class="input-box">
                                                        <label class="label-text">Passport or ID Expiry Date</label>
                                                        <div class="form-group">
                                                            <span class="fa fa-calendar form-icon"></span>
                                                            <input type="date" class="form-control" name="pied[]" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @php
                                            $count++;
                                            @endphp
                                            @endfor
                                            <div class="col-lg-12">

                                                <div>
                                                    <div class="mb-0">Payment Method: {{ $payment }}</div>
                                                    <small>Go Back to Change your Payment method</small>
                                                    <br>
                                                </div>


                                                <input type="hidden" name="data" value="{{ $data2 }}">
                                                <input type="hidden" name="payment_method" value="{{ $payment }}">

                                                <input type="hidden" name="db" value="db">

                                                <input type="hidden" name="newPrice" value="{{ $newPrice }}">
                                                <input type="hidden" name="price" value="{{ $orgPrice }}">
                                                <input type="hidden" name="collectorProfit" value="{{ $collectorProfit }}">
                                                <div class="input-box">
                                                    <div>
                                                        <input type="submit" class="btn btn-primary float-right" value="Book">
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
<!-- <script>
            var publishable_key =
                'pk_test_51IeGmOKiAX2uoKP0J4UEIL9CHl2Qjk5ts5Q5QYqhURftZ0LGCrR2begOYOX7cse4akYJQwoUw4WjaxUqD76VKnYf00uIiY9MIr';
        </script>
        <script src="{{ asset('/js/card.js') }}"></script> -->
@endif

@endsection
@section("scripts")
<script>
    function checkAdultAge() {
        // selecting input by id
        var adultAge = document.getElementById("adultAge").value;
        var dateObject = new Date(adultAge);
        var birthYear = dateObject.getFullYear();
        var currentYear = new Date().getFullYear();
        var age = currentYear - birthYear;
        if (age < 12) {
            document.getElementById("checkAdultAgeValidated").innerHTML = "Adult Must be 12 Years Old";
        } else {
            document.getElementById("checkAdultAgeValidated").innerHTML = "";
        }
    }

    function checkChildAge() {
        var adultAge = document.getElementById("childAge").value;
        var dateObject = new Date(adultAge);
        var birthYear = dateObject.getFullYear();
        var currentYear = new Date().getFullYear();
        var age = currentYear - birthYear;
        if (age < 2) {
            document.getElementById("checkChildAgeValidated").innerHTML = "Child Must be 2 Years Old";
        } else if (age > 12) {
            document.getElementById("checkChildAgeValidated").innerHTML = "Child Must not older then 12 Years";
        } else {
            document.getElementById("checkChildAgeValidated").innerHTML = "";
        }
    }


    function checkInfantAge() {
        var adultAge = document.getElementById("infantAge").value;
        var dateObject = new Date(adultAge);
        var birthYear = dateObject.getFullYear();
        var currentYear = new Date().getFullYear();
        var age = currentYear - birthYear;
        if (age > 2) {
            document.getElementById("checkInfantAgeValidated").innerHTML = "Infant Must be 2 Years Old";
        } else {
            document.getElementById("checkInfantAgeValidated").innerHTML = "";
        }
    }
</script>
<script>
    var timeout;

    function resetTimer() {
        clearTimeout(timeout);
        timeout = setTimeout(function() {
            window.location.href = "https://gondaltravel.com/";
        }, 10 * 60 * 1000); // 10 minutes
    }
</script>
@endsection