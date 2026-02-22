<?php
// Test script to verify hero component functionality
// This script bypasses Laravel's view cache by rendering directly

function isMobile() {
    $userAgent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : 'desktop';
    $mobileKeywords = ['mobile', 'android', 'iphone', 'ipad', 'ipod', 'blackberry', 'iemobile', 'opera mini'];
    
    foreach ($mobileKeywords as $keyword) {
        if (stripos($userAgent, $keyword) !== false) {
            return true;
        }
    }
    
    return false;
}

function getContent($key, $single = false) {
    return (object) [
        'data_values' => [
            'title' => 'Explore the World!',
            'sub_title' => 'Find your perfect destination',
            'description' => 'Join thousands of travelers',
            'background_image' => 'https://placehold.co/1920x720/667eea/ffffff?text=Travel+Hero',
            'peoples_image' => 'https://placehold.co/230x50/764ba2/ffffff?text=Travelers'
        ],
        'data_translations' => '[]'
    ];
}

function destinations() {
    return [
        (object) ['id' => 1, 'name' => 'Paris'],
        (object) ['id' => 2, 'name' => 'London'],
        (object) ['id' => 3, 'name' => 'New York'],
        (object) ['id' => 4, 'name' => 'Tokyo'],
        (object) ['id' => 5, 'name' => 'Dubai']
    ];
}

function asset($path) {
    return $path;
}

function getSingleImage($content, $key) {
    return $content->data_values[$key];
}

function getTranslatedValue($content, $key) {
    return $content->data_values[$key];
}

function __($key) {
    $translations = [
        'translate.Location:' => 'Location:',
        'translate.Where to ?' => 'Where to ?',
        'translate.+ Add Guests' => '+ Add Guests',
        'translate.Adults' => 'Adults',
        'translate.Children' => 'Children'
    ];
    
    return $translations[$key] ?? $key;
}

