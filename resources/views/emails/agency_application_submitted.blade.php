<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agency Application Received</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            background-color: #4CAF50;
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 5px 5px 0 0;
        }

        .content {
            background-color: #f9f9f9;
            padding: 30px;
            border-radius: 0 0 5px 5px;
        }

        .info-box {
            background-color: #e3f2fd;
            border-left: 4px solid #2196F3;
            padding: 15px;
            margin: 20px 0;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
            font-size: 12px;
            color: #666;
        }

        h1 {
            margin: 0;
            font-size: 24px;
        }

        .button {
            display: inline-block;
            padding: 12px 30px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin: 20px 0;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>✓ Application Received!</h1>
    </div>

    <div class="content">
        <p>Dear <strong>{{ $application->agency_name }}</strong>,</p>

        <p>Thank you for submitting your agency registration application. We have successfully received your submission
            and it is now under review.</p>

        <div class="info-box">
            <h3 style="margin-top: 0;">Application Details:</h3>
            <ul style="margin: 10px 0;">
                <li><strong>Agency Name:</strong> {{ $application->agency_name }}</li>
                <li><strong>Email:</strong> {{ $application->email }}</li>
                <li><strong>Phone:</strong> {{ $application->phone }}</li>
                <li><strong>Location:</strong> {{ $application->city }}, {{ $application->state }},
                    {{ $application->country }}</li>
                <li><strong>Submitted on:</strong> {{ $application->created_at->format('F d, Y h:i A') }}</li>
            </ul>
        </div>

        <h3>What happens next?</h3>
        <p>Our team will carefully review your application and the documents you submitted. This process typically takes
            <strong>2-3 business days</strong>.</p>

        <p>You will receive an email notification once your application has been reviewed. If approved, we will provide
            you with login credentials to access your agency dashboard.</p>

        <p>If you have any questions in the meantime, please don't hesitate to contact our support team.</p>

        <p>Best regards,<br>
            <strong>The Team</strong>
        </p>
    </div>

    <div class="footer">
        <p>This is an automated email. Please do not reply to this message.</p>
        <p>© {{ date('Y') }} All rights reserved.</p>
    </div>
</body>

</html>