
<?php $__env->startSection('title'); ?>
    <title><?php echo e(__('translate.Service Availability')); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body-header'); ?>
    <h3 class="crancy-header__title m-0"><?php echo e(__('translate.Service Availability Management')); ?></h3>
    <p class="crancy-header__text">
        <?php echo e(__('translate.Manage Availability')); ?> >> <?php echo e($service->title); ?>

    </p>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('style_section'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('global/select2/select2.min.css')); ?>">
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
<?php $__env->stopPush(); ?>

<?php $__env->startSection('body-content'); ?>
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
                                                <?php echo e(__('translate.Service Availability')); ?></h4>
                                            <div>
                                                <a href="<?php echo e(route('admin.tourbooking.services.edit', $service)); ?>"
                                                    class="crancy-btn"><i class="fa fa-edit"></i>
                                                    <?php echo e(__('translate.Edit Service')); ?></a>
                                                <a href="<?php echo e(route('admin.tourbooking.services.index')); ?>"
                                                    class="crancy-btn"><i class="fa fa-list"></i>
                                                    <?php echo e(__('translate.Service List')); ?></a>
                                            </div>
                                        </div>

                                        <div class="row mg-top-30">
                                            <!-- Availability Section -->
                                            <div class="col-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5><?php echo e(__('translate.Availability')); ?></h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="alert alert-info">
                                                            <i class="fa fa-info-circle"></i>
                                                            <?php echo e(__('translate.Add multiple availability periods with maximum number of people for each period.')); ?>

                                                        </div>

                                                        <!-- Add New Period Form -->
                                                        <div class="date-range-select">
                                                            <h5 class="date-range-title">
                                                                <i class="fa fa-plus-circle"></i> <?php echo e(__('translate.Add New Period')); ?></h5>
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <div class="date-picker-container">
                                                                        <label><?php echo e(__('translate.Start Date')); ?></label>
                                                                        <input type="text" id="startDate"
                                                                            class="crancy__item-input datepicker-start"
                                                                            placeholder="<?php echo e(__('translate.Select start date')); ?>" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="date-picker-container">
                                                                        <label><?php echo e(__('translate.End Date')); ?></label>
                                                                        <input type="text" id="endDate"
                                                                            class="crancy__item-input datepicker-end"
                                                                            placeholder="<?php echo e(__('translate.Select end date')); ?>" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="date-picker-container">
                                                                        <label><?php echo e(__('translate.Max People')); ?></label>
                                                                        <input type="number" id="maxPeople"
                                                                            class="crancy__item-input"
                                                                            placeholder="<?php echo e(__('translate.Max people')); ?>"
                                                                            min="1" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="date-picker-container">
                                                                        <label><?php echo e(__('translate.Adult Price')); ?> <span class="text-danger">*</span></label>
                                                                        <input type="number" step="0.01" id="adultPrice"
                                                                            class="crancy__item-input"
                                                                            placeholder="<?php echo e(__('translate.Adult price')); ?>"
                                                                            min="0" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="date-picker-container">
                                                                        <label><?php echo e(__('translate.Child Price')); ?></label>
                                                                        <input type="number" step="0.01" id="childPrice"
                                                                            class="crancy__item-input"
                                                                            placeholder="<?php echo e(__('translate.Child price')); ?>"
                                                                            min="0">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <!-- Pricing & Discount Section -->
                                                            <div class="row mt-3 pricing-section" style="background: #f8f9fa; padding: 15px; border-radius: 5px; border-left: 4px solid #28a745;">
                                                                <div class="col-12 mb-3">
                                                                    <h6 class="mb-0"><i class="fa fa-tags text-success"></i> <?php echo e(__('translate.Pricing & Discounts')); ?></h6>
                                                                    <small class="text-danger"><strong>* <?php echo e(__('translate.Adult Price is required')); ?></strong></small>
                                                                </div>
                                                                
                                                                <!-- Adult Pricing -->
                                                                <div class="col-md-6">
                                                                    <div class="card border-success">
                                                                        <div class="card-header bg-success text-white py-2">
                                                                            <strong><i class="fa fa-user"></i> <?php echo e(__('translate.Adult Pricing')); ?> <span class="text-warning">*</span></strong>
                                                                        </div>
                                                                        <div class="card-body">
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <label><?php echo e(__('translate.Base Price')); ?></label>
                                                                                    <input type="number" step="0.01" id="adultPriceDetail"
                                                                                        class="crancy__item-input"
                                                                                        placeholder="<?php echo e(__('translate.Base price')); ?>"
                                                                                        min="0">
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <label><?php echo e(__('translate.Discount %')); ?></label>
                                                                                    <input type="number" step="0.01" id="adultDiscountPercentage"
                                                                                        class="crancy__item-input"
                                                                                        placeholder="0%"
                                                                                        min="0" max="100">
                                                                                </div>
                                                                            </div>
                                                                            <div class="row mt-2">
                                                                                <div class="col-md-6">
                                                                                    <label><?php echo e(__('translate.Final Price')); ?></label>
                                                                                    <input type="number" step="0.01" id="discountAdultPrice"
                                                                                        class="crancy__item-input bg-light"
                                                                                        placeholder="<?php echo e(__('translate.Auto calculated')); ?>"
                                                                                        min="0" readonly>
                                                                                </div>
                                                                                <div class="col-md-6 d-flex align-items-end">
                                                                                    <span id="adultDiscountPreview" class="badge bg-danger d-none"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                
                                                                <!-- Child Pricing -->
                                                                <div class="col-md-6">
                                                                    <div class="card border-info">
                                                                        <div class="card-header bg-info text-white py-2">
                                                                            <strong><i class="fa fa-child"></i> <?php echo e(__('translate.Child Pricing')); ?></strong>
                                                                        </div>
                                                                        <div class="card-body">
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <label><?php echo e(__('translate.Base Price')); ?></label>
                                                                                    <input type="number" step="0.01" id="childPriceDetail"
                                                                                        class="crancy__item-input"
                                                                                        placeholder="<?php echo e(__('translate.Base price')); ?>"
                                                                                        min="0">
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <label><?php echo e(__('translate.Discount %')); ?></label>
                                                                                    <input type="number" step="0.01" id="childDiscountPercentage"
                                                                                        class="crancy__item-input"
                                                                                        placeholder="0%"
                                                                                        min="0" max="100">
                                                                                </div>
                                                                            </div>
                                                                            <div class="row mt-2">
                                                                                <div class="col-md-6">
                                                                                    <label><?php echo e(__('translate.Final Price')); ?></label>
                                                                                    <input type="number" step="0.01" id="discountChildPrice"
                                                                                        class="crancy__item-input bg-light"
                                                                                        placeholder="<?php echo e(__('translate.Auto calculated')); ?>"
                                                                                        min="0" readonly>
                                                                                </div>
                                                                                <div class="col-md-6 d-flex align-items-end">
                                                                                    <span id="childDiscountPreview" class="badge bg-danger d-none"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="row mt-3">
                                                                <div class="col-md-12">
                                                                    <div class="availability-actions">
                                                                        <button type="button" id="addPeriodBtn"
                                                                            class="crancy-btn btn-success">
                                                                            <i class="fa fa-plus"></i> <?php echo e(__('translate.Add Period')); ?>

                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Periods List -->
                                                        <div id="periodsList" class="mt-4">
                                                            <h5 class="date-range-title">
                                                                <i class="fa fa-calendar"></i> <?php echo e(__('translate.Availability Periods')); ?>

                                                                <span id="periodsCount" class="badge bg-primary ms-2">0</span>
                                                            </h5>
                                                            <div id="periodsContainer">
                                                                <!-- Periods will be added here dynamically -->
                                                            </div>
                                                        </div>

                                                        <!-- Save All Periods Button -->
                                                        <div class="mt-4">
                                                            <form id="saveAllPeriodsForm" method="POST" action="<?php echo e(route('admin.tourbooking.services.availability.periods.store', $service)); ?>">
                                                                <?php echo csrf_field(); ?>
                                                                <div id="periodsInputContainer"></div>
                                                                <button type="submit" class="crancy-btn btn-success">
                                                                    <i class="fa fa-save"></i> <?php echo e(__('translate.Save All Periods')); ?>

                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Existing Availability Periods Table -->
                                            <div class="col-12 mg-top-30">
                                                <h5><?php echo e(__('translate.Saved Availability Periods')); ?></h5>
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th><?php echo e(__('translate.Start Date')); ?></th>
                                                                <th><?php echo e(__('translate.End Date')); ?></th>
                                                                <th><?php echo e(__('translate.Max People')); ?></th>
                                                                <th><?php echo e(__('translate.Adult Price')); ?></th>
                                                                <th><?php echo e(__('translate.Child Price')); ?></th>
                                                                <th><?php echo e(__('translate.Status')); ?></th>
                                                                <th><?php echo e(__('translate.Action')); ?></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php if(isset($service->availability_periods) && count($service->availability_periods) > 0): ?>
                                                                <?php $__currentLoopData = $service->availability_periods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $period): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <tr>
                                                                        <td><?php echo e(date('d M Y', strtotime($period->start_date))); ?></td>
                                                                        <td><?php echo e(date('d M Y', strtotime($period->end_date))); ?></td>
                                                                        <td><span class="badge bg-info"><?php echo e($period->max_people); ?></span></td>
                                                                        <td>
                                                                            <?php if($period->adult_price): ?>
                                                                                <div>
                                                                                    <?php echo $period->adult_price_display; ?>

                                                                                    <?php if($period->adult_discount_badge): ?>
                                                                                        <br><?php echo $period->adult_discount_badge; ?>

                                                                                    <?php endif; ?>
                                                                                </div>
                                                                            <?php else: ?>
                                                                                <span class="text-muted"><?php echo e(__('translate.Default')); ?></span>
                                                                            <?php endif; ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php if($period->child_price): ?>
                                                                                <div>
                                                                                    <?php echo $period->child_price_display; ?>

                                                                                    <?php if($period->child_discount_badge): ?>
                                                                                        <br><?php echo $period->child_discount_badge; ?>

                                                                                    <?php endif; ?>
                                                                                </div>
                                                                            <?php else: ?>
                                                                                <span class="text-muted"><?php echo e(__('translate.Default')); ?></span>
                                                                            <?php endif; ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php if($period->is_active): ?>
                                                                                <span class="badge bg-success"><?php echo e(__('translate.Active')); ?></span>
                                                                            <?php else: ?>
                                                                                <span class="badge bg-danger"><?php echo e(__('translate.Inactive')); ?></span>
                                                                            <?php endif; ?>
                                                                        </td>
                                                                        <td class="availability-flex">
                                                                            <button type="button" class="btn btn-sm btn-danger delete-period"
                                                                                data-id="<?php echo e($period->id); ?>"
                                                                                data-start-date="<?php echo e(date('d M Y', strtotime($period->start_date))); ?>"
                                                                                data-end-date="<?php echo e(date('d M Y', strtotime($period->end_date))); ?>">
                                                                                <i class="fa fa-trash"></i>
                                                                            </button>
                                                                        </td>
                                                                    </tr>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php else: ?>
                                                                <tr>
                                                                    <td colspan="7" class="text-center"><?php echo e(__('translate.No availability periods configured')); ?></td>
                                                                </tr>
                                                            <?php endif; ?>
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
                    <h5 class="modal-title"><?php echo e(__('translate.Edit Availability')); ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editAvailabilityForm" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label><?php echo e(__('translate.Date')); ?></label>
                            <input type="text" id="edit_date" class="crancy__item-input datepicker" required>
                        </div>
                        <div class="form-group mb-3">
                            <label><?php echo e(__('translate.Start Time')); ?></label>
                            <input type="time" id="edit_start_time" class="crancy__item-input">
                        </div>
                        <div class="form-group mb-3">
                            <label><?php echo e(__('translate.End Time')); ?></label>
                            <input type="time" id="edit_end_time" class="crancy__item-input">
                        </div>
                        <div class="form-group mb-3">
                            <label><?php echo e(__('translate.Available Spots')); ?></label>
                            <input type="number" id="edit_available_spots" class="crancy__item-input" min="1">
                        </div>
                        <div class="form-group mb-3">
                            <label><?php echo e(__('translate.Special Price')); ?></label>
                            <input type="number" step="0.01" id="edit_special_price" class="crancy__item-input">
                        </div>
                        <div class="form-group mb-3">
                            <label><?php echo e(__('translate.Status')); ?></label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="is_available" id="edit_is_available" value="1">
                                <label class="form-check-label" for="edit_is_available"><?php echo e(__('translate.Available')); ?></label>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label><?php echo e(__('translate.Notes')); ?></label>
                            <textarea id="edit_notes" class="crancy__item-input" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal"><?php echo e(__('translate.Cancel')); ?></button>
                        <button type="submit" class="btn btn-primary"><?php echo e(__('translate.Update')); ?></button>
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
                    <h5 class="modal-title"><?php echo e(__('translate.Delete Period')); ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><?php echo e(__('translate.Are you sure you want to delete this period?')); ?></p>
                    <p><strong><?php echo e(__('translate.Start Date')); ?>:</strong> <span id="deletePeriodStartDate"></span></p>
                    <p><strong><?php echo e(__('translate.End Date')); ?>:</strong> <span id="deletePeriodEndDate"></span></p>
                </div>
                <div class="modal-footer">
                    <form id="deletePeriodForm" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal"><?php echo e(__('translate.Cancel')); ?></button>
                        <button type="submit" class="btn btn-danger"><?php echo e(__('translate.Delete')); ?></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js_section'); ?>
    <script src="<?php echo e(asset('global/select2/select2.min.js')); ?>"></script>
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

                // Calculate discount prices
                function calculateDiscountPrice(basePrice, discountPercentage) {
                    if (!basePrice || !discountPercentage) return basePrice;
                    return (basePrice - (basePrice * (discountPercentage / 100))).toFixed(2);
                }

                // Update adult discount preview
                function updateAdultDiscountPreview() {
                    const basePrice = parseFloat($('#adultPriceDetail').val()) || 0;
                    const discountPercentage = parseFloat($('#adultDiscountPercentage').val()) || 0;
                    
                    if (basePrice > 0) {
                        const finalPrice = calculateDiscountPrice(basePrice, discountPercentage);
                        $('#discountAdultPrice').val(finalPrice);
                        
                        if (discountPercentage > 0) {
                            $('#adultDiscountPreview').text('-' + discountPercentage + '% OFF').removeClass('d-none');
                        } else {
                            $('#adultDiscountPreview').addClass('d-none');
                        }
                    } else {
                        $('#discountAdultPrice').val('');
                        $('#adultDiscountPreview').addClass('d-none');
                    }
                }

                // Update child discount preview
                function updateChildDiscountPreview() {
                    const basePrice = parseFloat($('#childPriceDetail').val()) || 0;
                    const discountPercentage = parseFloat($('#childDiscountPercentage').val()) || 0;
                    
                    if (basePrice > 0) {
                        const finalPrice = calculateDiscountPrice(basePrice, discountPercentage);
                        $('#discountChildPrice').val(finalPrice);
                        
                        if (discountPercentage > 0) {
                            $('#childDiscountPreview').text('-' + discountPercentage + '% OFF').removeClass('d-none');
                        } else {
                            $('#childDiscountPreview').addClass('d-none');
                        }
                    } else {
                        $('#discountChildPrice').val('');
                        $('#childDiscountPreview').addClass('d-none');
                    }
                }

                // Sync quick price fields with detailed fields
                $('#adultPrice').on('input', function() {
                    $('#adultPriceDetail').val($(this).val());
                    updateAdultDiscountPreview();
                });
                
                $('#childPrice').on('input', function() {
                    $('#childPriceDetail').val($(this).val());
                    updateChildDiscountPreview();
                });

                // Listen for changes on pricing fields
                $('#adultPriceDetail, #adultDiscountPercentage').on('input', function() {
                    $('#adultPrice').val($('#adultPriceDetail').val());
                    updateAdultDiscountPreview();
                });
                
                $('#childPriceDetail, #childDiscountPercentage').on('input', function() {
                    $('#childPrice').val($('#childPriceDetail').val());
                    updateChildDiscountPreview();
                });

                // Add Period Button Click
                $('#addPeriodBtn').click(function() {
                    const startDate = $('#startDate').val();
                    const endDate = $('#endDate').val();
                    const maxPeople = $('#maxPeople').val();
                    const adultPrice = $('#adultPrice').val();
                    const childPrice = $('#childPrice').val();
                    const adultDiscountPercentage = $('#adultDiscountPercentage').val();
                    const childDiscountPercentage = $('#childDiscountPercentage').val();
                    const discountAdultPrice = $('#discountAdultPrice').val();
                    const discountChildPrice = $('#discountChildPrice').val();

                    // Validation
                    if (!startDate || !endDate) {
                        alert('<?php echo e(__("translate.Please select both start and end dates.")); ?>');
                        return;
                    }

                    if (maxPeople === '' || maxPeople < 1) {
                        alert('<?php echo e(__("translate.Please enter a valid number of people.")); ?>');
                        return;
                    }
                    
                    if (!adultPrice || adultPrice <= 0) {
                        alert('<?php echo e(__("translate.Please enter a valid adult price.")); ?>');
                        return;
                    }

                    // Add period to array
                    const period = {
                        id: Date.now(), // Unique ID for the period
                        start_date: startDate,
                        end_date: endDate,
                        max_people: parseInt(maxPeople),
                        adult_price: adultPrice ? parseFloat(adultPrice) : null,
                        child_price: childPrice ? parseFloat(childPrice) : null,
                        adult_discount_percentage: adultDiscountPercentage ? parseFloat(adultDiscountPercentage) : null,
                        child_discount_percentage: childDiscountPercentage ? parseFloat(childDiscountPercentage) : null,
                        discount_adult_price: discountAdultPrice ? parseFloat(discountAdultPrice) : null,
                        discount_child_price: discountChildPrice ? parseFloat(discountChildPrice) : null,
                    };

                    periods.push(period);

                    // Update UI
                    renderPeriods();

                    // Clear form
                    $('#startDate').val('');
                    $('#endDate').val('');
                    $('#maxPeople').val('');
                    $('#adultPrice').val('');
                    $('#childPrice').val('');
                    $('#adultPriceDetail').val('');
                    $('#childPriceDetail').val('');
                    $('#adultDiscountPercentage').val('');
                    $('#childDiscountPercentage').val('');
                    $('#discountAdultPrice').val('');
                    $('#discountChildPrice').val('');
                    $('#adultDiscountPreview').addClass('d-none');
                    $('#childDiscountPreview').addClass('d-none');
                });

                // Render Periods
                function renderPeriods() {
                    const periodsContainer = $('#periodsContainer');
                    periodsContainer.empty();
 
                    if (periods.length === 0) {
                        periodsContainer.html('<div class="alert alert-warning"><?php echo e(__("translate.No periods added yet.")); ?></div>');
                        $('#periodsCount').text('0');
                        return;
                    }
 
                    $('#periodsCount').text(periods.length);
 
                    periods.forEach(function(period, index) {
                        const startDate = new Date(period.start_date);
                        const endDate = new Date(period.end_date);
                        const formattedStartDate = startDate.toLocaleDateString('fr-FR', { day: 'numeric', month: 'long', year: 'numeric' });
                        const formattedEndDate = endDate.toLocaleDateString('fr-FR', { day: 'numeric', month: 'long', year: 'numeric' });
                        
                        // Build pricing info HTML
                        let pricingHtml = '';
                        if (period.adult_price || period.child_price) {
                            pricingHtml = '<div class="mt-2">';
                            if (period.adult_price) {
                                const adultDiscountBadge = period.adult_discount_percentage > 0 
                                    ? `<span class="badge bg-danger ms-1">-${period.adult_discount_percentage}%</span>` 
                                    : '';
                                const adultPriceDisplay = period.discount_adult_price && period.discount_adult_price < period.adult_price
                                    ? `<del>${period.adult_price}</del> <strong class="text-success">${period.discount_adult_price}</strong>`
                                    : `<strong>${period.adult_price}</strong>`;
                                pricingHtml += `<span class="badge bg-success me-2"><i class="fa fa-user"></i> Adult: ${adultPriceDisplay} ${adultDiscountBadge}</span>`;
                            }
                            if (period.child_price) {
                                const childDiscountBadge = period.child_discount_percentage > 0 
                                    ? `<span class="badge bg-danger ms-1">-${period.child_discount_percentage}%</span>` 
                                    : '';
                                const childPriceDisplay = period.discount_child_price && period.discount_child_price < period.child_price
                                    ? `<del>${period.child_price}</del> <strong class="text-success">${period.discount_child_price}</strong>`
                                    : `<strong>${period.child_price}</strong>`;
                                pricingHtml += `<span class="badge bg-info me-2"><i class="fa fa-child"></i> Child: ${childPriceDisplay} ${childDiscountBadge}</span>`;
                            }
                            pricingHtml += '</div>';
                        }
 
                        const periodHtml = `
                            <div class="period-card" data-id="${period.id}">
                                <div class="period-header">
                                    <div>
                                        <strong><?php echo e(__("translate.Period")); ?> ${index + 1}:</strong>
                                        <span class="badge bg-primary">${formattedStartDate} - ${formattedEndDate}</span>
                                        <span class="badge bg-secondary"><?php echo e(__("translate.Max People")); ?>: ${period.max_people}</span>
                                        ${pricingHtml}
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
                        if (period.adult_price) {
                            container.append(`<input type="hidden" name="periods[${index}][adult_price]" value="${period.adult_price}">`);
                        }
                        if (period.child_price) {
                            container.append(`<input type="hidden" name="periods[${index}][child_price]" value="${period.child_price}">`);
                        }
                        if (period.adult_discount_percentage) {
                            container.append(`<input type="hidden" name="periods[${index}][adult_discount_percentage]" value="${period.adult_discount_percentage}">`);
                        }
                        if (period.child_discount_percentage) {
                            container.append(`<input type="hidden" name="periods[${index}][child_discount_percentage]" value="${period.child_discount_percentage}">`);
                        }
                        if (period.discount_adult_price) {
                            container.append(`<input type="hidden" name="periods[${index}][discount_adult_price]" value="${period.discount_adult_price}">`);
                        }
                        if (period.discount_child_price) {
                            container.append(`<input type="hidden" name="periods[${index}][discount_child_price]" value="${period.discount_child_price}">`);
                        }
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

                    const url = "<?php echo e(route('admin.tourbooking.services.periods.destroy', ['service' => $service->id, 'period' => ':id'])); ?>";
                    $('#deletePeriodForm').attr('action', url.replace(':id', id));

                    $('#deletePeriodModal').modal('show');
                });

                // Initialize periods display
                renderPeriods();
            });
        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.master_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\archive\archive\Modules/TourBooking\resources/views/admin/services/availability.blade.php ENDPATH**/ ?>