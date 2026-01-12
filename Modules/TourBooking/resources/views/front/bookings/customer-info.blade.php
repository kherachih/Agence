<input type="hidden" name="customer_name" class="form_customer_name" value="{{ auth()->user()->name ?? '' }}">
<input type="hidden" name="customer_email" class="form_customer_email" value="{{ auth()->user()->email ?? '' }}">
<input type="hidden" name="customer_phone" class="form_customer_phone" value="{{ auth()->user()->phone ?? '' }}">
<input type="hidden" name="customer_address" class="form_customer_address" value="{{ auth()->user()->address ?? '' }}">
<input type="hidden" name="total" class="form_total" value="{{ $data['total'] }}">
<input type="hidden" name="room_type_id" class="form_room_type_id" value="{{ old('room_type_id') ?? '' }}">