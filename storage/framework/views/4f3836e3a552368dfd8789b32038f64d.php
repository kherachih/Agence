<input type="hidden" name="customer_name" class="form_customer_name" value="<?php echo e(auth()->user()->name ?? ''); ?>">
<input type="hidden" name="customer_email" class="form_customer_email" value="<?php echo e(auth()->user()->email ?? ''); ?>">
<input type="hidden" name="customer_phone" class="form_customer_phone" value="<?php echo e(auth()->user()->phone ?? ''); ?>">
<input type="hidden" name="customer_address" class="form_customer_address" value="<?php echo e(auth()->user()->address ?? ''); ?>">
<input type="hidden" name="total" class="form_total" value="<?php echo e($data['total']); ?>">
<input type="hidden" name="room_type_id" class="form_room_type_id" value="<?php echo e(old('room_type_id') ?? ''); ?>"><?php /**PATH D:\xampp\htdocs\archive\archive\Modules/TourBooking\resources/views/front/bookings/customer-info.blade.php ENDPATH**/ ?>