@extends('dashboard.admin')

@section('content')
    <div class="dashboard-bread dashboard--bread">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="breadcrumb-content">
                        <div class="section-heading">
                            <h2 class="sec__title font-size-30 text-white">Update Contact Us</h2>
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
                            <form method="POST" action="{{route('update_contactus',[$about->id])}}">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group mb-0">
                                            <table id="contactus">
                                    
                                                    
                                                
                                                <tr>
                                                   
                                                    <td> <label for="addr">Address</label></td> 
                                                    <td><input type="text" id="addr" name="addr" value={{$about->address}} placeholder="Your Address.."/></td>
                                                    
                                                </tr>
                                                <tr>
                                                    <td> <label for="phone">Phone</label></td> 
                                                    <td><input type="text" id="phone" name="phone" value={{$about->phone}} placeholder="Your Phone No.."/></td>
                                                </tr>
                                                <tr>
                                                    <td> <label for="email">Email</label></td> 
                                                    <td><input type="text" id="email" name="email" value={{$about->email}} placeholder="Your Email/.."/></td>
                                                </tr>
                                              
                                                <tr>
                                                    <td> <label for="msg">Message</label></td> 
                                                    <td><input type="text" id="msg" name="msg" value={{$about->message}} placeholder="Your Message/.."/></td>
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
