@extends('dashboard.admin')

@section('content')



 <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-title mb-3">Create New User</div>
                        <form method="POST" action="{{route('addrole_post')}}" enctype="multipart/form-data">
                            @csrf()
                                               	@if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif
                            <div class="row">

                                <div class="col-md-6 form-group mb-3">
                                    <label for="firstName2">First name</label>
                                    <input type="text"  name="name" class="form-control form-control-rounded @error('name') is-invalid @enderror" id="firstName2" type="text" placeholder="Enter your first name" value="{{ old('name') }}" autocomplete="name" autofocus />
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="exampleInputEmail2">User ID</label>
                                    <input type="email"  name="email" class="form-control form-control-rounded"required/>
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="exampleInputEmail2">Password</label>
                                    <input type="password"  name="password" class="form-control form-control-rounded "required/>
                                </div>

                                


                                <div class="col-md-6 form-group mb-3">
                                    <label for="firstName2">Address</label>
                                    <input type="text"  name="address" class="form-control form-control-rounded"required/>
                                </div>


<div class="col-md-6 form-group mb-3">
                                    <label for="firstName2">Phone</label>
                                    <input type="text"  name="phone" class="form-control form-control-rounded"required/>
                                </div>









<div class="col-md-6 form-group mb-3">
                                    <label for="firstName2">City</label>
                                    <input type="text"  name="city" class="form-control form-control-rounded "required/>
                                </div>




<div class="col-md-6 form-group mb-3">
                                    <label for="firstName2">Country</label>
                                    <input type="text"  name="country" class="form-control form-control-rounded "required/>
                                </div>

<div class="col-md-6 form-group mb-3">
                                    <label for="firstName2">Date Of Birth</label>
                                    <input type="date"  name="dob" class="form-control form-control-rounded "required/>
                                </div>


                                <div class="col-md-6 form-group mb-3">
                                    <label for="firstName2">State</label>
                                    <input type="text"  name="state" class="form-control form-control-rounded"required/>
                                   
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="role"> Role</label>
                                    <select class="form-control form-control-rounded @error('role') is-invalid @enderror" id="role" name="role">
                                       
                                            <option value="1">User</option>
                                             <option value="2">Collector</option>
                                              <option value="3">Super-Admin</option>
                                            
                                        
                                    </select>
                                    @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- end of main-content -->


@endsection