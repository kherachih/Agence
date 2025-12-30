<?php $__env->startSection('title'); ?>
    <title><?php echo e(__('translate.Edit Language')); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body-header'); ?>
    <h3 class="crancy-header__title m-0"><?php echo e(__('translate.Edit Language')); ?></h3>
    <p class="crancy-header__text"><?php echo e(__('translate.Dashboard')); ?> >> <?php echo e(__('translate.Edit Language')); ?></p>
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
                            <form action="<?php echo e(route('admin.language.update', $language->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>

                                <div class="row">
                                    <div class="col-12 mg-top-30">
                                        <!-- Product Card -->
                                        <div class="crancy-product-card">
                                            <div class="create_new_btn_inline_box">
                                                <h4 class="crancy-product-card__title"><?php echo e(__('translate.Edit Language')); ?></h4>

                                                <a href="<?php echo e(route('admin.language.index')); ?>" class="crancy-btn "><i class="fa fa-list"></i> <?php echo e(__('translate.Language List')); ?></a>
                                            </div>


                                            <div class="row mg-top-30">

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label"><?php echo e(__('translate.Language Name')); ?> </label>
                                                        <input class="crancy__item-input" type="text" name="lang_name" value="<?php echo e($language->lang_name); ?>">
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label"><?php echo e(__('translate.Language Code')); ?> </label>
                                                        <input class="crancy__item-input" type="text" name="lang_code" value="<?php echo e($language->lang_code); ?>" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label"><?php echo e(__('translate.Direction')); ?> </label>
                                                        <select class="form-select crancy__item-input" name="lang_direction">
                                                            <option <?php echo e($language->lang_direction == 'left_to_right' ? 'selected':''); ?> value="left_to_right"><?php echo e(__('translate.Left to Right')); ?></option>
                                                            <option <?php echo e($language->lang_direction == 'right_to_left' ? 'selected':''); ?> value="right_to_left"><?php echo e(__('translate.Right to left')); ?></option>

                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label"><?php echo e(__('translate.Make a default')); ?> </label>
                                                        <div class="crancy-ptabs__notify-switch  crancy-ptabs__notify-switch--two">
                                                            <label class="crancy__item-switch">
                                                            <input <?php echo e($language->is_default == 'Yes' ? 'checked':''); ?> name="is_default" type="checkbox" >
                                                            <span class="crancy__item-switch--slide crancy__item-switch--round"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label"><?php echo e(__('translate.Visibility Status')); ?> </label>
                                                        <div class="crancy-ptabs__notify-switch  crancy-ptabs__notify-switch--two">
                                                            <label class="crancy__item-switch">
                                                            <input <?php echo e($language->status == 1 ? 'checked':''); ?> name="status" type="checkbox" >
                                                            <span class="crancy__item-switch--slide crancy__item-switch--round"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

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

<?php echo $__env->make('admin.master_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\archive\archive\Modules/Language\Resources/views/edit.blade.php ENDPATH**/ ?>