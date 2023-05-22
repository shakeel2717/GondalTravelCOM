@extends('dashboard.admin')

@section('content')
    <div class="dashboard-bread dashboard--bread">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="breadcrumb-content">
                        <div class="section-heading">
                            <h2 class="sec__title font-size-30 text-white">Update</h2>
                        </div>
                    </div><!-- end breadcrumb-content -->
                </div><!-- end col-lg-6 -->
                <div class="col-lg-6">
                    <div class="breadcrumb-list text-right">
                        <ul class="list-items">
                            <li><a href="{{url('')}}" class="text-white">Home</a></li>
                            <li>Edit {{$user->name}}</li>
                        </ul>
                    </div><!-- end breadcrumb-list -->
                </div><!-- end col-lg-6 -->
            </div><!-- end row -->
        </div>
    </div>
    <br>
    <div class="container-fluid">
        @include('partials.alerts')
        <div class="row">
            <div class="col-lg-6">
                <div class="form-box">
                    <div class="form-title-wrap">
                        <h3 class="title">User Information</h3>
                    </div>
                    <div class="form-content">
                        <div class="contact-form-action">
                            <form method="POST" action="{{route('users.update',$user)}}"
                                  class="MultiFile-intercepted">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-lg-6 responsive-column">
                                        <div class="input-box">
                                            <label class="label-text">Full Name</label>
                                            <div class="form-group">
                                                <span class="fa fa-user form-icon"></span>
                                                <input name="name" class="form-control" type="text"
                                                       value="{{$user->name}}" required>
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-6 responsive-column">
                                        <div class="input-box">
                                            <label class="label-text">Email Address</label>
                                            <div class="form-group">
                                                <span class="fa fa-envelope form-icon"></span>
                                                <input name="email" class="form-control" type="email"
                                                       value="{{$user->email}}" required>
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-6 responsive-column">
                                        <div class="input-box">
                                            <label class="label-text">Phone number</label>
                                            <div class="form-group">
                                                <span class="fa fa-phone form-icon"></span>
                                                <input name="phone" class="form-control" type="number"
                                                       value="{{$user->phone}}" required>
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-6 responsive-column">
                                        <div class="input-box">
                                            <label class="label-text">Date of birth</label>
                                            <div class="form-group">
                                                <span class="fa fa-user form-icon"></span>
                                                <input name="dob" class="form-control" type="date"
                                                       value="{{$user->dob}}" required>
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-6 responsive-column">
                                        <div class="input-box">
                                            <label class="label-text">Country</label>
                                            <div class="form-group">
                                                <span class="fa fa-user form-icon"></span>
                                                <input name="country" class="form-control" type="text"
                                                       value="{{$user->country}}"
                                                       required>
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-6 responsive-column">
                                        <div class="input-box">
                                            <label class="label-text">City</label>
                                            <div class="form-group">
                                                <span class="fa fa-user form-icon"></span>
                                                <input name="city" class="form-control" type="text"
                                                       value="{{$user->city}}" required>
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-6 responsive-column">
                                        <div class="input-box">
                                            <label class="label-text">State</label>
                                            <div class="form-group">
                                                <span class="fa fa-user form-icon"></span>
                                                <input name="state" class="form-control" type="text"
                                                       value="{{$user->state}}" required>
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-6 responsive-column">
                                        <div class="input-box">
                                            <label class="label-text">Address</label>
                                            <div class="form-group">
                                                <span class="fa fa-map form-icon"></span>
                                                <input name="address" class="form-control" type="text"
                                                       value="{{$user->address}}" required>
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-6 responsive-column">
                                        <div class="input-box">
                                            <label class="label-text">Assign Role</label>
                                            <div class="form-group">
                                                <span class="fa fa-user form-icon"></span>
                                                <select name="role" id="" class="form-control" required>
                                                    @foreach(\Spatie\Permission\Models\Role::all() as $role)
                                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('role')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 responsive-column">
                                        <div class="input-box">
                                            <label class="label-text">User Status</label>
                                            <div class="form-group">
                                                <span class="fa fa-user form-icon"></span>
                                                <select name="status" id="" class="form-control" required>
                                                        <option value="0" <?php if($user->status=='0'){?>selected<?php }?>>InActive</option>
                                                        <option value="1" <?php if($user->status=='1'){?>selected<?php }?>>Active</option>
                                                </select>
                                                @error('role')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
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
            <div class="col-lg-6">
                <div class="form-box">
                    <div class="form-title-wrap">
                        <h3 class="title">Change Password</h3>
                    </div>
                    <div class="form-content">
                        <div class="contact-form-action">
                            <form method="POST" action="{{ route('change.password') }}">
                                @csrf

                                @foreach ($errors->all() as $error)
                                    <p class="text-danger">{{ $error }}</p>
                                @endforeach

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Current
                                        Password</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control"
                                               value="{{$user->o_auth}}" name="current_password"
                                               autocomplete="current-password">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">New
                                        Password</label>

                                    <div class="col-md-6">
                                        <input id="new_password" type="password" class="form-control"
                                               name="new_password" autocomplete="current-password">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">New Confirm
                                        Password</label>

                                    <div class="col-md-6">
                                        <input id="new_confirm_password" type="password" class="form-control"
                                               name="new_confirm_password" autocomplete="current-password">
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Update Password
                                        </button>
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
