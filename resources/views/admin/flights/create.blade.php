@extends('dashboard.admin')

@section('content')
    <div class="dashboard-bread dashboard--bread">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="breadcrumb-content">
                        <div class="section-heading">
                            <h2 class="sec__title font-size-30 text-white">Add A New Flight</h2>
                        </div>
                    </div><!-- end breadcrumb-content -->
                </div><!-- end col-lg-6 -->
                <div class="col-lg-6">
                    <div class="breadcrumb-list text-right">

                    </div><!-- end breadcrumb-list -->
                </div><!-- end col-lg-6 -->
            </div><!-- end row -->
        </div>
    </div>
    <br>
    <div class="container-fluid ml-2">
        @include('partials.alerts')
        <div class="row">
            <div class="col-lg-12">
                <div class="form-box">
                    <div class="form-title-wrap">
                        <h3 class="title">Create A New Flight</h3>
                    </div>
                    <div class="form-content">
                        <div class="contact-form-action">
                            <form method="POST" action="{{route('products.store')}}"
                                  class="MultiFile-intercepted"  enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 responsive-column">
                                        <div class="input-box">
                                            <label class="label-text">To</label>
                                            <div class="form-group">
                                                <input name="to" class="form-control" type="text"
                                                       required>
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-6 responsive-column">
                                        <div class="input-box">
                                            <label class="label-text">From</label>
                                            <div class="form-group">

                                                <input name="from" class="form-control" type="text"
                                                       required>
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-6 responsive-column">
                                        <div class="input-box">
                                            <label class="label-text">Price</label>
                                            <div class="form-group">
                                                <input name="price" class="form-control" type="text"
                                                       required>
                                                @error('price')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-6 responsive-column">
                                        <div class="input-box">
                                            <label class="label-text">Flight Number</label>
                                            <div class="form-group">
                                                <input name="flight_number" class="form-control" type="text"
                                                       required>
                                                @error('flight_number')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 responsive-column">
                                        <div class="input-box">
                                            <label class="label-text">Coach</label>
                                            <div class="form-group">
                                                <select class="form-control" name="coach">
                                                    <option value="Economy" selected>Economy</option>
                                                    <option value="Business">Business</option>
                                                    <option value="First class">First class</option>
                                                </select>
                                                @error('coach')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-6 responsive-column">
                                        <div class="input-box">
                                            <label class="label-text">Stops</label>
                                            <div class="form-group">
                                                <input name="stops" class="form-control" type="text"
                                                       required>
                                                @error('stops')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 responsive-column">
                                        <div class="input-box">
                                            <label class="label-text">Duration</label>
                                            <div class="form-group">
                                                <input name="duration" class="form-control" type="text"
                                                       required>
                                                @error('duration')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 responsive-column">
                                        <div class="input-box">
                                            <label class="label-text">Departure</label>
                                            <div class="form-group">
                                                <input name="departure" class="form-control" type="datetime-local"
                                                       required>
                                                @error('departure')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-6 responsive-column">
                                        <div class="input-box">
                                            <label class="label-text">Arrival</label>
                                            <div class="form-group">
                                                <input name="arrival" class="form-control" type="datetime-local"
                                                       required>
                                                @error('arrival')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-6 responsive-column">
                                        <div class="input-box">
                                            <label class="label-text">Airline</label>
                                            <div class="form-group">
                                                <input name="airline" class="form-control" type="text" required>
                                                @error('airline')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-6 responsive-column">
                                        <div class="input-box">
                                            <label class="label-text">Status</label>
                                            <div class="form-group">
                                                <select name="status" class="form-control">
                                                    <option value="">Please Select Status</option>
                                                    <option value="0">In-Active</option>
                                                    <option value="1">Active</option>
                                                </select>
                                                @error('status')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-6 responsive-column">
                                        <div class="input-box">
                                            <label class="label-text">Image Url</label>
                                            <div class="form-group">
                                                <input type="file" class="form-control" name="thumbnail">
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->

                                    <div class="col-lg-12">
                                        <div class="btn-box">
                                            <button class="theme-btn float-right" type="submit">Save Changes</button>
                                        </div>
                                    </div><!-- end col-lg-12 -->
                                </div><!-- end row -->
                            </form>
                        </div>
                    </div>
                </div><!-- end form-box -->
            </div><!-- end col-lg-6 -->
        </div><!-- end row -->
    </div>
@endsection
