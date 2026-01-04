<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e(optional($service->translation)->title ?? $service->title); ?> - Tour Plan</title>
    <style>
        /* PDF Styling */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'DejaVu Sans', 'Helvetica Neue', Helvetica, Arial, sans-serif;
            margin: 0;
            padding: 20px;
            font-size: 12px;
            line-height: 1.5;
            color: #333;
            background-color: #fff;
        }

        .pdf-container {
            max-width: 100%;
            margin: 0 auto;
        }

        /* Header */
        .pdf-header {
            padding: 15px 0;
            border-bottom: 2px solid #560CE3;
            margin-bottom: 20px;
        }

        .header-content {
            width: 100%;
        }

        .logo-container {
            text-align: center;
            margin-bottom: 10px;
        }

        .logo-container img {
            max-height: 50px;
            max-width: 150px;
        }

        .app-name {
            font-size: 14px;
            color: #560CE3;
            font-weight: bold;
            text-align: center;
            margin-top: 5px;
        }

        /* Service Info */
        .service-header {
            background: linear-gradient(135deg, #560CE3 0%, #8B5CF6 100%);
            color: white;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .service-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .service-image {
            width: 100%;
            max-height: 200px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .service-meta {
            margin-bottom: 15px;
        }

        .service-meta-item {
            display: inline-block;
            margin-right: 20px;
            margin-bottom: 5px;
        }

        .service-meta-item i {
            margin-right: 5px;
        }

        .price-box {
            background-color: rgba(255, 255, 255, 0.2);
            padding: 10px 15px;
            border-radius: 5px;
            display: inline-block;
        }

        .price-label {
            font-size: 11px;
            opacity: 0.9;
        }

        .price-value {
            font-size: 18px;
            font-weight: bold;
        }

        /* Tour Plan Section */
        .tour-plan-section {
            margin-top: 25px;
        }

        .section-title {
            font-size: 16px;
            font-weight: bold;
            color: #560CE3;
            margin-bottom: 15px;
            padding-bottom: 8px;
            border-bottom: 2px solid #560CE3;
        }

        .tour-plan-subtitle {
            color: #666;
            margin-bottom: 15px;
            font-style: italic;
        }

        /* Day Items */
        .day-item {
            background-color: #f8f9fa;
            border-left: 4px solid #560CE3;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 0 8px 8px 0;
            page-break-inside: avoid;
        }

        .day-header {
            margin-bottom: 10px;
        }

        .day-number {
            background-color: #560CE3;
            color: white;
            padding: 3px 10px;
            border-radius: 15px;
            font-size: 11px;
            font-weight: bold;
            display: inline-block;
            margin-right: 10px;
        }

        .day-title {
            font-size: 14px;
            font-weight: bold;
            color: #333;
            display: inline;
        }

        .day-content {
            margin-top: 10px;
        }

        .day-image {
            max-width: 150px;
            max-height: 100px;
            border-radius: 5px;
            float: right;
            margin-left: 15px;
            margin-bottom: 10px;
        }

        .day-description {
            color: #555;
            line-height: 1.6;
            text-align: justify;
        }

        .day-details {
            margin-top: 10px;
            padding-top: 10px;
            border-top: 1px dashed #ddd;
            clear: both;
        }

        .day-detail-item {
            display: inline-block;
            margin-right: 20px;
            margin-bottom: 5px;
            font-size: 11px;
            color: #666;
        }
        .day-detail-item strong {
            color: #333;
        }

        .meal-badge {
            background-color: #28a745;
            color: white;
            padding: 2px 8px;
            border-radius: 10px;
            font-size: 10px;
        }

        /* Included/Excluded */
        .included-excluded {
            margin-top: 25px;
            page-break-inside: avoid;
        }

        .included-excluded-grid {
            width: 100%;
        }

        .included-column, .excluded-column {
            width: 48%;
            display: inline-block;
            vertical-align: top;
        }

        .included-column {
            margin-right: 2%;
        }

        .included-title {
            color: #28a745;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .excluded-title {
            color: #dc3545;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .list-item {
            padding: 5px 0;
            font-size: 11px;
        }

        .list-item.included::before {
            content: "✓ ";
            color: #28a745;
            font-weight: bold;
        }

        .list-item.excluded::before {
            content: "✗ ";
            color: #dc3545;
            font-weight: bold;
        }

        /* Footer */
        .pdf-footer {
            margin-top: 30px;
            padding-top: 15px;
            border-top: 1px solid #ddd;
            text-align: center;
            font-size: 10px;
            color: #777;
        }

        .pdf-footer p {
            margin: 3px 0;
        }

        /* Print styles */
        @page {
            margin: 15mm;
        }
    </style>
</head>

<body>
    <div class="pdf-container">
        <!-- Header with Logo -->
        <div class="pdf-header">
            <div class="header-content">
                <div class="logo-container">
                    <?php if(isset($general_setting->logo) && $general_setting->logo && file_exists(public_path($general_setting->logo))): ?>
                        <img src="<?php echo e(public_path($general_setting->logo)); ?>" alt="Logo">
                    <?php endif; ?>
                    <div class="app-name"><?php echo e($general_setting->app_name ?? 'Tour Agency'); ?></div>
                </div>
            </div>
        </div>

        <!-- Service Image -->
        <?php
            $thumbnail = $service->media->where('is_thumbnail', 1)->first();
        ?>
        <?php if(isset($thumbnail) && $thumbnail && file_exists(public_path('storage/' . $thumbnail->file_path))): ?>
            <img class="service-image" src="<?php echo e(public_path('storage/' . $thumbnail->file_path)); ?>" alt="<?php echo e(optional($service->translation)->title ?? ''); ?>">
        <?php endif; ?>

        <!-- Service Header -->
        <div class="service-header">
            <div class="service-title"><?php echo e(optional($service->translation)->title ?? $service->title); ?></div>

            <div class="service-meta">
                <?php if($service->location): ?>
                    <span class="service-meta-item">📍 <?php echo e($service->location); ?></span>
                <?php endif; ?>
                <?php if($service->duration): ?>
                    <span class="service-meta-item">⏱ <?php echo e($service->duration); ?></span>
                <?php endif; ?>
                <?php if($service->serviceType): ?>
                    <span class="service-meta-item">📦 <?php echo e($service->serviceType->name); ?></span>
                <?php endif; ?>
                <?php if($service->group_size): ?>
                    <span class="service-meta-item">👥 <?php echo e($service->group_size); ?></span>
                <?php endif; ?>
                <?php if($service->languages && is_array($service->languages) && count($service->languages) > 0): ?>
                    <span class="service-meta-item">🌐 <?php echo e(implode(', ', $service->languages)); ?></span>
                <?php endif; ?>
            </div>

            <div class="price-box">
                <div class="price-label"><?php echo e(__('translate.From')); ?></div>
                <div class="price-value"><?php echo e(currency($service->price_per_person ?? $service->price_from ?? 0)); ?> / <?php echo e(__('translate.Person')); ?></div>
            </div>
        </div>

        <!-- About Section -->
        <?php if(optional($service->translation)->short_description): ?>
            <div class="tour-plan-section">
                <div class="section-title"><?php echo e(__('translate.About This Tour')); ?></div>
                <div class="day-description">
                    <?php echo strip_tags($service->translation->short_description); ?>

                </div>
            </div>
        <?php endif; ?>

        <!-- Tour Plan Section -->
        <div class="tour-plan-section">
            <div class="section-title"><?php echo e(__('translate.Tour Plan')); ?></div>

            <?php if($service->tour_plan_sub_title): ?>
                <div class="tour-plan-subtitle"><?php echo e($service->tour_plan_sub_title); ?></div>
            <?php endif; ?>

            <?php if($service->itineraries && $service->itineraries->count() > 0): ?>
                <?php $__currentLoopData = $service->itineraries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itinerary): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="day-item">
                        <div class="day-header">
                            <span class="day-number">Day <?php echo e($itinerary->day_number); ?></span>
                            <span class="day-title"><?php echo e($itinerary->title); ?></span>
                        </div>

                        <div class="day-content">
                            <?php if($itinerary->image && file_exists(public_path('storage/' . $itinerary->image))): ?>
                                <img class="day-image" src="<?php echo e(public_path('storage/' . $itinerary->image)); ?>" alt="Day <?php echo e($itinerary->day_number); ?>">
                            <?php endif; ?>

                            <?php if($itinerary->description): ?>
                                <div class="day-description">
                                    <?php echo strip_tags($itinerary->description); ?>

                                </div>
                            <?php endif; ?>

                            <?php if($itinerary->location || $itinerary->duration || $itinerary->meal_included): ?>
                                <div class="day-details">
                                    <?php if($itinerary->location): ?>
                                        <span class="day-detail-item">
                                            <strong>📍 Location:</strong> <?php echo e($itinerary->location); ?>

                                        </span>
                                    <?php endif; ?>
                                    <?php if($itinerary->duration): ?>
                                        <span class="day-detail-item">
                                            <strong>⏱ Duration:</strong> <?php echo e($itinerary->duration); ?>

                                        </span>
                                    <?php endif; ?>
                                    <?php if($itinerary->meal_included): ?>
                                        <span class="day-detail-item">
                                            <strong>🍽 Meal:</strong>
                                            <span class="meal-badge"><?php echo e($itinerary->meal_included); ?></span>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>

        <!-- Included/Excluded Section -->
        <?php if($service->included || $service->excluded): ?>
            <div class="included-excluded">
                <div class="section-title"><?php echo e(__('translate.Included/Excluded')); ?></div>
                <div class="included-excluded-grid">
                    <?php if($service->included && json_decode($service->included)): ?>
                        <div class="included-column">
                            <div class="included-title">✓ <?php echo e(__('translate.Included')); ?></div>
                            <?php $__currentLoopData = json_decode($service->included); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="list-item included"><?php echo e($item); ?></div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>

                    <?php if($service->excluded && json_decode($service->excluded)): ?>
                        <div class="excluded-column">
                            <div class="excluded-title">✗ <?php echo e(__('translate.Excluded')); ?></div>
                            <?php $__currentLoopData = json_decode($service->excluded); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="list-item excluded"><?php echo e($item); ?></div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>

        <!-- Footer -->
        <div class="pdf-footer">
            <p><strong><?php echo e($general_setting->app_name ?? 'Tour Agency'); ?></strong></p>
            <?php if(isset($general_setting->contact_message_mail) && $general_setting->contact_message_mail): ?>
                <p>📧 <?php echo e($general_setting->contact_message_mail); ?></p>
            <?php endif; ?>
            <?php if(isset($general_setting->phone) && $general_setting->phone): ?>
                <p>📞 <?php echo e($general_setting->phone); ?></p>
            <?php endif; ?>
            <p style="margin-top: 10px;"><?php echo e(__('translate.Generated on')); ?>: <?php echo e(now()->format('d M Y, H:i')); ?></p>
        </div>
    </div>
</body>

</html><?php /**PATH D:\xampp\htdocs\archive\archive\Modules/TourBooking\resources/views/front/services/tour-plan-pdf.blade.php ENDPATH**/ ?>