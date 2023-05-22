@extends('dashboard.admin')

@section('content')
    <div class="dashboard-bread dashboard--bread">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="breadcrumb-content">
                        <div class="section-heading">
                            <h2 class="sec__title font-size-30 text-white">Update Flight</h2>
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
                        <h3 class="title">Update Flight</h3>
                    </div>
                    <div class="form-content">
                        <div class="contact-form-action">
                            <form method="POST" action="{{route('products.update', $product)}}"
                                  class="MultiFile-intercepted">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-lg-6 responsive-column">
                                        <div class="input-box">
                                            <label class="label-text">To</label>
                                            <div class="form-group">
                                                <input name="to" class="form-control" type="text"
                                                       value="{{$product->to}}"
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
                                                       value="{{$product->from}}"
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
                                                <span class="fa fa-phone form-icon"></span>
                                                <input name="price" class="form-control" type="text"
                                                       value="{{$product->price}}"
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
                                                       value="{{$product->flight_number}}"
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
                                            <label class="label-text">Stops</label>
                                            <div class="form-group">
                                                <input name="stops" class="form-control" value="{{$product->stops}}" type="text"
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
                                                <input name="duration" class="form-control" value="{{$product->duration}}" type="text"
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
                                            <label class="label-text">Coach</label>
                                            <div class="form-group">
                                                <select class="form-control" name="coach">
                                                    <option
                                                        value="Economy" {{$product->coach == "Economy" ? 'selected' : ''}}>
                                                        Economy
                                                    </option>
                                                    <option
                                                        value="Business" {{$product->coach == "Business" ? 'selected' : ''}}>
                                                        Business
                                                    </option>
                                                    <option
                                                        value="First class" {{$product->coach == "First class" ? 'selected' : ''}}>
                                                        First class
                                                    </option>
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
                                            <label class="label-text">Departure</label>
                                            <div class="form-group">
                                                <input name="departure" class="form-control" type="datetime-local"
                                                       value="{{$product->departure}}"
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
                                                <input name="arrival" value="{{$product->arrival}}"
                                                       class="form-control" type="datetime-local" required>
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
                                                <input name="airline"
                                                       value="{{$product->airline}}"
                                                       class="form-control" type="text" required>
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
                                                    <option value="0" {{$product->status == 0 ? 'selected' : ''}}>In-Active</option>
                                                    <option value="1" {{$product->status == 1 ? 'selected' : ''}}>Active</option>
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
                                                <p class="" style="color: red">{{$product->img_url}}</p>
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
