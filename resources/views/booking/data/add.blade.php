@extends('admin.admin_master')
@section('admin')
<style>
    .custom-border-color {
        border-color: lightgray;
        /* Ganti dengan warna yang diinginkan */
    }

    .custom-border-top-color {
        border-top-color: black;
    }
</style>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <form action="{{ route('data.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div id="addproduct-accordion" class="custom-accordion">
                            <div class="card custom-border-color">
                                <a class="text-body" data-bs-toggle="collapse" aria-expanded="true" aria-controls="addproduct-productinfo-collapse">
                                    <div class="p-4">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1 overflow-hidden">
                                                <h5 class="font-size-16 mb-1">Payment</h5>
                                                <p class="text-muted text-truncate mb-0">Fill all information below</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <div class="collapse show" data-bs-parent="#addproduct-accordion">
                                    <div class="p-4 border-top">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="mb-3">
                                                    <label class="form-label" for="ctc_name">Name</label>
                                                    <input id="ctc_name" name="ctc_name" placeholder="Enter Name" type="text" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="mb-3">
                                                    <label class="form-label" for="ctc_email">Email</label>
                                                    <input id="ctc_email" name="ctc_email" placeholder="Enter Email" type="email" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="mb-3">
                                                    <label class="form-label" for="ctc_phone">Phone</label>
                                                    <input id="ctc_phone" name="ctc_phone" placeholder="Enter Phone" type="text" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="mb-3">
                                                    <label class="form-label" for="ctc_nationality">Nationality</label>
                                                    <select id="ctc_nationality" name="ctc_nationality">
                                                        <option value="">Select Nationality</option>
                                                        @foreach ($nationality as $item)
                                                        <option value="{{ $item->nas_id }}">{{ $item->nas_country }} </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="mb-3">
                                                    <label class="form-label" for="fbo_currency">Currency</label>
                                                    <select id="fbo_currency" name="fbo_currency">
                                                        <option value="IDR" data-rate="1" data-code="IDR">Indonesia Rupiah (IDR)</option>
                                                        @foreach ($currency as $item)
                                                        <option value="{{ $item->cy_code }}" data-rate="{{ $item->cy_rate }}" data-code="{{ $item->cy_code }}"> {{ $item->cy_name }} ({{ $item->cy_code }})
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="mb-3">
                                                    <label class="form-label">Payment Status</label><br>
                                                    <label>
                                                        <input type="radio" name="fbo_payment_status" value="paid" id="paid"> Paid
                                                    </label>
                                                    <label>
                                                        <input type="radio" name="fbo_payment_status" value="unpaid" id="unpaid" checked="checked"> Unpaid
                                                    </label>
                                                </div>
                                            </div>

                                            <!-- Payment Method -->
                                            <div class="col-md-3">
                                                <div class="mb-3">
                                                    <label class="form-label" for="fbo_payment_method">Payment Method</label>
                                                    <select id="fbo_payment_method" name="fbo_payment_method" class="form-control" disabled>
                                                        <option value="">Select Payment Method</option>
                                                        @foreach ($payment_method as $item)
                                                        <option value="{{ $item->py_value }}">{{ $item->py_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- Paypal Transaction ID -->
                                            <div class="col-md-3 transaction-id" id="paypal_transaction_id" style="display: none;">
                                                <div class="mb-3">
                                                    <label class="form-label" for="paypal_transaction_id">Transaction ID</label>
                                                    <input id="paypal_transaction_id" name="fbo_transaction_id" placeholder="Type Paypal Transaction ID" type="text" class="form-control">
                                                </div>
                                            </div>

                                            <!-- Midtrans Transaction ID -->
                                            <div class="col-md-3 transaction-id" id="midtrans_transaction_id" style="display: none;">
                                                <div class="mb-3">
                                                    <label class="form-label" for="midtrans_transaction_id">Transaction ID</label>
                                                    <input id="midtrans_transaction_id" name="fbo_transaction_id" placeholder="Type Midtrans Transaction ID" type="text" class="form-control">
                                                </div>
                                            </div>

                                            <!-- Bank Transfer Transaction ID -->
                                            <div class="col-md-3 transaction-id" id="bank_transfer_transaction_id" style="display: none;">
                                                <div class="mb-3">
                                                    <label class="form-label" for="bank_transfer_transaction_id">Transaction ID</label>
                                                    <input id="bank_transfer_transaction_id" name="fbo_transaction_id" placeholder="Type Bank Transaction ID" type="text" class="form-control">
                                                </div>
                                            </div>

                                            <!-- Cash Transaction ID -->
                                            <div class="col-md-3 transaction-id" id="cash_transaction_id" style="display: none;">
                                                <div class="mb-3">
                                                    <label class="form-label" for="cash_transaction_id">Transaction ID</label>
                                                    <input id="cash_transaction_id" name="fbo_transaction_id" placeholder="Type Recipient" type="text" class="form-control">
                                                </div>
                                            </div>

                                            <!-- Agent Transaction ID -->
                                            <div class="col-md-3 transaction-id" id="agent_transaction_id" style="display: none;">
                                                <div class="mb-3">
                                                    <label class="form-label" for="agent_transaction_id">Agent</label>
                                                    <select id="agent_transaction_id" name="fbo_transaction_id" class="form-control">
                                                        <option value="">Select Agent</option>
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
                            <div class="card custom-border-color">
                                <a class="text-body" data-bs-toggle="collapse" aria-expanded="true" aria-controls="addproduct-productinfo-collapse">
                                    <div class="p-4">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1 overflow-hidden">
                                                <h5 class="font-size-16 mb-1">Customer</h5>
                                                <p class="text-muted text-truncate mb-0">Fill all information below</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <div class="collapse show" data-bs-parent="#addproduct-accordion">
                                    <div class="p-4 border-top">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="fbo_adult">Adult</label>
                                                    <input id="fbo_adult" name="fbo_adult" type="number" class="form-control" value="1" min="1">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="fbo_child">Child</label>
                                                    <input id="fbo_child" name="fbo_child" type="number" class="form-control" value="0" min="0">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="fbo_infant">Infant</label>
                                                    <input id="fbo_infant" name="fbo_infant" type="number" class="form-control" value="0" min="0">
                                                </div>
                                            </div>
                                        </div>
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
                            <div class="card custom-border-color">
                                <a class="text-body" data-bs-toggle="collapse" aria-expanded="true" aria-controls="addproduct-productinfo-collapse">
                                    <div class="p-4">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1 overflow-hidden">
                                                <h5 class="font-size-16 mb-1">Trip Depart</h5>
                                                <p class="text-muted text-truncate mb-0">Fill all information below</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <div class="collapse show" data-bs-parent="#addproduct-accordion">
                                    <div class="p-4 border-top">
                                        <!-- Form Pencarian -->
                                        <div class="row" id="searchForm">
                                            <div class="col-sm-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="fbo_trip_date">Trip Date</label>
                                                    <input type="date" class="form-control" id="fbo_trip_date" name="fbo_trip_date">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="fbo_departure_port">Departure Port</label>
                                                    <select class="form-control" id="fbo_departure_port" name="fbo_departure_port">
                                                        <option value="">Select Departure Port</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="fbo_arrival_port">Arrival Port</label>
                                                    <select class="form-control" id="fbo_arrival_port" name="fbo_arrival_port">
                                                        <option value="">Select Arrival Port</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="fbo_fast_boat">Fast Boat</label>
                                                    <select class="form-control" id="fbo_fast_boat" name="fbo_fast_boat">
                                                        <option value="">Select Fast Boat</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="fbo_departure_time">Time Dept</label>
                                                    <select class="form-control" id="fbo_departure_time" name="fbo_departure_time">
                                                        <option value="">Select Time Dept</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="p-4 border-top custom-border-top-color">
                                            <!-- Hasil Pencarian -->
                                            <div id="search-results" style="display: none;">
                                                <div class="table-responsive">
                                                    <div id="shuttle-checkbox" class="shuttle-checkbox">
                                                        <div>
                                                            <label>
                                                                <input type="checkbox" id="pickup-shuttle" name="fbo_pickup" value="Pickup"> Pickup Shuttle
                                                            </label>
                                                            &nbsp; &nbsp; &nbsp;
                                                            <label>
                                                                <input type="checkbox" id="dropoff-shuttle" name="fbo_dropoff" value="Dropoff"> Dropoff Shuttle
                                                            </label>
                                                        </div>
                                                        <div class="container">
                                                            <div class="row">
                                                                <div class="col-md-6 shuttle-inputs" style="display:none;" id="pickup-inputs">
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <div class="mb-3">
                                                                                <label class="form-label" for="fbo_pickup">Pickup Area</label>
                                                                                <select style="border-color: lightgray;" class="form-control" id="fbo_pickup" name="fbo_pickup">
                                                                                    <option value="">Select Option</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <div class="mb-3">
                                                                                <label class="form-label" for="">Phone</label>
                                                                                <input type="text" style="border-color: lightgray;" class="form-control" id="" name="fbo_contact_pickup" placeholder="62XXXXXXXXXXX">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="mb-3">
                                                                            <label class="form-label" for="fbo_specific_pickup">Address Pickup</label>
                                                                            <textarea id="fbo_specific_pickup" name="fbo_specific_pickup" class="form-control" style="border-color: lightgray;"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 shuttle-inputs" style="display:none;" id="dropoff-inputs">
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <div class="mb-3">
                                                                                <label class="form-label" for="fbo_dropoff">Dropoff Area</label>
                                                                                <select style="border-color: lightgray;" class="form-control" id="fbo_dropoff" name="fbo_dropoff">
                                                                                    <option value="">Select Option</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <div class="mb-3">
                                                                                <label class="form-label" for="">Phone</label>
                                                                                <input type="text" style="border-color: lightgray;" class="form-control" id="" name="fbo_contact_dropoff" placeholder="62XXXXXXXXXXX">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="mb-3">
                                                                            <label class="form-label" for="fbo_specific_dropoff">Address Dropoff</label>
                                                                            <textarea id="fbo_specific_dropoff" name="fbo_specific_dropoff" class="form-control" style="border-color: lightgray;"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
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
                                </div>
                            </div>
                            <div class="card custom-border-color">
                                <div class="text-body" data-bs-toggle="collapse" aria-expanded="true" aria-controls="addproduct-productinfo-collapse">
                                    <div class="p-4">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1 overflow-hidden">
                                                <h5 class="font-size-16 mb-1">Trip Return</h5>
                                                <p class="text-muted text-truncate mb-0">Fill all information below</p>
                                            </div>
                                            <div class="form-check form-switch" style="display: flex; align-items: center;justify-content: center;">
                                                <input class="form-check-input" style="width: 3rem; height: 1.75rem; border-radius: 1rem;" type="checkbox" id="switch" name="switch" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="collapse show" data-bs-parent="#addproduct-accordion"  id="searchFormReturn">
                                    <div class="p-4 border-top">
                                        <!-- Form Pencarian -->
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="trip_return_date">Trip Date</label>
                                                    <input type="date" class="form-control" id="trip_return_date" name="trip_return_date" disabled>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="departure_return_port">Departure Port</label>
                                                    <select class="form-control" id="departure_return_port" name="departure_return_port" disabled>
                                                        <option value="">Select Departure Port</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="arrival_return_port">Arrival Port</label>
                                                    <select class="form-control" id="arrival_return_port" name="arrival_return_port" disabled>
                                                        <option value="">Select Arrival Port</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="fbo_fast_boat_return">Fast Boat</label>
                                                    <select class="form-control" id="fbo_fast_boat_return" name="fbo_fast_boat_return" disabled>
                                                        <option value="">Select Fast Boat</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="fbo_departure_time_return">Time Dept</label>
                                                    <select class="form-control" id="fbo_departure_time_return" name="fbo_departure_time_return" disabled>
                                                        <option value="">Select Time Dept</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Hasil Pencarian -->
                                        <div id="search-results-return" style="display: none;">
                                            <div class="table-responsive">
                                                <div id="shuttle-checkbox-return" class="shuttle-checkbox-return">
                                                    <div>
                                                        <label>
                                                            <input type="checkbox" id="pickup-shuttle-return" name="pickup_shuttle_return" value="Pickup"> Pickup Shuttle
                                                        </label>
                                                        &nbsp; &nbsp; &nbsp;
                                                        <label>
                                                            <input type="checkbox" id="dropoff-shuttle-return" name="dropoff_shuttle_return" value="Dropoff"> Dropoff Shuttle
                                                        </label>
                                                    </div>
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-md-6 shuttle-inputs-return" style="display:none;" id="pickup-inputs-return">
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="mb-3">
                                                                            <label class="form-label" for="">Pickup Area</label>
                                                                            <select style="border-color: lightgray;" class="form-control" id="fbo_pickup_return" name="fbo_pickup_return">
                                                                                <option value="">Select Option </option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="mb-3">
                                                                            <label class="form-label" for="">Phone</label>
                                                                            <input type="text" style="border-color: lightgray;" class="form-control" id="" name="fbo_contact_pickup_return" placeholder="62XXXXXXXXXXX">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="mb-3">
                                                                            <label class="form-label" for="fbo_specific_pickup_return">Address Pickup</label>
                                                                            <textarea value="" style="border-color: lightgray;" class="form-control" id="fbo_specific_pickup_return" name="fbo_specific_pickup_return"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 shuttle-inputs-return" style="display:none;" id="dropoff-inputs-return">
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="mb-3">
                                                                            <label class="form-label" for="">Dropoff Area</label>
                                                                            <select style="border-color: lightgray;" class="form-control" id="fbo_dropoff_return" name="fbo_dropoff_return">
                                                                                <option value="">Select Option </option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="mb-3">
                                                                            <label class="form-label" for="">Phone</label>
                                                                            <input type="text" style="border-color: lightgray;" class="form-control" id="" name="fbo_contact_dropoff_return" placeholder="62XXXXXXXXXXX">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="fbo_specific_dropoff_return">Address Dropoff</label>
                                                                        <textarea value="" style="border-color: lightgray;" class="form-control" id="fbo_specific_dropoff_return" name="fbo_specific_dropoff_return"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h5 class="card-title-return"></h5>
                                                <table id="booking-data-table-return" class="table table-bordered table-centered align-middle table-nowrap mb-0 table-check">
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
                                                            <label class="form-label" for="adult_return_publish">AdultPublish (IDR)</label>
                                                            <input value="" class="form-control" id="adult_return_publish" name="adult_return_publish" oninput="calculateTotalReturn()">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="child_return_publish">Child Publish (IDR)</label>
                                                            <input value="" class="form-control" id="child_return_publish" name="child_return_publish" oninput="calculateTotalReturn()">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="total_return_end">End Total (IDR)</label>
                                                            <input value="" class="form-control" id="total_return_end" name="total_return_end" style="background-color:lightgray" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="currency_return_end">End Total Currency (IDR)</label>
                                                            <input value="" class="form-control" id="currency_return_end" name="currency_return_end" style="background-color:lightgray" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card custom-border-color">
                                <div class="collapse show" data-bs-parent="#addproduct-accordion">
                                    <div class="p-4 border-top">
                                        <div class="row" id="note">
                                            <div class="mb-3">
                                                <label class="form-label font-size-16 mb-1" for="ctc_note">Note</label>
                                                <p class="text-muted text-truncate mb-0">If there are certain conditions, please add notes</p>
                                                <textarea style="border-color: lightgray;" class="form-control" name="ctc_note" id="ctc_note"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Button --}}
                <div class="row mb-4">
                    <div class="col text-end">
                        <button type="button" onclick="history.back()" class="btn btn-outline-dark"><i class="bx bx-x me-1"></i> Cancel</button>
                        <button type="submit" class="btn btn-dark"><i class=" bx bx-file me-1"></i> Save </button>
                    </div> <!-- end col -->
                </div> <!-- end row-->
            </form>
            <!-- end row -->

        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    @include('admin.components.footer')
