@extends('dashboard.admin')

@section('content')



  <form class="forms-sample" method="POST" action="{{route('selectcollector')}}" enctype="multipart/form-data">
  	@csrf
  	                @if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif
        <div class="row">

      
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-title mb-3">Create New Flight Package</div>

                            @csrf()
                             <div class="form-group">
                               

                                    <select class="form-control" name="collector">
                     <option selected disabled> Select Collector</option>

                  @foreach($collectors as $collector)

                

                 <option value="{{$collector->id}}">
                   {{$collector->name}}
                 </option>
    
                  @endforeach

                                                                  
                                                             </select>
                            </div>




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