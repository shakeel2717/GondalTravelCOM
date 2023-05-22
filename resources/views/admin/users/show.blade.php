@extends('dashboard.admin')

@section('content')
    <div class="dashboard-content-wrap">
        <div class="dashboard-bread dashboard--bread dashboard-bread-2">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="breadcrumb-content">
                            <div class="section-heading">
                                <h2 class="sec__title font-size-30 text-white">Travellers</h2>
                            </div>
                        </div><!-- end breadcrumb-content -->
                    </div><!-- end col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="breadcrumb-list text-right">
                            <ul class="list-items">
                                <li><a href="index.html" class="text-white">Home</a></li>
                                <li>Travellers</li>
                            </ul>
                        </div><!-- end breadcrumb-list -->
                    </div><!-- end col-lg-6 -->
                </div><!-- end row -->
            </div>
        </div><!-- end dashboard-bread -->
        <div class="dashboard-main-content">
            @include('partials.alerts')
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-box">
                            <div class="form-title-wrap">
                                <div>
                                    <h3 class="title">User Travels </h3>
                                </div>
                            </div>
                            <div class="form-content">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="col-lg-6 responsive-column">
                                                    <div class="input-box">
                                                        <label class="label-text">Full Name</label>
                                                        <div class="form-group">
                                                            <p class="form-control" type="text">
                                                                {{$user->name}}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div><!-- end col-lg-6 -->
                                                <div class="col-lg-6 responsive-column">
                                                    <div class="input-box">
                                                        <label class="label-text">Email Address</label>
                                                        <div class="form-group">
                                                            <p class="form-control" type="text">
                                                                {{$user->email}}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div><!-- end col-lg-6 -->
                                                <div class="col-lg-6 responsive-column">
                                                    <div class="input-box">
                                                        <label class="label-text">Phone number</label>
                                                        <div class="form-group">
                                                            <p class="form-control" type="text">
                                                                {{$user->phone}}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div><!-- end col-lg-6 -->
                                                <div class="col-lg-6 responsive-column">
                                                    <div class="input-box">
                                                        <label class="label-text">Date of birth</label>
                                                        <div class="form-group">

                                                            <p class="form-control" type="text">
                                                                {{$user->dob}}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div><!-- end col-lg-6 -->
                                                <div class="col-lg-6 responsive-column">
                                                    <div class="input-box">
                                                        <label class="label-text">Country</label>
                                                        <div class="form-group">
                                                            <p class="form-control" type="text">
                                                                {{$user->country}}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div><!-- end col-lg-6 -->

                                            </div>
                                            <div class="col-lg-6">
                                                <div class="col-lg-6 responsive-column">
                                                    <div class="input-box">
                                                        <label class="label-text">City</label>
                                                        <div class="form-group">

                                                            <p class="form-control" type="text">
                                                                {{$user->city}}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div><!-- end col-lg-6 -->
                                                <div class="col-lg-6 responsive-column">
                                                    <div class="input-box">
                                                        <label class="label-text">State</label>
                                                        <div class="form-group">
                                                            <p class="form-control" type="text">
                                                                {{$user->state}}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div><!-- end col-lg-6 -->
                                                <div class="col-lg-6 responsive-column">
                                                    <div class="input-box">
                                                        <label class="label-text">Address</label>
                                                        <p class="form-control" type="text"
                                                        >
                                                            {{$user->address}}"
                                                        </p>
                                                    </div>
                                                </div><!-- end col-lg-6 -->
                                                <div class="col-lg-6 responsive-column">
                                                    <label class="label-text">Role</label>
                                                    <p class="form-control">{{$user->roles->pluck('name')->first()}}</p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                    <h6>This User Travels</h6>
                                <br>
                                    <div class="table-form table-responsive">
                                        <table class="table" id="user_detail">
                                            <thead>
                                            <tr>
                                                <th scope="col">Type</th>
                                                <th scope="col">Id</th>
                                                <th scope="col">PRN-NO</th>
                                                <th scope="col">Title</th>
                                                <th scope="col">Location</th>
                                                <th scope="col">Order Date</th>
                                                <th scope="col">Departure Date</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Passengers On This Ticket</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Payment Status</th>
                                                <th scope="col">Payment Method</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($user->passengerTickets->unique('ticket_id') as $booking)
                                                <tr>
                                                    <th scope="row"><i class="fa fa-plane mr-1 font-size-18"></i>Flight
                                                    </th>
                                                    <th scope="row">{{$booking->id}}</th>

                                                    <th scope="row">{{$booking->ticket->prn_no}}</th>
                                                    <td>
                                                        <div class="table-content">
                                                            <h3 class="title">{{$booking->ticket->from}}
                                                                to {{$booking->ticket->to}}</h3>
                                                        </div>
                                                    </td>
                                                    <td>{{$booking->user->country}}/ {{$booking->user->city}}</td>
                                                    <td>{{$booking->created_at->format('Y-D-M')}}</td>
                                                    <td>{{str_replace('T','  ',$booking->ticket->departure)}}</td>
                                                    <td>$ {{$booking->ticket->sum('amount')}}</td>
                                                    <td>{{$booking->passenger->count()}}</td>
                                                    <td><span
                                                            class="{{$booking->ticket->status == false ? 'badge badge-success py-1 px-2' : 'badge badge-danger py-1 px-2'}}">
                                                    {{$booking->ticket->status == false ? 'Pending' : 'Cancelled'}}</span>
                                                    </td>
                                                    <td>
                                                <span
                                                    class="{{$booking->ticket->payment_status == false ? 'badge badge-danger py-1 px-2' : 'badge badge-success py-1 px-2'}}">
                                                    {{$booking->ticket->payment_status == false ? 'UN-PAID' : 'PAID'}}</span>
                                                    </td>
                                                    <td>{{$booking->ticket->payment_method}}</td>
                                                    <td>
                                                        <div class="table-content">
                                                            <form action="{{route('flight.cancel')}}" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="ticket_id"
                                                                       value="{{$booking->ticket->id}}">
                                                                <button type="submit"
                                                                        class="theme-btn theme-btn-small">Cancel
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                <br>

                                <h6>This User Passengers</h6>
                                <br>

                                <div class="table-form table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th scope="col">Type</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">DOB</th>
                                                <th scope="col">Contact no</th>
                                                <th scope="col">Address</th>
                                                <th scope="col">Country / City</th>
                                                <th scope="col">ID Name</th>
                                                <th scope="col">ID_No</th>
                                                <th scope="col">Age Group</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($user->passengerTickets as $booking)
                                                <tr>
                                                    <th scope="row"><i class="fa fa-user mr-1 font-size-18"></i>Passenger
                                                    </th>
                                                    <th scope="row">{{$booking->id}}</th>
                                                    <td>
                                                        <div class="table-content">
                                                            <h3 class="title">{{$booking->passenger->name}}
                                                                to {{$booking->passenger->email}}</h3>
                                                        </div>
                                                    </td>
                                                    <td>{{$booking->passenger->dob}}</td>
                                                    <td>{{$booking->passenger->contact_no}}</td>
                                                    <td>{{$booking->passenger->address}}</td>
                                                    <td>{{$booking->passenger->country}}
                                                        / {{$booking->passenger->city}}</td>
                                                    <td>$ {{$booking->passenger->id_name}}</td>
                                                    <td>{{$booking->passenger->id_number}}</td>
                                                    <td>{{$booking->passenger->age_group}}</span>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>


                            </div><!-- end form-box -->
                        </div><!-- end col-lg-12 -->
                    </div><!-- end row -->
                    <div class="row">
                    </div>
                    <!-- end row -->
                </div><!-- end container-fluid -->
            </div><!-- end dashboard-main-content -->
        </div><!-- end dashboard-content-wrap -->

@endsection
