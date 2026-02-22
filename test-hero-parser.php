<?php
$server_dir = __DIR__;
$cms_path = $server_dir . '/Cms/themes/theme3/views/components';
$hero_file = $cms_path . '/hero.blade.php';
$mobile_file = $cms_path . '/mobile-booking-app.blade.php';

echo "=== Hero Component Test ===\n\n";

echo "1. Server Directory: " . $server_dir . "\n";
echo "2. CMS Components Path: " . $cms_path . "\n";

if (file_exists($hero_file)) {
    echo "3. Hero Blade File: FOUND\n";
    $hero_content = file_get_contents($hero_file);
    $hero_size = round(strlen($hero_content) / 1024, 2) . ' KB';
    echo "   Size: " . $hero_size . "\n";
} else {
    echo "3. Hero Blade File: NOT FOUND\n";
}

if (file_exists($mobile_file)) {
    echo "4. Mobile Booking File: FOUND\n";
    $mobile_content = file_get_contents($mobile_file);
    $mobile_size = round(strlen($mobile_content) / 1024, 2) . ' KB';
    echo "   Size: " . $mobile_size . "\n";
} else {
    echo "4. Mobile Booking File: NOT FOUND\n";
}

echo "\n=== Parsing Hero Component ===\n";

// Test if we can include the hero component
$output = [];
$return_var = 0;

// Create a temporary test file
$temp_file = tempnam(sys_get_temp_dir(), 'hero_');
$test_content = <<<'PHP'
<?php
function getContent($key, $single = false) {
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

function isMobile() {
    return false; // Always desktop for testing
}

ob_start();
include '$hero_file';
$content = ob_get_clean();
echo "Hero component rendered successfully\n";
PHP;

// Replace the dynamic variable with actual path
$test_content = str_replace('$hero_file', var_export($hero_file, true), $test_content);
file_put_contents($temp_file, $test_content);

// Execute the test
exec("php $temp_file 2>&1", $output, $return_var);

if ($return_var === 0) {
    echo "✅ Hero component parsed successfully\n";
} else {
    echo "❌ Hero component failed to parse\n";
    foreach ($output as $line) {
        if (trim($line)) {
            echo "   " . trim($line) . "\n";
        }
    }
}

// Clean up
unlink($temp_file);

echo "\n=== Laravel Helper Function Test ===\n";
echo "Testing if isMobile() function exists:\n";

// Create another test file to check helpers
$helper_file = tempnam(sys_get_temp_dir(), 'helper_');
$helper_test = <<<'PHP'
<?php
require __DIR__.'/vendor/autoload.php';
require __DIR__.'/app/Helpers/helper.php';

echo "isMobile() function: " . (function_exists('isMobile') ? "✅ Exists" : "❌ Not Found") . "\n";

// Test with different user agents
$testAgents = [
    'Mobile' => 'Mozilla/5.0 (Linux; Android 13; SM-S901B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Mobile Safari/537.36',
    'Desktop' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',
    'iPhone' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.0 Mobile/15E148 Safari/604.1'
];

echo "\nTesting device detection:\n";
foreach ($testAgents as $name => $agent) {
    // Mock the request
    $_SERVER['HTTP_USER_AGENT'] = $agent;
    $result = isMobile() ? '📱 Mobile' : '🖥️ Desktop';
    echo "  $name: $result\n";
}
PHP;

file_put_contents($helper_file, $helper_test);

// Execute helper test
exec("cd $server_dir && php $helper_file 2>&1", $helper_output, $helper_return);

if ($helper_return === 0) {
    foreach ($helper_output as $line) {
        if (trim($line)) {
            echo "✅ $line\n";
        }
    }
} else {
    echo "❌ Helper test failed:\n";
    foreach ($helper_output as $line) {
        if (trim($line)) {
            echo "   " . trim($line) . "\n";
        }
    }
}

// Clean up
unlink($helper_file);
