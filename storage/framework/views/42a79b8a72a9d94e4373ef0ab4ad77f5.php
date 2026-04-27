<?php $__env->startSection('title'); ?>
    <title><?php echo e(__('translate.Edit Service')); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body-header'); ?>
    <h3 class="crancy-header__title m-0"><?php echo e(__('translate.Edit Service')); ?></h3>
    <p class="crancy-header__text"><?php echo e(__('translate.Tour Booking')); ?> >> <?php echo e(__('translate.Edit Service')); ?></p>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('style_section'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('global/select2/select2.min.css')); ?>">
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
            /* Add space for currency icon */
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
    <!-- crancy Dashboard -->
    <section class="crancy-adashboard crancy-show">
        <div class="container container__bscreen">
            <div class="row">
                <div class="col-12">
                    <div class="crancy-body">
                        <!-- Dashboard Inner -->
                        <div class="crancy-dsinner">
                            <div class="row">
                                <div class="col-12 mg-top-30">
                                    <!-- Product Card -->
                                    <div class="crancy-product-card translation_main_box">

                                        <div class="crancy-customer-filter">
                                            <div
                                                class="crancy-customer-filter__single crancy-customer-filter__single--csearch">
                                                <div class="crancy-header__form crancy-header__form--customer">
                                                    <h4 class="crancy-product-card__title">
                                                        <?php echo e(__('translate.Switch to language translation')); ?></h4>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="translation_box">
                                            <ul>
                                                <?php $__currentLoopData = $language_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li><a
                                                            href="<?php echo e(route('admin.tourbooking.services.edit', ['service' => $service->id, 'lang_code' => $language->lang_code])); ?>">
                                                            <?php if(request()->get('lang_code') == $language->lang_code): ?>
                                                                <i class="fas fa-eye"></i>
                                                            <?php else: ?>
                                                                <i class="fas fa-edit"></i>
                                                            <?php endif; ?>

                                                            <?php echo e($language->lang_name); ?>

                                                        </a></li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>

                                            <div class="alert alert-secondary" role="alert">

                                                <?php
                                                    $edited_language = $language_list
                                                        ->where('lang_code', request()->get('lang_code'))
                                                        ->first();
                                                ?>

                                                <p><?php echo e(__('translate.Your editing mode')); ?> :
                                                    <b><?php echo e(isset($edited_language) ? $edited_language->lang_name : 'Default'); ?></b>
                                                </p>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- End Product Card -->
                                </div>
                            </div>
                        </div>
                        <!-- End Dashboard Inner -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End crancy Dashboard -->
    <section class="crancy-adashboard crancy-show">
        <div class="container container__bscreen">
            <div class="row">
                <div class="col-12">
                    <div class="crancy-body">
                        <div class="crancy-dsinner">
                            <form
                                action="<?php echo e(route('admin.tourbooking.services.update', ['service' => $service->id, 'lang_code' => $lang_code])); ?>"
                                method="POST" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <input type="hidden" name="translate_id" value="<?php echo e($translation->id ?? ''); ?>">
                                <input type="hidden" name="lang_code" value="<?php echo e($lang_code); ?>">

                                <div class="row">
                                    <div class="col-12 mg-top-30">
                                        <div class="crancy-product-card">
                                            <div class="create_new_btn_inline_box">
                                                <h4 class="crancy-product-card__title">
                                                    <?php echo e(__('translate.Basic Information')); ?></h4>
                                                <a href="<?php echo e(route('admin.tourbooking.services.index')); ?>"
                                                    class="crancy-btn"><i class="fa fa-list"></i>
                                                    <?php echo e(__('translate.Service List')); ?></a>
                                            </div>

                                            <div class="row mg-top-30">
                                                <div class="col-lg-6 col-md-6 col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label"><?php echo e(__('translate.Title')); ?>

                                                            *</label>
                                                        <input class="crancy__item-input" type="text" name="title"
                                                            id="title"
                                                            value="<?php echo e(old('title', $translation->title ?? $service->title)); ?>"
                                                            required>
                                                        <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span class="text-danger"><?php echo e($message); ?></span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6 col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label"><?php echo e(__('translate.Slug')); ?></label>
                                                        <input class="crancy__item-input" type="text" name="slug"
                                                            id="slug" value="<?php echo e(old('slug', $service->slug)); ?>">
                                                        <?php $__errorArgs = ['slug'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span class="text-danger"><?php echo e($message); ?></span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-md-6 col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label"><?php echo e(__('translate.Service Type')); ?></label>
                                                        <select class="crancy__item-input" name="service_type_id" required>
                                                            <option value=""><?php echo e(__('translate.Select Type')); ?>

                                                            </option>
                                                            <?php $__currentLoopData = $serviceTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($type->id); ?>"
                                                                    <?php echo e(old('service_type_id', $service->service_type_id) == $type->id ? 'selected' : ''); ?>>
                                                                    <?php echo e($type->name); ?>

                                                                </option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                        <?php $__errorArgs = ['service_type_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span class="text-danger"><?php echo e($message); ?></span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-md-6 col-12">
                                                     <div class="crancy__item-form--group mg-top-form-20">
                                                         <label
                                                             class="crancy__item-label"><?php echo e(__('translate.Select Destinations')); ?></label>
                                                         <select class="crancy__item-input select2" name="destination_ids[]" multiple required>
                                                             <?php $__currentLoopData = $destinations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $destination): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                 <option value="<?php echo e($destination->id); ?>"
                                                                     <?php echo e(in_array($destination->id, old('destination_ids', $service->destinations->pluck('id')->toArray())) ? 'selected' : ''); ?>>
                                                                     <?php echo e($destination->name); ?>

                                                                 </option>
                                                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                         </select>
                                                         <?php $__errorArgs = ['destination_ids'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                             <span class="text-danger"><?php echo e($message); ?></span>
                                                         <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                     </div>
                                                 </div>

                                                <div class="col-lg-4 col-md-6 col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label"><?php echo e(__('translate.Select Hotels')); ?></label>
                                                        <select class="crancy__item-input select2" name="hotels[]" multiple>
                                                            <?php $__currentLoopData = $hotels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hotel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($hotel->id); ?>"
                                                                    <?php if(in_array($hotel->id, old('hotels', $service->hotels->pluck('id')->toArray()))): echo 'selected'; endif; ?>>
                                                                    <?php echo e($hotel->title); ?>

                                                                </option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                        <?php $__errorArgs = ['hotels'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span class="text-danger"><?php echo e($message); ?></span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-md-6 col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label"><?php echo e(__('translate.Location')); ?></label>
                                                        <input class="crancy__item-input" type="text" name="location"
                                                            value="<?php echo e(old('location', $service->location)); ?>">
                                                        <?php $__errorArgs = ['location'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span class="text-danger"><?php echo e($message); ?></span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label"><?php echo e(__('translate.Map Image')); ?></label>
                                                        <input class="crancy__item-input" type="file" name="map_image" accept="image/*">
                                                        <?php if($service->map_image): ?>
                                                            <div class="mt-2">
                                                                <img src="<?php echo e(asset('storage/' . $service->map_image)); ?>" width="200" alt="Map Image">
                                                            </div>
                                                        <?php endif; ?>
                                                        <?php $__errorArgs = ['map_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span class="text-danger"><?php echo e($message); ?></span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6 col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label"><?php echo e(__('translate.Duration')); ?></label>
                                                        <input class="crancy__item-input" type="text" name="duration"
                                                            value="<?php echo e(old('duration', $service->duration)); ?>"
                                                            placeholder="e.g. 3 hours, 2 days">
                                                        <?php $__errorArgs = ['duration'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span class="text-danger"><?php echo e($message); ?></span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6 col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label"><?php echo e(__('translate.Group Size')); ?></label>
                                                        <input class="crancy__item-input" type="text"
                                                            name="group_size"
                                                            value="<?php echo e(old('group_size', $service->group_size)); ?>"
                                                            placeholder="e.g. Up to 10 people">
                                                        <?php $__errorArgs = ['group_size'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span class="text-danger"><?php echo e($message); ?></span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-md-6 col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label"><?php echo e(__('translate.Age range')); ?></label>
                                                        <input class="crancy__item-input" type="text" name="age_range"
                                                            value="<?php echo e(old('age_range', $service->age_range)); ?>"
                                                            placeholder="e.g. 18-99">
                                                        <?php $__errorArgs = ['age_range'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span class="text-danger"><?php echo e($message); ?></span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                </div>


                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label"><?php echo e(__('translate.Short Description')); ?></label>
                                                        <textarea class="crancy__item-input summernote" name="short_description" rows="8"><?php echo e(old('short_description', $translation->short_description ?? $service->short_description)); ?></textarea>
                                                        <?php $__errorArgs = ['short_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span class="text-danger"><?php echo e($message); ?></span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label"><?php echo e(__('translate.Description')); ?></label>
                                                        <textarea class="crancy__item-input summernote" name="description" rows="15"><?php echo e(old('description', $translation->description ?? $service->description)); ?></textarea>
                                                        <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span class="text-danger"><?php echo e($message); ?></span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label"><?php echo e(__('translate.Status')); ?></label>
                                                        <div
                                                            class="crancy-ptabs__notify-switch crancy-ptabs__notify-switch--two">
                                                            <label class="crancy__item-switch">
                                                                <input name="status" type="checkbox" value="1"
                                                                    <?php echo e(old('status', $service->status) ? 'checked' : ''); ?>>
                                                                <span
                                                                    class="crancy__item-switch--slide crancy__item-switch--round"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 mg-top-30">
                                        <div class="crancy-product-card">
                                            <h4 class="crancy-product-card__title">
                                                <?php echo e(__('translate.Additional Information')); ?></h4>

                                            <div class="row mg-top-30">

                                                <div class="col-lg-6 col-md-6 col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label"><?php echo e(__('translate.Ticket')); ?></label>
                                                        <input class="crancy__item-input" type="text" name="ticket"
                                                            value="<?php echo e(old('ticket', $service->ticket)); ?>"
                                                            placeholder="e.g. Mobile Voucher or Printed Ticket">
                                                        <?php $__errorArgs = ['ticket'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span class="text-danger"><?php echo e($message); ?></span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6 col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label"><?php echo e(__('translate.Video URL')); ?></label>
                                                        <input class="crancy__item-input" type="url" name="video_url"
                                                            value="<?php echo e(old('video_url', $service->video_url)); ?>"
                                                            placeholder="YouTube or Vimeo URL">
                                                        <?php $__errorArgs = ['video_url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span class="text-danger"><?php echo e($message); ?></span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6 col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label"><?php echo e(__('translate.Languages')); ?></label>
                                                        <select class="crancy__item-input select2" name="languages[]"
                                                            multiple>

                                                            <?php $__currentLoopData = $enum_languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($language->name); ?>"
                                                                    <?php if(is_array($service?->languages) && in_array($language->name, $service?->languages ?? [])): echo 'selected'; endif; ?>>
                                                                    <?php echo e($language->value); ?>

                                                                </option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6 col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label"><?php echo e(__('translate.Amenities')); ?></label>
                                                        <select class="crancy__item-input select2" name="amenities[]"
                                                            multiple>
                                                            <?php $__currentLoopData = $amenities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $amenity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($amenity->translation->id); ?>"
                                                                    <?php if(is_array($translation->amenities ?? null) && in_array($amenity->translation->id, ($translation->amenities ?? []))): echo 'selected'; endif; ?>>
                                                                    <?php echo e($amenity->translation->name); ?>

                                                                </option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-12 mg-top-30">
                                                    <h4 class="crancy-product-card__title"><?php echo e(__('translate.Included')); ?></h4>
                                                    <div id="included-container">
                                                        <?php
                                                            $included = $translation->included ?? $service->included ?? [];
                                                            if (is_string($included)) {
                                                                $included = json_decode($included, true) ?? [];
                                                            }
                                                            $formatted_included = [];
                                                            foreach ($included as $item) {
                                                                if (is_string($item)) {
                                                                    $formatted_included[] = ['category' => 'others', 'title' => $item, 'details' => ''];
                                                                } else {
                                                                    $formatted_included[] = $item;
                                                                }
                                                            }
                                                        ?>
                                                        <?php $__currentLoopData = $formatted_included; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div class="included-item mb-4 pb-4 border-bottom" data-index="<?php echo e($index); ?>">
                                                                <div class="row">
                                                                    <div class="col-lg-3 col-12">
                                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                                            <label class="crancy__item-label"><?php echo e(__('translate.Category')); ?></label>
                                                                            <select class="crancy__item-input category-select" name="included[<?php echo e($index); ?>][category]">
                                                                                <option value="accommodation" <?php echo e(($item['category'] ?? '') == 'accommodation' ? 'selected' : ''); ?>><?php echo e(__('translate.Accommodation')); ?></option>
                                                                                <option value="meals" <?php echo e(($item['category'] ?? '') == 'meals' ? 'selected' : ''); ?>><?php echo e(__('translate.Meals')); ?></option>
                                                                                <option value="guide" <?php echo e(($item['category'] ?? '') == 'guide' ? 'selected' : ''); ?>><?php echo e(__('translate.Guide')); ?></option>
                                                                                <option value="transport" <?php echo e(($item['category'] ?? '') == 'transport' ? 'selected' : ''); ?>><?php echo e(__('translate.Transport')); ?></option>
                                                                                <option value="others" <?php echo e(($item['category'] ?? '') == 'others' ? 'selected' : ''); ?>><?php echo e(__('translate.Others')); ?></option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4 col-12">
                                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                                            <label class="crancy__item-label"><?php echo e(__('translate.Title')); ?></label>
                                                                            <input class="crancy__item-input" type="text" name="included[<?php echo e($index); ?>][title]" value="<?php echo e($item['title'] ?? ''); ?>" placeholder="e.g. 7 Nights Accommodation">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-5 col-12">
                                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                                            <label class="crancy__item-label"><?php echo e(__('translate.Details')); ?></label>
                                                                            <textarea class="crancy__item-input" name="included[<?php echo e($index); ?>][details]" rows="2"><?php echo e($item['details'] ?? ''); ?></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <?php if(($item['category'] ?? '') == 'meals'): ?>
                                                                    <div class="col-12 dietary-options">
                                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                                            <label class="crancy__item-label"><?php echo e(__('translate.Dietary Options')); ?></label>
                                                                            <select class="crancy__item-input select2" name="included[<?php echo e($index); ?>][dietary][]" multiple>
                                                                                <option value="Vegetarian" <?php echo e(in_array('Vegetarian', $item['dietary'] ?? []) ? 'selected' : ''); ?>>Vegetarian</option>
                                                                                <option value="Vegan" <?php echo e(in_array('Vegan', $item['dietary'] ?? []) ? 'selected' : ''); ?>>Vegan</option>
                                                                                <option value="Halal" <?php echo e(in_array('Halal', $item['dietary'] ?? []) ? 'selected' : ''); ?>>Halal</option>
                                                                                <option value="Gluten-Free" <?php echo e(in_array('Gluten-Free', $item['dietary'] ?? []) ? 'selected' : ''); ?>>Gluten-Free</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <?php endif; ?>
                                                                    <div class="col-12 mg-top-20">
                                                                        <button type="button" class="crancy-btn btn-danger remove-included" style="background-color: #dc3545;">
                                                                            <i class="fa fa-trash"></i> <?php echo e(__('translate.Remove')); ?>

                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                    <button type="button" class="crancy-btn" id="add-included">
                                                        <i class="fa fa-plus"></i> <?php echo e(__('translate.Add Included')); ?>

                                                    </button>
                                                </div>

                                                <div class="col-12 mg-top-30">
                                                    <h4 class="crancy-product-card__title"><?php echo e(__('translate.Excluded')); ?></h4>
                                                    <div id="excluded-container">
                                                        <?php
                                                            $excluded = $translation->excluded ?? $service->excluded ?? [];
                                                            if (is_string($excluded)) {
                                                                $excluded = json_decode($excluded, true) ?? [];
                                                            }
                                                            $formatted_excluded = [];
                                                            foreach ($excluded as $item) {
                                                                if (is_string($item)) {
                                                                    $formatted_excluded[] = ['category' => 'others', 'title' => $item, 'details' => ''];
                                                                } else {
                                                                    $formatted_excluded[] = $item;
                                                                }
                                                            }
                                                        ?>
                                                        <?php $__currentLoopData = $formatted_excluded; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div class="excluded-item mb-4 pb-4 border-bottom" data-index="<?php echo e($index); ?>">
                                                                <div class="row">
                                                                    <div class="col-lg-3 col-12">
                                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                                            <label class="crancy__item-label"><?php echo e(__('translate.Category')); ?></label>
                                                                            <select class="crancy__item-input" name="excluded[<?php echo e($index); ?>][category]">
                                                                                <option value="others" selected><?php echo e(__('translate.Others')); ?></option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4 col-12">
                                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                                            <label class="crancy__item-label"><?php echo e(__('translate.Title')); ?></label>
                                                                            <input class="crancy__item-input" type="text" name="excluded[<?php echo e($index); ?>][title]" value="<?php echo e($item['title'] ?? ''); ?>" placeholder="e.g. Flights">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-5 col-12">
                                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                                            <label class="crancy__item-label"><?php echo e(__('translate.Details')); ?></label>
                                                                            <textarea class="crancy__item-input" name="excluded[<?php echo e($index); ?>][details]" rows="2"><?php echo e($item['details'] ?? ''); ?></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 mg-top-20">
                                                                        <button type="button" class="crancy-btn btn-danger remove-excluded" style="background-color: #dc3545;">
                                                                            <i class="fa fa-trash"></i> <?php echo e(__('translate.Remove')); ?>

                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                    <button type="button" class="crancy-btn" id="add-excluded">
                                                        <i class="fa fa-plus"></i> <?php echo e(__('translate.Add Excluded')); ?>

                                                    </button>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label"><?php echo e(__('translate.Tour Plan Sub Title')); ?></label>
                                                        <input class="crancy__item-input" type="text"
                                                            name="tour_plan_sub_title"
                                                            value="<?php echo e(old('tour_plan_sub_title', $service->tour_plan_sub_title)); ?>"
                                                            placeholder="Tour Plan Sub Title">
                                                        <?php $__errorArgs = ['tour_plan_sub_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span class="text-danger"><?php echo e($message); ?></span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-12 mg-top-30">
                                        <div class="crancy-product-card">
                                            <h4 class="crancy-product-card__title"><?php echo e(__('translate.SEO Information')); ?>

                                            </h4>

                                            <div class="row mg-top-30">
                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label"><?php echo e(__('translate.SEO Title')); ?></label>
                                                        <input class="crancy__item-input" type="text" name="seo_title"
                                                            value="<?php echo e(old('seo_title', $translation->seo_title ?? $service->seo_title)); ?>">
                                                        <?php $__errorArgs = ['seo_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span class="text-danger"><?php echo e($message); ?></span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label"><?php echo e(__('translate.SEO Description')); ?></label>
                                                        <textarea class="crancy__item-input summernote" name="seo_description" rows="3"><?php echo e(old('seo_description', $translation->seo_description ?? $service->seo_description)); ?></textarea>
                                                        <?php $__errorArgs = ['seo_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span class="text-danger"><?php echo e($message); ?></span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label"><?php echo e(__('translate.SEO Keywords')); ?></label>
                                                        <input class="crancy__item-input" type="text"
                                                            name="seo_keywords"
                                                            value="<?php echo e(old('seo_keywords', $translation->seo_keywords ?? $service->seo_keywords)); ?>"
                                                            placeholder="Comma separated keywords">
                                                        <?php $__errorArgs = ['seo_keywords'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span class="text-danger"><?php echo e($message); ?></span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 mg-top-30">
                                        <div class="crancy-product-card">
                                            <h4 class="crancy-product-card__title"><?php echo e(__('translate.Display Options')); ?>

                                            </h4>

                                            <div class="row mg-top-30">
                                                <div class="col-lg-3 col-md-4 col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label"><?php echo e(__('translate.Featured')); ?></label>
                                                        <div
                                                            class="crancy-ptabs__notify-switch crancy-ptabs__notify-switch--two">
                                                            <label class="crancy__item-switch">
                                                                <input name="is_featured" type="checkbox" value="1"
                                                                    <?php echo e(old('is_featured', $service->is_featured) ? 'checked' : ''); ?>>
                                                                <span
                                                                    class="crancy__item-switch--slide crancy__item-switch--round"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3 col-md-4 col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label"><?php echo e(__('translate.Popular')); ?></label>
                                                        <div
                                                            class="crancy-ptabs__notify-switch crancy-ptabs__notify-switch--two">
                                                            <label class="crancy__item-switch">
                                                                <input name="is_popular" type="checkbox" value="1"
                                                                    <?php echo e(old('is_popular', $service->is_popular) ? 'checked' : ''); ?>>
                                                                <span
                                                                    class="crancy__item-switch--slide crancy__item-switch--round"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3 col-md-4 col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label"><?php echo e(__('translate.Show on Homepage')); ?></label>
                                                        <div
                                                            class="crancy-ptabs__notify-switch crancy-ptabs__notify-switch--two">
                                                            <label class="crancy__item-switch">
                                                                <input name="show_on_homepage" type="checkbox"
                                                                    value="1"
                                                                    <?php echo e(old('show_on_homepage', $service->show_on_homepage) ? 'checked' : ''); ?>>
                                                                <span
                                                                    class="crancy__item-switch--slide crancy__item-switch--round"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3 col-md-4 col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label"><?php echo e(__('translate.Is New')); ?></label>
                                                        <div
                                                            class="crancy-ptabs__notify-switch crancy-ptabs__notify-switch--two">
                                                            <label class="crancy__item-switch">
                                                                <input name="is_new" type="checkbox" value="1"
                                                                    <?php echo e(old('is_new', $service->is_new) ? 'checked' : ''); ?>>
                                                                <span
                                                                    class="crancy__item-switch--slide crancy__item-switch--round"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3 col-md-4 col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label"><?php echo e(__('translate.Guaranteed Departure')); ?></label>
                                                        <div
                                                            class="crancy-ptabs__notify-switch crancy-ptabs__notify-switch--two">
                                                            <label class="crancy__item-switch">
                                                                <input name="guaranteed_departure" type="checkbox"
                                                                    value="1"
                                                                    <?php echo e(old('guaranteed_departure', $service->guaranteed_departure) ? 'checked' : ''); ?>>
                                                                <span
                                                                    class="crancy__item-switch--slide crancy__item-switch--round"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 mg-top-30">
                                        <div class="crancy-product-card">
                                            <h4 class="crancy-product-card__title">
                                                <?php echo e(__('translate.Good to know')); ?>

                                            </h4>

                                            <div class="row mg-top-30">
                                                <div class="col-12">
                                                    <div class="alert alert-info mb-20">
                                                        <i class="fa fa-info-circle"></i>
                                                        <?php echo e(__('translate.Add country-specific information such as currency, plugs, and vaccines.')); ?>

                                                    </div>
                                                </div>

                                                <div class="col-12" id="good-to-know-container">
                                                    <?php
                                                        $good_to_know = is_array($translation->good_to_know ?? $service->good_to_know) 
                                                            ? ($translation->good_to_know ?? $service->good_to_know) 
                                                            : json_decode($translation->good_to_know ?? $service->good_to_know ?? '[]', true);
                                                        
                                                        if (empty($good_to_know)) {
                                                            $good_to_know = [['country' => '', 'currency' => '', 'plugs' => '', 'vaccines' => '', 'payment' => '']];
                                                        }
                                                    ?>

                                                    <?php $__currentLoopData = $good_to_know; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="country-info-item mb-4 pb-4 border-bottom" data-index="<?php echo e($index); ?>">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-12">
                                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                                        <label class="crancy__item-label"><?php echo e(__('translate.Currency')); ?></label>
                                                                        <input class="crancy__item-input" type="text" name="good_to_know[<?php echo e($index); ?>][currency]" value="<?php echo e($item['currency'] ?? ''); ?>" placeholder="e.g. Euro">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 col-12">
                                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                                        <label class="crancy__item-label"><?php echo e(__('translate.Prises et adaptateurs')); ?></label>
                                                                        <input class="crancy__item-input" type="text" name="good_to_know[<?php echo e($index); ?>][plugs]" value="<?php echo e($item['plugs'] ?? ''); ?>" placeholder="e.g. Type C, E">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 col-12">
                                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                                        <label class="crancy__item-label"><?php echo e(__('translate.Vaccines')); ?></label>
                                                                        <input class="crancy__item-input" type="text" name="good_to_know[<?php echo e($index); ?>][vaccines]" value="<?php echo e($item['vaccines'] ?? ''); ?>" placeholder="e.g. Hepatite A">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 col-12">
                                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                                        <label class="crancy__item-label"><?php echo e(__('translate.Payment Information')); ?></label>
                                                                        <input class="crancy__item-input" type="text" name="good_to_know[<?php echo e($index); ?>][payment]" value="<?php echo e($item['payment'] ?? ''); ?>" placeholder="e.g. Cards accepted">
                                                                    </div>
                                                                </div>
                                                                <?php if($index > 0): ?>
                                                                    <div class="col-12 mg-top-20">
                                                                        <button type="button" class="crancy-btn btn-danger remove-country-info" style="background-color: #dc3545;">
                                                                            <i class="fa fa-trash"></i> <?php echo e(__('translate.Remove')); ?>

                                                                        </button>
                                                                    </div>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>

                                                <div class="col-12 mg-top-20">
                                                    <button type="button" class="crancy-btn" id="add-country-info">
                                                        <i class="fa fa-plus"></i> <?php echo e(__('translate.Add Country Info')); ?>

                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 mg-top-30">
                                        <div class="crancy-product-card">
                                            <h4 class="crancy-product-card__title"><?php echo e(__('translate.Room Types')); ?>

                                            </h4>

                                            <div class="alert alert-info mb-20">
                                                <i class="fa fa-info-circle"></i>
                                                <?php echo e(__('translate.Configure room types with price supplements for this service.')); ?>

                                            </div>

                                            <div class="col-12" id="room-types-container">
                                                <?php $__currentLoopData = $service->roomTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $roomType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="room-type-item" data-index="<?php echo e($index); ?>">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-6 col-12">
                                                                <div class="crancy__item-form--group mg-top-form-20">
                                                                    <label class="crancy__item-label"><?php echo e(__('translate.Room Type')); ?></label>
                                                                    <select class="crancy__item-input room-type-select" name="room_types[<?php echo e($index); ?>][type]" required>
                                                                        <option value=""><?php echo e(__('translate.Select Type')); ?></option>
                                                                        <option value="single" <?php echo e($roomType->type == 'single' ? 'selected' : ''); ?>><?php echo e(__('translate.Single Room')); ?></option>
                                                                        <option value="double" <?php echo e($roomType->type == 'double' ? 'selected' : ''); ?>><?php echo e(__('translate.Double Room')); ?></option>
                                                                        <option value="triple" <?php echo e($roomType->type == 'triple' ? 'selected' : ''); ?>><?php echo e(__('translate.Triple Room')); ?></option>
                                                                        <option value="double_shared" <?php echo e($roomType->type == 'double_shared' ? 'selected' : ''); ?>><?php echo e(__('translate.Double Room (Shared)')); ?></option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-3 col-md-6 col-12">
                                                                <div class="crancy__item-form--group mg-top-form-20">
                                                                    <label class="crancy__item-label"><?php echo e(__('translate.Price Supplement')); ?></label>
                                                                    <div class="crancy__item-form--currency">
                                                                        <input class="crancy__item-input room-type-supplement" type="number" step="0.01" name="room_types[<?php echo e($index); ?>][price_supplement]" value="<?php echo e($roomType->price_supplement); ?>">
                                                                        <div class="crancy__currency-icon">
                                                                            <span><?php echo e(config('settings.currency_icon', '$')); ?></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-3 col-md-6 col-12">
                                                                <div class="crancy__item-form--group mg-top-form-20">
                                                                    <label class="crancy__item-label"><?php echo e(__('translate.Capacity')); ?></label>
                                                                    <input class="crancy__item-input room-type-capacity" type="number" name="room_types[<?php echo e($index); ?>][capacity]" value="<?php echo e($roomType->capacity); ?>" min="1">
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-3 col-md-6 col-12">
                                                                <div class="crancy__item-form--group mg-top-form-20">
                                                                    <label class="crancy__item-label"><?php echo e(__('translate.Status')); ?></label>
                                                                    <div class="crancy-ptabs__notify-switch crancy-ptabs__notify-switch--two">
                                                                        <label class="crancy__item-switch">
                                                                            <input type="checkbox" name="room_types[<?php echo e($index); ?>][is_active]" value="1" <?php echo e($roomType->is_active ? 'checked' : ''); ?>>
                                                                            <span class="crancy__item-switch--slide crancy__item-switch--round"></span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-12">
                                                                <div class="crancy__item-form--group mg-top-form-20">
                                                                    <label class="crancy__item-label"><?php echo e(__('translate.Description')); ?></label>
                                                                    <textarea class="crancy__item-input room-type-description" name="room_types[<?php echo e($index); ?>][description]" rows="3" placeholder="Optional description for this room type"><?php echo e($roomType->description); ?></textarea>
                                                                </div>
                                                            </div>

                                                            <div class="col-12">
                                                                <button type="button" class="crancy-btn btn-danger remove-room-type" style="background-color: #dc3545;">
                                                                    <i class="fa fa-trash"></i> <?php echo e(__('translate.Remove')); ?>

                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>

                                            <div class="col-12 mg-top-20">
                                                <button type="button" class="crancy-btn" id="add-room-type">
                                                    <i class="fa fa-plus"></i> <?php echo e(__('translate.Add Room Type')); ?>

                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 mg-top-30">
                                        <div class="alert alert-info">
                                            <i class="fa fa-info-circle"></i>
                                            <?php echo e(__('translate.Manage service images and videos in the')); ?>

                                            <a href="<?php echo e(route('admin.tourbooking.services.media', $service->id)); ?>"
                                                class="alert-link"><?php echo e(__('translate.Media Gallery')); ?></a>
                                        </div>
                                        <button class="crancy-btn"
                                            type="submit"><?php echo e(__('translate.Update Service')); ?></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js_section'); ?>
    <script src="<?php echo e(asset('global/select2/select2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('global/tinymce/js/tinymce/tinymce.min.js')); ?>"></script>
    <script>
        (function($) {
            "use strict"
            $(document).ready(function() {
                $("#title").on("keyup", function(e) {
                    let inputValue = $(this).val();
                    let slug = inputValue.toLowerCase().replace(/[^\w ]+/g, '').replace(/ +/g, '-');
                    $("#slug").val(slug);
                });

                $('.select2').select2({
                    tags: true,
                    width: '100%',
                    tokenSeparators: [',', ' ']
                });

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

                // Room type management
                const roomTypesContainer = document.getElementById('room-types-container');
                let roomTypeIndex = roomTypesContainer.querySelectorAll('.room-type-item').length;

                document.getElementById('add-room-type').addEventListener('click', function() {
                    const newRoomType = document.createElement('div');
                    newRoomType.className = 'room-type-item';
                    newRoomType.dataset.index = roomTypeIndex;
                    newRoomType.innerHTML = `
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-12">
                                <div class="crancy__item-form--group mg-top-form-20">
                                    <label class="crancy__item-label"><?php echo e(__('translate.Room Type')); ?></label>
                                    <select class="crancy__item-input room-type-select" name="room_types[${roomTypeIndex}][type]" required>
                                        <option value=""><?php echo e(__('translate.Select Type')); ?></option>
                                        <option value="single"><?php echo e(__('translate.Single Room')); ?></option>
                                        <option value="double"><?php echo e(__('translate.Double Room')); ?></option>
                                        <option value="triple"><?php echo e(__('translate.Triple Room')); ?></option>
                                        <option value="double_shared"><?php echo e(__('translate.Double Room (Shared)')); ?></option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 col-12">
                                <div class="crancy__item-form--group mg-top-form-20">
                                    <label class="crancy__item-label"><?php echo e(__('translate.Price Supplement')); ?></label>
                                    <div class="crancy__item-form--currency">
                                        <input class="crancy__item-input room-type-supplement" type="number" step="0.01" name="room_types[${roomTypeIndex}][price_supplement]" value="0">
                                        <div class="crancy__currency-icon">
                                            <span><?php echo e(config('settings.currency_icon', '$')); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 col-12">
                                <div class="crancy__item-form--group mg-top-form-20">
                                    <label class="crancy__item-label"><?php echo e(__('translate.Capacity')); ?></label>
                                    <input class="crancy__item-input room-type-capacity" type="number" name="room_types[${roomTypeIndex}][capacity]" value="1" min="1">
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 col-12">
                                <div class="crancy__item-form--group mg-top-form-20">
                                    <label class="crancy__item-label"><?php echo e(__('translate.Status')); ?></label>
                                    <div class="crancy-ptabs__notify-switch crancy-ptabs__notify-switch--two">
                                        <label class="crancy__item-switch">
                                            <input type="checkbox" name="room_types[${roomTypeIndex}][is_active]" value="1" checked>
                                            <span class="crancy__item-switch--slide crancy__item-switch--round"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="crancy__item-form--group mg-top-form-20">
                                    <label class="crancy__item-label"><?php echo e(__('translate.Description')); ?></label>
                                    <textarea class="crancy__item-input room-type-description" name="room_types[${roomTypeIndex}][description]" rows="3" placeholder="Optional description for this room type"></textarea>
                                </div>
                            </div>

                            <div class="col-12">
                                <button type="button" class="crancy-btn btn-danger remove-room-type" style="background-color: #dc3545;">
                                    <i class="fa fa-trash"></i> <?php echo e(__('translate.Remove')); ?>

                                </button>
                            </div>
                        </div>
                    `;
                    roomTypesContainer.appendChild(newRoomType);
                    roomTypeIndex++;
                });

                // Event delegation for remove buttons
                roomTypesContainer.addEventListener('click', function(e) {
                    if (e.target.closest('.remove-room-type')) {
                        const roomTypeItem = e.target.closest('.room-type-item');
                        if (roomTypesContainer.querySelectorAll('.room-type-item').length > 1) {
                            roomTypeItem.remove();
                        } else {
                            alert('At least one room type is required.');
                        }
                    }
                });

                // Good to know country management
                const goodToKnowContainer = document.getElementById('good-to-know-container');
                let countryIndex = goodToKnowContainer.querySelectorAll('.country-info-item').length;

                document.getElementById('add-country-info').addEventListener('click', function() {
                    const newCountry = document.createElement('div');
                    newCountry.className = 'country-info-item mb-4 pb-4 border-bottom';
                    newCountry.dataset.index = countryIndex;
                    newCountry.innerHTML = `
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="crancy__item-form--group mg-top-form-20">
                                    <label class="crancy__item-label"><?php echo e(__('translate.Currency')); ?></label>
                                    <input class="crancy__item-input" type="text" name="good_to_know[${countryIndex}][currency]" placeholder="e.g. Euro">
                                </div>
                            </div>
                            <div class="col-lg-4 col-12">
                                <div class="crancy__item-form--group mg-top-form-20">
                                    <label class="crancy__item-label"><?php echo e(__('translate.Prises et adaptateurs')); ?></label>
                                    <input class="crancy__item-input" type="text" name="good_to_know[${countryIndex}][plugs]" placeholder="e.g. Type C, E">
                                </div>
                            </div>
                            <div class="col-lg-4 col-12">
                                <div class="crancy__item-form--group mg-top-form-20">
                                    <label class="crancy__item-label"><?php echo e(__('translate.Vaccines')); ?></label>
                                    <input class="crancy__item-input" type="text" name="good_to_know[${countryIndex}][vaccines]" placeholder="e.g. Hepatite A">
                                </div>
                            </div>
                            <div class="col-lg-4 col-12">
                                <div class="crancy__item-form--group mg-top-form-20">
                                    <label class="crancy__item-label"><?php echo e(__('translate.Payment Information')); ?></label>
                                    <input class="crancy__item-input" type="text" name="good_to_know[${countryIndex}][payment]" placeholder="e.g. Cards accepted">
                                </div>
                            </div>
                            <div class="col-12 mg-top-20">
                                <button type="button" class="crancy-btn btn-danger remove-country-info" style="background-color: #dc3545;">
                                    <i class="fa fa-trash"></i> <?php echo e(__('translate.Remove')); ?>

                                </button>
                            </div>
                        </div>
                    `;
                    goodToKnowContainer.appendChild(newCountry);
                    countryIndex++;
                });

                // Event delegation for remove buttons
                // Included management
                const includedContainer = document.getElementById('included-container');
                let includedIndex = includedContainer.querySelectorAll('.included-item').length;

                document.getElementById('add-included').addEventListener('click', function() {
                    const newItem = document.createElement('div');
                    newItem.className = 'included-item mb-4 pb-4 border-bottom';
                    newItem.dataset.index = includedIndex;
                    newItem.innerHTML = `
                        <div class="row">
                            <div class="col-lg-3 col-12">
                                <div class="crancy__item-form--group mg-top-form-20">
                                    <label class="crancy__item-label"><?php echo e(__('translate.Category')); ?></label>
                                    <select class="crancy__item-input category-select" name="included[${includedIndex}][category]">
                                        <option value="accommodation"><?php echo e(__('translate.Accommodation')); ?></option>
                                        <option value="meals"><?php echo e(__('translate.Meals')); ?></option>
                                        <option value="guide"><?php echo e(__('translate.Guide')); ?></option>
                                        <option value="transport"><?php echo e(__('translate.Transport')); ?></option>
                                        <option value="others" selected><?php echo e(__('translate.Others')); ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-12">
                                <div class="crancy__item-form--group mg-top-form-20">
                                    <label class="crancy__item-label"><?php echo e(__('translate.Title')); ?></label>
                                    <input class="crancy__item-input" type="text" name="included[${includedIndex}][title]" placeholder="e.g. 7 Nights Accommodation">
                                </div>
                            </div>
                            <div class="col-lg-5 col-12">
                                <div class="crancy__item-form--group mg-top-form-20">
                                    <label class="crancy__item-label"><?php echo e(__('translate.Details')); ?></label>
                                    <textarea class="crancy__item-input" name="included[${includedIndex}][details]" rows="2"></textarea>
                                </div>
                            </div>
                            <div class="col-12 dietary-options" style="display:none;">
                                <div class="crancy__item-form--group mg-top-form-20">
                                    <label class="crancy__item-label"><?php echo e(__('translate.Dietary Options')); ?></label>
                                    <select class="crancy__item-input select2-new" name="included[${includedIndex}][dietary][]" multiple>
                                        <option value="Vegetarian">Vegetarian</option>
                                        <option value="Vegan">Vegan</option>
                                        <option value="Halal">Halal</option>
                                        <option value="Gluten-Free">Gluten-Free</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 mg-top-20">
                                <button type="button" class="crancy-btn btn-danger remove-included" style="background-color: #dc3545;">
                                    <i class="fa fa-trash"></i> <?php echo e(__('translate.Remove')); ?>

                                </button>
                            </div>
                        </div>
                    `;
                    includedContainer.appendChild(newItem);
                    
                    // Initialize Select2 for the new item if it's meals
                    $(newItem).find('.select2-new').select2({
                        width: '100%'
                    });
                    
                    includedIndex++;
                });

                includedContainer.addEventListener('change', function(e) {
                    if (e.target.classList.contains('category-select')) {
                        const row = e.target.closest('.row');
                        const dietaryOptions = row.querySelector('.dietary-options');
                        if (e.target.value === 'meals') {
                            dietaryOptions.style.display = 'block';
                        } else {
                            dietaryOptions.style.display = 'none';
                        }
                    }
                });

                includedContainer.addEventListener('click', function(e) {
                    if (e.target.closest('.remove-included')) {
                        e.target.closest('.included-item').remove();
                    }
                });

                // Excluded management
                const excludedContainer = document.getElementById('excluded-container');
                let excludedIndex = excludedContainer.querySelectorAll('.excluded-item').length;

                document.getElementById('add-excluded').addEventListener('click', function() {
                    const newItem = document.createElement('div');
                    newItem.className = 'excluded-item mb-4 pb-4 border-bottom';
                    newItem.dataset.index = excludedIndex;
                    newItem.innerHTML = `
                        <div class="row">
                            <div class="col-lg-3 col-12">
                                <div class="crancy__item-form--group mg-top-form-20">
                                    <label class="crancy__item-label"><?php echo e(__('translate.Category')); ?></label>
                                    <select class="crancy__item-input" name="excluded[${excludedIndex}][category]">
                                        <option value="others" selected><?php echo e(__('translate.Others')); ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-12">
                                <div class="crancy__item-form--group mg-top-form-20">
                                    <label class="crancy__item-label"><?php echo e(__('translate.Title')); ?></label>
                                    <input class="crancy__item-input" type="text" name="excluded[${excludedIndex}][title]" placeholder="e.g. Flights">
                                </div>
                            </div>
                            <div class="col-lg-5 col-12">
                                <div class="crancy__item-form--group mg-top-form-20">
                                    <label class="crancy__item-label"><?php echo e(__('translate.Details')); ?></label>
                                    <textarea class="crancy__item-input" name="excluded[${excludedIndex}][details]" rows="2"></textarea>
                                </div>
                            </div>
                            <div class="col-12 mg-top-20">
                                <button type="button" class="crancy-btn btn-danger remove-excluded" style="background-color: #dc3545;">
                                    <i class="fa fa-trash"></i> <?php echo e(__('translate.Remove')); ?>

                                </button>
                            </div>
                        </div>
                    `;
                    excludedContainer.appendChild(newItem);
                    excludedIndex++;
                });

                excludedContainer.addEventListener('click', function(e) {
                    if (e.target.closest('.remove-excluded')) {
                        e.target.closest('.excluded-item').remove();
                    }
                });
            });
        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.master_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\archive\archive\Modules/TourBooking\resources/views/admin/services/edit.blade.php ENDPATH**/ ?>