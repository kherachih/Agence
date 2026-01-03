<input type="hidden" name="customer_name" class="form_customer_name" value="<?php echo e(auth()->user()->name ?? ''); ?>">
<input type="hidden" name="customer_email" class="form_customer_email" value="<?php echo e(auth()->user()->email ?? ''); ?>">
<input type="hidden" name="customer_phone" class="form_customer_phone" value="<?php echo e(auth()->user()->phone ?? ''); ?>">
<input type="hidden" name="customer_address" class="form_customer_address" value="<?php echo e(auth()->user()->address ?? ''); ?>">
<?php /**PATH D:\xampp\htdocs\archive\archive\Modules/TourBooking\resources/views/front/bookings/customer-info.blade.php ENDPATH**/ ?>