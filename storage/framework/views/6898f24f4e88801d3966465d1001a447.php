

<?php $__env->startSection('title'); ?>
<title><?php echo e(__('translate.Request a Quote')); ?> - <?php echo e($general_setting->site_name ?? $general_setting->app_name ?? config('app.name')); ?></title>
    <meta name="title" content="<?php echo e(__('translate.Request a Quote')); ?>">
    <meta name="description" content="<?php echo e(__('translate.Get a personalized quote for your dream vacation')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('front-content'); ?>
    <style>
        /* Quote Request Form Styles */
        .quote-request-section {
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e8ec 100%);
            min-height: 100vh;
            padding: 60px 0;
        }

        .quote-form-container {
            background: #fff;
            border-radius: 24px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .quote-form-header {
            background: linear-gradient(135deg, var(--tg-theme-primary, #560CE3) 0%, #7c3aed 100%);
            padding: 40px;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .quote-form-header::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 300px;
            height: 300px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }

        .quote-form-header::after {
            content: '';
            position: absolute;
            bottom: -30%;
            left: -10%;
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
        }

        .quote-form-header h2 {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 10px;
            position: relative;
            z-index: 1;
        }

        .quote-form-header p {
            font-size: 16px;
            opacity: 0.9;
            position: relative;
            z-index: 1;
        }

        .quote-form-header .icon-wrapper {
            width: 80px;
            height: 80px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            position: relative;
            z-index: 1;
        }

        .quote-form-header .icon-wrapper i {
            font-size: 40px;
        }

        .quote-form-body {
            padding: 40px;
        }

        .form-section-title {
            font-size: 18px;
            font-weight: 600;
            color: var(--tg-theme-primary, #560CE3);
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #f0f0f0;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .form-section-title i {
            font-size: 20px;
        }

        .form-group {
            margin-bottom: 24px;
        }

        .form-group label {
            font-size: 14px;
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
            display: block;
        }

        .form-group label .required {
            color: #dc3545;
        }

        .form-control {
            width: 100%;
            padding: 14px 18px;
            border: 2px solid #e9ecef;
            border-radius: 12px;
            font-size: 15px;
            transition: all 0.3s ease;
            background: #fafafa;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--tg-theme-primary, #560CE3);
            background: #fff;
            box-shadow: 0 0 0 4px rgba(86, 12, 227, 0.1);
        }

        .form-control::placeholder {
            color: #adb5bd;
        }

        select.form-control {
            cursor: pointer;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='%23666' viewBox='0 0 16 16'%3E%3Cpath d='M8 11L3 6h10l-5 5z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 16px center;
            padding-right: 45px;
        }

        .form-row {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        @media (max-width: 768px) {
            .form-row {
                grid-template-columns: 1fr;
            }
        }

        .form-row-3 {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        @media (max-width: 992px) {
            .form-row-3 {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 576px) {
            .form-row-3 {
                grid-template-columns: 1fr;
            }
        }

        /* Ticket Type Radio Buttons */
        .ticket-type-options {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .ticket-type-option {
            flex: 1;
            min-width: 150px;
        }

        .ticket-type-option input[type="radio"] {
            display: none;
        }

        .ticket-type-option label {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 16px 20px;
            border: 2px solid #e9ecef;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            background: #fafafa;
        }

        .ticket-type-option input[type="radio"]:checked + label {
            border-color: var(--tg-theme-primary, #560CE3);
            background: linear-gradient(135deg, rgba(86, 12, 227, 0.05) 0%, rgba(124, 58, 237, 0.1) 100%);
            box-shadow: 0 4px 15px rgba(86, 12, 227, 0.15);
        }

        .ticket-type-option label .icon {
            width: 45px;
            height: 45px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            background: #e9ecef;
            transition: all 0.3s ease;
        }

        .ticket-type-option input[type="radio"]:checked + label .icon {
            background: linear-gradient(135deg, var(--tg-theme-primary, #560CE3) 0%, #7c3aed 100%);
            color: white;
        }

        .ticket-type-option label .text {
            font-weight: 600;
            color: #333;
        }

        .ticket-type-option label .subtext {
            font-size: 12px;
            color: #6c757d;
        }

        /* Hotel Stars */
        .hotel-stars {
            display: flex;
            gap: 10px;
        }

        .hotel-star-option {
            flex: 1;
        }

        .hotel-star-option input[type="radio"] {
            display: none;
        }

        .hotel-star-option label {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 5px;
            padding: 15px 10px;
            border: 2px solid #e9ecef;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            background: #fafafa;
        }

        .hotel-star-option input[type="radio"]:checked + label {
            border-color: #ffc107;
            background: linear-gradient(135deg, rgba(255, 193, 7, 0.1) 0%, rgba(255, 193, 7, 0.2) 100%);
        }

        .hotel-star-option label .stars {
            font-size: 20px;
            color: #ffc107;
        }

        .hotel-star-option label .label-text {
            font-size: 12px;
            font-weight: 600;
            color: #333;
        }

        /* Submit Button */
        .submit-btn-wrapper {
            margin-top: 30px;
            padding-top: 30px;
            border-top: 2px solid #f0f0f0;
        }

        .submit-btn {
            width: 100%;
            padding: 18px 30px;
            background: linear-gradient(135deg, var(--tg-theme-primary, #560CE3) 0%, #7c3aed 100%);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 18px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            box-shadow: 0 10px 30px rgba(86, 12, 227, 0.3);
        }

        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(86, 12, 227, 0.4);
        }

        .submit-btn:active {
            transform: translateY(-1px);
        }

        .submit-btn i {
            font-size: 20px;
        }

        /* Info Cards */
        .info-cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        @media (max-width: 992px) {
            .info-cards {
                grid-template-columns: 1fr;
            }
        }

        .info-card {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 25px;
            border-radius: 16px;
            text-align: center;
            transition: all 0.3s ease;
        }

        .info-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .info-card .icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, var(--tg-theme-primary, #560CE3) 0%, #7c3aed 100%);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            font-size: 24px;
            color: white;
        }

        .info-card h4 {
            font-size: 16px;
            font-weight: 600;
            color: #333;
            margin-bottom: 5px;
        }

        .info-card p {
            font-size: 14px;
            color: #6c757d;
            margin: 0;
        }

        /* Success Message */
        .success-message {
            display: none;
            text-align: center;
            padding: 60px 40px;
        }

        .success-message.show {
            display: block;
        }

        .success-message .icon {
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
            font-size: 50px;
            color: white;
            animation: scaleIn 0.5s ease;
        }

        @keyframes scaleIn {
            0% {
                transform: scale(0);
                opacity: 0;
            }
            50% {
                transform: scale(1.2);
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        .success-message h3 {
            font-size: 28px;
            font-weight: 700;
            color: #28a745;
            margin-bottom: 15px;
        }

        .success-message p {
            font-size: 16px;
            color: #6c757d;
            margin-bottom: 30px;
        }

        /* Breadcrumb override */
        .tg-breadcrumb-list-2 ul li a {
            color: #6c757d;
        }

        .tg-breadcrumb-list-2 ul li span {
            color: var(--tg-theme-primary, #560CE3);
        }
    </style>

    <!-- main-area -->
    <main>
        <!-- tg-breadcrumb-area-start -->
        <div class="tg-breadcrumb-spacing-3 include-bg p-relative fix"
            data-background="<?php echo e(asset($general_setting->secondary_breadcrumb_image ?? $general_setting->breadcrumb_image)); ?>">
            <div class="tg-hero-top-shadow"></div>
        </div>
        <div class="tg-breadcrumb-list-2-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="tg-breadcrumb-list-2">
                            <ul>
                                <li><a href="<?php echo e(url('home')); ?>"><?php echo e(__('translate.Home')); ?></a></li>
                                <li><i class="fa-sharp fa-solid fa-angle-right"></i></li>
                                <li><span><?php echo e(__('translate.Request a Quote')); ?></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- tg-breadcrumb-area-end -->

        <!-- Quote Request Section -->
        <section class="quote-request-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10 col-xl-8">
                        
                        <!-- Info Cards -->
                        <div class="info-cards mb-30">
                            <div class="info-card">
                                <div class="icon">
                                    <i class="fas fa-plane-departure"></i>
                                </div>
                                <h4><?php echo e(__('translate.Personalized Trip')); ?></h4>
                                <p><?php echo e(__('translate.Tailor-made vacation packages')); ?></p>
                            </div>
                            <div class="info-card">
                                <div class="icon">
                                    <i class="fas fa-headset"></i>
                                </div>
                                <h4><?php echo e(__('translate.24/7 Support')); ?></h4>
                                <p><?php echo e(__('translate.Always here to help')); ?></p>
                            </div>
                            <div class="info-card">
                                <div class="icon">
                                    <i class="fas fa-tag"></i>
                                </div>
                                <h4><?php echo e(__('translate.Best Prices')); ?></h4>
                                <p><?php echo e(__('translate.Guaranteed best rates')); ?></p>
                            </div>
                        </div>

                        <!-- Quote Form Container -->
                        <div class="quote-form-container">
                            
                            <!-- Success Message -->
                            <div class="success-message" id="successMessage">
                                <div class="icon">
                                    <i class="fas fa-check"></i>
                                </div>
                                <h3><?php echo e(__('translateThank You!')); ?></h3>
                                <p><?php echo e(__('translate.Your quote request has been received successfully. We will contact you within 24 hours.')); ?></p>
                                <a href="<?php echo e(url('home')); ?>" class="tg-btn tg-btn-switch-animation">
                                    <span><?php echo e(__('translate.Back to Home')); ?></span>
                                </a>
                            </div>

                            <!-- Form -->
                            <form action="<?php echo e(route('quote-request.store')); ?>" method="POST" id="quoteRequestForm">
                                <?php echo csrf_field(); ?>
                                
                                <div class="quote-form-header">
                                    <div class="icon-wrapper">
                                        <i class="fas fa-paper-plane"></i>
                                    </div>
                                    <h2><?php echo e(__('translate.Request a Quote')); ?></h2>
                                    <p><?php echo e(__('translate.Fill out the form below and we will get back to you within 24 hours')); ?></p>
                                </div>

                                <div class="quote-form-body">
                                    
                                    <!-- Personal Information -->
                                    <h4 class="form-section-title">
                                        <i class="fas fa-user"></i>
                                        <?php echo e(__('translate.Personal Information')); ?>

                                    </h4>

                                    <div class="form-row">
                                        <div class="form-group">
                                            <label for="first_name"><?php echo e(__('translate.First Name')); ?> <span class="required">*</span></label>
                                            <input type="text" class="form-control" id="first_name" name="first_name" 
                                                   placeholder="<?php echo e(__('translate.Enter your first name')); ?>" required
                                                   value="<?php echo e(auth()->user()->name ?? ''); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="last_name"><?php echo e(__('translate.Last Name')); ?> <span class="required">*</span></label>
                                            <input type="text" class="form-control" id="last_name" name="last_name" 
                                                   placeholder="<?php echo e(__('translate.Enter your last name')); ?>" required
                                                   value="<?php echo e(auth()->user()->last_name ?? ''); ?>">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group">
                                            <label for="email"><?php echo e(__('translate.Email Address')); ?> <span class="required">*</span></label>
                                            <input type="email" class="form-control" id="email" name="email" 
                                                   placeholder="<?php echo e(__('translate.Enter your email')); ?>" required
                                                   value="<?php echo e(auth()->user()->email ?? ''); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="phone"><?php echo e(__('translate.Phone Number')); ?> <span class="required">*</span></label>
                                            <input type="tel" class="form-control" id="phone" name="phone" 
                                                   placeholder="<?php echo e(__('translate.Enter your phone number')); ?>" required
                                                   value="<?php echo e(auth()->user()->phone ?? ''); ?>">
                                        </div>
                                    </div>

                                    <!-- Trip Details -->
                                    <h4 class="form-section-title" style="margin-top: 30px;">
                                        <i class="fas fa-suitcase-rolling"></i>
                                        <?php echo e(__('translate.Trip Details')); ?>

                                    </h4>

                                    <div class="form-row">
                                        <div class="form-group">
                                            <label for="departure_country"><?php echo e(__('translate.Departure Country')); ?> <span class="required">*</span></label>
                                            <select class="form-control" id="departure_country" name="departure_country" required>
                                                <option value=""><?php echo e(__('translate.Select country')); ?></option>
                                                <option value="Algeria"><?php echo e(__('translate.Algeria')); ?></option>
                                                <option value="France"><?php echo e(__('translate.France')); ?></option>
                                                <option value="Tunisia"><?php echo e(__('translate.Tunisia')); ?></option>
                                                <option value="Morocco"><?php echo e(__('translate.Morocco')); ?></option>
                                                <option value="Egypt"><?php echo e(__('translate.Egypt')); ?></option>
                                                <option value="Turkey"><?php echo e(__('translate.Turkey')); ?></option>
                                                <option value="Spain"><?php echo e(__('translate.Spain')); ?></option>
                                                <option value="Italy"><?php echo e(__('translate.Italy')); ?></option>
                                                <option value="Germany"><?php echo e(__('translate.Germany')); ?></option>
                                                <option value="UK"><?php echo e(__('translate.United Kingdom')); ?></option>
                                                <option value="USA"><?php echo e(__('translate.United States')); ?></option>
                                                <option value="Canada"><?php echo e(__('translate.Canada')); ?></option>
                                                <option value="Other"><?php echo e(__('translate.Other')); ?></option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="destination_country"><?php echo e(__('translate.Destination Country')); ?> <span class="required">*</span></label>
                                            <select class="form-control" id="destination_country" name="destination_country" required>
                                                <option value=""><?php echo e(__('translate.Select country')); ?></option>
                                                <option value="Turkey"><?php echo e(__('translate.Turkey')); ?></option>
                                                <option value="Egypt"><?php echo e(__('translate.Egypt')); ?></option>
                                                <option value="Thailand"><?php echo e(__('translate.Thailand')); ?></option>
                                                <option value="Dubai"><?php echo e(__('translate.Dubai')); ?></option>
                                                <option value="Spain"><?php echo e(__('translate.Spain')); ?></option>
                                                <option value="Italy"><?php echo e(__('translate.Italy')); ?></option>
                                                <option value="France"><?php echo e(__('translate.France')); ?></option>
                                                <option value="Greece"><?php echo e(__('translate.Greece')); ?></option>
                                                <option value="Morocco"><?php echo e(__('translate.Morocco')); ?></option>
                                                <option value="Tunisia"><?php echo e(__('translate.Tunisia')); ?></option>
                                                <option value="Indonesia"><?php echo e(__('translate.Indonesia')); ?></option>
                                                <option value="Vietnam"><?php echo e(__('translate.Vietnam')); ?></option>
                                                <option value="Other"><?php echo e(__('translate.Other')); ?></option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-row-3">
                                        <div class="form-group">
                                            <label for="adults"><?php echo e(__('translate.Adults')); ?> (18+)<span class="required">*</span></label>
                                            <select class="form-control" id="adults" name="adults" required>
                                                <?php for($i = 1; $i <= 10; $i++): ?>
                                                    <option value="<?php echo e($i); ?>" <?php echo e($i == 1 ? 'selected' : ''); ?>><?php echo e($i); ?> <?php echo e(__('translate.Person(s)')); ?></option>
                                                <?php endfor; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="children"><?php echo e(__('translate.Children')); ?> (< 18)</label>
                                            <select class="form-control" id="children" name="children">
                                                <?php for($i = 0; $i <= 10; $i++): ?>
                                                    <option value="<?php echo e($i); ?>" <?php echo e($i == 0 ? 'selected' : ''); ?>><?php echo e($i); ?> <?php echo e(__('translate.Child(ren)')); ?></option>
                                                <?php endfor; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="date_depart"><?php echo e(__('translate.Departure Date')); ?> <span class="required">*</span></label>
                                            <input type="text" class="form-control flatpickr" id="date_depart" name="date_depart" 
                                                   placeholder="<?php echo e(__('translate.Select date')); ?>" required>
                                        </div>
                                    </div>

                                    <!-- Hotel Preference -->
                                    <h4 class="form-section-title" style="margin-top: 30px;">
                                        <i class="fas fa-hotel"></i>
                                        <?php echo e(__('translate.Hotel Preference')); ?>

                                    </h4>

                                    <div class="form-group">
                                        <label><?php echo e(__('translate.Hotel Category')); ?></label>
                                        <div class="hotel-stars">
                                            <div class="hotel-star-option">
                                                <input type="radio" name="hotel_stars" id="stars3" value="3">
                                                <label for="stars3">
                                                    <span class="stars">★★★</span>
                                                    <span class="label-text">3 <?php echo e(__('translate.Star')); ?></span>
                                                </label>
                                            </div>
                                            <div class="hotel-star-option">
                                                <input type="radio" name="hotel_stars" id="stars4" value="4" checked>
                                                <label for="stars4">
                                                    <span class="stars">★★★★</span>
                                                    <span class="label-text">4 <?php echo e(__('translate.Star')); ?></span>
                                                </label>
                                            </div>
                                            <div class="hotel-star-option">
                                                <input type="radio" name="hotel_stars" id="stars5" value="5">
                                                <label for="stars5">
                                                    <span class="stars">★★★★★</span>
                                                    <span class="label-text">5 <?php echo e(__('translate.Star')); ?></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Flight Ticket -->
                                    <h4 class="form-section-title" style="margin-top: 30px;">
                                        <i class="fas fa-ticket-alt"></i>
                                        <?php echo e(__('translate.Flight Ticket')); ?>

                                    </h4>

                                    <div class="form-group">
                                        <label><?php echo e(__('translate.Do you want flight tickets included?')); ?></label>
                                        <div class="ticket-type-options">
                                            <div class="ticket-type-option">
                                                <input type="radio" name="flight_ticket_included" id="with_ticket" value="1" checked>
                                                <label for="with_ticket">
                                                    <span class="icon"><i class="fas fa-plane"></i></span>
                                                    <span class="text"><?php echo e(__('translate.With Flight')); ?></span>
                                                    <span class="subtext"><?php echo e(__('translate.Include tickets')); ?></span>
                                                </label>
                                            </div>
                                            <div class="ticket-type-option">
                                                <input type="radio" name="flight_ticket_included" id="without_ticket" value="0">
                                                <label for="without_ticket">
                                                    <span class="icon"><i class="fas fa-walking"></i></span>
                                                    <span class="text"><?php echo e(__('translate.Without Flight')); ?></span>
                                                    <span class="subtext"><?php echo e(__('translate.Own transport')); ?></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Additional Notes -->
                                    <h4 class="form-section-title" style="margin-top: 30px;">
                                        <i class="fas fa-comment-alt"></i>
                                        <?php echo e(__('translate.Additional Information')); ?>

                                    </h4>

                                    <div class="form-group">
                                        <label for="room_details"><?php echo e(__('translate.Special Requests / Notes')); ?></label>
                                        <textarea class="form-control" id="room_details" name="room_details" rows="4" 
                                                  placeholder="<?php echo e(__('translate.Any special requirements, dietary restrictions, room preferences, etc.')); ?>"></textarea>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="submit-btn-wrapper">
                                        <button type="submit" class="submit-btn">
                                            <i class="fas fa-paper-plane"></i>
                                            <?php echo e(__('translate.Submit Quote Request')); ?>

                                        </button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Quote Request Section End -->

    </main>
    <!-- main-area-end -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js_section'); ?>
    <script>
        (function($) {
            "use strict";
            $(document).ready(function() {
                // Initialize flatpickr for date fields
                $(".flatpickr").flatpickr({
                    dateFormat: "Y-m-d",
                    minDate: "today",
                    allowInput: true,
                    locale: {
                        firstDayOfWeek: 1
                    }
                });

                // Form submission
                $('#quoteRequestForm').on('submit', function(e) {
                    e.preventDefault();
                    
                    var form = $(this);
                    var submitBtn = form.find('.submit-btn');
                    var originalBtnText = submitBtn.html();
                    
                    // Show loading state
                    submitBtn.html('<i class="fas fa-spinner fa-spin"></i> <?php echo e(__('translate.Sending...')); ?>');
                    submitBtn.prop('disabled', true);
                    
                    // Submit form via AJAX
                    $.ajax({
                        url: form.attr('action'),
                        type: 'POST',
                        data: form.serialize(),
                        success: function(response) {
                            // Hide form and show success message
                            form.fadeOut(300, function() {
                                $('#successMessage').addClass('show').fadeIn(300);
                            });
                            
                            // Scroll to top
                            $('html, body').animate({
                                scrollTop: $('.quote-request-section').offset().top - 100
                            }, 500);
                        },
                        error: function(xhr) {
                            // Show error message
                            var errors = xhr.responseJSON.errors;
                            if (errors) {
                                $.each(errors, function(key, value) {
                                    toastr.error(value[0]);
                                });
                            } else {
                                toastr.error('<?php echo e(__('translate.An error occurred. Please try again.')); ?>');
                            }
                            
                            // Reset button
                            submitBtn.html(originalBtnText);
                            submitBtn.prop('disabled', false);
                        }
                    });
                });
            });
        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layout_inner_page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\archive\archive\resources\views/quote_request.blade.php ENDPATH**/ ?>