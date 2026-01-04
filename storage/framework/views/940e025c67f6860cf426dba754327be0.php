<?php $__env->startSection('title'); ?>
    <title><?php echo e(__('translate.Edit currency')); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body-header'); ?>
    <h3 class="crancy-header__title m-0"><?php echo e(__('translate.Edit currency')); ?></h3>
    <p class="crancy-header__text"><?php echo e(__('translate.Manage Currency')); ?> >> <?php echo e(__('translate.Edit currency')); ?></p>
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
                            <form action="<?php echo e(route('admin.multi-currency.update', $currency->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>

                                <div class="row">
                                    <div class="col-12 mg-top-30">
                                        <!-- Product Card -->
                                        <div class="crancy-product-card">
                                            <div class="create_new_btn_inline_box">
                                                <h4 class="crancy-product-card__title"><?php echo e(__('translate.Edit currency')); ?></h4>

                                                <a href="<?php echo e(route('admin.multi-currency.index')); ?>" class="crancy-btn "><i class="fa fa-list"></i> <?php echo e(__('translate.Currency List')); ?></a>
                                            </div>


                                            <div class="row mg-top-30">

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label"><?php echo e(__('translate.Currency Name')); ?> * </label>
                                                        <input class="crancy__item-input" type="text" name="currency_name" value="<?php echo e($currency->currency_name); ?>">
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label"><?php echo e(__('translate.Currency Code')); ?> * </label>
                                                        <input class="crancy__item-input" type="text" name="currency_code" value="<?php echo e($currency->currency_code); ?>">
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label"><?php echo e(__('translate.Country Code')); ?> * </label>
                                                        <input class="crancy__item-input" type="text" name="country_code" value="<?php echo e($currency->country_code); ?>">
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label"><?php echo e(__('translate.Currency Icon')); ?> * </label>
                                                        <input class="crancy__item-input" type="text" name="currency_icon" value="<?php echo e($currency->currency_icon); ?>">
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label"><?php echo e(__('translate.Currency Rate(per USD)')); ?> * </label>
                                                        <input class="crancy__item-input" type="text" name="currency_rate" value="<?php echo e($currency->currency_rate); ?>">
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label"><?php echo e(__('translate.Currency Position')); ?> </label>
                                                        <select class="form-select crancy__item-input" name="currency_position">
                                                            <option <?php echo e($currency->currency_position == 'before_price' ? 'selected':''); ?> value="before_price"><?php echo e(__('translate.Before Price')); ?></option>
                                                            <option <?php echo e($currency->currency_position == 'before_price_with_space' ? 'selected':''); ?> value="before_price_with_space"><?php echo e(__('translate.Before Price With Space')); ?></option>
                                                            <option <?php echo e($currency->currency_position == 'after_price' ? 'selected':''); ?> value="after_price"><?php echo e(__('translate.After Price')); ?></option>
                                                            <option <?php echo e($currency->currency_position == 'after_price_with_space' ? 'selected':''); ?> value="after_price_with_space"><?php echo e(__('translate.After Price With Space')); ?></option>

                                                        </select>
                                                    </div>
                                                </div>



                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label"><?php echo e(__('translate.Make a default')); ?> </label>
                                                        <div class="crancy-ptabs__notify-switch  crancy-ptabs__notify-switch--two">
                                                            <label class="crancy__item-switch">
                                                            <input <?php echo e($currency->is_default == 'yes' ? 'checked':''); ?> name="is_default" type="checkbox" >
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
                                                            <input <?php echo e($currency->status == 'active' ? 'checked':''); ?> name="status" type="checkbox" >
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


<?php echo $__env->make('admin.master_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\archive\archive\Modules/Currency\resources/views/edit.blade.php ENDPATH**/ ?>