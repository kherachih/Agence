<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hero Component Test</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f7fa;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        h1 {
            color: #333;
            margin-bottom: 20px;
        }
        .device-type {
            background: #e8f5e9;
            color: #2e7d32;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: bold;
            display: inline-block;
            margin-bottom: 20px;
        }
        .device-type.desktop {
            background: #e3f2fd;
            color: #1565c0;
        }
        pre {
            background: #f4f4f4;
            padding: 15px;
            border-radius: 5px;
            overflow-x: auto;
            font-size: 12px;
            color: #333;
        }
        .test-section {
            margin: 30px 0;
            padding: 20px;
            border-left: 4px solid #667eea;
            background: #f8f9fa;
        }
        .test-section h2 {
            margin-top: 0;
            color: #667eea;
        }
        .toggle-device {
            background: #667eea;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-bottom: 20px;
        }
        .toggle-device:hover {
            background: #5a6fd6;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Hero Component Test</h1>
        
        <div class="test-section">
            <h2>Device Detection Test</h2>
            <p class="device-type <?php echo isMobile() ? 'mobile' : 'desktop'; ?>">
                <?php echo isMobile() ? '📱 Mobile Device' : '🖥️ Desktop Device'; ?>
            </p>
            
            <button class="toggle-device" onclick="toggleDevice()">
                Toggle Device Detection
            </button>
            
            <h3>Current User Agent:</h3>
            <pre><?php echo htmlspecialchars($_SERVER['HTTP_USER_AGENT']); ?></pre>
        </div>

        <div class="test-section">
            <h2>Hero Component Rendering</h2>
            
            <?php
            // Mock the Laravel helper functions
            function getContent($key, $single = false) {
                if ($key === 'theme3_hero.content') {
                    return (object)[
                        'data_values' => [
                            'title' => 'Explore the World with Tourex',
                            'sub_title' => 'Find your perfect travel destination',
                            'description' => 'Join thousands of travelers exploring beautiful destinations worldwide',
                            'background_image' => 'https://placehold.co/1920x720/667eea/ffffff?text=Travel+Background',
                            'peoples_image' => 'https://placehold.co/230x50/764ba2/ffffff?text=Travelers'
                        ],
                        'data_translations' => '[]'
                    ];
                }
                return null;
            }

            function getSingleImage($content, $key) {
                return $content->data_values[$key];
            }

            function getTranslatedValue($content, $key) {
                return $content->data_values[$key];
            }

            function destinations() {
                return [
                    (object)['id' => 1, 'name' => 'Paris'],
                    (object)['id' => 2, 'name' => 'London'],
                    (object)['id' => 3, 'name' => 'New York'],
                    (object)['id' => 4, 'name' => 'Tokyo'],
                    (object)['id' => 5, 'name' => 'Dubai']
                ];
            }

            function asset($path) {
                return $path;
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
            ?>
            
            <div class="hero-container">
                <?php include 'Cms/themes/theme3/views/components/hero.blade.php'; ?>
            </div>
        </div>
    </div>

    <script>
        function toggleDevice() {
            const currentUserAgent = navigator.userAgent;
            const isCurrentlyMobile = navigator.userAgent.toLowerCase().includes('mobile');
            
            if (isCurrentlyMobile) {
                // Switch to desktop user agent
                Object.defineProperty(navigator, 'userAgent', {
                    get: function() {
                        return 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36';
                    }
                });
            } else {
                // Switch to mobile user agent
                Object.defineProperty(navigator, 'userAgent', {
                    get: function() {
                        return 'Mozilla/5.0 (Linux; Android 13; SM-S901B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Mobile Safari/537.36';
                    }
                });
            }
            
            alert('Device type toggled! Refresh the page to see the changes.');
        }
    </script>
</body>
</html>