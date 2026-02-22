<?php
require __DIR__.'/vendor/autoload.php';

function isMobile()
{
    $userAgent = $_SERVER['HTTP_USER_AGENT'];
    
    $mobileKeywords = [
        'android', 'webos', 'iphone', 'ipad', 'ipod', 'blackberry', 'iemobile', 'opera mini',
        'mobile', 'phone', 'kindle', 'silk', 'bb10', 'playbook', 'touch'
    ];
    
    $userAgent = strtolower($userAgent);
    
    foreach ($mobileKeywords as $keyword) {
        if (strpos($userAgent, $keyword) !== false) {
            return true;
        }
    }
    
    $acceptHeader = $_SERVER['HTTP_ACCEPT'] ?? '';
    if ($acceptHeader && strpos(strtolower($acceptHeader), 'application/vnd.wap.xhtml+xml') !== false) {
        return true;
    }
    
    $screenWidth = isset($_SERVER['HTTP_X_WAP_PROFILE']) || isset($_SERVER['HTTP_PROFILE']);
    if ($screenWidth) {
        return true;
    }
    
    return false;
}

echo "<h1>Mobile Detection Test</h1>";
echo "<p><strong>User Agent:</strong> " . htmlspecialchars($_SERVER['HTTP_USER_AGENT']) . "</p>";
echo "<p><strong>Mobile Device:</strong> " . (isMobile() ? "✅ Yes" : "❌ No") . "</p>";

echo "<h2>Test with different User Agents</h2>";
$testAgents = [
    'Android Phone' => 'Mozilla/5.0 (Linux; Android 10; SM-G975F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.93 Mobile Safari/537.36',
    'iPhone' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 14_4 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/14.0.3 Mobile/15E148 Safari/604.1',
    'iPad' => 'Mozilla/5.0 (iPad; CPU OS 14_4 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/14.0.3 Mobile/15E148 Safari/604.1',
    'Desktop Chrome' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.104 Safari/537.36',
    'Desktop Firefox' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:86.0) Gecko/20100101 Firefox/86.0',
    'Desktop Safari' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/14.0.3 Safari/605.1.15',
];

echo "<table border='1' cellpadding='8' cellspacing='0' style='border-collapse: collapse; width: 100%; margin-top: 20px;'>";
echo "<tr style='background-color: #f2f2f2;'><th>User Agent</th><th>Device Type</th></tr>";

foreach ($testAgents as $name => $agent) {
    $isMobileTest = false;
    $testAgent = strtolower($agent);
    foreach ([
        'android', 'webos', 'iphone', 'ipad', 'ipod', 'blackberry', 'iemobile', 'opera mini',
        'mobile', 'phone', 'kindle', 'silk', 'bb10', 'playbook', 'touch'
    ] as $keyword) {
        if (strpos($testAgent, $keyword) !== false) {
            $isMobileTest = true;
            break;
        }
    }
    
    echo "<tr>";
    echo "<td><strong>" . $name . "</strong><br><code style='font-size: 10px;'>" . htmlspecialchars($agent) . "</code></td>";
    echo "<td>" . ($isMobileTest ? "✅ Mobile" : "❌ Desktop") . "</td>";
    echo "</tr>";
}

echo "</table>";
?>