<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('translate.Booking Confirmation') }} - {{ $booking->booking_code }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            font-size: 12px;
            line-height: 1.6;
            color: #333;
            background-color: #f5f5f5;
        }
        
        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 40px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #007bff;
            padding-bottom: 20px;
        }
        
        .header h1 {
            color: #007bff;
            font-size: 24px;
            margin-bottom: 10px;
        }
        
        .header p {
            color: #666;
            font-size: 14px;
        }
        
        .section {
            margin-bottom: 30px;
        }
        
        .section-title {
            font-size: 16px;
            font-weight: bold;
            color: #007bff;
            margin-bottom: 15px;
            padding-bottom: 5px;
            border-bottom: 1px solid #e0e0e0;
        }
        
        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-bottom: 15px;
        }
        
        .info-item {
            margin-bottom: 10px;
        }
        
        .info-label {
            font-weight: bold;
            color: #555;
            display: block;
            margin-bottom: 3px;
        }
        
        .info-value {
            color: #333;
        }
        
        .passenger-card {
            border: 1px solid #e0e0e0;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 15px;
            background-color: #f9f9f9;
        }
        
        .passenger-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
            padding-bottom: 10px;
            border-bottom: 1px solid #e0e0e0;
        }
        
        .passenger-name {
            font-size: 14px;
            font-weight: bold;
            color: #333;
        }
        
        .passenger-badge {
            background-color: #007bff;
            color: white;
            padding: 2px 8px;
            border-radius: 3px;
            font-size: 10px;
            font-weight: bold;
        }
        
        .passenger-details {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }
        
        .document-list {
            margin-top: 10px;
            padding-top: 10px;
            border-top: 1px solid #e0e0e0;
        }
        
        .document-item {
            display: flex;
            align-items: center;
            margin-bottom: 5px;
        }
        
        .document-icon {
            margin-right: 8px;
            color: #28a745;
        }
        
        .special-requirements {
            background-color: #fff3cd;
            border-left: 4px solid #ffc107;
            padding: 15px;
            margin-top: 15px;
            border-radius: 3px;
        }
        
        .footer {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 2px solid #007bff;
            text-align: center;
            color: #666;
            font-size: 11px;
        }
        
        .badge {
            display: inline-block;
            padding: 3px 8px;
            border-radius: 3px;
            font-size: 10px;
            font-weight: bold;
        }
        
        .badge-success {
            background-color: #28a745;
            color: white;
        }
        
        .badge-warning {
            background-color: #ffc107;
            color: #333;
        }
        
        .status-box {
            text-align: center;
            padding: 15px;
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        
        .status-box h3 {
            color: #155724;
            font-size: 18px;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <h1>{{ __('translate.Booking Confirmation') }}</h1>
            <p>{{ __('translate.Booking Code') }}: #{{ $booking->booking_code }}</p>
            <p>{{ __('translate.Date') }}: {{ now()->format('d M Y H:i') }}</p>
        </div>

        <!-- Status -->
        <div class="status-box">
            <h3>{{ __('translate.Booking Confirmed') }}</h3>
            <p>{{ __('translate.Thank you for your booking! Your reservation has been confirmed.') }}</p>
        </div>

        <!-- Booking Details -->
        <div class="section">
            <div class="section-title">{{ __('translate.Booking Details') }}</div>
            <div class="info-grid">
                <div class="info-item">
                    <span class="info-label">{{ __('translate.Service') }}:</span>
                    <span class="info-value">{{ $booking->service->title ?? 'N/A' }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">{{ __('translate.Total Amount') }}:</span>
                    <span class="info-value">{{ currency($booking->total) }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">{{ __('translate.Check In') }}:</span>
                    <span class="info-value">{{ $booking->check_in_date ? $booking->check_in_date->format('d M Y') : 'N/A' }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">{{ __('translate.Check Out') }}:</span>
                    <span class="info-value">{{ $booking->check_out_date ? $booking->check_out_date->format('d M Y') : 'N/A' }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">{{ __('translate.Adults') }}:</span>
                    <span class="info-value">{{ $booking->adults }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">{{ __('translate.Children') }}:</span>
                    <span class="info-value">{{ $booking->children }}</span>
                </div>
            </div>
        </div>

        <!-- Customer Information -->
        <div class="section">
            <div class="section-title">{{ __('translate.Customer Information') }}</div>
            <div class="info-grid">
                <div class="info-item">
                    <span class="info-label">{{ __('translate.Name') }}:</span>
                    <span class="info-value">{{ $booking->customer_name ?? $booking->user->name ?? 'N/A' }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">{{ __('translate.Email') }}:</span>
                    <span class="info-value">{{ $booking->customer_email ?? $booking->user->email ?? 'N/A' }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">{{ __('translate.Phone') }}:</span>
                    <span class="info-value">{{ $booking->customer_phone ?? 'N/A' }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">{{ __('translate.Payment Status') }}:</span>
                    <span class="info-value">
                        <span class="badge {{ $booking->payment_status === 'completed' ? 'badge-success' : 'badge-warning' }}">
                            {{ $booking->payment_status }}
                        </span>
                    </span>
                </div>
            </div>
        </div>

        <!-- Passenger Information -->
        <div class="section">
            <div class="section-title">{{ __('translate.Passenger Information') }}</div>
            
            @if($passengers->count() > 0)
                @foreach($passengers as $index => $passenger)
                    <div class="passenger-card">
                        <div class="passenger-header">
                            <div class="passenger-name">
                                {{ __('translate.Passenger') }} {{ $index + 1 }}: {{ $passenger->full_name }}
                            </div>
                            @if($passenger->is_primary)
                                <div class="passenger-badge">{{ __('translate.Primary') }}</div>
                            @endif
                        </div>
                        
                        <div class="passenger-details">
                            <div class="info-item">
                                <span class="info-label">{{ __('translate.Date of Birth') }}:</span>
                                <span class="info-value">{{ $passenger->date_of_birth ? $passenger->date_of_birth->format('d M Y') : 'N/A' }}</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">{{ __('translate.Gender') }}:</span>
                                <span class="info-value">{{ $passenger->gender ? __('translate.'.$passenger->gender) : 'N/A' }}</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">{{ __('translate.Nationality') }}:</span>
                                <span class="info-value">{{ $passenger->nationality ?? 'N/A' }}</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">{{ __('translate.Passport Number') }}:</span>
                                <span class="info-value">{{ $passenger->passport_number ?? 'N/A' }}</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">{{ __('translate.Passport Expiry') }}:</span>
                                <span class="info-value">{{ $passenger->passport_expiry_date ? $passenger->passport_expiry_date->format('d M Y') : 'N/A' }}</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">{{ __('translate.Phone') }}:</span>
                                <span class="info-value">{{ $passenger->phone ?? 'N/A' }}</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">{{ __('translate.Email') }}:</span>
                                <span class="info-value">{{ $passenger->email ?? 'N/A' }}</span>
                            </div>
                        </div>

                        <!-- Documents -->
                        @if($passenger->passport_file || $passenger->insurance_file)
                            <div class="document-list">
                                @if($passenger->passport_file)
                                    <div class="document-item">
                                        <span class="document-icon">✓</span>
                                        <span>{{ __('translate.Passport Copy Uploaded') }}</span>
                                    </div>
                                @endif
                                @if($passenger->insurance_file)
                                    <div class="document-item">
                                        <span class="document-icon">✓</span>
                                        <span>{{ __('translate.Travel Insurance Uploaded') }}</span>
                                    </div>
                                @endif
                            </div>
                        @endif
                    </div>
                @endforeach
            @else
                <p style="color: #666; font-style: italic;">{{ __('translate.No passenger information provided.') }}</p>
            @endif
        </div>

        <!-- Special Requirements -->
        @if($passengers->where('special_requirements', '!=', null)->count() > 0)
            <div class="section">
                <div class="section-title">{{ __('translate.Special Requirements') }}</div>
                <div class="special-requirements">
                    @foreach($passengers as $passenger)
                        @if($passenger->special_requirements)
                            <p><strong>{{ $passenger->full_name }}:</strong> {{ $passenger->special_requirements }}</p>
                        @endif
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Footer -->
        <div class="footer">
            <p>{{ __('translate.This document serves as confirmation of your booking.') }}</p>
            <p>{{ __('translate.Please keep this document for your records.') }}</p>
            <p>{{ __('translate.Generated on') }}: {{ now()->format('d M Y H:i') }}</p>
        </div>
    </div>
</body>
</html>
