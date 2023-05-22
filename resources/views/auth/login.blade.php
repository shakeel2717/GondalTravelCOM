@extends('main.app')

@section('content')
    <style>
        /* Shared */
        .loginBtn {
            box-sizing: border-box;
            position: relative;
            /* width: 13em;  - apply for fixed size */
            margin: 0.2em;
            padding: 0 15px 0 46px;
            border: none;
            text-align: left;
            line-height: 34px;
            white-space: nowrap;
            border-radius: 0.2em;
            font-size: 16px;
            color: #FFF;
        }
        .loginBtn:before {
            content: "";
            box-sizing: border-box;
            position: absolute;
            top: 0;
            left: 0;
            width: 34px;
            height: 100%;
        }
        .loginBtn:focus {
            outline: none;
        }
        .loginBtn:active {
            box-shadow: inset 0 0 0 32px rgba(0,0,0,0.1);
        }


        /* Facebook */
        .loginBtn--facebook {
            background-color: #4C69BA;
            background-image: linear-gradient(#4C69BA, #3B55A0);
            /*font-family: "Helvetica neue", Helvetica Neue, Helvetica, Arial, sans-serif;*/
            text-shadow: 0 -1px 0 #354C8C;
        }
        .loginBtn--facebook:before {
            border-right: #364e92 1px solid;
            background: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/14082/icon_facebook.png') 6px 6px no-repeat;
        }
        .loginBtn--facebook:hover,
        .loginBtn--facebook:focus {
            background-color: #5B7BD5;
            background-image: linear-gradient(#5B7BD5, #4864B1);
        }


        /* Google */
        .loginBtn--google {
            /*font-family: "Roboto", Roboto, arial, sans-serif;*/
            background: #DD4B39;
        }
        .loginBtn--google:before {
            border-right: #BB3F30 1px solid;
            background: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/14082/icon_google.png') 6px 6px no-repeat;
        }
        .loginBtn--google:hover,
        .loginBtn--google:focus {
            background: #E74B37;
        }
    </style>
    <div class="container" >
    <div class="row justify-content-center">
        <div style="padding-top:15px"><span style="color:Red">For personal flight tickets, </span> please contact us, <a href="tel:0033187653786">0033187653786</a> or if you want to become a travel partner,Please sign-up.</div>
        <div class="col-md-12">
            <div class="card m-5 shadow-lg rounded">
                <div class="card-header text-center text-light font-size-21" style="background-image: linear-gradient(to right, #00B4DB , #0083B0);">{{ __('Travel Partner Login') }}</div>
                    @if(isset($registersuccess))
                    <span class="invalid-feedback" role="alert">
                        <strong sytle="color:black;">{{ $registersuccess }}</strong>
                    </span>
                    @endif
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <label for="email" class="">{{ __('lang.email') }}</label>

                            <div class="">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="">{{ __('lang.password') }}</label>

                            <div class="">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('lang.Remember') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                           <!--  <button  class="loginBtn loginBtn--facebook">
                                <a href="{{url('login/facebook')}}" style="text-decoration: none;color: white">{{__('lang.login_fb')}}</a>
                            </button> -->

                          <!--   <button class="loginBtn loginBtn--google">
                                <a href="{{url('login/google')}}" style="text-decoration: none;color: white">{{__('lang.login_google')}}</a>
                            </button> -->
                        </div>
                        <div class="form-group ">
                            <div class="">
                                <button type="submit" class="btn btn-primary btn-lg shadow rounded float-right">
                                    {{ __('lang.login') }}
                                </button>
                                <div class="float-left">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('lang.forgot_your_password') }}
                                    </a>
                                @endif
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