// Test data
$theme3_hero = getContent('theme3_hero.content', true);
$theme3_destinations = destinations();
$isMobile = isMobile();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hero Component Test</title>
    <style>
        .hero-test-container {
            font-family: Arial, sans-serif;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f8f9fa;
        }
        
        .test-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            border-radius: 10px;
            margin-bottom: 30px;
            text-align: center;
        }
        
        .test-header h1 {
            margin: 0 0 10px 0;
            font-size: 2.5em;
        }
        
        .device-info {
            background: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.1);
        }
        
        .device-info h2 {
            margin: 0 0 15px 0;
            color: #333;
        }
        
        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
        }
        
        .info-item {
            background: #f5f7fa;
            padding: 15px;
            border-radius: 8px;
            border-left: 4px solid #667eea;
        }
        
        .device-type {
            font-size: 1.2em;
            font-weight: bold;
            padding: 10px 20px;
            border-radius: 50px;
            display: inline-block;
            margin-top: 10px;
        }
        
        .mobile-device {
            background: #e8f5e9;
            color: #2e7d32;
        }
        
        .desktop-device {
            background: #e3f2fd;
            color: #1565c0;
        }
        
        .hero-rendered {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.1);
        }
        
        .tg-hero-area {
            background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('https://placehold.co/1920x720/667eea/ffffff?text=Travel+Hero');
            background-size: cover;
            background-position: center;
            padding: 100px 20px;
            color: white;
            border-radius: 10px;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        .tg-hero-content {
            text-align: center;
        }
        
        .tg-hero-title-box {
            margin-bottom: 30px;
        }
        
        .tg-hero-title {
            font-size: 3em;
            margin-bottom: 15px;
            font-weight: bold;
        }
        
        .tg-hero-tu-title {
            font-size: 1.5em;
            opacity: 0.9;
        }
        
        .tg-booking-form-item {
            margin-top: 40px;
        }
        
        .tg-booking-form-input-group {
            display: flex;
            justify-content: center;
            align-items: end;
            gap: 15px;
            flex-wrap: wrap;
        }
        
        .tg-booking-form-parent-inner {
            position: relative;
        }
        
        .tg-booking-form-title {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            font-size: 0.9em;
        }
        
        .tg-booking-add-input-field {
            background: white;
            color: #333;
            padding: 15px 20px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            gap: 10px;
            min-width: 200px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .tg-booking-add-input-field:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }
        
        .location svg {
            flex-shrink: 0;
        }
        
        .tg-booking-title-value {
            flex: 1;
            font-weight: bold;
            font-size: 1.1em;
        }
        
        .angle-down {
            flex-shrink: 0;
        }
        
        .bk-search-button {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 15px 30px;
            border-radius: 8px;
            font-size: 1.1em;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .bk-search-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }
        
        @media (max-width: 768px) {
            .tg-hero-title {
                font-size: 2em;
            }
            
            .tg-hero-tu-title {
                font-size: 1.2em;
            }
            
            .tg-booking-form-input-group {
                flex-direction: column;
                align-items: stretch;
            }
        }
    </style>
</head>
<body>
    <div class="hero-test-container">
        <div class="test-header">
            <h1>Hero Component Test</h1>
            <p>Testing the mobile and desktop hero versions</p>
        </div>
        
        <div class="device-info">
            <h2>Device Information</h2>
            <div class="info-grid">
                <div class="info-item">
                    <strong>User Agent:</strong><br>
                    <code><?php echo htmlspecialchars($_SERVER['HTTP_USER_AGENT'] ?? 'Unknown'); ?></code>
                </div>
                <div class="info-item">
                    <strong>Screen Resolution:</strong><br>
                    <code>
                    <?php echo isset($_SERVER['HTTP_SEC_CH_UA_MOBILE']) ? 'Mobile: ' . ($_SERVER['HTTP_SEC_CH_UA_MOBILE'] == '?1' ? 'Yes' : 'No') : 'Unknown'; ?>
                    </code>
                </div>
                <div class="info-item">
                    <strong>Device Type:</strong><br>
                    <span class="device-type <?php echo $isMobile ? 'mobile-device' : 'desktop-device'; ?>">
                        <?php echo $isMobile ? '📱 Mobile' : '🖥️ Desktop'; ?>
                    </span>
                </div>
            </div>
        </div>
        
        <div class="hero-rendered">
            <h2>Hero Component Rendered</h2>
            
            <?php if ($theme3_hero): ?>
                <?php if ($isMobile): ?>
                    <div class="mobile-hero">
                        <h3>Mobile Booking App Interface</h3>
                        <p>This would display the mobile booking form interface on actual mobile devices.</p>
                        <div style="background: #f0f0f0; padding: 20px; border-radius: 8px; margin-top: 15px;">
                            <p><strong>Mobile Features:</strong></p>
                            <ul>
                                <li>Step-by-step booking process</li>
                                <li>Tour selection</li>
                                <li>Date picker</li>
                                <li>Guest counter</li>
                                <li>Navigation controls</li>
                            </ul>
                        </div>
                    </div>
                <?php else: ?>
                    {{-- Desktop Hero Section --}}
                    <div class="tg-hero-area">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-xl-10">
                                    <div class="tg-hero-content text-center">
                                        <div class="tg-hero-title-box mb-30">
                                            <h2 class="tg-hero-title wow fadeInUp">
                                                <?php echo getTranslatedValue($theme3_hero, 'title'); ?>
                                            </h2>
                                            <h3 class="tg-hero-tu-title wow fadeInUp">
                                                <?php echo getTranslatedValue($theme3_hero, 'sub_title'); ?>
                                            </h3>
                                        </div>
                                        <div class="tg-booking-form-item tg-booking-tu-wrapper mt-15">
                                            <form x-data="bookingForm()" @submit.prevent="submitForm">
                                                <div class="tg-booking-form-input-group d-flex align-items-end justify-content-between">
                                                    <div class="tg-booking-form-parent-inner tg-hero-quantity p-relative mr-15 mb-10">
                                                        <span class="tg-booking-form-title">{{ __('translate.Location:') }}</span>
                                                        <div class="tg-booking-add-input-field tg-booking-quantity-toggle">
                                                            <span class="location">
                                                                <svg width="13" height="16" viewBox="0 0 13 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M12.3329 6.7071C12.3329 11.2324 6.55512 15.1111 6.55512 15.1111C6.55512 15.1111 0.777344 11.2324 0.777344 6.7071C0.777344 5.16402 1.38607 3.68414 2.46962 2.59302C3.55316 1.5019 5.02276 0.888916 6.55512 0.888916C8.08748 0.888916 9.55708 1.5019 10.6406 2.59302C11.7242 3.68414 12.3329 5.16402 12.3329 6.7071Z" stroke="currentColor" stroke-width="1.15556" stroke-linecap="round" stroke-linejoin="round" />
                                                                    <path d="M6.55512 8.64649C7.61878 8.64649 8.48105 7.7782 8.48105 6.7071C8.48105 5.636 7.61878 4.7677 6.55512 4.7677C5.49146 4.7677 4.6292 5.636 4.6292 6.7071C4.6292 7.7782 5.49146 8.64649 6.55512 8.64649Z" stroke="currentColor" stroke-width="1.15556" stroke-linecap="round" stroke-linejoin="round" />
                                                                </svg>
                                                            </span>
                                                            <span x-show="destination" x-text="destination" class="tg-booking-title-value">
                                                                <?php echo __('translate.Where to ?'); ?>
                                                            </span>
                                                            <span x-show="!destination" class="tg-booking-title-value">
                                                                <?php echo __('translate.Where to ?'); ?>
                                                            </span>
                                                            <span class="angle-down">
                                                                <svg width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M1.6665 1L6.99984 6.33333L12.3332 1" stroke="#353844" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                                </svg>
                                                            </span>
                                                        </div>
                                                        <div class="tg-booking-form-location-list tg-booking-quantity-active">
                                                            <ul class="scrool-bar scrool-height pr-5">
                                                                <?php foreach ($theme3_destinations as $key => $destination): ?>
                                                                    <li @click="selectDestination(`<?php echo $destination->id; ?>`, `<?php echo $destination->name; ?>`)">
                                                                        <i class="fa-regular fa-location-dot"></i>
                                                                        <span><?php echo $destination->name; ?></span>
                                                                    </li>
                                                                <?php endforeach; ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="tg-booking-form-search-btn mb-10">
                                                        <button class="bk-search-button" type="submit">Search
                                                            <span class="ml-5">
                                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <g clip-path="url(#clip0_53_103)">
                                                                        <path d="M13.2218 13.2222L10.5188 10.5192M12.1959 6.48705C12.1959 9.6402 9.63977 12.1963 6.48662 12.1963C3.33348 12.1963 0.777344 9.6402 0.777344 6.48705C0.777344 3.3339 3.33348 0.777771 6.48662 0.777771C9.63977 0.777771 12.1959 3.3339 12.1959 6.48705Z" stroke="currentColor" stroke-width="1.575" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </g>
                                                                    <defs>
                                                                        <clipPath id="clip0_53_103">
                                                                            <rect width="14" height="14" fill="currentColor" />
                                                                        </clipPath>
                                                                    </defs>
                                                                </svg>
                                                            </span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php else: ?>
                <div class="error-message">
                    <p style="color: #dc3545; font-weight: bold;">Hero content not found. Please make sure theme3_hero.content is configured in your database.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        function bookingForm() {
            return {
                destination: '',
                destination_id: '',
                adults: '',
                children: '',
                selectDestination(destinationId, destinationName) {
                    this.destination_id = destinationId;
                    this.destination = destinationName;
                },
                submitForm() {
                    const params = new URLSearchParams({
                        destination: this.destination,
                        destination_id: this.destination_id,
                        adults: this.adults,
                        children: this.children
                    });
                    console.log('Booking form submitted with params:', params.toString());
                    alert('Form submitted! Parameters: ' + params.toString());
                }
            }
        }
    </script>
</body>
</html>