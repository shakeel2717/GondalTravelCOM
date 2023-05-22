@extends('dashboard.admin')

@section('content')
    <div class="dashboard-bread dashboard--bread">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="breadcrumb-content">
                        <div class="section-heading">
                            <h2 class="sec__title font-size-30 text-white">Edit Commission</h2>
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
                        <h3 class="title">Commissions</h3>
                    </div>
                    <div class="form-content">
                        <div class="contact-form-action">
                            <form method="POST" action="{{route('commissions.update', $commission)}}"
                                  class="MultiFile-intercepted">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 responsive-column">
                                        <div class="input-box">
                                            <label class="label-text">Commission percentage</label>
                                            <div class="form-group">
                                                <input name="commission" class="form-control" type="number"
                                                       value="{{$commission->commission_percentage}}"
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
                                            <label class="label-text">Commission Value</label>
                                            <div class="form-group">
                                                <input name="value" class="form-control" type="number"
                                                       value="{{$commission->commission_value}}"
                                                       required>
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        
        
                                    </div><!-- end col-lg-6 -->
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                     <div class="col-lg-12 responsive-column">
                                                             <select class="form-control" name="select" required>
                     <option selected disabled> Select Option </option>

                  

                 <option value="0">
                   Percentage
                 </option>
                  <option value="1">
                   Value
                 </option>
    
                  

                                                                  
                                                             </select>
                                        
        
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
