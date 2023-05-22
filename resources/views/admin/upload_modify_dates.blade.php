 @extends('dashboard.admin')

@section('content')


@if(isset($return))
 ----
@else 

<div class="row">
    
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-title mb-3"><h3>Change Dates</h3></div>
                          @if($pnrr!=null)
                      @php
                      $upload = App\Models\ticketupload::where('pnr_number',$pnrr)->first();
                      @endphp
                      @if($upload!=null)
                      <div>
                       <h4>Pnr : {{$upload->pnr_number}}</h4>
                      </div>
                          @endif
                      @endif
                        <form class="forms-sample" method="POST" action="{{route('uploadticket_post',$ticket)}}" enctype="multipart/form-data">
                            @csrf()
                            <div class="row">
                      
                    <div class="col-md-6 form-group mb-3">
                                    <label for="riderAddress">New Pnr_Number</label>

                                    <input type="text"  name="pnr" class="form-control form-control @error('address') is-invalid @enderror" id="riderAddress" placeholder="Enter pnr number" value="" autocomplete="address" autofocus/>

                                   
                                </div>


<!--<div class="col-md-6 form-group mb-3">-->
<!--                                    <label for="riderName">Upload Ticket</label>-->
<!--                                    <input type="file"  name="ticket" class="form-control form-control @error('name') is-invalid @enderror" id="ticket" type="text" placeholder="Enter your rider name" value="" autocomplete="name" autofocus />-->
<!--                                    @error('name')-->
<!--                                    <span class="invalid-feedback" role="alert">-->
<!--                                        <strong>{{ $message }}</strong>-->
<!--                                    </span>-->
<!--                                    @enderror-->
<!--                                </div>-->
                               
                                
                                 <div class="col-md-6 form-group mb-3">
                                    <label for="riderAddress">Departure-Date</label>

                                      

                                    <label for="birthdaytime">(date and time):</label>
  <input type="datetime-local" id="birthdaytime" class="form-control form-control" name="fromDate2">
                                </div>
                                
                                
                                     <div class="col-md-6 form-group mb-3">
                                    <label for="riderAddress">Landing-Date</label>

                                      

                                    <label for="birthdaytime">(date and time):</label>
  <input type="datetime-local" id="birthdaytime" class="form-control form-control" name="toDate2">
                                </div>
                                
                                
                               
                                
                                <!-- <div class="col-md-6 form-group mb-3">-->
                                <!--    <label for="riderAddress">Return Date </label>-->

                                <!--    <input type="text"  name="returndate" class="form-control form-control @error('address') is-invalid @enderror" id="riderAddress" placeholder="Enter pnr number" value="" autocomplete="address" autofocus/>-->

                                   
                                <!--</div>-->
<!--<input type="hidden" value="{{$pnrr}}" name="pnr" />-->
 <input type="hidden" value="{{$pnrr}}" name="pnrr" />
                                 <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>

                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>

@endif

            @endsection