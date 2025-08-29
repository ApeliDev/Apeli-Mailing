<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase Confirmation | {{ config('app.name') }}</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            background-color: #f8fafc;
            margin: 0;
            padding: 0;
            line-height: 1.6;
            color: #374151;
        }
        
        .email-wrapper {
            background-color: #f8fafc;
            padding: 32px 0;
        }
        
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }
        
        .email-header {
            background-color: #ffffff;
            padding: 32px 40px 24px;
            border-bottom: 1px solid #e5e7eb;
            text-align: center;
        }
        
        .email-body {
            padding: 32px 40px;
        }
        
        .email-footer {
            background-color: #f9fafb;
            padding: 24px 40px;
            border-top: 1px solid #e5e7eb;
            font-size: 14px;
            color: #6b7280;
        }
        
        .logo {
            max-width: 200px;
            margin: 0 auto 8px;
            display: block;
        }
        
        .subtitle {
            color: #6b7280;
            font-size: 16px;
            margin: 0;
        }
        
        h1 {
            font-size: 20px;
            font-weight: 600;
            color: #111827;
            margin: 0 0 24px 0;
        }
        
        p {
            margin: 0 0 16px 0;
            font-size: 16px;
            line-height: 1.6;
        }
        
        .transaction-details {
            background-color: #f9fafb;
            border-radius: 8px;
            padding: 24px;
            margin: 24px 0;
            border: 1px solid #e5e7eb;
        }
        
        .detail-row {
            display: flex;
            margin-bottom: 12px;
            padding-bottom: 12px;
            border-bottom: 1px solid #e5e7eb;
        }
        
        .detail-row:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }
        
        .detail-label {
            color: #6b7280;
            font-size: 14px;
            width: 180px;
            flex-shrink: 0;
        }
        
        .detail-value {
            color: #111827;
            font-weight: 500;
        }
        
        .amount-highlight {
            font-size: 24px;
            font-weight: 700;
            color: #3b82f6;
            margin: 8px 0 16px;
            display: block;
        }
        
        .info-alert {
            background-color: #eff6ff;
            border-left: 4px solid #3b82f6;
            padding: 16px;
            margin: 24px 0;
            border-radius: 0 6px 6px 0;
        }
        
        .info-alert p {
            margin: 0;
            color: #1e40af;
            font-size: 14px;
        }
        
        @media only screen and (max-width: 600px) {
            .email-header,
            .email-body,
            .email-footer {
                padding: 24px 20px;
            }
            
            .detail-row {
                flex-direction: column;
            }
            
            .detail-label {
                margin-bottom: 4px;
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="email-wrapper">
        <div class="email-container">
            <div class="email-header">
                <img src="data:image/png;base64,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" alt="Base Titanium Ltd Logo" class="logo">
                <p class="subtitle">Purchase Confirmation</p>
            </div>
            
            <div class="email-body">
                <p>Dear {{ $data['name'] }},</p>
                
                <p>We write to confirm that Base Titanium Ltd (UK Headquarters) has approved the purchase of your German Duss 12lbs stove for a total of <strong>USD 38,700,000</strong> (equivalent to <strong>KES 6,000,000,000</strong>).</p>
                
                
                <div class="transaction-details" style="width: 100%; max-width: 600px; margin: 0 auto; font-family: Arial, sans-serif; background: #ffffff; padding: 24px; border-radius: 8px; box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);">
                    <h2 style="margin: 0 0 20px 0; font-size: 20px; color: #111827; font-weight: 600; padding-bottom: 12px; border-bottom: 1px solid #e5e7eb;">Transaction Details</h2>
                    
                    <div class="detail-row" style="display: flex; justify-content: space-between; padding: 12px 0; border-bottom: 1px solid #f3f4f6;">
                        <div class="detail-label" style="font-weight: 500; color: #4b5563; min-width: 120px;">Item:</div>
                        <div class="detail-value" style="color: #111827; text-align: right; flex: 1;">German Duss 12lbs Stove</div>
                    </div>
                    
                    <div class="detail-row" style="display: flex; justify-content: space-between; padding: 12px 0;">
                        <div class="detail-label" style="font-weight: 500; color: #4b5563; min-width: 120px;">Purchase Amount:</div>
                        <div class="detail-value" style="text-align: right;">
                            <div class="amount-highlight" style="font-weight: 600; color: #111827; font-size: 18px; margin-bottom: 4px;">USD 38,700,000</div>
                            <div style="color: #6b7280; font-size: 14px;">(KES 6,000,000,000)</div>
                        </div>
                    </div>
                </div>
                
                <p>Our local representative will contact you to arrange collection for inspection. Please ensure the item is available and prepared for secure transfer.</p>
                
                <div style="margin-top: 32px;">
                    <p>Sincerely,</p>
                    <p style="font-weight: 600; margin: 8px 0 4px 0;">Claire Thompson</p>
                    <p style="color: #6b7280; margin: 0 0 16px 0;">Senior Manager – International Transactions<br>Base Titanium Ltd (UK Headquarters)</p>
                </div>
            </div>
            
            <div class="email-footer">
                <p> {{ date('Y') }} Base Titanium Ltd. All rights reserved.</p>
                <p style="margin-top: 8px; font-size: 12px; color: #9ca3af;">
                    This is an automated message. Please do not reply to this email.
                </p>
            </div>
        </div>
    </div>
</body>
</html>