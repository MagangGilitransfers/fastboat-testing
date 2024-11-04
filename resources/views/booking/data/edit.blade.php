@extends('admin.admin_master')
@section('admin')
<style>
    .nav-pills .nav-link.active {
        background-color: #131516 !important;
        color: #fff !important;
    }
</style>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="col-xxl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="position-relative text-center pb-3">
                            <div class="mt-3">
                                <h5 class="mb-1">{{ $data['fbo_booking_id'] }}</h5>
                                <p>Trip in <b>{{ $data['fbo_trip_date'] }}</b> from <b>{{ $data['departure_port'] }}
                                        ({{ $data['departure_time'] }})</b> to <b>{{ $data['arrival_port'] }}
                                        ({{ $data['arrival_time'] }})</b> with <b>{{ $data['adult'] }} Adult,
                                        {{ $data['child'] }} Child,
                                        {{ $data['infant'] }} Infant</b></p>
                            </div>
                        </div>
                        <!-- Nav tabs -->
                        <ul class="nav nav-pills nav-justified" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#trip" role="tab">
                                    <span>Trip</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#passenger" role="tab">
                                    <span>Passenger</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#shuttle" role="tab">
                                    <span>Shuttle</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#customer" role="tab">
                                    <span>Customer</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#payment" role="tab">
                                    <span>Payment</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-xxl-9">
                <!-- Tab content -->
                <div class="tab-content">
                    <div class="tab-pane active" id="trip" role="tabpanel">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-bordered text-center">
                                    <thead>
                                        <tr class="table-light">
                                            <th colspan="10">Before <span
                                                    class="text-danger">({{ $data['fbo_booking_id'] }})</span></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><b>Pub Adt</b></td>
                                            <td class="currency">IDR {{ $data['fbo_adult_publish'] }}</td>
                                            <td><b>Pub Adt Crr</b></td>
                                            <td class="currency">{{ $data['fbo_currency'] }}
                                                {{ $data['fbo_adult_currency'] }}
                                            </td>
                                            <td><b>Nett Adt</b></td>
                                            <td class="currency">IDR {{ $data['fbo_adult_nett'] }}</td>
                                            <td><b>Kurs</b></td>
                                            <td class="currency">{{ $data['fbo_kurs'] }}</td>
                                            <td><b>Disc Tot</b></td>
                                            <td class="currency">IDR {{ $data['fbo_discount_total'] }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Pub Chd</b></td>
                                            <td class="currency">IDR {{ $data['fbo_child_publish'] }}</td>
                                            <td><b>Pub Chd Crr</b></td>
                                            <td class="currency">{{ $data['fbo_currency'] }}
                                                {{ $data['fbo_child_currency'] }}
                                            </td>
                                            <td><b>Nett Chd</b></td>
                                            <td class="currency">IDR {{ $data['fbo_child_nett'] }}</td>
                                            <td><b>Disc/Pax</b></td>
                                            <td class="currency">IDR {{ $data['fbo_discount'] }}</td>
                                            <td><b>End Tot</b></td>
                                            <td class="currency">IDR {{ $data['fbo_end_total'] }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Pub Tot</b></td>
                                            <td class="currency">IDR {{ $data['fbo_total_publish'] }}</td>
                                            <td><b>Pub Tot Crr</b></td>
                                            <td class="currency">{{ $data['fbo_currency'] }}
                                                {{ $data['fbo_total_currency'] }}
                                            </td>
                                            <td><b>Nett Tot</b></td>
                                            <td class="currency">IDR {{ $data['fbo_total_nett'] }}</td>
                                            <td><b>Price Cut</b></td>
                                            <td class="currency">IDR {{ $data['fbo_price_cut'] }}</td>
                                            <td><b>End Tot Crr</b></td>
                                            <td class="currency">{{ $data['fbo_currency'] }}
                                                {{ $data['fbo_end_total_currency'] }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- search trip depart -->
                        <div class="card custom-border-color">
                            <div class="p-1">
                                <h5 class="font-size-16 mb-1 d-flex align-items-center justify-content-center" style="font-size: 14.8px; font-family: 'IBM Plex Sans', sans-serif;">
                                    <input type="checkbox" id="tripDepartCheckbox" class="me-2">
                                    <label for="tripDepartCheckbox" class="mb-0 text-dark">Trip Depart</label>
                                </h5>
                            </div>
                            <div class="collapse show" data-bs-parent="#addproduct-accordion" id="searchForm" style="display: none;">
                                <div class="p-4 border-top">
                                    <form id="searchForm">
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="mb-3">
                                                    <label class="form-label" for="fbo_trip_date">Trip Date<span class="text-danger">*</span></label>
                                                    <input type="date" class="form-control" id="fbo_trip_date" name="fbo_trip_date" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="mb-3">
                                                    <label class="form-label" for="fbo_departure_port">Departure Port<span class="text-danger">*</span></label>
                                                    <select class="form-control" id="fbo_departure_port" name="fbo_departure_port" disabled>
                                                        <option value="">Select Departure Port</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="mb-3">
                                                    <label class="form-label" for="fbo_arrival_port">Arrival Port<span class="text-danger">*</span></label>
                                                    <select class="form-control" id="fbo_arrival_port" name="fbo_arrival_port" disabled>
                                                        <option value="">Select Arrival Port</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="mb-3">
                                                    <label class="form-label" for="fbo_departure_time">Time Dept<span class="text-danger">*</span></label>
                                                    <select class="form-control" id="fbo_departure_time" name="fbo_departure_time" disabled>
                                                        <option value="">Select Time Dept</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="mb-3">
                                                    <input type="hidden" value="{{$data['fbo_id']}}" id="fbo_id" name="fbo_id">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Hasil Pencarian -->
                        <div id="search-results" style="display: none;">
                            <div class="table-responsive">
                                <h5 class="card-title">
                                    <center>Trip Results</center>
                                </h5>
                                <span class="form-check-label">
                                    <center id="result-date">Date of Trip</center>
                                </span>
                                <div class="container">
                                    <div class="row" id="result-container"></div>
                                </div>
                            </div>
                        </div>
                        <!-- detail hasil pencarian -->
                        <div class="card detail-trip" style="display: none;">
                            <div class="p-4 border-top custom-border-top-color">
                                <!-- Hasil Pencarian -->
                                <div id="search-results">
                                    <div class="table-responsive">
                                        <h5 class="card-title"></h5>
                                        <table id="booking-data-table" class="table table-bordered table-centered align-middle table-nowrap mb-0 table-check">
                                            <thead>
                                                <tr class="table-light">
                                                    <th>
                                                        <center>Publish Adult</center>
                                                    </th>
                                                    <th>
                                                        <center>Publish Child</center>
                                                    </th>
                                                    <th>
                                                        <center>Nett Adult</center>
                                                    </th>
                                                    <th>
                                                        <center>Nett Child</center>
                                                    </th>
                                                    <th>
                                                        <center>Discount</center>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Hasil pencarian akan dimasukkan ke sini -->
                                            </tbody>
                                        </table>
                                        <br>
                                        <!-- perhitungan -->
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="mb-3">
                                                    <label class="form-label" for="price_adult">Adult Publish (IDR)</label>
                                                    <input value="" class="form-control" id="price_adult" name="price_adult" oninput="calculateTotal()">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="mb-3">
                                                    <label class="form-label" for="price_child">Child Publish (IDR)</label>
                                                    <input value="" class="form-control" id="price_child" name="price_child" oninput="calculateTotal()">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="mb-3">
                                                    <label class="form-label" for="fbo_end_total">End Total (IDR)</label>
                                                    <input value="" class="form-control" id="fbo_end_total" name="fbo_end_total" style="background-color:lightgray" readonly>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="mb-3">
                                                    <label class="form-label" for="fbo_end_total_currency">End Total Currency (IDR)</label>
                                                    <input value="" class="form-control" id="fbo_end_total_currency" name="fbo_end_total_currency" style="background-color:lightgray" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- search trip return -->
                        <div class="card custom-border-color">
                            <div class="p-1">
                                <h5 class="font-size-16 mb-1 d-flex align-items-center justify-content-center" style="font-size: 14.8px; font-family: 'IBM Plex Sans', sans-serif;">
                                    <input type="checkbox" id="tripReturnCheckbox" class="me-2">
                                    <label for="tripReturnCheckbox" class="mb-0 text-dark">Trip Return</label>
                                </h5>
                            </div>
                            <div class="collapse show" id="tripReturnForm" style="display: none;">
                                <div class="p-4 border-top">
                                    <form id="returnSearchForm" method="POST" action="{{ route('data.searchTripReturn') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="mb-3">
                                                    <label class="form-label" for="fbo_trip_date_return">Trip Date<span class="text-danger">*</span></label>
                                                    <input type="date" class="form-control" id="fbo_trip_date_return" name="fbo_trip_date_return" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="mb-3">
                                                    <label class="form-label" for="fbo_departure_port_return">Departure Port<span class="text-danger">*</span></label>
                                                    <select class="form-control" id="fbo_departure_port_return" name="fbo_departure_port_return" disabled>
                                                        <option value="">Select Departure Port</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="mb-3">
                                                    <label class="form-label" for="fbo_arrival_port_return">Arrival Port<span class="text-danger">*</span></label>
                                                    <select class="form-control" id="fbo_arrival_port_return" name="fbo_arrival_port_return" disabled>
                                                        <option value="">Select Arrival Port</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="mb-3">
                                                    <label class="form-label" for="fbo_departure_time_return">Time Return<span class="text-danger">*</span></label>
                                                    <select class="form-control" id="fbo_departure_time_return" name="fbo_departure_time_return" disabled>
                                                        <option value="">Select Time Return</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="mb-3">
                                                    <input type="hidden" value="{{$data['fbo_id']}}" id="fbo_id_return" name="fbo_id_return">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Return Trip Results -->
                        <div id="return-search-results" style="display: none;">
                            <div class="table-responsive">
                                <h5 class="card-title">
                                    <center>Return Trip Results</center>
                                </h5>
                                <span class="form-check-label">
                                    <center id="return-result-date">Date of Return Trip</center>
                                </span>
                                <div class="container">
                                    <div class="row" id="return-result-container"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Return Trip Detail -->
                        <div class="card return-detail-trip" style="display: none;">
                            <div class="p-4 border-top custom-border-top-color">
                                <div id="return-search-results">
                                    <div class="table-responsive">
                                        <h5 class="card-title"></h5>
                                        <table id="return-booking-data-table" class="table table-bordered table-centered align-middle table-nowrap mb-0 table-check">
                                            <thead>
                                                <tr class="table-light">
                                                    <th>
                                                        <center>Publish Adult</center>
                                                    </th>
                                                    <th>
                                                        <center>Publish Child</center>
                                                    </th>
                                                    <th>
                                                        <center>Nett Adult</center>
                                                    </th>
                                                    <th>
                                                        <center>Nett Child</center>
                                                    </th>
                                                    <th>
                                                        <center>Discount</center>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Return trip search results will be added here -->
                                            </tbody>
                                        </table>
                                        <br>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="mb-3">
                                                    <label class="form-label" for="return_price_adult">Adult Publish (IDR)</label>
                                                    <input type="number" class="form-control" id="return_price_adult" name="return_price_adult" oninput="calculateReturnTotal()">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="mb-3">
                                                    <label class="form-label" for="return_price_child">Child Publish (IDR)</label>
                                                    <input type="number" class="form-control" id="return_price_child" name="return_price_child" oninput="calculateReturnTotal()">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="mb-3">
                                                    <label class="form-label" for="return_fbo_end_total">End Total (IDR)</label>
                                                    <input type="text" class="form-control" id="return_fbo_end_total" name="return_fbo_end_total" style="background-color:lightgray" readonly>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="mb-3">
                                                    <label class="form-label" for="return_fbo_end_total_currency">End Total Currency (IDR)</label>
                                                    <input type="text" class="form-control" id="return_fbo_end_total_currency" name="return_fbo_end_total_currency" style="background-color:lightgray" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="passenger" role="tabpanel">
                        <div class="card">
                            <div class="card-body">
                                <div class="p-4">
                                    <!-- Placeholder for Adult Information -->
                                    <div id="adult_info"></div>
                                    <!-- Placeholder for Child Information -->
                                    <div id="child_info"></div>
                                    <!-- Placeholder for Infant Information -->
                                    <div id="infant_info"></div>
                                    <!-- Hidden field to store combined passenger info -->
                                    <input type="hidden" id="fbo_passenger" name="fbo_passenger">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="shuttle" role="tabpanel">
                        <div class="card">
                            <div class="card-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6 shuttle-inputs" id="pickup-inputs">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="fbo_pickup">Pickup Area</label>
                                                        <select style="border-color: lightgray;" class="form-control"
                                                            id="fbo_pickup" name="fbo_pickup">
                                                            @if (empty($data['fbo_pickup']))
                                                            <option value="">Select Option</option>
                                                            @endif
                                                            @foreach ($data['pickupAreas'] as $area)
                                                            <option value="{{ $area['id'] }}"
                                                                data-pickup-meeting-point="{{ $area['pickup_meeting_point'] ?? '' }}"
                                                                {{ isset($data['fbo_pickup']) && $data['fbo_pickup'] == $area['id'] ? 'selected' : '' }}>
                                                                {{ $area['name'] }}
                                                            </option>
                                                            @endforeach
                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="">Phone</label>
                                                        <input type="text" style="border-color: lightgray;"
                                                            class="form-control" id=""
                                                            name="fbo_contact_pickup" placeholder="62XXXXXXXXXXX"
                                                            value="{{ $data['fbo_contact_pickup'] ?? '' }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="mb-3">
                                                    <label class="form-label" for="fbo_specific_pickup">Address
                                                        Pickup</label>
                                                    <textarea id="fbo_specific_pickup" name="fbo_specific_pickup" class="form-control" style="border-color: lightgray;"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 shuttle-inputs" id="dropoff-inputs">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="fbo_dropoff">Dropoff
                                                            Area</label>
                                                        <select style="border-color: lightgray;" class="form-control"
                                                            id="fbo_dropoff" name="fbo_dropoff">
                                                            @if (empty($data['fbo_dropoff']))
                                                            <option value="">Select Option</option>
                                                            @endif
                                                            @foreach ($data['dropoffAreas'] as $area)
                                                            <option value="{{ $area['id'] }}"
                                                                data-dropoff-meeting-point="{{ $area['dropoff_meeting_point'] ?? '' }}"
                                                                {{ isset($data['fbo_dropoff']) && $data['fbo_dropoff'] == $area['id'] ? 'selected' : '' }}>
                                                                {{ $area['name'] }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="">Phone</label>
                                                        <input type="text" style="border-color: lightgray;"
                                                            class="form-control" id=""
                                                            name="fbo_contact_dropoff" placeholder="62XXXXXXXXXXX"
                                                            value="{{ $data['fbo_contact_dropoff'] ?? '' }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="mb-3">
                                                    <label class="form-label" for="fbo_specific_dropoff">Address
                                                        Dropoff</label>
                                                    <textarea id="fbo_specific_dropoff" name="fbo_specific_dropoff" class="form-control"
                                                        style="border-color: lightgray;">{{ $data['fbo_specific_dropoff'] ?? '' }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                    </div>

                    <div class="tab-pane" id="customer" role="tabpanel">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label" for="ctc_name">Name</label>
                                            <input id="ctc_name" name="ctc_name" placeholder="Enter Name"
                                                type="text" class="form-control" value="{{ $data['name'] }}">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-3">
                                            <label class="form-label" for="ctc_email">Email</label>
                                            <input id="ctc_email" name="ctc_email" placeholder="Enter Email"
                                                type="email" class="form-control" value="{{ $data['email'] }}">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-3">
                                            <label class="form-label" for="ctc_phone">Phone</label>
                                            <input id="ctc_phone" name="ctc_phone" placeholder="Enter Phone"
                                                type="text" class="form-control" value="{{ $data['phone'] }}">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-3">
                                            <label class="form-label" for="ctc_nationality">Nationality</label>
                                            <select id="ctc_nationality" class="form-control" name="ctc_nationality">
                                                <option value="{{ $data['nationality_id'] }}">
                                                    {{ $data['nationality_name'] }}
                                                </option>
                                                @foreach ($nationality as $item)
                                                <option value="{{ $item->nas_id }}">{{ $item->nas_country }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label" for="ctc_phone">Note</label>
                                            <input id="ctc_phone" name="ctc_phone" placeholder="Enter Note"
                                                type="text" class="form-control" value="{{ $data['note'] }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                    </div>


                    <div class="tab-pane" id="payment" role="tabpanel">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-6">
                                            <label for="fbo_payment_method" class="form-label">Payment Method</label>
                                            <select class="form-control" id="fbo_payment_method"
                                                name="fbo_payment_method" required>
                                                <option value="{{ $data['paymentMethod_value'] }}">
                                                    {{ $data['paymentMethod_name'] }}
                                                </option>
                                                @foreach ($payment as $item)
                                                <option value="{{ $item->py_value }}">{{ $item->py_name }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="transaction-id" id="paypal_transaction_id"
                                            style="display: none;">
                                            <div class="mb-3">
                                                <label class="form-label" for="paypal_transaction_id">Transaction
                                                    ID</label>
                                                <input id="paypal_transaction_id" name="fbo_transaction_id"
                                                    placeholder="Type Paypal Transaction ID" type="text"
                                                    class="form-control"
                                                    value="{{ $data['paymentMethod_value'] === 'paypal' ? $data['transaction_id'] : '' }}">
                                            </div>
                                        </div>

                                        <!-- Midtrans Transaction ID -->
                                        <div class="transaction-id" id="midtrans_transaction_id"
                                            style="display: none;">
                                            <div class="mb-3">
                                                <label class="form-label" for="midtrans_transaction_id">Transaction
                                                    ID</label>
                                                <input id="midtrans_transaction_id" name="fbo_transaction_id"
                                                    placeholder="Type Midtrans Transaction ID" type="text"
                                                    class="form-control"
                                                    value="{{ $data['paymentMethod_value'] === 'midtrans' ? $data['transaction_id'] : '' }}">
                                            </div>
                                        </div>

                                        <!-- Bank Transfer Transaction ID -->
                                        <div class="transaction-id" id="bank_transfer_transaction_id"
                                            style="display: none;">
                                            <div class="mb-3">
                                                <label class="form-label"
                                                    for="bank_transfer_transaction_id">Transaction
                                                    ID</label>
                                                <input id="bank_transfer_transaction_id" name="fbo_transaction_id"
                                                    placeholder="Type Bank Transaction ID" type="text"
                                                    class="form-control"
                                                    value="{{ $data['paymentMethod_value'] === 'bank_transfer' ? $data['transaction_id'] : '' }}">
                                            </div>
                                        </div>

                                        <!-- Cash Transaction ID -->
                                        <div class="transaction-id" id="cash_transaction_id" style="display: none;">
                                            <div class="mb-3">
                                                <label class="form-label" for="cash_transaction_id">Transaction
                                                    ID</label>
                                                <input id="cash_transaction_id" name="fbo_transaction_id"
                                                    placeholder="Type Recipient" type="text" class="form-control"
                                                    value="{{ $data['paymentMethod_value'] === 'cash' ? $data['transaction_id'] : '' }}">
                                            </div>
                                        </div>

                                        <!-- Agent Transaction ID -->
                                        <div class="transaction-id" id="agent_transaction_id" style="display: none;">
                                            <div class="mb-3">
                                                <label class="form-label" for="agent_transaction_id">Agent</label>
                                                <select id="agent_transaction_id" name="fbo_transaction_id"
                                                    class="form-control">
                                                    <option
                                                        value="{{ $data['paymentMethod_value'] === 'agent' ? $data['transaction_id'] : '' }}">
                                                        {{ $data['paymentMethod_value'] === 'agent' ? $data['transaction_id'] : '' }}
                                                    </option>
                                                    <option value="Agen A">Agen A</option>
                                                    <option value="Agen B">Agen B</option>
                                                    <option value="Agen C">Agen C</option>
                                                    <option value="Agen D">Agen D</option>
                                                    <option value="Agen E">Agen E</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col text-end">
                        <button type="button" onclick="history.back()" class="btn btn-outline-dark"><i
                                class="bx bx-x me-1"></i> Cancel</button>
                        <button type="submit" class="btn btn-dark"><i class=" bx bx-file me-1"></i> Update </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    @include('admin.components.footer')
</div>
@endsection
@section('script')
<script>
    // Payment
    $(document).ready(function() {
        // Fungsi untuk memformat angka dengan pemisah ribuan
        function formatNumber(value) {
            return value.toLocaleString('id-ID', {
                minimumFractionDigits: 0,
                maximumFractionDigits: 0
            });
        }

        // Memformat semua elemen dengan kelas 'currency'
        $('.currency').each(function() {
            // Mengambil teks asli dan memisahkan mata uang dari angka
            let originalText = $(this).text();
            let currencySymbol = originalText.match(/[^\d.,]+/g) || [
                ''
            ]; // Mendapatkan simbol mata uang
            let text = originalText.replace(/[^\d.,]/g, '').trim(); // Mengambil angka

            // Mengganti titik dan koma untuk konversi
            let value = parseFloat(text.replace(/\./g, '').replace(/,/g, '.'));

            // Mengubah teks dengan format yang benar (hanya angka dengan pemisah ribuan)
            if (!isNaN(value)) {
                let formattedNumber = formatNumber(value);
                // Menyusun kembali teks dengan simbol mata uang dan angka yang diformat
                $(this).text(currencySymbol.join(' ') + ' ' + formattedNumber);
            }
        });

        // Fungsi untuk menampilkan Transaction ID berdasarkan pilihan
        function showTransactionField(selectedMethod) {
            // Sembunyikan semua Transaction ID
            $('.transaction-id').hide();

            // Tampilkan Transaction ID berdasarkan pilihan
            if (selectedMethod === 'paypal') {
                $('#paypal_transaction_id').show();
            } else if (selectedMethod === 'midtrans') {
                $('#midtrans_transaction_id').show();
            } else if (selectedMethod === 'bank_transfer') {
                $('#bank_transfer_transaction_id').show();
            } else if (selectedMethod === 'cash') {
                $('#cash_transaction_id').show();
            } else if (selectedMethod === 'agent') {
                $('#agent_transaction_id').show();
            }
        }

        // Panggil fungsi showTransactionField saat halaman dimuat berdasarkan nilai default
        showTransactionField($('#fbo_payment_method').val());

        // Saat payment method diubah
        $('#fbo_payment_method').on('change', function() {
            showTransactionField($(this).val());
        });

        // Saat form disubmit
        $('form').submit(function(e) {
            e.preventDefault(); // Mencegah submit form secara default
            var isValid = false; // Flag untuk mengecek validasi

            // Nonaktifkan semua input yang tidak terlihat (tersembunyi)
            $('.transaction-id').each(function() {
                if ($(this).is(':hidden')) {
                    // Disable input atau select pada elemen yang disembunyikan
                    $(this).find('input, select').prop('disabled', true);
                } else {
                    // Enable input atau select pada elemen yang terlihat
                    $(this).find('input, select').prop('disabled', false);
                    isValid = true; // Validasi berhasil jika ada input yang terlihat
                }
            });

            if (isValid) this.submit(); // Submit form hanya jika ada input yang terlihat
        });

        function updateInfo() {
            // Get values of each count
            let adultCount = 0;
            let childCount = 0;
            let infantCount = 0;
            var passengers = @json($data['passengers']);

            passengers.forEach((passenger) => {
                let passengerType = passenger.age < 3 ? 'infant' : (passenger.age <= 12 ? 'child' :
                    'adult');

                // Penomoran berdasarkan tipe penumpang
                let passengerIndex;
                if (passengerType === 'adult') {
                    adultCount++;
                    passengerIndex = adultCount; // Nomor untuk adult
                } else if (passengerType === 'child') {
                    childCount++;
                    passengerIndex = childCount; // Nomor untuk child
                } else if (passengerType === 'infant') {
                    infantCount++;
                    passengerIndex = infantCount; // Nomor untuk infant
                }

                // Append info berdasarkan tipe penumpang
                $(`#${passengerType}_info`).append(`
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label class="form-label" for="${passengerType}_name_${passengerIndex}">${passengerType.charAt(0).toUpperCase() + passengerType.slice(1)} ${passengerIndex} Name</label>
                                    <input id="${passengerType}_name_${passengerIndex}" name="${passengerType}_name_[]" type="text" value="${passenger.name}" placeholder="Enter Name" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label class="form-label" for="${passengerType}_age_${passengerIndex}">${passengerType.charAt(0).toUpperCase() + passengerType.slice(1)} ${passengerIndex} Age</label>
                                    <select id="${passengerType}_age_${passengerIndex}" name="${passengerType}_age_[]" class="form-control">
                                        <option value="">Select Age</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label class="form-label" for="${passengerType}_gender_${passengerIndex}">${passengerType.charAt(0).toUpperCase() + passengerType.slice(1)} ${passengerIndex} Gender</label>
                                    <select id="${passengerType}_gender_${passengerIndex}" name="${passengerType}_gender_[]" class="form-control">
                                        <option value="">Select Gender</option>
                                        <option value="Female" ${passenger.gender === 'Female' ? 'selected' : ''}>Female</option>
                                        <option value="Male" ${passenger.gender === 'Male' ? 'selected' : ''}>Male</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label class="form-label" for="${passengerType}_nationality_${passengerIndex}">${passengerType.charAt(0).toUpperCase() + passengerType.slice(1)} ${passengerIndex} Nationality</label>
                                    <select id="${passengerType}_nationality_${passengerIndex}" name="${passengerType}_nationality_[]" class="nationality-select">
                                        <option value="">Select Nationality</option>
                                        @foreach ($nationality as $item)
                                            <option value="{{ $item->nas_country }}" ${passenger.nationality === "{{ $item->nas_country }}" ? 'selected' : ''}>{{ $item->nas_country }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    `);

                // Populate age options based on type
                let ageSelect = $(`#${passengerType}_age_${passengerIndex}`);
                let ageRange = passengerType === 'infant' ? [0, 2] : (passengerType === 'child' ? [3,
                    12
                ] : [13, 49]);
                for (let age = ageRange[0]; age <= ageRange[1]; age++) {
                    ageSelect.append(
                        `<option value="${age}" ${passenger.age == age ? 'selected' : ''}>${age}</option>`
                    );
                }
                if (passengerType === 'adult') {
                    ageSelect.append(
                        '<option value="≧50" ${passenger.age == "≧50" ? "selected" : ""}>≧50</option>'
                    );
                }
            });

            // Simpan data ke fbo_passenger
            savePassengerInfo();

            // Initialize Tom Select on all newly created select elements with class 'nationality-select'
            $('.nationality-select').each(function() {
                new TomSelect(this);
            });

            // Attach event listeners to update fbo_passenger when inputs change
            attachInputListeners();
        }

        function savePassengerInfo() {
            var passengerInfo = [];

            // Get Adult Info
            $('#adult_info .row').each(function() {
                var name = $(this).find('[name="adult_name_[]"]').val();
                var age = $(this).find('[name="adult_age_[]"]').val();
                var gender = $(this).find('[name="adult_gender_[]"]').val();
                var nationality = $(this).find('[name="adult_nationality_[]"]').val();

                passengerInfo.push(`${name},${age},${gender},${nationality}`);
            });

            // Get Child Info
            $('#child_info .row').each(function() {
                var name = $(this).find('[name="child_name_[]"]').val();
                var age = $(this).find('[name="child_age_[]"]').val();
                var gender = $(this).find('[name="child_gender_[]"]').val();
                var nationality = $(this).find('[name="child_nationality_[]"]').val();

                passengerInfo.push(`${name},${age},${gender},${nationality}`);
            });

            // Get Infant Info
            $('#infant_info .row').each(function() {
                var name = $(this).find('[name="infant_name_[]"]').val();
                var age = $(this).find('[name="infant_age_[]"]').val();
                var gender = $(this).find('[name="infant_gender_[]"]').val();
                var nationality = $(this).find('[name="infant_nationality_[]"]').val();

                passengerInfo.push(`${name},${age},${gender},${nationality}`);
            });

            // Gabungkan semua informasi penumpang dengan tanda ;
            var combinedInfo = passengerInfo.join(';');

            // Set nilai ke field fbo_passenger
            $('#fbo_passenger').val(combinedInfo);
        }

        function attachInputListeners() {
            $('#adult_info input, #adult_info select').on('input change', function() {
                savePassengerInfo();
            });

            $('#child_info input, #child_info select').on('input change', function() {
                savePassengerInfo();
            });

            $('#infant_info input, #infant_info select').on('input change', function() {
                savePassengerInfo();
            });
        }

        // Call updateInfo function when the DOM is ready
        updateInfo();

        // Trigger updateInfo when the adult, child, or infant count changes
        $('#fbo_adult, #fbo_child, #fbo_infant').on('change', function() {
            updateInfo();
        });
    });

    // shuttle pickup
    document.addEventListener('DOMContentLoaded', function() {
        const pickupSelect = document.getElementById('fbo_pickup');
        const specificPickupTextarea = document.getElementById('fbo_specific_pickup');

        // Mengisi textarea jika ada value default
        const defaultPickupId = "{{ $data['fbo_pickup'] }}";
        const defaultPickupMeetingPoint = "{{ $data['fbo_specific_pickup'] }}";

        if (defaultPickupId) {
            // Mengisi textarea dengan value default jika ada
            specificPickupTextarea.value = defaultPickupMeetingPoint;
            // Memilih opsi yang sesuai
            for (let option of pickupSelect.options) {
                if (option.value === defaultPickupId) {
                    option.selected = true;
                    break;
                }
            }
        }

        pickupSelect.addEventListener('change', function() {
            const selectedOption = pickupSelect.options[pickupSelect.selectedIndex];
            const pickupMeetingPoint = selectedOption.getAttribute('data-pickup-meeting-point');

            if (pickupMeetingPoint) {
                specificPickupTextarea.value = pickupMeetingPoint;
            } else {
                specificPickupTextarea.value = '';
            }
        });
    });

    // shuttle dropoff
    document.addEventListener('DOMContentLoaded', function() {
        const dropoffSelect = document.getElementById('fbo_dropoff');
        const specificDropoffTextarea = document.getElementById('fbo_specific_dropoff');

        // Mengisi textarea jika ada value default
        const defaultDropoffId = "{{ $data['fbo_dropoff'] }}";
        const defaultDropoffMeetingPoint = "{{ $data['fbo_specific_dropoff'] }}";

        if (defaultDropoffId) {
            // Mengisi textarea dengan value default jika ada
            specificDropoffTextarea.value = defaultDropoffMeetingPoint;
            // Memilih opsi yang sesuai
            for (let option of dropoffSelect.options) {
                if (option.value === defaultDropoffId) {
                    option.selected = true;
                    break;
                }
            }
        }

        dropoffSelect.addEventListener('change', function() {
            const selectedOption = dropoffSelect.options[dropoffSelect.selectedIndex];
            const dropoffMeetingPoint = selectedOption.getAttribute('data-dropoff-meeting-point');

            if (dropoffMeetingPoint) {
                specificDropoffTextarea.value = dropoffMeetingPoint;
            } else {
                specificDropoffTextarea.value = '';
            }
        });
    });

    $(document).ready(function() {
        console.log("jQuery is loaded and working.");
        // Event listener untuk perubahan checkbox
        $('#tripDepartCheckbox').on('change', function() {
            console.log("Checkbox found and changed");
            // Cek apakah checkbox dalam kondisi checked
            if ($(this).is(':checked')) {
                // Tampilkan form dan aktifkan input
                $('#searchForm').show();
                $('#searchForm').find('input, select').prop('disabled', false);
            } else {
                // Sembunyikan form dan nonaktifkan input
                $('#searchForm').hide();
                $('#searchForm').find('input, select').prop('disabled', true);
            }
        });
    });
</script>
<!-- script for trip depart -->
<script>
    $(document).ready(function() {
        // Panggil fungsi ini ketika hasil pencarian diperoleh
        function triggerSearch() {
            const tripDate = $('#fbo_trip_date').val();
            const departurePort = $('#fbo_departure_port').val();
            const arrivalPort = $('#fbo_arrival_port').val();
            const timeDept = $('#fbo_departure_time').val();
            const fbo_id = $('#fbo_id').val();

            if (tripDate && departurePort && arrivalPort && timeDept && fbo_id) {
                $.ajax({
                    url: "{{ route('data.searchTrip') }}",
                    type: 'GET',
                    data: {
                        fbo_trip_date: tripDate,
                        fbo_departure_port: departurePort,
                        fbo_arrival_port: arrivalPort,
                        fbo_departure_time: timeDept,
                        fbo_id: fbo_id
                    },
                    success: function(response) {
                        $('#result-container').empty();
                        $('#result-title').text(tripDate);
                        $('#result-date').text(tripDate);
                        $('#search-results').show();

                        $.each(response.data, function(index, item) {
                            $('#result-container').append(`
                        <div class="col-md-6 col-sm-12 card-item">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-check mb-3">
                                        <input class="form-check-input trip-checkbox" type="checkbox" data-price_adult="${item.price_adult}" data-departure_port="${item.departure_port}" data-price_child="${item.price_child}"data-price_child_nett="${item.price_child_nett}" data-price_adult_nett="${item.price_adult_nett}" data-price_discount="${item.price_discount}" data-arrival_port="${item.arrival_port}" data-arrival_port="${item.arrival_port}" data-total_price="${item.total_price}" data-arrival_time="${item.arrival_time}" data-total_price_currency="${item.total_price_currency}">
                                        <label class="form-check-label">${item.fastboat_name}</label>
                                    </div>
                                    <div class="mt-3 pt-1">
                                        <div class="d-flex justify-content-between">
                                            <p style="max-width: 70%; word-wrap: break-word;">${item.departure_port} (${item.departure_time}) - ${item.arrival_port} (${item.arrival_time})</p>
                                            <p class="text-danger fw-bold">IDR ${item.price_adult}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `);
                        });

                        // Event listener untuk checkbox hasil pencarian
                        $('.trip-checkbox').on('change', function() {
                            // Pastikan hanya satu checkbox yang aktif
                            $('.trip-checkbox').not(this).prop('checked', false);

                            if ($(this).is(':checked')) {
                                const data = $(this).data();
                                showTripDetails(data);
                            } else {
                                hideTripDetails();
                            }
                        });
                    },
                    error: function(error) {
                        console.log(error);
                        alert('Data tidak ditemukan');
                    }
                });
            }
        }

        // Fungsi untuk menampilkan detail trip saat checkbox dipilih
        function showTripDetails(data) {
            $('#booking-data-table tbody').html(`
                <tr>
                    <td><center>${data.price_adult}</center></td>
                    <td><center>${data.price_child}</center></td>
                    <td><center>${data.price_adult_nett}</center></td>
                    <td><center>${data.price_child_nett}</center></td>
                    <td><center>${data.price_discount}</center></td>
                </tr>
            `);

            $('#price_adult').val(data.price_adult);
            $('#price_child').val(data.price_child);
            $('#fbo_end_total').val(data.total_price);
            $('#fbo_end_total_currency').val(data.total_price_currency);

            $('.detail-trip').show(); // Tampilkan detail
        }

        // Fungsi untuk menyembunyikan detail trip saat tidak ada checkbox yang aktif
        function hideTripDetails() {
            $('#booking-data-table tbody').empty();
            $('#price_adult').val('');
            $('#price_child').val('');
            $('#fbo_end_total').val('');
            $('#fbo_end_total_currency').val('');

            $('.detail-trip').hide(); // Sembunyikan detail
        }


        $('#fbo_trip_date, #fbo_departure_port, #fbo_arrival_port, #fbo_departure_time').on('change', triggerSearch);

        function resetSearchResults() {
            $('#search-results').hide();
            $('#result-container').empty();
        }

        $('#fbo_trip_date').change(function() {
            resetSearchResults();
            var tripDate = $(this).val();

            $.ajax({
                url: '/get-filtered',
                method: 'GET',
                data: {
                    fbo_trip_date: tripDate
                },
                success: function(response) {
                    $('#fbo_departure_port').empty().append('<option value="">Select Departure Port</option>');
                    $.each(response.fbo_departure_ports, function(index, port) {
                        $('#fbo_departure_port').append('<option value="' + port + '">' + port + '</option>');
                    });
                    $('#fbo_departure_port').prop('disabled', false);
                },
                error: function() {
                    console.error('Error fetching departure ports');
                }
            });
        });

        $('#fbo_departure_port').change(function() {
            $('#fbo_arrival_port').empty().append('<option value="">Select Arrival Port</option>');
            $('#fbo_departure_time').empty().append('<option value="">Select Time Dept</option>');

            var tripDate = $('#fbo_trip_date').val();
            var departurePort = $(this).val();

            $.ajax({
                url: '/get-filtered',
                method: 'GET',
                data: {
                    fbo_trip_date: tripDate,
                    fbo_departure_port: departurePort
                },
                success: function(response) {
                    $('#fbo_arrival_port').empty().append('<option value="">Select Arrival Port</option>');
                    $.each(response.fbo_arrival_ports, function(index, port) {
                        $('#fbo_arrival_port').append('<option value="' + port + '">' + port + '</option>');
                    });
                    $('#fbo_arrival_port').prop('disabled', false);
                },
                error: function() {
                    console.error('Error fetching arrival ports');
                }
            });
        });

        $('#fbo_arrival_port').change(function() {
            $('#fbo_departure_time').empty().append('<option value="">Select Time Dept</option>');

            var tripDate = $('#fbo_trip_date').val();
            var departurePort = $('#fbo_departure_port').val();
            var arrivalPort = $(this).val();

            $.ajax({
                url: '/get-filtered',
                method: 'GET',
                data: {
                    fbo_trip_date: tripDate,
                    fbo_departure_port: departurePort,
                    fbo_arrival_port: arrivalPort
                },
                success: function(response) {
                    $('#fbo_departure_time').empty().append('<option value="">Select Time Dept</option>');
                    $.each(response.fbo_departure_times, function(index, time) {
                        $('#fbo_departure_time').append('<option value="' + time + '">' + time + '</option>');
                    });
                    $('#fbo_departure_time').prop('disabled', false);
                },
                error: function() {
                    console.error('Error fetching departure times');
                }
            });
        });
    });
</script>
<!-- script for trip return -->
<script>
    $(document).ready(function() {
        // Initialize search results display and checkbox toggle for return trip form
        $('#tripReturnCheckbox').change(function() {
            $('#tripReturnForm').toggle($(this).is(':checked'));
        });

        // Trigger search on return trip parameter changes
        $('#fbo_trip_date_return, #fbo_departure_port_return, #fbo_arrival_port_return, #fbo_departure_time_return').on('change', triggerReturnSearch);

        function triggerReturnSearch() {
            const tripDateReturn = $('#fbo_trip_date_return').val();
            const departurePortReturn = $('#fbo_departure_port_return').val();
            const arrivalPortReturn = $('#fbo_arrival_port_return').val();
            const timeDeptReturn = $('#fbo_departure_time_return').val();
            const fbo_id_return = $('#fbo_id_return').val();

            if (tripDateReturn && departurePortReturn && arrivalPortReturn && timeDeptReturn && fbo_id_return) {
                $.ajax({
                    url: "{{ route('data.searchTripReturn') }}",
                    type: 'GET',
                    data: {
                        fbo_trip_date_return: tripDateReturn,
                        fbo_departure_port_return: departurePortReturn,
                        fbo_arrival_port_return: arrivalPortReturn,
                        fbo_departure_time_return: timeDeptReturn,
                        fbo_id_return: fbo_id_return
                    },
                    success: function(response) {
                        displayReturnResults(response.data, tripDateReturn);
                    },
                    error: function() {
                        alert('Data tidak ditemukan');
                    }
                });
            }
        }

        function displayReturnResults(data, tripDate) {
            $('#return-result-container').empty();
            $('#return-result-date').text(tripDate);
            $('#return-search-results').show();

            $.each(data, function(index, item) {
                $('#return-result-container').append(`
                    <div class="col-md-6 col-sm-12 card-item">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-check mb-3">
                                    <input class="form-check-input return-trip-checkbox" type="checkbox" 
                                        data-price_adult="${item.price_adult}" 
                                        data-price_child="${item.price_child}" 
                                        data-price_child_nett="${item.price_child_nett}" 
                                        data-price_adult_nett="${item.price_adult_nett}" 
                                        data-total_price="${item.total_price}" 
                                        data-departure_port="${item.departure_port}" 
                                        data-arrival_port="${item.arrival_port}" 
                                        data-departure_time="${item.departure_time}" 
                                        data-arrival_time="${item.arrival_time}" data-total_price_currency ="${item.total_price_currency}">
                                    <label class="form-check-label">${item.fastboat_name}</label>
                                </div>
                                <div class="mt-3 pt-1">
                                    <div class="d-flex justify-content-between">
                                        <p>${item.departure_port} (${item.departure_time}) - ${item.arrival_port} (${item.arrival_time})</p>
                                        <p class="text-danger fw-bold">IDR ${item.price_adult}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                `);
            });

            $('.return-trip-checkbox').on('change', function() {
                $('.return-trip-checkbox').not(this).prop('checked', false);
                if ($(this).is(':checked')) {
                    showReturnTripDetails($(this).data());
                } else {
                    hideReturnTripDetails();
                }
            });
        }

        function showReturnTripDetails(data) {
            $('#return-booking-data-table tbody').html(`
                <tr>
                    <td><center>${data.price_adult}</center></td>
                    <td><center>${data.price_child}</center></td>
                    <td><center>${data.price_adult_nett}</center></td>
                    <td><center>${data.price_child_nett}</center></td>
                    <td><center>0</center></td>
                </tr>
            `);
            $('#return_price_adult').val(data.price_adult);
            $('#return_price_child').val(data.price_child);
            $('#return_fbo_end_total').val(data.total_price);
            $('#return_fbo_end_total_currency').val(data.total_price_currency);

            $('.return-detail-trip').show();
        }

        function hideReturnTripDetails() {
            $('.return-detail-trip').hide();
        }

        function resetReturnSearchResults() {
            $('#return-search-results').hide();
            $('#return-result-container').empty();
        }

        // Fetch dropdown data based on trip date for departure ports
        $('#fbo_trip_date_return').change(function() {
            resetReturnSearchResults();
            var tripDateReturn = $(this).val();

            $.ajax({
                url: '/get-filtered-return',
                method: 'GET',
                data: {
                    fbo_trip_date_return: tripDateReturn
                },
                success: function(response) {
                    populateDropdown('#fbo_departure_port_return', response.fbo_departure_ports_return, 'Select Departure Port');
                },
                error: function() {
                    console.error('Error fetching departure ports for return');
                }
            });
        });

        // Fetch arrival ports based on selected departure port
        $('#fbo_departure_port_return').change(function() {
            resetArrivalAndTimeDropdowns();
            var tripDateReturn = $('#fbo_trip_date_return').val();
            var departurePortReturn = $(this).val();

            $.ajax({
                url: '/get-filtered-return',
                method: 'GET',
                data: {
                    fbo_trip_date_return: tripDateReturn,
                    fbo_departure_port_return: departurePortReturn
                },
                success: function(response) {
                    populateDropdown('#fbo_arrival_port_return', response.fbo_arrival_ports_return, 'Select Arrival Port');
                },
                error: function() {
                    console.error('Error fetching arrival ports for return');
                }
            });
        });

        // Fetch return times based on selected arrival port
        $('#fbo_arrival_port_return').change(function() {
            var tripDateReturn = $('#fbo_trip_date_return').val();
            var departurePortReturn = $('#fbo_departure_port_return').val();
            var arrivalPortReturn = $(this).val();

            $.ajax({
                url: '/get-filtered-return',
                method: 'GET',
                data: {
                    fbo_trip_date_return: tripDateReturn,
                    fbo_departure_port_return: departurePortReturn,
                    fbo_arrival_port_return: arrivalPortReturn
                },
                success: function(response) {
                    populateDropdown('#fbo_departure_time_return', response.fbo_departure_times_return, 'Select Time Return');
                },
                error: function() {
                    console.error('Error fetching departure times for return');
                }
            });
        });

        function populateDropdown(selector, options, defaultText) {
            $(selector).empty().append(`<option value="">${defaultText}</option>`);
            $.each(options, function(index, option) {
                $(selector).append(`<option value="${option}">${option}</option>`);
            });
            $(selector).prop('disabled', false);
        }

        function resetArrivalAndTimeDropdowns() {
            $('#fbo_arrival_port_return').empty().append('<option value="">Select Arrival Port</option>');
            $('#fbo_departure_time_return').empty().append('<option value="">Select Time Return</option>');
        }
    });
</script>

@endsection