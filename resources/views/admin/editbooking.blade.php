@extends('dashboard.admin')

@section('content')
<div class="dashboard-bread dashboard--bread">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="breadcrumb-content">
                    <div class="section-heading">
                        <h2 class="sec__title font-size-30 text-white">Update Ticket</h2>
                    </div>
                </div><!-- end breadcrumb-content -->
            </div><!-- end col-lg-6 -->
            <div class="col-lg-6">
                <div class="breadcrumb-list text-right">
                    <ul class="list-items">
                        <li><a href="{{ url('') }}" class="text-white">Home</a></li>
                        <li>Edit Ticket {{ $ticket->prn_no }}</li>
                    </ul>
                </div><!-- end breadcrumb-list -->
            </div><!-- end col-lg-6 -->
        </div><!-- end row -->
    </div>
</div>
<br>
<div class="container-fluid">
    @include('partials.alerts')
    <div class="row">
        {{-- {{ dd($ticket) }} --}}
        <div class="col-lg-12">
            <div class="form-box">
                <div class="form-title-wrap">
                    <h3 class="title">Ticket Information</h3>
                </div>
                <div class="form-content">
                    <div class="contact-form-action">
                        @if (Session::has('msg'))
                        <div class="alert alert-success">
                            {{ Session::get('msg') }}
                        </div>
                        @endif
                        <form method="POST" action="{{ route('updatebooking.update', $ticket->id) }}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 responsive-column">
                                    <div class="input-box">
                                        <label class="label-text">Prn No.</label>
                                        <div class="form-group">
                                            <input name="prn_no" class="form-control" type="text" value="{{ old('prn_no', $ticket->prn_no) }}">
                                        </div>
                                    </div>
                                </div><!-- end col-lg-6 -->

                                <div class="col-lg-6 responsive-column">
                                    <div class="input-box">
                                        <label class="label-text">Status</label>
                                        <div class="form-group">
                                            <input name="status" class="form-control" type="text" value="{{ $ticket->status }}" readonly>
                                        </div>
                                    </div>
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-6 responsive-column">
                                    <div class="input-box">
                                        <label class="label-text">Payment Method</label>
                                        <div class="form-group">
                                            <input name="payment_method" class="form-control" type="text" value="{{ $ticket->payment_method }}" readonly>
                                        </div>
                                    </div>
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-6 responsive-column">
                                    <div class="input-box">
                                        <label class="label-text">Payment Status</label>
                                        @if ($ticket->payment_status == '1')
                                        <div class="form-group">
                                            <input name="payment_status" class="form-control" type="text" value="Paid" readonly>
                                        </div>
                                        @else
                                        <div class="form-group">
                                            <input name="payment_status" class="form-control" type="text" value="Unpaid" readonly>
                                        </div>
                                        @endif

                                    </div>
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-6 responsive-column">
                                    <div class="input-box">
                                        <label class="label-text">Company</label>
                                        <div class="form-group">

                                            <input name="company" class="form-control" type="text" value="{{ old('company', $ticket->company) }}" required>
                                            <span class="text-danger size-nm"> @error('company')
                                                {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-6 responsive-column">
                                    <div class="input-box">
                                        <label class="label-text">Ticket Number</label>
                                        <div class="form-group">
                                            <input name="ticket_num" id="ticket_num" class="form-control" type="text" value="{{ old('ticket_num', $ticket->ticket_num) }}" required>
                                            <span class="text-danger size-nm"> @error('ticket_num')
                                                {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-6 responsive-column">
                                    <div class="input-box">
                                        <label class="label-text">Destination</label>
                                        <div class="form-group">
                                            <input name="destination" class="form-control" type="text" value="{{ $ticket->destination }}" readonly>
                                        </div>
                                    </div>
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-6 responsive-column">
                                    <div class="input-box">
                                        <label class="label-text">Departure Date</label>
                                        <div class="form-group">
                                            <input name="departure_date" class="form-control" type="text" value="{{ $ticket->departure_date }}">
                                        </div>
                                    </div>
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-6 responsive-column">
                                    <div class="input-box">
                                        <label class="label-text">Return Date</label>
                                        <div class="form-group">
                                            <input name="return_date" class="form-control" type="text" value="{{ $ticket->return_date }}" readonly>
                                        </div>
                                    </div>
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-6 responsive-column">
                                    <div class="input-box">
                                        <label class="label-text">Passenger Name</label>
                                        <div class="form-group">
                                            <input name="p_name" class="form-control" type="text" value="{{ $ticket->p_name }}" readonly>
                                        </div>
                                    </div>
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-6 responsive-column">
                                    <div class="input-box">
                                        <label class="label-text">Passenger Surname</label>
                                        <div class="form-group">
                                            <input name="p_surname" class="form-control" type="text" value="{{ $ticket->p_surname }}" readonly>
                                        </div>
                                    </div>
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-6 responsive-column">
                                    <div class="input-box">
                                        <label class="label-text">Passenger Contact Number</label>
                                        <div class="form-group">
                                            <input name="contact_no" class="form-control" type="text" value="{{ $ticket->contact_no }}" readonly>
                                        </div>
                                    </div>
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-6 responsive-column">
                                    <div class="input-box">
                                        <label class="label-text">Admin Iata Price</label>
                                        <div class="form-group">
                                            <input name="admin_price" class="form-control" type="text" value="{{ old('admin_price', $ticket->admin_price) }}" required>
                                            <span class="text-danger size-nm"> @error('admin_price')
                                                {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-6 responsive-column">
                                    <div class="input-box">
                                        <label class="label-text">Admin Profit</label>
                                        <div class="form-group">
                                            @if ($ticket->admin_price == 0)
                                            <input name="admin_profit" class="form-control" type="text" value="0" readonly>
                                            @else
                                            <input name="admin_profit" class="form-control" type="text" value="{{ $ticket->amount - $ticket->admin_price }}" readonly>
                                            @endif
                                        </div>
                                    </div>
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-6 responsive-column">
                                    <div class="input-box">
                                        <label class="label-text">Amount</label>
                                        <div class="form-group">
                                            <input name="amount" class="form-control" type="text" value="{{ $ticket->amount }}" readonly>
                                        </div>
                                    </div>
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-6 responsive-column">
                                    <div class="input-box">
                                        <label class="label-text">Collector Profit</label>
                                        <div class="form-group">
                                            <input name="collector_profit" class="form-control" type="text" value="{{ $ticket->collector_profit }}" readonly>
                                        </div>
                                    </div>
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-6 responsive-column">
                                    <div class="input-box">
                                        <label class="label-text">Total Amount</label>
                                        <div class="form-group">
                                            <input name="total_amount" class="form-control" type="text" value="{{ $ticket->total_amount }}" readonly>
                                        </div>
                                    </div>
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-6 responsive-column">
                                    <div class="input-box">
                                        <label class="label-text">Ticket Status</label>
                                        <div class="form-group">
                                            <select name="ticket_status" id="ticket_status" onchange="ticketStatusChanged();" value="{{ old('ticket_status') }}" class="form-control" required>
                                                <option value="pending" {{ 'pending' == old('ticket_status', $ticket->ticket_status) ? 'selected' : '' }}>
                                                    Pending</option>
                                                <option value="issued" {{ 'issued' == old('ticket_status', $ticket->ticket_status) ? 'selected' : '' }}>
                                                    Issued </option>
                                                <option value="cancelled" {{ 'cancelled' == old('ticket_status', $ticket->ticket_status) ? 'selected' : '' }}>
                                                    Cancelled </option>
                                                <option value="refund" {{ 'refund' == old('ticket_status', $ticket->ticket_status) ? 'selected' : '' }}>
                                                    Refund </option>
                                                <option value="modify" {{ 'modify' == old('ticket_status', $ticket->ticket_status) ? 'selected' : '' }}>
                                                    Modify </option>
                                            </select>
                                            <span class="text-danger size-nm"> @error('ticket_status')
                                                {{ $message }}
                                                @enderror
                                            </span>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12 responsive-column">
                                    <div class="input-box">
                                        <label class="label-text">Issued From</label>
                                        <div class="form-group">
                                            <select name="issued_from" id="type" value="{{ old('issued_from') }}" class="form-control" required>
                                                <option value="fra" {{ 'fra' == old('issued_from', $ticket->issued_from) ? 'selected' : '' }}>
                                                    FRA</option>
                                                <option value="spn" {{ 'spn' == old('issued_from', $ticket->issued_from) ? 'selected' : '' }}>
                                                    SPN</option>
                                                <option value="online" {{ 'online' == old('issued_from', $ticket->issued_from) ? 'selected' : '' }}>
                                                    Online</option>
                                                <option value="ita" {{ 'ita' == old('issued_from', $ticket->issued_from) ? 'selected' : '' }}>
                                                    ITA </option>
                                                <option value="be" {{ 'be' == old('issued_from', $ticket->issued_from) ? 'selected' : '' }}>
                                                    BE</option>
                                                <option value="pak" {{ 'pak' == old('issued_from', $ticket->issued_from) ? 'selected' : '' }}>
                                                    PAK</option>
                                                <option value="nr" {{ 'nr' == old('issued_from', $ticket->issued_from) ? 'selected' : '' }}>
                                                    NR</option>
                                                <option value="de" {{ 'de' == old('issued_from', $ticket->issued_from) ? 'selected' : '' }}>
                                                    DE</option>
                                                <option value="uk" {{ 'uk' == old('issued_from', $ticket->issued_from) ? 'selected' : '' }}>
                                                    UK</option>
                                            </select>
                                            <span class="text-danger size-nm"> @error('issued_from')
                                                {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-6 responsive-column">
                                    <div class="input-box">
                                        <label class="label-text">Payment Iata</label>
                                        <div class="form-group">
                                            <input name="payment_iata" class="form-control" type="text" value="{{ old('payment_iata', $ticket->payment_iata) }}">
                                            <span class="text-danger size-nm"> @error('payment_iata')
                                                {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>

                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-6 responsive-column">
                                    <div class="input-box">
                                        <label class="label-text">Reminder</label>
                                        <div class="form-group">
                                            <input name="reminder" class="form-control" type="text" value="{{ old('reminder', $ticket->reminder) }}">
                                            <span class="text-danger size-nm"> @error('reminder')
                                                {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 responsive-column">
                                    <div class="input-box">
                                        <label class="label-text">Collector Name</label>
                                        <div class="form-group">
                                            <input name="remarks" class="form-control" type="text" value="{{ $ticket->Remarks }}" readonly>
                                        </div>
                                    </div>
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-12">
                                    <div class="btn-box">
                                        <button class="theme-btn float-right" type="submit">Save Changes</button>
                                    </div>
                                </div><!-- end col-lg-12 -->
                            </div><!-- end row -->
                        </form>
                    </div>
                </div>
            </div><!-- end form-box -->
        </div><!-- end col-lg-6 -->
    </div><!-- end row -->
</div>
<script>
    // create a function when ticket status change
    function ticketStatusChanged() {
        const ticket_status = document.getElementById("ticket_status");
        if (ticket_status.value === "issued") {
            // checking if ticket number is not empty
            const ticket_status = document.getElementById("ticket_num");
            if (ticket_status.value == "") {
                alert("Please Provide Ticket Number Before Updating the Ticket Status to Issued");
            }
        }

    }
</script>
@endsection