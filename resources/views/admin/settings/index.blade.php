@extends('dashboard.admin')

@section('content')
<div class="dashboard-bread dashboard--bread">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="breadcrumb-content">
                        <div class="section-heading">
                            <h2 class="sec__title font-size-30 text-white">Edit Settings</h2>
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
                        <h3 class="title">Settings</h3>
                    </div>
                    <div class="form-content">
                        <div class="contact-form-action">
                            <form method="POST" action="{{route('setting.update')}}"
                                  class="MultiFile-intercepted">
                                @csrf

                                @foreach ($settings as $setting)
                                <input name="id[]" class="form-control" type="hidden"
                                                       value="{{$setting->id}}" >
                                <div class="row">
                                    <div class="col-lg-6 responsive-column">
                                        <div class="input-box">
                                            <div class="form-group">
                                                @if($setting->name=='live_api_on')
                                                    {{__('Amadeus API')}}
                                                @elseif($setting->name=='live_booking_on')
                                                    {{__('Amadeus API PNR')}}
                                                @endif
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                     <div class="col-lg-6 responsive-column">
                                        <div class="input-box">
                                            <div class="form-group">
                                                <select name="value[]" class="form-control">
                                                    <option value="0" @if($setting->value=='0') selected @endif >Test</option>
                                                    <option value="1" @if($setting->value=='1') selected @endif >Live</option>
                                                </select>
                                                <!-- <input name="value[]" class="form-control" type="text"
                                                       value="{{$setting->value}}"
                                                       required> -->
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                </div>
                                @endforeach

                                <div class="row">
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
