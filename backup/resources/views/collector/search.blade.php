@extends('dashboard.app')

@section('content')
    {{-- {{ dd($data) }} --}}
    @if ($data['type'] == 'Multi Way')
        <div class="dashboard-bread">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="breadcrumb-content">
                            <div class="section-heading">
                                <h2 class="sec__title font-size-30 text-white">Search Result
                            </div>
                        </div><!-- end breadcrumb-content -->
                    </div><!-- end col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="breadcrumb-list text-right">
                            <ul class="list-items">
                                <li><a href="{{ route('index') }}" class="text-white">Home</a></li>
                                <li>Collector Dashboard</li>
                            </ul>
                        </div><!-- end breadcrumb-list -->
                    </div><!-- end col-lg-6 -->
                </div><!-- end row -->
                <br><br>
            </div>
        </div><!-- end dashboard-bread -->
        <div class="dashboard-main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-box">
                            <div class="form-title-wrap">
                                <div class="d-flex align-items-center justify-content-between">
                                    <form method="Post" action="{{ route('collector-search') }}" class="form-inline">
                                        <div class="form-group mx-sm-3 mb-2">
                                            @csrf
                                            <label for="inputPassword2" class="sr-only">Enter PRN-NO</label>
                                            <input type="text" name="prn_no" class="form-control"
                                                placeholder="Enter PRN-NO">
                                        </div>
                                        <button type="submit" class="btn btn-primary mb-2">Search Tickets</button>
                                    </form>
                                    <a href="{{ route('ItineraryMulti', $ticket->prn_no) }}"
                                        class="theme-btn theme-btn-small mr-2">Ticket</a>
                                    <a href="{{ route('Itinerary-download-multi', $ticket->prn_no) }}"
                                        class="theme-btn theme-btn-small mr-2">Download Ticket</a>
                                    <a href="{{ route('invoice_multi_pdff', $ticket->prn_no) }}"
                                        class="theme-btn theme-btn-small mr-2">Download Invoice</a>
                                </div>
                            </div>
                            <div class="form-content">
                                @include('partials.alerts')
                                <div class="card-item card-item-list card-item--list">

                                    {{-- <div class="card-img">
                              <img src="https://daisycon.io/images/airline/?iata={{ $flight['code'] }}" alt="hotel-img">
                                </div> --}}
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">

                                            <div class="row">
                                                @foreach ($data['flight'] as $flight)
                                                    <div class="col-lg-5">
                                                        <h3 class="card-title">{{ $flight['from'][0] }} to
                                                            {{ $flight['to'][count($flight['to']) - 1] }}</h3>
                                                    </div>
                                                @endforeach
                                                <div class="col-lg-2">
                                                    @if ($ticket->payment_status == '0')
                                                        <span class="badge badge-warning text-white ml-2">Pending</span>
                                                    @else
                                                        <span class="badge badge-success text-white ml-2">Paid</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>.

                                        <br>
                                        <div class="d-flex align-items-center">
                                            <h1 class="card-title">PNR No: {{ $ticket->prn_no }}</h1>
                                        </div>
                                        <ul class="list-items list-items-2 pt-2 pb-3">
                                            <li><span>Ticket Type:</span>{{ $data['type'] }}</li>
                                            @if (isset($data['infant']))
                                                <li><span>Total
                                                        Passengers:</span>{{ (int) $data['adult'] + (int) $data['child'] + (int) $data['infant'] }}
                                                </li>
                                            @else
                                                <li><span>Total
                                                        Passengers:</span>{{ (int) $data['adult'] + (int) $data['child'] }}
                                                </li>
                                            @endif
                                            {{-- {{ dd($flight) }} --}}
                                            <li><span>Traveling Date:</span>{{ $data['flight'][0]['startDate'] }}</li>
                                            <li><span>Total Ammount:</span>€ {{ $ticket->amount }}</li>
                                        </ul>
                                    </div>
                                    <div class="action-btns">
                                        @if ($ticket->payment_status == '0')
                                            <a href="{{ route('amount-collect', $ticket->prn_no) }}"
                                                class="theme-btn theme-btn-small mr-2"><i
                                                    class="la la-check-circle mr-1"></i>Collect Amount</a>
                                        @else
                                            <button disabled="" class="theme-btn theme-btn-small mr-2">Amount
                                                Already Paid</button>
                                        @endif
                                    </div>
                                </div><!-- end card-item -->
                            </div>



                        </div><!-- end form-box -->
                    </div><!-- end col-lg-12 -->
                </div><!-- end row -->
            </div><!-- end container-fluid -->
        </div><!-- end dashboard-main-content -->
    @else
        @if (isset($data2))
            <div class="dashboard-bread">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="breadcrumb-content">
                                <div class="section-heading">
                                    <h2 class="sec__title font-size-30 text-white">Search Result
                                </div>
                            </div><!-- end breadcrumb-content -->
                        </div><!-- end col-lg-6 -->
                        <div class="col-lg-6">
                            <div class="breadcrumb-list text-right">
                                <ul class="list-items">
                                    <li><a href="{{ route('index') }}" class="text-white">Home</a></li>
                                    <li>Collector Dashboard</li>
                                </ul>
                            </div><!-- end breadcrumb-list -->
                        </div><!-- end col-lg-6 -->
                    </div><!-- end row -->
                    <br><br>
                </div>
            </div><!-- end dashboard-bread -->
            <div class="dashboard-main-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-box">
                                <div class="form-title-wrap">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <form method="Post" action="{{ route('collector-search') }}" class="form-inline">
                                            <div class="form-group mx-sm-3 mb-2">
                                                @csrf
                                                <label for="inputPassword2" class="sr-only">Enter PRN-NO</label>
                                                <input type="text" name="prn_no" class="form-control"
                                                    placeholder="Enter PRN-NO">
                                            </div>
                                            <button type="submit" class="btn btn-primary mb-2">Search Tickets</button>
                                        </form>
                                        <a href="{{ route('Itinerary', $ticket->prn_no) }}"
                                            class="theme-btn theme-btn-small mr-2">Ticket</a>
                                        <a href="{{ route('Itinerary-download', $ticket->prn_no) }}"
                                            class="theme-btn theme-btn-small mr-2">Download Ticket</a>
                                        <a href="{{ route('invoice_pdff', $ticket->prn_no) }}"
                                            class="theme-btn text-center col-lg-12">Download Invoice</a>
                                    </div>
                                </div>
                                <div class="form-content">
                                    @include('partials.alerts')
                                    <div class="card-item card-item-list card-item--list">
                                        <div class="card-img">

                                        </div>
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <h3 class="card-title">{{ $data2['flight_from'] }} to
                                                    {{ $data2['flight_to'] }}</h3>
                                                @if ($ticket->payment_status == '0')
                                                    <span class="badge badge-warning text-white ml-2">Pending</span>
                                                @else
                                                    <span class="badge badge-success text-white ml-2">Paid</span>
                                                @endif
                                            </div>.
                                            <br>
                                            <div class="d-flex align-items-center">
                                                <h1 class="card-title">PNR No: {{ $ticket->prn_no }}</h1>
                                            </div>
                                            <ul class="list-items list-items-2 pt-2 pb-3">
                                                <li><span>Ticket Type: </span>{{ $data2['way_of_flight'] }}</li>
                                                <li><span>Total
                                                        Passengers:</span>{{ $data2['adults'] + $data2['childrens'] + $data2['infants'] }}
                                                </li>
                                                <li><span>Traveling Date:</span>{{ $data2['date_of_flight'] }}</li>
                                                <li><span>Total Amount:</span> €{{ $ticket->amount }}</li>
                                            </ul>
                                        </div>
                                        <div class="action-btns">
                                            @if ($ticket->payment_status == '0')
                                                <a href="{{ route('amount-collect', $ticket->prn_no) }}"
                                                    class="theme-btn theme-btn-small mr-2"><i
                                                        class="la la-check-circle mr-1"></i>Collect Amount</a>
                                            @else
                                                <button disabled="" class="theme-btn theme-btn-small mr-2">Amount
                                                    Already
                                                    Paid</button>
                                            @endif
                                        </div>
                                    </div><!-- end card-item -->
                                </div>



                            </div><!-- end form-box -->
                        </div><!-- end col-lg-12 -->
                    </div><!-- end row -->
                </div><!-- end container-fluid -->
            </div><!-- end dashboard-main-content -->
        @else
            <div class="dashboard-bread">
                <div class="container-fluid">
                    {{-- {{ dd($data) }} --}}
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="breadcrumb-content">
                                <div class="section-heading">
                                    <h2 class="sec__title font-size-30 text-white">Search Result
                                </div>
                            </div><!-- end breadcrumb-content -->
                        </div><!-- end col-lg-6 -->
                        <div class="col-lg-6">
                            <div class="breadcrumb-list text-right">
                                <ul class="list-items">
                                    <li><a href="{{ route('index') }}" class="text-white">Home</a></li>
                                    <li>Collector Dashboard</li>
                                </ul>
                            </div><!-- end breadcrumb-list -->
                        </div><!-- end col-lg-6 -->
                    </div><!-- end row -->
                    <br><br>
                </div>
            </div><!-- end dashboard-bread -->
            <div class="dashboard-main-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-box">
                                <div class="form-title-wrap">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <form method="Post" action="{{ route('collector-search') }}"
                                            class="form-inline">
                                            <div class="form-group mx-sm-3 mb-2">
                                                @csrf
                                                <label for="inputPassword2" class="sr-only">Enter PRN-NO</label>
                                                <input type="text" name="prn_no" class="form-control"
                                                    placeholder="Enter PRN-NO">
                                            </div>
                                            <button type="submit" class="btn btn-primary mb-2">Search Tickets</button>
                                        </form>
                                        <a href="{{ route('Itinerary', $ticket->prn_no) }}"
                                            class="theme-btn theme-btn-small mr-2">Ticket</a>
                                        <a href="{{ route('Itinerary-download', $ticket->prn_no) }}"
                                            class="theme-btn theme-btn-small mr-2">Download Ticket</a>
                                        <a href="{{ route('invoice_pdff', $ticket->prn_no) }}"
                                            class="theme-btn theme-btn-small mr-2">Download Invoice</a>
                                    </div>
                                </div>
                                <div class="form-content">
                                    @include('partials.alerts')
                                    <div class="card-item card-item-list card-item--list">
                                        <div class="card-img">
                                            <!--  <img src="https://daisycon.io/images/airline/?iata={{ $data['fcode'] }}" alt="hotel-img"> -->
                                        </div>
                                        <div class="card-body">

                                            <div class="d-flex align-items-center">
                                                <h3 class="card-title">{{ $data['from'][0] }} to
                                                    {{ $data['to'][count($data['to']) - 1] }}</h3>
                                                @if ($ticket->payment_status == '0')
                                                    <span class="badge badge-warning text-white ml-2">Pending</span>
                                                @else
                                                    <span class="badge badge-success text-white ml-2">Paid</span>
                                                @endif
                                            </div>.
                                            <br>
                                            <div class="d-flex align-items-center">
                                                <h1 class="card-title">PNR No: {{ $ticket->prn_no }}</h1>
                                            </div>
                                            <ul class="list-items list-items-2 pt-2 pb-3">
                                                <li><span>Ticket Type:</span>{{ $data['type'] }}</li>
                                                @if (isset($data['infant']))
                                                    <li><span>Total
                                                            Passengers:</span>{{ (int) $data['adult'] + (int) $data['child'] + (int) $data['infant'] }}
                                                    </li>
                                                @else
                                                    <li><span>Total
                                                            Passengers:</span>{{ (int) $data['adult'] + (int) $data['child'] }}
                                                    </li>
                                                @endif
                                                <li><span>Traveling Date:</span>{{ $data['takeoffD'] }}</li>
                                                <li><span>Total Ammount:</span>€ {{ $ticket->amount }}</li>
                                            </ul>
                                        </div>
                                        <div class="action-btns">
                                            @if ($ticket->payment_status == '0')
                                                <a href="{{ route('amount-collect', $ticket->prn_no) }}"
                                                    class="theme-btn theme-btn-small mr-2"><i
                                                        class="la la-check-circle mr-1"></i>Collect Amount</a>
                                            @else
                                                <button disabled="" class="theme-btn theme-btn-small mr-2">Amount
                                                    Already Paid</button>
                                            @endif
                                        </div>
                                    </div><!-- end card-item -->
                                </div>



                            </div><!-- end form-box -->
                        </div><!-- end col-lg-12 -->
                    </div><!-- end row -->
                </div><!-- end container-fluid -->
            </div><!-- end dashboard-main-content -->
        @endif
    @endif
@endsection
