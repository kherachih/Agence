<?php $__env->startSection('title'); ?>
    <title><?php echo e(__('translate.Create Ticket')); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body-header'); ?>
    <h3 class="crancy-header__title m-0"><?php echo e(__('translate.Create Ticket')); ?></h3>
    <p class="crancy-header__text"><?php echo e(__('translate.Agency Support')); ?> >> <?php echo e(__('translate.Create Ticket')); ?></p>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body-content'); ?>
    <!-- crancy Dashboard -->
    <section class="crancy-adashboard crancy-show">
        <div class="container container__bscreen">
            <div class="row">
                <div class="col-12">
                    <div class="crancy-body">
                        <!-- Dashboard Inner -->
                        <div class="crancy-dsinner">
                            <form action="<?php echo e(route('user.agency-support.store')); ?>" method="POST"
                                enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>

                                <div class="row">
                                    <div class="col-12 mg-top-30">
                                        <!-- Product Card -->
                                        <div class="crancy-product-card">
                                            <div class="create_new_btn_inline_box">
                                                <h4 class="crancy-product-card__title"><?php echo e(__('translate.Create Ticket')); ?>

                                                </h4>

                                                <a href="<?php echo e(route('user.agency-support.index')); ?>" class="crancy-btn "><i
                                                        class="fa fa-list"></i> <?php echo e(__('translate.Ticket List')); ?></a>
                                            </div>

                                            <div class="row mg-top-30">



                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-25">
                                                        <label class="crancy__item-label"><?php echo e(__('translate.Service')); ?> *
                                                        </label>
                                                        <select class="form-select crancy__item-input" name="service_id">
                                                            <option value=""><?php echo e(__('translate.Select')); ?></option>
                                                            <?php $__currentLoopData = $confirm_booking; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option
                                                                    <?php echo e($booking->service->id == old('service_id') ? 'selected' : ''); ?>

                                                                    value="<?php echo e($booking->service->id); ?>">
                                                                    <?php echo e(html_decode($booking->service->title)); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label"><?php echo e(__('translate.Subject')); ?> *
                                                        </label>
                                                        <input class="crancy__item-input" type="text" name="subject"
                                                            id="subject" value="<?php echo e(old('subject')); ?>">
                                                    </div>
                                                </div>


                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label"><?php echo e(__('translate.Message')); ?> *
                                                        </label>

                                                        <textarea class="crancy__item-input crancy__item-textarea summernote" name="message" id="message"><?php echo e(html_decode(old('message'))); ?></textarea>

                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20 edu_support_files">
                                                        <label
                                                            class="crancy__item-label"><?php echo e(__('translate.Attachements')); ?>

                                                        </label>

                                                        <input class="form-control h-auto " type="file"
                                                            name="documents[]" id="formFileMultiple" multiple>
                                                    </div>
                                                </div>


                                            </div>

                                            <button class="crancy-btn mg-top-25"
                                                type="submit"><?php echo e(__('translate.Create Ticket')); ?></button>

                                        </div>
                                        <!-- End Product Card -->
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- End Dashboard Inner -->
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End crancy Dashboard -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.master_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\archive\archive\Modules/SupportTicket\resources/views/servicequery/student/create.blade.php ENDPATH**/ ?>