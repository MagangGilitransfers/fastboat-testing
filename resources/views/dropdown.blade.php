@extends('admin.admin_master')
@section('admin')
<style>
    /* Style untuk kalender */
    .calendar-table {
        table-layout: fixed;
        width: 100%;
        border-spacing: 0 5px;
    }

    .calendar-table th,
    .calendar-table td {
        width: 14.28%;
        vertical-align: top;
        padding: 10px;
        position: relative;
    }

    .calendar-table th {
        font-size: 0.9rem;
        height: 40px;
        text-align: center;
    }

    .calendar-table td {
        padding: 10px;
        font-size: 0.85rem;
        line-height: 1.2;
    }

    .calendar-table .calendar-date {
        font-weight: bold;
        display: flex;
        justify-content: center;
        /* Ratakan konten di tengah secara horizontal */
        align-items: center;
        /* Ratakan konten di tengah secara vertikal */
        margin-bottom: 5px;
        font-size: 0.9rem;
    }

    .calendar-date input[type="checkbox"] {
        margin-right: 5px;
    }

    .company-name {
        font-weight: bold;
        margin-top: 10px;
        margin-bottom: 5px;
        font-size: 0.8rem;
    }

    .schedule-name {
        margin-left: 10px;
        margin-bottom: 3px;
        font-size: 0.85rem;
    }

    .availability-entry {
        margin-top: 10px;
        margin-bottom: 5px;
        font-size: 0.8rem;
    }

    .availability-entry input[type="checkbox"] {
        margin-right: 5px;
    }

    .border-danger {
        border: 2px solid red !important;
    }

    .calendar-table th.sunday {
        background-color: #f8d7da;
        color: #dc3545;
    }

    .calendar-table th.friday {
        background-color: #d4edda;
        color: #28a745;
    }

    .modal-header {
        border-bottom: 1px solid #dee2e6;
    }

    .modal-title {
        font-size: 16px;
        font-weight: bold;
        text-align: center;
        width: 100%;
        line-height: 1.5;
    }

    .table-bordered {
        border: 1px solid #dee2e6;
    }

    .table-bordered td,
    .table-bordered th {
        border: 1px solid #dee2e6;
        padding: 8px;
        vertical-align: middle;
    }

    .bold-text {
        font-weight: bold;
    }

    .table-responsive {
        max-height: 400px;
        overflow-y: auto;
    }

    .table .text-center {
        text-align: center;
    }
