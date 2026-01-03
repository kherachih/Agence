<?php $__env->startSection('title'); ?>
    <title><?php echo e(__('translate.Sign Up')); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('front-content'); ?>
    <?php echo $__env->make('breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- login-area-start -->
    <div class="tg-login-area pt-130 pb-130">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8 col-md-10">
                    <div class="tg-login-wrapper">
                        <div class="tg-login-top text-center mb-30">
                            <h2><?php echo e(__('translate.Register Now!')); ?></h2>
                            <p><?php echo e(__('translate.You can signup with you social account below')); ?></p>
                        </div>
                        <div class="tg-login-form">
                            <div class="tg-tour-about-review-form">
                                <form method="POST" action="<?php echo e(route('user.store-register')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <div class="row">
                                        <div class="col-lg-12 mb-25">
                                            <input class="input" name="name" type="text"
                                                placeholder="<?php echo e(__('translate.Name')); ?>" value="<?php echo e(old('name')); ?>">
                                        </div>
                                        <div class="col-lg-12 mb-25">
                                            <input class="input" type="email" placeholder="<?php echo e(__('translate.Email')); ?> *"
                                                name="email" value="<?php echo e(old('email')); ?>">
                                        </div>
                                        <div class="col-lg-12 mb-25">
                                            <input class="input" type="password"
                                                placeholder="<?php echo e(__('translate.Password')); ?> *" name="password">
                                        </div>
                                        <div class="col-lg-12 mb-25">
                                            <input class="input" type="password"
                                                placeholder="<?php echo e(__('translate.Confirm Password')); ?> *"
                                                name="password_confirmation">
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="review-checkbox d-flex align-items-center mb-25">
                                                    <input class="tg-checkbox" type="checkbox" id="australia">
                                                    <label for="australia"
                                                        class="tg-label"><?php echo e(__('translate.Remember me')); ?></label>
                                                </div>
                                                <div class="tg-login-navigate mb-25">
                                                    <a href="<?php echo e(route('user.login')); ?>"><?php echo e(__('translate.Login')); ?></a>
                                                </div>
                                            </div>

                                            <?php if($general_setting->recaptcha_status == 1): ?>
                                                <div class="td_mb_10">
                                                    <div class="g-recaptcha"
                                                        data-sitekey="<?php echo e($general_setting->recaptcha_site_key); ?>"></div>
                                                </div>
                                            <?php endif; ?>

                                            <button type="submit"
                                                class="tg-btn w-100"><?php echo e(__('translate.Sign Up')); ?></button>

                                            <div class="d-flex gap-3 justify-content-center align-items-center mt-4">
                                                <div class="edc-line-sperator"></div>
                                                <p class="td_fs_20 mb-0 td_medium td_heading_color">
                                                    <?php echo e(__('translate.or sign up with')); ?></p>
                                                <div class="edc-line-sperator"></div>
                                            </div>

                                            <div class="mt-20 gap-4 d-flex justify-content-center">

                                                <?php if($general_setting->is_gmail == 1): ?>
                                                    <a href="<?php echo e(route('user.login-google')); ?>" class="td_center">
                                                        <i class="fa-brands fa-google"></i>
                                                    </a>
                                                <?php endif; ?>

                                                <?php if($general_setting->is_facebook == 1): ?>
                                                    <a href="<?php echo e(route('user.login-facebook')); ?>" class="td_center">
                                                        <i class="fa-brands fa-facebook-f"></i>
                                                    </a>
                                                <?php endif; ?>

                                            </div>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- login-area-end -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js_section'); ?>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layout_inner_page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\archive\archive\resources\views/auth/register.blade.php ENDPATH**/ ?>