@extends('dashboard.admin')

@section('content')
    <div class="dashboard-bread dashboard--bread">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="breadcrumb-content">
                        <div class="section-heading">
                            <h2 class="sec__title font-size-30 text-white">Create Contact Us</h2>
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
                    
                    <div class="form-content">
                        <div class="contact-form-action">
                            <form method="POST" action="store_contactus">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group mb-0">
                                            <table id="contactus">
                                                <tr>
                                                    <td>Address &ensp;</td> 
                                                    <td><input type="text" name="addr"/></td>
                                                </tr>
                                                <tr>
                                                    <td>Phone &ensp;</td> 
                                                    <td><input type="text" name="phone"/></td>
                                                </tr>
                                                <tr>
                                                    <td> Email &ensp; </td> 
                                                    <td><input type="text" name="email"/></td>
                                                </tr>
                                              
                                                <tr>
                                                    <td>Message &ensp;</td> 
                                                    <td><input type="text" name="msg"/></td>
                                                </tr>

                                            </table>

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
