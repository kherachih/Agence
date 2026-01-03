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
                                <div
                                    class="tg-tour-about-coast d-flex align-items-center flex-wrap justify-content-between">
                                    <span class="tg-tour-about-sidebar-title d-inline-block">Total Cost:</span>
                                    <h5 class="total-price"><?php echo e(currency($data['total'])); ?></h5>
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
    </style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layout_inner_page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\archive\archive\Modules/TourBooking\resources/views/front/bookings/checkout-view.blade.php ENDPATH**/ ?>