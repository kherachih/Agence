@extends('admin.master_layout')
@section('title')
    <title>{{ __('translate.Service Availability') }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('translate.Service Availability Management') }}</h3>
    <p class="crancy-header__text">
        {{ __('translate.Manage Availability') }} >> {{ $service->title }}
    </p>
@endsection

@push('style_section')
    <link rel="stylesheet" href="{{ asset('global/select2/select2.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <style>
        .availability-calendar {
            margin-top: 20px;
        }

        .fc-day-grid-event {
            cursor: pointer;
        }

        .availability-legend {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .legend-item {
            display: flex;
            align-items: center;
            margin-right: 20px;
        }

        .legend-color {
            width: 20px;
            height: 20px;
            margin-right: 5px;
            border-radius: 3px;
        }

        .legend-available {
            background-color: #4caf50;
        }

        .legend-unavailable {
            background-color: #f44336;
        }

        .legend-period {
            background-color: #2196f3;
        }

        .date-range-select {
            margin-bottom: 20px;
            padding: 15px;
            background-color: #f9f9f9;
            border-radius: 5px;
            border: 1px solid #e0e0e0;
        }

        .date-range-title {
            font-weight: 600;
            margin-bottom: 10px;
        }

        .date-picker-container {
            margin-bottom: 15px;
        }

        .availability-actions {
            margin-top: 10px;
        }

        .selected-periods {
            margin-top: 15px;
            padding: 10px;
            background-color: #f0f7ff;
            border: 1px dashed #c0d6f9;
            border-radius: 5px;
            display: none;
        }

        #selectedPeriodsCount {
            font-weight: 600;
            color: #2563eb;
        }

        .flatpickr-day.selected.available {
            background-color: #4caf50;
        }

        .flatpickr-day.selected.unavailable {
            background-color: #f44336;
        }

        .flatpickr-day.selected.period {
            background-color: #2196f3;
        }

        .modal-lg {
            max-width: 800px;
        }

        .availability-flex {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .period-card {
            background-color: #f9f9f9;
            border: 1px solid #e0e0e0;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 15px;
        }

        .period-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .period-actions {
            display: flex;
            gap: 10px;
        }
    </style>
@endpush

@section('body-content')
    <section class="crancy-adashboard crancy-show">
        <div class="container container__bscreen">
            <div class="row">
                <div class="col-12">
                    <div class="crancy-body">
                        <div class="crancy-dsinner">
                            <div class="row">
                                <div class="col-12 mg-top-30">
                                    <div class="crancy-product-card">
                                        <div class="create_new_btn_inline_box">
                                            <h4 class="crancy-product-card__title">
                                                {{ __('translate.Service Availability') }}</h4>
                                            <div>
                                                <a href="{{ route('admin.tourbooking.services.edit', $service) }}"
                                                    class="crancy-btn"><i class="fa fa-edit"></i>
                                                    {{ __('translate.Edit Service') }}</a>
                                                <a href="{{ route('admin.tourbooking.services.index') }}"
                                                    class="crancy-btn"><i class="fa fa-list"></i>
                                                    {{ __('translate.Service List') }}</a>
                                            </div>
                                        </div>

                                        <div class="row mg-top-30">
                                            <!-- Availability Section -->
                                            <div class="col-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>{{ __('translate.Availability') }}</h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="alert alert-info">
                                                            <i class="fa fa-info-circle"></i>
                                                            {{ __('translate.Add multiple availability periods with maximum number of people for each period.') }}
                                                        </div>

                                                        <!-- Add New Period Form -->
                                                        <div class="date-range-select">
                                                            <h5 class="date-range-title">
                                                                <i class="fa fa-plus-circle"></i> {{ __('translate.Add New Period') }}</h5>
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <div class="date-picker-container">
                                                                        <label>{{ __('translate.Start Date') }}</label>
                                                                        <input type="text" id="startDate"
                                                                            class="crancy__item-input datepicker-start"
                                                                            placeholder="{{ __('translate.Select start date') }}" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="date-picker-container">
                                                                        <label>{{ __('translate.End Date') }}</label>
                                                                        <input type="text" id="endDate"
                                                                            class="crancy__item-input datepicker-end"
                                                                            placeholder="{{ __('translate.Select end date') }}" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="date-picker-container">
                                                                        <label>{{ __('translate.Max People') }}</label>
                                                                        <input type="number" id="maxPeople"
                                                                            class="crancy__item-input"
                                                                            placeholder="{{ __('translate.Max people') }}"
                                                                            min="1" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="availability-actions mt-4">
                                                                        <button type="button" id="addPeriodBtn"
                                                                            class="crancy-btn">
                                                                            <i class="fa fa-plus"></i> {{ __('translate.Add Period') }}
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Periods List -->
                                                        <div id="periodsList" class="mt-4">
                                                            <h5 class="date-range-title">
                                                                <i class="fa fa-calendar"></i> {{ __('translate.Availability Periods') }}
                                                                <span id="periodsCount" class="badge bg-primary ms-2">0</span>
                                                            </h5>
                                                            <div id="periodsContainer">
                                                                <!-- Periods will be added here dynamically -->
                                                            </div>
                                                        </div>

                                                        <!-- Save All Periods Button -->
                                                        <div class="mt-4">
                                                            <form id="saveAllPeriodsForm" method="POST" action="{{ route('admin.tourbooking.services.availability.periods.store', $service) }}">
                                                                @csrf
                                                                <div id="periodsInputContainer"></div>
                                                                <button type="submit" class="crancy-btn btn-success">
                                                                    <i class="fa fa-save"></i> {{ __('translate.Save All Periods') }}
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Existing Availability Periods Table -->
                                            <div class="col-12 mg-top-30">
                                                <h5>{{ __('translate.Saved Availability Periods') }}</h5>
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>{{ __('translate.Start Date') }}</th>
                                                                <th>{{ __('translate.End Date') }}</th>
                                                                <th>{{ __('translate.Max People') }}</th>
                                                                <th>{{ __('translate.Status') }}</th>
                                                                <th>{{ __('translate.Action') }}</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if(isset($service->availability_periods) && count($service->availability_periods) > 0)
                                                                @foreach($service->availability_periods as $period)
                                                                    <tr>
                                                                        <td>{{ date('d M Y', strtotime($period->start_date)) }}</td>
                                                                        <td>{{ date('d M Y', strtotime($period->end_date)) }}</td>
                                                                        <td><span class="badge bg-info">{{ $period->max_people }}</span></td>
                                                                        <td>
                                                                            @if($period->is_active)
                                                                                <span class="badge bg-success">{{ __('translate.Active') }}</span>
                                                                            @else
                                                                                <span class="badge bg-danger">{{ __('translate.Inactive') }}</span>
                                                                            @endif
                                                                        </td>
                                                                        <td class="availability-flex">
                                                                            <button type="button" class="btn btn-sm btn-danger delete-period"
                                                                                data-id="{{ $period->id }}"
                                                                                data-start-date="{{ date('d M Y', strtotime($period->start_date)) }}"
                                                                                data-end-date="{{ date('d M Y', strtotime($period->end_date)) }}">
                                                                                <i class="fa fa-trash"></i>
                                                                            </button>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            @else
                                                                <tr>
                                                                    <td colspan="5" class="text-center">{{ __('translate.No availability periods configured') }}</td>
                                                                </tr>
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Edit Availability Modal -->
    <div class="modal fade" id="editAvailabilityModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('translate.Edit Availability') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editAvailabilityForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label>{{ __('translate.Date') }}</label>
                            <input type="text" id="edit_date" class="crancy__item-input datepicker" required>
                        </div>
                        <div class="form-group mb-3">
                            <label>{{ __('translate.Start Time') }}</label>
                            <input type="time" id="edit_start_time" class="crancy__item-input">
                        </div>
                        <div class="form-group mb-3">
                            <label>{{ __('translate.End Time') }}</label>
                            <input type="time" id="edit_end_time" class="crancy__item-input">
                        </div>
                        <div class="form-group mb-3">
                            <label>{{ __('translate.Available Spots') }}</label>
                            <input type="number" id="edit_available_spots" class="crancy__item-input" min="1">
                        </div>
                        <div class="form-group mb-3">
                            <label>{{ __('translate.Special Price') }}</label>
                            <input type="number" step="0.01" id="edit_special_price" class="crancy__item-input">
                        </div>
                        <div class="form-group mb-3">
                            <label>{{ __('translate.Status') }}</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="is_available" id="edit_is_available" value="1">
                                <label class="form-check-label" for="edit_is_available">{{ __('translate.Available') }}</label>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>{{ __('translate.Notes') }}</label>
                            <textarea id="edit_notes" class="crancy__item-input" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">{{ __('translate.Cancel') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('translate.Update') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Period Confirmation Modal -->
    <div class="modal fade" id="deletePeriodModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('translate.Delete Period') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>{{ __('translate.Are you sure you want to delete this period?') }}</p>
                    <p><strong>{{ __('translate.Start Date') }}:</strong> <span id="deletePeriodStartDate"></span></p>
                    <p><strong>{{ __('translate.End Date') }}:</strong> <span id="deletePeriodEndDate"></span></p>
                </div>
                <div class="modal-footer">
                    <form id="deletePeriodForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">{{ __('translate.Cancel') }}</button>
                        <button type="submit" class="btn btn-danger">{{ __('translate.Delete') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js_section')
    <script src="{{ asset('global/select2/select2.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        (function($) {
            "use strict"
            $(document).ready(function() {
                // Array to store periods
                let periods = [];

                // Initialize date pickers
                $(".datepicker").flatpickr({
                    dateFormat: "Y-m-d",
                    minDate: "today",
                });

                // Function to get all dates from existing periods
                function getDisabledDates() {
                    const disabledDates = [];
                    periods.forEach(function(period) {
                        const startDate = new Date(period.start_date);
                        const endDate = new Date(period.end_date);
                        
                        // Add all dates in the range to disabled dates
                        const currentDate = new Date(startDate);
                        while (currentDate <= endDate) {
                            disabledDates.push(currentDate.toISOString().split('T')[0]);
                            currentDate.setDate(currentDate.getDate() + 1);
                        }
                    });
                    return disabledDates;
                }

                // Initialize start date picker - only future dates allowed
                var startDatePicker = $("#startDate").flatpickr({
                    dateFormat: "Y-m-d",
                    minDate: "today",
                    disableMobile: "true",
                    locale: {
                        firstDayOfWeek: 1
                    },
                    disable: getDisabledDates(),
                    onChange: function(selectedDates, dateStr, instance) {
                        // Update end date picker minimum date to be after start date
                        endDatePicker.set('minDate', dateStr);
                        // Disable selected start date and all dates before it
                        endDatePicker.set('disable', getDisabledDates());
                    }
                });

                // Initialize end date picker - only future dates allowed
                var endDatePicker = $("#endDate").flatpickr({
                    dateFormat: "Y-m-d",
                    minDate: "today",
                    disableMobile: "true",
                    locale: {
                        firstDayOfWeek: 1
                    },
                    disable: getDisabledDates(),
                    onChange: function(selectedDates, dateStr, instance) {
                        // Update start date picker to disable selected end date
                        startDatePicker.set('disable', getDisabledDates());
                    }
                });

                // Add Period Button Click
                $('#addPeriodBtn').click(function() {
                    const startDate = $('#startDate').val();
                    const endDate = $('#endDate').val();
                    const maxPeople = $('#maxPeople').val();

                    // Validation
                    if (!startDate || !endDate) {
                        alert('{{ __("translate.Please select both start and end dates.") }}');
                        return;
                    }

                    if (maxPeople === '' || maxPeople < 1) {
                        alert('{{ __("translate.Please enter a valid number of people.") }}');
                        return;
                    }

                    // Add period to array
                    const period = {
                        id: Date.now(), // Unique ID for the period
                        start_date: startDate,
                        end_date: endDate,
                        max_people: parseInt(maxPeople)
                    };

                    periods.push(period);

                    // Update UI
                    renderPeriods();

                    // Clear form
                    $('#startDate').val('');
                    $('#endDate').val('');
                    $('#maxPeople').val('');
                });

                // Render Periods
                function renderPeriods() {
                    const periodsContainer = $('#periodsContainer');
                    periodsContainer.empty();
 
                    if (periods.length === 0) {
                        periodsContainer.html('<div class="alert alert-warning">{{ __("translate.No periods added yet.") }}</div>');
                        $('#periodsCount').text('0');
                        return;
                    }
 
                    $('#periodsCount').text(periods.length);
 
                    periods.forEach(function(period, index) {
                        const startDate = new Date(period.start_date);
                        const endDate = new Date(period.end_date);
                        const formattedStartDate = startDate.toLocaleDateString('fr-FR', { day: 'numeric', month: 'long', year: 'numeric' });
                        const formattedEndDate = endDate.toLocaleDateString('fr-FR', { day: 'numeric', month: 'long', year: 'numeric' });
 
                        const periodHtml = `
                            <div class="period-card" data-id="${period.id}">
                                <div class="period-header">
                                    <div>
                                        <strong>{{ __("translate.Period") }} ${index + 1}:</strong>
                                        <span class="badge bg-primary">${formattedStartDate} - ${formattedEndDate}</span>
                                        <span class="badge bg-info">{{ __("translate.Max People") }}: ${period.max_people}</span>
                                    </div>
                                    <button type="button" class="btn btn-sm btn-danger remove-period" data-id="${period.id}">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        `;
                        periodsContainer.append(periodHtml);
                    });
 
                    // Update hidden inputs with periods data
                    const container = $('#periodsInputContainer');
                    container.empty();
                    
                    periods.forEach(function(period, index) {
                        container.append(`<input type="hidden" name="periods[${index}][start_date]" value="${period.start_date}">`);
                        container.append(`<input type="hidden" name="periods[${index}][end_date]" value="${period.end_date}">`);
                        container.append(`<input type="hidden" name="periods[${index}][max_people]" value="${period.max_people}">`);
                    });
                    
                    // Update date pickers to disable dates from existing periods
                    const disabledDates = getDisabledDates();
                    startDatePicker.set('disable', disabledDates);
                    endDatePicker.set('disable', disabledDates);
                }

                // Remove Period (from temporary list)
                $(document).on('click', '.remove-period', function() {
                    const periodId = $(this).data('id');
                    periods = periods.filter(p => p.id !== periodId);
                    renderPeriods();
                });

                // Delete Period (from database)
                $('.delete-period').click(function() {
                    const id = $(this).data('id');
                    const startDate = $(this).data('start-date');
                    const endDate = $(this).data('end-date');

                    $('#deletePeriodStartDate').text(startDate);
                    $('#deletePeriodEndDate').text(endDate);

                    const url = "{{ route('admin.tourbooking.services.periods.destroy', ['service' => $service->id, 'period' => ':id']) }}";
                    $('#deletePeriodForm').attr('action', url.replace(':id', id));

                    $('#deletePeriodModal').modal('show');
                });

                // Initialize periods display
                renderPeriods();
            });
        })(jQuery);
    </script>
@endpush
