

<?php $__env->startSection('title'); ?>
    <title>Services</title>
    <meta name="title" content="Services">
    <meta name="description" content="Services">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('front-content'); ?>

    <?php $__env->startPush('style_section'); ?>
        <style>
            /* ============================================
               MONTH SELECTOR V2 - MODERN DESIGN
               ============================================ */

            .month-selector-v2 {
                background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%);
                border-radius: 16px;
                padding: 20px;
                border: 1px solid #e9ecef;
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
            }

            /* --- Year Selector Dropdown --- */
            .year-selector-wrapper {
                position: relative;
            }

            .year-selector-label {
                display: block;
                font-size: 12px;
                font-weight: 600;
                color: #6c757d;
                text-transform: uppercase;
                letter-spacing: 0.8px;
                margin-bottom: 8px;
            }

            .year-dropdown {
                position: relative;
            }

            .year-dropdown-toggle {
                width: 100%;
                background: linear-gradient(145deg, #ffffff 0%, #f1f3f4 100%);
                border: 2px solid #e9ecef;
                border-radius: 12px;
                padding: 14px 18px;
                display: flex;
                justify-content: space-between;
                align-items: center;
                cursor: pointer;
                transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                font-size: 16px;
                font-weight: 600;
                color: #2d3436;
            }

            .year-dropdown-toggle:hover {
                border-color: var(--tg-theme-primary, #560CE3);
                box-shadow: 0 4px 12px rgba(86, 12, 227, 0.12);
            }

            .year-dropdown-toggle.active {
                border-color: var(--tg-theme-primary, #560CE3);
                box-shadow: 0 4px 16px rgba(86, 12, 227, 0.18);
            }

            .year-dropdown-toggle i {
                transition: transform 0.3s ease;
                color: #6c757d;
            }

            .year-dropdown-toggle.active i {
                transform: rotate(180deg);
                color: var(--tg-theme-primary, #560CE3);
            }

            .year-dropdown-menu {
                position: absolute;
                top: calc(100% + 8px);
                left: 0;
                right: 0;
                background: white;
                border-radius: 12px;
                box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
                z-index: 100;
                opacity: 0;
                visibility: hidden;
                transform: translateY(-10px);
                transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                max-height: 250px;
                overflow-y: auto;
                padding: 8px;
            }

            .year-dropdown-menu.show {
                opacity: 1;
                visibility: visible;
                transform: translateY(0);
            }

            .year-option {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 12px 16px;
                border-radius: 8px;
                cursor: pointer;
                transition: all 0.2s ease;
                margin-bottom: 4px;
            }

            .year-option:last-child {
                margin-bottom: 0;
            }

            .year-option:hover {
                background: #f8f9fa;
            }

            .year-option.active {
                background: linear-gradient(135deg, var(--tg-theme-primary, #560CE3) 0%, #7c3aed 100%);
                color: white;
            }

            .year-option.active .year-badge {
                background: rgba(255, 255, 255, 0.25);
                color: white;
            }

            .year-text {
                font-weight: 600;
                font-size: 15px;
            }

            .year-badge {
                font-size: 11px;
                font-weight: 500;
                padding: 4px 10px;
                border-radius: 20px;
                background: #e9ecef;
                color: #6c757d;
            }

            /* --- Months Container --- */
            .months-container {
                position: relative;
                min-height: 200px;
            }

            .year-months-block {
                display: none;
                animation: fadeInMonths 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            }

            .year-months-block.active {
                display: block;
            }

            @keyframes fadeInMonths {
                from {
                    opacity: 0;
                    transform: translateY(15px) scale(0.98);
                }
                to {
                    opacity: 1;
                    transform: translateY(0) scale(1);
                }
            }

            /* --- Months Grid V2 - 12 Beautiful Rectangles --- */
            .months-grid-v2 {
                display: grid !important;
                grid-template-columns: repeat(4, 1fr) !important;
                gap: 10px !important;
                width: 100% !important;
            }

            /* Force grid on the container */
            .year-months-block .months-grid-v2,
            .months-container .months-grid-v2 {
                display: grid !important;
                grid-template-columns: repeat(4, 1fr) !important;
            }

            @media (max-width: 1200px) {
                .months-grid-v2 {
                    grid-template-columns: repeat(3, 1fr) !important;
                }
            }

            @media (max-width: 768px) {
                .months-grid-v2 {
                    grid-template-columns: repeat(3, 1fr) !important;
                    gap: 8px !important;
                }
            }

            @media (max-width: 480px) {
                .months-grid-v2 {
                    grid-template-columns: repeat(2, 1fr) !important;
                    gap: 8px !important;
                }
            }

            /* --- Month Box Styling --- */
            .month-box {
                position: relative;
                background: white;
                border-radius: 14px;
                padding: 16px 8px 10px;
                text-align: center;
                cursor: pointer;
                transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
                border: 2px solid transparent;
                box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
                overflow: hidden;
            }

            .month-box::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                height: 3px;
                background: linear-gradient(90deg, #e9ecef, #dee2e6);
                transition: all 0.3s ease;
            }

            .month-box.available {
                border-color: #e9ecef;
            }

            .month-box.available::before {
                background: linear-gradient(90deg, #28a745, #20c997);
            }

            .month-box.available:hover {
                border-color: #28a745;
                transform: translateY(-4px) scale(1.02);
                box-shadow: 0 12px 28px rgba(40, 167, 69, 0.2);
            }

            .month-box.unavailable {
                background: #f8f9fa;
                cursor: not-allowed;
                opacity: 0.7;
            }

            .month-box.unavailable::before {
                background: #dee2e6;
            }

            .month-box.discounted {
                border-color: #ffc107;
                background: linear-gradient(145deg, #ffffff 0%, #fff9e6 100%);
            }

            .month-box.discounted::before {
                background: linear-gradient(90deg, #ffc107, #ff9800);
            }

            .month-box.discounted:hover {
                border-color: #ff9800;
                transform: translateY(-4px) scale(1.02);
                box-shadow: 0 12px 28px rgba(255, 193, 7, 0.25);
            }

            .month-box.selected {
                border-color: var(--tg-theme-primary, #560CE3);
                background: linear-gradient(145deg, #f3f0ff 0%, #e8e0ff 100%);
                transform: translateY(-2px);
                box-shadow: 0 8px 24px rgba(86, 12, 227, 0.2);
            }

            .month-box.selected::before {
                background: linear-gradient(90deg, var(--tg-theme-primary, #560CE3), #7c3aed);
                height: 4px;
            }

            .month-box.selected::after {
                content: '\f00c';
                font-family: 'Font Awesome 6 Free';
                font-weight: 900;
                position: absolute;
                top: 6px;
                right: 6px;
                width: 20px;
                height: 20px;
                background: var(--tg-theme-primary, #560CE3);
                color: white;
                border-radius: 50%;
                font-size: 10px;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            /* --- Month Box Inner Content --- */
            .month-box-inner {
                display: flex;
                flex-direction: column;
                align-items: center;
                gap: 4px;
            }

            .month-short {
                font-size: 13px;
                font-weight: 700;
                color: #495057;
                text-transform: uppercase;
                letter-spacing: 1px;
            }

            .month-number {
                font-size: 22px;
                font-weight: 800;
                color: #2d3436;
                line-height: 1;
            }

            .month-box.unavailable .month-short,
            .month-box.unavailable .month-number {
                color: #adb5bd;
            }

            .month-box.selected .month-short {
                color: var(--tg-theme-primary, #560CE3);
            }

            .month-box.selected .month-number {
                color: #2d3436;
            }

            /* --- Month Badge --- */
            .month-badge {
                font-size: 10px;
                font-weight: 700;
                padding: 2px 8px;
                border-radius: 12px;
                margin-top: 4px;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                min-width: 32px;
            }

            .month-badge.available {
                background: #d4edda;
                color: #155724;
            }

            .month-badge.discount {
                background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
                color: white;
                font-size: 9px;
                padding: 3px 8px;
            }

            .month-badge.unavailable {
                background: #e9ecef;
                color: #adb5bd;
            }

            /* --- Month Price Tag --- */
            .month-price-tag {
                position: absolute;
                bottom: 0;
                left: 0;
                right: 0;
                background: linear-gradient(180deg, transparent 0%, rgba(0,0,0,0.03) 100%);
                padding: 6px 4px;
                font-size: 11px;
                font-weight: 600;
                color: #28a745;
                border-top: 1px solid rgba(40, 167, 69, 0.1);
            }

            .month-box.discounted .month-price-tag {
                color: #dc3545;
                border-top-color: rgba(220, 53, 69, 0.1);
            }

            .month-box.unavailable .month-price-tag {
                display: none;
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
                border: 2px solid var(--tg-theme-primary, #560CE3);
                box-shadow: 0 8px 30px rgba(86, 12, 227, 0.15);
            }

            .selected-month-header-v2 {
                display: flex;
                align-items: center;
                gap: 12px;
                font-size: 18px;
                font-weight: 700;
                color: var(--tg-theme-primary, #560CE3);
                margin-bottom: 15px;
                padding-bottom: 12px;
                border-bottom: 1px dashed #dee2e6;
            }

            .selected-month-header-v2 i {
                font-size: 24px;
                color: var(--tg-theme-primary, #560CE3);
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
                color: var(--tg-theme-primary, #560CE3);
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
                    grid-template-columns: repeat(4, 1fr);
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
                border-color: var(--tg-theme-primary, #560CE3);
                transform: translateY(-2px);
                box-shadow: 0 4px 12px rgba(86, 12, 227, 0.15);
            }

            .date-cell.selected {
                background: linear-gradient(135deg, var(--tg-theme-primary, #560CE3) 0%, #7c3aed 100%);
                border-color: var(--tg-theme-primary, #560CE3);
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
                color: var(--tg-theme-primary, #560CE3);
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
                color: var(--tg-theme-primary, #560CE3);
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
                color: var(--tg-theme-primary, #560CE3);
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
                color: var(--tg-theme-primary, #560CE3);
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
                border-color: var(--tg-theme-primary, #560CE3);
                box-shadow: 0 2px 8px rgba(86, 12, 227, 0.1);
            }

            .period-card.selected {
                border-color: var(--tg-theme-primary, #560CE3);
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
                background: var(--tg-theme-primary, #560CE3);
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
                color: var(--tg-theme-primary, #560CE3);
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
                color: var(--tg-theme-primary, #560CE3);
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
                border-color: var(--tg-theme-primary, #560CE3);
                outline: none;
            }

            /* Total Cost Box - Compact */
            .total-cost-box {
                background: var(--tg-theme-primary, #560CE3);
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

            /* ============================================
               NEW AVAILABILITY LIST DESIGN (TourRadar Style)
               ============================================ */
            .am-tour-availability__list {
                list-style: none;
                padding: 0;
                margin: 0;
            }

            .am-tour-availability__variant {
                background: #fff;
                border: 1px solid #e0e0e0;
                border-radius: 12px;
                margin-bottom: 20px;
                display: flex;
                flex-direction: column;
                overflow: hidden;
                transition: box-shadow 0.2s;
            }

            .am-tour-availability__variant:hover {
                box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            }

            /* Top Bar: Discount & Instant Confirm */
            .am-tour-availability__variant-discount-container {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 8px 16px;
                background: #f9fafb;
                border-bottom: 1px solid #e0e0e0;
            }

            .am-tour-availability__variant-instant-label {
                font-size: 13px;
                font-weight: 600;
                color: #2e7d32; /* Greenish */
                display: flex;
                align-items: center;
                gap: 6px;
            }

            .am-tour-availability__variant-discount-tag {
                background: #d32f2f; /* Red */
                color: white;
                font-weight: 700;
                font-size: 12px;
                padding: 2px 8px;
                border-radius: 4px;
            }

            /* Main Content Wrapper */
            .am-tour-availability__variant-wrapper {
                display: flex;
                flex-wrap: wrap;
                padding: 16px;
                gap: 20px;
            }

            .am-tour-availability__variant-wrapper-item {
                flex: 1;
                min-width: 250px;
            }

            /* Date Section */
            .am-tour-availability__variant-date-wrapper {
                display: flex;
                align-items: center;
                margin-bottom: 12px;
            }

            .am-tour-availability__variant-date-item-week {
                font-size: 12px;
                text-transform: uppercase;
                color: #757575;
                margin-bottom: 2px;
            }

            .am-tour-availability__variant-date-item-bold {
                font-size: 16px;
                font-weight: 700;
                color: #212121;
            }

            .am-tour-availability__variant-date-arrow-wrapper {
                margin: 0 15px;
                color: #bdbdbd;
                font-size: 14px;
            }

            /* List Items (Language, etc) */
            .am-tour-availability__variant-list-item {
                font-size: 14px;
                color: #424242;
                margin-bottom: 6px;
                display: flex;
                align-items: center;
                gap: 8px;
            }

            .am-tour-availability__variant-list-item i {
                color: #757575;
                width: 16px;
                text-align: center;
            }

            .am-tour-availability__variant-list-item--filling-fast {
                color: #e65100; /* Orange */
                font-weight: 600;
                font-size: 12px;
            }

            .am-tour-availability__variant-list-item--room {
                font-size: 12px;
                color: #757575;
                margin-top: 8px;
                margin-bottom: 0;
            }

            /* Price & Button Column */
            .price-action-column {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: flex-end;
                text-align: right;
            }

            @media(max-width: 768px) {
                .price-action-column {
                    align-items: flex-start;
                    text-align: left;
                    border-top: 1px solid #eee;
                    padding-top: 15px;
                    margin-top: 5px;
                }
            }

            .am-tour-availability__variant-price-container {
                margin-bottom: 10px;
            }

            .am-tour-availability__variant-price-label {
                font-size: 12px;
                color: #757575;
            }

            .am-tour-availability__variant-price-values {
                display: flex;
                flex-direction: column;
                align-items: flex-end;
            }

            @media(max-width: 768px) {
                .am-tour-availability__variant-price-values {
                    align-items: flex-start;
                }
            }

            .am-tour-availability__variant-price--old-price {
                text-decoration: line-through;
                color: #9e9e9e;
                font-size: 14px;
            }

            .am-tour-availability__variant-price--current {
                font-size: 24px;
                font-weight: 800;
                color: #212121;
            }

            .am-tour-availability__variant-price--current-per-person {
                font-size: 12px;
                font-weight: 400;
                color: #757575;
            }

            /* Button */
            .scout-element__button {
                display: inline-block;
                padding: 10px 24px;
                font-size: 16px;
                font-weight: 700;
                text-align: center;
                cursor: pointer;
                border: none;
                border-radius: 8px;
                transition: background 0.2s;
                width: 100%;
                max-width: 200px;
            }

            .scout-element__button--primary {
                background-color: var(--tg-theme-primary, #560CE3);
                color: white;
            }

            .scout-element__button--primary:hover {
                background-color: #3e0aa3;
            }

            .am-tour-availability__variant-cta-wrapper {
                margin-top: 10px;
                width: 100%;
                display: flex;
                justify-content: flex-end;
            }

            @media(max-width: 768px) {
                .am-tour-availability__variant-cta-wrapper {
                    justify-content: flex-start;
                }
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
                        <div class="col-xl-9 col-lg-8">
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

                                    <?php if($service?->included || $service?->excluded): ?>
                                        <div class="tg-tour-about-inner mb-40">
                                            <h4 class="tg-tour-about-title mb-20">Included/Exclude</h4>
                                            <div class="row">
                                                <?php if($service?->included): ?>
                                                    <div class="col-lg-5">
                                                        <div class="tg-tour-about-list  tg-tour-about-list-2">
                                                            <ul>
                                                                <?php $__currentLoopData = json_decode($service?->included); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <li>
                                                                        <span class="icon mr-10"><i
                                                                                class="fa-sharp fa-solid fa-check fa-fw"></i></span>
                                                                        <span class="text"><?php echo e($item); ?></span>
                                                                    </li>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>

                                                <?php if($service?->excluded): ?>
                                                    <div class="col-lg-7">
                                                        <div class="tg-tour-about-list tg-tour-about-list-2 disable">
                                                            <ul>
                                                                <?php $__currentLoopData = json_decode($service?->excluded); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <li>
                                                                        <span class="icon mr-10"><i
                                                                                class="fa-sharp fa-solid fa-xmark"></i></span>
                                                                        <span class="text">
                                                                            <?php echo e($item); ?>

                                                                        </span>
                                                                    </li>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="tg-tour-about-border mb-40"></div>
                                    <?php endif; ?>

                                    <div class="tg-tour-faq-wrap mb-70">
                                        <div class="d-flex align-items-center mb-15">
                                            <?php if($service?->itineraries->count() > 0): ?>
                                                <a href="<?php echo e(route('front.tourbooking.services.download-tour-plan', $service->slug)); ?>" class="tg-btn tg-btn-switch-animation mr-30">
                                                    <i class="fa-solid fa-file-pdf mr-10"></i> <?php echo e(__('translate.Download PDF')); ?>

                                                </a>
                                            <?php endif; ?>
                                            <h4 class="tg-tour-about-title mb-0">
                                                <?php echo e(__('translate.Tour Plan')); ?>

                                            </h4>
                                        </div>

                                        <?php if($service?->tour_plan_sub_title): ?>
                                            <p class="text-capitalize lh-28 mb-20">
                                                <?php echo e($service?->tour_plan_sub_title); ?>

                                            </p>
                                        <?php endif; ?>
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
                                                                    <div class="<?php echo \Illuminate\Support\Arr::toCssClasses(['col-12 mb-5' => !$itinerary?->image, 'col-md-8 mb-5' => $itinerary?->image]); ?>">

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
                                    <div class="tg-tour-about-map mb-40">
                                        <h4 class="tg-tour-about-title mb-15">
                                            <?php echo e(__('translate.Location')); ?>

                                        </h4>
                                        <?php if($service?->google_map_sub_title): ?>
                                            <p class="text-capitalize lh-28">
                                                <?php echo e($service?->google_map_sub_title); ?>

                                            </p>
                                        <?php endif; ?>

                                        <?php if($service?->google_map_url): ?>
                                            <div class="tg-tour-about-map h-100">
                                                <?php echo $service?->google_map_url; ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>

                                    <div class="tg-tour-about-border mb-45"></div>
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
                            <!-- Availability Section - List View -->
                            <?php if($service->availability_periods && $service->availability_periods->count() > 0): ?>
                                <div class="tg-tour-availability-section" id="availability-section" style="display: none;">
                                    <div class="tg-tour-about-border mb-40"></div>
                                    <h4 class="tg-tour-about-title mb-20"><?php echo e(__('translate.Availability & Booking')); ?></h4>

                                    <ul class="am-tour-availability__list">
                                        <?php $__currentLoopData = $service->availability_periods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $period): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                                $startDate = \Carbon\Carbon::parse($period->start_date);
                                                $endDate = \Carbon\Carbon::parse($period->end_date);
                                                $adultPrice = $period->adult_price ?? $service->adult_price;
                                                $discountPercentage = $period->adult_discount_percentage ?? $service->adult_discount_percentage;

                                                $hasDiscount = $discountPercentage > 0;
                                                $finalPrice = $adultPrice;
                                                if ($hasDiscount) {
                                                    $finalPrice = $adultPrice - ($adultPrice * ($discountPercentage / 100));
                                                }

                                                $languages = $service->languages ?? ['English']; // Fallback
                                                $langString = is_array($languages) ? implode(', ', $languages) : $languages;
                                            ?>
                                            <li class="am-tour-availability__variant js-am-tour-availability__variant" data-cy="tdp-availability--card" data-year="<?php echo e($startDate->year); ?>" data-month="<?php echo e($startDate->month); ?>" style="display: none;">
                                                <div class="am-tour-availability__variant-discount-container">
                                                    <div class="am-tour-availability__variant-instant-label">
                                                        <?php echo e(__('translate.Instant Confirmation')); ?>

                                                    </div>
                                                    <?php if($hasDiscount): ?>
                                                        <div class="am-tour-availability__variant-discount-tag">-<?php echo e($discountPercentage); ?>%</div>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="am-tour-availability__variant-wrapper">
                                                    <div class="am-tour-availability__variant-wrapper-item">
                                                        <div class="am-tour-availability__variant-date-wrapper">
                                                            <div class="am-tour-availability__variant-date-start">
                                                                <div class="am-tour-availability__variant-date-item am-tour-availability__variant-date-item-week">
                                                                    <?php echo e(__('translate.From')); ?> <?php echo e($startDate->translatedFormat('l')); ?>

                                                                </div>
                                                                <div class="am-tour-availability__variant-date-item am-tour-availability__variant-date-item-bold" data-cy="tdp-availability--date-from">
                                                                    <?php echo e($startDate->translatedFormat('d M, Y')); ?>

                                                                </div>
                                                            </div>
                                                            <div class="am-tour-availability__variant-date-arrow-wrapper">
                                                                <div class="am-tour-availability__variant-date-arrow-icon"></div>
                                                            </div>
                                                            <div class="am-tour-availability__variant-date-finish">
                                                                <div class="am-tour-availability__variant-date-item am-tour-availability__variant-date-item-week">
                                                                    <?php echo e(__('translate.To')); ?> <?php echo e($endDate->translatedFormat('l')); ?>

                                                                </div>
                                                                <div class="am-tour-availability__variant-date-item am-tour-availability__variant-date-item-bold" data-cy="tdp-availability--date-to">
                                                                    <?php echo e($endDate->translatedFormat('d M, Y')); ?>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="am-tour-availability__variant-list">
                                                            <div class="am-tour-availability__variant-list-item am-tour-availability__variant-list-item--language js-am-tour-availability__variant-list-item--language">
                                                                <?php echo e($langString); ?>

                                                            </div>
                                                            <div class="js-am-tour-availability__variant-list-item--seat am-tour-availability__variant-list-item am-tour-availability__variant-list-item--filling-fast">
                                                                <?php echo e(__('translate.Filling Fast')); ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="am-tour-availability__variant-wrapper-item">
                                                        <div class="am-tour-availability__variant-price-container">
                                                            <span class="am-tour-availability__variant-price-label">
                                                                <?php echo e(__('translate.From')); ?>:
                                                            </span>
                                                            <div class="am-tour-availability__variant-price-values">
                                                                <?php if($hasDiscount): ?>
                                                                    <div class="am-tour-availability__variant-price--old-price" data-cy="tdp-availability--old-price">
                                                                        <?php echo e(currency($adultPrice)); ?>

                                                                    </div>
                                                                <?php endif; ?>
                                                                <div class="am-tour-availability__variant-price--current" data-cy="tdp-availability--price">
                                                                    <?php echo e(currency($finalPrice)); ?>

                                                                    <span class="am-tour-availability__variant-price--current-per-person"> <?php echo e(__('translate.per person')); ?></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="am-tour-availability__variant-list-item am-tour-availability__variant-list-item--room">
                                                            <?php echo e(__('translate.Price based on shared room')); ?>

                                                        </div>
                                                        <div class="am-tour-availability__variant-cta-wrapper">
                                                            <form action="<?php echo e(route('front.tourbooking.book.checkout.view')); ?>" method="GET">
                                                                <input type="hidden" name="service_id" value="<?php echo e($service->id); ?>">
                                                                <input type="hidden" name="availability_period_id" value="<?php echo e($period->id); ?>">
                                                                <input type="hidden" name="check_in_date" value="<?php echo e($period->start_date); ?>">
                                                                <input type="hidden" name="person" value="1">
                                                                <input type="hidden" name="children" value="0">
                                                                
                                                                <button data-cy="tdp-availability--cta-book" 
                                                                        type="submit" 
                                                                        class="scout-element__button scout-element__button--primary scout-element__button--s am-tour-availability__variant-cta js-am-tour-availability__variant-cta--book">
                                                                    <span class="scout-element__button-text js-scout-element__button-text">
                                                                        <?php echo e(__('translate.Confirm Dates')); ?>

                                                                    </span>
                                                                    <span class="scout-element__button-loading-dots js-scout-element__button-loading-dots hid">
                                                                        <span></span><span></span><span></span>
                                                                    </span>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            <?php else: ?>
                                <!-- debug info if no periods -->
                                 <!-- No availability periods found -->
                            <?php endif; ?>

                        </div>
                        <div class="col-xl-3 col-lg-4">
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
                                            <div class="tg-tour-about-date p-relative">
                                                <input required class="input" name="check_in_date" type="text"
                                                    placeholder="<?php echo e(__('translate.Select Date')); ?>" value="<?php echo e(now()->format('Y-m-d')); ?>">
                                                <span class="calender"></span>
                                                <span class="angle"><i class="fa-sharp fa-solid fa-angle-down"></i></span>
                                                <input type="hidden" name="availability_id" id="selected-availability-id">
                                            </div>
                                            <div id="availability-info" class="mt-2" style="display: none;"></div>
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
                                                    1 => __('translate.Jan'),
                                                    2 => __('translate.Feb'),
                                                    3 => __('translate.Mar'),
                                                    4 => __('translate.Apr'),
                                                    5 => __('translate.May'),
                                                    6 => __('translate.Jun'),
                                                    7 => __('translate.Jul'),
                                                    8 => __('translate.Aug'),
                                                    9 => __('translate.Sep'),
                                                    10 => __('translate.Oct'),
                                                    11 => __('translate.Nov'),
                                                    12 => __('translate.Dec')
                                                ];
                                                $monthNamesFull = [
                                                    1 => __('translate.January'),
                                                    2 => __('translate.February'),
                                                    3 => __('translate.March'),
                                                    4 => __('translate.April'),
                                                    5 => __('translate.May'),
                                                    6 => __('translate.June'),
                                                    7 => __('translate.July'),
                                                    8 => __('translate.August'),
                                                    9 => __('translate.September'),
                                                    10 => __('translate.October'),
                                                    11 => __('translate.November'),
                                                    12 => __('translate.December')
                                                ];
                                            ?>

                                            <div class="tg-tour-about-time mb-10">
                                                <span class="time mb-10 d-block"><?php echo e(__('translate.Availability by Month')); ?>:</span>

                                                <!-- Month Selector Component V2 -->
                                                <div class="month-selector-v2">
                                                    <!-- Year Selector Dropdown -->
                                                    <div class="year-selector-wrapper mb-3">
                                                        <label class="year-selector-label"><?php echo e(__('translate.Select Year')); ?></label>
                                                        <div class="year-dropdown">
                                                            <button type="button" class="year-dropdown-toggle" id="yearDropdownToggle">
                                                                <span class="selected-year-text"><?php echo e($years[0] ?? $currentYear); ?></span>
                                                                <i class="fa-solid fa-chevron-down"></i>
                                                            </button>
                                                            <div class="year-dropdown-menu" id="yearDropdownMenu">
                                                                <?php $__currentLoopData = $years; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <div class="year-option <?php echo e($loop->first ? 'active' : ''); ?>" data-year="<?php echo e($year); ?>">
                                                                        <span class="year-text"><?php echo e($year); ?></span>
                                                                        <?php
                                                                            $availableMonthsCount = isset($periodsByMonth[$year]) ? count($periodsByMonth[$year]) : 0;
                                                                        ?>
                                                                        <span class="year-badge"><?php echo e($availableMonthsCount); ?> <?php echo e(__('translate.months')); ?></span>
                                                                    </div>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Months Grid - 12 Beautiful Rectangles -->
                                                    <div class="months-container" id="monthsContainer">
                                                        <?php $__currentLoopData = $years; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div class="year-months-block <?php echo e($loop->first ? 'active' : ''); ?>" data-year="<?php echo e($year); ?>" id="yearMonths<?php echo e($year); ?>">
                                                                <div class="months-grid-v2" style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 10px;">
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

                                                                        <div class="month-box <?php echo e($hasAvailability ? 'available' : 'unavailable'); ?> <?php echo e($isDiscounted ? 'discounted' : ''); ?>" 
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
                                                                            <div class="month-box-inner">
                                                                                <span class="month-short"><?php echo e($monthNames[$month]); ?></span>
                                                                                <span class="month-number"><?php echo e(str_pad($month, 2, '0', STR_PAD_LEFT)); ?></span>
                                                                                <?php if($hasAvailability): ?>
                                                                                    <?php if($isDiscounted): ?>
                                                                                        <span class="month-badge discount">-<?php echo e($period['discount_percentage']); ?>%</span>
                                                                                    <?php else: ?>
                                                                                        <span class="month-badge available">✓</span>
                                                                                    <?php endif; ?>
                                                                                <?php else: ?>
                                                                                    <span class="month-badge unavailable">—</span>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                            <?php if($hasAvailability): ?>
                                                                                <div class="month-price-tag"><?php echo e($priceDisplay); ?></div>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                    <?php endfor; ?>
                                                                </div>
                                                            </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>

                                                </div>
                                            </div>
                                        <?php endif; ?>

                                        <div class="tg-tour-about-border-doted mb-15"></div>

                                        <div class="tg-tour-about-tickets-wrap mb-15">
                                            <span class="tg-tour-about-sidebar-title">Tickets:</span>

                                            <div class="tg-tour-about-tickets mb-10">
                                                <div class="tg-tour-about-tickets-adult">
                                                    <span>Adult</span>
                                                    <p class="mb-0">
                                                        (18+ years)
                                                        <span x-html="formatCurrency(pricePerAdult)">
                                                            <?php echo $service->adult_price_display; ?>

                                                        </span>
                                                    </p>
                                                    <div id="adult-discount-badge" class="discount-badge-below-price" style="display: none;">
                                                        <span class="badge bg-danger"></span>
                                                    </div>
                                                </div>
                                                <div class="tg-tour-about-tickets-quantity">
                                                    <select name="person" class="item-first custom-select" x-model.number="tickets.person">
                                                        <template x-for="i in 8" :key="i">
                                                            <option :value="i" x-text="i"></option>
                                                        </template>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="tg-tour-about-tickets mb-10">
                                                <div class="tg-tour-about-tickets-adult">
                                                    <span>Children </span>
                                                    <p class="mb-0">
                                                        (13-17 years)
                                                        <span x-html="formatCurrency(pricePerChild)">
                                                            <?php echo $service->child_price_display; ?>

                                                        </span>
                                                    </p>
                                                    <div id="child-discount-badge" class="discount-badge-below-price" style="display: none;">
                                                        <span class="badge bg-danger"></span>
                                                    </div>
                                                </div>
                                                <div class="tg-tour-about-tickets-quantity">
                                                    <select name="children" class="item-first custom-select" x-model.number="tickets.children">
                                                        <template x-for="i in 8" :key="i">
                                                            <option :value="i - 1" x-text="i - 1"></option>
                                                        </template>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tg-tour-about-border-doted mb-15"></div>

                                        <?php if($service->extraCharges->count() > 0): ?>
                                            <div class="tg-tour-about-extra mb-10">
                                                <span class="tg-tour-about-sidebar-title mb-10 d-inline-block">Add Extra:</span>
                                                <div class="tg-filter-list">
                                                    <ul>
                                                        <?php $__currentLoopData = $service->extraCharges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $extra): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <li>
                                                                <div class="checkbox d-flex">
                                                                    <input name="extras[]" value="<?php echo e($extra->id); ?>" class="tg-checkbox" type="checkbox" x-model="extras.charge_<?php echo e($key); ?>" id="charge_<?php echo e($key); ?>">
                                                                    <label for="charge_<?php echo e($key); ?>" class="tg-label"><?php echo e($extra->name); ?></label>
                                                                </div>
                                                                <span class="quantity"><?php echo e(currency($extra->price)); ?></span>
                                                            </li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="tg-tour-about-border-doted mb-15"></div>
                                        <?php endif; ?>

                                        
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

                                        <div class="tg-tour-about-coast d-flex align-items-center flex-wrap justify-content-between mb-20">
                                            <span class="tg-tour-about-sidebar-title d-inline-block">Total Cost:</span>
                                            <h5 class="total-price" x-text="totalCostFormatted"></h5>
                                        </div>

                                        <button type="button" id="sidebar-book-btn" class="tg-btn tg-btn-switch-animation w-100" onclick="scrollToAvailability()">
                                            <?php echo e(__('translate.Select Date & Book')); ?>

                                        </button>
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

                // Month Selector V2 Functionality
                const yearDropdownToggle = document.getElementById('yearDropdownToggle');
                const yearDropdownMenu = document.getElementById('yearDropdownMenu');
                const yearOptions = document.querySelectorAll('.year-option');
                const yearMonthsBlocks = document.querySelectorAll('.year-months-block');
                const monthBoxes = document.querySelectorAll('.month-box');
                const periodInput = document.getElementById('selected-availability-period-id');
                const checkInDateInput = document.getElementById('selected-check-in-date');
                const selectedMonthSection = document.getElementById('selected-month-section');
                const selectedMonthName = document.getElementById('selected-month-name');
                const periodInfoSummary = document.getElementById('period-info-summary');
                const datesCalendarGrid = document.getElementById('dates-calendar-grid');
                const selectedDateInfo = document.getElementById('selected-date-info');
                const selectedDateText = document.getElementById('selected-date-text');
                const bookBtn = document.getElementById('book-now-btn');

                let currentSelectedYear = null;
                let currentSelectedPeriod = null;
                const years = Array.from(yearMonthsBlocks).map(block => parseInt(block.dataset.year));

                // Day names for calendar
                const dayNames = ['<?php echo e(__("translate.Sun")); ?>', '<?php echo e(__("translate.Mon")); ?>', '<?php echo e(__("translate.Tue")); ?>', '<?php echo e(__("translate.Wed")); ?>', '<?php echo e(__("translate.Thu")); ?>', '<?php echo e(__("translate.Fri")); ?>', '<?php echo e(__("translate.Sat")); ?>'];

                // Year Dropdown Toggle
                if (yearDropdownToggle && yearDropdownMenu) {
                    yearDropdownToggle.addEventListener('click', function(e) {
                        e.stopPropagation();
                        this.classList.toggle('active');
                        yearDropdownMenu.classList.toggle('show');
                    });

                    // Close dropdown when clicking outside
                    document.addEventListener('click', function(e) {
                        if (!yearDropdownToggle.contains(e.target) && !yearDropdownMenu.contains(e.target)) {
                            yearDropdownToggle.classList.remove('active');
                            yearDropdownMenu.classList.remove('show');
                        }
                    });
                }

                // Year Selection
                yearOptions.forEach(option => {
                    option.addEventListener('click', function() {
                        const year = parseInt(this.dataset.year);

                        // Update active state in dropdown
                        yearOptions.forEach(opt => opt.classList.remove('active'));
                        this.classList.add('active');

                        // Update toggle text
                        if (yearDropdownToggle) {
                            yearDropdownToggle.querySelector('.selected-year-text').textContent = year;
                        }

                        // Close dropdown
                        if (yearDropdownToggle) yearDropdownToggle.classList.remove('active');
                        if (yearDropdownMenu) yearDropdownMenu.classList.remove('show');

                        // Show corresponding months
                        showYearMonths(year);
                    });
                });

                // Show year months block
                function showYearMonths(year) {
                    currentSelectedYear = year;

                    yearMonthsBlocks.forEach(block => {
                        block.classList.remove('active');
                    });

                    const activeBlock = document.getElementById('yearMonths' + year);
                    if (activeBlock) {
                        activeBlock.classList.add('active');
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

                // Month box click handler - Shows availability section at bottom
                monthBoxes.forEach(box => {
                    box.addEventListener('click', function() {
                        const year = this.dataset.year;
                        const month = this.dataset.month;

                        // Highlight selected month
                        monthBoxes.forEach(b => b.classList.remove('selected'));
                        this.classList.add('selected');

                        // Show availability section
                        const availabilitySection = document.getElementById('availability-section');
                        if (availabilitySection) {
                            availabilitySection.style.display = 'block';
                            
                            // Scroll to availability section
                            availabilitySection.scrollIntoView({ behavior: 'smooth', block: 'start' });

                            // Filter list items
                            const listItems = document.querySelectorAll('.am-tour-availability__variant');
                            listItems.forEach(item => {
                                if (item.dataset.year == year && item.dataset.month == month) {
                                    item.style.display = 'block'; // Or 'flex' depending on CSS
                                } else {
                                    item.style.display = 'none';
                                }
                            });
                        }
                    });
                });



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
                        const monthBox = document.querySelector('.month-box.selected');
                        if (monthBox) {
                            const adultPrice = parseFloat(monthBox.dataset.discountedPrice) || parseFloat(monthBox.dataset.adultPrice);
                            const childPrice = 0; // Simplified - get from period data if needed
                            updateBottomTotal(adultPrice, childPrice);
                        }
                    });
                }

                if (bottomChildrenSelect) {
                    bottomChildrenSelect.addEventListener('change', function() {
                        const monthBox = document.querySelector('.month-box.selected');
                        if (monthBox) {
                            const adultPrice = parseFloat(monthBox.dataset.discountedPrice) || parseFloat(monthBox.dataset.adultPrice);
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
                }

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
            border-color: #560CE3;
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
    </style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layout_inner_page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\archive\archive\Modules/TourBooking\resources/views/front/services/service-detail.blade.php ENDPATH**/ ?>