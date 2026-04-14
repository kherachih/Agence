<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['name', 'label', 'value' => null, 'placeholder' => null, 'required' => false, 'help' => null]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['name', 'label', 'value' => null, 'placeholder' => null, 'required' => false, 'help' => null]); ?>
<?php foreach (array_filter((['name', 'label', 'value' => null, 'placeholder' => null, 'required' => false, 'help' => null]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div class="crancy__item-form--group">
    <label for="<?php echo e($name); ?>" class="crancy__item-label">
        <?php echo e($label); ?>

        <?php if($required): ?> <span class="text-danger">*</span> <?php endif; ?>
        <?php if($help): ?>
            <span data-toggle="tooltip" data-placement="top" class="fa fa-info-circle text--primary" title="<?php echo e($help); ?>"></span>
        <?php endif; ?>
    </label>
    
    <input 
        type="text"
        id="<?php echo e($name); ?>"
        name="<?php echo e($name); ?>"
        class="crancy__item-input <?php $__errorArgs = [$name];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
        value="<?php echo e(old($name, $value)); ?>"
        placeholder="<?php echo e($placeholder ?? $label); ?>"
        <?php if($required): ?> required <?php endif; ?>
    >
    
    <?php $__errorArgs = [$name];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="invalid-feedback"><?php echo e($message); ?></div>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div> <?php /**PATH D:\xampp\htdocs\archive\archive\resources\views/admin/frontend-management/fields/text.blade.php ENDPATH**/ ?>