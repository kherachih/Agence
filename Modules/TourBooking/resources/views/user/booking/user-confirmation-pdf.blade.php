<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ __('translate.Booking Confirmation') }} - {{ $booking->booking_code }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 10px;
            line-height: 1.4;
            color: #333;
        }

        .page {
            padding: 15px;
        }

        /* Header */
        .header {
            text-align: center;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 3px solid #667eea;
        }

        .logo {
            max-height: 40px;
            margin-bottom: 8px;
        }

        .header h1 {
            color: #667eea;
            font-size: 18px;
            margin: 5px 0;
        }

        .booking-code {
            background: #667eea;
            color: white;
            padding: 5px 12px;
            border-radius: 15px;
            font-size: 11px;
            display: inline-block;
            margin-top: 5px;
        }

        /* Service Image */
        .service-image {
            width: 100%;
            height: 160px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 12px;
        }

        /* Two Column Layout */
        .two-col {
            width: 100%;
            margin-bottom: 12px;
        }

        .col-left {
            width: 48%;
            float: left;
            padding-right: 2%;
        }

        .col-right {
            width: 48%;
            float: right;
            padding-left: 2%;
        }

        .clearfix::after {
            content: "";
            display: table;
            clear: both;
        }

        /* Info Box */
        .info-box {
            background: #f8f9fa;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 10px;
            border-left: 3px solid #667eea;
        }

        .info-box h3 {
            color: #667eea;
            font-size: 12px;
            margin-bottom: 8px;
            font-weight: bold;
        }

        .info-item {
            margin-bottom: 4px;
            font-size: 9px;
        }

        .info-label {
            font-weight: bold;
            color: #555;
        }

        /* Table */
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
            font-size: 9px;
        }

        .table th {
            background: #667eea;
            color: white;
            padding: 6px;
            text-align: left;
            font-weight: bold;
        }

        .table td {
            padding: 5px 6px;
            border-bottom: 1px solid #e9ecef;
        }

        .table tr:last-child td {
            border-bottom: none;
        }

        .total-row {
            background: #fff3cd;
            font-weight: bold;
        }

        .paid-row {
            background: #d4edda;
            color: #155724;
            font-weight: bold;
        }

        .text-right {
            text-align: right;
        }

        /* Passenger */
        .passenger {
            background: #f8f9fa;
            border: 1px solid #dee2e6;
            padding: 8px;
            margin-bottom: 8px;
            border-radius: 5px;
            page-break-inside: avoid;
        }

        .passenger-name {
            font-weight: bold;
            color: #667eea;
            margin-bottom: 5px;
            font-size: 10px;
        }

        .passenger-info {
            font-size: 8px;
            line-height: 1.3;
        }

        /* Footer */
        .footer {
            margin-top: 15px;
            padding-top: 10px;
            border-top: 2px solid #667eea;
            text-align: center;
            font-size: 8px;
            color: #666;
        }

        .status-badge {
            background: #38ef7d;
            color: white;
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 10px;
            display: inline-block;
            margin: 5px 0;
        }
    </style>
</head>

