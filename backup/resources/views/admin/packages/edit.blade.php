@extends('dashboard.admin')

@section('content')



  <form class="forms-sample" method="POST" action="{{route('package.edit_post')}}" enctype="multipart/form-data">
        <div class="row">
            
            <input type="hidden" name="id"  value="{{$flight->id}}" ">
            
            
            <div class="col-md-9">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-title mb-3">Edit Flight Package</div>

                            @csrf()
                             <div class="form-group">
                                <label>Title</label>

                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter New Product Name" value="{{ $flight->name }}" aria-label="name">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                           

<div class="form-group">
                                <label>Flight To</label>

                                <input type="text" name="to" class="form-control @error('to') is-invalid @enderror" placeholder="Enter New Product Name" value="{{$flight->flight_to}}" aria-label="to">
                                @error('to')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                       

                       <div class="form-group">
                                <label>Flight From</label>

                                <input type="text" name="from" class="form-control @error('from') is-invalid @enderror" placeholder="Enter New Product Name" value="{{$flight->flight_from}}" aria-label="to">
                                @error('from')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
  <div class="form-group">
                            <label for="selectStatus">Select Way of flight</label>
                            <select class="form-control @error('status') is-invalid @enderror" id="selectStatus" name="way">
                                <option selected disabled> {{$flight->way_of_flight}} </option>
                                <option value="roundtrip"> Round-Trip </option>
                                <option value="oneway"> One-Way </option>
                            </select>
                            @error('status')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

   <div class="form-group">
                                <label>Total Stops</label>

                                <input type="number" name="stops" class="form-control @error('stops') is-invalid @enderror" placeholder="Enter New Product Name" value="{{$flight->total_stops}}" aria-label="stops">
                                @error('stops')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                       
                    <div class="form-group">
                                <label>Take Off Time</label>

                                <input type="text" name="takeoff" class="form-control @error('takeoff') is-invalid @enderror" placeholder="Enter New Product Name" value="{{$flight->take_off_time}}" aria-label="takeoff">
                                @error('takeoff')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                             <div class="form-group">
                                <label>Land Time</label>

                                <input type="text" name="land" class="form-control @error('land') is-invalid @enderror" placeholder="Enter New Product Name" value="{{$flight->land_time}}" aria-label="land">
                                @error('land')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                       

                           <div class="form-group">
                              <label for="start">Start date:</label>

<input type="date" class="form-control" id="start" name="date"value="{{$flight->date_of_flight}}">
                            </div>

                            <div class="form-group">
                              <label for="start">Duration:</label>

<input type="text" class="form-control" id="duration" name="duration"value="{{$flight->duration}}">
                            </div>
                       
                       

<!-- 
                            <div class="form-group">
                                <label>Description</label>

                                <textarea name="description" id="tiny" class="form-control @error('description') is-invalid @enderror"  value="{{ old('description') }}" aria-label="description" rows="15"> </textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
 -->


                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-title mb-3">Status</div>
                        <div class="form-group">
                            <label for="selectStatus">Select Status</label>
                            <select class="form-control @error('status') is-invalid @enderror" id="selectStatus" name="status">
                                <option selected disabled> Select Status </option>
                                <option value="1"> Active </option>
                                <option value="0"> In Active </option>
                            </select>
                            @error('status')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                         <div class="form-group">
                            <label for="product_weight">Image 1 </label>
                            <input type="file" name="image1" class="form-control @error('image1') is-invalid @enderror" placeholder="Enter Product Weight" value="" aria-label="product_weight">
                            @error('image1')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                       <div class="form-group">
                            <label> Airline </label>

                            <input type="text" name="airline" id="airline" class="form-control " placeholder="Enter Price Here" value="{{$flight->airline}}" aria-label="airline">
                            @error('airline')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                          <div class="form-group">
                            <label> Flight Number </label>

                            <input type="text" name="flightnumber" id="flightnumber" class="form-control " placeholder="Enter Price Here" value="{{$flight->flight_number}}" aria-label="flightnumber">
                            @error('flightnumber')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

 <div class="form-group">
                            <label> Air Craft </label>

                            <input type="text" name="aircraft" id="aircraft" class="form-control " placeholder="Enter Aircraft" value="{{$flight->aircraft}}" aria-label="aircraft">
                            @error('aircraft')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>






 <div class="form-group">
                            <label>Flight-Type </label>

                            <input type="text" name="flighttype" id="flighttype" class="form-control " placeholder="Enter Price Here" value="{{$flight->flighttype}}" aria-label="flighttype"required>
                            @error('flighttype')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>



                        <div class="form-group">
                            <label>Total Seats </label>

                            <input type="text" name="seats" id="seats" class="form-control " placeholder="Enter Price Here" value="{{$flight->seats_left}}" aria-label="seats">
                            @error('seats')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>


                           <div class="form-group">
                            <label>Adult Baggage </label>

                            <input type="text" name="adultbaggage" id="adultbaggage" class="form-control " placeholder="Enter Price Here" value="{{$flight->adult_baggage}}" aria-label="adultbaggage">
                            @error('adultbaggage')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>


    <div class="form-group">
                            <label>Adults </label>

                            <input type="text" name="adult" id="adult" class="form-control " placeholder="Enter Price Here" value="{{$flight->adults}}" aria-label="adult">
                            @error('adult')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Childrens</label>

                            <input type="text" name="children" id="children" class="form-control " placeholder="Enter Price Here" value="{{$flight->childrens}}" aria-label="children">
                            @error('children')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                          <div class="form-group">
                            <label>Infants</label>

                            <input type="text" name="infant" id="infant" class="form-control " placeholder="Enter Price Here" value="{{$flight->infants}}" aria-label="infant">
                            @error('infant')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>





                        <div class="form-group">
                            <label> Price</label>

                            <input type="text" name="price" id="price" class="form-control @error('price') is-invalid @enderror" placeholder="Enter Price Here" value="{{$flight->price}}" aria-label="price">
                            @error('price')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>







@endsection