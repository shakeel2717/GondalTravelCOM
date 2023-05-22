@extends('dashboard.admin')

@section('content')



  <form class="forms-sample" method="POST" action="{{route('selectcollector_post')}}" enctype="multipart/form-data">
  	@csrf

        <div class="row">

                      @if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-title mb-3">Add Payments To Collector {{$collector}}</div>
<h5>
                       @php 
                       $totalcash= DB::table('collectorcashinhands') ->where('collector_id',$collector)->sum('total_cash_in_hand');
                       @endphp
Total Cash Collector have {{$totalcash}}
                    </h5>

                            @csrf()
                            
                               

                      <div class="form-group">
                            <label for="qrcode">Paid Amount </label>
            <input type="number" name="paid" class="form-control @error('quantity') is-invalid @enderror" placeholder="Enter Paid Amount" value=""id="selectQuantity">
                           
                        </div>
                        
                          <div class="form-group">
                            <label for="qrcode">Reason </label>
            <input type="text" name="reason" class="form-control @error('quantity') is-invalid @enderror" placeholder="Enter Reason" value=""id="selectQuantity">
                           
                        </div>


                      

                         <input type="hidden" name="collectorid" class="form-control @error('quantity') is-invalid @enderror" placeholder="Enter Paid Amount" value="{{$collector}}">
                       




                                    <div class="col-lg-12">
                                        <div class="btn-box">
                                            <button class="theme-btn float-right" type="submit">Submit</button>
                                        </div>
                                    </div><!-- end col-lg-12 -->
                        </div>
                    </div>
                </div>
            </div>
        </form>




@endsection