</div>
@endsection

@section('script')
<script>
    // Tom select 
    new TomSelect("#ctc_nationality");
    new TomSelect("#fbo_currency");

    // Pencarian trip
    $(document).ready(function() {
        // Hide pickup and dropoff inputs on page load
        $(document).ready(function() {
            $('#pickup-inputs, #dropoff-inputs').hide(); // Hide initially
        });

        // Function to reset pickup inputs (without removing options)
        function resetPickupInputs() {
            $('#fbo_pickup').val(''); // Clear the selected value, not the options
            $('#fbo_specific_pickup').val(''); // Reset the pickup address
            $('input[name="fbo_contact_pickup"]').val(''); // Reset the pickup phone input
        }

        // Function to reset dropoff inputs (without removing options)
        function resetDropoffInputs() {
            $('#fbo_dropoff').val(''); // Clear the selected value, not the options
            $('#fbo_specific_dropoff').val(''); // Reset the dropoff address
            $('input[name="fbo_contact_dropoff"]').val(''); // Reset the dropoff phone input
        }

        // Event handler for Pickup Shuttle checkbox
        $('#pickup-shuttle').change(function() {
            if ($(this).is(':checked')) {
                $('#pickup-inputs').stop(true, true).slideDown(); // Show pickup inputs
            } else {
                $('#pickup-inputs').stop(true, true).slideUp(); // Hide pickup inputs
                resetPickupInputs(); // Reset pickup inputs when unchecked
            }
        });

        // Event handler for Dropoff Shuttle checkbox
        $('#dropoff-shuttle').change(function() {
            if ($(this).is(':checked')) {
                $('#dropoff-inputs').stop(true, true).slideDown(); // Show dropoff inputs
            } else {
                $('#dropoff-inputs').stop(true, true).slideUp(); // Hide dropoff inputs
                resetDropoffInputs(); // Reset dropoff inputs when unchecked
            }
        });

        // Fungsi untuk mengecek apakah semua field sudah diisi
        function resetSearchResults() {
            $('#booking-data-table tbody').empty(); // Hapus data di tabel
            $('.card-title').empty(); // Hapus judul kartu
            $('#price_adult').val(''); // Reset harga dewasa
            $('#price_child').val(''); // Reset harga anak
            $('#fbo_end_total').val(''); // Reset total harga
            $('#fbo_end_total_currency').val(''); // Reset format mata uang
            $('#search-results').hide(); // Sembunyikan hasil pencarian
            // Reset checkboxes
            $('#pickup-shuttle').prop('checked', false); // Reset Pickup Shuttle checkbox
            $('#dropoff-shuttle').prop('checked', false); // Reset Dropoff Shuttle checkbox

            // Reset inputs in pickup and dropoff sections
            resetPickupInputs();
            resetDropoffInputs();

            // Hide pickup and dropoff inputs
            $('#pickup-inputs').hide(); // Hide pickup inputs after search reset
            $('#dropoff-inputs').hide(); // Hide dropoff inputs after search reset
        }

        // Fungsi untuk mengecek apakah semua field sudah diisi
        function checkFormComplete() {
            let tripDate = $('#fbo_trip_date').val();
            let departurePort = $('#fbo_departure_port').val();
            let arrivalPort = $('#fbo_arrival_port').val();
            let fastBoat = $('#fbo_fast_boat').val();
            let timeDept = $('#fbo_departure_time').val();

            // Cek apakah semua field sudah diisi
            if (tripDate && departurePort && arrivalPort && fastBoat && timeDept) {
                performSearch(tripDate, departurePort, arrivalPort, fastBoat, timeDept);
            } else {
                $('#search-results').hide(); // Sembunyikan hasil pencarian jika form tidak lengkap
            }
        }

        // Trigger ketika input field berubah (pencarian ulang)
        $('#fbo_trip_date, #fbo_departure_port, #fbo_arrival_port, #fbo_fast_boat, #fbo_departure_time').on('change', function() {
            var type = $(this).attr('name');
            if (type === 'fbo_trip_date') {
                $('#fbo_departure_port').empty().append('<option value="">Select Departure Port</option>');
                $('#fbo_arrival_port').empty().append('<option value="">Select Arrival Port</option>');
                $('#fbo_fast_boat').empty().append('<option value="">Select Fast Boat</option>');
                $('#fbo_departure_time').empty().append('<option value="">Select Time Dept</option>');
                console.log(type);
            } else if (type === 'fbo_departure_port') {
                $('#fbo_arrival_port').empty().append('<option value="">Select Arrival Port</option>');
                $('#fbo_fast_boat').empty().append('<option value="">Select Fast Boat</option>');
                $('#fbo_departure_time').empty().append('<option value="">Select Time Dept</option>');
                console.log(type);
            } else if (type === 'fbo_arrival_port') {
                $('#fbo_fast_boat').empty().append('<option value="">Select Fast Boat</option>');
                $('#fbo_departure_time').empty().append('<option value="">Select Time Dept</option>');
            } else if (type === 'fbo_fast_boat') {
                $('#fbo_departure_time').empty().append('<option value="">Select Time Dept</option>');
            }
            $('#booking-data-table tbody').empty(); // Hapus data di tabel
            $('.card-title').empty(); // Hapus judul kartu
            $('#price_adult').val(''); // Reset harga dewasa
            $('#price_child').val(''); // Reset harga anak
            $('#fbo_end_total').val(''); // Reset total harga
            $('#fbo_end_total_currency').val(''); // Reset format mata uang
            $('#search-results').hide(); // Sembunyikan hasil pencarian
            resetSearchResults();
            checkFormComplete(); // Cek dan lakukan pencarian jika semua field terisi
        });

        // Function to format input values with thousands separator
        function formatCurrency(input) {
            let value = input.val().replace(/\D/g, ''); // Remove all non-numeric characters
            value = value.replace(/(\d)(\d{3})$/, "$1.$2"); // Add thousands separator
            input.val(value); // Update the input value
        }

        function calculateTotal() {
            // Ambil nilai dari input price_adult dan price_child
            let adultPublish = $('#price_adult').val().replace(/\./g, '') || 0; // Hapus titik dari pemisah ribuan
            let childPublish = $('#price_child').val().replace(/\./g, '') || 0; // Hapus titik dari pemisah ribuan

            console.log('Adult Publish:', adultPublish);
            console.log('Child Publish:', childPublish);

            // Konversi nilai menjadi angka
            adultPublish = parseInt(adultPublish) || 0;
            childPublish = parseInt(childPublish) || 0;

            console.log('Adult Publish (Parsed):', adultPublish);
            console.log('Child Publish (Parsed):', childPublish);

            // Ambil jumlah dewasa dan anak dari input
            let adultCount = parseInt($('#fbo_adult').val()) || 1; // Default 1 dewasa
            let childCount = parseInt($('#fbo_child').val()) || 0;

            console.log('Adult Count:', adultCount);
            console.log('Child Count:', childCount);

            // Perhitungan total harga
            let totalPrice = (adultPublish * adultCount) + (childPublish * childCount);

            console.log('Total Price:', totalPrice);

            // Set nilai fbo_end_total (IDR) dengan format pemisah ribuan
            $('#fbo_end_total').val(totalPrice.toLocaleString('id-ID'));

            // Setelah total IDR dihitung, update juga fbo_end_total_currency berdasarkan mata uang yang dipilih
            updateCurrencyTotal();
        }
        $('#price_adult, #price_child').on('input', function() {
            formatCurrency($(this)); // Add thousands separator as user types
            calculateTotal(); // Hitung ulang total harga dan total dalam mata uang
        });

        // Before form submission, remove the thousands separator
        $('form').submit(function(e) {
            $('#price_adult, #price_child, #fbo_end_total, #fbo_end_total_currency').each(function() {let value = $(this).val().replace(/\D/g, ''); // Remove thousands separator
                $(this).val(value); // Update input value
            });
        });

        function updateCurrencyLabel() {
            let selectedOption = $('#fbo_currency').find('option:selected');
            let currencyCode = selectedOption.data('code') || 'IDR'; // Ambil kode mata uang atau default ke IDR
            console.log('Currency Code:', currencyCode);
            // Ubah teks label
            $('label[for="fbo_end_total_currency"]').text('End Total Currency (' + currencyCode + ')');
        }

        function updateCurrencyTotal() {
            // Ambil nilai total sebelum diskon dari #fbo_end_total
            let totalPrice = parseInt($('#fbo_end_total').val().replace(/\./g, '')) || 0;

            console.log('Total Price (for conversion):', totalPrice);

            // Ambil nilai rate dan kode mata uang yang dipilih dari dropdown
            let selectedOption = $('#fbo_currency').find('option:selected');
            let rate = parseFloat(selectedOption.data('rate')) || 1; // Default ke 1 jika rate tidak ditemukan
            let currencyCode = selectedOption.data('code') || 'IDR'; // Default ke IDR jika kode tidak ditemukan

            console.log('Rate:', rate);
            console.log('Currency Code (for conversion):', currencyCode);

            // Lakukan konversi jika rate tidak sama dengan 1
            let convertedTotal = totalPrice / rate;

            // Membulatkan angka terlebih dahulu
            let roundedTotal = Math.round(convertedTotal);

            console.log('Converted Total:', roundedTotal);

            // Memformat angka bulat dengan pemisah ribuan sesuai format 'id-ID'
            let formattedTotal = roundedTotal.toLocaleString('id-ID');

            // Set nilai pada kolom fbo_end_total_currency
            $('#fbo_end_total_currency').val(formattedTotal);

            // Perbarui label sesuai dengan mata uang yang dipilih
            updateCurrencyLabel();
        }

        // Event untuk mengubah total saat dropdown currency berubah
        $('#fbo_currency').on('change', function() {
            calculateTotal(); // Hitung ulang saat currency berubah
        });

        // Fungsi untuk melakukan pencarian
        function performSearch(tripDate, departurePort, arrivalPort, fastBoat, timeDept, adultCount = null,
            childCount = null) {
            // Ambil jumlah adultCount dan childCount dari parameter jika tidak null, atau dari input jika null
            adultCount = adultCount !== null ? adultCount : $('#fbo_adult').val() || 1; // Default 1 dewasa
            childCount = childCount !== null ? childCount : $('#fbo_child').val() || 0;

            $.ajax({
                url: "{{ route('data.search') }}",
                method: 'GET',
                data: {
                    fbo_trip_date: tripDate,
                    fbo_departure_port: departurePort,
                    fbo_arrival_port: arrivalPort,
                    fbo_fast_boat: fastBoat,
                    fbo_departure_time: timeDept,
                    fbo_adult: adultCount,
                    fbo_child: childCount
                },
                success: function(response) {
                    // Tampilkan tabel hasil pencarian tanpa mereset
                    $('#booking-data-table tbody').html(response.html);
                    $('.card-title').html(response.card_title);

                    // Jika ada pickup_meeting_point, tampilkan dan disable input
                    if (response.pickup_meeting_point) {
                        $('#pickup-address').val(response.pickup_meeting_point).prop('disabled', true);
                    } else {
                        $('#pickup-address').val('').prop('disabled', false);
                    }

                    // Jika ada dropoff_meeting_point, tampilkan dan disable input
                    if (response.dropoff_meeting_point) {
                        $('#dropoff-address').val(response.dropoff_meeting_point).prop('disabled',
                            true);
                    } else {
                        $('#dropoff-address').val('').prop('disabled', false);
                    }

                    let adultPublishPrice = parseInt(response.price_adult.replace(/\./g, '')) || 0;
                    let childPublishPrice = parseInt(response.price_child.replace(/\./g, '')) || 0;
                    let discountPerPerson = parseInt(response.discount.replace(/\./g, '')) || 0;

                    let totalDiscount = adultCount * discountPerPerson;
                    let totalPriceBeforeDiscount = (adultPublishPrice * adultCount) + (childPublishPrice * childCount);
                    let totalPriceAfterDiscount = totalPriceBeforeDiscount - totalDiscount;

                    if (totalPriceAfterDiscount < 0) {totalPriceAfterDiscount = 0;
                    }

                    $('#price_adult').val(response.price_adult);
                    $('#price_child').val(response.price_child);
                    $('#fbo_end_total').val(totalPriceAfterDiscount.toLocaleString('id-ID'));

                    // Update nilai fbo_end_total_currency berdasarkan currency yang dipilih
                    updateCurrencyTotal();

                    // Tampilkan hasil pencarian baru
                    $('#search-results').show();

                    // Cek apakah shuttle checkbox perlu ditampilkan
                    if (response.show_shuttle_checkbox) {
                        let pickupDropdownOptions = '<option value="">Select Pickup Area</option>';
                        let dropoffDropdownOptions = '<option value="">Select Dropoff Area</option>';

                        // Populate pickup areas
                        if (response.fbo_pickups && response.fbo_pickups.length > 0) {
                            response.fbo_pickups.forEach(function(area) {
                                pickupDropdownOptions += `<option value="${area.name}">${area.name}</option>`;
                            });
                        }

                        // Populate dropoff areas
                        if (response.fbo_dropoffs && response.fbo_dropoffs.length > 0) {
                            response.fbo_dropoffs.forEach(function(area) {
                                dropoffDropdownOptions += `<option value="${area.name}">${area.name}</option>`;
                            });
                        }

                        // Tampilkan dropdown shuttle area
                        $('#fbo_pickup').html(pickupDropdownOptions);
                        $('#fbo_dropoff').html(dropoffDropdownOptions);

                        // Tampilkan shuttle checkbox
                        $('#shuttle-checkbox').show();

                        // Set shuttle type if available
                        if (response.shuttle_type) {
                            $('#shuttle_type').val(response.shuttle_type);
                        }

                        // Event listener untuk menampilkan input berdasarkan checkbox yang dipilih
                        $('#pickup-shuttle').change(function() {
                            if ($(this).is(':checked')) {
                                $('#pickup-inputs').show();
                            } else {
                                $('#pickup-inputs').hide();
                            }
                        });

                        $('#dropoff-shuttle').change(function() {
                            if ($(this).is(':checked')) {
                                $('#dropoff-inputs').show();
                            } else {
                                $('#dropoff-inputs').hide();
                            }
                        });

                        // Update meeting points for pickup and dropoff areas
                        $('#fbo_pickup').change(function() {
                            const selectedAreaId = $(this).val();
                            const selectedShuttle = response.fbo_pickups.find(shuttle => shuttle.name == selectedAreaId);

                            if (selectedShuttle && selectedShuttle.pickup_meeting_point) {
                                if (selectedShuttle.pickup_meeting_point === 'not_set') {
                                    // Jika meeting point 'not_set', kosongkan input dan izinkan pengguna mengisi
                                    $('#fbo_specific_pickup').val('').prop('readonly', false);
                                } else {
                                    // Jika meeting point tersedia, tampilkan dan non-aktifkan input
                                    $('#fbo_specific_pickup').val(selectedShuttle.pickup_meeting_point).prop('readonly', true);
                                }
                            } else {
                                // Jika tidak ada meeting point, izinkan pengguna untuk mengisi
                                $('#fbo_specific_pickup').val('').prop('readonly', false);
                            }
                        });

                        $('#fbo_dropoff').change(function() {
                            const selectedAreaId = $(this).val();
                            const selectedShuttle = response.fbo_dropoffs.find(shuttle => shuttle.name == selectedAreaId);

                            if (selectedShuttle && selectedShuttle.dropoff_meeting_point) {
                                if (selectedShuttle.dropoff_meeting_point === 'not_set') {
                                    // Jika meeting point 'not_set', kosongkan input dan izinkan pengguna mengisi
                                    $('#fbo_specific_dropoff').val('').prop('readonly', false);
                                } else {
                                    // Jika meeting point tersedia, tampilkan dan non-aktifkan input
                                    $('#fbo_specific_dropoff').val(selectedShuttle.dropoff_meeting_point).prop('readonly', true);
                                }
                            } else {
                                // Jika tidak ada meeting point, izinkan pengguna untuk mengisi
                                $('#fbo_specific_dropoff').val('').prop('readonly', false);
                            }
                        });

                    } else {
                        // Jika tidak ada shuttle, sembunyikan checkbox dan dropdown
                        $('#shuttle-checkbox').hide();
                        $('#fbo_pickup').empty();
                        $('#fbo_dropoff').empty();
                    }

                },
                error: function(xhr, status, error) {
                    console.error("Error in search:", error);
                    console.log(xhr.responseText);
                    // Tambahkan notifikasi error untuk user di sini jika diperlukan
                }
            });
        }


        // Ketika jumlah orang dewasa atau anak-anak diubah, lakukan pencarian ulang tanpa reset hasil
        $('#fbo_adult, #fbo_child').on('input', function() {
            let tripDate = $('#fbo_trip_date').val();
            let departurePort = $('#fbo_departure_port').val();
            let arrivalPort = $('#fbo_arrival_port').val();
            let fastBoat = $('#fbo_fast_boat').val();
            let timeDept = $('#fbo_departure_time').val();

            let adultCount = $('#fbo_adult').val() || 1;
            let childCount = $('#fbo_child').val() || 0;

            // Lakukan pencarian ulang dengan nilai terbaru
            performSearch(tripDate, departurePort, arrivalPort, fastBoat, timeDept, adultCount, childCount);
        });

        // Event listener untuk dropdown currency agar saat diganti, fbo_end_total_currency otomatis diperbarui
        $('#fbo_currency').on('change', function() {
            updateCurrencyTotal(); // Mengupdate currency setiap kali dropdown diubah
        });

        // Fungsi untuk mendapatkan jumlah customer
        function getCustomerCount() {
            var adultCount = $('#fbo_adult').val() || 1;
            var childCount = $('#fbo_child').val() || 0;
            return {
                fbo_adult: adultCount,
                fbo_child: childCount
            };
        }

        // Ketika tanggal dipilih, reset dropdown dan ambil data untuk Departure Port
        $('#fbo_trip_date').change(function() {
            resetSearchResults(); // Sembunyikan hasil pencarian saat tanggal berubah

            var tripDate = $(this).val();
            var customerCount = getCustomerCount(); // Ambil jumlah customer

            $.ajax({
                url: '/getFilteredData',
                method: 'GET',
                data: $.extend({
                    fbo_trip_date: tripDate
                }, customerCount),
                success: function(response) {
                    $('#fbo_departure_port').empty().append('<option value="">Select Departure Port</option>');
                    $.each(response.fbo_departure_ports, function(index, port) {
                        $('#fbo_departure_port').append('<option value="' + port + '">' + port + '</option>');
                    });
                }
            });
        });

        // Ketika Departure Port dipilih, reset dropdown dan ambil data untuk Arrival Port
        $('#fbo_departure_port').change(function() {
            $('#fbo_arrival_port').empty().append('<option value="">Select Arrival Port</option>'); // Reset Arrival Port
            $('#fbo_fast_boat').empty().append('<option value="">Select Fast Boat</option>'); // Reset Fast Boat
            $('#fbo_departure_time').empty().append('<option value="">Select Time Dept</option>'); // Reset Time Dept

            var tripDate = $('#fbo_trip_date').val();
            var departurePort = $(this).val();
            var customerCount = getCustomerCount(); // Ambil jumlah customer

            $.ajax({
                url: '/getFilteredData',
                method: 'GET',
                data: $.extend({
                    fbo_trip_date: tripDate,
                    fbo_departure_port: departurePort
                }, customerCount),
                success: function(response) {
                    // Isi dropdown Arrival Port berdasarkan response
                    $('#fbo_arrival_port').empty().append('<option value="">Select Arrival Port</option>');
                    $.each(response.fbo_arrival_ports, function(index, port) {
                        $('#fbo_arrival_port').append('<option value="' + port + '">' + port + '</option>');
                    });
                }
            });
        });

        // Ketika Arrival Port dipilih, reset dropdown dan ambil data untuk Fast Boat
        $('#fbo_arrival_port').change(function() {
            $('#fbo_fast_boat').empty().append('<option value="">Select Fast Boat</option>'); // Reset Fast Boat
            $('#fbo_departure_time').empty().append('<option value="">Select Time Dept</option>'); // Reset Time Dept

            var tripDate = $('#fbo_trip_date').val();
            var departurePort = $('#fbo_departure_port').val();
            var arrivalPort = $(this).val();
            var customerCount = getCustomerCount(); // Ambil jumlah customer

            $.ajax({
                url: '/getFilteredData',
                method: 'GET',
                data: $.extend({
                    fbo_trip_date: tripDate,
                    fbo_departure_port: departurePort,
                    fbo_arrival_port: arrivalPort
                }, customerCount),
                success: function(response) {
                    // Isi dropdown Fast Boat berdasarkan response
                    $('#fbo_fast_boat').empty().append('<option value="">Select Fast Boat</option>');
                    $.each(response.fbo_fast_boats, function(index, boat) {
                        $('#fbo_fast_boat').append('<option value="' + boat + '">' + boat + '</option>');
                    });
                }
            });
        });

        // Ketika Fast Boat dipilih, ambil data untuk Time Dept
        $('#fbo_fast_boat').change(function() {
            $('#fbo_departure_time').empty().append('<option value="">Select Time Dept</option>'); // Reset Time Dept

            var tripDate = $('#fbo_trip_date').val();
            var departurePort = $('#fbo_departure_port').val();
            var arrivalPort = $('#fbo_arrival_port').val();
            var fastBoat = $(this).val();
            var customerCount = getCustomerCount(); // Ambil jumlah customer

            $.ajax({
                url: '/getFilteredData',
                method: 'GET',
                data: $.extend({
                    fbo_trip_date: tripDate,
                    fbo_departure_port: departurePort,
                    fbo_arrival_port: arrivalPort,
                    fbo_fast_boat: fastBoat
                }, customerCount),
                success: function(response) {
                    // Isi dropdown Time Dept berdasarkan response
                    $('#fbo_departure_time').empty().append('<option value="">Select Time Dept</option>');
                    $.each(response.fbo_departure_times, function(index, time) {
                        $('#fbo_departure_time').append('<option value="' + time + '">' + time + '</option>');
                    });
                }
            });
        });
    });
