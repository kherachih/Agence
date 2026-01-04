<?php $__env->startSection('title'); ?>
    <title><?php echo e(__('translate.My Profile')); ?></title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body-header'); ?>
    <h3 class="crancy-header__title m-0"><?php echo e(__('translate.Edit Profile')); ?></h3>
    <p class="crancy-header__text"><?php echo e(__('translate.Dashboard')); ?> >> <?php echo e(__('translate.Edit Profile')); ?></p>
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
                            <form action="<?php echo e(route('user.update-profile')); ?>" enctype="multipart/form-data" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <div class="row">
                                    <div class="col-12 mg-top-30">
                                        <!-- Product Card -->
                                        <div class="crancy-product-card">
                                            <h4 class="crancy-product-card__title"><?php echo e(__('translate.Basic Information')); ?></h4>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="crancy__item-form--group mg-top-25 w-100">
                                                        <div class="crancy-product-card__upload crancy-product-card__upload--border">
                                                            <input type="file" class="btn-check" name="image" id="input-img1" autocomplete="off" onchange="reviewImage(event)">
                                                            <label class="crancy-image-video-upload__label" for="input-img1">
                                                                <?php if($user->image): ?>
                                                                <img id="view_img" src="<?php echo e(asset($user->image)); ?>">
                                                                <?php else: ?>
                                                                <img id="view_img" src="<?php echo e(asset($general_setting->placeholder_image)); ?>">
                                                                <?php endif; ?>

                                                                <h4 class="crancy-image-video-upload__title"><?php echo e(__('translate.Click here to')); ?> <span class="crancy-primary-color"><?php echo e(__('translate.Choose File')); ?></span> <?php echo e(__('translate.and upload')); ?> </h4>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="crancy__item-form--group mg-top-25">
                                                <label class="crancy__item-label crancy__item-label-product"><?php echo e(__('translate.Name')); ?> *</label>
                                                <input class="crancy__item-input" type="text" name="name" value="<?php echo e(html_decode($user->name)); ?>">
                                            </div>


                                            <div class="crancy__item-form--group mg-top-25">
                                                <label class="crancy__item-label crancy__item-label-product"><?php echo e(__('translate.Email')); ?> *</label>
                                                <input class="crancy__item-input" type="email" name="email" value="<?php echo e(html_decode($user->email)); ?>" readonly>
                                            </div>


                                            <div class="crancy__item-form--group mg-top-25">
                                                <label class="crancy__item-label crancy__item-label-product"><?php echo e(__('translate.Phone')); ?> *</label>
                                                <input class="crancy__item-input" type="text" name="phone" value="<?php echo e(html_decode($user->phone)); ?>">
                                            </div>

                                            <div class="crancy__item-form--group mg-top-form-20">
                                                <label class="crancy__item-label crancy__item-label-product"><?php echo e(__('translate.Gender')); ?> * </label>
                                                <select class="form-select crancy__item-input" name="gender">
                                                    <option value=""><?php echo e(__('translate.Select')); ?></option>
                                                    <option <?php echo e($user->gender == 'Male' ? 'selected' : ''); ?> value="Male"><?php echo e(__('translate.Male')); ?></option>
                                                    <option <?php echo e($user->gender == 'Female' ? 'selected' : ''); ?> value="Female"><?php echo e(__('translate.Female')); ?></option>
                                                    <option <?php echo e($user->gender == 'Others' ? 'selected' : ''); ?> value="Others"><?php echo e(__('translate.Others')); ?></option>

                                                </select>
                                            </div>

                                            <div class="crancy__item-form--group mg-top-25">
                                                <label class="crancy__item-label crancy__item-label-product"><?php echo e(__('translate.Address')); ?></label>
                                                <input class="crancy__item-input" type="text" name="address" value="<?php echo e(html_decode($user->address)); ?>">
                                            </div>


                                            <button class="crancy-btn mg-top-25" type="submit"><?php echo e(__('translate.Update')); ?></button>

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

<?php $__env->startPush('js_section'); ?>
    <script>
        "use strict";

        function reviewImage(event) {
            var reader = new FileReader();
            reader.onload = function(){
                var output = document.getElementById('view_img');
                output.src = reader.result;
            }

            reader.readAsDataURL(event.target.files[0]);
        };
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('user.master_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\archive\archive\resources\views/user/edit_profile.blade.php ENDPATH**/ ?>