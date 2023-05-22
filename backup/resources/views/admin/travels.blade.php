@extends('dashboard.admin')
@section('content')
<div class="dashboard-bread dashboard--bread">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="breadcrumb-content">
                    <div class="section-heading">
                        <h2 class="sec__title font-size-30 text-white">My Booking</h2>
                    </div>
                </div><!-- end breadcrumb-content -->
            </div><!-- end col-lg-6 -->
            <div class="col-lg-6">
                <div class="breadcrumb-list text-right">
                    <ul class="list-items">
                        <li><a href="{{route('index')}}" class="text-white">Home</a></li>
                        <li>My Booking</li>
                    </ul>
                </div><!-- end breadcrumb-list -->
            </div><!-- end col-lg-6 -->
        </div><!-- end row -->
    </div>
</div>
<div class="dashboard-main-content">
    <div class="container-fluid">
        <div class="row">
            @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
            @endif
            <div class="col-lg-12">
                <div class="form-box">
                    <div class="form-title-wrap">
                        <div class="container mt-5">
                            <h2 class="mb-4">Booking History</h2>
                            <table class="table table-bordered yajra-datatable table-responsive">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>PNR NO.</th>
                                        <th>Reference No.</th>
                                        <th>Passenger Name</th>
                                        <th>Passenger Contact Number</th>
                                        <th>Payment Method</th>
                                        <th>Payment Status</th>
                                        <th>Amount</th>
                                        <th>Confirmation</th>
                                        <th>Booked At</th>
                                        <th>Company</th>
                                        <th>Ticket Number</th>
                                        <th>Destination</th>
                                        <th>Departure Date</th>
                                        <th>Return Date</th>
                                        <th>Passenger Surame</th>
                                        <th>Admin Price</th>
                                        <th>Admin Profit</th>
                                        <th>Collector Profit</th>
                                        <th>Total Amount</th>
                                        <th>Payment iata</th>
                                        <th>Issued From</th>
                                        <th>Ticket Status</th>
                                        <th>Reminder</th>
                                        <th>Last Tickting Date</th>
                                        <th>Remarks</th>
                                        <th>Action</th>
                                        <th>View</th>
                                        <!--<th>Action</th>-->
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div><!-- end form-box -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container-fluid -->
    </div>
    @endsection
    @section('datatable')
    <script type="text/javascript">
        $(function() {
            var table = $('.yajra-datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('all-user-history.list') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'prn_no',
                        name: 'prn_no',
                        render: function(data, type, row) {
                            return "<a href='/dashboard/admin/Ticket/" + data + "'>" + data + "</a>"
                        }
                    },

                    {
                        data: 'id',
                        name: 'ref_no',
                        render: function(data, type, row) {
                            return "786" + data
                        }
                    },

                    {
                        data: 'p_name',
                        name: 'p_name'
                    },
                    {
                        data: 'contact_no',
                        name: 'contact_no'
                    },
                    {
                        data: 'payment_method',
                        name: 'payment_method'
                    },

                    {
                        data: 'payment_status',
                        name: 'payment_status',
                        render: function(data, type, row) {
                            var sta;
                            if (data === 'Paid')
                                sta = 'badge-success';
                            else
                                sta = 'badge-danger';
                            return '<span class="badge ' + sta + ' py-1 px-2">' + data + '</span>'
                        }
                    },

                    {
                        data: 'amount',
                        name: 'amount'
                    },
                    {
                        data: 'confirmation',
                        name: 'confirmation'
                    },
                    {
                        data: 'date',
                        name: 'date'
                    },
                    {
                        data: 'company',
                        name: 'company'
                    },
                    {
                        data: 'ticket_num',
                        name: 'ticket_num'
                    },
                    {
                        data: 'destination',
                        name: 'destination'
                    },
                    {
                        data: 'departure_date',
                        name: 'departure_date'
                    },
                    {
                        data: 'return_date',
                        name: 'return_date'
                    },
                    {
                        data: 'p_surname',
                        name: 'p_surname'
                    },
                    {
                        data: 'admin_price',
                        name: 'admin_price'
                    },
                    {
                        data: 'admin_profit',
                        name: 'admin_profit'
                    },
                    {
                        data: 'collector_profit',
                        name: 'collector_profit'
                    },
                    {
                        data: 'total_amount',
                        name: 'total_amount'
                    },
                    {
                        data: 'payment_iata',
                        name: 'payment_iata'
                    },
                    {
                        data: 'issued_from',
                        name: 'issued_from'
                    },
                    {
                        data: 'status',
                        name: 'status',
                        render: function(data, type, row) {
                            var sta;
                            if (data === 'Waiting For Payment')
                                sta = 'badge-warning ';
                            else if (data === 'Booked')
                                sta = 'badge-info';
                            else if (data === 'Confirmed')
                                sta = 'badge-success';
                            else
                                sta = 'badge-danger';
                            return '<span class="badge ' + sta + ' py-1 px-2">' + data + '</span>'
                        }
                    },
                    {
                        data: 'reminder',
                        name: 'reminder'
                    },
                    {
                        data: 'last_ticketing_date',
                        name: 'last_ticketing_date'
                    },
                    {
                        data: 'Remarks',
                        name: 'Remarks'
                    },
                    {
                        data: 'prn_no',
                        name: 'prn_no',
                        render: function(data, type, row) {
                            return "<a href='/dashboard/admin/editbooking/" + data + "'>" + 'Edit' + "</a>"
                        }
                    },
                    {
                        data: 'prn_no',
                        name: 'view',
                        render: function(data, type, row) {
                            return "<a href='/flights/itinerary/" + data + "'>" + 'View' + "</a>"
                        }
                    },
                ]
            });
        });
    </script>
    @endsection