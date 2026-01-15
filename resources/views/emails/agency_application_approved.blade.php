<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agency Application Approved</title>
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
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px 20px;
            text-align: center;
            border-radius: 5px 5px 0 0;
        }

        .content {
            background-color: #f9f9f9;
            padding: 30px;
            border-radius: 0 0 5px 5px;
        }

        .credentials-box {
            background-color: #fff3cd;
            border-left: 4px solid #ffc107;
            padding: 20px;
            margin: 20px 0;
            border-radius: 5px;
        }

        .success-box {
            background-color: #d4edda;
            border-left: 4px solid #28a745;
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
            font-size: 28px;
        }

        .button {
            display: inline-block;
            padding: 15px 40px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white !important;
            text-decoration: none;
            border-radius: 5px;
            margin: 20px 0;
            font-weight: bold;
        }

        .emoji {
            font-size: 40px;
            display: block;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="header">
        <span class="emoji">🎉</span>
        <h1>Congratulations!</h1>
        <p style="font-size: 18px; margin: 10px 0 0 0;">Your Application Has Been Approved</p>
    </div>

    <div class="content">
        <p>Dear <strong>{{ $application->agency_name }}</strong>,</p>

        <div class="success-box">
            <p style="margin: 0; font-size: 16px;"><strong>Great news!</strong> We are pleased to inform you that your
                agency registration application has been approved.</p>
        </div>

        <p>Welcome to our platform! You can now start managing your tours and services through your dedicated agency
            dashboard.</p>

        <div class="credentials-box">
            <h3 style="margin-top: 0;">🔐 Your Login Credentials:</h3>
            <ul style="list-style: none; padding: 0;">
                <li style="margin: 10px 0;"><strong>Email:</strong> {{ $user->email }}</li>
                <li style="margin: 10px 0;"><strong>Username:</strong> {{ $user->username }}</li>
                @if($temporaryPassword)
                    <li style="margin: 10px 0;"><strong>Password:</strong> <code
                            style="background: #f8f9fa; padding: 5px 10px; border-radius: 3px;">{{ $temporaryPassword }}</code>
                    </li>
                @endif
            </ul>
            <p style="margin: 15px 0 0 0; color: #856404;"><small>⚠️ <strong>Important:</strong> Please change your
                    password after your first login for security purposes.</small></p>
        </div>

        <div style="text-align: center;">
            <a href="{{ route('user.login') }}" class="button">Access Your Dashboard</a>
        </div>

        <h3>Next Steps:</h3>
        <ol>
            <li>Log in to your agency dashboard using the credentials above</li>
            <li>Complete your agency profile with additional information</li>
            <li>Start adding your tours and services</li>
            <li>Begin receiving bookings from customers</li>
        </ol>

        @if($application->admin_notes)
            <div
                style="background-color: #e7f3ff; border-left: 4px solid #2196F3; padding: 15px; margin: 20px 0; border-radius: 5px;">
                <h4 style="margin-top: 0;">📝 Admin Notes:</h4>
                <p style="margin: 0;">{{ $application->admin_notes }}</p>
            </div>
        @endif

        <p>If you have any questions or need assistance getting started, our support team is here to help.</p>

        <p>We're excited to have you on board!</p>

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