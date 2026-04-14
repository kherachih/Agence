<?php $__env->startSection('title'); ?>
    <title><?php echo e(__('translate.Email Configuration')); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body-header'); ?>
    <h3 class="crancy-header__title m-0"><?php echo e(__('translate.Email Configuration')); ?></h3>
    <p class="crancy-header__text"><?php echo e(__('translate.Dashboard')); ?> >> <?php echo e(__('translate.Email Configuration')); ?></p>
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
                            <form action="<?php echo e(route('admin.update-email-setting')); ?>" enctype="multipart/form-data" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <div class="row">
                                    <div class="col-12 mg-top-30">
                                        <!-- Product Card -->
                                        <div class="crancy-product-card">
                                            <h4 class="crancy-product-card__title"><?php echo e(__('translate.Email Configuration')); ?></h4>

                                            <div class="row">

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label"><?php echo e(__('translate.Sender Name')); ?> </label>
                                                        <input class="crancy__item-input" type="text" name="sender_name" value="<?php echo e($email_setting->sender_name); ?>">
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label"><?php echo e(__('translate.Mail Host')); ?> </label>
                                                        <input class="crancy__item-input" type="text" name="mail_host" value="<?php echo e($email_setting->mail_host); ?>">
                                                    </div>
                                                </div>



                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label"><?php echo e(__('translate.Email')); ?> </label>
                                                        <input class="crancy__item-input" type="text" name="email" value="<?php echo e($email_setting->email); ?>">
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label"><?php echo e(__('translate.SMTP User Name')); ?> </label>
                                                        <input class="crancy__item-input" type="text" name="smtp_username" value="<?php echo e($email_setting->smtp_username); ?>">
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label"><?php echo e(__('translate.SMTP Password')); ?> </label>
                                                        <input class="crancy__item-input" type="text" name="smtp_password" value="<?php echo e($email_setting->smtp_password); ?>">
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label"><?php echo e(__('translate.Mail Port')); ?> </label>
                                                        <input class="crancy__item-input" type="text" name="mail_port" value="<?php echo e($email_setting->mail_port); ?>">
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label"><?php echo e(__('translate.Mail Port')); ?> </label>
                                                        <select class="form-select crancy__item-input" name="mail_encryption">
                                                            <option <?php echo e($email_setting->mail_encryption == 'tls' ? 'selected' : ''); ?> value="tls"><?php echo e(__('translate.TLS')); ?></option>

                                                            <option <?php echo e($email_setting->mail_encryption == 'ssl' ? 'selected' : ''); ?> value="ssl"><?php echo e(__('translate.SSL')); ?></option>

                                                        </select>
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

<?php echo $__env->make('admin.master_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\archive\archive\Modules/EmailSetting\resources/views/email_configuration.blade.php ENDPATH**/ ?>