@extends('dashboard.admin')

@section('content')
    <div class="dashboard-bread dashboard--bread">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="breadcrumb-content">
                        <div class="section-heading">
                            <h2 class="sec__title font-size-30 text-white">Add A New User</h2>
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
    <div class="container-fluid">
        @include('partials.alerts')
        <div class="row">
            <div class="col-lg-12">
                <div class="form-box">
                    <div class="form-title-wrap">
                        <h3 class="title">Personal Information</h3>
                    </div>
                    <div class="form-content">
                        <div class="contact-form-action">
                            <form method="POST" action="{{ route('users.store') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">

                                        <div class="form-group">
                                            <label for="name">{{ __('Name') }}</label>
                                            <div class="">
                                                <input id="name" type="text"
                                                       class="form-control @error('name') is-invalid @enderror"
                                                       name="name"
                                                       value="{{ old('name') }}" required autocomplete="name" autofocus>
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">{{ __('City') }}</label>
                                            <div class="">
                                                <input id="name" type="text"
                                                       class="form-control @error('city') is-invalid @enderror"
                                                       name="city"
                                                       value="{{ old('city') }}" required autocomplete="name" autofocus>
                                                @error('city')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">{{ __('Country') }}</label>
                                            <div class="">
                                                <input id="name" type="text"
                                                       class="form-control @error('country') is-invalid @enderror"
                                                       name="country"
                                                       value="{{ old('country') }}" required autocomplete="name"
                                                       autofocus>
                                                @error('country')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">{{ __('State') }}</label>
                                            <div class="">
                                                <input id="name" type="text"
                                                       class="form-control @error('state') is-invalid @enderror"
                                                       name="state"
                                                       value="{{ old('state') }}" required autocomplete="name"
                                                       autofocus>
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">{{ __('Phone') }}</label>
                                            <div class="">
                                                <input id="name" type="number"
                                                       class="form-control @error('phone') is-invalid @enderror"
                                                       name="phone"
                                                       value="{{ old('phone') }}" required autocomplete="name"
                                                       autofocus>
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
                                            <label for="name">{{ __('Address') }}</label>
                                            <div class="">
                                                <input id="name" type="text"
                                                       class="form-control @error('address') is-invalid @enderror"
                                                       name="address"
                                                       value="{{ old('address') }}" required autocomplete="name"
                                                       autofocus>
                                                @error('address')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class="">{{ __('E-Mail Address') }}</label>

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
                                            <label for="email" class="">{{ __('Date Of Birth') }}</label>

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
                                            <label for="password" class="">{{ __('Password') }}</label>

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
                                            <label for="role">{{__('Roles')}}</label>
                                            <select name="role" id="" class="form-control" required>
                                                @foreach(\Spatie\Permission\Models\Role::all() as $role)
                                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-0">
                                            <div class="">
                                                <button type="submit"
                                                        class="btn btn-primary btn-lg shadow rounded float-right mt-2">
                                                    {{ __('Add') }}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div><!-- end form-box -->
            </div><!-- end col-lg-6 -->
        </div><!-- end row -->
    </div>
@endsection
