<div class="payment_right">
    <div class="payment_select">
        <h2 class="tg-checkout-form-title tg-checkout-form-title-3 mb-15"><?php echo e(__('translate.Select Payment Method')); ?>

        </h2>
        <div class="tg-tour-about-border-doted mb-20"></div>
        <div class="payment_select_item_main">

            <?php if($payment_setting->stripe_status == 1): ?>
                <div class="payment_select_item_box">

                    <a href="javascript:;" class="payment_select_item">
                        <div class="payment_select_item_thumb">
                            <img src="<?php echo e(asset($payment_setting->stripe_image)); ?>" class="w-100" alt="">
                        </div>
                    </a>

                    <div class="payment_select_modal  tg-checkout-form-input">
                        <div class="payment_select_modal_head">
                            <h2><?php echo e(__('translate.Stripe Payment')); ?></h2>
                            <button type="button" class="close_modal_btn">
                                <span>
                                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16 1L1.00081 16" stroke="#FE2C55" stroke-width="1.8"
                                            stroke-linecap="round" />
                                        <path d="M16 16L1.00081 1.00001" stroke="#FE2C55" stroke-width="1.8"
                                            stroke-linecap="round" />
                                    </svg>
                                </span>
                            </button>
                        </div>
                        <form class="payment_select_modal_form stripe-modal-form require-validation " role="form"
                            action="<?php echo e(route('payment.stripe')); ?>" method="POST" data-cc-on-file="false"
                            data-stripe-publishable-key="<?php echo e($payment_setting->stripe_key); ?>" id="payment-form">
                            <?php echo csrf_field(); ?>

                            <?php echo $__env->make('tourbooking::front.bookings.customer-info', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                            <div class="payment_select_modal_form_item mt-0">
                                <div class="payment_select_modal_form_inner">
                                    <label for="card_number" class="form-label">
                                        <?php echo e(__('translate.Card Number')); ?>*</label>
                                    <input type="text" class="input card-number" id="card_number"
                                        placeholder="<?php echo e(__('translate.Card Number')); ?>" name="card_number"
                                        autocomplete="off">
                                </div>
                            </div>


                            <div class="payment_select_modal_form_item">
                                <div class="payment_select_modal_form_inner">
                                    <label for="expiry_month" class="form-label"><?php echo e(__('translate.Expired Month')); ?>

                                        *</label>
                                    <input type="text" class="input card-expiry-month" id="expiry_month"
                                        placeholder="<?php echo e(__('translate.MM')); ?>" name="month" autocomplete="off">
                                </div>
                            </div>


                            <div class="payment_select_modal_form_item">
                                <div class="payment_select_modal_form_inner">
                                    <label for="expired_year"
                                        class="form-label"><?php echo e(__('translate.Expired Year')); ?>*</label>
                                    <input type="text" class="input card-expiry-year" id="expired_year"
                                        placeholder="<?php echo e(__('translate.YYYY')); ?>" name="year" autocomplete="off">
                                </div>
                                <div class="payment_select_modal_form_inner">
                                    <label for="cvc" class="form-label"><?php echo e(__('translate.CVC')); ?>*</label>
                                    <input type="text" class="input card-cvc" id="cvc"
                                        placeholder="<?php echo e(__('translate.CVC')); ?>" name="cvc" autocomplete="off">
                                </div>
                            </div>

                            <div class="payment_select_modal_form_item stripe_error d-none">
                                <div class="stripe-modal-form-inner">
                                    <div class='alert-danger alert '>
                                        <?php echo e(__('translate.Please provide your valid card information')); ?></div>
                                </div>
                            </div>

                            <button type="submit" class="tg-btn tg-btn-switch-animation mt-20 w-100">

                                <span><?php echo e(__('translate.Pay Now')); ?></span>
                                <svg width="19" height="20" viewBox="0 0 19 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.1575 4.34302L3.84375 15.6567" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path
                                        d="M15.157 11.4142C15.157 11.4142 16.0887 5.2748 15.157 4.34311C14.2253 3.41142 8.08594 4.34314 8.08594 4.34314"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            <?php endif; ?>



            <?php if($payment_setting->paypal_status == 1): ?>
                <div class="payment_select_item_box">
                    <form action="<?php echo e(route('payment.paypal')); ?>">
                        <?php echo csrf_field(); ?>
                        <?php echo $__env->make('tourbooking::front.bookings.customer-info', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <button type="submit">
                            <div class="payment_select_item_thumb">
                                <img src="<?php echo e(asset($payment_setting->paypal_image)); ?>" class="w-100" alt="">
                            </div>
                        </button>
                    </form>
                </div>
            <?php endif; ?>

            <?php if($payment_setting->razorpay_status == 1): ?>
                <div class="payment_select_item_box" id="razorpay_btn">
                    <a href="javascript:;">
                        <div class="payment_select_item_thumb">
                            <img src="<?php echo e(asset($payment_setting->razorpay_image)); ?>" class="w-100" alt="">
                        </div>
                    </a>
                </div>

                <form action="<?php echo e(route('payment.razorpay')); ?>" method="POST" class="d-none">
                    <?php echo csrf_field(); ?>
                    <?php
                        $payable_amount = $data['total'] * $razorpay_currency->currency_rate;
                        $payable_amount = round($payable_amount, 2);
                    ?>

                    <?php echo $__env->make('tourbooking::front.bookings.customer-info', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="<?php echo e($payment_setting->razorpay_key); ?>"
                        data-currency="<?php echo e($razorpay_currency->currency_code); ?>" data-amount="<?php echo e($payable_amount * 100); ?>"
                        data-buttontext="<?php echo e(__('translate.Pay')); ?>" data-name="<?php echo e($payment_setting->razorpay_name); ?>"
                        data-description="<?php echo e($payment_setting->razorpay_description); ?>"
                        data-image="<?php echo e(asset($payment_setting->razorpay_image)); ?>" data-prefill.name="" data-prefill.email=""
                        data-theme.color="<?php echo e($payment_setting->razorpay_theme_color); ?>"></script>
                </form>
            <?php endif; ?>





            <?php if($payment_setting->flutterwave_status == 1): ?>
                <div class="payment_select_item_box" id="payWithFlutterwave">
                    <a href="javascript:;">
                        <div class="payment_select_item_thumb">
                            <img src="<?php echo e(asset($payment_setting->flutterwave_logo)); ?>" class="w-100"
                                alt="">
                        </div>
                    </a>
                </div>
            <?php endif; ?>

            <?php if($payment_setting->paystack_status == 1): ?>
                <div class="payment_select_item_box" id="paystackPayment">
                    <a href="javascript:;">
                        <div class="payment_select_item_thumb">
                            <img src="<?php echo e(asset($payment_setting->paystack_image)); ?>" class="w-100" alt="">
                        </div>
                    </a>
                </div>
            <?php endif; ?>



            <?php if($payment_setting->mollie_status == 1): ?>
                <div class="payment_select_item_box">
                    <form action="<?php echo e(route('payment.mollie')); ?>">
                        <?php echo $__env->make('tourbooking::front.bookings.customer-info', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <button type="submit">
                            <div class="payment_select_item_thumb">
                                <img src="<?php echo e(asset($payment_setting->mollie_image)); ?>" class="w-100"
                                    alt="">
                            </div>
                        </button>
                    </form>
                </div>
            <?php endif; ?>


            <?php if($payment_setting->instamojo_status == 1): ?>
                <div class="payment_select_item_box">
                    <form action="<?php echo e(route('payment.instamojo')); ?>">
                        <?php echo $__env->make('tourbooking::front.bookings.customer-info', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <button type="submit">
                            <div class="payment_select_item_thumb">
                                <img src="<?php echo e(asset($payment_setting->instamojo_image)); ?>" class="w-100"
                                    alt="">
                            </div>
                        </button>
                    </form>
                </div>
            <?php endif; ?>

            <?php if($payment_setting->bank_status == 1): ?>
                <div class="payment_select_item_box">

                    <a href="javascript:;" class="payment_select_item">
                        <div class="payment_select_item_thumb">
                            <img src="<?php echo e(asset($payment_setting->bank_image)); ?>" class="w-100" alt="">
                        </div>
                    </a>

                    <div class="payment_select_modal">
                        <div class="payment_select_modal_head">
                            <h2><?php echo e(__('translate.Bank Payment')); ?></h2>
                            <button type="button" class="close_modal_btn">
                                <span>
                                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16 1L1.00081 16" stroke="#FE2C55" stroke-width="1.8"
                                            stroke-linecap="round" />
                                        <path d="M16 16L1.00081 1.00001" stroke="#FE2C55" stroke-width="1.8"
                                            stroke-linecap="round" />
                                    </svg>
                                </span>
                            </button>
                        </div>


                        <ul class="banck_text">
                            <?php echo clean(nl2br($payment_setting->bank_account_info)); ?>

                        </ul>


                        <form class="payment_select_modal_form mt-0" action="<?php echo e(route('payment.bank')); ?>"
                            method="POST">
                            <?php echo csrf_field(); ?>

                            <?php echo $__env->make('tourbooking::front.bookings.customer-info', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                            <div class="payment_select_modal_form_item  mt-0">
                                <div class="payment_select_modal_form_inner tg-checkout-form-input">
                                    <label for="tnx_info"
                                        class="form-label"><?php echo e(__('translate.Transaction information')); ?>*</label>
                                    <textarea class="input" id="tnx_info" rows="3" name="tnx_info"></textarea>
                                </div>
                            </div>

                            <button type="submit" class="tg-btn tg-btn-switch-animation w-100">

                                <span><?php echo e(__('translate.Submit Now')); ?></span>
                                <svg width="19" height="20" viewBox="0 0 19 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.1575 4.34302L3.84375 15.6567" stroke="currentColor"
                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path
                                        d="M15.157 11.4142C15.157 11.4142 16.0887 5.2748 15.157 4.34311C14.2253 3.41142 8.08594 4.34314 8.08594 4.34314"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            <?php endif; ?>


        </div>
    </div>
</div>

<?php $__env->startPush('js_section'); ?>

    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script>
        "use strict";
        $(function() {

            var $form = $(".require-validation");
            $('form.require-validation').on('submit', function(e) {
                var $form = $(".require-validation"),
                    inputSelector = ['input[type=email]', 'input[type=password]',
                        'input[type=text]', 'input[type=file]',
                        'textarea'
                    ].join(', '),
                    $inputs = $form.find('.required').find(inputSelector),
                    $errorMessage = $form.find('div.stripe_error'),
                    valid = true;
                $errorMessage.addClass('d-none');

                $('.has-error').removeClass('has-error');
                $inputs.each(function(i, el) {
                    var $input = $(el);
                    if ($input.val() === '') {
                        $input.parent().addClass('has-error');
                        $errorMessage.removeClass('d-none');
                        e.preventDefault();
                    }
                });

                if (!$form.data('cc-on-file')) {
                    e.preventDefault();
                    Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                    Stripe.createToken({
                        number: $('.card-number').val(),
                        cvc: $('.card-cvc').val(),
                        exp_month: $('.card-expiry-month').val(),
                        exp_year: $('.card-expiry-year').val()
                    }, stripeResponseHandler);
                }

            });

            function stripeResponseHandler(status, response) {
                if (response.error) {
                    $('.stripe_error')
                        .removeClass('d-none')
                        .find('.alert')
                        .text(response.error.message);
                } else {
                    var token = response['id'];
                    $form.find('input[type=text]').empty();
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $form.get(0).submit();
                }
            }

            $("#razorpay_btn").on("click", function() {
                $(".razorpay-payment-button").click();
            })

        });
    </script>

    <?php if($payment_setting->flutterwave_status == 1 && $user): ?>
        <script src="https://checkout.flutterwave.com/v3.js"></script>

        <?php
            $payable_amount = $data['total'] * $flutterwave_currency->currency_rate;
            $payable_amount = round($payable_amount, 2);
        ?>

        <script>
            "use strict";
            $(function() {
                $("#payWithFlutterwave").on("click", function() {

                    var isDemo = "<?php echo e(env('APP_MODE')); ?>"
                    if (isDemo == 'DEMO') {
                        toastr.error('This Is Demo Version. You Can Not Change Anything');
                        return;
                    }

                    FlutterwaveCheckout({
                        public_key: "<?php echo e($payment_setting->flutterwave_public_key); ?>",
                        tx_ref: "<?php echo e(substr(rand(0, time()), 0, 10)); ?>",
                        amount: <?php echo e($payable_amount); ?>,
                        currency: "<?php echo e($flutterwave_currency->currency_code); ?>",
                        country: "<?php echo e($flutterwave_currency->country_code); ?>",
                        payment_options: " ",
                        customer: {
                            email: "<?php echo e($user->email); ?>",
                            phone_number: "<?php echo e($user->phone); ?>",
                            name: "<?php echo e($user->name); ?>",
                        },
                        callback: function(data) {

                            var tnx_id = data.transaction_id;
                            var _token = "<?php echo e(csrf_token()); ?>";
                            $.ajax({
                                type: 'post',
                                data: {
                                    tnx_id,
                                    _token
                                },
                                url: "<?php echo e(url('payment/flutterwave/')); ?>",
                                success: function(response) {

                                    if (response.status == 'success') {
                                        toastr.success(response.message);
                                        window.location.href =
                                            "<?php echo e(route('user.dashboard')); ?>";
                                    } else {
                                        toastr.error(response.message);
                                        window.location.reload();
                                    }
                                },
                                error: function(err) {
                                    toastr.error(
                                        "<?php echo e(__('translate.Something went wrong, please try again')); ?>"
                                    );
                                    window.location.reload();
                                }
                            });
                        },
                        customizations: {
                            title: "<?php echo e($payment_setting->flutterwave_title); ?>",
                            logo: "<?php echo e(asset($payment_setting->flutterwave_logo)); ?>",
                        },
                    });

                })
            });
        </script>
    <?php endif; ?>




    

    <?php if($payment_setting->paystack_status == 1): ?>
        <script src="https://js.paystack.co/v1/inline.js"></script>

        <?php

            $public_key = $payment_setting->paystack_public_key;
            $currency = $paystack_currency->currency_code;
            $currency = strtoupper($currency);

            $ngn_amount = $data['total'] * $paystack_currency->currency_rate;
            $ngn_amount = $ngn_amount * 100;
            $ngn_amount = round($ngn_amount);

        ?>

        <script>
            "use strict";
            $(function() {
                $("#paystackPayment").on("click", function() {

                    var isDemo = "<?php echo e(env('APP_MODE')); ?>"
                    if (isDemo == 'DEMO') {
                        toastr.error('This Is Demo Version. You Can Not Change Anything');
                        return;
                    }

                    var handler = PaystackPop.setup({
                        key: '<?php echo e($public_key); ?>',
                        email: '<?php echo e($user->email ?? ''); ?>',
                        amount: '<?php echo e($ngn_amount); ?>',
                        currency: "<?php echo e($currency); ?>",
                        callback: function(response) {
                            let reference = response.reference;
                            let tnx_id = response.transaction;
                            let _token = "<?php echo e(csrf_token()); ?>";
                            $.ajax({
                                type: "POST",
                                data: {
                                    reference,
                                    tnx_id,
                                    _token,
                                    customer_name: $('.form_customer_name').val(),
                                    customer_email: $('.form_customer_email').val(),
                                    customer_phone: $('.form_customer_phone').val(),
                                    customer_address: $('.form_customer_address').val(),
                                },
                                url: "<?php echo e(url('payment/paystack')); ?>",
                                success: function(response) {
                                    if (response.status == 'success') {
                                        toastr.success(response.message);
                                        window.location.href =
                                            "<?php echo e(route('user.dashboard')); ?>";
                                    } else {
                                        toastr.error(response.message);
                                        window.location.reload();
                                    }
                                },
                                error: function(response) {
                                    toastr.error('Server Error');
                                    window.location.reload();
                                }
                            });
                        },
                        onClose: function() {
                            alert('window closed');
                        }
                    });
                    handler.openIframe();

                })
            });
        </script>
    <?php endif; ?>

    

<?php $__env->stopPush(); ?>
<?php /**PATH D:\xampp\htdocs\archive\archive\Modules/TourBooking\resources/views/front/bookings/payment.blade.php ENDPATH**/ ?>