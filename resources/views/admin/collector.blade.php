@extends('dashboard.admin')

@section('content')
    <div class="dashboard-content-wrap">
        <div class="dashboard-bread dashboard--bread dashboard-bread-2">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="breadcrumb-content">
                            <div class="section-heading">
                                <h2 class="sec__title font-size-30 text-white">All Collectors Accounts</h2>
                            </div>
                        </div><!-- end breadcrumb-content -->
                    </div><!-- end col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="breadcrumb-list text-right">
                            <ul class="list-items">
                                <li><a href="{{url('')}}" class="text-white">Home</a></li>
                                <li>All Collectors Accounts</li>
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
                                    <h3 class="title">All Collectors Accounts <a href="{{route('users.create')}}" class="btn btn-success float-right">Add New</a></h3>
                                </div>
                            </div>
                            <div class="form-content">
                                <div class="table-form table-responsive">
                                    <table class="table" id="collector_table">
                                        <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Collector Name</th>
                                            <th scope="col">Amount Paid</th>
                                            <th scope="col">Reason of amount</th>
                                            <th scope="col">Amount Remaining</th>
                                            <th scope="col">Last Updated At</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $count = 1;?>
                                        @foreach($collectors as $user)
                                            <tr>
                                                <th scope="row">{{$count++}}</th>
                                                <td>
                                                    <div class="table-content">
                                                        <h3 class="title"><a
                                                                href="{{route('collector.detail', $user->collector_id)}}"> {{$user->collector->name ?? "Null"}} </a>
                                                        </h3>
                                                    </div>
                                                </td>
                                                <td>{{$user->paidamount}}</td>
                                                <td>{{$user->reason}}</td>
                                                <td>{{$user->remaining_amount}}</td>
                                                <td>
                                                    {{$user->updated_at->format('d-M-Y')}}
                                                </td>
                                                <td>
                                                    <div style="display: flex">
                                                        <a href="" class="btn btn-primary" style="color: white"><i class="nav-icon i-Pen-2 font-weight-bold"></i>Edit</a>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div><!-- end form-box -->
                    </div><!-- end col-lg-12 -->
                </div><!-- end row -->
                <!-- end row -->
            </div><!-- end container-fluid -->
        </div><!-- end dashboard-main-content -->
    </div><!-- end dashboard-content-wrap -->



    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <form action="/action_page.php">
                    <div class="modal-header">
                        <h4 class="modal-title">Enter Amount</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <input type="text" hidden name="collector_id"><br>
                        <label for="amount">Paid Amount:</label>
                        <input type="number" name="amount" id="amount"><br>
                        <label for="remain">Remaining:</label>
                        <label name="remain" id="remain"></label><br>
                    </div>
                    <script>
                        function price(){
                            var $paid = document.getElementById('amount');
                            var $remain = document.getElementById('remain');

                        }
                    </script>
                    <div class="modal-footer">
                        <button type="submit" class="theme-btn theme-btn-danger ml-2" data-dismiss="modal">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
