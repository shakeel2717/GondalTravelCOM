@extends('dashboard.admin')

@section('content')

    @if(Session::has('message'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
    @endif

    <style>
        .imi {
            width: 10px !important;
            height: 10px !important;

        }
    </style>
    <div class="dashboard-bread dashboard--bread">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="breadcrumb-content">
                        <div class="section-heading">
                            <h2 class="sec__title font-size-30 text-white">All HajjUmrah Flights
                            </h2>
                        </div>
                    </div><!-- end breadcrumb-content -->
                </div><!-- end col-lg-6 -->
                <div class="col-lg-6">
                    <div class="breadcrumb-list text-right">
                        <ul class="list-items">
                            <li>Home</li>
                            <li> Flight Packages</li>
                        </ul>
                    </div><!-- end breadcrumb-list -->
                </div><!-- end col-lg-6 -->
            </div><!-- end row -->
        </div>
    </div>
    <div class="dashboard-main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-box">
                        <div class="form-title-wrap">
                            <div class="d-flex align-items-center justify-content-between">
                                <h3 class="sec__title font-size-30 text-dark">Admin Created Flights
                                    <a href="{{route('create.hajjumrah')}}" class="btn btn-primary ml-2 float-right">Add
                                        New</a>
                                </h3>
                            </div>
                        </div>
                        <div class="form-content">
                            @include('partials.alerts')


                            <div class="table-responsive">
                                <table class="display table table-striped table-bordered" id="zero_configuration_table"
                                       style="width:100%">
                                    <thead>
                                    <tr>
                                     
                                        <th>Image</th>
                                        <th>title</th>
                                        <th>Makkah Hotel</th>
                                        <th>Madina Hotel</th>
                                        <th>total_stay</th>
                                        <th>airline_going</th>
                                        <th>airline_return</th>
                                        <th>price_from</th>
                                        <th>start_date</th>
                                        <th>end_date</th>
                                        
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($flight as $flights)
                                        <tr>
                                            <td>
                                                <div class="img-responsive img-rounded">
                                                    <img src="{{ url($flights->image) }}"
                                                         style="height: 70px; width: 85px;" alt="cnic image not found"/>
                                                </div>
                                            </td>
                                            <td>{{$flights->title}}</td>

                                            <td>{{$flights->hajjumrah->makkah_hotel_name}}</td>
                                            <td>{{$flights->hajjumrah->madina_hotel_name}}</td>
                                              <td>{{$flights->hajjumrah->total_stay}}</td>
                                              <td>{{$flights->hajjumrah->airline_going}}</td>
                                            <td>{{$flights->hajjumrah->airline_return}}</td>
                                              <td>{{$flights->hajjumrah->price_from}}</td>
                                             <td>{{$flights->hajjumrah->start_date}}</td>
                                             <td>{{$flights->hajjumrah->end_date}}</td>
                                        
                                            <td><a href="{{route('edit.hajjumrah', $flights->id )}}"
                                                   class="btn btn-primary" style="color: white"><i
                                                        class="nav-icon i-Pen-2 font-weight-bold"></i>Edit</a>
                                                <a href="{{route('delete.hajjumrah', $flights->id )}}"
                                                   class="btn btn-danger" style="color: white"><i
                                                        class="nav-icon i-Pen-2 font-weight-bold"></i>Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Image</th>
                                        <th>title</th>
                                        <th>Makkah Hotel</th>
                                        <th>Madina Hotel</th>
                                        <th>total_stay</th>
                                        <th>airline_going</th>
                                        <th>airline_return</th>
                                        <th>price_from</th>
                                        <th>start_date</th>
                                        <th>end_date</th>
                                        
                                        <th>Actions</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>


                        </div>
                    </div><!-- end form-box -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
            <div class="row">
            </div><!-- end row -->

        </div><!-- end container-fluid -->
    </div>
@endsection


