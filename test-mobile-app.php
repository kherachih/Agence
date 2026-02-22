<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobile Booking App Test</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f7fa;
        }
        .test-container {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .test-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #333;
        }
        .test-section {
            margin: 20px 0;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 10px;
        }
        .test-section h3 {
            margin: 0 0 10px 0;
            color: #667eea;
            font-size: 18px;
        }
        .user-agent {
            font-family: monospace;
            font-size: 14px;
            background: #e9ecef;
            padding: 10px;
            border-radius: 5px;
            margin: 5px 0;
            overflow-wrap: break-word;
        }
        .is-mobile {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            padding: 20px;
            border-radius: 10px;
        }
        .mobile {
            background: #d4edda;
            color: #155724;
            border: 2px solid #c3e6cb;
        }
        .desktop {
            background: #cce7ff;
            color: #004085;
            border: 2px solid #b8daff;
        }
        .feature-list {
            list-style: none;
            padding: 0;
        }
        .feature-list li {
            padding: 10px 0;
            border-bottom: 1px solid #dee2e6;
        }
        .feature-list li:last-child {
            border-bottom: none;
        }
        .feature-list li::before {
            content: "✅ ";
            color: #28a745;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="test-container">
        <h1 class="test-title">Mobile Booking App Test</h1>
        
        <div class="test-section">
            <h3>Device Detection</h3>
            <div class="user-agent">User Agent: <?php echo $_SERVER['HTTP_USER_AGENT']; ?></div>
            
            <div class="is-mobile <?php echo isMobile() ? 'mobile' : 'desktop'; ?>">
                <?php echo isMobile() ? '📱 Mobile Device Detected' : '🖥️ Desktop Device Detected'; ?>
            </div>
        </div>

        <div class="test-section">
            <h3>Features</h3>
            <ul class="feature-list">
                <li>Mobile-first responsive design</li>
                <li>Step-by-step booking process</li>
                <li>Real-time destination search</li>
                <li>Date selection with calendar</li>
                <li>Guest and room selection</li>
                <li>Multiple tour type options</li>
                <li>Modern gradient design</li>
                <li>Smooth animations and transitions</li>
                <li>Loading states and feedback</li>
            </ul>
        </div>

        <div class="test-section">
            <h3>Step-by-Step Flow</h3>
            <ol>
                <li>Welcome screen with introduction</li>
                <li>Destination selection with search</li>
                <li>Tour type selection (Adventure, Cultural, Relaxation, Family)</li>
                <li>Guest selection (Adults & Children)</li>
                <li>Room quantity selection</li>
                <li>Date selection with calendar</li>
                <li>Search submission and loading</li>
                <li>Redirect to tour results page</li>
            </ol>
        </div>
    </div>

    <div class="test-container">
        <h3>CSS Classes & Styling</h3>
        <div class="user-agent">The mobile app interface will be visible on screens ≤ 767px or mobile devices</div>
        <div class="user-agent">Desktop version will be visible on screens > 767px</div>
    </div>
</body>
</html>