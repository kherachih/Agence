<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['name', 'label', 'value' => null, 'required' => false, 'help' => null, 'options' => []]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['name', 'label', 'value' => null, 'required' => false, 'help' => null, 'options' => []]); ?>
<?php foreach (array_filter((['name', 'label', 'value' => null, 'required' => false, 'help' => null, 'options' => []]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div class="crancy__item-form--group mb-4">
    <label for="<?php echo e($name); ?>" class="crancy__item-label">
        <?php echo e($label); ?>

        <?php if($required): ?>
            <span class="text-danger">*</span>
        <?php endif; ?>
        <?php if($help): ?>
            <span data-toggle="tooltip" data-placement="top" class="fa fa-info-circle text--primary"
                title="<?php echo e($help); ?>"></span>
        <?php endif; ?>
    </label>

    <div class="crancy-product-card__upload crancy-product-card__upload--border">
        <input type="file" id="<?php echo e($name); ?>" name="<?php echo e($name); ?>"
            class="custom-file-input d-none <?php $__errorArgs = [$name];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
            accept="image/jpeg,image/png,image/gif,image/webp" onchange="previewImage(event, '<?php echo e($name); ?>')"
            <?php echo e($required && !$value ? 'required' : ''); ?>>

        <label class="crancy-image-video-upload__label" for="<?php echo e($name); ?>">
            <img id="view_img_<?php echo e($name); ?>"
                src="<?php echo e($value ? asset($value) : asset('backend/img/placeholder-image.jpg')); ?>"
                alt="<?php echo e($label); ?>">
            <h4 class="crancy-image-video-upload__title">
                <?php echo e(__('translate.Click here to')); ?>

                <span class="crancy-primary-color"><?php echo e(__('translate.Choose File')); ?></span>
                <?php echo e(__('translate.and upload')); ?>

            </h4>
        </label>

        <?php if($value): ?>
            <input type="hidden" name="<?php echo e($name); ?>_existing" value="<?php echo e($value); ?>">
            <div class="d-flex justify-content-end mt-2">
                <button type="button" class="btn btn-sm btn-danger" onclick="resetImage('<?php echo e($name); ?>')">
                    <i class="fas fa-times"></i> <?php echo e(__('translate.Remove')); ?>

                </button>
            </div>
        <?php endif; ?>
    </div>

    <?php if(isset($options['dimensions']) || isset($options['size'])): ?>
        <small class="form-text text-muted">
            <?php echo e(__('translate.Recommended image size')); ?>:
            <?php if(isset($options['size'])): ?>
                <?php echo e($options['size']); ?>

            <?php elseif(isset($options['dimensions'])): ?>
                <?php $__currentLoopData = config('frontend-fields.image_sizes'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $size => [$width, $height]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <br><?php echo e(ucfirst($size)); ?>: <?php echo e($width); ?>x<?php echo e($height); ?>px
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </small>
    <?php endif; ?>

    <?php $__errorArgs = [$name];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>


<style>
    .crancy-product-card__upload {
        border: 2px dashed var(--tg-border-1);
        border-radius: 8px;
        padding: 20px;
        text-align: center;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .crancy-product-card__upload:hover {
        border-color: var(--tg-primary);
    }

    .crancy-product-card__upload img {
        max-width: 100%;
        max-height: 200px;
        margin-bottom: 15px;
        border-radius: 4px;
        object-fit: contain;
    }

    .crancy-image-video-upload__title {
        font-size: 14px;
        margin: 0;
        color: var(--tg-text-color);
    }

    .crancy-product-card__upload.is-invalid {
        border-color: var(--tg-error);
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add drag and drop support
        document.querySelectorAll('.crancy-product-card__upload').forEach(function(dropZone) {
            dropZone.addEventListener('dragover', function(e) {
                e.preventDefault();
                this.classList.add('border-primary');
            });

            dropZone.addEventListener('dragleave', function(e) {
                e.preventDefault();
                this.classList.remove('border-primary');
            });

            dropZone.addEventListener('drop', function(e) {
                e.preventDefault();
                this.classList.remove('border-primary');

                const input = this.querySelector('input[type="file"]');
                const files = e.dataTransfer.files;

                if (files.length > 0 && files[0].type.startsWith('image/')) {
                    input.files = files;
                    const event = new Event('change', {
                        bubbles: true
                    });
                    input.dispatchEvent(event);
                }
            });
        });
    });

    function previewImage(event, target_view_id) {
        if (!event || !event.target || !event.target.files || !event.target.files[0]) {
            return;
        }

        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById(`view_img_${target_view_id}`);
            if (output) {
                output.src = reader.result;
            }
        }
        reader.readAsDataURL(event.target.files[0]);

        // If we have a hidden input for existing image, mark it for deletion
        const existingInput = document.querySelector(`input[name="${target_view_id}_existing"]`);
        if (existingInput) {
            existingInput.value = '';
        }
    }

    function resetImage(target_view_id) {
        // Clear the file input
        const input = document.getElementById(target_view_id);
        if (input) {
            input.value = '';
        }

        // Reset the preview image to placeholder
        const output = document.getElementById(`view_img_${target_view_id}`);
        if (output) {
            output.src = '<?php echo e(asset('backend/img/placeholder-image.jpg')); ?>';
        }

        // Mark existing image for deletion
        const existingInput = document.querySelector(`input[name="${target_view_id}_existing"]`);
        if (existingInput) {
            existingInput.value = '';
        }
    }
</script>
<?php /**PATH D:\xampp\htdocs\archive\archive\resources\views/admin/frontend-management/fields/image.blade.php ENDPATH**/ ?>