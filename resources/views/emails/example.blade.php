<!DOCTYPE html>
<html>
<head>
    <title>{{ $data['title'] ?? 'Welcome to Our Service' }}</title>
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
            background-color: #4a90e2;
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 5px 5px 0 0;
        }
        .content {
            padding: 20px;
            border: 1px solid #e0e0e0;
            border-top: none;
            border-radius: 0 0 5px 5px;
        }
        .footer {
            margin-top: 20px;
            font-size: 12px;
            color: #777777;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>{{ $data['title'] ?? 'Welcome to Our Service' }}</h1>
    </div>
    
    <div class="content">
        <p>Dear {{ $data['name'] ?? 'Valued Customer' }},</p>
        
        <p>Thank you for joining our service! We're excited to have you on board.</p>
        
        <p>Here's what you can expect from us:</p>
        <ul>
            <li>High-quality service and support</li>
            <li>Regular updates and new features</li>
            <li>Dedicated customer care</li>
        </ul>
        
        <p>If you have any questions or need assistance, feel free to reply to this email or contact our support team.</p>
        
        <p>Best regards,<br>{{ config('app.name') }} Team</p>
    </div>
    
    <div class="footer">
        <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
        <p>If you did not expect to receive this email, please ignore it.</p>
    </div>
</body>
</html>
