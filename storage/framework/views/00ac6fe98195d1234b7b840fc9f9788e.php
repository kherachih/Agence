
<?php $__env->startSection('title'); ?>
<title><?php echo e(__('translate.Edit Promotion')); ?></title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body-header'); ?>
<h3 class="crancy-header__title m-0"><?php echo e(__('translate.Edit Promotion')); ?></h3>
<p class="crancy-header__text"><?php echo e(__('translate.Manage Content')); ?> >> <?php echo e(__('translate.Promotions')); ?> >> <?php echo e(__('translate.Edit')); ?></p>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body-content'); ?>

<section class="crancy-adashboard crancy-show">
    <div class="container container__bscreen">
        <div class="row">
            <div class="col-12">
                <div class="crancy-body">
                    <div class="crancy-dsinner">
                        <div class="crancy-table crancy-table--v3 mg-top-30">
                            <form action="<?php echo e(route('admin.promotion.update', $promotion->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="crancy-table__inner">
                                            <h4 class="crancy-product-card__title mb-4"><?php echo e(__('translate.Promotion Details')); ?></h4>

                                            <!-- Title -->
                                            <div class="crancy-form__box mb-3">
                                                <label class="crancy-form__label"><?php echo e(__('translate.Title')); ?> <span class="text-danger">*</span></label>
                                                <div class="crancy-form__input">
                                                    <input type="text" name="title" class="crancy-form__control" value="<?php echo e(old('title', $promotion->title)); ?>" placeholder="<?php echo e(__('translate.e.g. Summer Sale')); ?>" required>
                                                </div>
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

                                            <!-- Message -->
                                            <div class="crancy-form__box mb-3">
                                                <label class="crancy-form__label"><?php echo e(__('translate.Message')); ?> <span class="text-danger">*</span></label>
                                                <div class="crancy-form__input">
                                                    <textarea name="message" class="crancy-form__control" rows="3" placeholder="<?php echo e(__('translate.Enter the promotional message that will scroll across the bar')); ?>" required><?php echo e(old('message', $promotion->message)); ?></textarea>
                                                </div>
                                                <?php $__errorArgs = ['message'];
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

                                            <!-- Link URL -->
                                            <div class="crancy-form__box mb-3">
                                                <label class="crancy-form__label"><?php echo e(__('translate.Link URL')); ?></label>
                                                <div class="crancy-form__input">
                                                    <input type="url" name="link_url" class="crancy-form__control" value="<?php echo e(old('link_url', $promotion->link_url)); ?>" placeholder="<?php echo e(__('translate.e.g. https://example.com/promotion')); ?>">
                                                    <small class="text-muted"><?php echo e(__('translate.URL to redirect when the promotion bar is clicked (optional)')); ?></small>
                                                </div>
                                                <?php $__errorArgs = ['link_url'];
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

                                            <!-- Link Text -->
                                            <div class="crancy-form__box mb-3">
                                                <label class="crancy-form__label"><?php echo e(__('translate.Link Text')); ?></label>
                                                <div class="crancy-form__input">
                                                    <input type="text" name="link_text" class="crancy-form__control" value="<?php echo e(old('link_text', $promotion->link_text)); ?>" placeholder="<?php echo e(__('translate.e.g. Shop Now')); ?>">
                                                    <small class="text-muted"><?php echo e(__('translate.Text to display as a call-to-action button (optional)')); ?></small>
                                                </div>
                                                <?php $__errorArgs = ['link_text'];
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

                                    <div class="col-lg-4">
                                        <div class="crancy-table__inner">
                                            <h4 class="crancy-product-card__title mb-4"><?php echo e(__('translate.Settings')); ?></h4>

                                            <!-- Background Color -->
                                            <div class="crancy-form__box mb-3">
                                                <label class="crancy-form__label"><?php echo e(__('translate.Background Color')); ?></label>
                                                <div class="crancy-form__input d-flex align-items-center gap-2">
                                                    <input type="color" name="background_color" class="form-control form-control-color" value="<?php echo e(old('background_color', $promotion->background_color)); ?>" style="width: 50px; height: 40px;">
                                                    <span class="text-muted"><?php echo e(__('translate.Bar background color')); ?></span>
                                                </div>
                                                <?php $__errorArgs = ['background_color'];
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

                                            <!-- Text Color -->
                                            <div class="crancy-form__box mb-3">
                                                <label class="crancy-form__label"><?php echo e(__('translate.Text Color')); ?></label>
                                                <div class="crancy-form__input d-flex align-items-center gap-2">
                                                    <input type="color" name="text_color" class="form-control form-control-color" value="<?php echo e(old('text_color', $promotion->text_color)); ?>" style="width: 50px; height: 40px;">
                                                    <span class="text-muted"><?php echo e(__('translate.Text color')); ?></span>
                                                </div>
                                                <?php $__errorArgs = ['text_color'];
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

                                            <!-- Sort Order -->
                                            <div class="crancy-form__box mb-3">
                                                <label class="crancy-form__label"><?php echo e(__('translate.Sort Order')); ?></label>
                                                <div class="crancy-form__input">
                                                    <input type="number" name="sort_order" class="crancy-form__control" value="<?php echo e(old('sort_order', $promotion->sort_order)); ?>" placeholder="0">
                                                    <small class="text-muted"><?php echo e(__('translate.Lower numbers appear first')); ?></small>
                                                </div>
                                                <?php $__errorArgs = ['sort_order'];
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

                                            <!-- Is Active -->
                                            <div class="crancy-form__box mb-3">
                                                <div class="crancy-form__checkbox">
                                                    <input type="checkbox" name="is_active" id="is_active" value="1" <?php echo e(old('is_active', $promotion->is_active) ? 'checked' : ''); ?>>
                                                    <label for="is_active"><?php echo e(__('translate.Active')); ?></label>
                                                    <p class="text-muted"><?php echo e(__('translate.Enable to show this promotion on the frontend')); ?></p>
                                                </div>
                                            </div>

                                            <!-- Starts At -->
                                            <div class="crancy-form__box mb-3">
                                                <label class="crancy-form__label"><?php echo e(__('translate.Start Date')); ?></label>
                                                <div class="crancy-form__input">
                                                    <input type="date" name="starts_at" class="crancy-form__control" value="<?php echo e(old('starts_at', $promotion->starts_at?->format('Y-m-d'))); ?>">
                                                    <small class="text-muted"><?php echo e(__('translate.Leave empty for immediate start')); ?></small>
                                                </div>
                                                <?php $__errorArgs = ['starts_at'];
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

                                            <!-- Ends At -->
                                            <div class="crancy-form__box mb-3">
                                                <label class="crancy-form__label"><?php echo e(__('translate.End Date')); ?></label>
                                                <div class="crancy-form__input">
                                                    <input type="date" name="ends_at" class="crancy-form__control" value="<?php echo e(old('ends_at', $promotion->ends_at?->format('Y-m-d'))); ?>">
                                                    <small class="text-muted"><?php echo e(__('translate.Leave empty for no end date')); ?></small>
                                                </div>
                                                <?php $__errorArgs = ['ends_at'];
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

                                            <!-- Submit Button -->
                                            <div class="crancy-form__box mt-4">
                                                <button type="submit" class="crancy-btn crancy-btn__success w-100">
                                                    <i class="fas fa-save"></i> <?php echo e(__('translate.Update Promotion')); ?>

                                                </button>
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
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\archive\archive\resources\views/admin/promotion/edit.blade.php ENDPATH**/ ?>