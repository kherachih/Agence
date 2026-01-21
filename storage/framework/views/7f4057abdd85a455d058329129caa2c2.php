<?php $__env->startSection('title'); ?>
    <title><?php echo e(__('translate.Booking Checkout')); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('front-content'); ?>
    <?php echo $__env->make('breadcrumb', ['breadcrumb_title' => __('translate.Booking Checkout')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- checkout area -->
    <section class="checkout-area pb-100 pt-125">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="tg-checkout-form-wrapper mr-50">
                        <h2 class="tg-checkout-form-title mb-30"><?php echo e(__('translate.Billing Details')); ?></h2>
                        <div class="row gx-24">
                            <div class="tg-checkout-form-input mb-25">
                                <label><?php echo e(__('translate.Customer name')); ?></label>
                                <input id="customer_name" class="input" type="text"
                                    value="<?php echo e(auth()->user()->name ?? ''); ?>" name="customer_name"
                                    placeholder="Customer name">
                            </div>
 
                            <div class="tg-checkout-form-input mb-25">
                                <label><?php echo e(__('translate.Customer email')); ?></label>
                                <input id="customer_email" class="input" type="email"
                                    value="<?php echo e(auth()->user()->email ?? ''); ?>" name="customer_email"
                                    placeholder="Customer email">
                            </div>
 
                            <div class="tg-checkout-form-input mb-25">
                                <label><?php echo e(__('translate.Customer phone')); ?></label>
                                <input id="customer_phone" class="input" type="text"
                                    value="<?php echo e(auth()->user()->phone ?? ''); ?>" name="customer_phone"
                                    placeholder="Customer phone">
                            </div>
                            <div class="tg-checkout-form-input mb-25">
                                <label><?php echo e(__('translate.Customer address')); ?></label>
                                <input id="customer_address" class="input" value="<?php echo e(auth()->user()->address ?? ''); ?>"
                                    class="house-number" name="customer_address" type="text"
                                    placeholder="<?php echo e(__('translate.House number and Street name')); ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="tg-blog-sidebar top-sticky mb-30">
                        <div class="tg-blog-sidebar-box mb-30">
                            <h2 class="tg-checkout-form-title tg-checkout-form-title-3 mb-15">Your Order</h2>
                            <div class="tg-tour-about-border-doted mb-15"></div>
                            <div>
                                <div>
                                    <?php if(isset($data['availabilityPeriod']) && $data['availabilityPeriod']): ?>
                                        <div class="tg-tour-about-tickets-wrap mb-15">
                                            <div class="tg-tour-about-tickets mb-10">
                                                <div class="tg-tour-about-tickets-adult">
                                                    <div class="tg-tour-about-sidebar-title">Selected Period</div>
                                                </div>
                                                <div class="tg-tour-about-tickets-quantity">
                                                    <div class="period-dates-display">
                                                        <span class="period-start-date"><?php echo e(\Carbon\Carbon::parse($data['availabilityPeriod']->start_date)->format('d M')); ?></span>
                                                        <span class="period-separator">→</span>
                                                        <span class="period-end-date"><?php echo e(\Carbon\Carbon::parse($data['availabilityPeriod']->end_date)->format('d M Y')); ?></span>
                                                    </div>
                                                    <div class="period-duration-display">
                                                        <i class="fa-solid fa-calendar-days"></i>
                                                        <?php echo e(\Carbon\Carbon::parse($data['availabilityPeriod']->start_date)->diffInDays(\Carbon\Carbon::parse($data['availabilityPeriod']->end_date)) + 1); ?> days
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tg-tour-about-border-doted mb-15"></div>
                                    <?php endif; ?>
                                    
                                    <?php if($service->activeRoomTypes && $service->activeRoomTypes->count() > 0): ?>
                                        <div class="tg-tour-about-tickets-wrap mb-15">
                                            <div class="tg-tour-about-tickets mb-10">
                                                <div class="tg-tour-about-tickets-adult">
                                                    <div class="tg-tour-about-sidebar-title">Room Type</div>
                                                </div>
                                                <div class="tg-tour-about-tickets-quantity">
                                                    <select name="room_type_id" id="room_type_select" class="custom-select">
                                                        <?php $__currentLoopData = $service->activeRoomTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $roomType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($roomType->id); ?>"
                                                                data-type="<?php echo e($roomType->type); ?>"
                                                                data-supplement="<?php echo e($roomType->price_supplement); ?>"
                                                                data-capacity="<?php echo e($roomType->capacity); ?>"
                                                                <?php echo e(old('room_type_id') == $roomType->id ? 'selected' : ''); ?>>
                                                                <?php echo e($roomType->display_name_with_price); ?>

                                                            </option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- Room configuration info -->
                                            <div id="room_config_info" class="room-config-info" style="font-size: 13px; color: #666; margin-top: 8px; display: none;">
                                                <i class="fas fa-info-circle"></i>
                                                <span id="room_config_text"></span>
                                            </div>
                                        </div>
                                        <div class="tg-tour-about-border-doted mb-15"></div>
                                    <?php endif; ?>
                                    
                                    <div class="tg-tour-about-tickets-wrap mb-15">
                                        <div class="tg-tour-about-tickets mb-10">
                                            <div class="tg-tour-about-tickets-adult">
                                                <div class="tg-tour-about-sidebar-title">Tour Price</div>
                                            </div>
                                            <div class="tg-tour-about-tickets-quantity">
                                                <?php echo e(currency($service->discount_price ?? $service->full_price)); ?>

                                            </div>
                                        </div>
                                    </div>
 
                                    <div class="tg-tour-about-border-doted mb-15"></div>
 
                                    <div class="tg-tour-about-tickets-wrap mb-15">
                                        <span class="tg-tour-about-sidebar-title">Tickets:</span>
 
                                        <div class="tg-tour-about-tickets mb-10">
                                            <div class="tg-tour-about-tickets-adult">
                                                <span>Adult</span>
                                                <p class="mb-0">(18+ years)</p>
                                            </div>
                                            <div class="tg-tour-about-tickets-quantity">
                                                <?php echo e($data['personCount']); ?> x <?php echo e(currency($service->discount_adult_price ?? $service->adult_price)); ?> =
                                                <?php echo e(currency($data['personCount'] * ($service->discount_adult_price ?? $service->adult_price))); ?>

                                            </div>
                                        </div>
 
                                        <div class="tg-tour-about-tickets mb-10">
                                            <div class="tg-tour-about-tickets-adult">
                                                <span>Children </span>
                                                <p class="mb-0">(13-17 years)</p>
                                            </div>
                                            <div class="tg-tour-about-tickets-quantity">
                                                <?php echo e($data['childCount']); ?> x <?php echo e(currency($service->discount_child_price ?? $service->child_price)); ?> =
                                                <?php echo e(currency($data['childCount'] * ($service->discount_child_price ?? $service->child_price))); ?>

                                            </div>
                                        </div>
                                    </div>
 
                                    <?php if(count($data['extras']) > 0): ?>
                                        <div class="tg-tour-about-extra mb-10">
                                            <span class="tg-tour-about-sidebar-title mb-10 d-inline-block">Add
                                                Extra:</span>
                                            <div class="tg-filter-list">
                                                <ul>
                                                    <?php $__currentLoopData = $data['extras']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $extra): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <li>
                                                            <div class="checkbox d-flex">
                                                                <label class="tg-label">
                                                                    <?php echo e($extra->name); ?>

                                                                </label>
                                                            </div>
                                                            <span class="quantity"><?php echo e(currency($extra->price)); ?></span>
                                                        </li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>
                                            </div>
                                        </div>
                                    <?php endif; ?>
 
                                </div>
                                <div class="tg-tour-about-border-doted mb-15"></div>
                                
                                <?php if($service->activeRoomTypes && $service->activeRoomTypes->count() > 0): ?>
                                    <div class="tg-tour-about-tickets-wrap mb-15">
                                        <div class="tg-tour-about-tickets mb-10">
                                            <div class="tg-tour-about-tickets-adult">
                                                <div class="tg-tour-about-sidebar-title">Room Supplement:</div>
                                            </div>
                                            <div class="tg-tour-about-tickets-quantity">
                                                <span id="room_supplement_display"><?php echo e(currency(0)); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tg-tour-about-border-doted mb-15"></div>
                                <?php endif; ?>
                                
                                <div
                                    class="tg-tour-about-coast d-flex align-items-center flex-wrap justify-content-between">
                                    <span class="tg-tour-about-sidebar-title d-inline-block">Total Cost:</span>
                                    <h5 class="total-price" data-base-price="<?php echo e($data['total'] - ($data['roomSupplement'] ?? 0)); ?>" data-person-count="<?php echo e($data['personCount']); ?>" data-child-count="<?php echo e($data['childCount']); ?>"><?php echo e(currency($data['total'])); ?></h5>
                                </div>
                            </div>
                        </div>
                        <?php echo $__env->make('tourbooking::front.bookings.payment', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- checkout area end-->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js_section'); ?>
    <script>
        $(document).ready(function() {
            // Function to parse currency string to number
            function parseCurrency(currencyStr) {
                return parseFloat(currencyStr.replace(/[^0-9.-]+/g, '')); // Removing non-numeric characters
            }
 
            // Function to format number into currency format (e.g., $10.00)
            function formatCurrency(amount) {
                return '$' + amount.toFixed(2);
            }
 
            // Function to update prices and hidden form fields
            function updatePrices() {
                // Get subtotal value
                const subTotal = parseCurrency($('.sub_total span').text());
 
                // Get shipping cost from displayed value
                const shippingCost = parseCurrency($('.shipping_cost span').text().replace('(+)', '').trim());
 
                // Calculate total price
                const total = subTotal + shippingCost;
 
                // Update the total span with the formatted total price
                $('.total span').text(formatCurrency(total));
 
                // If you are showing this price for Stripe payment, update it
                $('.stripe_price_here').text(formatCurrency(total));
 
                // Update the hidden form inputs for subtotal, shipping cost, and total
                $('input[name="subtotal"]').val(subTotal);
                $('input[name="shipping_charge"]').val(shippingCost);
                $('input[name="total"]').val(total);
            }
 
            // Event listener for when the shipping method is changed
            $('select[name="shipping_method_id"]').on('change', function() {
                // Get the selected option's shipping cost (splitting the price part)
                const selectedOption = $(this).find('option:selected');
                const priceText = selectedOption.text().split('-')[1].trim();
                const shippingCost = parseCurrency(priceText);
 
                // Update the shipping cost display and input field
                $('.shipping_cost span').text('(+)' + formatCurrency(shippingCost));
 
                // Recalculate and update all prices
                updatePrices();
            });
 
            // Optional: If you want to initially set the values correctly when the page loads, you can call updatePrices()
            updatePrices();
 
            $('#customer_name').on('keyup', function() {
                $('.form_customer_name').val($(this).val());
            });
            $('#customer_email').on('change', function() {
                $('.form_customer_email').val($(this).val());
            });
            $('#customer_phone').on('change', function() {
                $('.form_customer_phone').val($(this).val());
            });
            $('#customer_address').on('change', function() {
                $('.form_customer_address').val($(this).val());
            });

            // Room type selection handling
            const roomTypeSelect = document.getElementById('room_type_select');
            const roomSupplementDisplay = document.getElementById('room_supplement_display');
            const totalPriceElement = document.querySelector('.total-price');
            const roomConfigInfo = document.getElementById('room_config_info');
            const roomConfigText = document.getElementById('room_config_text');
            
            // CRITICAL FIX: Always initialize form_total with valid value
            // Use class selector since there are multiple payment forms (modals)
            const totalInputs = document.getElementsByClassName('form_total');
            const initialTotal = <?php echo e($data['total']); ?>;
            
            if (totalInputs.length > 0) {
                // Initialize ALL total fields (one in each payment modal)
                for (let i = 0; i < totalInputs.length; i++) {
                    if (!totalInputs[i].value || totalInputs[i].value === 'NaN') {
                        totalInputs[i].value = initialTotal.toFixed(2);
                    }
                }
                console.log('Initialized', totalInputs.length, 'form_total fields with backend total:', initialTotal);
            }
            
            // Get the base price (without room supplement) from data attribute
            // Add safety check to prevent NaN
            let basePrice = 0;
            if (totalPriceElement && totalPriceElement.dataset.basePrice) {
                basePrice = parseFloat(totalPriceElement.dataset.basePrice);
                if (isNaN(basePrice)) {
                    basePrice = <?php echo e($data['total'] - ($data['roomSupplement'] ?? 0)); ?>;
                }
            } else {
                basePrice = <?php echo e($data['total'] - ($data['roomSupplement'] ?? 0)); ?>;
            }
            
            let personCount = totalPriceElement ? (parseInt(totalPriceElement.dataset.personCount) || 0) : <?php echo e($data['personCount']); ?>;
            let childCount = totalPriceElement ? (parseInt(totalPriceElement.dataset.childCount) || 0) : <?php echo e($data['childCount']); ?>;
            let totalGuests = personCount + childCount;
            
            console.log('Base price:', basePrice, 'Total guests:', totalGuests);
            
            // Function to generate room configuration text
            function generateRoomConfigText(roomType, totalGuests) {
                const capacity = parseInt(roomType.dataset.capacity) || 1;
                const roomsNeeded = Math.ceil(totalGuests / capacity);
                const roomTypeName = roomType.text.split('(')[0].trim();
                
                if (roomsNeeded === 1) {
                    return `Configuration: 1 ${roomTypeName} for ${totalGuests} guest(s)`;
                } else {
                    return `Configuration: ${roomsNeeded}x ${roomTypeName} (${roomsNeeded} rooms for ${totalGuests} guests)`;
                }
            }
            
            // Function to update room selection based on guest count
            function filterAvailableRoomTypes(totalGuests) {
                if (!roomTypeSelect) return;
                
                const options = roomTypeSelect.querySelectorAll('option');
                let hasAvailableOption = false;
                
                options.forEach(option => {
                    const capacity = parseInt(option.dataset.capacity) || 1;
                    const roomType = option.dataset.type;
                    
                    // Filter logic based on guest count
                    let shouldShow = false;
                    
                    if (totalGuests === 1) {
                        // 1 person: Show single and double shared
                        shouldShow = (roomType === 'single' || roomType === 'double_shared');
                    } else if (totalGuests === 2) {
                        // 2 persons: Show double
                        shouldShow = (roomType === 'double');
                    } else if (totalGuests === 3) {
                        // 3 persons: Show triple
                        shouldShow = (roomType === 'triple');
                    } else if (totalGuests === 4) {
                        // 4 persons: Show double (2 rooms needed)
                        shouldShow = (roomType === 'double');
                    } else if (totalGuests > 4) {
                        // More than 4: Show all with sufficient capacity (double or triple)
                        shouldShow = (roomType === 'double' || roomType === 'triple');
                    }
                    
                    option.style.display = shouldShow ? '' : 'none';
                    if (shouldShow) hasAvailableOption = true;
                });
                
                // Select first available option
                if (hasAvailableOption) {
                    const firstAvailable = Array.from(options).find(opt => opt.style.display !== 'none');
                    if (firstAvailable) {
                        roomTypeSelect.value = firstAvailable.value;
                        // Trigger change event
                        roomTypeSelect.dispatchEvent(new Event('change'));
                    }
                }
            }
            
            if (roomTypeSelect) {
                // Get all room type input fields (one in each payment modal)
                const roomTypeInputs = document.getElementsByClassName('form_room_type_id');
                
                // Initial filter and calculation
                filterAvailableRoomTypes(totalGuests);
                
                // Calculate initial room supplement (after filter has run)
                let initialSupplement = 0;
                const selectedOption = roomTypeSelect.options[roomTypeSelect.selectedIndex];
                if (selectedOption) {
                    initialSupplement = parseFloat(selectedOption.dataset.supplement) || 0;
                }
                const initialTotalSupplement = initialSupplement * totalGuests;
                const initialTotal = basePrice + initialTotalSupplement;
                
                // Update ALL total input fields (one in each payment modal)
                if (totalInputs.length > 0) {
                    for (let i = 0; i < totalInputs.length; i++) {
                        totalInputs[i].value = initialTotal.toFixed(2);
                    }
                    console.log('Initial total set to:', initialTotal.toFixed(2), 'for', totalInputs.length, 'payment forms');
                }
                
                // Update ALL room type ID fields
                if (roomTypeInputs.length > 0 && roomTypeSelect.value) {
                    for (let i = 0; i < roomTypeInputs.length; i++) {
                        roomTypeInputs[i].value = roomTypeSelect.value;
                    }
                    console.log('Room type ID set to:', roomTypeSelect.value, 'for', roomTypeInputs.length, 'payment forms');
                }
                
                roomTypeSelect.addEventListener('change', function() {
                    const selectedOption = this.options[this.selectedIndex];
                    const supplementPerPerson = parseFloat(selectedOption.dataset.supplement) || 0;
                    const totalSupplement = supplementPerPerson * totalGuests;
                    
                    // Update room supplement display
                    if (roomSupplementDisplay) {
                        roomSupplementDisplay.textContent = formatCurrency(totalSupplement) + ` (${formatCurrency(supplementPerPerson)} × ${totalGuests} guests)`;
                    }
                    
                    // Update room configuration info
                    if (roomConfigInfo && roomConfigText) {
                        roomConfigText.textContent = generateRoomConfigText(selectedOption, totalGuests);
                        roomConfigInfo.style.display = 'block';
                    }
                    
                    // Recalculate total price from base price + new supplement
                    const newTotal = basePrice + totalSupplement;
                    if (totalPriceElement) {
                        totalPriceElement.textContent = formatCurrency(newTotal);
                    }
                    
                    // Update ALL hidden total inputs (one in each payment modal)
                    const roomTypeInputs = document.getElementsByClassName('form_room_type_id');
                    
                    if (totalInputs.length > 0) {
                        for (let i = 0; i < totalInputs.length; i++) {
                            totalInputs[i].value = newTotal.toFixed(2);
                        }
                        console.log('Total updated to:', newTotal.toFixed(2), '(Base:', basePrice, '+ Supplement:', totalSupplement + ') for', totalInputs.length, 'payment forms');
                    }
                    
                    if (roomTypeInputs.length > 0 && roomTypeSelect.value) {
                        for (let i = 0; i < roomTypeInputs.length; i++) {
                            roomTypeInputs[i].value = roomTypeSelect.value;
                        }
                        console.log('Room type ID updated to:', roomTypeSelect.value, 'for', roomTypeInputs.length, 'payment forms');
                    }
                });
                
                // Trigger initial change event
                roomTypeSelect.dispatchEvent(new Event('change'));
            }
  
        });
    </script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('style_section'); ?>
    <style>
        .period-dates-display {
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 600;
            color: var(--tg-grey-1);
            font-size: 15px;
        }

        .period-start-date,
        .period-end-date {
            font-weight: 600;
            color: var(--tg-grey-1);
        }

        .period-separator {
            color: #999;
            font-size: 14px;
        }

        .period-duration-display {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 13px;
            color: #666;
            margin-top: 4px;
        }

        .period-duration-display i {
            color: var(--tg-theme-primary);
        }

        .room-config-info {
            display: flex;
            align-items: center;
            gap: 6px;
            padding: 8px 12px;
            background-color: #e8f4f8;
            border-radius: 4px;
            border-left: 3px solid #007bff;
            margin-top: 8px;
            font-size: 13px;
            color: #495057;
        }

        .room-config-info i {
            color: #007bff;
            font-size: 14px;
        }

        .room-config-info span {
            flex: 1;
        }

        .custom-select {
            width: 100%;
            padding: 8px 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            background-color: #fff;
            font-size: 14px;
            cursor: pointer;
        }

        .custom-select:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 0 2px rgba(0, 123, 255, 0.1);
        }
    </style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layout_inner_page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\archive\archive\Modules/TourBooking\resources/views/front/bookings/checkout-view.blade.php ENDPATH**/ ?>