<?php $__env->startSection('title'); ?>
    <title><?php echo e(__('translate.Footer Information')); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body-header'); ?>
    <h3 class="crancy-header__title m-0"><?php echo e(__('translate.Footer Information')); ?></h3>
    <p class="crancy-header__text"><?php echo e(__('translate.Manage Content')); ?> >> <?php echo e(__('translate.Footer Information')); ?></p>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body-content'); ?>

    <!-- crancy Dashboard -->
    <section class="crancy-adashboard crancy-show language_box">
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
                                            <div class="crancy-customer-filter__single crancy-customer-filter__single--csearch">
                                                <div class="crancy-header__form crancy-header__form--customer">
                                                    <h4 class="crancy-product-card__title"><?php echo e(__('translate.Switch to language translation')); ?></h4>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="translation_box">
                                            <ul >
                                                <?php $__currentLoopData = $language_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li><a href="<?php echo e(route('admin.footer', ['lang_code' => $language->lang_code] )); ?>">
                                                    <?php if(request()->get('lang_code') == $language->lang_code): ?>
                                                        <i class="fas fa-eye"></i>
                                                    <?php else: ?>
                                                        <i class="fas fa-edit"></i>
                                                    <?php endif; ?>

                                                    <?php echo e($language->lang_name); ?></a></li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>

                                            <div class="alert alert-secondary" role="alert">

                                                <?php
                                                    $edited_language = $language_list->where('lang_code', request()->get('lang_code'))->first();
                                                ?>

                                            <p><?php echo e(__('translate.Your editing mode')); ?> : <b><?php echo e($edited_language->lang_name); ?></b></p>
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

    <!-- crancy Dashboard -->
    <section class="crancy-adashboard crancy-show">
        <div class="container container__bscreen">
            <div class="row">
                <div class="col-12">
                    <div class="crancy-body">
                        <!-- Dashboard Inner -->
                        <div class="crancy-dsinner">
                            <form action="<?php echo e(route('admin.update-footer')); ?>" method="POST">
                                <?php echo csrf_field(); ?>

                                <?php echo method_field('PUT'); ?>

                                <input type="hidden" name="lang_code" value="<?php echo e(request()->get('lang_code')); ?>">
                                <input type="hidden" name="translate_id" value="<?php echo e($translate->id); ?>">

                                <div class="row">
                                    <div class="col-12 mg-top-30">
                                        <!-- Product Card -->
                                        <div class="crancy-product-card">
                                            <h4 class="crancy-product-card__title"><?php echo e(__('translate.Footer Information')); ?></h4>

                                            <div class="row">


                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label"><?php echo e(__('translate.About us')); ?> </label>
                                                        <textarea class="crancy__item-input crancy__item-textarea" name="about_us" id="" cols="30" rows="5"><?php echo e($translate->about_us); ?></textarea>
                                                    </div>
                                                </div>

                                                <?php if(admin_lang() == request()->get('lang_code')): ?>


                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label"><?php echo e(__('translate.Phone')); ?> </label>
                                                        <input class="crancy__item-input" type="text" name="phone" value="<?php echo e($footer->phone); ?>">
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label"><?php echo e(__('translate.Email')); ?> </label>
                                                        <input class="crancy__item-input" type="email" name="email" value="<?php echo e($footer->email); ?>">
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label"><?php echo e(__('translate.Address')); ?> </label>
                                                        <input class="crancy__item-input" type="text" name="address" value="<?php echo e($footer->address); ?>">
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label"><?php echo e(__('translate.Address URL')); ?> </label>
                                                        <input class="crancy__item-input" type="text" name="address_url" value="<?php echo e($footer->address_url); ?>">
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label"><?php echo e(__('translate.Working Days')); ?> </label>
                                                        <textarea class="crancy__item-input crancy__item-textarea" name="working_days" id="" cols="30" rows="5"><?php echo e($footer->working_days); ?></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label"><?php echo e(__('translate.Play store link')); ?> </label>
                                                        <input class="crancy__item-input" type="text" name="playstore" value="<?php echo e($footer->playstore); ?>">
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label"><?php echo e(__('translate.App store link')); ?> </label>
                                                        <input class="crancy__item-input" type="text" name="appstore" value="<?php echo e($footer->appstore); ?>">
                                                    </div>
                                                </div>



                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label"><?php echo e(__('translate.Copyright')); ?> </label>
                                                        <input class="crancy__item-input" type="text" name="copyright" value="<?php echo e($footer->copyright); ?>">
                                                    </div>
                                                </div>

                                                <?php endif; ?>


                                            </div>

                                            <?php if(admin_lang() == request()->get('lang_code')): ?>
                                            <h4 class="crancy-product-card__title mg-top-30"><?php echo e(__('translate.Social Media')); ?></h4>

                                            <div class="row">

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label"><?php echo e(__('translate.Facebook')); ?> </label>
                                                        <input class="crancy__item-input" type="text" name="facebook" value="<?php echo e($footer->facebook); ?>">
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label"><?php echo e(__('translate.Twitter')); ?> </label>
                                                        <input class="crancy__item-input" type="text" name="twitter" value="<?php echo e($footer->twitter); ?>">
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label"><?php echo e(__('translate.Linkedin')); ?> </label>
                                                        <input class="crancy__item-input" type="text" name="linkedin" value="<?php echo e($footer->linkedin); ?>">
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label"><?php echo e(__('translate.Instagram')); ?> </label>
                                                        <input class="crancy__item-input" type="text" name="instagram" value="<?php echo e($footer->instagram); ?>">
                                                    </div>
                                                </div>

                                            </div>

                                            <?php endif; ?>

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


<?php echo $__env->make('admin.master_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\archive\archive\Modules/Page\Resources/views/section/footer.blade.php ENDPATH**/ ?>