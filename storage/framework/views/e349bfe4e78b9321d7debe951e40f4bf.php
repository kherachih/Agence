

<?php $__env->startSection('title'); ?>
    <title>Services</title>
    <meta name="title" content="Services">
    <meta name="description" content="Services">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('front-content'); ?>

    <?php $__env->startPush('style_section'); ?>
    <style>
        /* ============================================
           NEW MONTH SELECTOR - ADVENTURE.COM STYLE
           ============================================ */
        
        .ao-month-selector-wrapper {
            background: #ffffff;
            border-radius: 14px;
            padding: 14px;
            border: 1px solid #e8e8e8;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.04);
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        }
        
        /* --- Year Navigation --- */
        .ao-month-selector__year-nav {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 14px;
            margin-bottom: 12px;
        }
        
        .ao-month-selector__year-btn {
            width: 32px;
            height: 32px;
            border: 1px solid #e8e8e8;
            border-radius: 50%;
            background: #ffffff;
            cursor: pointer;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #666;
            flex-shrink: 0;
        }
        
        .ao-month-selector__year-btn:hover:not(:disabled) {
            border-color: var(--tg-theme-primary, #BE3144);
            color: var(--tg-theme-primary, #BE3144);
            background: #fff5f5;
        }
        
        .ao-month-selector__year-btn:disabled {
            opacity: 0.3;
            cursor: not-allowed;
        }
        
        .ao-month-selector__year-btn i {
            font-size: 12px;
        }
        
        .ao-month-selector__year-display {
            min-width: 100px;
            text-align: center;
        }
        
        .ao-month-selector__current-year {
            font-size: 17px;
            font-weight: 700;
            color: #1a1a1a;
        }
        
        /* --- Year Indicators (Dots) --- */
        .ao-month-selector__year-indicators {
            display: flex;
            justify-content: center;
            gap: 6px;
            margin-bottom: 10px;
        }
        
        .ao-month-selector__year-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #d1d5db;
            cursor: pointer;
            transition: all 0.2s ease;
        }
        
        .ao-month-selector__year-dot.active {
            background: var(--tg-theme-primary, #BE3144);
            width: 24px;
            border-radius: 4px;
        }
        
        .ao-month-selector__year-dot:hover:not(.active) {
            background: #9ca3af;
        }
        
        /* --- Months Grid Container --- */
        .ao-month-selector__grid-container {
            overflow: visible;
            padding: 4px 2px;
            margin: 0;
        }
        
        /* --- Year Grids --- */
        .ao-month-selector__year-grid {
            display: none;
            grid-template-columns: repeat(3, 1fr);
            gap: 8px;
            padding: 2px;
        }
        
        .ao-month-selector__year-grid.active {
            display: grid;
            animation: fadeInMonths 0.3s ease;
        }
        
        @keyframes fadeInMonths {
            from { opacity: 0; transform: translateX(20px); }
            to { opacity: 1; transform: translateX(0); }
        }
        
        /* --- Month Card (New Design) --- */
        .ao-month-selector__month-card {
            position: relative;
            background: #ffffff;
            border: 1.5px solid #e8e8e8;
            border-radius: 10px;
            padding: 10px 6px;
            text-align: center;
            cursor: pointer;
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
            min-height: 56px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 3px;
        }
        
        .ao-month-selector__month-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2.5px;
            border-radius: 10px 10px 0 0;
            background: #e8e8e8;
            transition: all 0.25s ease;
        }
        
        /* Available State */
        .ao-month-selector__month-card.available {
            border-color: #e8e8e8;
            background: #ffffff;
        }
        
        .ao-month-selector__month-card.available::before {
            background: linear-gradient(90deg, #10b981, #3b82f6);
        }
        
        .ao-month-selector__month-card.available:hover {
            border-color: #10b981;
            transform: translateY(-3px);
            box-shadow: 0 6px 16px rgba(16, 185, 129, 0.15);
        }
        
        /* Unavailable State */
        .ao-month-selector__month-card.unavailable {
            background: #f8f9fa;
            border-color: #f0f0f0;
            cursor: not-allowed;
            opacity: 0.5;
        }
        
        .ao-month-selector__month-card.unavailable::before {
            background: #d1d5db;
        }
        
        .ao-month-selector__month-card.unavailable:hover {
            transform: none;
            box-shadow: none;
        }
        
        /* Discounted State */
        .ao-month-selector__month-card.discounted {
            border-color: #f59e0b;
            background: linear-gradient(145deg, #ffffff 0%, #fffbeb 100%);
        }
        
        .ao-month-selector__month-card.discounted::before {
            background: linear-gradient(90deg, #f59e0b, #ef4444);
        }
        
        .ao-month-selector__month-card.discounted:hover {
            border-color: #ef4444;
            transform: translateY(-3px);
            box-shadow: 0 6px 16px rgba(245, 158, 11, 0.2);
        }
        
        /* Selected State */
        .ao-month-selector__month-card.selected {
            border-color: var(--tg-theme-primary, #BE3144);
            background: linear-gradient(145deg, #fff5f5 0%, #ffe5e5 100%);
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(190, 49, 68, 0.2);
        }
        
        .ao-month-selector__month-card.selected::before {
            background: linear-gradient(90deg, var(--tg-theme-primary, #BE3144), #c0262c);
            height: 3px;
        }
        
        .ao-month-selector__month-card.selected::after {
            content: '\f00c';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            position: absolute;
            top: 4px;
            right: 4px;
            width: 16px;
            height: 16px;
            background: var(--tg-theme-primary, #BE3144);
            color: white;
            border-radius: 50%;
            font-size: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 6px rgba(190, 49, 68, 0.3);
        }
        
        /* Month Card Content */
        .ao-month-selector__month-name {
            font-size: 11px;
            font-weight: 700;
            color: #1a1a1a;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin: 0;
            line-height: 1.2;
        }
        
        .ao-month-selector__month-card.selected .ao-month-selector__month-name {
            color: var(--tg-theme-primary, #BE3144);
        }
        
        .ao-month-selector__month-card.unavailable .ao-month-selector__month-name {
            color: #9ca3af;
        }
        
        .ao-month-selector__month-price {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 2px;
        }
        
        .ao-month-selector__price-original {
            font-size: 9px;
            font-weight: 500;
            color: #999;
            text-decoration: line-through;
        }
        
        .ao-month-selector__price-current {
            font-size: 10px;
            font-weight: 700;
            color: var(--tg-theme-primary, #BE3144);
        }
        
        .ao-month-selector__price-current.discounted {
            color: #ef4444;
        }
        
        .ao-month-selector__month-card.unavailable .ao-month-selector__month-price {
            display: none;
        }
        
        /* Responsive adjustments */
        @media (max-width: 992px) {
            .ao-month-selector__year-grid {
                grid-template-columns: repeat(4, 1fr);
            }
        }
        
        @media (max-width: 768px) {
            .ao-month-selector__year-grid {
                grid-template-columns: repeat(3, 1fr);
            }
            
            .ao-month-selector__month-card {
                padding: 10px 6px;
            }
            
            .ao-month-selector__month-name {
                font-size: 11px;
            }
            
            .ao-month-selector__price-current {
                font-size: 10px;
            }
            
            .ao-month-selector__price-original {
                font-size: 8px;
            }
        }
        
        @media (max-width: 576px) {
            .ao-month-selector__year-grid {
                grid-template-columns: repeat(3, 1fr);
            }
            
            .ao-month-selector__month-card {
                padding: 8px 4px;
                min-height: 48px;
            }
            
            .ao-month-selector__current-year {
                font-size: 15px;
            }
            
            .ao-month-selector__year-nav {
                gap: 12px;
                margin-bottom: 10px;
            }
            
            .ao-month-selector__year-btn {
                width: 28px;
                height: 28px;
            }
        }
    
        /* --- Month Card - Clean Design --- */
        .month-card {
            position: relative;
            background: #ffffff;
            border: 2px solid #e8e8e8;
            border-radius: 16px;
            padding: 25px 15px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            min-height: 100px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }
        
        .month-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: #e8e8e8;
            transition: all 0.3s ease;
        }
        
        /* Available State */
        .month-card.available {
            border-color: #e8e8e8;
            background: #ffffff;
        }
        
        .month-card.available::before {
            background: linear-gradient(90deg, #10b981, #3b82f6);
        }
        
        .month-card.available:hover {
            border-color: #10b981;
            transform: translateY(-6px);
            box-shadow: 0 12px 28px rgba(16, 185, 129, 0.15);
        }
        
        /* Unavailable State */
        .month-card.unavailable {
            background: #f8f9fa;
            border-color: #f0f0f0;
            cursor: not-allowed;
            opacity: 0.6;
        }
        
        .month-card.unavailable::before {
            background: #d1d5db;
        }
        
        .month-card.unavailable:hover {
            transform: none;
            box-shadow: none;
        }
        
        /* Discounted State */
        .month-card.discounted {
            border-color: #f59e0b;
            background: linear-gradient(145deg, #ffffff 0%, #fffbeb 100%);
        }
        
        .month-card.discounted::before {
            background: linear-gradient(90deg, #f59e0b, #ef4444);
        }
        
        .month-card.discounted:hover {
            border-color: #ef4444;
            transform: translateY(-6px);
            box-shadow: 0 12px 28px rgba(245, 158, 11, 0.2);
        }
        
        /* Selected State */
        .month-card.selected {
            border-color: var(--tg-theme-primary, #BE3144);
            background: linear-gradient(145deg, #fff5f5 0%, #ffe5e5 100%);
            transform: translateY(-4px);
            box-shadow: 0 16px 32px rgba(190, 49, 68, 0.2);
        }
        
        .month-card.selected::before {
            background: linear-gradient(90deg, var(--tg-theme-primary, #BE3144), #c0262c);
            height: 5px;
        }
        
        .month-card.selected::after {
            content: '\f00c';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            position: absolute;
            top: 12px;
            right: 12px;
            width: 26px;
            height: 26px;
            background: var(--tg-theme-primary, #BE3144);
            color: white;
            border-radius: 50%;
            font-size: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 12px rgba(190, 49, 68, 0.3);
        }
    
        /* --- Month Card Content --- */
        .month-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 6px;
            width: 100%;
        }
        
        .month-name {
            font-size: 15px;
            font-weight: 700;
            color: #1a1a1a;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            margin: 0;
        }
        
        .month-card.selected .month-name {
            color: var(--tg-theme-primary, #BE3144);
        }
        
        .month-card.unavailable .month-name {
            color: #9ca3af;
        }
        
        .month-price {
            font-size: 13px;
            font-weight: 600;
            color: #6b7280;
            margin: 0;
        }
        
        .month-card.selected .month-price {
            color: var(--tg-theme-primary, #BE3144);
            font-weight: 700;
        }
        
        .month-card.discounted .month-price {
            color: #ef4444;
        }
        
        .month-card.unavailable .month-price {
            display: none;
        }
        
        /* Discount Badge */
        .discount-badge {
            font-size: 10px;
            font-weight: 700;
            padding: 4px 10px;
            border-radius: 12px;
            margin-top: 4px;
            display: inline-block;
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            color: white;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .month-card.unavailable .discount-badge {
            display: none;
        }
        
        /* Scrollbar Styling */
        .year-dropdown-menu::-webkit-scrollbar {
            width: 8px;
        }
        
        .year-dropdown-menu::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 4px;
        }
        
        .year-dropdown-menu::-webkit-scrollbar-thumb {
            background: #c1c1c1;
            border-radius: 4px;
        }
        
        .year-dropdown-menu::-webkit-scrollbar-thumb:hover {
            background: #a1a1a1;
        }
        
        /* Smooth transitions for all interactive elements */
        .month-card,
        .year-dropdown-toggle {
            will-change: transform, box-shadow;
        }
        
        /* Focus states for accessibility */
        .year-dropdown-toggle:focus {
            outline: none;
            border-color: var(--tg-theme-primary, #BE3144);
            box-shadow: 0 0 0 4px rgba(190, 49, 68, 0.1);
        }
        
        .month-card:focus {
            outline: none;
            border-color: var(--tg-theme-primary, #BE3144);
        }
        
        .month-card:focus-visible {
            outline: 2px solid var(--tg-theme-primary, #BE3144);
            outline-offset: 2px;
        }
    
    
    /* --- Selected Month Info Card --- */
    .selected-month-info {
        margin-top: 20px;
    }
    
    .selected-month-card {
        background: linear-gradient(145deg, #d4edda 0%, #c3e6cb 100%);
        border-radius: 14px;
        padding: 16px 18px;
        border: 1px solid rgba(40, 167, 69, 0.2);
        animation: slideUpFade 0.4s ease;
    }
    
    @keyframes slideUpFade {
        from {
            opacity: 0;
            transform: translateY(10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .selected-month-header {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 16px;
        font-weight: 700;
        color: #155724;
        margin-bottom: 10px;
    }
    
    .selected-month-header i {
        font-size: 20px;
        color: #28a745;
    }
    
    .selected-month-body {
        font-size: 14px;
        color: #1e7e34;
        line-height: 1.6;
    }
    
    .selected-month-body strong {
        color: #155724;
    }
    
    /* --- Period Price Info --- */
    .period-price-info {
        display: flex;
        gap: 15px;
        margin-top: 10px;
        flex-wrap: wrap;
        align-items: center;
    }
    
    .period-price-info .price-item {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 14px;
        background: rgba(255, 255, 255, 0.6);
        padding: 6px 12px;
        border-radius: 20px;
    }
    
    .period-price-info .price-item i {
        color: #28a745;
    }
    
    .period-price-info .price-item .original-price {
        text-decoration: line-through;
        color: #6c757d;
        font-size: 13px;
    }
    
    .period-price-info .price-item .discounted-price {
        color: #dc3545;
        font-weight: 700;
    }
    
    .period-price-info .badge {
        font-size: 11px;
        padding: 4px 10px;
        border-radius: 12px;
    }
    
    /* ============================================
       SELECTED MONTH SECTION V2 - BOTTOM DISPLAY
       ============================================ */
    
    .selected-month-section {
        animation: slideUpFade 0.5s ease;
    }
    
    .selected-month-card-v2 {
        background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%);
        border-radius: 16px;
        padding: 20px;
        border: 2px solid var(--tg-theme-primary, #BE3144);
        box-shadow: 0 8px 30px rgba(86, 12, 227, 0.15);
    }
    
    .selected-month-header-v2 {
        display: flex;
        align-items: center;
        gap: 12px;
        font-size: 18px;
        font-weight: 700;
        color: var(--tg-theme-primary, #BE3144);
        margin-bottom: 15px;
        padding-bottom: 12px;
        border-bottom: 1px dashed #dee2e6;
    }
    
    .selected-month-header-v2 i {
        font-size: 24px;
        color: var(--tg-theme-primary, #BE3144);
    }
    
    /* Period Info Summary */
    .period-info-summary {
        background: linear-gradient(145deg, #e3f2fd 0%, #bbdefb 100%);
        border-radius: 12px;
        padding: 12px 15px;
        margin-bottom: 15px;
        font-size: 13px;
        color: #1565c0;
    }
    
    .period-info-summary .info-row {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 6px;
    }
    
    .period-info-summary .info-row:last-child {
        margin-bottom: 0;
    }
    
    .period-info-summary i {
        color: #1976d2;
        width: 16px;
    }
    
    .period-info-summary strong {
        color: #0d47a1;
    }
    
    .period-info-summary .price-tag {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: white;
        padding: 4px 12px;
        border-radius: 20px;
        font-weight: 600;
        margin-top: 8px;
    }
    
    .period-info-summary .original-price {
        text-decoration: line-through;
        color: #999;
        font-size: 12px;
    }
    
    .period-info-summary .discounted-price {
        color: #dc3545;
        font-size: 14px;
    }
    
    /* Dates Calendar Section */
    .dates-calendar-section {
        margin-bottom: 15px;
    }
    
    .dates-calendar-label {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 14px;
        font-weight: 600;
        color: #495057;
        margin-bottom: 12px;
    }
    
    .dates-calendar-label i {
        color: var(--tg-theme-primary, #BE3144);
    }
    
    .dates-calendar-grid {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        gap: 6px;
        max-height: 280px;
        overflow-y: auto;
        padding: 5px;
    }
    
    @media (max-width: 576px) {
        .dates-calendar-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }
    
    .date-cell {
        aspect-ratio: 1;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        background: white;
        border: 2px solid #e9ecef;
        border-radius: 10px;
        cursor: pointer;
        transition: all 0.25s ease;
        padding: 4px;
    }
    
    .date-cell:hover {
        border-color: var(--tg-theme-primary, #BE3144);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(86, 12, 227, 0.15);
    }
    
    .date-cell.selected {
        background: linear-gradient(135deg, var(--tg-theme-primary, #BE3144) 0%, #7c3aed 100%);
        border-color: var(--tg-theme-primary, #BE3144);
        color: white;
        transform: scale(1.05);
        box-shadow: 0 6px 20px rgba(86, 12, 227, 0.3);
    }
    
    .date-cell .day-number {
        font-size: 16px;
        font-weight: 700;
        line-height: 1;
    }
    
    .date-cell .day-name {
        font-size: 9px;
        text-transform: uppercase;
        opacity: 0.8;
        margin-top: 2px;
    }
    
    .date-cell.selected .day-number,
    .date-cell.selected .day-name {
        color: white;
    }
    
    .date-cell.disabled {
        background: #f8f9fa;
        border-color: #e9ecef;
        color: #adb5bd;
        cursor: not-allowed;
        opacity: 0.6;
    }
    
    .date-cell.disabled:hover {
        transform: none;
        box-shadow: none;
        border-color: #e9ecef;
    }
    
    /* Selected Date Info */
    .selected-date-info {
        background: linear-gradient(145deg, #d4edda 0%, #c3e6cb 100%);
        border-radius: 12px;
        padding: 12px 15px;
        animation: slideUpFade 0.3s ease;
    }
    
    .selected-date-display {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 15px;
        font-weight: 600;
        color: #155724;
    }
    
    .selected-date-display i {
        font-size: 20px;
        color: #28a745;
    }
    
    /* Book Now Button States */
    #book-now-btn:disabled {
        opacity: 0.6;
        cursor: not-allowed;
        background: #6c757d;
    }
    
    #book-now-btn:not(:disabled) {
        animation: pulseButton 2s infinite;
    }
    
    @keyframes pulseButton {
        0%, 100% { box-shadow: 0 0 0 0 rgba(86, 12, 227, 0.4); }
        50% { box-shadow: 0 0 0 10px rgba(86, 12, 227, 0); }
    }
    
    /* ============================================
       AVAILABILITY SECTION - COMPACT & ELEGANT
       ============================================ */
    
    .tg-tour-availability-section {
        animation: slideUpFade 0.5s ease;
        margin-top: 20px;
    }
    
    .availability-section-card {
        background: #ffffff;
        border-radius: 12px;
        padding: 16px 20px;
        border: 1px solid #e9ecef;
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06);
    }
    
    .availability-section-header {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 12px;
        padding-bottom: 12px;
        border-bottom: 1px solid #f0f0f0;
    }
    
    .availability-section-header i {
        font-size: 20px;
        color: var(--tg-theme-primary, #BE3144);
        background: rgba(86, 12, 227, 0.08);
        width: 44px;
        height: 44px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .availability-title {
        font-size: 16px;
        font-weight: 700;
        color: #2d3436;
        margin: 0;
    }
    
    .availability-subtitle {
        font-size: 13px;
        color: #6c757d;
        margin: 2px 0 0;
    }
    
    /* Selected Month Summary - Compact */
    .selected-month-summary {
        background: #f8f9fa;
        border-radius: 8px;
        padding: 12px 14px;
        margin-bottom: 12px;
    }
    
    .month-summary-header {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 14px;
        font-weight: 600;
        color: #495057;
        margin-bottom: 8px;
    }
    
    .month-summary-header i {
        color: var(--tg-theme-primary, #BE3144);
        font-size: 14px;
    }
    
    .month-summary-details {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
    }
    
    .summary-item {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        background: white;
        padding: 5px 10px;
        border-radius: 16px;
        font-size: 12px;
        color: #495057;
        border: 1px solid #e9ecef;
    }
    
    .summary-item i {
        color: var(--tg-theme-primary, #BE3144);
        font-size: 11px;
    }
    
    .summary-item.price {
        background: #d4edda;
        border-color: #c3e6cb;
        color: #155724;
        font-weight: 600;
    }
    
    .summary-item.discount {
        background: #fff3cd;
        border-color: #ffecb3;
        color: #856404;
        font-weight: 600;
    }
    
    /* Available Periods - Compact List */
    .available-periods-container {
        margin-bottom: 12px;
    }
    
    .periods-label {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 13px;
        font-weight: 600;
        color: #495057;
        margin-bottom: 10px;
    }
    
    .periods-label i {
        color: var(--tg-theme-primary, #BE3144);
        font-size: 14px;
    }
    
    .periods-list {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }
    
    .period-card {
        background: white;
        border: 1px solid #e9ecef;
        border-radius: 8px;
        padding: 12px 14px;
        cursor: pointer;
        transition: all 0.2s ease;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
    }
    
    .period-card:hover {
        border-color: var(--tg-theme-primary, #BE3144);
        box-shadow: 0 2px 8px rgba(86, 12, 227, 0.1);
    }
    
    .period-card.selected {
        border-color: var(--tg-theme-primary, #BE3144);
        background: #f3f0ff;
    }
    
    .period-card.selected::after {
        content: '\f00c';
        font-family: 'Font Awesome 6 Free';
        font-weight: 900;
        position: absolute;
        top: 50%;
        right: 12px;
        transform: translateY(-50%);
        width: 22px;
        height: 22px;
        background: var(--tg-theme-primary, #BE3144);
        color: white;
        border-radius: 50%;
        font-size: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .period-card.selected {
        padding-right: 40px;
    }
    
    .period-info-left {
        flex: 1;
    }
    
    .period-dates-range {
        font-size: 14px;
        font-weight: 600;
        color: #2d3436;
        margin-bottom: 2px;
    }
    
    .period-duration {
        font-size: 11px;
        color: #6c757d;
        display: flex;
        align-items: center;
        gap: 4px;
    }
    
    .period-price-box {
        display: flex;
        align-items: center;
        gap: 8px;
        text-align: right;
    }
    
    .period-original-price {
        text-decoration: line-through;
        color: #adb5bd;
        font-size: 12px;
    }
    
    .period-current-price {
        font-size: 16px;
        font-weight: 700;
        color: var(--tg-theme-primary, #BE3144);
    }
    
    .period-discount-badge {
        background: #dc3545;
        color: white;
        font-size: 9px;
        font-weight: 700;
        padding: 2px 6px;
        border-radius: 8px;
    }
    
    /* Selected Period Final - Compact */
    .selected-period-final {
        background: #d4edda;
        border-radius: 8px;
        padding: 10px 14px;
        margin-bottom: 12px;
        animation: slideUpFade 0.3s ease;
    }
    
    .selected-period-highlight {
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .selected-period-highlight i {
        font-size: 18px;
        color: #28a745;
    }
    
    .period-label {
        display: block;
        font-size: 10px;
        color: #155724;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 1px;
    }
    
    .period-dates {
        display: block;
        font-size: 14px;
        font-weight: 600;
        color: #155724;
    }
    
    /* Passengers Selection - Compact */
    .passengers-selection {
        background: #f8f9fa;
        border-radius: 8px;
        padding: 12px;
        margin-bottom: 12px;
    }
    
    .passenger-label {
        display: block;
        font-size: 12px;
        font-weight: 600;
        color: #495057;
        margin-bottom: 6px;
    }
    
    .passenger-label small {
        color: #6c757d;
        font-weight: 400;
        margin-left: 3px;
        font-size: 10px;
    }
    
    .passenger-label i {
        color: var(--tg-theme-primary, #BE3144);
        margin-right: 4px;
        font-size: 12px;
    }
    
    .passenger-select {
        width: 100%;
        padding: 8px 10px;
        border: 1px solid #dee2e6;
        border-radius: 6px;
        font-size: 14px;
        background: white;
        cursor: pointer;
        transition: all 0.2s ease;
    }
    
    .passenger-select:focus {
        border-color: var(--tg-theme-primary, #BE3144);
        outline: none;
    }
    
    /* Total Cost Box - Compact */
    .total-cost-box {
        background: var(--tg-theme-primary, #BE3144);
        border-radius: 8px;
        padding: 12px 16px;
        color: white;
        margin-bottom: 12px;
    }
    
    .total-label {
        font-size: 13px;
        font-weight: 500;
        opacity: 0.9;
    }
    
    .total-amount {
        font-size: 20px;
        font-weight: 700;
    }
    
    /* Bottom Book Now Button - Compact */
    #bottom-book-now-btn {
        padding: 12px;
        font-size: 15px;
        font-weight: 600;
    }
    
    #bottom-book-now-btn:disabled {
        opacity: 0.5;
        cursor: not-allowed;
        background: #6c757d;
    }
    
    /* --- Scrollbar Styling for Dropdown ---
    .year-dropdown-menu::-webkit-scrollbar {
        width: 6px;
    }
    
    .year-dropdown-menu::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 3px;
    }
    
    .year-dropdown-menu::-webkit-scrollbar-thumb {
        background: #c1c1c1;
        border-radius: 3px;
    }
    
    .year-dropdown-menu::-webkit-scrollbar-thumb:hover {
        background: #a1a1a1;
    }
    
    /* --- Legacy Styles (kept for compatibility) --- */
    .month-selector-container {
        display: none;
    }
</style>
<?php $__env->stopPush(); ?>

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
                                <li><a href="<?php echo e(route('front.tourbooking.services')); ?>"><?php echo e(__('translate.Services')); ?></a>
                                </li>
                                <li><i class="fa-sharp fa-solid fa-angle-right"></i></li>
                                <li><span>
                                        <?php echo e($service?->translation?->title); ?>

                                    </span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- tg-breadcrumb-area-end -->


        <!-- tg-tour-details-area-start -->
        <div class="tg-tour-details-area pt-35 pb-25">
            <div class="container">
                <div class="row align-items-end mb-35">
                    <div class="col-xl-9 col-lg-8">
                        <div class="tg-tour-details-video-title-wrap">
                            <h2 class="tg-tour-details-video-title mb-15">
                                <?php echo e($service?->translation?->title); ?>

                                <?php if($service?->guaranteed_departure == 1): ?>
                                    <span class="badge bg-success"
                                        style="font-size: 14px; padding: 5px 12px; vertical-align: middle; margin-left: 10px; border-radius: 20px;">
                                        <i class="fa fa-check-circle"></i> <?php echo e(__('translate.Guaranteed Departure')); ?>

                                    </span>
                                <?php endif; ?>
                            </h2>
                            <div class="tg-tour-details-video-location d-flex flex-wrap">

                                <?php if($service?->location): ?>
                                    <span class="mr-25"><i class="fa-regular fa-location-dot"></i>
                                        <?php echo e($service?->location); ?>

                                    </span>
                                <?php endif; ?>

                                <div class="tg-tour-details-video-ratings">
                                    <?php $__currentLoopData = range(1, 5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $star): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <i
                                            class="fa-sharp fa-solid fa-star <?php if($avgRating >= $star): ?> active <?php endif; ?>"></i>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <span class="review">
                                        (
                                        <?php echo e(__($reviews->count())); ?>

                                        <?php echo e(__($reviews->count() > 1 ? __('translate.Reviews') : __('translate.Review'))); ?>

                                        )
                                    </span>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4">
                        <div class="tg-tour-details-video-share text-end">
                            <a href="#">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M5.87746 9.03227L10.7343 11.8625M10.7272 4.05449L5.87746 6.88471M14.7023 2.98071C14.7023 4.15892 13.7472 5.11405 12.569 5.11405C11.3908 5.11405 10.4357 4.15892 10.4357 2.98071C10.4357 1.80251 11.3908 0.847382 12.569 0.847382C13.7472 0.847382 14.7023 1.80251 14.7023 2.98071ZM6.16901 7.95849C6.16901 9.1367 5.21388 10.0918 4.03568 10.0918C2.85747 10.0918 1.90234 9.1367 1.90234 7.95849C1.90234 6.78029 2.85747 5.82516 4.03568 5.82516C5.21388 5.82516 6.16901 6.78029 6.16901 7.95849ZM14.7023 12.9363C14.7023 14.1145 13.7472 15.0696 12.569 15.0696C11.3908 15.0696 10.4357 14.1145 10.4357 12.9363C10.4357 11.7581 11.3908 10.8029 12.569 10.8029C13.7472 10.8029 14.7023 11.7581 14.7023 12.9363Z"
                                        stroke="currentColor" stroke-width="0.977778" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                                Share
                            </a>
                            <a class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                'tg-listing-item-wishlist ml-25',
                                'active' => $service?->my_wishlist_exists == 1,
                            ]); ?>" data-url="<?php echo e(route('user.wishlist.store')); ?>"
                                onclick="addToWishlist(<?php echo e($service->id); ?>, this, 'service')" href="javascript:void(0);">
                                <svg width="16" height="14" viewBox="0 0 16 14" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10.2606 10.7831L10.2878 10.8183L10.2606 10.7831L10.2482 10.7928C10.0554 10.9422 9.86349 11.0909 9.67488 11.2404C9.32643 11.5165 9.01846 11.7565 8.72239 11.9304C8.42614 12.1044 8.19324 12.1804 7.99978 12.1804C7.80633 12.1804 7.57342 12.1044 7.27718 11.9304C6.9811 11.7565 6.67312 11.5165 6.32472 11.2404C6.13618 11.091 5.94436 10.9423 5.75159 10.7929L5.73897 10.7831C4.90868 10.1397 4.06133 9.48294 3.36178 8.6911C2.51401 7.73157 1.92536 6.61544 1.92536 5.16811C1.92536 3.75448 2.71997 2.57143 3.80086 2.07481C4.84765 1.59384 6.26028 1.71692 7.61021 3.12673L7.64151 3.09675L7.61021 3.12673C7.7121 3.23312 7.85274 3.2933 7.99978 3.2933C8.14682 3.2933 8.28746 3.23312 8.38936 3.12673L8.35868 3.09736L8.38936 3.12673C9.73926 1.71692 11.1519 1.59384 12.1987 2.07481C13.2796 2.57143 14.0742 3.75448 14.0742 5.16811C14.0742 6.61544 13.4856 7.73157 12.6378 8.69109L12.668 8.71776L12.6378 8.6911C11.9382 9.48294 11.0909 10.1397 10.2606 10.7831ZM5.10884 11.6673L5.13604 11.6321L5.10884 11.6673L5.10901 11.6674C5.29802 11.8137 5.48112 11.9554 5.65523 12.0933C5.99368 12.3616 6.35981 12.6498 6.73154 12.8682L6.75405 12.8298L6.73154 12.8682C7.10315 13.0864 7.53174 13.2667 7.99978 13.2667C8.46782 13.2667 8.89641 13.0864 9.26802 12.8682L9.24552 12.8298L9.26803 12.8682C9.63979 12.6498 10.0059 12.3615 10.3443 12.0933C10.5185 11.9553 10.7016 11.8136 10.8907 11.6673L10.8907 11.6673L10.8926 11.6659C11.7255 11.0212 12.6722 10.2884 13.4463 9.41228L13.413 9.38285L13.4463 9.41227C14.4145 8.31636 15.1553 6.95427 15.1553 5.16811C15.1553 3.34832 14.1308 1.76808 12.6483 1.08693C11.2517 0.445248 9.53362 0.635775 7.99979 1.99784C6.46598 0.635775 4.74782 0.445248 3.35124 1.08693C1.86877 1.76808 0.844227 3.34832 0.844227 5.16811C0.844227 6.95427 1.58502 8.31636 2.55325 9.41227C3.32727 10.2883 4.27395 11.0211 5.10682 11.6657L5.10884 11.6673Z"
                                        fill="currentColor" stroke="currentColor" stroke-width="0.0888889" />
                                </svg>
                                <span class="wishlist_change_text">
                                    <?php if($service?->my_wishlist_exists == 1): ?>
                                        Remove
                                    <?php else: ?>
                                        Add
                                    <?php endif; ?> to Wishlist
                                </span>
                            </a>
                        </div>
                    </div>
                </div>

                <?php
                    $thumbnails = $service->media->where('is_thumbnail', 1)->sortBy('display_order')->values();
                    $nonThumbnails = $service->media->where('is_thumbnail', 0)->sortBy('display_order')->values();
                ?>

                <div class="row gx-15 mb-25">
                    
                    <div class="col-lg-7">
                        <div class="tg-tour-details-video-thumb mb-15">
                            <?php if(isset($thumbnails[0])): ?>
                                <img class="w-100" src="<?php echo e(asset('storage/' . $thumbnails[0]->file_path)); ?>"
                                    alt="<?php echo e($thumbnails[0]->caption); ?>">
                            <?php else: ?>
                                <img class="w-100" src="<?php echo e(asset('frontend/assets/img/shape/placeholder.png')); ?>"
                                    alt="default">
                            <?php endif; ?>
                        </div>
                    </div>

                    
                    <div class="col-lg-5">
                        <div class="row gx-15">
                            
                            <div class="col-12">
                                <div class="tg-tour-details-video-thumb p-relative mb-15">
                                    <?php if(isset($nonThumbnails[0])): ?>
                                        <img class="w-100" src="<?php echo e(asset('storage/' . $nonThumbnails[0]->file_path)); ?>"
                                            alt="<?php echo e($nonThumbnails[0]->caption); ?>">
                                        <div class="tg-tour-details-video-inner text-center">
                                            <a class="tg-video-play popup-video tg-pulse-border"
                                                href="<?php echo e($service->video_url); ?>">
                                                <span class="p-relative z-index-11">
                                                    <svg width="19" height="21" viewBox="0 0 19 21" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M17.3616 8.34455C19.0412 9.31425 19.0412 11.7385 17.3616 12.7082L4.13504 20.3445C2.45548 21.3142 0.356021 20.1021 0.356021 18.1627L0.356022 2.89C0.356022 0.950609 2.45548 -0.261512 4.13504 0.708185L17.3616 8.34455Z"
                                                            fill="currentColor" />
                                                    </svg>
                                                </span>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            
                            <?php for($i = 1; $i <= 2; $i++): ?>
                                <?php if(isset($nonThumbnails[$i])): ?>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="tg-tour-details-video-thumb mb-15">
                                            <img class="w-100"
                                                src="<?php echo e(asset('storage/' . $nonThumbnails[$i]->file_path)); ?>"
                                                alt="<?php echo e($nonThumbnails[$i]->caption); ?>">
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endfor; ?>
                        </div>
                    </div>
                </div>

                <div class="tg-tour-details-feature-list-wrap">
                    <div class="row align-items-center">
                        <div class="col-lg-8">
                            <div class="tg-tour-details-video-feature-list">
                                <ul>

                                    <?php if($service?->duration): ?>
                                        <li>
                                            <span class="icon">
                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M9.00001 4.19992V8.99992L12.2 10.5999M17 9C17 13.4183 13.4183 17 9 17C4.58172 17 1 13.4183 1 9C1 4.58172 4.58172 1 9 1C13.4183 1 17 4.58172 17 9Z"
                                                        stroke="currentColor" stroke-width="1.2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                            <div>
                                                <span class="title"><?php echo e(__('translate.Duration')); ?></span>
                                                <span class="duration"><?php echo e($service?->duration); ?></span>
                                            </div>
                                        </li>
                                    <?php endif; ?>

                                    <?php if($service?->serviceType?->name): ?>
                                        <li>
                                            <span class="icon">
                                                <svg width="16" height="17" viewBox="0 0 16 17" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M11.5 6.52684L4.5 2.64944M1.21001 4.70401L8.00001 8.47683L14.79 4.70401M8 16V8.46931M15 11.4578V5.48102C14.9997 5.21899 14.9277 4.96165 14.7912 4.7348C14.6547 4.50794 14.4585 4.31956 14.2222 4.18855L8.77778 1.20018C8.5413 1.06904 8.27306 1 8 1C7.72694 1 7.4587 1.06904 7.22222 1.20018L1.77778 4.18855C1.54154 4.31956 1.34532 4.50794 1.2088 4.7348C1.07229 4.96165 1.00028 5.21899 1 5.48102V11.4578C1.00028 11.7198 1.07229 11.9771 1.2088 12.204C1.34532 12.4308 1.54154 12.6192 1.77778 12.7502L7.22222 15.7386C7.4587 15.8697 7.72694 15.9388 8 15.9388C8.27306 15.9388 8.5413 15.8697 8.77778 15.7386L14.2222 12.7502C14.4585 12.6192 14.6547 12.4308 14.7912 12.204C14.9277 11.9771 14.9997 11.7198 15 11.4578Z"
                                                        stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                            <div>
                                                <span class="title"><?php echo e(__('translate.Type')); ?></span>
                                                <span class="duration"><?php echo e($service?->serviceType?->name); ?></span>
                                            </div>
                                        </li>
                                    <?php endif; ?>

                                    <?php if($service?->group_size): ?>
                                        <li>
                                            <span class="icon">
                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M1.7 17.2C1.5 17.2 1.3 17.1 1.2 17C1.1 16.8 1 16.7 1 16.5C1 15.1 1.4 13.7 2.1 12.4C2.8 11.2 3.9 10.1 5.1 9.4C4.6 8.8 4.2 8 4 7.2C3.9 6.4 3.9 5.5 4.1 4.8C4.3 4 4.8 3.2 5.3 2.6C5.9 2 6.6 1.5 7.3 1.3C7.9 1.1 8.5 1 9.1 1C9.3 1 9.6 1 9.8 1C10.6 1.1 11.4 1.4 12.1 1.9C12.8 2.4 13.3 3 13.7 3.7C14.1 4.4 14.3 5.2 14.3 6.1C14.3 7.3 13.9 8.5 13.1 9.4C13.7 9.8 14.3 10.2 14.9 10.7C15.7 11.5 16.2 12.3 16.7 13.3C17.1 14.3 17.3 15.3 17.3 16.4C17.3 16.6 17.2 16.8 17.1 16.9C17 17 16.8 17.1 16.6 17.1C16.5 17.1 16.4 17.1 16.3 17C16.2 17 16.1 16.9 16.1 16.8C16 16.7 16 16.7 15.9 16.6C15.9 16.5 15.8 16.4 15.8 16.3C15.8 15.4 15.6 14.6 15.3 13.8C15 13 14.5 12.3 13.8 11.7C13.2 11.2 12.6 10.7 11.9 10.4C11.1 10.9 10.2 11.2 9.1 11.2C8.1 11.2 7.1 10.9 6.3 10.4C5.2 10.9 4.2 11.7 3.5 12.8C2.8 13.9 2.4 15.1 2.4 16.4C2.4 16.6 2.3 16.8 2.2 16.9C2.1 17.1 1.9 17.2 1.7 17.2ZM9.1 2.5C8.4 2.5 7.7 2.7 7.1 3.1C6.4 3.5 6 4.1 5.7 4.7C5.4 5.4 5.3 6.1 5.5 6.9C5.6 7.6 6 8.3 6.5 8.8C7 9.3 7.7 9.7 8.4 9.8C8.6 9.8 8.9 9.9 9.1 9.9C9.6 9.9 10.1 9.8 10.5 9.6C11.2 9.3 11.7 8.9 12.2 8.2C12.6 7.6 12.8 6.9 12.8 6.2C12.8 5.2 12.4 4.3 11.7 3.6C11 2.8 10.1 2.5 9.1 2.5Z"
                                                        fill="currentColor" />
                                                </svg>
                                            </span>
                                            <div>
                                                <span class="title"><?php echo e(__('translate.Group Size')); ?></span>
                                                <span class="duration"><?php echo e($service?->group_size); ?></span>
                                            </div>
                                        </li>
                                    <?php endif; ?>

                                    <?php if($service?->languages && is_array($service?->languages) && count($service?->languages) > 0): ?>
                                        <li>
                                            <span class="icon">
                                                <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M16 8.5C16 12.6421 12.6421 16 8.5 16M16 8.5C16 4.35786 12.6421 1 8.5 1M16 8.5H1M8.5 16C4.35786 16 1 12.6421 1 8.5M8.5 16C10.376 13.9462 11.4421 11.281 11.5 8.5C11.4421 5.71903 10.376 3.05376 8.5 1M8.5 16C6.62404 13.9462 5.55794 11.281 5.5 8.5C5.55794 5.71903 6.62404 3.05376 8.5 1M1 8.5C1 4.35786 4.35786 1 8.5 1"
                                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                            <div>
                                                <span class="title"><?php echo e(__('translate.Languages')); ?></span>
                                                <span class="duration">
                                                    <?php $__currentLoopData = $service?->languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php echo e($language); ?>

                                                        <?php if(!$loop->last): ?>
                                                            ,
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </span>
                                            </div>
                                        </li>
                                    <?php endif; ?>

                                    <?php if($service?->age_range): ?>
                                        <li>
                                            <span class="icon">
                                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M12 12C14.2091 12 16 10.2091 16 8C16 5.79086 14.2091 4 12 4C9.79086 4 8 5.79086 8 8C8 10.2091 9.79086 12 12 12Z" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M6 20C6 17.2386 8.68629 15 12 15C15.3137 15 18 17.2386 18 20" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </span>
                                            <div>
                                                <span class="title"><?php echo e(__('translate.Age range')); ?></span>
                                                <span class="duration"><?php echo e($service?->age_range); ?></span>
                                            </div>
                                        </li>
                                    <?php endif; ?>

                                    <?php if($service?->destinations->count() > 0): ?>
                                        <li>
                                            <span class="icon">
                                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21Z" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M3.6001 9H20.4001" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M3.6001 15H20.4001" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M12 3C14.5013 5.43825 15.9228 8.63056 16.0001 12C15.9228 15.3694 14.5013 18.5618 12 21C9.49881 18.5618 8.07725 15.3694 8.0001 12C8.07725 8.63056 9.49881 5.43825 12 3Z" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </span>
                                            <div>
                                                <span class="title"><?php echo e(__('translate.Destinations')); ?></span>
                                                <span class="duration">
                                                    <?php $__currentLoopData = $service->destinations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php echo e($dest->name); ?><?php echo e(!$loop->last ? ', ' : ''); ?>

                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </span>
                                            </div>
                                        </li>
                                    <?php elseif($service?->country): ?>
                                        <li>
                                            <span class="icon">
                                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21Z" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M3.6001 9H20.4001" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M3.6001 15H20.4001" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M12 3C14.5013 5.43825 15.9228 8.63056 16.0001 12C15.9228 15.3694 14.5013 18.5618 12 21C9.49881 18.5618 8.07725 15.3694 8.0001 12C8.07725 8.63056 9.49881 5.43825 12 3Z" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </span>
                                            <div>
                                                <span class="title"><?php echo e(__('translate.Country')); ?></span>
                                                <span class="duration"><?php echo e($service?->country); ?></span>
                                            </div>
                                        </li>
                                    <?php endif; ?>

                                    <?php if($service?->region): ?>
                                        <li>
                                            <span class="icon">
                                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M21 10C21 17 12 23 12 23C12 23 3 17 3 10C3 7.61305 3.94821 5.32387 5.63604 3.63604C7.32387 1.94821 9.61305 1 12 1C14.3869 1 16.6761 1.94821 18.364 3.63604C20.0518 5.32387 21 7.61305 21 10Z" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M12 13C13.6569 13 15 11.6569 15 10C15 8.34315 13.6569 7 12 7C10.3431 7 9 8.34315 9 10C9 11.6569 10.3431 13 12 13Z" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </span>
                                            <div>
                                                <span class="title"><?php echo e(__('translate.Region')); ?></span>
                                                <span class="duration"><?php echo e($service?->region); ?></span>
                                            </div>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="tg-tour-details-video-feature-price mb-15 position-relative">
                                <?php if($service->adult_discount_badge): ?>
                                    <div class="discount-badge-above-price">
                                        <?php echo $service->adult_discount_badge; ?>

                                    </div>
                                <?php endif; ?>
                                <p class="price-row">
                                    <?php echo e(__('translate.From')); ?>

                                    <span class="price-display"><?php echo $service->adult_price_display; ?></span>
                                    / <?php echo e(__('translate.Adult')); ?>

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- tg-tour-details-area-end -->

        <!-- tg-tour-about-start -->
        <div class="tg-tour-about-area tg-tour-about-border pt-40 pb-70">
            <div class="container">
                <div class="row">
                <div class="col-xl-9 col-lg-8 order-xl-1 order-2">
                <div class="tg-tour-about-wrap mr-55">
                            <div class="tg-tour-about-content">
                                <div class="tg-tour-about-inner mb-25">
                                    <h4 class="tg-tour-about-title mb-15">
                                        <?php echo e(__('translate.About This Tour')); ?>

                                    </h4>
                                    <div class="text-capitalize lh-28">
                                        <?php echo $service?->translation?->short_description; ?>

                                    </div>
                                </div>

                                <?php if($service?->translation?->description): ?>
                                    <div class="tg-tour-about-inner mb-40">
                                        <?php echo $service?->translation?->description; ?>

                                    </div>
                                    <div class="tg-tour-about-border mb-40"></div>
                                <?php endif; ?>


                                <div class="tg-tour-faq-wrap mb-70">
                                    <div class="d-flex align-items-center mb-15">
                                        <h4 class="tg-tour-about-title mb-0">
                                            <?php echo e(__('translate.Description')); ?>

                                        </h4>
                                    </div>

                                    <?php if($service?->tour_plan_sub_title): ?>
                                        <p class="text-capitalize lh-28 mb-20">
                                            <?php echo e($service?->tour_plan_sub_title); ?>

                                        </p>
                                    <?php endif; ?>

                                    <?php if($service?->map_image): ?>
                                        <div class="tg-tour-about-map mb-40">
                                            <h4 class="tg-tour-about-title mb-15">
                                                <?php echo e(__('translate.Location')); ?>

                                            </h4>
                                            <div class="tg-tour-about-map-image mb-20">
                                                <img src="<?php echo e(asset('storage/' . $service->map_image)); ?>" alt="Map" class="img-fluid w-100" style="border-radius: 10px; max-height: 450px; object-fit: cover;">
                                            </div>
                                        </div>
                                        <div class="tg-tour-about-border mb-40"></div>
                                    <?php endif; ?>

                                    <h4 class="tg-tour-about-title mb-20">
                                        <?php echo e(__('translate.Itinerary')); ?>

                                    </h4>

                                    <div class="tg-tour-about-faq-inner">
                                        <div class="tg-tour-about-faq" id="accordionExample">
                                            <?php $__currentLoopData = $service?->itineraries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itinerary): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header">
                                                        <button class="<?php echo \Illuminate\Support\Arr::toCssClasses(['accordion-button', 'collapsed' => !$loop->first]); ?>" class="accordion-button"
                                                            type="button" data-bs-toggle="collapse"
                                                            data-bs-target="#collapse_<?php echo e($itinerary->id); ?>"
                                                            aria-expanded="true"
                                                            aria-controls="collapse_<?php echo e($itinerary->id); ?>">
                                                            <span>Day-<?php echo e($itinerary?->day_number); ?></span>
                                                            <?php echo e($itinerary?->title); ?>

                                                        </button>
                                                    </h2>
                                                    <div id="collapse_<?php echo e($itinerary->id); ?>" class="<?php echo \Illuminate\Support\Arr::toCssClasses(['accordion-collapse collapse', 'show' => $loop->first]); ?>"
                                                        data-bs-parent="#accordionExample">
                                                        <div class="accordion-body">
                                                            <div class="row pb-5">
                                                                <?php if($itinerary?->image): ?>
                                                                    <div class="col-md-4 mb-5">
                                                                        <img src="<?php echo e(asset('storage/' . $itinerary->image)); ?>"
                                                                            alt="<?php echo e($itinerary->title); ?>"
                                                                            class="itinerary-image">
                                                                    </div>
                                                                <?php endif; ?>
                                                                <div class="<?php echo \Illuminate\Support\Arr::toCssClasses([ 'col-12 mb-5' => !$itinerary?->image , 'col-md-8 mb-5' => $itinerary?->image]); ?>">

                                                                    <?php if($itinerary?->description): ?>
                                                                        <div>
                                                                            <?php echo $itinerary?->description; ?>

                                                                        </div>
                                                                    <?php endif; ?>

                                                                    <?php if($itinerary?->location): ?>
                                                                        <div class="mt-3">
                                                                            <strong><i class="fa fa-map-marker"></i>
                                                                                Location:</strong>
                                                                            <?php echo e($itinerary?->location); ?>

                                                                        </div>
                                                                    <?php endif; ?>

                                                                    <?php if($itinerary?->duration): ?>
                                                                        <div class="mt-3">
                                                                            <strong><i
                                                                                    class="fa-solid fa-business-time"></i>
                                                                                Duration:</strong>
                                                                            <?php echo e($itinerary?->duration); ?>

                                                                        </div>
                                                                    <?php endif; ?>

                                                                    <?php if($itinerary?->meal_included): ?>
                                                                        <div class="mt-2">
                                                                            <strong><i class="fa fa-utensils"></i>
                                                                                Meal Included:</strong>
                                                                            <span class="badge bg-success">
                                                                                <?php echo e($itinerary?->meal_included); ?>

                                                                            </span>
                                                                        </div>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="tg-tour-about-border mb-45"></div>

                                <?php if($service?->included || $service?->excluded): ?>
                                    <?php
                                        $included = $service?->included ?? [];
                                        if (is_string($included)) {
                                            $included = json_decode($included, true) ?? [];
                                        }
                                        
                                        $excluded = $service?->excluded ?? [];
                                        if (is_string($excluded)) {
                                            $excluded = json_decode($excluded, true) ?? [];
                                        }
                                        
                                        $category_icons = [
                                            'accommodation' => 'fa-bed',
                                            'meals' => 'fa-utensils',
                                            'guide' => 'fa-user-tie',
                                            'transport' => 'fa-bus',
                                            'others' => 'fa-check'
                                        ];
                                    ?>
                                    <div class="tg-tour-about-inner mb-40">
                                        <div class="tour-radar-accordion">
                                            
                                            <div class="accordion" id="inclusionsAccordion">
                                                
                                                <h4 class="tg-tour-about-title mb-20"><?php echo e(__('translate.Included')); ?></h4>
                                                <?php $__currentLoopData = $included; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php
                                                        $is_structured = is_array($item) && isset($item['category']);
                                                        $category = $is_structured ? $item['category'] : 'others';
                                                        $title = $is_structured ? $item['title'] : $item;
                                                        $details = $is_structured ? ($item['details'] ?? '') : '';
                                                        $icon = $category_icons[$category] ?? $category_icons['others'];
                                                    ?>
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="headingIncl<?php echo e($index); ?>">
                                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseIncl<?php echo e($index); ?>">
                                                                <div class="category-icon included">
                                                                    <i class="fa-solid <?php echo e($icon); ?>"></i>
                                                                </div>
                                                                <span class="item-title"><?php echo e($title); ?></span>
                                                                <?php if($is_structured && $category == 'meals' && !empty($item['dietary'])): ?>
                                                                    <div class="dietary-badges d-none d-md-flex">
                                                                        <?php $__currentLoopData = $item['dietary']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $diet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <span class="badge"><?php echo e($diet); ?></span>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </div>
                                                                <?php endif; ?>
                                                                <i class="fa-solid fa-chevron-down accordion-arrow"></i>
                                                            </button>
                                                        </h2>
                                                        <div id="collapseIncl<?php echo e($index); ?>" class="accordion-collapse collapse" data-bs-parent="#inclusionsAccordion">
                                                            <div class="accordion-body">
                                                                <?php echo nl2br(e($details)); ?>

                                                                <?php if($is_structured && $category == 'meals' && !empty($item['dietary'])): ?>
                                                                    <div class="dietary-badges d-flex d-md-none mt-10">
                                                                        <?php $__currentLoopData = $item['dietary']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $diet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <span class="badge"><?php echo e($diet); ?></span>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </div>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                
                                                <h4 class="tg-tour-about-title mt-30 mb-20"><?php echo e(__('translate.Excluded')); ?></h4>
                                                <?php $__currentLoopData = $excluded; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php
                                                        $is_structured = is_array($item) && isset($item['category']);
                                                        $category = $is_structured ? $item['category'] : 'others';
                                                        $title = $is_structured ? $item['title'] : $item;
                                                        $details = $is_structured ? ($item['details'] ?? '') : '';
                                                        $icon = $category_icons[$category] ?? $category_icons['others'];
                                                    ?>
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="headingExcl<?php echo e($index); ?>">
                                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExcl<?php echo e($index); ?>">
                                                                <div class="category-icon excluded">
                                                                    <i class="fa-solid fa-xmark"></i>
                                                                </div>
                                                                <span class="item-title"><?php echo e($title); ?></span>
                                                                <i class="fa-solid fa-chevron-down accordion-arrow"></i>
                                                            </button>
                                                        </h2>
                                                        <div id="collapseExcl<?php echo e($index); ?>" class="accordion-collapse collapse" data-bs-parent="#inclusionsAccordion">
                                                            <div class="accordion-body">
                                                                <?php echo nl2br(e($details)); ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tg-tour-about-border mb-40"></div>
                                <?php endif; ?>
                                <div class="tg-tour-about-review-wrap mb-45">
                                    <h4 class="tg-tour-about-title mb-15">
                                        <?php echo e(__('translate.Customer Reviews')); ?>

                                    </h4>

                                    <?php if($reviews->count() > 0): ?>
                                        <div class="tg-tour-about-review">
                                            <div class="head-reviews">
                                                <div class="review-left">
                                                    <div class="review-info-inner">
                                                        <h2>
                                                            <?php echo e(number_format($avgRating, 1)); ?>

                                                        </h2>
                                                        <p>Based On
                                                            <?php echo e(__($reviews->count())); ?>

                                                            <?php echo e(__($reviews->count() > 1 ? __('translate.Reviews') : __('translate.Review'))); ?>

                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="review-right">
                                                    <div class="review-progress">
                                                        <?php $__currentLoopData = $averageRatings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div class="item-review-progress">
                                                                <div class="text-rv-progress">
                                                                    <p><?php echo e($item['category']); ?></p>
                                                                </div>
                                                                <div class="bar-rv-progress">
                                                                    <div class="progress">
                                                                        <div class="progress-bar"
                                                                            style="width: <?php echo e($item['percent']); ?>%">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="text-avarage">
                                                                    <p><?php echo e($item['average']); ?>/5</p>
                                                                </div>
                                                            </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                </div>
                                <div class="tg-tour-about-border mb-35"></div>
                                <div class="tg-tour-about-cus-review-wrap mb-25">
                                    <h4 class="tg-tour-about-title mb-40">
                                        <?php echo e(__($reviews->count())); ?>

                                        <?php echo e(__($reviews->count() > 1 ? __('translate.Reviews') : __('translate.Review'))); ?>

                                    </h4>
                                    <ul>
                                        <?php $__empty_1 = true; $__currentLoopData = $paginatedReviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <li>
                                                <div class="tg-tour-about-cus-review d-flex mb-40">
                                                    <div class="tg-tour-about-cus-review-thumb">
                                                        <img src="<?php echo e(asset($review->user->image ?? 'frontend/assets/img/shape/placeholder.png')); ?>"
                                                            alt="<?php echo e($review->user->name); ?>">
                                                    </div>
                                                    <div>
                                                        <div
                                                            class="tg-tour-about-cus-name mb-5 d-flex align-items-center justify-content-between flex-wrap">
                                                            <h6 class="mr-10 mb-10 d-inline-block">
                                                                <?php echo e($review->user->name); ?>

                                                                <span>-
                                                                    <?php echo e(\Carbon\Carbon::parse($review->created_at)->format('d M, Y . h:i A')); ?>

                                                                </span>
                                                            </h6>
                                                            <span
                                                                class="tg-tour-about-cus-review-star mb-10 d-inline-block">
                                                                <?php $__currentLoopData = range(1, 5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $star): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <i
                                                                        class="fa-sharp fa-solid fa-star <?php if($review->rating >= $star): ?> active <?php endif; ?>"></i>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                            </span>
                                                        </div>
                                                        <p class="text-capitalize lh-28 mb-10">
                                                            <?php echo e($review->review); ?>

                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="tg-tour-about-border mb-40"></div>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <h5 class="text-center"><?php echo e(__('translate.No Review Found')); ?></h5>
                                        <?php endif; ?>
                                    </ul>
                                    <?php echo $__env->make('components.front.custom-pagination', [
                                        'items' => $paginatedReviews,
                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <div id="reviewForm" x-data="reviewForm()"
                                    class="tg-tour-about-review-form-wrap mb-45">
                                    <h4 class="tg-tour-about-title mb-5"><?php echo e(__('translate.Leave a Reply')); ?></h4>
                                    <div class="tg-tour-about-rating-category mb-20">
                                        <ul>
                                            <template x-for="(category, index) in categories" :key="category.name">
                                                <li>
                                                    <label x-text="category.name + ' :'" class="mr-2"></label>
                                                    <div class="rating-icon flex space-x-1">
                                                        <template x-for="star in 5" :key="star">
                                                            <i class="fa-sharp fa-solid fa-star cursor-pointer"
                                                                :class="star <= category.rating ? 'active' :
                                                                    ''"
                                                                @click="setRating(index, star)"
                                                                @mouseover="hoverRating = star; hoverIndex = index"
                                                                @mouseleave="hoverRating = 0; hoverIndex = null"
                                                                :class="(hoverIndex === index && star <= hoverRating) ?
                                                                'text-yellow-300' : ''"></i>
                                                        </template>
                                                    </div>
                                                </li>
                                            </template>
                                        </ul>
                                    </div>
                                    <div class="tg-tour-about-review-form">
                                        <form @submit.prevent="submitForm" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <textarea x-model="message" class="textarea mb-5" placeholder="Write Message"></textarea>
                                                    <button type="submit" class="tg-btn tg-btn-switch-animation">
                                                        <?php echo e(__('translate.Submit Review')); ?>

                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                        
                        <!-- Availability Section - Below Reviews -->
                        <?php if($service->availability_periods && $service->availability_periods->count() > 0): ?>
                        <div class="tg-tour-availability-section" id="availability-section" style="display: none;">
                            <div class="tg-tour-about-border mb-40"></div>
                            
                            <div class="availability-section-card">
                                <div class="availability-section-header">
                                    <i class="fa-regular fa-calendar-check"></i>
                                    <div>
                                        <h4 class="availability-title"><?php echo e(__('translate.Availability & Booking')); ?></h4>
                                        <p class="availability-subtitle" id="availability-month-year"></p>
                                    </div>
                                </div>
                                
                                <!-- Selected Month Summary -->
                                <div class="selected-month-summary" id="selected-month-summary"></div>
                                
                                <!-- Available Periods List -->
                                <div class="available-periods-container">
                                    <label class="periods-label">
                                        <i class="fa-solid fa-list-check"></i>
                                        <?php echo e(__('translate.Select your preferred period')); ?>

                                    </label>
                                    <div class="periods-list" id="periods-list">
                                        <!-- Periods will be populated by JavaScript -->
                                    </div>
                                </div>
                                
                                <!-- Selected Period Info -->
                                <div class="selected-period-final" id="selected-period-final" style="display: none;">
                                    <div class="selected-period-highlight">
                                        <i class="fa-solid fa-check-circle"></i>
                                        <div>
                                            <span class="period-label"><?php echo e(__('translate.Selected Period')); ?></span>
                                            <span class="period-dates" id="final-period-dates"></span>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Booking Form for this section -->
                                <form id="bottom-booking-form" action="<?php echo e(route('front.tourbooking.book.checkout.view')); ?>" method="GET" class="mt-4">
                                    <input type="hidden" name="service_id" value="<?php echo e($service->id); ?>">
                                    <input type="hidden" name="availability_period_id" id="bottom-period-id">
                                    <input type="hidden" name="check_in_date" id="bottom-check-in-date">
                                    <input type="hidden" name="person" id="bottom-person" value="1">
                                    <input type="hidden" name="children" id="bottom-children" value="0">
                                    
                                    <!-- Passengers selection -->
                                    <div class="passengers-selection mb-4">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="passenger-label">
                                                    <i class="fa-solid fa-user"></i>
                                                    <?php echo e(__('translate.Adults')); ?>

                                                    <small></small>
                                                </label>
                                                <select name="person_display" class="form-select passenger-select" id="bottom-adults-select">
                                                    <?php for($i = 1; $i <= 8; $i++): ?>
                                                        <option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
                                                    <?php endfor; ?>
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="passenger-label">
                                                    <i class="fa-solid fa-child"></i>
                                                    <?php echo e(__('translate.Children')); ?>

                                                    <small>(-12 years)</small>
                                                </label>
                                                <select name="children_display" class="form-select passenger-select" id="bottom-children-select">
                                                    <?php for($i = 0; $i <= 8; $i++): ?>
                                                        <option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
                                                    <?php endfor; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Total Cost Display -->
                                    <div class="total-cost-box mb-4">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="total-label"><?php echo e(__('translate.Total Cost')); ?></span>
                                            <span class="total-amount" id="bottom-total-cost"><?php echo e(currency($service->adult_price)); ?></span>
                                        </div>
                                    </div>
                                    
                                    <button type="submit" id="bottom-book-now-btn" class="tg-btn tg-btn-switch-animation w-100" disabled>
                                        <i class="fa-solid fa-calendar-check mr-2"></i>
                                        <?php echo e(__('translate.Book Now')); ?>

                                    </button>
                                </form>
                            </div>
                        </div>
                        <?php endif; ?>

                        <?php
                            $good_to_know = is_array($service->translation?->good_to_know ?? $service->good_to_know) 
                                ? ($service->translation?->good_to_know ?? $service->good_to_know) 
                                : json_decode($service->translation?->good_to_know ?? $service->good_to_know ?? '[]', true);
                            
                            // Filter out empty items
                            if (is_array($good_to_know)) {
                                $good_to_know = array_filter($good_to_know, function($item) {
                                    return !empty($item['country']);
                                });
                            } else {
                                $good_to_know = [];
                            }
                        ?>

                        <?php if(!empty($good_to_know)): ?>
                            <div class="tg-tour-about-border mb-40"></div>
                            <div class="tg-good-to-know-section mb-50">
                                <h4 class="tg-tour-about-title mb-25"><?php echo e(__('translate.Good to know')); ?></h4>
                                <div class="good-to-know-container">
                                    <div class="good-to-know-tabs-wrap">
                                        <ul class="nav nav-tabs good-to-know-nav" id="gkTab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="currency-tab" data-bs-toggle="tab" data-bs-target="#currency-pane" type="button" role="tab" aria-controls="currency-pane" aria-selected="true">
                                                    <div class="gk-tab-icon"><i class="fa-solid fa-money-bill-transfer"></i></div>
                                                    <span><?php echo e(__('translate.Currency')); ?></span>
                                                </button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="plugs-tab" data-bs-toggle="tab" data-bs-target="#plugs-pane" type="button" role="tab" aria-controls="plugs-pane" aria-selected="false">
                                                    <div class="gk-tab-icon"><i class="fa-solid fa-plug-circle-bolt"></i></div>
                                                    <span><?php echo e(__('translate.Prises et adaptateurs')); ?></span>
                                                </button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="vaccines-tab" data-bs-toggle="tab" data-bs-target="#vaccines-pane" type="button" role="tab" aria-controls="vaccines-pane" aria-selected="false">
                                                    <div class="gk-tab-icon"><i class="fa-solid fa-syringe"></i></div>
                                                    <span><?php echo e(__('translate.Vaccines')); ?></span>
                                                </button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="payment-tab" data-bs-toggle="tab" data-bs-target="#payment-pane" type="button" role="tab" aria-controls="payment-pane" aria-selected="false">
                                                    <div class="gk-tab-icon"><i class="fa-solid fa-credit-card"></i></div>
                                                    <span><?php echo e(__('translate.Payment Information')); ?></span>
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="tab-content gk-tab-content p-4" id="gkTabContent">
                                        <div class="tab-pane fade show active" id="currency-pane" role="tabpanel" aria-labelledby="currency-tab" tabindex="0">
                                            <div class="row g-4">
                                                <?php $__currentLoopData = $good_to_know; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="col-md-6">
                                                        <div class="gk-info-card">
                                                            <div class="gk-country-badge"><?php echo e($item['country']); ?></div>
                                                            <div class="gk-info-text"><?php echo e($item['currency'] ?: __('translate.N/A')); ?></div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="plugs-pane" role="tabpanel" aria-labelledby="plugs-tab" tabindex="0">
                                            <div class="row g-4">
                                                <?php $__currentLoopData = $good_to_know; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="col-md-6">
                                                        <div class="gk-info-card">
                                                            <div class="gk-country-badge"><?php echo e($item['country']); ?></div>
                                                            <div class="gk-info-text"><?php echo e($item['plugs'] ?: __('translate.N/A')); ?></div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="vaccines-pane" role="tabpanel" aria-labelledby="vaccines-tab" tabindex="0">
                                            <div class="row g-4">
                                                <?php $__currentLoopData = $good_to_know; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="col-md-6">
                                                        <div class="gk-info-card">
                                                            <div class="gk-country-badge"><?php echo e($item['country']); ?></div>
                                                            <div class="gk-info-text"><?php echo e($item['vaccines'] ?: __('translate.N/A')); ?></div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="payment-pane" role="tabpanel" aria-labelledby="payment-tab" tabindex="0">
                                            <div class="row g-4">
                                                <?php $__currentLoopData = $good_to_know; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="col-md-6">
                                                        <div class="gk-info-card">
                                                            <div class="gk-country-badge"><?php echo e($item['country']); ?></div>
                                                            <div class="gk-info-text"><?php echo e($item['payment'] ?: __('translate.N/A')); ?></div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        
                    </div>
                    <div class="col-xl-3 col-lg-4 order-xl-2 order-1">
                    <?php
                    $currencyCode = session('currency_code');
                            $isDZD = in_array($currencyCode, ['DZD', 'DA']);
                            $showQuoteForm = request('flight_ticket') == '1' && $isDZD;
                        ?>
                        
                        <div x-data="bookingForm()" class="tg-tour-about-sidebar top-sticky mb-50">
                            
                            
                            <?php if($showQuoteForm): ?>
                                <form action="<?php echo e(route('quote-request.store')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <h4 class="tg-tour-about-title title-2 mb-15" style="color: #d4a017;">
                                        <i class="fas fa-plane"></i> <?php echo e(__('translate.Request a Quote')); ?>

                                    </h4>
                                    <input type="hidden" name="service_id" value="<?php echo e($service->id); ?>">
                                    <input type="hidden" name="flight_ticket_included" value="1">

                                    <div class="tg-booking-form-parent-inner mb-10">
                                        <div class="mb-3">
                                            <input required class="form-control" name="first_name" type="text" placeholder="<?php echo e(__('translate.First Name')); ?>" value="<?php echo e(auth()->user()->name ?? ''); ?>">
                                        </div>
                                        <div class="mb-3">
                                            <input required class="form-control" name="last_name" type="text" placeholder="<?php echo e(__('translate.Last Name')); ?>">
                                        </div>
                                        <div class="mb-3">
                                            <input required class="form-control" name="email" type="email" placeholder="<?php echo e(__('translate.Email')); ?>" value="<?php echo e(auth()->user()->email ?? ''); ?>">
                                        </div>
                                        <div class="mb-3">
                                            <input required class="form-control" name="phone" type="text" placeholder="<?php echo e(__('translate.Phone')); ?>" value="<?php echo e(auth()->user()->phone ?? ''); ?>">
                                        </div>
                                        <div class="mb-3">
                                             <label class="form-label"><?php echo e(__('translate.Check In Date')); ?></label>
                                            <input required class="form-control flatpickr" name="check_in_date" type="text" placeholder="<?php echo e(__('translate.Select Date')); ?>" value="<?php echo e(now()->format('Y-m-d')); ?>">
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label class="form-label"><?php echo e(__('translate.Adults')); ?></label>
                                            <input type="number" name="person" class="form-control" value="1" min="1">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label"><?php echo e(__('translate.Children')); ?> (< 18)</label>
                                            <input type="number" name="children" class="form-control" value="0" min="0">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label"><?php echo e(__('translate.Room Details')); ?> / <?php echo e(__('translate.Message')); ?></label>
                                            <textarea name="room_details" class="form-control" rows="3" placeholder="<?php echo e(__('translate.Example: Double Room, Triple Room, Flight preferences...')); ?>"></textarea>
                                        </div>
                                    </div>

                                    <button type="submit" class="tg-btn tg-btn-switch-animation w-100" style="background: linear-gradient(135deg, #d4a017 0%, #b8860b 100%);">
                                        <i class="fas fa-paper-plane"></i> <?php echo e(__('translate.Send Request')); ?>

                                    </button>
                                    
                                    
                                    <a href="<?php echo e(url()->current()); ?>" class="tg-btn tg-btn-switch-animation w-100 mt-10" style="background: #6c757d;">
                                        <i class="fas fa-arrow-left"></i> <?php echo e(__('translate.Back to Booking')); ?>

                                    </a>
                                </form>
                            <?php else: ?>
                            
                            
                            <div id="booking-form-container">
                            <form id="booking-form" action="<?php echo e(route('front.tourbooking.book.checkout.view')); ?>" method="GET">
                                <h4 class="tg-tour-about-title title-2 mb-15"><?php echo e(__('translate.Book This Tour')); ?></h4>

                                <input type="hidden" name="service_id" value="<?php echo e($service->id); ?>">

                                <div class="tg-booking-form-parent-inner mb-10">
                                </div>

                                <?php if($service->availability_periods && $service->availability_periods->count() > 0): ?>
                                    <?php
                                        // Group periods by month and year
                                        $periodsByMonth = [];
                                        $currentYear = now()->year;
                                        $years = [];
                                        
                                        foreach ($service->availability_periods as $period) {
                                            $startDate = \Carbon\Carbon::parse($period->start_date);
                                            $endDate = \Carbon\Carbon::parse($period->end_date);
                                            
                                            // Get all months covered by this period
                                            $currentDate = $startDate->copy();
                                            while ($currentDate <= $endDate) {
                                                $year = $currentDate->year;
                                                $month = $currentDate->month;
                                                $key = $year . '-' . $month;
                                                
                                                if (!isset($periodsByMonth[$year])) {
                                                    $periodsByMonth[$year] = [];
                                                }
                                                if (!isset($periodsByMonth[$year][$month])) {
                                                    $periodsByMonth[$year][$month] = [];
                                                }
                                                
                                                // Only add period if not already added for this month
                                                $alreadyAdded = false;
                                                foreach ($periodsByMonth[$year][$month] as $existingPeriod) {
                                                    if ($existingPeriod['id'] === $period->id) {
                                                        $alreadyAdded = true;
                                                        break;
                                                    }
                                                }
                                                
                                                if (!$alreadyAdded) {
                                                    // Calculate price for display
                                                    $adultPrice = $period->adult_price ?? $service->adult_price;
                                                    $discountPercentage = $period->adult_discount_percentage ?? $service->adult_discount_percentage;
                                                    $discountedPrice = $adultPrice;
                                                    
                                                    if ($discountPercentage > 0) {
                                                        $discountedPrice = $adultPrice - ($adultPrice * ($discountPercentage / 100));
                                                    } elseif ($period->discount_adult_price) {
                                                        $discountedPrice = $period->discount_adult_price;
                                                    } elseif ($service->discount_adult_price) {
                                                        $discountedPrice = $service->discount_adult_price;
                                                    }
                                                    
                                                    $periodsByMonth[$year][$month][] = [
                                                        'id' => $period->id,
                                                        'start_date' => $period->start_date,
                                                        'end_date' => $period->end_date,
                                                        'adult_price' => $adultPrice,
                                                        'discounted_price' => $discountedPrice,
                                                        'discount_percentage' => $discountPercentage,
                                                        'max_people' => $period->max_people,
                                                    ];
                                                }
                                                
                                                $currentDate->addMonth();
                                                $currentDate->day = 1; // Reset to first day of month
                                            }
                                            
                                            if (!in_array($startDate->year, $years)) {
                                                $years[] = $startDate->year;
                                            }
                                            if (!in_array($endDate->year, $years)) {
                                                $years[] = $endDate->year;
                                            }
                                        }
                                        
                                        sort($years);
                                        $monthNames = [
                                            1 => __('translate.Jan'), 2 => __('translate.Feb'), 3 => __('translate.Mar'),
                                            4 => __('translate.Apr'), 5 => __('translate.May'), 6 => __('translate.Jun'),
                                            7 => __('translate.Jul'), 8 => __('translate.Aug'), 9 => __('translate.Sep'),
                                            10 => __('translate.Oct'), 11 => __('translate.Nov'), 12 => __('translate.Dec')
                                        ];
                                        $monthNamesFull = [
                                            1 => __('translate.January'), 2 => __('translate.February'), 3 => __('translate.March'),
                                            4 => __('translate.April'), 5 => __('translate.May'), 6 => __('translate.June'),
                                            7 => __('translate.July'), 8 => __('translate.August'), 9 => __('translate.September'),
                                            10 => __('translate.October'), 11 => __('translate.November'), 12 => __('translate.December')
                                        ];
                                    ?>
                                    
                                    <div class="tg-tour-about-time mb-10">
                                        <span class="time mb-10 d-block"><?php echo e(__('translate.Availability by Month')); ?>:</span>
                                        
                                        <!-- New Month Selector Design -->
                                        <div class="ao-month-selector-wrapper">
                                            <!-- Year Navigation -->
                                            <div class="ao-month-selector__year-nav">
                                                <button type="button" class="ao-month-selector__year-btn ao-month-selector__year-btn--prev" id="yearPrevBtn">
                                                    <i class="fa-solid fa-chevron-left"></i>
                                                </button>
                                                <div class="ao-month-selector__year-display">
                                                    <span class="ao-month-selector__current-year" id="currentYear"><?php echo e($years[0] ?? $currentYear); ?></span>
                                                </div>
                                                <button type="button" class="ao-month-selector__year-btn ao-month-selector__year-btn--next" id="yearNextBtn">
                                                    <i class="fa-solid fa-chevron-right"></i>
                                                </button>
                                            </div>
                                            
                                            <!-- Months Grid -->
                                            <div class="ao-month-selector__grid-container" id="monthsScrollContainer">
                                                <?php $__currentLoopData = $years; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="ao-month-selector__year-grid <?php echo e($loop->first ? 'active' : ''); ?>" data-year="<?php echo e($year); ?>" id="yearMonths<?php echo e($year); ?>">
                                                        <?php for($month = 1; $month <= 12; $month++): ?>
                                                            <?php
                                                                $hasAvailability = isset($periodsByMonth[$year][$month]) && count($periodsByMonth[$year][$month]) > 0;
                                                                $period = $hasAvailability ? $periodsByMonth[$year][$month][0] : null;
                                                                $priceDisplay = '';
                                                                $isDiscounted = false;
                                                                
                                                                if ($hasAvailability && $period) {
                                                                    $adultPrice = $period['adult_price'];
                                                                    $discountedPrice = $period['discounted_price'];
                                                                    $discountPercentage = $period['discount_percentage'];
                                                                    
                                                                    if ($discountPercentage > 0 || $discountedPrice < $adultPrice) {
                                                                        $isDiscounted = true;
                                                                    }
                                                                    
                                                                    $displayPrice = $discountedPrice ?? $adultPrice;
                                                                    $priceDisplay = currency($displayPrice);
                                                                }
                                                            ?>
                                                            
                                                            <div class="ao-month-selector__month-card <?php echo e($hasAvailability ? 'available' : 'unavailable'); ?> <?php echo e($isDiscounted ? 'discounted' : ''); ?>" 
                                                                 data-year="<?php echo e($year); ?>" 
                                                                 data-month="<?php echo e($month); ?>"
                                                                 data-month-name="<?php echo e($monthNamesFull[$month]); ?>"
                                                                 <?php if($hasAvailability && $period): ?>
                                                                     data-period-id="<?php echo e($period['id']); ?>"
                                                                     data-start-date="<?php echo e($period['start_date']); ?>"
                                                                     data-end-date="<?php echo e($period['end_date']); ?>"
                                                                     data-adult-price="<?php echo e($period['adult_price']); ?>"
                                                                     data-discounted-price="<?php echo e($period['discounted_price']); ?>"
                                                                     data-discount-percentage="<?php echo e($period['discount_percentage']); ?>"
                                                                 <?php endif; ?>
                                                            >
                                                                <div class="ao-month-selector__month-name"><?php echo e($monthNames[$month]); ?></div>
                                                                <?php if($hasAvailability): ?>
                                                                    <div class="ao-month-selector__month-price">
                                                                        <?php if($isDiscounted): ?>
                                                                            <span class="ao-month-selector__price-original"><?php echo e(currency($adultPrice)); ?></span>
                                                                        <?php endif; ?>
                                                                        <span class="ao-month-selector__price-current <?php echo e($isDiscounted ? 'discounted' : ''); ?>"><?php echo e($priceDisplay); ?></span>
                                                                    </div>
                                                                <?php endif; ?>
                                                            </div>
                                                        <?php endfor; ?>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                            
                                            <!-- Year Indicator Dots -->
                                            <div class="ao-month-selector__year-indicators" id="yearIndicators">
                                                <?php $__currentLoopData = $years; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <span class="ao-month-selector__year-dot <?php echo e($loop->first ? 'active' : ''); ?>" data-year="<?php echo e($year); ?>"></span>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <div class="tg-tour-about-border-doted mb-15"></div>

                                
                                <?php if($isDZD): ?>
                                <div class="tg-tour-about-flight-option mb-15">
                                    <div class="checkbox d-flex align-items-start">
                                        <input type="checkbox" 
                                               name="flight_ticket_included" 
                                               id="flight_ticket_included"
                                               class="tg-checkbox"
                                               onchange="if(this.checked) { window.location.href = '<?php echo e(url()->current()); ?>?flight_ticket=1'; }">
                                        <label for="flight_ticket_included" class="tg-label" style="font-weight: 600; color: #d4a017;">
                                            <i class="fas fa-plane"></i> <?php echo e(__('translate.Flight Ticket Included')); ?>

                                        </label>
                                    </div>
                                    <small class="text-muted d-block mt-1" style="font-size: 12px;">
                                        <?php echo e(__('translate.Check this if you want flight tickets included. This will redirect to quote request.')); ?>

                                    </small>
                                </div>
                                <div class="tg-tour-about-border-doted mb-15"></div>
                                <?php endif; ?>

                                <!-- Hidden inputs for form submission -->
                                <input type="hidden" name="availability_period_id" id="sidebar-period-id">
                                <input type="hidden" name="check_in_date" id="sidebar-check-in-date">
                                
                                <!-- Contact Us Prompt -->
                                <div class="contact-us-prompt mb-3 p-3 bg-light rounded" style="font-size: 14px; color: #6c757d;">
                                    <i class="fa-regular fa-circle-question mr-2" style="color: var(--tg-theme-primary, #BE3144);"></i>
                                    <?php echo e(__('translate.Have questions? Our team is here to help you plan your perfect tour!')); ?>

                                </div>
                                
                                <a href="<?php echo e(route('contact-us', ['service_id' => $service->id])); ?>" class="tg-btn tg-btn-switch-animation w-100 text-center">
                                    <?php echo e(__('translate.Contact Us')); ?>

                                </a>
                                <?php if($service?->itineraries->count() > 0): ?>
                                    <a href="<?php echo e(route('front.tourbooking.services.download-tour-plan', $service->slug)); ?>" class="tg-btn tg-btn-switch-animation w-100 text-center mt-3" style="background: #111;">
                                        <i class="fa-solid fa-file-pdf mr-10"></i> <?php echo e(__('translate.Download PDF')); ?>

                                    </a>
                                <?php endif; ?>
                            </form>
                            </div>
                            
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- tg-tour-about-end -->

        <?php echo $__env->make('tourbooking::front.services.popular-services', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </main>
    <!-- main-area-end -->
<?php $__env->stopSection(); ?>


<?php $__env->startPush('js_section'); ?>
    <script>
        (function($) {
            "use strict";
            $(document).ready(function() {
                // Initialize timepicker
                $(".timepicker").flatpickr({
                    enableTime: true,
                    noCalendar: true,
                    dateFormat: "H:i",
                    time_24hr: true
                });

                // Extract availability periods from PHP data
                const availabilityPeriods = <?php echo json_encode($service->availability_periods ?? [], 15, 512) ?>;
                const availabilityPeriodsMap = {};

                // Create a map of period id -> period details for quick lookup
                availabilityPeriods.forEach(period => {
                    availabilityPeriodsMap[period.id] = {
                        start_date: period.start_date,
                        end_date: period.end_date,
                        max_people: period.max_people,
                        is_active: period.is_active,
                        adult_price: period.adult_price,
                        child_price: period.child_price,
                        adult_discount_percentage: period.adult_discount_percentage,
                        child_discount_percentage: period.child_discount_percentage
                    };
                });

                // Simple Month Selector Functionality
                const yearPrevBtn = document.getElementById('yearPrevBtn');
                const yearNextBtn = document.getElementById('yearNextBtn');
                const currentYearEl = document.getElementById('currentYear');
                const yearMonthsBlocks = document.querySelectorAll('.ao-month-selector__year-grid');
                const monthItems = document.querySelectorAll('.ao-month-selector__month-card');
                const yearDots = document.querySelectorAll('.ao-month-selector__year-dot');
                const monthsScrollContainer = document.getElementById('monthsScrollContainer');
                
                let currentYearIndex = 0;
                const years = Array.from(yearMonthsBlocks).map(block => parseInt(block.dataset.year));
                
                // Initialize
                function initMonthSelector() {
                    updateYearNavigation();
                    showYearMonths(years[0] || new Date().getFullYear());
                    
                    // Scroll to selected month if any
                    const selectedMonth = monthItems.querySelector('.selected');
                    if (selectedMonth) {
                        selectedMonth.scrollIntoView({ behavior: 'smooth', inline: 'center', block: 'nearest' });
                    }
                }
                
                // Year Navigation
                function updateYearNavigation() {
                    if (yearPrevBtn) {
                        yearPrevBtn.disabled = currentYearIndex <= 0;
                    }
                    if (yearNextBtn) {
                        yearNextBtn.disabled = currentYearIndex >= years.length - 1;
                    }
                    
                    if (currentYearEl) {
                        currentYearEl.textContent = years[currentYearIndex] || new Date().getFullYear();
                    }
                    
                    // Update dots
                    yearDots.forEach((dot, index) => {
                        dot.classList.toggle('active', index === currentYearIndex);
                    });
                }
                
                if (yearPrevBtn) {
                    yearPrevBtn.addEventListener('click', function() {
                        if (currentYearIndex > 0) {
                            currentYearIndex--;
                            updateYearNavigation();
                            showYearMonths(years[currentYearIndex]);
                        }
                    });
                }
                
                if (yearNextBtn) {
                    yearNextBtn.addEventListener('click', function() {
                        if (currentYearIndex < years.length - 1) {
                            currentYearIndex++;
                            updateYearNavigation();
                            showYearMonths(years[currentYearIndex]);
                        }
                    });
                }
                
                // Year dot click
                yearDots.forEach((dot, index) => {
                    dot.addEventListener('click', function() {
                        currentYearIndex = index;
                        updateYearNavigation();
                        showYearMonths(years[currentYearIndex]);
                    });
                });
                
                // Show year months
                function showYearMonths(year) {
                    yearMonthsBlocks.forEach(block => {
                        block.classList.remove('active');
                    });
                    
                    const activeBlock = document.getElementById('yearMonths' + year);
                    if (activeBlock) {
                        activeBlock.classList.add('active');
                        // Scroll to show months nicely
                        setTimeout(() => {
                            if (monthsScrollContainer) {
                                monthsScrollContainer.scrollLeft = 0;
                            }
                        }, 100);
                    }
                }
                
                // Generate calendar dates for the selected period
                function generateDatesCalendar(startDate, endDate, selectedMonth, selectedYear) {
                    if (!datesCalendarGrid) return;
                    
                    datesCalendarGrid.innerHTML = '';
                    
                    const start = new Date(startDate);
                    const end = new Date(endDate);
                    const today = new Date();
                    today.setHours(0, 0, 0, 0);
                    
                    // Generate all dates in the range
                    const currentDate = new Date(start);
                    while (currentDate <= end) {
                        const dateStr = currentDate.toISOString().split('T')[0];
                        const dayNum = currentDate.getDate();
                        const dayName = dayNames[currentDate.getDay()];
                        const isPast = currentDate < today;
                        const isInSelectedMonth = currentDate.getMonth() + 1 === parseInt(selectedMonth) && currentDate.getFullYear() === parseInt(selectedYear);
                        
                        const dateCell = document.createElement('div');
                        dateCell.className = `date-cell ${isPast ? 'disabled' : ''} ${!isInSelectedMonth ? 'disabled' : ''}`;
                        dateCell.dataset.date = dateStr;
                        
                        if (!isPast && isInSelectedMonth) {
                            dateCell.addEventListener('click', function() {
                                selectDate(this, dateStr, dayNum, dayName, currentDate);
                            });
                        }
                        
                        dateCell.innerHTML = `
                            <span class="day-number">${dayNum}</span>
                            <span class="day-name">${dayName}</span>
                        `;
                        
                        datesCalendarGrid.appendChild(dateCell);
                        currentDate.setDate(currentDate.getDate() + 1);
                    }
                }
                
                // Handle date selection
                function selectDate(dateCell, dateStr, dayNum, dayName, dateObj) {
                    // Remove selected class from all dates
                    document.querySelectorAll('.date-cell').forEach(cell => cell.classList.remove('selected'));
                    
                    // Add selected class to clicked date
                    dateCell.classList.add('selected');
                    
                    // Update hidden input
                    if (checkInDateInput) checkInDateInput.value = dateStr;
                    
                    // Show selected date info
                    if (selectedDateText) {
                        const formattedDate = dateObj.toLocaleDateString('<?php echo e(app()->getLocale()); ?>', {
                            weekday: 'long',
                            day: 'numeric',
                            month: 'long',
                            year: 'numeric'
                        });
                        selectedDateText.textContent = formattedDate;
                    }
                    if (selectedDateInfo) selectedDateInfo.style.display = 'block';
                    
                    // Enable book button
                    if (bookBtn) bookBtn.disabled = false;
                    
                    // Smooth scroll to book button
                    setTimeout(() => {
                        bookBtn.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }, 100);
                }
                
                // Global function to scroll to availability section
                window.scrollToAvailability = function() {
                    const availabilitySection = document.getElementById('availability-section');
                    if (availabilitySection) {
                        availabilitySection.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }
                };
                
                // Month item click handler
                monthItems.forEach(item => {
                    item.addEventListener('click', function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        
                        if (this.classList.contains('unavailable')) {
                            this.style.animation = 'shake 0.4s ease';
                            setTimeout(() => {
                                this.style.animation = '';
                            }, 400);
                            return;
                        }
                        
                        // Get data attributes
                        const periodId = this.getAttribute('data-period-id');
                        const startDate = this.getAttribute('data-start-date');
                        const endDate = this.getAttribute('data-end-date');
                        const monthName = this.getAttribute('data-month-name');
                        const year = this.getAttribute('data-year');
                        const month = this.getAttribute('data-month');
                        const adultPrice = this.getAttribute('data-adult-price');
                        const discountedPrice = this.getAttribute('data-discounted-price');
                        const discountPercentage = this.getAttribute('data-discount-percentage');
                        
                        // Update selected state
                        monthItems.forEach(m => m.classList.remove('selected'));
                        this.classList.add('selected');
                        
                        // Scroll the selected month into view
                        this.scrollIntoView({ behavior: 'smooth', inline: 'center', block: 'nearest' });
                        
                        // Show availability section at bottom
                        if (typeof showAvailabilitySection === 'function') {
                            showAvailabilitySection(periodId, startDate, endDate, monthName, year, month, adultPrice, discountedPrice, discountPercentage);
                        } else {
                            console.error('showAvailabilitySection function not found');
                        }
                    });
                });
                
                // Show availability section with periods
                window.showAvailabilitySection = function(periodId, startDate, endDate, monthName, year, month, adultPrice, discountedPrice, discountPercentage) {
                    console.log('showAvailabilitySection called with:', { periodId, startDate, endDate, monthName, year });
                    
                    const availabilitySection = document.getElementById('availability-section');
                    
                    if (!availabilitySection) {
                        console.error('ERROR: availability-section element not found!');
                        alert('Error: Availability section not found. Please refresh the page.');
                        return;
                    }
                    
                    // Calculate values
                    const start = new Date(startDate);
                    const end = new Date(endDate);
                    const days = Math.ceil((end - start) / (1000 * 60 * 60 * 24)) + 1;
                    const adultPriceNum = parseFloat(adultPrice) || 0;
                    const discountedPriceNum = parseFloat(discountedPrice) || 0;
                    const finalPrice = discountedPriceNum > 0 && discountedPriceNum < adultPriceNum ? discountedPriceNum : adultPriceNum;
                    const discountNum = parseFloat(discountPercentage) || 0;
                    const hasDiscount = discountNum > 0;
                    
                    // Update header
                    const availabilityMonthYear = document.getElementById('availability-month-year');
                    if (availabilityMonthYear) {
                        availabilityMonthYear.textContent = monthName + ' ' + year;
                    }
                    
                    // Update month summary
                    const selectedMonthSummary = document.getElementById('selected-month-summary');
                    if (selectedMonthSummary) {
                        const startStr = start.toLocaleDateString('<?php echo e(app()->getLocale()); ?>', {day: 'numeric', month: 'short'});
                        const endStr = end.toLocaleDateString('<?php echo e(app()->getLocale()); ?>', {day: 'numeric', month: 'short', year: 'numeric'});
                        
                        selectedMonthSummary.innerHTML = `
                            <div class="month-summary-header">
                                <i class="fa-regular fa-calendar-check"></i>
                                <span>${monthName} ${year}</span>
                            </div>
                            <div class="month-summary-details">
                                <div class="summary-item">
                                    <i class="fa-regular fa-calendar"></i>
                                    <span>${startStr} - ${endStr}</span>
                                </div>
                                <div class="summary-item">
                                    <i class="fa-solid fa-clock"></i>
                                    <span>${days}d</span>
                                </div>
                                <div class="summary-item price">
                                    <i class="fa fa-user"></i>
                                    <span>${formatCurrency(finalPrice)}</span>
                                </div>
                                ${hasDiscount ? `
                                <div class="summary-item discount">
                                    <i class="fa-solid fa-tag"></i>
                                    <span>-${discountNum}%</span>
                                </div>
                                ` : ''}
                            </div>
                        `;
                    }
                    
                    // Generate period card
                    const periodsList = document.getElementById('periods-list');
                    if (periodsList) {
                        const displayPrice = hasDiscount ? discountedPriceNum : adultPriceNum;
                        const startStr = start.toLocaleDateString('<?php echo e(app()->getLocale()); ?>', {day: 'numeric', month: 'short'});
                        const endStr = end.toLocaleDateString('<?php echo e(app()->getLocale()); ?>', {day: 'numeric', month: 'short'});
                        
                        periodsList.innerHTML = `
                            <div class="period-card" data-period-id="${periodId}" data-start-date="${startDate}" data-end-date="${endDate}">
                                <div class="period-info-left">
                                    <div class="period-dates-range">${startStr} - ${endStr}</div>
                                    <div class="period-duration">
                                        <i class="fa-solid fa-clock"></i>
                                        <span>${days}d</span>
                                    </div>
                                </div>
                                <div class="period-price-box">
                                    ${hasDiscount ? `<span class="period-original-price">${formatCurrency(adultPriceNum)}</span>` : ''}
                                    <span class="period-current-price">${formatCurrency(displayPrice)}</span>
                                    ${hasDiscount ? `<span class="period-discount-badge">-${discountNum}%</span>` : ''}
                                </div>
                            </div>
                        `;
                        
                        // Add click handler to period card
                        const periodCard = periodsList.querySelector('.period-card');
                        if (periodCard) {
                            periodCard.addEventListener('click', function() {
                                selectPeriod(this, periodId, startDate, endDate, start, end);
                            });
                        }
                    }
                    
                    // Reset selected period display
                    const selectedPeriodFinal = document.getElementById('selected-period-final');
                    const bottomBookBtn = document.getElementById('bottom-book-now-btn');
                    if (selectedPeriodFinal) selectedPeriodFinal.style.display = 'none';
                    if (bottomBookBtn) bottomBookBtn.disabled = true;
                    
                    // Show section
                    availabilitySection.style.display = 'block';
                    console.log('Section is now visible');
                    
                    // Update bottom total cost initially with the selected month's period price
                    updateBottomTotal(finalPrice, 0);
                    
                    // Scroll to section
                    setTimeout(() => {
                        console.log('Scrolling...');
                        availabilitySection.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }, 300);
                }
                
                // Select a period
                function selectPeriod(card, periodId, startDate, endDate, startObj, endObj) {
                    // Remove selected from all cards
                    document.querySelectorAll('.period-card').forEach(c => c.classList.remove('selected'));
                    
                    // Add selected to clicked card
                    card.classList.add('selected');
                    
                    // Update hidden inputs
                    const bottomPeriodId = document.getElementById('bottom-period-id');
                    const bottomCheckInDate = document.getElementById('bottom-check-in-date');
                    if (bottomPeriodId) bottomPeriodId.value = periodId;
                    if (bottomCheckInDate) bottomCheckInDate.value = startDate;
                    
                    // Show selected period info
                    const selectedPeriodFinal = document.getElementById('selected-period-final');
                    const finalPeriodDates = document.getElementById('final-period-dates');
                    
                    if (finalPeriodDates) {
                        finalPeriodDates.textContent = `${startObj.toLocaleDateString('<?php echo e(app()->getLocale()); ?>', {day: 'numeric', month: 'long'})} - ${endObj.toLocaleDateString('<?php echo e(app()->getLocale()); ?>', {day: 'numeric', month: 'long', year: 'numeric'})}`;
                    }
                    
                    if (selectedPeriodFinal) {
                        selectedPeriodFinal.style.display = 'block';
                        selectedPeriodFinal.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                    }
                    
                    // Enable book button
                    const bottomBookBtn = document.getElementById('bottom-book-now-btn');
                    if (bottomBookBtn) bottomBookBtn.disabled = false;
                }
                
                // Update bottom total cost
                function updateBottomTotal(adultPrice, childPrice) {
                    const adultsSelect = document.getElementById('bottom-adults-select');
                    const childrenSelect = document.getElementById('bottom-children-select');
                    const totalDisplay = document.getElementById('bottom-total-cost');
                    
                    if (!adultsSelect || !childrenSelect || !totalDisplay) return;
                    
                    const adults = parseInt(adultsSelect.value) || 1;
                    const children = parseInt(childrenSelect.value) || 0;
                    
                    const total = (adults * adultPrice) + (children * childPrice);
                    totalDisplay.textContent = formatCurrency(total.toFixed(2));
                    
                    // Update hidden inputs
                    const bottomPerson = document.getElementById('bottom-person');
                    const bottomChildren = document.getElementById('bottom-children');
                    if (bottomPerson) bottomPerson.value = adults;
                    if (bottomChildren) bottomChildren.value = children;
                }
                
                // Passenger select change handlers
                const bottomAdultsSelect = document.getElementById('bottom-adults-select');
                const bottomChildrenSelect = document.getElementById('bottom-children-select');
                
                if (bottomAdultsSelect) {
                    bottomAdultsSelect.addEventListener('change', function() {
                        const selectedMonth = document.querySelector('.ao-month-selector__month-card.selected');
                        if (selectedMonth) {
                            const adultPrice = parseFloat(selectedMonth.dataset.discountedPrice) || parseFloat(selectedMonth.dataset.adultPrice);
                            const childPrice = 0;
                            updateBottomTotal(adultPrice, childPrice);
                        }
                    });
                }
                
                if (bottomChildrenSelect) {
                    bottomChildrenSelect.addEventListener('change', function() {
                        const selectedMonth = document.querySelector('.ao-month-selector__month-card.selected');
                        if (selectedMonth) {
                            const adultPrice = parseFloat(selectedMonth.dataset.discountedPrice) || parseFloat(selectedMonth.dataset.adultPrice);
                            const childPrice = 0;
                            updateBottomTotal(adultPrice, childPrice);
                        }
                    });
                }
                
                // Add shake animation keyframes dynamically
                const shakeKeyframes = `
                    @keyframes shake {
                        0%, 100% { transform: translateX(0); }
                        25% { transform: translateX(-3px); }
                        75% { transform: translateX(3px); }
                    }
                `;
                const styleSheet = document.createElement('style');
                styleSheet.textContent = shakeKeyframes;
                document.head.appendChild(styleSheet);
                
                // Hide the old date input (keep it for form submission)
                const oldDateInput = document.querySelector('input[name="check_in_date"]');
                if (oldDateInput) {
                    oldDateInput.closest('.tg-booking-form-parent-inner').style.display = 'none';
                // Toggle all accordion items
                const toggleAllBtn = document.getElementById('toggle-all-accordion');
                const inclusionsAccordion = document.getElementById('inclusionsAccordion');
            });
        })(jQuery);
    </script>

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        // Get currency format from PHP
        const currencyFormat = '<?php echo e(currency(0)); ?>';
        const currencySymbol = currencyFormat.replace('0', '').trim();
        const currencyRate = <?php echo e(Session::get('currency_rate', 1)); ?>;
        
        // Function to format price with currency
        function formatCurrency(amount) {
            // Split by first '0' and reconstruct with the actual amount
            const parts = currencyFormat.split('0', 2);
            if (parts.length === 2) {
                return parts[0] + amount + parts[1];
            }
            return currencyFormat;
        }
        
        function reviewForm() {
            return {
                categories: [{
                        name: 'Location',
                        rating: 0
                    },
                    {
                        name: 'Price',
                        rating: 0
                    },
                    {
                        name: 'Amenities',
                        rating: 0
                    },
                    {
                        name: 'Rooms',
                        rating: 0
                    },
                    {
                        name: 'Services',
                        rating: 0
                    }
                ],
                hoverRating: 0,
                hoverIndex: null,
                message: '',
                saveInfo: false,

                setRating(index, rating) {
                    this.categories[index].rating = rating;
                },

                submitForm() {
                    // Collect all form data
                    const data = {
                        service_id: `<?php echo e($service->id); ?>`,
                        message: this.message,
                        ratings: this.categories.map(c => ({
                            category: c.name,
                            rating: c.rating
                        }))
                    };

                    if (!data.message.trim()) {
                        toastr.error('<?php echo e(__('Please write your review before submitting.')); ?>');
                        return;
                    }

                    if (data.ratings.some(c => c.rating === 0)) {
                        toastr.error('<?php echo e(__('Please select a rating before submitting.')); ?>');
                        return;
                    }

                    // Simulate form submission
                    this.ajaxSubmitForm(data);
                },

                resetForm() {
                    this.name = '';
                    this.email = '';
                    this.message = '';
                    this.saveInfo = false;
                    this.categories.forEach(c => c.rating = 0);
                },

                ajaxSubmitForm(data) {
                    fetch(`<?php echo e(route('front.tourbooking.reviews.store')); ?>`, {
                            method: 'POST',
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                    'content'),
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify(data)
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                toastr.success(data.message);
                                this.resetForm();
                            } else {
                                toastr.error(data.message);
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            toastr.error('<?php echo e(__('An error occurred. Please try again later.')); ?>');
                        });
                }
            };
        }

        function bookingForm() {
            return {
                tickets: {
                    person: 1,
                    children: 0
                },
                basePricePerAdult: <?php echo e($service->discount_adult_price ?? $service->adult_price ?? 0); ?>,
                basePricePerChild: <?php echo e($service->discount_child_price ?? $service->child_price ?? 0); ?>,
                pricePerAdult: <?php echo e($service->discount_adult_price ?? $service->adult_price ?? 0); ?>,
                pricePerChild: <?php echo e($service->discount_child_price ?? $service->child_price ?? 0); ?>,
                flightTicketIncluded: false,
                extras: {
                    <?php $__currentLoopData = $service->extraCharges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $extra): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        charge_<?php echo e($key); ?>: false,
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                },
                extrasPrice: {
                    <?php $__currentLoopData = $service->extraCharges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $extra): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        charge_<?php echo e($key); ?>: <?php echo e($extra->price ?? 0); ?>,
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                },
                // Method to update prices based on selected period
                updatePrices(adultPrice, childPrice) {
                    this.pricePerAdult = adultPrice || this.basePricePerAdult;
                    this.pricePerChild = childPrice || this.basePricePerChild;
                },
                // Reset prices to base service prices
                resetPrices() {
                    this.pricePerAdult = this.basePricePerAdult;
                    this.pricePerChild = this.basePricePerChild;
                },
                get totalCost() {
                    let total = 0;
                    total += this.tickets.person * this.pricePerAdult;
                    total += this.tickets.children * this.pricePerChild;
                    for (let key in this.extras) {
                        if (this.extras[key]) {
                            total += this.extrasPrice[key];
                        }
                    }
                    // Apply currency rate conversion
                    total = total * currencyRate;
                    return total.toFixed(2);
                },
                get totalCostFormatted() {
                    return formatCurrency(this.totalCost);
                }
            };
        }
        
        // Global function to update booking prices from month selection
        function updateBookingPrices(adultPrice, childPrice) {
            // Find the Alpine.js component and update prices
            const bookingFormEl = document.querySelector('[x-data="bookingForm()"]');
            if (bookingFormEl && bookingFormEl._x_dataStack) {
                const component = bookingFormEl._x_dataStack[0];
                if (component && component.updatePrices) {
                    component.updatePrices(adultPrice, childPrice);
                }
            }
        }
    </script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('style_section'); ?>
    <style>
        /* Alpine.js cloak - prevents flash of unstyled content */
        [x-cloak] { display: none !important; }
        
        /* Smooth transition between forms */
        #booking-form-container,
        #quote-form-container {
            transition: all 0.3s ease;
        }
        
        /* Style for flight ticket checkbox */
        #flight_ticket_included:checked + label {
            color: #d4a017;
        }
        
        /* Animation for form switch */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        #quote-form-container {
            animation: fadeIn 0.3s ease;
        }
        
        a.tg-listing-item-wishlist.active {
            color: var(--tg-theme-primary);
        }

        .small-discount-badge .badge {
            font-size: 0.75rem;
            padding: 0.25rem 0.5rem;
        }

        /* Discount badge above price - main feature section */
        .discount-badge-above-price {
            position: absolute;
            top: -35px;
            right: 0;
            z-index: 10;
        }

        .discount-badge-above-price .badge {
            background: linear-gradient(135deg, #ff6b6b 0%, #ee5a5a 100%);
            color: white;
            font-weight: 700;
            font-size: 13px;
            padding: 6px 14px;
            border-radius: 20px;
            box-shadow: 0 4px 12px rgba(238, 90, 90, 0.4);
            display: inline-block;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            text-decoration: none;
        }

        /* Price row with reduced font size */
        .price-row {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 5px;
            font-size: 14px;
        }

        .price-display {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
        }

        .price-display del {
            font-size: 11px;
            color: #999;
            text-decoration: line-through;
        }

        .price-display span:last-child,
        .price-display > :not(del) {
            font-size: 15px;
            font-weight: 600;
            color: var(--tg-theme-primary);
        }

        /* Discount badge below price - sidebar tickets section */
        .discount-badge-below-price {
            margin-top: 5px;
            text-align: left;
        }

        .discount-badge-below-price .badge {
            background: linear-gradient(135deg, #ff6b6b 0%, #ee5a5a 100%);
            color: white;
            font-weight: 700;
            font-size: 10px;
            padding: 3px 8px;
            border-radius: 12px;
            box-shadow: 0 2px 6px rgba(238, 90, 90, 0.3);
            display: inline-block;
            text-transform: uppercase;
            letter-spacing: 0.3px;
            text-decoration: none;
        }

        .tg-tour-about-cus-review-thumb img {
            height: 128px;
        }

        .tg-tour-details-video-ratings i {
            color: #a6a6a6;
        }

        .tg-tour-details-video-ratings i.active {
            color: var(--tg-common-yellow);
        }

        .custom-select {
            min-width: 60px;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 1px solid #d6d6d6;
            border-radius: 24px;
            padding: 1px 14px;
            font-weight: 400;
            font-size: 16px;
            color: var(--tg-grey-1);
        }

        .custom-select:focus {
            outline: none;
            border-color: #BE3144;
        }

        .calender-active.open .flatpickr-innerContainer .flatpickr-days .flatpickr-day.today,
        .flatpickr-calendar.open .flatpickr-innerContainer .flatpickr-days .flatpickr-day.selected {
            color: var(--tg-common-white) !important;
            background-color: var(--tg-theme-primary) !important;
        }

        .availability-periods-list {
            max-height: 300px;
            overflow-y: auto;
        }

        .availability-period-item {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .availability-period-item:hover {
            background-color: #e9ecef;
            border-color: var(--tg-theme-primary);
        }

        .availability-period-item input[type="radio"]:checked + label {
            color: var(--tg-theme-primary);
            font-weight: 600;
        }

        .availability-period-item input[type="radio"] {
            cursor: pointer;
        }

        .availability-period-item label {
            cursor: pointer;
            margin-bottom: 0;
        }

        /* Availability Dropdown Styles */
        .availability-dropdown-container {
            position: relative;
        }

        .availability-dropdown-btn {
            width: 100%;
            padding: 12px 15px;
            background: #fff;
            border: 1px solid #d6d6d6;
            border-radius: 24px;
            font-size: 16px;
            color: var(--tg-grey-1);
            text-align: left;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: all 0.3s ease;
        }

        .availability-dropdown-btn:hover,
        .availability-dropdown-btn.active {
            border-color: var(--tg-theme-primary);
            box-shadow: 0 0 0 3px rgba(86, 12, 227, 0.1);
        }

        .availability-dropdown-btn .dropdown-arrow {
            transition: transform 0.3s ease;
        }

        .availability-dropdown-btn.active .dropdown-arrow {
            transform: rotate(180deg);
        }

        .availability-dropdown-menu {
            position: absolute;
            top: calc(100% + 5px);
            left: 0;
            right: 0;
            background: #fff;
            border: 1px solid #d6d6d6;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            z-index: 1000;
            display: none;
            max-height: 400px;
            overflow: hidden;
        }

        .availability-dropdown-menu.show {
            display: block;
            animation: slideDown 0.3s ease;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .availability-dropdown-search {
            padding: 12px 15px;
            border-bottom: 1px solid #e9ecef;
        }

        .availability-dropdown-search input {
            width: 100%;
            padding: 10px 15px;
            border: 1px solid #d6d6d6;
            border-radius: 20px;
            font-size: 14px;
            outline: none;
            transition: all 0.3s ease;
        }

        .availability-dropdown-search input:focus {
            border-color: var(--tg-theme-primary);
            box-shadow: 0 0 0 3px rgba(86, 12, 227, 0.1);
        }

        .availability-dropdown-list {
            max-height: 320px;
            overflow-y: auto;
            padding: 8px 0;
        }

        .availability-dropdown-list::-webkit-scrollbar {
            width: 6px;
        }

        .availability-dropdown-list::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 3px;
        }

        .availability-dropdown-list::-webkit-scrollbar-thumb {
            background: #c1c1c1;
            border-radius: 3px;
        }

        .availability-dropdown-list::-webkit-scrollbar-thumb:hover {
            background: #a1a1a1;
        }

        .availability-period-option {
            padding: 12px 15px;
            cursor: pointer;
            transition: all 0.2s ease;
            border-bottom: 1px solid #f1f1f1;
        }

        .availability-period-option:last-child {
            border-bottom: none;
        }

        .availability-period-option:hover {
            background-color: #f8f9fa;
        }

        .availability-period-option.selected {
            background-color: rgba(86, 12, 227, 0.1);
            border-left: 3px solid var(--tg-theme-primary);
        }

        .period-dates {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 6px;
        }

        .period-start,
        .period-end {
            font-weight: 600;
            color: var(--tg-grey-1);
            font-size: 15px;
        }

        .period-separator {
            color: #999;
            font-size: 14px;
        }

        .period-details {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 13px;
            color: #666;
        }

        .period-details i {
            color: var(--tg-theme-primary);
        }

        .period-info {
            margin-top: 10px;
        }

        .period-info .alert {
            padding: 12px 15px;
            border-radius: 8px;
            font-size: 14px;
        }

        .period-info .alert-success {
            background-color: rgba(40, 167, 69, 0.1);
            border-color: rgba(40, 167, 69, 0.2);
            color: #28a745;
        }

        .period-info .alert-warning {
            background-color: rgba(255, 193, 7, 0.1);
            border-color: rgba(255, 193, 7, 0.2);
            color: #ffc107;
        }
        /* TourRadar Style Accordion */
        .tour-radar-accordion {
            font-family: 'Inter', sans-serif;
            border-top: 1px solid #eee;
        }

        .tour-radar-accordion .accordion-item {
            border: none;
            border-bottom: 1px solid #eee;
            background: transparent;
        }

        .tour-radar-accordion .accordion-header {
            margin-bottom: 0;
        }

        .tour-radar-accordion .accordion-button {
            padding: 18px 0;
            background-color: transparent !important;
            border: none !important;
            box-shadow: none !important;
            display: flex;
            align-items: center;
            width: 100%;
            text-align: left;
            font-size: 16px;
            font-weight: 600;
            color: #333;
        }

        .tour-radar-accordion .accordion-button:not(.collapsed) {
            color: var(--tg-theme-primary);
        }

        .tour-radar-accordion .accordion-button::after {
            display: none;
        }

        .tour-radar-accordion .accordion-arrow {
            margin-left: auto;
            font-size: 12px;
            color: #999;
            transition: transform 0.2s ease;
        }

        .tour-radar-accordion .accordion-button:not(.collapsed) .accordion-arrow {
            transform: rotate(-180deg);
        }

        .tour-radar-accordion .category-icon {
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #f8f9fa;
            color: #666;
            margin-right: 15px;
            font-size: 14px;
            flex-shrink: 0;
        }

        .tour-radar-accordion .category-icon.included {
            background: #e8f5e9;
            color: #28a745;
        }

        .tour-radar-accordion .category-icon.excluded {
            background: #ffebee;
            color: #dc3545;
        }

        .tour-radar-accordion .dietary-badges {
            display: flex;
            gap: 5px;
            margin-left: 15px;
        }

        .tour-radar-accordion .dietary-badges .badge {
            background: #e9ecef;
            color: #495057;
            font-weight: 500;
            font-size: 11px;
            padding: 4px 8px;
            border-radius: 4px;
        }

        .tour-radar-accordion .accordion-body {
            padding: 0 0 18px 51px;
            color: #666;
            font-size: 15px;
            line-height: 1.6;
        }

        .tour-radar-accordion .controls-row {
            display: flex;
            justify-content: flex-end;
            padding-top: 10px;
        }

        .tour-radar-accordion .btn-toggle-all {
            background: none;
            border: none;
            color: var(--tg-theme-primary);
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            padding: 0;
        }

        .tour-radar-accordion .btn-toggle-all:hover {
            text-decoration: underline;
        }

        .tour-radar-accordion .tg-tour-about-title {
            font-size: 18px;
            font-weight: 700;
            color: #1a1a1a;
            border-bottom: 2px solid #eee;
            padding-bottom: 10px;
            margin-top: 10px;
        }

        @media (max-width: 768px) {
            .tour-radar-accordion .accordion-button {
                font-size: 14px;
            }
            .tour-radar-accordion .category-icon {
                width: 30px;
                height: 30px;
                margin-right: 10px;
            }
            .tour-radar-accordion .accordion-body {
                padding-left: 40px;
                font-size: 14px;
            }
        }
    </style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layout_inner_page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\archive\archive\Modules/TourBooking\resources/views/front/services/service-detail.blade.php ENDPATH**/ ?>