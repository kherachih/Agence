<?php $__env->startSection('title'); ?>
    <title><?php echo e(__('translate.Extra Charges')); ?> - <?php echo e($service->translation->title ?? $service->title); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body-header'); ?>
    <h3 class="crancy-header__title m-0"><?php echo e(__('translate.Extra Charges')); ?></h3>
    <p class="crancy-header__text"><?php echo e(__('translate.Tour Booking')); ?> >> <?php echo e(__('translate.Services')); ?> >>
        <?php echo e(__('translate.Extra Charges')); ?></p>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('style_section'); ?>
    <style>
        /* Currency Input Field Styling */
        .crancy__item-form--currency {
            position: relative;
            display: flex;
            align-items: center;
        }

        .crancy__item-form--currency .crancy__item-input {
            width: 100%;
            padding-right: 40px;
            /* Add space for the currency icon */
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 10px 40px 10px 12px;
            font-size: 14px;
            outline: none;
            transition: border-color 0.3s ease;
        }

        .crancy__item-form--currency .crancy__item-input:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        .crancy__currency-icon {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            pointer-events: none;
            /* Prevents icon from interfering with input clicks */
            z-index: 2;
        }

        .crancy__currency-icon span {
            font-size: 14px;
            color: #666;
            font-weight: 500;
        }

        /* Optional: Style for better visual hierarchy */
        .crancy__item-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #333;
        }

        .mg-top-form-20 {
            margin-top: 20px;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .crancy__item-form--currency .crancy__item-input {
                padding-right: 35px;
            }

            .crancy__currency-icon {
                right: 10px;
            }

            .crancy__currency-icon span {
                font-size: 13px;
            }
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
                                            <h4 class="crancy-product-card__title"><?php echo e(__('translate.Extra Charges for')); ?>:
                                                <?php echo e($service->translation->title ?? $service->title); ?></h4>
                                            <div>
                                                <a href="<?php echo e(route('admin.tourbooking.services.edit', $service->id)); ?>"
                                                    class="crancy-btn"><i class="fa fa-edit"></i>
                                                    <?php echo e(__('translate.Edit Service')); ?></a>
                                                <a href="<?php echo e(route('admin.tourbooking.services.index')); ?>"
                                                    class="crancy-btn"><i class="fa fa-list"></i>
                                                    <?php echo e(__('translate.Service List')); ?></a>
                                            </div>
                                        </div>

                                        <div class="row mg-top-30">
                                            <div class="col-12">
                                                <div class="accordion" id="extraChargesAccordion">
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="headingOne">
                                                            <button class="accordion-button" type="button"
                                                                data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                <?php echo e(__('translate.Add New Extra Charge')); ?>

                                                            </button>
                                                        </h2>
                                                        <div id="collapseOne" class="accordion-collapse collapse show"
                                                            aria-labelledby="headingOne"
                                                            data-bs-parent="#extraChargesAccordion">
                                                            <div class="accordion-body">
                                                                <form
                                                                    action="<?php echo e(route('admin.tourbooking.services.extra-charges.store', $service->id)); ?>"
                                                                    method="POST">
                                                                    <?php echo csrf_field(); ?>
                                                                    <div class="row">
                                                                        <div class="col-lg-6 col-md-6 col-12">
                                                                            <div
                                                                                class="crancy__item-form--group mg-top-form-20">
                                                                                <label
                                                                                    class="crancy__item-label"><?php echo e(__('translate.Name')); ?>

                                                                                    *</label>
                                                                                <input class="crancy__item-input"
                                                                                    type="text" name="name"
                                                                                    value="<?php echo e(old('name')); ?>" required>
                                                                                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                                    <span
                                                                                        class="text-danger"><?php echo e($message); ?></span>
                                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-3 col-md-3 col-12">
                                                                            <div
                                                                                class="crancy__item-form--group mg-top-form-20">
                                                                                <label
                                                                                    class="crancy__item-label"><?php echo e(__('translate.Price')); ?>

                                                                                    *</label>
                                                                                <div class="crancy__item-form--currency">
                                                                                    <input class="crancy__item-input"
                                                                                        type="number" step="0.01"
                                                                                        name="price"
                                                                                        value="<?php echo e(old('price')); ?>"
                                                                                        required>
                                                                                    <div class="crancy__currency-icon">
                                                                                        <span><?php echo e(config('settings.currency_icon', '$')); ?></span>
                                                                                    </div>
                                                                                </div>
                                                                                <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                                    <span
                                                                                        class="text-danger"><?php echo e($message); ?></span>
                                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-3 col-md-3 col-12">
                                                                            <div
                                                                                class="crancy__item-form--group mg-top-form-20">
                                                                                <label
                                                                                    class="crancy__item-label"><?php echo e(__('translate.Price Type')); ?>

                                                                                    *</label>
                                                                                <select class="crancy__item-input"
                                                                                    name="price_type" required>
                                                                                    <option value="flat"
                                                                                        <?php echo e(old('price_type') == 'flat' ? 'selected' : ''); ?>>
                                                                                        <?php echo e(__('translate.Flat Fee')); ?>

                                                                                    </option>
                                                                                    <option value="per_booking"
                                                                                        <?php echo e(old('price_type') == 'per_booking' ? 'selected' : ''); ?>>
                                                                                        <?php echo e(__('translate.Per Booking')); ?>

                                                                                    </option>
                                                                                    <option value="per_person"
                                                                                        <?php echo e(old('price_type') == 'per_person' ? 'selected' : ''); ?>>
                                                                                        <?php echo e(__('translate.Per Person')); ?>

                                                                                    </option>
                                                                                    <option value="per_adult"
                                                                                        <?php echo e(old('price_type') == 'per_adult' ? 'selected' : ''); ?>>
                                                                                        <?php echo e(__('translate.Per Adult')); ?>

                                                                                    </option>
                                                                                    <option value="per_child"
                                                                                        <?php echo e(old('price_type') == 'per_child' ? 'selected' : ''); ?>>
                                                                                        <?php echo e(__('translate.Per Child')); ?>

                                                                                    </option>
                                                                                    <option value="per_infant"
                                                                                        <?php echo e(old('price_type') == 'per_infant' ? 'selected' : ''); ?>>
                                                                                        <?php echo e(__('translate.Per Infant')); ?>

                                                                                    </option>
                                                                                    <option value="per_night"
                                                                                        <?php echo e(old('price_type') == 'per_night' ? 'selected' : ''); ?>>
                                                                                        <?php echo e(__('translate.Per Night')); ?>

                                                                                    </option>
                                                                                </select>
                                                                                <?php $__errorArgs = ['price_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                                    <span
                                                                                        class="text-danger"><?php echo e($message); ?></span>
                                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-12 col-md-12 col-12">
                                                                            <div
                                                                                class="crancy__item-form--group mg-top-form-20">
                                                                                <label
                                                                                    class="crancy__item-label"><?php echo e(__('translate.Description')); ?></label>
                                                                                <textarea class="crancy__item-input summernote" name="description" rows="3"><?php echo e(old('description')); ?></textarea>
                                                                                <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                                    <span
                                                                                        class="text-danger"><?php echo e($message); ?></span>
                                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-4 col-md-4 col-12">
                                                                            <div
                                                                                class="crancy__item-form--group mg-top-form-20">
                                                                                <label
                                                                                    class="crancy__item-label"><?php echo e(__('translate.Is Mandatory')); ?></label>
                                                                                <div
                                                                                    class="crancy-ptabs__notify-switch crancy-ptabs__notify-switch--two">
                                                                                    <label class="crancy__item-switch">
                                                                                        <input name="is_mandatory"
                                                                                            type="hidden" value="0">
                                                                                        <input name="is_mandatory"
                                                                                            type="checkbox"
                                                                                            <?php echo e(old('is_mandatory') ? 'checked' : ''); ?>>
                                                                                        <span
                                                                                            class="crancy__item-switch--slide crancy__item-switch--round"></span>
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-4 col-md-4 col-12">
                                                                            <div
                                                                                class="crancy__item-form--group mg-top-form-20">
                                                                                <label
                                                                                    class="crancy__item-label"><?php echo e(__('translate.Is Tax')); ?></label>
                                                                                <div
                                                                                    class="crancy-ptabs__notify-switch crancy-ptabs__notify-switch--two">
                                                                                    <label class="crancy__item-switch">
                                                                                        <input name="is_tax" type="hidden"
                                                                                            value="0">
                                                                                        <input name="is_tax"
                                                                                            type="checkbox"
                                                                                            <?php echo e(old('is_tax') ? 'checked' : ''); ?>>
                                                                                        <span
                                                                                            class="crancy__item-switch--slide crancy__item-switch--round"></span>
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-4 col-md-4 col-12">
                                                                            <div
                                                                                class="crancy__item-form--group mg-top-form-20">
                                                                                <label
                                                                                    class="crancy__item-label"><?php echo e(__('translate.Status')); ?></label>
                                                                                <div
                                                                                    class="crancy-ptabs__notify-switch crancy-ptabs__notify-switch--two">
                                                                                    <label class="crancy__item-switch">
                                                                                        <input name="status"
                                                                                            type="hidden" value="0">
                                                                                        <input name="status"
                                                                                            type="checkbox"
                                                                                            <?php echo e(old('status') ? 'checked' : ''); ?>

                                                                                            value="1">
                                                                                        <span
                                                                                            class="crancy__item-switch--slide crancy__item-switch--round"></span>
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-6 col-md-6 col-12"
                                                                            id="tax_percentage_field"
                                                                            style="display: none;">
                                                                            <div
                                                                                class="crancy__item-form--group mg-top-form-20">
                                                                                <label
                                                                                    class="crancy__item-label"><?php echo e(__('translate.Tax Percentage')); ?></label>
                                                                                <div class="crancy__item-form--currency">
                                                                                    <input class="crancy__item-input"
                                                                                        type="number" step="0.01"
                                                                                        min="0" max="100"
                                                                                        name="tax_percentage"
                                                                                        value="<?php echo e(old('tax_percentage')); ?>">
                                                                                    <div class="crancy__currency-icon">
                                                                                        <span>%</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-6 col-md-6 col-12">
                                                                            <div
                                                                                class="crancy__item-form--group mg-top-form-20">
                                                                                <label
                                                                                    class="crancy__item-label"><?php echo e(__('translate.Max Quantity')); ?></label>
                                                                                <input class="crancy__item-input"
                                                                                    type="number" name="max_quantity"
                                                                                    value="<?php echo e(old('max_quantity')); ?>"
                                                                                    min="1">
                                                                                <?php $__errorArgs = ['max_quantity'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                                    <span
                                                                                        class="text-danger"><?php echo e($message); ?></span>
                                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-12 mg-top-30">
                                                                            <button type="submit"
                                                                                class="crancy-btn"><?php echo e(__('translate.Add Extra Charge')); ?></button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="crancy-product-table mg-top-25">
                                            <table id="crancy-table__vendor">
                                                <thead>
                                                    <tr>
                                                        <th><?php echo e(__('translate.Name')); ?></th>
                                                        <th><?php echo e(__('translate.Price')); ?></th>
                                                        <th><?php echo e(__('translate.Price Type')); ?></th>
                                                        <th><?php echo e(__('translate.Mandatory')); ?></th>
                                                        <th><?php echo e(__('translate.Tax')); ?></th>
                                                        <th><?php echo e(__('translate.Status')); ?></th>
                                                        <th><?php echo e(__('translate.Action')); ?></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $__empty_1 = true; $__currentLoopData = $service->extraCharges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $charge): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                        <tr>
                                                            <td>
                                                                <strong><?php echo e($charge->name); ?></strong>
                                                                <?php if($charge->description): ?>
                                                                    <div class="small text-muted">
                                                                        <?php echo e(Str::limit($charge->description, 50)); ?></div>
                                                                <?php endif; ?>
                                                            </td>
                                                            <td><?php echo e(config('settings.currency_icon', '$')); ?>

                                                                <?php echo e($charge->price); ?></td>
                                                            <td><?php echo e($charge->price_type_text); ?></td>
                                                            <td>
                                                                <?php if($charge->is_mandatory): ?>
                                                                    <span
                                                                        class="crancy-badge crancy-badge-success"><?php echo e(__('translate.Yes')); ?></span>
                                                                <?php else: ?>
                                                                    <span
                                                                        class="crancy-badge crancy-badge-secondary"><?php echo e(__('translate.No')); ?></span>
                                                                <?php endif; ?>
                                                            </td>
                                                            <td>
                                                                <?php if($charge->is_tax): ?>
                                                                    <span
                                                                        class="crancy-badge crancy-badge-info"><?php echo e(__('translate.Yes')); ?>

                                                                        (<?php echo e($charge->tax_percentage); ?>%)
                                                                    </span>
                                                                <?php else: ?>
                                                                    <span
                                                                        class="crancy-badge crancy-badge-secondary"><?php echo e(__('translate.No')); ?></span>
                                                                <?php endif; ?>
                                                            </td>
                                                            <td>
                                                                <?php if($charge->status): ?>
                                                                    <span
                                                                        class="crancy-badge crancy-badge-success"><?php echo e(__('translate.Active')); ?></span>
                                                                <?php else: ?>
                                                                    <span
                                                                        class="crancy-badge crancy-badge-danger"><?php echo e(__('translate.Inactive')); ?></span>
                                                                <?php endif; ?>
                                                            </td>
                                                            <td class="crancy-table__action">
                                                                <div class="crancy-table__action-btn">
                                                                    <a href="#"
                                                                        class="crancy-action__btn crancy-action__edit"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#editModal<?php echo e($charge->id); ?>"><i
                                                                            class="fa fa-edit"></i></a>
                                                                    <a href="#"
                                                                        class="crancy-action__btn crancy-action__delete"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#deleteModal<?php echo e($charge->id); ?>"><i
                                                                            class="fa fa-trash"></i></a>
                                                                </div>
                                                            </td>

                                                            <!-- Edit Modal -->
                                                            <div class="modal fade" id="editModal<?php echo e($charge->id); ?>"
                                                                tabindex="-1"
                                                                aria-labelledby="editModalLabel<?php echo e($charge->id); ?>"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog modal-lg">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="editModalLabel<?php echo e($charge->id); ?>">
                                                                                <?php echo e(__('translate.Edit Extra Charge')); ?>

                                                                            </h5>
                                                                            <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                        </div>
                                                                        <form
                                                                            action="<?php echo e(route('admin.tourbooking.services.extra-charges.update', $charge->id)); ?>"
                                                                            method="POST">
                                                                            <?php echo csrf_field(); ?>
                                                                            <?php echo method_field('PUT'); ?>
                                                                            <div class="modal-body">
                                                                                <div class="row">
                                                                                    <div class="col-lg-6 col-md-6 col-12">
                                                                                        <div
                                                                                            class="crancy__item-form--group">
                                                                                            <label
                                                                                                class="crancy__item-label"><?php echo e(__('translate.Name')); ?>

                                                                                                *</label>
                                                                                            <input
                                                                                                class="crancy__item-input"
                                                                                                type="text"
                                                                                                name="name"
                                                                                                value="<?php echo e($charge->name); ?>"
                                                                                                required>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-lg-3 col-md-3 col-12">
                                                                                        <div
                                                                                            class="crancy__item-form--group">
                                                                                            <label
                                                                                                class="crancy__item-label"><?php echo e(__('translate.Price')); ?>

                                                                                                *</label>
                                                                                            <div
                                                                                                class="crancy__item-form--currency">
                                                                                                <input
                                                                                                    class="crancy__item-input"
                                                                                                    type="number"
                                                                                                    step="0.01"
                                                                                                    name="price"
                                                                                                    value="<?php echo e($charge->price); ?>"
                                                                                                    required>
                                                                                                <div
                                                                                                    class="crancy__currency-icon">
                                                                                                    <span><?php echo e(config('settings.currency_icon', '$')); ?></span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-lg-3 col-md-3 col-12">
                                                                                        <div
                                                                                            class="crancy__item-form--group">
                                                                                            <label
                                                                                                class="crancy__item-label"><?php echo e(__('translate.Price Type')); ?>

                                                                                                *</label>
                                                                                            <select
                                                                                                class="crancy__item-input"
                                                                                                name="price_type" required>
                                                                                                <option value="flat"
                                                                                                    <?php echo e($charge->price_type == 'flat' ? 'selected' : ''); ?>>
                                                                                                    <?php echo e(__('translate.Flat Fee')); ?>

                                                                                                </option>
                                                                                                <option value="per_booking"
                                                                                                    <?php echo e($charge->price_type == 'per_booking' ? 'selected' : ''); ?>>
                                                                                                    <?php echo e(__('translate.Per Booking')); ?>

                                                                                                </option>
                                                                                                <option value="per_person"
                                                                                                    <?php echo e($charge->price_type == 'per_person' ? 'selected' : ''); ?>>
                                                                                                    <?php echo e(__('translate.Per Person')); ?>

                                                                                                </option>
                                                                                                <option value="per_adult"
                                                                                                    <?php echo e($charge->price_type == 'per_adult' ? 'selected' : ''); ?>>
                                                                                                    <?php echo e(__('translate.Per Adult')); ?>

                                                                                                </option>
                                                                                                <option value="per_child"
                                                                                                    <?php echo e($charge->price_type == 'per_child' ? 'selected' : ''); ?>>
                                                                                                    <?php echo e(__('translate.Per Child')); ?>

                                                                                                </option>
                                                                                                <option value="per_infant"
                                                                                                    <?php echo e($charge->price_type == 'per_infant' ? 'selected' : ''); ?>>
                                                                                                    <?php echo e(__('translate.Per Infant')); ?>

                                                                                                </option>
                                                                                                <option value="per_night"
                                                                                                    <?php echo e($charge->price_type == 'per_night' ? 'selected' : ''); ?>>
                                                                                                    <?php echo e(__('translate.Per Night')); ?>

                                                                                                </option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div
                                                                                            class="crancy__item-form--group mg-top-form-20">
                                                                                            <label
                                                                                                class="crancy__item-label"><?php echo e(__('translate.Description')); ?></label>
                                                                                            <textarea class="crancy__item-input summernote" name="description" rows="3"><?php echo e($charge->description); ?></textarea>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-lg-4 col-md-4 col-12">
                                                                                        <div
                                                                                            class="crancy__item-form--group mg-top-form-20">
                                                                                            <label
                                                                                                class="crancy__item-label"><?php echo e(__('translate.Is Mandatory')); ?></label>
                                                                                            <div
                                                                                                class="crancy-ptabs__notify-switch crancy-ptabs__notify-switch--two">
                                                                                                <label
                                                                                                    class="crancy__item-switch">
                                                                                                    <input
                                                                                                        name="is_mandatory"
                                                                                                        type="hidden"
                                                                                                        value="0">
                                                                                                    <input
                                                                                                        name="is_mandatory"
                                                                                                        type="checkbox"
                                                                                                        <?php echo e($charge->is_mandatory ? 'checked' : ''); ?>

                                                                                                        value="1">
                                                                                                    <span
                                                                                                        class="crancy__item-switch--slide crancy__item-switch--round"></span>
                                                                                                </label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-lg-4 col-md-4 col-12">
                                                                                        <div
                                                                                            class="crancy__item-form--group mg-top-form-20">
                                                                                            <label
                                                                                                class="crancy__item-label"><?php echo e(__('translate.Is Tax')); ?></label>
                                                                                            <div
                                                                                                class="crancy-ptabs__notify-switch crancy-ptabs__notify-switch--two">
                                                                                                <label
                                                                                                    class="crancy__item-switch">
                                                                                                    <input name="is_tax"
                                                                                                        type="hidden"
                                                                                                        value="0">
                                                                                                    <input name="is_tax"
                                                                                                        type="checkbox"
                                                                                                        class="tax-toggle"
                                                                                                        <?php echo e($charge->is_tax ? 'checked' : ''); ?>

                                                                                                        value="1">
                                                                                                    <span
                                                                                                        class="crancy__item-switch--slide crancy__item-switch--round"></span>
                                                                                                </label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-lg-4 col-md-4 col-12">
                                                                                        <div
                                                                                            class="crancy__item-form--group mg-top-form-20">
                                                                                            <label
                                                                                                class="crancy__item-label"><?php echo e(__('translate.Status')); ?></label>
                                                                                            <div
                                                                                                class="crancy-ptabs__notify-switch crancy-ptabs__notify-switch--two">
                                                                                                <label
                                                                                                    class="crancy__item-switch">
                                                                                                    <input name="status"
                                                                                                        type="hidden"
                                                                                                        value="0">
                                                                                                    <input name="status"
                                                                                                        type="checkbox"
                                                                                                        <?php echo e($charge->status ? 'checked' : ''); ?>

                                                                                                        value="1">
                                                                                                    <span
                                                                                                        class="crancy__item-switch--slide crancy__item-switch--round"></span>
                                                                                                </label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-lg-6 col-md-6 col-12 tax-percentage-field"
                                                                                        style="<?php echo e($charge->is_tax ? '' : 'display: none;'); ?>">
                                                                                        <div
                                                                                            class="crancy__item-form--group mg-top-form-20">
                                                                                            <label
                                                                                                class="crancy__item-label"><?php echo e(__('translate.Tax Percentage')); ?></label>
                                                                                            <div
                                                                                                class="crancy__item-form--currency">
                                                                                                <input
                                                                                                    class="crancy__item-input"
                                                                                                    type="number"
                                                                                                    step="0.01"
                                                                                                    min="0"
                                                                                                    max="100"
                                                                                                    name="tax_percentage"
                                                                                                    value="<?php echo e($charge->tax_percentage); ?>">
                                                                                                <div
                                                                                                    class="crancy__currency-icon">
                                                                                                    <span>%</span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-lg-6 col-md-6 col-12">
                                                                                        <div
                                                                                            class="crancy__item-form--group mg-top-form-20">
                                                                                            <label
                                                                                                class="crancy__item-label"><?php echo e(__('translate.Max Quantity')); ?></label>
                                                                                            <input
                                                                                                class="crancy__item-input"
                                                                                                type="number"
                                                                                                name="max_quantity"
                                                                                                value="<?php echo e($charge->max_quantity); ?>"
                                                                                                min="1">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button"
                                                                                    class="crancy-btn crancy-btn__default"
                                                                                    data-bs-dismiss="modal"><?php echo e(__('translate.Cancel')); ?></button>
                                                                                <button type="submit"
                                                                                    class="crancy-btn"><?php echo e(__('translate.Update')); ?></button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Delete Modal -->
                                                            <div class="modal fade" id="deleteModal<?php echo e($charge->id); ?>"
                                                                tabindex="-1"
                                                                aria-labelledby="deleteModalLabel<?php echo e($charge->id); ?>"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="deleteModalLabel<?php echo e($charge->id); ?>">
                                                                                <?php echo e(__('translate.Confirm Delete')); ?></h5>
                                                                            <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <?php echo e(__('translate.Are you sure you want to delete this extra charge?')); ?>

                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="crancy-btn crancy-btn__default"
                                                                                data-bs-dismiss="modal"><?php echo e(__('translate.Cancel')); ?></button>
                                                                            <form
                                                                                action="<?php echo e(route('admin.tourbooking.services.extra-charges.destroy', $charge->id)); ?>"
                                                                                method="POST">
                                                                                <?php echo csrf_field(); ?>
                                                                                <?php echo method_field('DELETE'); ?>
                                                                                <button type="submit"
                                                                                    class="crancy-btn crancy-btn__danger"><?php echo e(__('translate.Delete')); ?></button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                        <tr>
                                                            <td colspan="7" class="text-center">
                                                                <?php echo e(__('translate.No extra charges found')); ?></td>
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
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js_section'); ?>
    <script src="<?php echo e(asset('global/tinymce/js/tinymce/tinymce.min.js')); ?>"></script>
    <script>
        (function($) {
            "use strict"
            $(document).ready(function() {

                tinymce.init({
                    selector: '.summernote',
                    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
                    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
                    tinycomments_mode: 'embedded',
                    tinycomments_author: 'Author name',
                    mergetags_list: [{
                            value: 'First.Name',
                            title: 'First Name'
                        },
                        {
                            value: 'Email',
                            title: 'Email'
                        },
                    ]
                });

                // Show/hide tax percentage field
                $('input[name="is_tax"]').on('change', function() {
                    if ($(this).is(':checked')) {
                        $('#tax_percentage_field').show();
                    } else {
                        $('#tax_percentage_field').hide();
                    }
                });

                // For edit modals
                $('.tax-toggle').each(function() {
                    var $this = $(this);
                    $this.on('change', function() {
                        if ($this.is(':checked')) {
                            $this.closest('.modal-body').find('.tax-percentage-field').show();
                        } else {
                            $this.closest('.modal-body').find('.tax-percentage-field').hide();
                        }
                    });
                });

                // Check initial state
                if ($('input[name="is_tax"]').is(':checked')) {
                    $('#tax_percentage_field').show();
                }

                $('#crancy-table__vendor').DataTable({
                    responsive: true,
                    paging: false,
                    info: false,
                    searching: true,
                    ordering: true,
                });


            });
        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.master_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\archive\archive\Modules/TourBooking\resources/views/admin/services/extra_charges.blade.php ENDPATH**/ ?>