</style>
<div class="main-content">
    <div class="page-content">
        <div id="addproduct-accordion" class="custom-accordion">
            <div class="row">
                <div class="ms-auto">
                    <div class="btn-toolbar float-end" role="toolbar">
                        <div class="btn-group me-2 mb-2">
                            <a href="{{route('availability.extend')}}" class="btn btn-outline-dark w-100" id="btn-new-event"><i class="mdi mdi-plus"></i>Extend</a>
                        </div>
                        <div class="btn-group me-2 mb-2">
                            <a href="{{route('availability.add')}}" class="btn btn-dark w-100" id="btn-new-event"><i class="mdi mdi-plus"></i>Add</a>
                        </div>
                    </div>
                </div>
            </div>
            <form method="get" action="{{route('availability.search')}}">
                @csrf
                <div class="card">
                    <a href="#addproduct-productinfo-collapse" class="text-body" data-bs-toggle="collapse" aria-expanded="true" aria-controls="addproduct-productinfo-collapse">
                        <div class="p-4">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 overflow-hidden">
                                    <h5 class="font-size-16 mb-1">Fast Boat Availability</h5>
                                    <p class="text-muted text-truncate mb-0">Fill all information below</p>
                                </div>
                                <div class="flex-shrink-0">
                                    <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
                                </div>
                            </div>
                        </div>
                    </a>

                    <div id="addproduct-productinfo-collapse" class="collapse show" data-bs-parent="#addproduct-accordion">
                        <div class="p-4 border-top">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label">Company</label>
                                        <select name="company" id="search-company">
                                            <option value="">Select Company</option>
                                            @foreach ($company as $item)
                                            <option value="{{ $item->cpn_id }}" {{ old('company') == $item->cpn_id ? 'selected' : '' }}>{{ $item->cpn_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label">Fast Boat</label>
                                        <select id="fastboat-search" class="form-control">
                                            <option value="">-- Select Fastboat --</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label">Schedule</label>
                                        <select name="schedule" id="search-schedule">
                                            <option value="">Select Schedule</option>
                                            @foreach ($schedule as $item)
                                            <option value="{{ $item->sch_name }}" {{ old('schedule') == $item->sch_name ? 'selected' : '' }}>{{ $item->sch_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label">Route</label>
                                        <select name="route" id="search-route">
                                            <option value="">Select Route</option>
                                            @foreach ($route as $item)
                                            <option value="{{ $item->rt_dept_island }} to {{ $item->rt_arrival_island }}" {{ old('route') == $item->rt_dept_island . ' to ' . $item->rt_arrival_island ? 'selected' : '' }}>{{ $item->rt_dept_island }} to {{ $item->rt_arrival_island }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label">Date range</label>
                                        <input name="daterange" type="text" class="form-control flatpickr-input" id="daterange" placeholder="Input date range" value="{{ old('daterange') }}">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label">Departure</label>
                                        <select name="departure" id="search-departure">
                                            <option value="">Select Departure Port</option>
                                            @foreach ($departure as $item)
                                            <option value="{{ $item->prt_name_en }}" {{ old('departure') == $item->prt_name_en ? 'selected' : '' }}>{{ $item->prt_name_en }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label">Arrival</label>
                                        <select name="arrival" id="search-arrival">
                                            <option value="">Select Arrival Port</option>
                                            @foreach ($arrival as $item)
                                            <option value="{{ $item->prt_name_en }}" {{ old('arrival') == $item->prt_name_en ? 'selected' : '' }}>{{ $item->prt_name_en }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label">Dept time</label>
                                        <select name="dept_time" id="search-dept_time">
                                            <option value="">Select Dept time</option>
                                            @foreach ($deptTime as $item)
                                            <option value="{{ date('H:i', strtotime($item->fbt_dept_time)) }}" {{ old('dept_time') == date('H:i', strtotime($item->fbt_dept_time)) ? 'selected' : '' }}>{{ date('H:i', strtotime($item->fbt_dept_time)) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="position-relative text-center border-bottom pb-3">
                                    <button type="submit" class="btn btn-outline-dark"><i class="mdi mdi-magnify"></i>&thinsp;Search</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-12">
                            <h5 class="font-size-14 mb-3">Update Type </h5>
                        </div>
                        <div class="row">
                            <div class="col-xl-3 col-lg-6">
                                <div class="form-check font-size-16">
                                    <input type="checkbox" class="form-check-input type" id="price">
                                    <label for="price">Price</label>
                                </div>
                            </div>

                            <div class="col-xl-3 col-lg-6">
                                <div class="form-check font-size-16">
                                    <input type="checkbox" class="form-check-input type" id="stock">
                                    <label for="stock">Stock</label>
                                </div>
                            </div>

                            <div class="col-xl-3 col-lg-6">
                                <div class="form-check font-size-16">
                                    <input type="checkbox" class="form-check-input type" id="pax">
                                    <label for="pax">Min Pax</label>
                                </div>
                            </div>

                            <div class="col-xl-3 col-lg-6">
                                <div class="form-check font-size-16">
                                    <input type="checkbox" class="form-check-input type" id="shuttle-status-check">
                                    <label for="shuttle-status-check">Shuttle Status</label>
                                </div>
                            </div>

                            <div class="col-xl-3 col-lg-6">
                                <div class="form-check font-size-16">
                                    <input type="checkbox" class="form-check-input type" id="available-status">
                                    <label for="available-status">Available Status</label>
                                </div>
                            </div>

                            <div class="col-xl-3 col-lg-6">
                                <div class="form-check font-size-16">
                                    <input type="checkbox" class="form-check-input type" id="availability-info-check">
                                    <label for="availability-info-check">Availability Info</label>
                                </div>
                            </div>

                            <div class="col-xl-3 col-lg-6">
                                <div class="form-check font-size-16">
                                    <input type="checkbox" class="form-check-input type" id="custom-time">
                                    <label for="custom-time">Custom Dept & Arriv Time</label>
                                </div>
                            </div>

                            <div class="col-xl-3 col-lg-6">
                                <div class="form-check font-size-16">
                                    <input type="checkbox" class="form-check-input type" id="all-type">
                                    <label for="all-type">Select All Type</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="position-relative text-center border-bottom pb-3">
                        <button class="btn  btn-outline-dark"><i class="mdi mdi-pencil"></i>&thinsp;Update</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="font-size-14 mb-3">Availability Calendar</h5>
                        <div class="col-xl-3 col-lg-6">
                            <div class="form-check font-size-16">
                                <input type="checkbox" class="form-check-input" id="select_all_trips">
                                <label for="select_all_trips">All Trips</label>
                            </div>
                        </div>

                        @php
                        // Mendapatkan tanggal awal dan akhir dari data availability
                        $availabilities = session('availabilities', collect());
                        $firstDate = $availabilities->isNotEmpty() ? \Carbon\Carbon::parse($availabilities->min('fba_date')) : \Carbon\Carbon::now();
                        $lastDate = $availabilities->isNotEmpty() ? \Carbon\Carbon::parse($availabilities->max('fba_date')) : \Carbon\Carbon::now();

                        // Mendapatkan hari pertama dari tanggal awal (0 untuk Minggu, 6 untuk Sabtu)
                        $startDayOfWeek = $firstDate->dayOfWeek;
                        $currentDate = $firstDate->copy();

                        // Hitung total minggu yang diperlukan dalam kalender
                        $totalWeeks = ceil(($lastDate->diffInDays($firstDate) + $startDayOfWeek + 1) / 7);

                        // Mengelompokkan data availability berdasarkan tanggal
                        $availabilityByDate = $availabilities->groupBy(function ($item) {
                        return \Carbon\Carbon::parse($item->fba_date)->format('Y-m-d');
                        });
                        @endphp

                        <table class="table table-bordered calendar-table">
                            <thead>
                                <tr>
                                    <th class="text-center sunday">SUN</th>
                                    <th class="text-center">MON</th>
                                    <th class="text-center">TUE</th>
                                    <th class="text-center">WED</th>
                                    <th class="text-center">THU</th>
                                    <th class="text-center friday">FRI</th>
                                    <th class="text-center">SAT</th>
                                </tr>
                            </thead>

                            @if($availabilities->isNotEmpty())
                            @for ($week = 0; $week < $totalWeeks; $week++)
                                <tbody>
                                <tr>
                                    @for ($day = 0; $day < 7; $day++)
                                        @if ($week===0 && $day < $startDayOfWeek)
                                        <!-- Kosongkan sel sebelum tanggal pertama -->
                                        <td></td>
                                        @elseif ($currentDate->gt($lastDate))
                                        <!-- Kosongkan sel setelah tanggal terakhir -->
                                        <td></td>
                                        @else
                                        @php
                                        $dateString = $currentDate->format('Y-m-d');
                                        @endphp

                                        @if ($availabilityByDate->has($dateString))
                                        <td class="{{ $currentDate->isSunday() ? 'sunday' : ($currentDate->isFriday() ? 'friday' : '') }}" style="{{ $currentDate->isLastOfMonth() ? 'border: 3px solid red' : '' }}">
                                            <!-- Tampilkan Tanggal dengan Checkbox -->
                                            <div class="calendar-date">
                                                <input type="checkbox" class="form-check-input select-day" name="select_date[]" value="{{ $dateString }}" />
                                                <span>{{ $currentDate->format('d M Y') }}</span>
                                            </div>

                                            <!-- Looping untuk setiap perusahaan dan schedule -->
                                            @foreach ($availabilityByDate[$dateString]->groupBy('trip.fastboat.company.cpn_name') as $companyName => $companyData)
                                            @foreach ($companyData->groupBy('trip.schedule.sch_name') as $scheduleName => $scheduleData)
                                            <div class="company-name">{{ $companyName }} / {{ $scheduleName }}</div>

                                            <!-- Looping untuk setiap availability dalam schedule -->
                                            @foreach ($scheduleData as $item)
                                            <div class="availability-entry">
                                                <input type="checkbox" class="form-check-input select-availability" name="select_availability[]" value="{{ $item->id }}" />
                                                @if ($item->fba_status == 'disable')
                                                <a href="#" id="availabilityButton" data-bs-toggle="modal" data-bs-target="#availabilityModal" data-url="{{route('availability.show', $item->fba_id)}}" class="text-danger">
                                                    {{ $item->trip->departure->island->isd_code }}-{{ $item->trip->arrival->island->isd_code }}
                                                    {{ \Carbon\Carbon::parse($item->trip->fbt_dept_time)->format('H:i') }}
                                                    ({{ $item->fba_stock }})
                                                </a>
                                                @else
                                                <a href="#" id="availabilityButton" data-bs-toggle="modal" data-bs-target="#availabilityModal" data-url="{{route('availability.show', $item->fba_id)}}">
                                                    {{ $item->trip->departure->island->isd_code }}-{{ $item->trip->arrival->island->isd_code }}
                                                    {{ \Carbon\Carbon::parse($item->trip->fbt_dept_time)->format('H:i') }}
                                                    ({{ $item->fba_stock }})
                                                </a>
                                                @endif
                                            </div>
                                            @endforeach
                                            @endforeach
                                            @endforeach
                                        </td>
                                        @else
                                        <td style="{{ $currentDate->isLastOfMonth() ? 'border: 3px solid red' : '' }}"></td>
                                        @endif

                                        @php
                                        $currentDate->addDay();
                                        @endphp
                                        @endif
                                        @endfor
                                </tr>
                                </tbody>
                                @endfor
                                @else
                                @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Scrollable modal for view detail-->
    <div class="modal fade" id="availabilityModal" tabindex="-1" role="dialog" aria-labelledby="availabilityModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="availabilityModalLabel">
                        <span id="trip-title"></span><br>
                        <small class="bold-text" id="trip-date"></small>
                    </h5>
                    
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-4">
                            <tr>
                                <td class="bold-text">Fast Boat :</td>
                                <td id="fastboat-name"></td>
                                <td class="bold-text">Route :</td>
                                <td id="trip"></td>
                            </tr>
                            <tr>
                                <td class="bold-text">Time :</td>
                                <td id="time"></td>
                                <td class="bold-text">Min pax :</td>
                                <td id="min-pax"></td>
                            </tr>
                            <tr>
                                <td class="bold-text">Trip Info :</td>
                                <td id="trip-info"></td>
                                <td class="bold-text">Availability info :</td>
                                <td id="availability-info"></td>
                            </tr>
                        </table>
                        <table class="table table-bordered mb-4">
                            <tr>
                                <td class="bold-text">Available :</td>
                                <td id="available"></td>
                                <td class="bold-text">Shuttle Status :</td>
                                <td id="shuttle-status"></td>
                            </tr>
                            <tr>
                                <td class="bold-text">Trip Status :</td>
                                <td id="trip-status"></td>
                                <td class="bold-text">Availability Status :</td>
                                <td id="availability-status"></td>
                            </tr>
                            <tr>
                                <td class="bold-text">Discount :</td>
                                <td colspan="3">Discount IDR <span id="discount"></span> for round trip with same fast boat</td>
                            </tr>
                        </table>
                        <table class="table table-bordered text-center">
                            <thead class="bg-warning">
                                <tr>
                                    <th></th>
                                    <th class="bold-text">Publish</th>
                                    <th class="bold-text">Nett</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="bold-text">Adult</td>
                                    <td>IDR <span id="adult-publish"></span></td>
                                    <td>IDR <span id="adult-nett"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold-text">Child</td>
                                    <td>IDR <span id="child-publish"></span> </td>
                                    <td>IDR <span  id="child-nett"></span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- End Page-content -->
    @include('admin.components.footer')
</div>
@endsection
@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    new TomSelect("#search-company");
    new TomSelect("#search-schedule");
    new TomSelect("#search-departure");
    new TomSelect("#search-arrival");
    new TomSelect("#search-route");
    new TomSelect("#search-dept_time");

    flatpickr("#daterange", {
        mode: "range",
        dateFormat: "d-m-Y",
        disable: [
            function(date) {
                return !(date.getDate() % 100);
            }
        ]
    });

    $(document).ready(function () {
    $('#search-company').on('change', function () {
                var cpn_id = this.value;
                $("#fastboat-search").html('');
                $.ajax({
                url: "{{ url('api/fetch-fastboat') }}",
                type: "POST",
                data: {
                    cpn_id: cpn_id,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function (result) {
                    console.log(result);
                    $('#fastboat-search').html('<option value="">-- Select Fastboat --</option>');
                    $.each(result.fastboat, function (key, value) {
                        $("#fastboat-search").append('<option value="' + value.fb_id + '">' + value.fb_name + '</option>');
                    });
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText); // Untuk menangkap pesan error
                }
            });

        });
    });        
    
    // all check update type
    $(document).ready(function() {
        const $allTypeCheckbox = $('#all-type');
        const $checkboxes = $('.type').not('#all-type');

        // Fungsi untuk mengaktifkan/menonaktifkan semua checkbox
        function toggleAllCheckboxes(state) {
            $checkboxes.prop('checked', state);
        }

        // Event listener untuk checkbox "all-type"
        $allTypeCheckbox.on('change', function() {
            toggleAllCheckboxes($(this).is(':checked'));
        });

        // Event listeners untuk semua checkbox lainnya
        $checkboxes.on('change', function() {
            const allChecked = $checkboxes.length === $checkboxes.filter(':checked').length;
            $allTypeCheckbox.prop('checked', allChecked);
        });
    });

    document.addEventListener("DOMContentLoaded", function() {
        // Checkbox "All Trips"
        const selectAllTrips = document.getElementById("select_all_trips");

        // Checkbox untuk hari-hari
        const dayCheckboxes = document.querySelectorAll('.calendar-date input[type="checkbox"]');

        // Checkbox untuk setiap item dalam hari
        const itemCheckboxes = document.querySelectorAll('.availability-entry input[type="checkbox"]');

        // Fungsi untuk mengaktifkan atau menonaktifkan semua checkbox hari
        function toggleDayCheckboxes(checked) {
            dayCheckboxes.forEach(dayCheckbox => {
                dayCheckbox.checked = checked;
                // Trigger event change untuk setiap checkbox hari
                dayCheckbox.dispatchEvent(new Event('change'));
            });

            // Juga aktifkan/nonaktifkan semua checkbox item dalam hari
            itemCheckboxes.forEach(itemCheckbox => {
                itemCheckbox.checked = checked;
            });
        }

        // Event listener untuk checkbox "All Trips"
        selectAllTrips.addEventListener("change", function() {
            toggleDayCheckboxes(this.checked);
        });

        // Event listener untuk setiap checkbox hari
        dayCheckboxes.forEach(dayCheckbox => {
            dayCheckbox.addEventListener("change", function() {
                // Jika salah satu checkbox hari dinonaktifkan, matikan "All Trips"
                if (!this.checked) {
                    selectAllTrips.checked = false;
                } else {
                    // Periksa apakah semua checkbox hari diaktifkan
                    const allDaysChecked = Array.from(dayCheckboxes).every(cb => cb.checked);
                    selectAllTrips.checked = allDaysChecked;
                }
            });
        });

        // Event listener untuk setiap checkbox item dalam hari
        itemCheckboxes.forEach(itemCheckbox => {
            itemCheckbox.addEventListener("change", function() {
                // Cari checkbox hari yang sesuai
                const dayCheckbox = this.closest('td').querySelector('.calendar-date input[type="checkbox"]');

                // Jika salah satu checkbox item dinonaktifkan, matikan checkbox hari dan "All Trips"
                if (!this.checked) {
                    dayCheckbox.checked = false;
                    selectAllTrips.checked = false;
                } else {
                    // Jika semua checkbox item dalam hari diaktifkan, aktifkan checkbox hari
                    const allItemsChecked = Array.from(this.closest('td').querySelectorAll('.availability-entry input[type="checkbox"]')).every(cb => cb.checked);
                    dayCheckbox.checked = allItemsChecked;

                    // Periksa apakah semua checkbox hari dan item diaktifkan
                    const allDaysAndItemsChecked = Array.from(dayCheckboxes).every(cb => cb.checked) &&
                        Array.from(itemCheckboxes).every(cb => cb.checked);
                    selectAllTrips.checked = allDaysAndItemsChecked;
                }
            });
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        // Mendapatkan semua checkbox hari
        const dayCheckboxes = document.querySelectorAll('.select-day');

        dayCheckboxes.forEach(dayCheckbox => {
            dayCheckbox.addEventListener('change', function() {
                // Mendapatkan semua checkbox availability pada hari tersebut
                const availabilityCheckboxes = this.closest('td').querySelectorAll('.select-availability');

                availabilityCheckboxes.forEach(checkbox => {
                    checkbox.checked = this.checked;
                });
            });
        });

        // Mengatur agar checkbox hari nonaktif jika salah satu checkbox availability di hari tersebut dinonaktifkan
        const availabilityCheckboxes = document.querySelectorAll('.select-availability');

        availabilityCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                const dayCheckbox = this.closest('td').querySelector('.select-day');
                if (!this.checked) {
                    dayCheckbox.checked = false;
                } else {
                    // Periksa apakah semua checkbox availability pada hari tersebut sudah aktif
                    const allChecked = Array.from(this.closest('td').querySelectorAll('.select-availability')).every(chk => chk.checked);
                    dayCheckbox.checked = allChecked;
                }
            });
        });
    });


    $(document).ready(function() {
        $('body').on('click', '#availabilityButton', function() {

        })
    });

    $(document).ready(function(){
        $('body').on('click', '#availabilityButton', function(){
            var detailURL = $(this).data('url');
            $.get(detailURL, function(data){
                $('#availabilityModal').modal('show');
                $('#trip-title').text(data.trip.fbt_name);
                var date = new Date(data.fba_date);
                var options = { day: '2-digit', month: 'short', year: 'numeric' };
                var formattedDate = date.toLocaleDateString('en-GB', options);
                $('#trip-date').text(formattedDate);
                $('#fastboat-name').text(data.trip.fastboat.fb_name);
                $('#trip').text(data.trip.fbt_name);
                $('#time').text(data.trip.fbt_dept_time.substring(0, 5) + ' - ' + data.trip.fbt_arrival_time.substring(0, 5));
                $('#min-pax').text(data.trip.fbt_min_pax);
                $('#trip-info').text(data.trip.fbt_info_en);
                $('#availability-info').text(data.fba_info);
                $('#available').text(data.fba_stock);
                $('#shuttle-status').text(data.fba_shuttle_status);
                $('#trip-status').text(data.trip.fbt_status);
                if (data.trip.fbt_status === 1){
                        $('#trip-status').text('enable');
                    }else{
                        $('#trip-status').text('disable');
                    }
                $('#availability-status').text(data.fba_status);
                // Format numerical values
                function formatNumber(number) {
                    return Number(number).toLocaleString('id-ID'); // 'id-ID' for Indonesian locale, use 'en-US' for English locale
                }
                $('#discount').text(formatNumber(data.fba_discount));
                $('#adult-publish').text(formatNumber(data.fba_adult_publish));
                $('#adult-nett').text(formatNumber(data.fba_adult_nett));
                $('#child-publish').text(formatNumber(data.fba_child_publish));
                $('#child-nett').text(formatNumber(data.fba_child_nett));
            })
        })
    });
</script>
@endsection

Route::get('dropdown', [DropdownController::class, 'index']);
    // Route::post('api/fetch-fastboat', [DropdownController::class, 'fetchFastboat']);
    Route::post('api/fetch-fastboat', [FastboatAvailabilityController::class, 'fetchFastboat']);
    Route::post('api/fetch-schedule', [DropdownController::class, 'fetchSchedule']);

    $company = DataCompany::get(["cpn_name", "cpn_id"]);
    public function fetchFastboat(Request $request) {
        $data = DataFastboat::where("fb_company", $request->cpn_id)->get(["fb_name", "fb_id"]);
        return response()->json(['fastboat' => $data]);
    }