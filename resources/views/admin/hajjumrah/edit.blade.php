@extends('dashboard.admin')

@section('content')



  <form class="forms-sample" method="POST" action="{{route('hajjumrah.edit_post')}}" enctype="multipart/form-data">
        <div class="row">
            
            <input type="hidden" name="id"  value="{{$flight->id}}" ">
            
            
            <div class="col-md-9">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-title mb-3">Edit HajjUmrah Package </div>

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
                            <label>Description</label>

                            <input type="text" name="description" class="form-control @error('description') is-invalid @enderror"
                                   placeholder="Enter description"value="{{$flight->hajjumrah->description}}" aria-label="description">
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        
                        
                        
                        <div class="form-group">
                            <label>Makkah Hotel Name</label>

                            <input type="text" name="makkah_hotel_name" class="form-control @error('makkah_hotel_name') is-invalid @enderror"
                                   placeholder="Enter makkah_hotel_name" value="{{$flight->hajjumrah->makkah_hotel_name}}" aria-label="total_stay">
                            @error('makkah_hotel_name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        
                         <div class="form-group">
                            <label>Makkah Night Stay</label>

                            <input type="text" name="makkah_night_stay" class="form-control @error('makkah_night_stay') is-invalid @enderror"
                                   placeholder="Enter makkah_night_stay" value="{{$flight->hajjumrah->makkah_night_stay}}" aria-label="total_stay">
                            @error('makkah_night_stay')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label>Makkah Distance</label>

                            <input type="text" name="makkah_distance" class="form-control @error('makkah_distance') is-invalid @enderror"
                                   placeholder="Enter makkah_distance" value="{{$flight->hajjumrah->makkah_distance}}" aria-label="total_stay">
                            @error('makkah_distance')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        
                        
                         <div class="form-group">
                            <label>Madina Hotel Name</label>

                            <input type="text" name="madina_hotel_name" class="form-control @error('madina_hotel_name') is-invalid @enderror"
                                   placeholder="Enter madina_hotel_name" value="{{$flight->hajjumrah->madina_hotel_name}}" aria-label="total_stay">
                            @error('madina_hotel_name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        
                         <div class="form-group">
                            <label>Madina Night Stay</label>

                            <input type="text" name="madina_night_stay" class="form-control @error('madina_night_stay') is-invalid @enderror"
                                   placeholder="Enter madina_night_stay" value="{{$flight->hajjumrah->madina_night_stay}}" aria-label="total_stay">
                            @error('madina_night_stay')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label>Madina Distance</label>

                            <input type="text" name="madina_distance" class="form-control @error('madina_distance') is-invalid @enderror"
                                   placeholder="Enter madina_distance" value="{{$flight->hajjumrah->madina_distance}}" aria-label="total_stay">
                            @error('madina_distance')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label>Chamber Room Price (single)</label>

                            <input type="number" name="chamber_room_price_1" class="form-control @error('chamber_room_price_1') is-invalid @enderror"
                                   placeholder="Enter madina_distance" value="{{$flight->hajjumrah->chamber_room_price_1}}" aria-label="chamber_room_price_1">
                            @error('chamber_room_price_1')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        
                        
                        <div class="form-group">
                            <label>Chamber Room Price (double)</label>

                            <input type="number" name="chamber_room_price_2" class="form-control @error('chamber_room_price_2') is-invalid @enderror"
                                   placeholder="Enter madina_distance" value="{{$flight->hajjumrah->chamber_room_price_2}}" aria-label="chamber_room_price_2">
                            @error('chamber_room_price_2')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        
                        
                        <div class="form-group">
                            <label>Chamber Room Price (triple)</label>

                            <input type="number" name="chamber_room_price_3" class="form-control @error('chamber_room_price_3') is-invalid @enderror"
                                   placeholder="Enter madina_distance" value="{{$flight->hajjumrah->chamber_room_price_3}}" aria-label="chamber_room_price_3">
                            @error('chamber_room_price_3')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        
                        
                        <div class="form-group">
                            <label>Chamber Room Price (quadurple)</label>

                            <input type="number" name="chamber_room_price_4" class="form-control @error('chamber_room_price_4') is-invalid @enderror"
                                   placeholder="Enter madina_distance" value="{{$flight->hajjumrah->chamber_room_price_4}}" aria-label="chamber_room_price_4">
                            @error('chamber_room_price_4')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        
                        
                         <div class="form-group">
                            <label>Start Date</label>

                            <input type="date" name="start_date" class="form-control @error('start_date') is-invalid @enderror"
                                    value="{{ old('start_date') }}" aria-label="name">
                            @error('start_date')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                             <div class="form-group">
                            <label>End Date</label>

                            <input type="date" name="end_date" class="form-control @error('end_date') is-invalid @enderror"
                                    value="{{ old('end_date') }}" aria-label="name">
                            @error('end_date')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        
                        
                          <div class="form-group">
                            <label>Total Stay</label>

                            <input type="text" name="total_stay" class="form-control @error('total_stay') is-invalid @enderror"
                                   placeholder="Enter total_stay"value="{{$flight->hajjumrah->total_stay}}" aria-label="total_stay">
                            @error('total_stay')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                      
                              <div class="form-group">
                            <label>Airline For Going</label>

                            <input type="text" name="airline_going" class="form-control @error('airline_going') is-invalid @enderror"
                                   placeholder="Enter airline_going" value="{{$flight->hajjumrah->airline_going}}" aria-label="airline_going">
                            @error('airline_going')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                            <div class="form-group">
                            <label>Airline For Returning</label>

                            <input type="text" name="airline_return" class="form-control @error('airline_return') is-invalid @enderror"
                                   placeholder="Enter airline_return" value="{{$flight->hajjumrah->airline_return}}" aria-label="airline_return">
                            @error('airline_return')
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