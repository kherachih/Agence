
<?php $__env->startSection('title'); ?>
    <title><?php echo e(__('translate.Itineraries')); ?> - <?php echo e($service->translation->title ?? $service->title); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body-header'); ?>
    <h3 class="crancy-header__title m-0"><?php echo e(__('translate.Itineraries')); ?></h3>
    <p class="crancy-header__text"><?php echo e(__('translate.Tour Booking')); ?> >> <?php echo e(__('translate.Services')); ?> >>
        <?php echo e(__('translate.Itineraries')); ?></p>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('style_section'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('global/select2/select2.min.css')); ?>">
    <style>
        .itinerary-card {
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            margin-bottom: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        .itinerary-card .card-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid #e0e0e0;
            padding: 15px;
        }

        .itinerary-card .card-body {
            padding: 20px;
        }

        .itinerary-image {
            max-width: 100%;
            height: auto;
            border-radius: 6px;
        }

        .itinerary-day-badge {
            font-size: 14px;
            padding: 5px 10px;
            background: #4e73df;
            color: white;
            border-radius: 20px;
            margin-right: 10px;
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
                                            <h4 class="crancy-product-card__title"><?php echo e(__('translate.Itineraries for')); ?>:
                                                <?php echo e($service->translation->title ?? $service->title); ?></h4>
                                            <div>
                                                <a href="<?php echo e(route('admin.tourbooking.services.edit', ['service' => $service->id, 'lang_code' => admin_lang()])); ?>"
                                                    class="crancy-btn"><i class="fa fa-edit"></i>
                                                    <?php echo e(__('translate.Edit Service')); ?></a>
                                                <a href="<?php echo e(route('admin.tourbooking.services.index')); ?>"
                                                    class="crancy-btn"><i class="fa fa-list"></i>
                                                    <?php echo e(__('translate.Service List')); ?></a>
                                            </div>
                                        </div>

                                        <div class="row mg-top-30">
                                            <div class="col-12">
                                                <div class="accordion" id="itineraryAccordion">
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="headingOne">
                                                            <button class="accordion-button" type="button"
                                                                data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                <?php echo e(__('translate.Add New Itinerary')); ?>

                                                            </button>
                                                        </h2>
                                                        <div id="collapseOne" class="accordion-collapse collapse show"
                                                            aria-labelledby="headingOne"
                                                            data-bs-parent="#itineraryAccordion">
                                                            <div class="accordion-body">
                                                                <form
                                                                    action="<?php echo e(route('admin.tourbooking.services.itineraries.store', $service->id)); ?>"
                                                                    method="POST" enctype="multipart/form-data">
                                                                    <?php echo csrf_field(); ?>
                                                                    <div class="row">
                                                                        <div class="col-lg-6 col-md-6 col-12">
                                                                            <div
                                                                                class="crancy__item-form--group mg-top-form-20">
                                                                                <label
                                                                                    class="crancy__item-label"><?php echo e(__('translate.Title')); ?>

                                                                                    *</label>
                                                                                <input class="crancy__item-input"
                                                                                    type="text" name="title"
                                                                                    value="<?php echo e(old('title')); ?>" required>
                                                                                <?php $__errorArgs = ['title'];
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
                                                                                    class="crancy__item-label"><?php echo e(__('translate.Day Number')); ?>

                                                                                    *</label>
                                                                                <input class="crancy__item-input"
                                                                                    type="number" min="1"
                                                                                    name="day_number"
                                                                                    value="<?php echo e(old('day_number', $service->itineraries->count() + 1)); ?>"
                                                                                    required>
                                                                                <?php $__errorArgs = ['day_number'];
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
                                                                                    class="crancy__item-label"><?php echo e(__('translate.Duration')); ?></label>
                                                                                <input class="crancy__item-input"
                                                                                    type="text" name="duration"
                                                                                    value="<?php echo e(old('duration')); ?>"
                                                                                    placeholder="e.g. 2 hours, Full day">
                                                                                <?php $__errorArgs = ['duration'];
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

                                                                        <div class="col-12">
                                                                            <div
                                                                                class="crancy__item-form--group mg-top-form-20">
                                                                                <label
                                                                                    class="crancy__item-label"><?php echo e(__('translate.Description')); ?>

                                                                                    *</label>
                                                                                <textarea class="crancy__item-input summernote" name="description" rows="5"><?php echo e(old('description')); ?></textarea>
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

                                                                        <div class="col-lg-6 col-md-6 col-12">
                                                                            <div
                                                                                class="crancy__item-form--group mg-top-form-20">
                                                                                <label
                                                                                    class="crancy__item-label"><?php echo e(__('translate.Image')); ?></label>
                                                                                <input class="crancy__item-input"
                                                                                    type="file" name="image"
                                                                                    accept="image/*">
                                                                                <?php $__errorArgs = ['image'];
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

                                                                        <div class="col-lg-6 col-md-6 col-12">
                                                                            <div
                                                                                class="crancy__item-form--group mg-top-form-20">
                                                                                <label
                                                                                    class="crancy__item-label"><?php echo e(__('translate.Meal Included')); ?></label>
                                                                                <input class="crancy__item-input"
                                                                                    type="text" name="meal_included"
                                                                                    value="<?php echo e(old('meal_included')); ?>"
                                                                                    placeholder="e.g. Breakfast, Lunch, Dinner">
                                                                                <?php $__errorArgs = ['meal_included'];
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

                                                                        <div class="col-12">
                                                                            <div
                                                                                class="crancy__item-form--group mg-top-form-20">
                                                                                <label
                                                                                    class="crancy__item-label"><?php echo e(__('translate.Location')); ?></label>
                                                                                <input class="crancy__item-input"
                                                                                    type="text" name="location"
                                                                                    value="<?php echo e(old('location')); ?>"
                                                                                    placeholder="e.g. Eiffel Tower, Paris">
                                                                                <?php $__errorArgs = ['location'];
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
                                                                                class="crancy-btn"><?php echo e(__('translate.Add Itinerary')); ?></button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mg-top-30">
                                            <div class="col-12">
                                                <h4 class="crancy-product-card__title">
                                                    <?php echo e(__('translate.Existing Itineraries')); ?></h4>

                                                <?php if($service->itineraries->count() > 0): ?>
                                                    <?php $__currentLoopData = $service->itineraries->sortBy('day_number'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itinerary): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="itinerary-card mg-top-20">
                                                            <div
                                                                class="card-header d-flex justify-content-between align-items-center">
                                                                <div>
                                                                    <span
                                                                        class="itinerary-day-badge"><?php echo e(__('translate.Day')); ?>

                                                                        <?php echo e($itinerary->day_number); ?></span>
                                                                    <strong><?php echo e($itinerary->title); ?></strong>
                                                                    <?php if($itinerary->duration): ?>
                                                                        <span
                                                                            class="badge bg-info ms-2"><?php echo e($itinerary->duration); ?></span>
                                                                    <?php endif; ?>
                                                                </div>
                                                                <div>
                                                                    <button type="button" class="crancy-btn"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#editModal<?php echo e($itinerary->id); ?>">
                                                                        <i class="fa fa-edit"></i>
                                                                        <?php echo e(__('translate.Edit')); ?>

                                                                    </button>
                                                                    <button type="button"
                                                                        class="crancy-btn delete_danger_btn"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#deleteModal<?php echo e($itinerary->id); ?>">
                                                                        <i class="fa fa-trash"></i>
                                                                        <?php echo e(__('translate.Delete')); ?>

                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <?php if($itinerary->image): ?>
                                                                        <div class="col-md-3">
                                                                            <img src="<?php echo e(asset('storage/' . $itinerary->image)); ?>"
                                                                                alt="<?php echo e($itinerary->title); ?>"
                                                                                class="itinerary-image">
                                                                        </div>
                                                                        <div class="col-md-9">
                                                                        <?php else: ?>
                                                                            <div class="col-12">
                                                                    <?php endif; ?>
                                                                    <div>
                                                                        <?php echo $itinerary->description; ?>

                                                                    </div>

                                                                    <?php if($itinerary->location): ?>
                                                                        <div class="mt-3">
                                                                            <strong><i class="fa fa-map-marker"></i>
                                                                                <?php echo e(__('translate.Location')); ?>:</strong>
                                                                            <?php echo e($itinerary->location); ?>

                                                                        </div>
                                                                    <?php endif; ?>

                                                                    <?php if($itinerary->meal_included): ?>
                                                                        <div class="mt-2">
                                                                            <strong><i class="fa fa-utensils"></i>
                                                                                <?php echo e(__('translate.Meal Included')); ?>:</strong>
                                                                            <span
                                                                                class="badge bg-success"><?php echo e($itinerary->meal_included); ?></span>
                                                                        </div>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                            </div>

                                            <!-- Edit Modal -->
                                            <div class="modal fade" id="editModal<?php echo e($itinerary->id); ?>" tabindex="-1"
                                                aria-labelledby="editModalLabel<?php echo e($itinerary->id); ?>" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="editModalLabel<?php echo e($itinerary->id); ?>">
                                                                <?php echo e(__('translate.Edit Itinerary')); ?></h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form
                                                            action="<?php echo e(route('admin.tourbooking.services.itineraries.update', $itinerary->id)); ?>"
                                                            method="POST" enctype="multipart/form-data">
                                                            <?php echo csrf_field(); ?>
                                                            <?php echo method_field('PUT'); ?>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-lg-6 col-md-6 col-12">
                                                                        <div class="crancy__item-form--group">
                                                                            <label
                                                                                class="crancy__item-label"><?php echo e(__('translate.Title')); ?>

                                                                                *</label>
                                                                            <input class="crancy__item-input"
                                                                                type="text" name="title"
                                                                                value="<?php echo e($itinerary->title); ?>" required>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-lg-3 col-md-3 col-12">
                                                                        <div class="crancy__item-form--group">
                                                                            <label
                                                                                class="crancy__item-label"><?php echo e(__('translate.Day Number')); ?>

                                                                                *</label>
                                                                            <input class="crancy__item-input"
                                                                                type="number" min="1"
                                                                                name="day_number"
                                                                                value="<?php echo e($itinerary->day_number); ?>"
                                                                                required>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-lg-3 col-md-3 col-12">
                                                                        <div class="crancy__item-form--group">
                                                                            <label
                                                                                class="crancy__item-label"><?php echo e(__('translate.Duration')); ?></label>
                                                                            <input class="crancy__item-input"
                                                                                type="text" name="duration"
                                                                                value="<?php echo e($itinerary->duration); ?>">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-12">
                                                                        <div
                                                                            class="crancy__item-form--group mg-top-form-20">
                                                                            <label
                                                                                class="crancy__item-label"><?php echo e(__('translate.Description')); ?>

                                                                                *</label>
                                                                            <textarea class="crancy__item-input summernote" name="description" rows="5"><?php echo e($itinerary->description); ?></textarea>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-lg-6 col-md-6 col-12">
                                                                        <div
                                                                            class="crancy__item-form--group mg-top-form-20">
                                                                            <label
                                                                                class="crancy__item-label"><?php echo e(__('translate.Image')); ?></label>
                                                                            <?php if($itinerary->image): ?>
                                                                                <div class="mb-2">
                                                                                    <img src="<?php echo e(asset('storage/' . $itinerary->image)); ?>"
                                                                                        alt="<?php echo e($itinerary->title); ?>"
                                                                                        style="max-width: 150px; max-height: 100px;"
                                                                                        class="img-thumbnail">
                                                                                </div>
                                                                            <?php endif; ?>
                                                                            <input class="crancy__item-input"
                                                                                type="file" name="image"
                                                                                accept="image/*">
                                                                            <small
                                                                                class="text-muted"><?php echo e(__('translate.Leave empty to keep current image')); ?></small>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-lg-6 col-md-6 col-12">
                                                                        <div
                                                                            class="crancy__item-form--group mg-top-form-20">
                                                                            <label
                                                                                class="crancy__item-label"><?php echo e(__('translate.Meal Included')); ?></label>
                                                                            <input class="crancy__item-input"
                                                                                type="text" name="meal_included"
                                                                                value="<?php echo e($itinerary->meal_included); ?>">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-12">
                                                                        <div
                                                                            class="crancy__item-form--group mg-top-form-20">
                                                                            <label
                                                                                class="crancy__item-label"><?php echo e(__('translate.Location')); ?></label>
                                                                            <input class="crancy__item-input"
                                                                                type="text" name="location"
                                                                                value="<?php echo e($itinerary->location); ?>">
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
                                            <div class="modal fade" id="deleteModal<?php echo e($itinerary->id); ?>" tabindex="-1"
                                                aria-labelledby="deleteModalLabel<?php echo e($itinerary->id); ?>"
                                                aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="deleteModalLabel<?php echo e($itinerary->id); ?>">
                                                                <?php echo e(__('translate.Confirm Delete')); ?></h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <?php echo e(__('translate.Are you sure you want to delete this itinerary?')); ?>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="crancy-btn crancy-btn__default"
                                                                data-bs-dismiss="modal"><?php echo e(__('translate.Cancel')); ?></button>
                                                            <form
                                                                action="<?php echo e(route('admin.tourbooking.services.itineraries.destroy', $itinerary->id)); ?>"
                                                                method="POST">
                                                                <?php echo csrf_field(); ?>
                                                                <?php echo method_field('DELETE'); ?>
                                                                <button type="submit"
                                                                    class="crancy-btn delete_danger_btn"><?php echo e(__('translate.Delete')); ?></button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                            <div class="alert alert-info mg-top-20">
                                                <?php echo e(__('translate.No itineraries found. Add your first itinerary using the form above.')); ?>

                                            </div>
                                            <?php endif; ?>
                                        </div>
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
    <script src="<?php echo e(asset('global/select2/select2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('global/tinymce/js/tinymce/tinymce.min.js')); ?>"></script>
    <script>
        (function($) {
            "use strict"
            $(document).ready(function() {
                tinymce.init({
                    selector: '.summernote',
                    height: 200,
                    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
                    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
                });
            });
        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.master_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\archive\archive\Modules/TourBooking\resources/views/admin/services/itineraries.blade.php ENDPATH**/ ?>