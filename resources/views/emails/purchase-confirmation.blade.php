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
            font-size: 24px;
            font-weight: 700;
            color: #111827;
            margin-bottom: 8px;
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
                <div class="logo">Base Titanium Ltd</div>
                <p class="subtitle">Purchase Confirmation</p>
            </div>
            
            <div class="email-body">
                <p>Dear {{ $data['name'] }},</p>
                
                <p>We write to confirm that Base Titanium Ltd (UK Headquarters) has approved the purchase of your German Duss 12lbs stove for a total of <strong>USD 38,700,000</strong> (equivalent to <strong>KES 6,000,000,000</strong>).</p>
                
                <div class="transaction-details">
                    <h2 style="margin-top: 0; margin-bottom: 20px; font-size: 18px; color: #111827;">Transaction Details</h2>
                    
                    <div class="detail-row">
                        <div class="detail-label">Item:</div>
                        <div class="detail-value">German Duss 12lbs Stove</div>
                    </div>
                    
                    <div class="detail-row">
                        <div class="detail-label">Purchase Amount:</div>
                        <div class="detail-value">
                            <span class="amount-highlight">USD 38,700,000</span>
                            <div style="font-size: 14px; color: #6b7280;">(KES 6,000,000,000)</div>
                        </div>
                    </div>
                </div>
                
                <div class="info-alert">
                    <p><strong>Transaction Process:</strong></p>
                    <ol style="margin: 8px 0 0 20px; padding: 0;">
                        <li style="margin-bottom: 8px;"><strong>Verification Stage 1:</strong> Conducted by our technician, Eng. Peter Mwangi, at the Base Titanium Lab in Kwale, Kenya.</li>
                        <li style="margin-bottom: 8px;"><strong>Verification Stage 2:</strong> Final inspection at our UK Headquarters by Dr. Susan Whitaker.</li>
                        <li><strong>Payment:</strong> Once both inspections are complete, funds will be released via escrow through the Central Bank of Kenya.</li>
                    </ol>
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
