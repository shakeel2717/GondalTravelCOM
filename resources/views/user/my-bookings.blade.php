@extends('dashboard.app')

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
                <div class="col-lg-12">
                    <div class="form-box">
                        <div class="form-title-wrap">
                            <div class="container mt-5">
                                <h2 class="mb-4">Booking History</h2>
                                <table class="table table-bordered yajra-datatable">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>PNR NO.</th>
                                        <th>Status</th>
                                        <th>Payment Method</th>
                                        <th>Payment Status</th>
                                        <th>Amount</th>
                                        <th>Booked At</th>
                                        <th>Action</th>
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
                $(function () {
                    var table = $('.yajra-datatable').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: "{{ route('user-history.list') }}",
                        columns: [
                            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                            {
                                data: 'prn_no', name: 'prn_no', render: function (data, type, row) {
                                    return "<a href='/dashboard/user/Ticket/" + data + "'>" + data + "</a>"
                                }
                            },
                            {
                                data: 'status', name: 'status', render: function (data, type, row) {
                                    let sta;
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
                            {data: 'payment_method', name: 'payment_method'},

                            {
                                data: 'payment_status', name: 'payment_status', render: function (data, type, row) {
                                    var sta;
                                    if (data === 'Paid')
                                        sta = 'badge-success';
                                    else
                                        sta = 'badge-danger';
                                    return '<span class="badge ' + sta + ' py-1 px-2">' + data + '</span>'
                                }
                            },
                            {data: 'amount', name: 'amount'},
                            {data: 'date', name: 'date'},
                            {data: 'date', name: 'date'},
                        ]
                    });
                });
            </script>
@endsection
