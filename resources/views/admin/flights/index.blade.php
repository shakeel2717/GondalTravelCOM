@extends('dashboard.admin')

@section('content')
    <div class="dashboard-bread dashboard--bread">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="breadcrumb-content">
                        <div class="section-heading">
                            <h2 class="sec__title font-size-30 text-white">Admin Created Flights
                            </h2>
                        </div>
                    </div><!-- end breadcrumb-content -->
                </div><!-- end col-lg-6 -->
                <div class="col-lg-6">
                    <div class="breadcrumb-list text-right">
                        <ul class="list-items">
                            <li>Home</li>
                            <li>Admin Created Flights</li>
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
                                    <a href="{{route('products.create')}}" class="btn btn-primary ml-2 float-right">Add New</a>
                                </h3>
                            </div>
                        </div>
                        <div class="form-content">
                            @include('partials.alerts')
                            <div class="table-form table-responsive">
                                <table class="table" id="flights">
                                    <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">To</th>
                                        <th scope="col">From</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Flight Number</th>
                                        <th scope="col">Coach</th>
                                        <th scope="col">Departure</th>
                                        <th scope="col">Arrival</th>
                                        <th scope="col">Airline</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($flights as $product)
                                        <tr>
                                            <td>{{$product->id}}</td>
                                            <td>{{$product->to}}</td>
                                            <td>{{$product->from}}</td>
                                            <td>{{$product->price}}</td>
                                            <td>{{$product->flight_number}}</td>
                                            <td>{{$product->coach}}</td>
                                            <td>{{$product->departure}}</td>
                                            <td>{{$product->arrival}}</td>
                                            <td>{{$product->airline}}</td>
                                            <td>
                                                <div style="display: flex">
                                                    <a href="{{route('products.edit', $product)}}"
                                                       class="btn btn-primary"><i class="fa fa-pen"></i></a>
                                                    <form method="POST" action="{{route('products.destroy', $product)}}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-primary ml-2"><i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
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
