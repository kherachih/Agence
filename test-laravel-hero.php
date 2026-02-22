<?php

// Laravel Integration Test Script
// This script simulates a basic Laravel environment to test the hero component

require __DIR__.'/vendor/autoload.php';

// Set up minimal Laravel environment
$app = new Illuminate\Foundation\Application(
    realpath(__DIR__)
);

$app->singleton(
    Illuminate\Contracts\Http\Kernel::class,
    App\Http\Kernel::class
);

$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

// Clear all cached views
$cachePath = storage_path('framework/views');
if (is_dir($cachePath)) {
    $files = glob($cachePath . '/*.php');
    foreach ($files as $file) {
        if (is_file($file)) {
            unlink($file);
        }
    }
    echo "✅ View cache cleared successfully\n";
}

// Test 1: Check if isMobile helper exists
echo "\n📱 Testing Device Detection Helper:\n";
if (function_exists('isMobile')) {
    echo "✅ isMobile() helper function exists\n";
    
    // Test with sample user agents
    $testCases = [
        'Mobile' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 14_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/14.0 Mobile/15E148 Safari/604.1',
        'Desktop' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.81 Safari/537.36',
        'Tablet' => 'Mozilla/5.0 (iPad; CPU OS 14_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/14.0 Mobile/15E148 Safari/604.1'
    ];
    
    foreach ($testCases as $label => $userAgent) {
        $_SERVER['HTTP_USER_AGENT'] = $userAgent;
        $result = isMobile();
        $emoji = $result ? '📱' : '🖥️';
        echo "  $emoji $label: " . ($result ? 'Mobile' : 'Desktop') . "\n";
    }
} else {
    echo "❌ isMobile() helper function NOT found\n";
}

// Test 2: Check if theme3 hero content exists
echo "\n🎨 Testing Hero Content:\n";
if (function_exists('getContent')) {
    $theme3_hero = getContent('theme3_hero.content', true);
    if ($theme3_hero) {
        echo "✅ Hero content found in database\n";
        echo "  Title: " . $theme3_hero->data_values['title'] . "\n";
        echo "  Subtitle: " . $theme3_hero->data_values['sub_title'] . "\n";
        echo "  Description: " . $theme3_hero->data_values['description'] . "\n";
    } else {
        echo "⚠️ Hero content not found in database\n";
        echo "  Please make sure you have run the necessary migrations and seeders\n";
    }
} else {
    echo "❌ getContent() helper function NOT found\n";
}

// Test 3: Check if destinations exist
echo "\n📍 Testing Destinations:\n";
if (function_exists('destinations')) {
    $destinations = destinations();
    $count = count($destinations);
    if ($count > 0) {
        echo "✅ $count destinations found in database\n";
        foreach ($destinations as $destination) {
            echo "  - " . $destination->name . "\n";
        }
    } else {
        echo "⚠️ No destinations found in database\n";
        echo "  Please make sure you have run the necessary migrations and seeders\n";
    }
} else {
    echo "❌ destinations() helper function NOT found\n";
}

// Test 4: Try to render the hero component
echo "\n🎭 Testing Hero Component Rendering:\n";
try {
    $view = view('theme::components.hero');
    echo "✅ Hero component rendered successfully\n";
    echo "  View has " . count($view->getData()) . " data variables\n";
    if (isset($view->getData()['theme3_hero'])) {
        echo "  Hero content variable is set\n";
    }
} catch (Exception $e) {
    echo "❌ Error rendering hero component:\n";
    echo "  " . $e->getMessage() . "\n";
    if (config('app.debug')) {
        echo "  Stack trace:\n  " . $e->getTraceAsString() . "\n";
    }
}

// Test 5: Check if the hero component file exists
echo "\n📄 Testing Component File Existence:\n";
$heroComponentPath = resource_path('views') . '/components/hero.blade.php';
if (file_exists($heroComponentPath)) {
    echo "✅ Hero component file exists at: $heroComponentPath\n";
    $content = file_get_contents($heroComponentPath);
    $lines = explode("\n", $content);
    echo "  File size: " . strlen($content) . " bytes\n";
    echo "  Lines: " . count($lines) . "\n";
} else {
    echo "❌ Hero component file NOT found at: $heroComponentPath\n";
}

// Cleanup
unset($_SERVER['HTTP_USER_AGENT']);

echo "\n✅ Test completed!";
?>