<body>
    <div class="page">
        <!-- Header -->
        <div class="header">
            @if($general_setting && $general_setting->logo)
                <img src="{{ public_path($general_setting->logo) }}" alt="Logo" class="logo">
            @endif
            <h1>{{ __('translate.Booking Confirmation') }}</h1>
            <span class="booking-code">{{ $booking->booking_code }}</span>
            <div style="margin-top: 5px;">
                <span class="status-badge">✓ {{ __('translate.Booking Confirmed & Paid') }}</span>
            </div>
        </div>

        <!-- Service Image -->
        @if($booking->service && $booking->service->thumbnail && $booking->service->thumbnail->file_path)
            <img src="{{ public_path($booking->service->thumbnail->file_path) }}" alt="{{ $booking->service->title }}"
                class="service-image">
        @endif

        <!-- Two Column Layout -->
        <div class="two-col clearfix">
            <!-- Left Column -->
            <div class="col-left">
                <!-- Service Info -->
                <div class="info-box">
                    <h3>📍 {{ __('translate.Service') }}</h3>
                    <div class="info-item"><strong>{{ $booking->service->title ?? 'N/A' }}</strong></div>
                    @if($booking->service->location)
                        <div class="info-item">{{ $booking->service->location }}</div>
                    @endif
                    <div class="info-item">
                        <span class="info-label">{{ __('translate.Check In') }}:</span>
                        {{ $booking->check_in_date ? $booking->check_in_date->format('d M Y') : 'N/A' }}
                    </div>
                    @if($booking->check_out_date)
                        <div class="info-item">
                            <span class="info-label">{{ __('translate.Check Out') }}:</span>
                            {{ $booking->check_out_date->format('d M Y') }}
                        </div>
                    @endif
                    <div class="info-item">
                        <span class="info-label">{{ __('translate.Guests') }}:</span>
                        {{ $booking->adults }} {{ __('translate.Adults') }}
                        @if($booking->children > 0), {{ $booking->children }} {{ __('translate.Children') }}@endif
                        @if($booking->infants > 0), {{ $booking->infants }} {{ __('translate.Infants') }}@endif
                    </div>
                </div>

                <!-- Customer Info -->
                <div class="info-box">
                    <h3>👤 {{ __('translate.Customer Information') }}</h3>
                    <div class="info-item">
                        <span class="info-label">{{ __('translate.Name') }}:</span>
                        {{ $booking->customer_name ?? $booking->user->name ?? 'N/A' }}
                    </div>
                    <div class="info-item">
                        <span class="info-label">{{ __('translate.Email') }}:</span>
                        {{ $booking->customer_email ?? $booking->user->email ?? 'N/A' }}
                    </div>
                    <div class="info-item">
                        <span class="info-label">{{ __('translate.Phone') }}:</span>
                        {{ $booking->customer_phone ?? 'N/A' }}
                    </div>
                    <div class="info-item">
                        <span class="info-label">{{ __('translate.Payment Method') }}:</span>
                        {{ ucfirst($booking->payment_method) }}
                    </div>
                </div>
            </div>

            <!-- Right Column -->
            <div class="col-right">
                <!-- Invoice -->
                <div class="info-box">
                    <h3>💳 {{ __('translate.Invoice Details') }}</h3>
                    <table class="table">
                        <tbody>
                            @if($booking->adults > 0)
                                <tr>
                                    <td>{{ __('translate.Adults') }} ({{ $booking->adults }})</td>
                                    <td class="text-right">{{ currency($booking->adult_price * $booking->adults) }}</td>
                                </tr>
                            @endif
                            @if($booking->children > 0)
                                <tr>
                                    <td>{{ __('translate.Children') }} ({{ $booking->children }})</td>
                                    <td class="text-right">{{ currency($booking->child_price * $booking->children) }}</td>
                                </tr>
                            @endif
                            @if($booking->infants > 0 && $booking->infant_price > 0)
                                <tr>
                                    <td>{{ __('translate.Infants') }} ({{ $booking->infants }})</td>
                                    <td class="text-right">{{ currency($booking->infant_price * $booking->infants) }}</td>
                                </tr>
                            @endif
                            @if($booking->room_type_id && $booking->meta_data && isset($booking->meta_data['room_config']))
                                <tr>
                                    <td>{{ __('translate.Room Supplement') }}</td>
                                    <td class="text-right">
                                        {{ currency($booking->meta_data['room_config']['total_supplement'] ?? 0) }}</td>
                                </tr>
                            @endif
                            @if($booking->tax_amount > 0)
                                <tr>
                                    <td>{{ __('translate.Tax') }}</td>
                                    <td class="text-right">{{ currency($booking->tax_amount) }}</td>
                                </tr>
                            @endif
                            @if($booking->discount_amount > 0)
                                <tr style="color: #28a745;">
                                    <td>{{ __('translate.Discount') }}</td>
                                    <td class="text-right">- {{ currency($booking->discount_amount) }}</td>
                                </tr>
                            @endif
                            <tr class="total-row">
                                <td><strong>{{ __('translate.Total Amount') }}</strong></td>
                                <td class="text-right"><strong>{{ currency($booking->total) }}</strong></td>
                            </tr>
                            <tr class="paid-row">
                                <td><strong>{{ __('translate.Paid Amount') }}</strong></td>
                                <td class="text-right"><strong>{{ currency($booking->paid_amount) }}</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Passengers -->
        @if($passengers->count() > 0)
            <div style="clear: both; margin-top: 10px;">
                <div class="info-box">
                    <h3>✈️ {{ __('translate.Passenger Information') }} ({{ $passengers->count() }})</h3>
                    @foreach($passengers as $index => $passenger)
                        <div class="passenger">
                            <div class="passenger-name">{{ $index + 1 }}. {{ $passenger->full_name }}</div>
                            <div class="passenger-info">
                                <strong>{{ __('translate.Date of Birth') }}:</strong>
                                {{ $passenger->date_of_birth ? $passenger->date_of_birth->format('d M Y') : 'N/A' }} |
                                <strong>{{ __('translate.Gender') }}:</strong>
                                {{ $passenger->gender ? ucfirst($passenger->gender) : 'N/A' }} |
                                <strong>{{ __('translate.Nationality') }}:</strong> {{ $passenger->nationality ?? 'N/A' }}
                                @if($passenger->passport_number)
                                    <br><strong>{{ __('translate.Passport') }}:</strong> {{ $passenger->passport_number }}
                                    @if($passenger->passport_expiry_date)
                                        ({{ __('translate.Expiry') }}: {{ $passenger->passport_expiry_date->format('d M Y') }})
                                    @endif
                                @endif
                                @if($passenger->phone || $passenger->email)
                                    <br>
                                    @if($passenger->phone)<strong>{{ __('translate.Phone') }}:</strong>
                                    {{ $passenger->phone }}@endif
                                    @if($passenger->email) | <strong>{{ __('translate.Email') }}:</strong>
                                    {{ $passenger->email }}@endif
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Footer -->
        <div class="footer">
            <p><strong>{{ __('translate.This document serves as confirmation of your booking') }}</strong></p>
            <p>{{ __('translate.Please present this confirmation along with valid identification at check-in') }}</p>
            <p style="margin-top: 5px;">{{ __('translate.Generated on') }}: {{ now()->format('d M Y H:i') }}</p>
            <p style="margin-top: 5px; color: #667eea;">
                <strong>{{ __('translate.Thank you for your trust and have a wonderful journey!') }}</strong></p>
        </div>
    </div>
</body>

</html>