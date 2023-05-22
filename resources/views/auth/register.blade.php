@extends('main.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card m-5 shadow-lg rounded">
                    <div class="card-header text-center text-light font-size-21" style="background-image: linear-gradient(to right, #00B4DB , #0083B0);">{{ __('Travel Partner Sign Up') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">

                                    <div class="form-group">
                                        <label for="name">{{ __('lang.name') }}</label>
                                        <div class="">
                                            <input id="name" type="text"
                                                   class="form-control @error('name') is-invalid @enderror" name="name"
                                                   value="{{ old('name') }}" required autocomplete="name" autofocus>
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">{{ __('lang.city') }}</label>
                                        <div class="">
                                            <input id="name" type="text"
                                                   class="form-control @error('city') is-invalid @enderror" name="city"
                                                   value="{{ old('city') }}" required autocomplete="name" autofocus>
                                            @error('city')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">{{ __('lang.country') }}</label>
                                        <div class="">
                                            <input id="name" type="text"
                                                   class="form-control @error('country') is-invalid @enderror"
                                                   name="country"
                                                   value="{{ old('country') }}" required autocomplete="name" autofocus>
                                            @error('country')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">{{ __('lang.state') }}</label>
                                        <div class="">
                                            <input id="name" type="text"
                                                   class="form-control @error('state') is-invalid @enderror"
                                                   name="state"
                                                   value="{{ old('state') }}" required autocomplete="name" autofocus>
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">{{ __('lang.phone') }}</label>
                                        <div class="">
                                            <input id="name" type="number"
                                                   class="form-control @error('phone') is-invalid @enderror"
                                                   name="phone"
                                                   value="{{ old('phone') }}" required autocomplete="name" autofocus>
                                            @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="name">{{ __('lang.address') }}</label>
                                        <div class="">
                                            <input id="name" type="text"
                                                   class="form-control @error('address') is-invalid @enderror"
                                                   name="address"
                                                   value="{{ old('address') }}" required autocomplete="name" autofocus>
                                            @error('address')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="">{{ __('lang.email') }}</label>

                                        <div class="">
                                            <input id="email" type="email"
                                                   class="form-control @error('email') is-invalid @enderror"
                                                   name="email"
                                                   value="{{ old('email') }}" required autocomplete="email">

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="">{{ __('lang.dob') }}</label>

                                        <div class="">
                                            <input id="email" type="date"
                                                   class="form-control @error('dob') is-invalid @enderror"
                                                   name="dob"
                                                   value="{{ old('dob') }}" required autocomplete="email">

                                            @error('dob')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password" class="">{{ __('lang.password') }}</label>

                                        <div class="">
                                            <input id="password" type="password"
                                                   class="form-control @error('password') is-invalid @enderror"
                                                   name="password"
                                                   required autocomplete="new-password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label for="password-confirm" class="">{{ __('lang.c-password') }}</label>

                                        <div class="">
                                            <input id="password-confirm" type="password" class="form-control"
                                                   name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>
                                    <div class="form-group mb-0">
                                        <div class="">
                                            <button type="submit" class="btn btn-primary btn-lg shadow rounded float-right mt-2">
                                                {{ __('lang.Sign_up') }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection





