@extends('dashboard.app')

@section('content')
    <div class="dashboard-bread dashboard--bread">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="breadcrumb-content">
                        <div class="section-heading">
                            <h2 class="sec__title font-size-30 text-white">My Accounts</h2>
                        </div>
                    </div><!-- end breadcrumb-content -->
                </div><!-- end col-lg-6 -->
                <div class="col-lg-6">
                    <div class="breadcrumb-list text-right">
                        <ul class="list-items">
                            <li><a href="{{url('')}}" class="text-white">Home</a></li>
                            <li>My Accounts</li>
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
                                <div>
                                    <h3 class="title">Accounts Results</h3>
                                    <p class="font-size-14">Showing {{$data->firstItem()}}
                                        to {{$data->lastItem()}} of {{$cnt}} entries</p>
                                </div>
                                <span>Total Accounts <strong class="color-text">({{$cnt}})</strong></span>
                            </div>
                        </div>
                        <div class="form-content">
                            @include('partials.alerts')
                            <div class="table-form table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">S. No</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Recived</th>
                                        <th scope="col">Paid</th>
                                        <th scope="col">Balance</th>
                                        <th scope="col">Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($x = 1)
                                    @foreach($data as $post)
                                        <tr>
                                            <td>{{ $x++ }}</td>
                                            @if($post['type'] == 'R')
                                                <td>Amount Received For the Ticket PNR NO. : {{ $post['prn_no'] }}</td>
                                            @elseif($post['type'] == 'P')
                                                <td>Amount Received By Admin</td>
                                            @endif
                                            <td>{{ $post['collected_cash'] }}</td>
                                            <td>{{ $post['amount'] }}</td>
                                            <td>{{ $post['remaining_amount'] }}</td>
                                            <td>{{ (string)date('d-M-Y', strtotime(substr($post['created_at'], 0, 10))) }}</td>
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
                {{$data->links('collector.pag')}}
            </div><!-- end row -->

        </div><!-- end container-fluid -->
    </div>
@endsection
