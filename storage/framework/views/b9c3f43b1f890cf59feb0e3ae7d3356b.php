<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e(optional($service->translation)->title ?? $service->title); ?> - Tour Plan</title>
    <style>
        /* PDF Styling - Professional Booking.com Inspired Design */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'DejaVu Sans', 'Helvetica Neue', Helvetica, Arial, sans-serif;
            margin: 0;
            padding: 15px;
            font-size: 11px;
            line-height: 1.6;
            color: #333;
            background-color: #fff;
        }

        .pdf-container {
            max-width: 100%;
            margin: 0 auto;
        }

        /* Header Section */
        .pdf-header {
            background: linear-gradient(135deg, #DC2626 0%, #EF4444 100%);
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            box-shadow: 0 4px 10px rgba(220, 38, 38, 0.15);
        }

        .header-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo-section {
            flex: 1;
        }

        .logo-container img {
            max-height: 45px;
            max-width: 140px;
            filter: brightness(0) invert(1);
        }

        .app-name {
            font-size: 16px;
            color: white;
            font-weight: bold;
            margin-top: 5px;
        }

        .header-date {
            text-align: right;
            color: white;
            font-size: 10px;
            opacity: 0.9;
        }


        /* Images Grid Section */
        .images-grid-section {
            margin-bottom: 15px;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.12);
        }

        /* Single Image Layout */
        .single-image-container {
            width: 100%;
        }

        .grid-image-full {
            width: 100%;
            height: 250px;
            object-fit: cover;
            display: block;
        }

        /* Two Images Layout */
        .two-images-container {
            display: table;
            width: 100%;
            border-collapse: collapse;
        }

        .image-left,
        .image-right {
            display: table-cell;
            width: 50%;
        }

        .grid-image-half {
            width: 100%;
            height: 250px;
            object-fit: cover;
            display: block;
        }

        /* Three Images Layout */
        .three-images-container {
            display: table;
            width: 100%;
            border-collapse: collapse;
        }

        .image-main {
            display: table-cell;
            width: 58%;
            vertical-align: top;
        }

        .images-side {
            display: table-cell;
            width: 42%;
            vertical-align: top;
        }

        .grid-image-main {
            width: 100%;
            height: 250px;
            object-fit: cover;
            display: block;
        }

        .grid-image-side {
            width: 100%;
            height: 125px;
            object-fit: cover;
            display: block;
        }

        /* Four Images Layout (Default) */
        .four-images-container {
            display: table;
            width: 100%;
            border-collapse: collapse;
        }

        .grid-image-side-top {
            width: 100%;
            height: 125px;
            object-fit: cover;
            display: block;
            margin-bottom: 0;
        }

        .images-bottom-row {
            display: table;
            width: 100%;
            border-collapse: collapse;
        }

        .grid-image-small {
            width: 50%;
            height: 125px;
            object-fit: cover;
            display: table-cell;
        }

        /* Title Bar */
        .title-bar {
            background: white;
            padding: 15px 20px;
            border-bottom: 2px solid #F3F4F6;
            margin-bottom: 15px;
        }

        .service-title-main {
            font-size: 20px;
            font-weight: bold;
            color: #1F2937;
            margin: 0 0 8px 0;
        }

        .service-location-main {
            font-size: 11px;
            color: #DC2626;
            font-weight: 600;
        }

        /* Info Cards Grid */
        .info-cards {
            display: table;
            width: 100%;
            margin-bottom: 20px;
            border-collapse: separate;
            border-spacing: 10px 0;
        }

        .info-card {
            display: table-cell;
            background: #F9FAFB;
            border: 1px solid #E5E7EB;
            border-radius: 8px;
            padding: 8px 10px;
            width: 25%;
            vertical-align: top;
        }

        .info-card-label {
            font-size: 9px;
            color: #6B7280;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 2px;
            font-weight: 600;
        }

        .info-card-value {
            font-size: 11px;
            font-weight: bold;
            color: #1F2937;
        }

        /* Price Banner */
        .price-banner {
            background: linear-gradient(135deg, #FEF3C7 0%, #FDE68A 100%);
            border-left: 4px solid #DC2626;
            padding: 15px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            display: table;
            width: 100%;
        }

        .price-content {
            display: table-cell;
            vertical-align: middle;
        }

        .price-label {
            font-size: 10px;
            color: #92400E;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .price-value {
            font-size: 24px;
            font-weight: bold;
            color: #DC2626;
            margin-top: 3px;
        }

        .price-value del {
            color: #9CA3AF;
            font-size: 18px;
            margin-right: 8px;
            text-decoration: line-through;
        }

        .price-note {
            font-size: 9px;
            color: #78716C;
            margin-top: 3px;
        }

        /* Section Styling */
        .section {
            margin-bottom: 25px;
            page-break-inside: avoid;
        }

        .section-header {
            background: #DC2626;
            color: white;
            padding: 10px 15px;
            border-radius: 8px 8px 0 0;
            margin-bottom: 0;
        }

        .section-title {
            font-size: 14px;
            font-weight: bold;
            margin: 0;
        }

        .section-content {
            background: white;
            border: 1px solid #E5E7EB;
            border-top: none;
            padding: 15px;
            border-radius: 0 0 8px 8px;
        }

        .section-text {
            color: #4B5563;
            line-height: 1.7;
            text-align: justify;
        }

        /* Available Dates Section */
        .dates-grid {
            display: table;
            width: 100%;
            border-collapse: separate;
            border-spacing: 8px;
        }

        .date-card {
            display: table-cell;
            background: #FEF2F2;
            border: 2px solid #FECACA;
            border-radius: 8px;
            padding: 12px;
            text-align: center;
            width: 33.33%;
        }

        .date-range {
            font-size: 11px;
            font-weight: bold;
            color: #DC2626;
            margin-bottom: 5px;
        }

        .date-separator {
            color: #DC2626;
            margin: 0 5px;
        }

        .date-duration {
            font-size: 9px;
            color: #991B1B;
            background: #FEE2E2;
            padding: 3px 8px;
            border-radius: 12px;
            display: inline-block;
            margin-top: 5px;
        }

        /* Itinerary Items */
        .itinerary-item {
            background: #F9FAFB;
            border-left: 4px solid #DC2626;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 0 8px 8px 0;
            page-break-inside: avoid;
            position: relative;
        }

        .day-badge {
            background: #DC2626;
            color: white;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: bold;
            display: inline-block;
            margin-bottom: 8px;
        }

        .day-title {
            font-size: 13px;
            font-weight: bold;
            color: #1F2937;
            margin-bottom: 10px;
        }

        .day-image {
            float: right;
            width: 200px;
            height: 150px;
            object-fit: cover;
            border-radius: 8px;
            margin-left: 15px;
            margin-bottom: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .day-description {
            color: #4B5563;
            line-height: 1.7;
            text-align: justify;
            margin-bottom: 10px;
        }

        .day-details {
            clear: both;
            margin-top: 12px;
            padding-top: 12px;
            border-top: 1px dashed #D1D5DB;
        }

        .detail-tag {
            display: inline-block;
            background: white;
            border: 1px solid #E5E7EB;
            padding: 5px 10px;
            border-radius: 6px;
            margin-right: 8px;
            margin-bottom: 5px;
            font-size: 10px;
        }

        .detail-tag-icon {
            color: #DC2626;
            margin-right: 5px;
        }

        /* Included/Excluded Lists */
        .two-column-grid {
            display: table;
            width: 100%;
            border-collapse: separate;
            border-spacing: 15px 0;
        }

        .column {
            display: table-cell;
            width: 50%;
            vertical-align: top;
        }

        .list-header {
            font-size: 12px;
            font-weight: bold;
            margin-bottom: 10px;
            padding-bottom: 8px;
            border-bottom: 2px solid;
        }

        .list-header.included {
            color: #059669;
            border-color: #059669;
        }

        .list-header.excluded {
            color: #DC2626;
            border-color: #DC2626;
        }

        .list-item {
            padding: 6px 0;
            font-size: 10px;
            color: #4B5563;
            line-height: 1.5;
        }

        .list-item.included::before {
            content: "✓ ";
            color: #059669;
            font-weight: bold;
            margin-right: 5px;
        }

        .list-item.excluded::before {
            content: "✗ ";
            color: #DC2626;
            font-weight: bold;
            margin-right: 5px;
        }

        /* Extra Services Section */
        .extras-grid {
            display: table;
            width: 100%;
            border-collapse: collapse;
        }

        .extra-item {
            display: table-row;
            border-bottom: 1px solid #E5E7EB;
        }

        .extra-name {
            display: table-cell;
            padding: 10px;
            font-size: 11px;
            color: #1F2937;
        }

        .extra-price {
            display: table-cell;
            padding: 10px;
            text-align: right;
            font-weight: bold;
            color: #DC2626;
            font-size: 11px;
        }

        /* Room Types */
        .room-card {
            background: #F9FAFB;
            border: 1px solid #E5E7EB;
            border-radius: 8px;
            padding: 12px;
            margin-bottom: 10px;
        }

        .room-name {
            font-size: 12px;
            font-weight: bold;
            color: #1F2937;
            margin-bottom: 5px;
        }

        .room-details {
            font-size: 10px;
            color: #6B7280;
        }

        /* Footer */
        .pdf-footer {
            margin-top: 30px;
            padding-top: 15px;
            border-top: 2px solid #E5E7EB;
            text-align: center;
        }

        .footer-logo {
            max-width: 100px;
            margin-bottom: 10px;
            opacity: 0.7;
        }

        .footer-text {
            font-size: 9px;
            color: #6B7280;
            margin: 3px 0;
        }

        .footer-contact {
            font-size: 10px;
            color: #DC2626;
            font-weight: 600;
            margin: 5px 0;
        }

        /* Highlight Box */
        .highlight-box {
            background: #FEF3C7;
            border-left: 4px solid #F59E0B;
            padding: 12px 15px;
            border-radius: 0 8px 8px 0;
            margin: 15px 0;
        }

        .highlight-text {
            font-size: 10px;
            color: #92400E;
            font-style: italic;
        }

        /* Page Break Control */
        @page {
            margin: 15mm;
        }

        .page-break {
            page-break-after: always;
        }

        .no-break {
            page-break-inside: avoid;
        }
    </style>
</head>

<body>
    <div class="pdf-container">
        <!-- Professional Header -->
        <div class="pdf-header">
            <div class="header-content">
                <div class="logo-section">
                    <?php if(isset($general_setting->logo) && $general_setting->logo && file_exists(public_path($general_setting->logo))): ?>
                        <img src="<?php echo e(public_path($general_setting->logo)); ?>" alt="Logo" class="logo-container">
                    <?php endif; ?>
                    <div class="app-name"><?php echo e($general_setting->app_name ?? 'Tour Agency'); ?></div>
                </div>
                <div class="header-date">
                    <strong>Tour Plan Document</strong><br>
                    Generated: <?php echo e(now()->format('d M Y')); ?>

                </div>
            </div>
        </div>

        <!-- Images Grid Section - Two Images Side by Side -->
        <?php
            $thumbnails = $service->media->where('is_thumbnail', 1)->sortBy('display_order')->values();
            $nonThumbnails = $service->media->where('is_thumbnail', 0)->sortBy('display_order')->values();
            $allImages = collect([$thumbnails->first()])->concat($nonThumbnails->take(1))->filter();
        ?>

        <?php if($allImages->count() > 0): ?>
            <div class="images-grid-section">
                <?php if($allImages->count() == 1): ?>
                    <!-- Single Image Layout -->
                    <div class="single-image-container">
                        <img class="grid-image-full" src="<?php echo e(public_path('storage/' . $allImages[0]->file_path)); ?>"
                            alt="<?php echo e(optional($service->translation)->title ?? ''); ?>">
                    </div>
                <?php else: ?>
                    <!-- Two Images Layout -->
                    <div class="two-images-container">
                        <div class="image-left">
                            <img class="grid-image-half" src="<?php echo e(public_path('storage/' . $allImages[0]->file_path)); ?>"
                                alt="Image 1">
                        </div>
                        <div class="image-right">
                            <img class="grid-image-half" src="<?php echo e(public_path('storage/' . $allImages[1]->file_path)); ?>"
                                alt="Image 2">
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <!-- Service Title Bar -->
        <div class="title-bar">
            <h1 class="service-title-main"><?php echo e(optional($service->translation)->title ?? $service->title); ?></h1>
            <?php if($service->location): ?>
                <div class="service-location-main">📍 <?php echo e($service->location); ?></div>
            <?php endif; ?>
        </div>

        <!-- Info Cards -->
        <div class="info-cards">
            <?php if($service->duration): ?>
                <div class="info-card">
                    <div class="info-card-label">Duration</div>
                    <div class="info-card-value"><?php echo e($service->duration); ?></div>
                </div>
            <?php endif; ?>

            <?php if($service->serviceType): ?>
                <div class="info-card">
                    <div class="info-card-label">Tour Type</div>
                    <div class="info-card-value"><?php echo e($service->serviceType->name); ?></div>
                </div>
            <?php endif; ?>

            <?php if($service->group_size): ?>
                <div class="info-card">
                    <div class="info-card-label">Group Size</div>
                    <div class="info-card-value"><?php echo e($service->group_size); ?></div>
                </div>
            <?php endif; ?>

            <?php if($service->languages && is_array($service->languages) && count($service->languages) > 0): ?>
                <div class="info-card">
                    <div class="info-card-label">Languages</div>
                    <div class="info-card-value"><?php echo e(implode(', ', $service->languages)); ?></div>
                </div>
            <?php endif; ?>
        </div>

        <!-- Price Banner -->
        <div class="price-banner">
            <div class="price-content">
                <div class="price-label">Starting From</div>
                <div class="price-value"><?php echo $service->adult_price_display; ?></div>
                <div class="price-note">per person</div>
            </div>
        </div>

        <!-- About Section -->
        <?php if(optional($service->translation)->short_description): ?>
            <div class="section no-break">
                <div class="section-header">
                    <h3 class="section-title"><?php echo e(__('translate.About This Tour')); ?></h3>
                </div>
                <div class="section-content">
                    <div class="section-text">
                        <?php echo strip_tags($service->translation->short_description); ?>

                    </div>
                </div>
            </div>
        <?php endif; ?>

        <!-- Available Dates Section -->
        <?php if($service->availability_periods && $service->availability_periods->count() > 0): ?>
            <div class="section no-break" style="margin-bottom: 15px;">
                <div class="section-header">
                    <h3 class="section-title">📅 Available Departure Dates</h3>
                </div>
                <div class="section-content" style="padding-bottom: 10px;">
                    <div class="dates-grid">
                        <?php $__currentLoopData = $service->availability_periods->take(6); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $period): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $startDate = \Carbon\Carbon::parse($period->start_date);
                                $endDate = \Carbon\Carbon::parse($period->end_date);
                                $days = $startDate->diffInDays($endDate) + 1;
                            ?>
                            <div class="date-card">
                                <div class="date-range">
                                    <?php echo e($startDate->format('d M')); ?>

                                    <span class="date-separator">→</span>
                                    <?php echo e($endDate->format('d M Y')); ?>

                                </div>
                                <div class="date-duration">
                                    🕐 <?php echo e($days); ?> <?php echo e($days == 1 ? 'day' : 'days'); ?>

                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php if($service->availability_periods->count() > 6): ?>
                        <div class="highlight-box" style="margin-top: 10px; margin-bottom: 0;">
                            <div class="highlight-text">
                                + <?php echo e($service->availability_periods->count() - 6); ?> more dates available. Contact us for full
                                schedule.
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>

        <!-- Tour Plan Section -->
        <?php if($service->itineraries && $service->itineraries->count() > 0): ?>
            <div class="section" style="margin-top: 15px;">
                <div class="section-header">
                    <h3 class="section-title">🗺️ Detailed Itinerary</h3>
                </div>
                <div class="section-content">
                    <?php if($service->tour_plan_sub_title): ?>
                        <div class="highlight-box">
                            <div class="highlight-text"><?php echo e($service->tour_plan_sub_title); ?></div>
                        </div>
                    <?php endif; ?>

                    <?php $__currentLoopData = $service->itineraries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itinerary): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="itinerary-item">
                            <span class="day-badge">Day <?php echo e($itinerary->day_number); ?></span>
                            <div class="day-title"><?php echo e($itinerary->title); ?></div>

                            <?php if($itinerary->image && file_exists(public_path('storage/' . $itinerary->image))): ?>
                                <img class="day-image" src="<?php echo e(public_path('storage/' . $itinerary->image)); ?>"
                                    alt="Day <?php echo e($itinerary->day_number); ?>">
                            <?php endif; ?>

                            <?php if($itinerary->description): ?>
                                <div class="day-description">
                                    <?php echo strip_tags($itinerary->description); ?>

                                </div>
                            <?php endif; ?>

                            <?php if($itinerary->location || $itinerary->duration || $itinerary->meal_included): ?>
                                <div class="day-details">
                                    <?php if($itinerary->location): ?>
                                        <span class="detail-tag">
                                            <span class="detail-tag-icon">📍</span> <?php echo e($itinerary->location); ?>

                                        </span>
                                    <?php endif; ?>
                                    <?php if($itinerary->duration): ?>
                                        <span class="detail-tag">
                                            <span class="detail-tag-icon">⏱</span> <?php echo e($itinerary->duration); ?>

                                        </span>
                                    <?php endif; ?>
                                    <?php if($itinerary->meal_included): ?>
                                        <span class="detail-tag">
                                            <span class="detail-tag-icon">🍽</span> <?php echo e($itinerary->meal_included); ?>

                                        </span>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        <?php endif; ?>

        <!-- Included/Excluded Section -->
        <?php if($service->included || $service->excluded): ?>
            <div class="section no-break">
                <div class="section-header">
                    <h3 class="section-title">✓ What's Included & Excluded</h3>
                </div>
                <div class="section-content">
                    <div class="two-column-grid">
                        <?php if($service->included && json_decode($service->included)): ?>
                            <div class="column">
                                <div class="list-header included">✓ Included</div>
                                <?php $__currentLoopData = json_decode($service->included); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="list-item included"><?php echo e($item); ?></div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php endif; ?>

                        <?php if($service->excluded && json_decode($service->excluded)): ?>
                            <div class="column">
                                <div class="list-header excluded">✗ Excluded</div>
                                <?php $__currentLoopData = json_decode($service->excluded); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="list-item excluded"><?php echo e($item); ?></div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <!-- Extra Services Section -->
        <?php if($service->extraCharges && $service->extraCharges->count() > 0): ?>
            <div class="section no-break">
                <div class="section-header">
                    <h3 class="section-title">➕ Optional Add-Ons</h3>
                </div>
                <div class="section-content">
                    <div class="extras-grid">
                        <?php $__currentLoopData = $service->extraCharges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $extra): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="extra-item">
                                <div class="extra-name"><?php echo e($extra->name); ?></div>
                                <div class="extra-price"><?php echo e(currency($extra->price)); ?></div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <!-- Footer -->
        <div class="pdf-footer">
            <?php if(isset($general_setting->logo) && $general_setting->logo && file_exists(public_path($general_setting->logo))): ?>
                <img src="<?php echo e(public_path($general_setting->logo)); ?>" alt="Logo" class="footer-logo">
            <?php endif; ?>
            <div class="footer-text"><strong><?php echo e($general_setting->app_name ?? 'Tour Agency'); ?></strong></div>
            <?php if(isset($general_setting->contact_message_mail) && $general_setting->contact_message_mail): ?>
                <div class="footer-contact">📧 <?php echo e($general_setting->contact_message_mail); ?></div>
            <?php endif; ?>
            <?php if(isset($general_setting->phone) && $general_setting->phone): ?>
                <div class="footer-contact">📞 <?php echo e($general_setting->phone); ?></div>
            <?php endif; ?>
            <div class="footer-text" style="margin-top: 10px;">
                This document was generated on <?php echo e(now()->format('d M Y, H:i')); ?>

            </div>
        </div>
    </div>
</body>

</html><?php /**PATH D:\xampp\htdocs\archive\archive\Modules/TourBooking\resources/views/front/services/tour-plan-pdf.blade.php ENDPATH**/ ?>