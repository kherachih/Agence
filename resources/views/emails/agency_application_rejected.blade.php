<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agency Application Status Update</title>
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
            background-color: #dc3545;
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

        .reason-box {
            background-color: #f8d7da;
            border-left: 4px solid #dc3545;
            padding: 20px;
            margin: 20px 0;
            border-radius: 5px;
        }

        .info-box {
            background-color: #d1ecf1;
            border-left: 4px solid #17a2b8;
            padding: 15px;
            margin: 20px 0;
            border-radius: 5px;
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
            background-color: #17a2b8;
            color: white !important;
            text-decoration: none;
            border-radius: 5px;
            margin: 20px 0;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>Application Status Update</h1>
    </div>

    <div class="content">
        <p>Dear <strong>{{ $application->agency_name }}</strong>,</p>

        <p>Thank you for your interest in joining our platform and for taking the time to submit your agency
            registration application.</p>

        <p>After careful review of your application and the submitted documents, we regret to inform you that we are
            unable to approve your application at this time.</p>

        <div class="reason-box">
            <h3 style="margin-top: 0;">Reason for Decision:</h3>
            <p style="margin: 0;">{{ $reason }}</p>
        </div>

        <div class="info-box">
            <h4 style="margin-top: 0;">What you can do:</h4>
            <ul style="margin: 10px 0;">
                <li>Review the reason provided above carefully</li>
                <li>Address any issues or concerns mentioned</li>
                <li>Gather any additional required documentation</li>
                <li>Submit a new application when you're ready</li>
            </ul>
        </div>

        <p>We encourage you to apply again once you've addressed the issues mentioned. Each application is reviewed
            individually and fairly.</p>

        <div style="text-align: center;">
            <a href="{{ route('agency.registration') }}" class="button">Submit New Application</a>
        </div>

        <p>If you have any questions about this decision or need clarification, please don't hesitate to contact our
            support team. We're here to help!</p>

        <p>Thank you for your understanding.</p>

        <p>Best regards,<br>
            <strong>The Team</strong>
        </p>
    </div>

    <div class="footer">
        <p>This is an automated email. Please do not reply to this message.</p>
        <p>For questions, please contact our support team.</p>
        <p>© {{ date('Y') }} All rights reserved.</p>
    </div>
</body>

</html>