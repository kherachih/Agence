<?php $__env->startSection('title'); ?>
    <title><?php echo e($title); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body-header'); ?>
    <h3 class="crancy-header__title m-0"><?php echo e($title); ?></h3>
    <p class="crancy-header__text"><?php echo e(__('translate.Manage Admin')); ?> >> <?php echo e($title); ?></p>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body-content'); ?>
    <section class="crancy-adashboard crancy-show">
        <div class="container container__bscreen">
            <div class="row">
                <div class="col-12">
                    <div class="crancy-body">
                        <div class="crancy-dsinner">
                            <form action="<?php echo e(route('admin.admin-management.store')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-12 mg-top-30">
                                        <div class="crancy-product-card">
                                            <div class="create_new_btn_inline_box">
                                                <h4 class="crancy-product-card__title"><?php echo e(__('translate.Admin Information')); ?></h4>
                                                <a href="<?php echo e(route('admin.admin-management.index')); ?>" class="crancy-btn"><i class="fa fa-list"></i> <?php echo e(__('translate.Admin List')); ?></a>
                                            </div>

                                            <div class="row mg-top-30">
                                                <div class="col-lg-6 col-md-6 col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label"><?php echo e(__('translate.Name')); ?> *</label>
                                                        <input class="crancy__item-input" type="text" name="name" value="<?php echo e(old('name')); ?>" required>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6 col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label"><?php echo e(__('translate.Email')); ?> *</label>
                                                        <input class="crancy__item-input" type="email" name="email" value="<?php echo e(old('email')); ?>" required>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6 col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label"><?php echo e(__('translate.Password')); ?> *</label>
                                                        <input class="crancy__item-input" type="password" name="password" required>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6 col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label"><?php echo e(__('translate.Confirm Password')); ?> *</label>
                                                        <input class="crancy__item-input" type="password" name="password_confirmation" required>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6 col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label"><?php echo e(__('translate.Role')); ?> *</label>
                                                        <select class="crancy__item-input" name="admin_type" required>
                                                            <option value="super_admin" <?php echo e(old('admin_type') == 'super_admin' ? 'selected' : ''); ?>><?php echo e(__('translate.Super Admin')); ?></option>
                                                            <option value="marketing" <?php echo e(old('admin_type') == 'marketing' ? 'selected' : ''); ?>><?php echo e(__('translate.Marketing')); ?></option>
                                                            <option value="admin" <?php echo e(old('admin_type') == 'admin' ? 'selected' : ''); ?>><?php echo e(__('translate.Admin')); ?></option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6 col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label"><?php echo e(__('translate.Status')); ?> *</label>
                                                        <select class="crancy__item-input" name="status" required>
                                                            <option value="enable" <?php echo e(old('status') == 'enable' ? 'selected' : ''); ?>><?php echo e(__('translate.Active')); ?></option>
                                                            <option value="disable" <?php echo e(old('status') == 'disable' ? 'selected' : ''); ?>><?php echo e(__('translate.Inactive')); ?></option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mg-top-30">
                                                <div class="col-12">
                                                    <button class="crancy-btn" type="submit"><?php echo e(__('translate.Save')); ?></button>
                                                </div>
                                            </div>
                                        </div>
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

<?php echo $__env->make('admin.master_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\archive\archive\resources\views/admin/admin_management/create.blade.php ENDPATH**/ ?>