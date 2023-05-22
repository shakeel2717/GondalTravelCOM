 @extends('dashboard.admin')

@section('content')


@if(isset($return))
 ----
@else

<div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-title mb-3"><h3>Upload Ticket</h3></div>
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
                                    <label for="riderAddress">New Pnr_Number</label>

                                    <input type="text"  name="pnr" class="form-control form-control @error('address') is-invalid @enderror" id="riderAddress" placeholder="Enter pnr number" value="" autocomplete="address" autofocus/>


                                </div>

  <!--                               <div class="col-md-6 form-group mb-3">-->
  <!--                                  <label for="riderAddress">Departure-Date</label>-->



  <!--                                  <label for="birthdaytime">(date and time):</label>-->
  <!--<input type="datetime-local" id="birthdaytime" class="form-control form-control" name="fromDate">-->
  <!--                              </div>-->


  <!--                                   <div class="col-md-6 form-group mb-3">-->
  <!--                                  <label for="riderAddress">Landing-Date</label>-->



  <!--                                  <label for="birthdaytime">(date and time):</label>-->
  <!--<input type="datetime-local" id="birthdaytime" class="form-control form-control" name="toDate">-->
  <!--                              </div>-->


                                <div class="col-md-6 form-group mb-3">
                                    <label for="riderAddress">Airline</label>

                                    <input type="text"  name="name" class="form-control form-control @error('address') is-invalid @enderror" id="riderAddress" placeholder="Enter pnr number" value="{{$data['name'][0]}}" autocomplete="address" autofocus/>


                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="riderAddress">Airline Code</label>

                                    <input type="text"  name="fcode" class="form-control form-control @error('address') is-invalid @enderror" id="riderAddress" placeholder="Enter pnr number" value="{{ $data['fcode']}}" autocomplete="address" autofocus/>


                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="riderAddress">Aircraft</label>

                                    <input type="text"  name="aircraft" class="form-control form-control @error('address') is-invalid @enderror" id="riderAddress" placeholder="Enter pnr number" value="{{ $data['aircraft'][0]}}" autocomplete="address" autofocus/>


                                </div>

                                      <div class="col-md-6 form-group mb-3">
                                    <label for="riderAddress">Flight Number</label>

                                    <input type="text"  name="fnumber" class="form-control form-control @error('address') is-invalid @enderror" id="riderAddress" placeholder="Enter pnr number" value="{{ $data['fnumber'][0]}}" autocomplete="address" autofocus/>


                                </div>


                                 <div class="col-md-6 form-group mb-3">
                                    <label for="riderAddress">Departure</label>

                                    <input type="text"  name="from" class="form-control form-control @error('address') is-invalid @enderror" id="riderAddress" placeholder="Enter pnr number" value="{{ $data['from'][0] }}" autocomplete="address" autofocus/>


                                </div>


                                <div class="col-md-6 form-group mb-3">
                                    <label for="riderAddress">Destination</label>

                                    <input type="text"  name="to" class="form-control form-control @error('address') is-invalid @enderror" id="riderAddress" placeholder="Enter pnr number" value="{{ $data['to'][0] }}" autocomplete="address" autofocus/>


                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="riderAddress">Total-Time</label>

                                    <input type="text"  name="time" class="form-control form-control @error('address') is-invalid @enderror" id="riderAddress" placeholder="Enter pnr number" value="{{ $data['time'] }}" autocomplete="address" autofocus/>


                                </div>

                                 <div class="col-md-6 form-group mb-3">
                                    <label for="riderAddress">Land-Time</label>

                                    <input type="text"  name="landT" class="form-control form-control @error('address') is-invalid @enderror" id="riderAddress" placeholder="Enter pnr number" value="{{ $data['landT'] }}" autocomplete="address" autofocus/>


                                </div>

                                 <div class="col-md-6 form-group mb-3">
                                    <label for="riderAddress">Land-Day</label>

                                    <input type="text"  name="landD" class="form-control form-control @error('address') is-invalid @enderror" id="riderAddress" placeholder="Enter pnr number" value="{{ $data['landD'] }}" autocomplete="address" autofocus/>


                                </div>


                                <div class="col-md-6 form-group mb-3">
                                    <label for="riderAddress">Contact # </label>

                                    <input type="text"  name="contact_no" class="form-control form-control @error('address') is-invalid @enderror" id="riderAddress" placeholder="Enter pnr number" value="{{$passengers->contact_no}}" autocomplete="address" autofocus/>


                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="riderAddress">Email </label>

                                    <input type="text"  name="email" class="form-control form-control @error('address') is-invalid @enderror" id="riderAddress" placeholder="Enter pnr number" value="{{$passengers->email}}" autocomplete="address" autofocus/>


                                </div>

                                <!-- <div class="col-md-6 form-group mb-3">-->
                                <!--    <label for="riderAddress">Return Date </label>-->

                                <!--    <input type="text"  name="returndate" class="form-control form-control @error('address') is-invalid @enderror" id="riderAddress" placeholder="Enter pnr number" value="" autocomplete="address" autofocus/>-->


                                <!--</div>-->

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