</script>

{{-- Return --}}
<script>
    $(document).ready(function() {
        // Mengaktifkan atau menonaktifkan field ketika switch diubah
        $('#switch').on('change', function() {
            var inputs = $('#fbo_fast_boat_return, #fbo_departure_time_return, #trip_return_date, #departure_return_port, #arrival_return_port');
            if ($(this).is(':checked')) {
                inputs.removeAttr('disabled');
                $('#searchFormReturn').show(); // Show the form when switch is on
            } else {
                inputs.attr('disabled', 'disabled');
                $('#searchFormReturn').hide(); // Hide the form when switch is off
            }
        });

        // On page load, check the switch state and set the form visibility accordingly
        $(document).ready(function() {
            if ($('#switch').is(':checked')) {
                $('#searchFormReturn').show();
            } else {
                $('#searchFormReturn').hide();
            }
        });

        // Hide pickup and dropoff inputs on page load
        $(document).ready(function() {
            $('#pickup-inputs-return, #dropoff-inputs-return').hide(); // Hide initially
        });

        // Function to reset pickup inputs (without removing options)
        function resetPickupInputsReturn() {
            $('#fbo_pickup_return').val(''); // Clear the selected value, not the options
            $('#fbo_specific_pickup_return').val(''); // Reset the pickup address
            $('input[name="fbo_contact_pickup_return"]').val(''); // Reset the pickup phone input
        }

        // Function to reset dropoff inputs (without removing options)
        function resetDropoffInputsReturn() {
            $('#fbo_dropoff_return').val(''); // Clear the selected value, not the options
            $('#fbo_specific_dropoff_return').val(''); // Reset the dropoff address
            $('input[name="fbo_contact_dropoff_return"]').val(''); // Reset the dropoff phone input
        }

        // Event handler for Pickup Shuttle checkbox
        $('#pickup-shuttle-return').change(function() {
            if ($(this).is(':checked')) {
                $('#pickup-inputs-return').stop(true, true).slideDown(); // Show pickup inputs
            } else {
                $('#pickup-inputs-return').stop(true, true).slideUp(); // Hide pickup inputs
                resetPickupInputsReturn(); // Reset pickup inputs when unchecked
            }
        });

        // Event handler for Dropoff Shuttle checkbox
        $('#dropoff-shuttle-return').change(function() {
            if ($(this).is(':checked')) {
                $('#dropoff-inputs-return').stop(true, true).slideDown(); // Show dropoff inputs
            } else {
                $('#dropoff-inputs-return').stop(true, true).slideUp(); // Hide dropoff inputs
                resetDropoffInputsReturn(); // Reset dropoff inputs when unchecked
            }
        });

        // Fungsi untuk mengecek apakah semua field telah diisi
        function checkFormComplete() {
            let tripDateReturn = $('#trip_return_date').val();
            let departurePortReturn = $('#departure_return_port').val();
            let arrivalPortReturn = $('#arrival_return_port').val();
            let fastBoatReturn = $('#fbo_fast_boat_return').val();
            let timeDeptReturn = $('#fbo_departure_time_return').val();

            if (tripDateReturn && departurePortReturn && arrivalPortReturn && fastBoatReturn && timeDeptReturn) {
                performSearch(tripDateReturn, departurePortReturn, arrivalPortReturn, fastBoatReturn, timeDeptReturn);
            }
        }

        // Fungsi untuk reset hasil pencarian
        function resetSearchResultsReturn() {
            $('#booking-data-table-return tbody').empty();
            $('.card-title-return').empty();
            $('#adult_return_publish').val('');
            $('#child_return_publish').val('');
            $('#total_return_end').val('');
            $('#currency_return_end').val('');
            $('#search-results-return').hide();
            // Reset checkboxes
            $('#pickup-shuttle-return').prop('checked', false); // Reset Pickup Shuttle checkbox
            $('#dropoff-shuttle-return').prop('checked', false); // Reset Dropoff Shuttle checkbox

            // Reset inputs in pickup and dropoff sections
            resetPickupInputsReturn();
            resetDropoffInputsReturn();

            // Hide pickup and dropoff inputs
            $('#pickup-inputs-return').hide(); // Hide pickup inputs after search reset
            $('#dropoff-inputs-return').hide(); // Hide dropoff inputs after search reset
        }

        // Trigger ketika input diubah
        $('#trip_return_date, #departure_return_port, #arrival_return_port, #fbo_fast_boat_return, #fbo_departure_time_return').on('change', function() {
            var type = $(this).attr('name');
            if (type === 'trip_return_date') {
                $('#departure_return_port').empty().append('<option value="">Select Departure Port</option>');
                $('#arrival_return_port').empty().append('<option value="">Select Arrival Port</option>');
                $('#fbo_fast_boat_return').empty().append('<option value="">Select Fast Boat</option>');
                $('#fbo_departure_time_return').empty().append('<option value="">Select Time Dept</option>');
                console.log(type);
            } else if (type === 'departure_return_port') {
                $('#arrival_return_port').empty().append('<option value="">Select Arrival Port</option>');
                $('#fbo_fast_boat_return').empty().append('<option value="">Select Fast Boat</option>');
                $('#fbo_departure_time_return').empty().append('<option value="">Select Time Dept</option>');
                console.log(type);
            } else if (type === 'arrival_return_port') {
                $('#fbo_fast_boat_return').empty().append('<option value="">Select Fast Boat</option>');
                $('#fbo_departure_time_return').empty().append('<option value="">Select Time Dept</option>');
            } else if (type === 'fbo_fast_boat_return') {
                $('#fbo_departure_time_return').empty().append('<option value="">Select Time Dept</option>');
            }
            $('#booking-data-table-return tbody').empty(); // Hapus data di tabel
            $('.card-title-return').empty(); // Hapus judul kartu
            $('#adult_return_publish').val(''); // Reset harga dewasa
            $('#child_return_publish').val(''); // Reset harga anak
            $('#total_return_end').val(''); // Reset total harga
            $('#currency_return_end').val(''); // Reset format mata uang
            $('#search-results-return').hide(); // Sembunyikan hasil pencarian
            resetSearchResultsReturn();
            checkFormComplete(); // Cek dan lakukan pencarian jika semua field terisi
        });

        // Function to format input values with thousands separator
        function formatCurrencyReturn(input) {
            let value = input.val().replace(/\D/g, ''); // Remove all non-numeric characters
            value = value.replace(/(\d)(\d{3})$/, "$1.$2"); // Add thousands separator
            input.val(value); // Update the input value
        }

        function calculateTotalReturn() {
            // Ambil nilai dari input adult_publish dan child_publish
            let adultPublish = $('#adult_return_publish').val().replace(/\./g, '') || 0; // Hapus titik dari pemisah ribuan
            let childPublish = $('#child_return_publish').val().replace(/\./g, '') || 0; // Hapus titik dari pemisah ribuan

            console.log('Adult Publish:', adultPublish);
            console.log('Child Publish:', childPublish);

            // Konversi nilai menjadi angka
            adultPublish = parseInt(adultPublish) || 0;
            childPublish = parseInt(childPublish) || 0;

            console.log('Adult Publish (Parsed):', adultPublish);
            console.log('Child Publish (Parsed):', childPublish);

            // Ambil jumlah dewasa dan anak dari input
            let adultCount = parseInt($('#fbo_adult').val()) || 1; // Default 1 dewasa
            let childCount = parseInt($('#fbo_child').val()) || 0;

            console.log('Adult Count:', adultCount);
            console.log('Child Count:', childCount);

            // Perhitungan total harga
            let totalPrice = (adultPublish * adultCount) + (childPublish * childCount);

            console.log('Total Price:', totalPrice);

            // Set nilai fbo_end_total (IDR) dengan format pemisah ribuan
            $('#total_return_end').val(totalPrice.toLocaleString('id-ID'));

            // Setelah total IDR dihitung, update juga currency_return_end berdasarkan mata uang yang dipilih
            updateCurrencyTotalReturn();
        }

        $('#adult_return_publish, #child_return_publish').on('input', function() {
            formatCurrencyReturn($(this)); // Add thousands separator as user types
            calculateTotalReturn(); // Hitung ulang total harga dan total dalam mata uang
        });

        // Before form submission, remove the thousands separator
        $('form').submit(function(e) {
            $('#adult_return_publish, #child_return_publish, #total_return_end, #currency_return_end').each(function() {let value = $(this).val().replace(/\D/g, ''); // Remove thousands separator
                $(this).val(value); // Update input value
            });
        });

        // Fungsi untuk memperbarui label sesuai mata uang yang dipilih
        function updateCurrencyLabelReturn() {
            let selectedOption = $('#fbo_currency').find('option:selected');
            let currencyCode = selectedOption.data('code') || 'IDR'; // Ambil kode mata uang atau default ke IDR
            // Ubah teks label
            $('label[for="currency_return_end"]').text('End Total Currency (' + currencyCode + ')');
        }

        // Fungsi untuk menghitung ulang total berdasarkan currency yang dipilih
        function updateCurrencyTotalReturn() {
            // Ambil nilai total sebelum diskon dari #total_return_end
            let totalPriceAfterDiscountReturn = parseInt($('#total_return_end').val().replace(/\./g, '')) || 0;

            // Ambil nilai rate dan kode mata uang yang dipilih dari dropdown
            let selectedOption = $('#fbo_currency').find('option:selected');
            let rate = parseFloat(selectedOption.data('rate')) || 1; // Default ke 1 jika rate tidak ditemukan
            let currencyCode = selectedOption.data('code') || 'IDR'; // Default ke IDR jika kode tidak ditemukan

            // Lakukan konversi jika rate tidak sama dengan 1
            let convertedTotalReturn = totalPriceAfterDiscountReturn / rate;

            // Membulatkan angka terlebih dahulu
            let roundedTotalReturn = Math.round(convertedTotalReturn);

            // Memformat angka bulat dengan pemisah ribuan sesuai format 'id-ID'
            let formattedTotalReturn = roundedTotalReturn.toLocaleString('id-ID');

            // Set nilai pada kolom currency_return_end
            $('#currency_return_end').val(formattedTotalReturn);
            console.log('Formatted Total Return:', formattedTotalReturn);

            // Perbarui label sesuai dengan mata uang yang dipilih
            updateCurrencyLabelReturn();
        }

        // Fungsi untuk melakukan pencarian return
        function performSearchReturn(tripDateReturn, departurePortReturn, arrivalPortReturn, fastBoatReturn, timeDeptReturn, adultCountReturn = null, childCountReturn = null) {

            // Ambil jumlah adultCountReturn dan childCountReturn dari parameter jika tidak null, atau dari input jika null
            adultCountReturn = adultCountReturn !== null ? adultCountReturn : $('#fbo_adult').val() || 1; // Default 1 dewasa
            childCountReturn = childCountReturn !== null ? childCountReturn : $('#fbo_child').val() || 0;

            $.ajax({
                url: "{{ route('data.searchReturn') }}",
                method: 'GET',
                data: {
                    trip_return_date: tripDateReturn,
                    departure_return_port: departurePortReturn,
                    arrival_return_port: arrivalPortReturn,
                    fbo_fast_boat_return: fastBoatReturn,
                    fbo_departure_time_return: timeDeptReturn,
                    fbo_adult: adultCountReturn,
                    fbo_child: childCountReturn
                },
                success: function(response) {
                    // Tampilkan tabel hasil pencarian return tanpa mereset
                    $('#booking-data-table-return tbody').html(response.htmlReturn);
                    $('.card-title-return').html(response.card_return_title);

                    // Jika ada pickup_meeting_point, tampilkan dan disable input
                    if (response.pickup_meeting_point_return) {
                        $('#pickup-address-return').val(response.pickup_meeting_point_return).prop('disabled', true);
                    } else {
                        $('#pickup-address-return').val('').prop('disabled', false);
                    }

                    // Jika ada dropoff_meeting_point, tampilkan dan disable input
                    if (response.dropoff_meeting_point_return) {
                        $('#dropoff-address-return').val(response.dropoff_meeting_point_return).prop('disabled', true);
                    } else {
                        $('#dropoff-address-return').val('').prop('disabled', false);
                    }

                    let adultPublishPriceReturn = parseInt(response.adult_return_publish.replace(/\./g, '')) || 0;
                    let childPublishPriceReturn = parseInt(response.child_return_publish.replace(/\./g, '')) || 0;
                    let discountPerPersonReturn = parseInt(response.discount_return.replace(/\./g, '')) || 0;

                    let totalDiscountReturn = adultCountReturn * discountPerPersonReturn;
                    let totalPriceBeforeDiscountReturn = (adultPublishPriceReturn * adultCountReturn) + (childPublishPriceReturn * childCountReturn);
                    let totalPriceAfterDiscountReturn = totalPriceBeforeDiscountReturn - totalDiscountReturn;

                    if (totalPriceAfterDiscountReturn < 0) {
                        totalPriceAfterDiscountReturn = 0;
                    }

                    $('#adult_return_publish').val(response.adult_return_publish);
                    $('#child_return_publish').val(response.child_return_publish);
                    $('#total_return_end').val(totalPriceAfterDiscountReturn.toLocaleString('id-ID'));

                    // Update nilai currency_return_end berdasarkan currency yang dipilih
                    updateCurrencyTotalReturn();

                    // Tampilkan hasil pencarian baru
                    $('#search-results-return').show();

                    // Cek apakah shuttle checkbox perlu ditampilkan
                    if (response.show_shuttle_checkbox_return) {
                        let pickupDropdownOptionsReturn = '<option value="">Select Pickup Area</option>';
                        let dropoffDropdownOptionsReturn = '<option value="">Select Dropoff Area</option>';

                        // Jika ada pickup shuttle area
                        if (response.fbo_pickups_return && response.fbo_pickups_return.length > 0) {response.fbo_pickups_return.forEach(function(area) {
                                pickupDropdownOptionsReturn += `<option value="${area.name}">${area.name}</option>`;
                            });

                            // Tampilkan dropdown pickup area
                            $('#fbo_pickup_return').html(pickupDropdownOptionsReturn);
                        } else {
                            // Jika tidak ada data pickup, kosongkan
                            $('#fbo_pickup_return').empty();
                        }

                        // Jika ada dropoff shuttle area
                        if (response.fbo_dropoffs_return && response.fbo_dropoffs_return.length > 0) {
                            response.fbo_dropoffs_return.forEach(function(area) {
                                dropoffDropdownOptionsReturn += `<option value="${area.name}">${area.name}</option>`;
                            });

                            // Tampilkan dropdown dropoff area
                            $('#fbo_dropoff_return').html(dropoffDropdownOptionsReturn);
                        } else {
                            // Jika tidak ada data dropoff, kosongkan
                            $('#fbo_dropoff_return').empty();
                        }

                        // Tampilkan shuttle checkbox
                        $('#shuttle-checkbox-return').show();

                        // Event listener untuk menampilkan input berdasarkan checkbox yang dipilih
                        $('#pickup-shuttle-return').change(function() {
                            if ($(this).is(':checked')) {
                                $('#pickup-inputs-return').show();
                            } else {
                                $('#pickup-inputs-return').hide();
                            }
                        });

                        $('#dropoff-shuttle-return').change(function() {
                            if ($(this).is(':checked')) {
                                $('#dropoff-inputs-return').show();
                            } else {
                                $('#dropoff-inputs-return').hide();
                            }
                        });


                        $('#fbo_pickup_return').change(function() {
                            const selectedAreaId = $(this).val();
                            const selectedShuttle = response.fbo_pickups_return.find(
                                shuttle => shuttle.name == selectedAreaId);

                            if (selectedShuttle && selectedShuttle.pickup_meeting_point_return) {
                                if (selectedShuttle.pickup_meeting_point_return === 'not_set') {
                                    // Jika meeting point 'not_set', kosongkan input dan izinkan pengguna mengisi
                                    $('#fbo_specific_pickup_return').val('').prop('readonly', false);
                                } else {
                                    // Jika meeting point tersedia, tampilkan dan non-aktifkan input
                                    $('#fbo_specific_pickup_return').val(selectedShuttle.pickup_meeting_point_return).prop('readonly', true);
                                }
                            } else {
                                // Jika tidak ada meeting point, izinkan pengguna untuk mengisi
                                $('#fbo_specific_pickup_return').val('').prop('readonly', false);
                            }
                        });

                        $('#fbo_dropoff_return').change(function() {
                            const selectedAreaId = $(this).val();
                            const selectedShuttle = response.fbo_dropoffs_return.find( shuttle => shuttle.name == selectedAreaId);

                            if (selectedShuttle && selectedShuttle.dropoff_meeting_point_return) {
                                if (selectedShuttle.dropoff_meeting_point_return === 'not_set') {
                                    // Jika meeting point 'not_set', kosongkan input dan izinkan pengguna mengisi
                                    $('#fbo_specific_dropoff_return').val('').prop('readonly', false);
                                } else {
                                    // Jika meeting point tersedia, tampilkan dan non-aktifkan input
                                    $('#fbo_specific_dropoff_return').val(selectedShuttle.dropoff_meeting_point_return).prop('readonly', true);
                                }
                            } else {
                                // Jika tidak ada meeting point, izinkan pengguna untuk mengisi
                                $('#fbo_specific_dropoff_return').val('').prop('readonly', false);
                            }
                        });

                    } else {
                        // Jika tidak perlu shuttle checkbox, sembunyikan dan kosongkan
                        $('#shuttle-checkbox-return').hide();
                        $('#fbo_pickup_return').empty();
                        $('#fbo_dropoff_return').empty();
                    }
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        }

        // Event listener untuk memulai pencarian saat semua input telah terisi
        $('#trip_return_date, #departure_return_port, #arrival_return_port, #fbo_fast_boat_return, #fbo_departure_time_return').on('change keyup input click', function() {
                let tripDateReturn = $('#trip_return_date').val();
                let departurePortReturn = $('#departure_return_port').val();
                let arrivalPortReturn = $('#arrival_return_port').val();
                let fastBoatReturn = $('#fbo_fast_boat_return').val();
                let timeDeptReturn = $('#fbo_departure_time_return').val();

                if (tripDateReturn && departurePortReturn && arrivalPortReturn && fastBoatReturn && timeDeptReturn) {
                    performSearchReturn(tripDateReturn, departurePortReturn, arrivalPortReturn, fastBoatReturn, timeDeptReturn);
                }
            });


        // Ketika jumlah dewasa atau anak diubah, lakukan pencarian ulang tanpa reset hasil
        $('#fbo_adult, #fbo_child').on('input', function() {
            let tripDateReturn = $('#trip_return_date').val();
            let departurePortReturn = $('#departure_return_port').val();
            let arrivalPortReturn = $('#arrival_return_port').val();
            let fastBoatReturn = $('#fbo_fast_boat_return').val();
            let timeDeptReturn = $('#fbo_departure_time_return').val();

            let adultCountReturn = $('#fbo_adult').val() || 1;
            let childCountReturn = $('#fbo_child').val() || 0;

            // Lakukan pencarian ulang dengan nilai terbaru
            performSearchReturn(tripDateReturn, departurePortReturn, arrivalPortReturn, fastBoatReturn, timeDeptReturn, adultCountReturn, childCountReturn);
        });

        // Event listener untuk dropdown currency agar saat diganti, currency_return_end otomatis diperbarui
        $('#fbo_currency').on('change', function() {
            updateCurrencyTotalReturn(); // Mengupdate currency setiap kali dropdown diubah
        });

        // Fungsi untuk mendapatkan jumlah customer
        function getCustomerCountReturn() {
            var adultCountReturn = $('#fbo_adult').val() || 1;
            var childCountReturn = $('#fbo_child').val() || 0;
            return {
                fbo_adult: adultCountReturn,
                fbo_child: childCountReturn
            };
        }

        // Ketika trip_return_date diubah, reset dropdown dan lakukan pencarian data baru
        $('#trip_return_date').change(function() {
            resetSearchResultsReturn();

            let tripDateReturn = $(this).val();
            let customerCount = getCustomerCountReturn();

            $.ajax({
                url: '/getFilteredDataReturn',
                method: 'GET',
                data: $.extend({
                    trip_return_date: tripDateReturn
                }, customerCount),
                success: function(response) {
                    $('#departure_return_port').empty().append('<option value="">Select Departure Port</option>');
                    $.each(response.departure_return_ports, function(index, port) {
                        $('#departure_return_port').append('<option value="' + port + '">' + port + '</option>');
                    });
                }
            });
        });

        // Ketika departure_return_port diubah, reset dan ambil data baru untuk fbo_arrival_port
        $('#departure_return_port').change(function() {
            $('#arrival_return_port').empty().append('<option value="">Select Arrival Port</option>');
            $('#fbo_fast_boat_return, #fbo_departure_time_return').empty().append('<option value="">Select Fast Boat</option>');
            $('#fbo_departure_time_return').empty().append('<option value="">Select Time Dept</option>');

            let tripDateReturn = $('#trip_return_date').val();
            let departurePortReturn = $(this).val();
            let customerCount = getCustomerCountReturn();

            $.ajax({
                url: '/getFilteredDataReturn',
                method: 'GET',
                data: $.extend({
                    trip_return_date: tripDateReturn,
                    departure_return_port: departurePortReturn
                }, customerCount),
                success: function(response) {
                    $('#arrival_return_port').empty().append('<option value="">Select Arrival Port</option>');
                    $.each(response.arrival_return_ports, function(index, port) {
                        $('#arrival_return_port').append('<option value="' + port +'">' + port + '</option>');
                    });
                }
            });
        });

        // Ketika arrival_return_port diubah, reset dan ambil data baru untuk fbo_fast_boat
        $('#arrival_return_port').change(function() {
            $('#fbo_fast_boat_return, #fbo_departure_time_return').empty().append('<option value="">Select Fast Boat</option>');
            $('#fbo_departure_time_return').empty().append('<option value="">Select Time Dept</option>');

            let tripDateReturn = $('#trip_return_date').val();
            let departurePortReturn = $('#departure_return_port').val();
            let arrivalPortReturn = $(this).val();
            let customerCount = getCustomerCountReturn();

            $.ajax({
                url: '/getFilteredDataReturn',
                method: 'GET',
                data: $.extend({
                    trip_return_date: tripDateReturn,
                    departure_return_port: departurePortReturn,
                    arrival_return_port: arrivalPortReturn
                }, customerCount),
                success: function(response) {
                    $('#fbo_fast_boat_return').empty().append('<option value="">Select Fast Boat</option>');
                    $.each(response.fbo_fast_boats_return, function(index, boat) {
                        $('#fbo_fast_boat_return').append('<option value="' + boat + '">' + boat + '</option>');
                    });
                }
            });
        });

        // Ketika fbo_fast_boat_return diubah, ambil data baru untuk fbo_departure_time
        $('#fbo_fast_boat_return').change(function() {
            $('#fbo_departure_time_return').empty().append('<option value="">Select Time Dept</option>');

            let tripDateReturn = $('#trip_return_date').val();
            let departurePortReturn = $('#departure_return_port').val();
            let arrivalPortReturn = $('#arrival_return_port').val();
            let fastBoatReturn = $(this).val();
            let customerCount = getCustomerCountReturn();

            $.ajax({
                url: '/getFilteredDataReturn',
                method: 'GET',
                data: $.extend({
                    trip_return_date: tripDateReturn,
                    departure_return_port: departurePortReturn,
                    arrival_return_port: arrivalPortReturn,
                    fbo_fast_boat_return: fastBoatReturn
                }, customerCount),
                success: function(response) {
                    $('#fbo_departure_time_return').empty().append('<option value="">Select Time Dept</option>');
                    $.each(response.fbo_departure_times_return, function(index, time) {
                        $('#fbo_departure_time_return').append('<option value="' + time + '">' + time + '</option>');
                    });
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function() {
        // Saat payment method diubah
        $('#fbo_payment_method').on('change', function() {
            // Sembunyikan semua Transaction ID
            $('.transaction-id').hide();

            // Dapatkan nilai yang dipilih
            var selectedMethod = $(this).val();

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

            this.submit();
        });
    });
</script>

<script>
    $(document).ready(function() {
        function updateInfo() {
            // Simpan nilai yang sudah diisi sebelumnya
            var previousAdultValues = {};
            $('#adult_info input, #adult_info select').each(function() {
                previousAdultValues[$(this).attr('id')] = $(this).val();
            });

            var previousChildValues = {};
            $('#child_info input, #child_info select').each(function() {
                previousChildValues[$(this).attr('id')] = $(this).val();
            });

            var previousInfantValues = {};
            $('#infant_info input, #infant_info select').each(function() {
                previousInfantValues[$(this).attr('id')] = $(this).val();
            });

            // Clear all current info
            $('#adult_info, #child_info, #infant_info').empty();

            // Get values of each count
            var adultCount = parseInt($('#fbo_adult').val()) || 1;
            var childCount = parseInt($('#fbo_child').val()) || 0;
            var infantCount = parseInt($('#fbo_infant').val()) || 0;

            // Create Adult Info
            for (var i = 1; i <= adultCount; i++) {
                $('#adult_info').append(`
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label class="form-label" for="adult_name_${i}">Adult ${i} Name</label>
                                    <input id="adult_name_${i}" name="adult_name_[]" type="text" placeholder="Enter Name" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label class="form-label" for="adult_age_${i}">Adult ${i} Age</label>
                                    <select id="adult_age_${i}" name="adult_age_[]" class="form-control">
                                        <option value="">Select Age</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label class="form-label" for="adult_gender_${i}">Adult ${i} Gender</label>
                                    <select id="adult_gender_${i}" name="adult_gender_[]" class="form-control">
                                        <option value="">Select Gender</option>
                                        <option value="Female">Female</option>
                                        <option value="Male">Male</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label class="form-label" for="adult_nationality_${i}">Adult ${i} Nationality</label>
                                    <select id="adult_nationality_${i}" name="adult_nationality_[]" class="nationality-select">
                                        <option value="">Select Nationality</option>
                                        @foreach ($nationality as $item)
                                        <option value="{{ $item->nas_country }}">{{ $item->nas_country }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    `);
                var ageSelect = $(`#adult_age_${i}`);
                for (var age = 13; age <= 49; age++) {
                    ageSelect.append(`<option value="${age}">${age}</option>`);
                }
                ageSelect.append('<option value="≧50">≧50</option>');
            }

            // Create Child Info
            for (var i = 1; i <= childCount; i++) {
                $('#child_info').append(`
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label class="form-label" for="child_name_${i}">Child ${i} Name</label>
                                    <input id="child_name_${i}" name="child_name_[]" type="text" placeholder="Enter Name" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label class="form-label" for="child_age_${i}">Child ${i} Age</label>
                                    <select id="child_age_${i}" name="child_age_[]" class="form-control">
                                        <option value="">Select Age</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label class="form-label" for="child_gender_${i}">Child ${i} Gender</label>
                                    <select id="child_gender_${i}" name="child_gender_[]" class="form-control">
                                        <option value="">Select Gender</option>
                                        <option value="Female">Female</option>
                                        <option value="Male">Male</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label class="form-label" for="child_nationality_${i}">Child ${i} Nationality</label>
                                    <select id="child_nationality_${i}" name="child_nationality_[]" class="nationality-select">
                                        <option value="">Select Nationality</option>
                                        @foreach ($nationality as $item)
                                        <option value="{{ $item->nas_country }}">{{ $item->nas_country }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    `);
                var ageSelect = $(`#child_age_${i}`);
                for (var age = 3; age <= 12; age++) {
                    ageSelect.append(`<option value="${age}">${age}</option>`);
                }
            }

            // Create Infant Info
            for (var i = 1; i <= infantCount; i++) {
                $('#infant_info').append(`
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label class="form-label" for="infant_name_${i}">Infant ${i} Name</label>
                                    <input id="infant_name_${i}" name="infant_name_[]" type="text" placeholder="Enter Name" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label class="form-label" for="infant_age_${i}">Infant ${i} Age</label>
                                    <select id="infant_age_${i}" name="infant_age_[]" class="form-control">
                                        <option value="">Select Age</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label class="form-label" for="infant_gender_${i}">Infant ${i} Gender</label>
                                    <select id="infant_gender_${i}" name="infant_gender_[]" class="form-control">
                                        <option value="">Select Gender</option>
                                        <option value="Female">Female</option>
                                        <option value="Male">Male</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label class="form-label" for="infant_nationality_${i}">Infant ${i} Nationality</label>
                                    <select id="infant_nationality_${i}" name="infant_nationality_[]" class="nationality-select">
                                        <option value="">Select Nationality</option>
                                        @foreach ($nationality as $item)
                                        <option value="{{ $item->nas_country }}">{{ $item->nas_country }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    `);
                var ageSelect = $(`#infant_age_${i}`);
                for (var age = 0; age <= 2; age++) {
                    ageSelect.append(`<option value="${age}">${age}</option>`);
                }
            }

            // Kembalikan nilai yang disimpan ke input dan select
            $.each(previousAdultValues, function(id, value) {
                $('#' + id).val(value);
            });
            $.each(previousChildValues, function(id, value) {
                $('#' + id).val(value);
            });
            $.each(previousInfantValues, function(id, value) {
                $('#' + id).val(value);
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
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const paidRadio = document.getElementById('paid');
        const unpaidRadio = document.getElementById('unpaid');
        const paymentMethod = document.getElementById('fbo_payment_method');
        const paymentMethodLabel = document.querySelector('label[for="fbo_payment_method"]'); // Menangkap label
        const transactionIds = document.querySelectorAll('.transaction-id'); // All Transaction ID elements

        // Function untuk menonaktifkan input Payment Method dan sembunyikan semua Transaction ID
        function disablePaymentFields() {
            paymentMethod.style.display = 'none'; // Sembunyikan Payment Method
            paymentMethod.disabled = true;
            paymentMethod.value = "";
            paymentMethodLabel.style.display = 'none'; // Sembunyikan label Payment Method
            transactionIds.forEach(function(element) {
                element.style.display = 'none';
                element.querySelector('input, select').value = ''; // Reset field value
            });
        }

        // Function untuk mengaktifkan input Payment Method
        function enablePaymentFields() {
            paymentMethod.style.display = 'block'; // Tampilkan Payment Method
            paymentMethod.disabled = false;
            paymentMethodLabel.style.display = 'block'; // Tampilkan label Payment Method
        }

        // Event listener untuk radio button Paid
        paidRadio.addEventListener('change', function() {
            if (this.checked) {
                enablePaymentFields(); // Aktifkan Payment Method
            }
        });

        // Event listener untuk radio button Unpaid
        unpaidRadio.addEventListener('change', function() {
            if (this.checked) {
                disablePaymentFields(); // Nonaktifkan Payment Method dan Transaction IDs
            }
        });

        // Event listener untuk Payment Method
        paymentMethod.addEventListener('change', function() {
            // Sembunyikan semua Transaction ID
            transactionIds.forEach(function(element) {
                element.style.display = 'none';
                element.querySelector('input, select').value = ''; // Reset field value
            });

            // Tampilkan Transaction ID berdasarkan Payment Method yang dipilih
            const selectedMethod = this.value;
            if (selectedMethod) {
                document.getElementById(selectedMethod + '_transaction_id').style.display = 'block';
            }
        });

        // Pada saat halaman di-load, cek apakah Paid atau Unpaid yang dipilih
        if (paidRadio.checked) {
            enablePaymentFields();
        } else if (unpaidRadio.checked) {
            disablePaymentFields();
        }
    });
</script>
@endsection