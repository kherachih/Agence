@extends('user.master_layout')
@section('title')
    <title>{{ __('translate.Booking Details') }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('translate.Booking Details') }}</h3>
    <p class="crancy-header__text">{{ __('translate.Dashboard') }} >> {{ __('translate.Booking Details') }}</p>
@endsection

@section('body-content')
    <!-- crancy Dashboard -->
    <section class="crancy-adashboard crancy-show">
        <div class="container container__bscreen">
            <div class="row">
                <div class="col-12">
                    <div class="crancy-body">
                        <!-- Dashboard Inner -->
                        <div class="crancy-dsinner">
                            <!-- Notification for pending passenger info -->
                            @if($booking->payment_status === 'completed' && $booking->passenger_info_status === 'pending')
                                <div class="alert alert-warning alert-dismissible fade show mb-4" role="alert">
                                    <h5 class="alert-heading">
                                        <i class="fas fa-exclamation-triangle me-2"></i>
                                        {{ __('translate.Action Required: Complete Passenger Information') }}
                                    </h5>
                                    <p class="mb-2">
                                        {{ __('translate.Your payment has been completed, but you still need to provide passenger information.') }}
                                    </p>
                                    <p class="mb-3">
                                        {{ __('translate.Please provide the required details for all passengers (:count)', ['count' => $booking->adults + $booking->children]) }}
                                    </p>
                                    <a href="{{ route('user.passengers.create', $booking) }}" class="btn btn-warning">
                                        <i class="fas fa-user-plus me-2"></i>
                                        {{ __('translate.Add Passenger Information Now') }}
                                    </a>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            <div class="row justify-content-center">
                                <div class="col-10 mg-top-30">
                                    <div class="ed-invoice-page-wrapper">
                                        <div class="ed-invoice-main-wrapper">

                                            <div class="ed-invoice-page">
                                                <div class="ed-inv-logo-area">
                                                    <div class="ed-main-logo">
                                                        <img src="{{ asset($general_setting->logo) }}" alt="logo"
                                                            class="ed-logo">
                                                    </div>
                                                    <div>

                                                    </div>
                                                </div>

                                                <div class="ed-inv-billing-info">
                                                    <div class="ed-inv-info">
                                                        <p class="ed-inv-info-title">{{ __('translate.Billed To') }}
                                                        </p>
                                                        <table>
                                                            <tr>
                                                                <td>{{ __('translate.Name') }}:</td>
                                                                <td> {{ $booking->customer_name ?? 'NA' }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>{{ __('translate.Phone') }}:</td>
                                                                <td>{{ $booking?->customer_email }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>{{ __('translate.Email') }}:</td>
                                                                <td>{{ $booking?->customer_phone }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>{{ __('translate.Address') }} : </td>
                                                                <td> {{ $booking?->customer_address }}</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>

                                                <div class="ed-inv-billing-info">
                                                    <div class="ed-inv-info">
                                                        <p class="ed-inv-info-title">
                                                            {{ __('translate.Booking Information') }}
                                                        </p>
                                                        <table>
                                                            <tr>
                                                                <td>{{ __('translate.Invoice No') }}:</td>
                                                                <td>#{{ $booking->booking_code }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>{{ __('translate.Booking Status') }}:</td>
                                                                <td>
                                                                    <span
                                                                        class="badge bg-{{ $booking->booking_status == 'confirmed' ? 'success' : ($booking->booking_status == 'pending' ? 'warning' : ($booking->booking_status == 'cancelled' ? 'danger' : 'info')) }}">
                                                                        {{ ucfirst($booking->booking_status) }}
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>{{ __('translate.Payment Status') }} : </td>
                                                                <td>
                                                                    <span
                                                                        class="badge bg-{{ $booking->payment_status == 'completed' ? 'success' : 'warning' }}">
                                                                        {{ ucfirst($booking->payment_status) }}
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>{{ __('translate.Passenger Info') }} : </td>
                                                                <td>
                                                                    <span
                                                                        class="badge bg-{{ $booking->passenger_info_status == 'completed' ? 'success' : 'warning' }}">
                                                                        {{ ucfirst($booking->passenger_info_status ?? 'pending') }}
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>{{ __('translate.Payment Method') }} : </td>
                                                                <td>
                                                                    {{ currency($booking->total) }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>{{ __('translate.Total Amount') }} : </td>
                                                                <td>
                                                                    {{ ucfirst($booking->payment_method) }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>{{ __('translate.Paid Amount') }} : </td>
                                                                <td>
                                                                    {{ currency($booking->paid_amount) }}
                                                                </td>
                                                            </tr>
                                                            @if ($booking->due_amount > 0)
                                                                <tr>
                                                                    <td>{{ __('translate.Due Amount') }} : </td>
                                                                    <td>
                                                                        {{ currency($booking->due_amount) }}
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                        </table>

                                                    </div>
                                                    <div class="ed-inv-info">
                                                        <p class="ed-inv-info-title">
                                                            {{ __('translate.Service Information') }}
                                                        </p>
                                                        <table>
                                                            <tr>
                                                                <td>{{ __('translate.Title') }}:</td>
                                                                <td> {{ $booking->service->title ?? 'NA' }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>{{ __('translate.Location') }} : </td>
                                                                <td>{{ $booking?->service?->location }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>{{ __('translate.Check in Date') }}:</td>
                                                                <td>{{ date('d M Y', strtotime($booking->check_in_date)) }}
                                                                </td>
                                                            </tr>
                                                            @if ($booking->check_out_date)
                                                                <tr>
                                                                    <td>{{ __('translate.Check out Date') }}:</td>
                                                                    <td>{{ date('d M Y', strtotime($booking->check_out_date)) }}
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                            <tr>
                                                                <td>{{ __('translate.Adults') }} : </td>
                                                                <td> {{ $booking?->adults }}</td>
                                                            </tr>

                                                            <tr>
                                                                <td>{{ __('translate.Children') }} : </td>
                                                                <td> {{ $booking?->children }}</td>
                                                            </tr>

                                                            <tr>
                                                                <td>{{ __('translate.Infants') }} : </td>
                                                                <td> {{ $booking?->infants }}</td>
                                                            </tr>
                                                        </table>
                                                    </div>

                                                    @if ($booking->room_type_id && $booking->roomType)
                                                        <div class="ed-inv-info">
                                                            <p class="ed-inv-info-title">
                                                                {{ __('translate.Room Configuration') }}
                                                            </p>
                                                            <table>
                                                                <tr>
                                                                    <td>{{ __('translate.Room Type') }}:</td>
                                                                    <td>
                                                                        <strong>{{ $booking->roomType->display_name }}</strong>
                                                                    </td>
                                                                </tr>
                                                                @if($booking->meta_data && isset($booking->meta_data['room_config']))
                                                                    <tr>
                                                                        <td>{{ __('translate.Configuration') }}:</td>
                                                                        <td>
                                                                            <span style="color: #666; font-size: 13px;">
                                                                                <i class="fas fa-info-circle"></i>
                                                                                {{ $booking->meta_data['room_config']['configuration_text'] ?? '' }}
                                                                            </span>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>{{ __('translate.Supplement') }}:</td>
                                                                        <td>
                                                                            {{ currency($booking->meta_data['room_config']['supplement_per_person'] ?? 0) }}
                                                                            / person ×
                                                                            {{ $booking->meta_data['room_config']['total_guests'] ?? 0 }}
                                                                            guests =
                                                                            <strong>{{ currency($booking->meta_data['room_config']['total_supplement'] ?? 0) }}</strong>
                                                                        </td>
                                                                    </tr>
                                                                @endif
                                                            </table>
                                                        </div>
                                                    @endif
                                                </div>

                                                @if ($booking->admin_notes)
                                                    <div class="row mb-4">
                                                        <div class="col-md-12">
                                                            <h6 class="text-muted">{{ __('translate.Admin note for you') }}</h6>
                                                            <p>{{ $booking->admin_notes }}</p>
                                                        </div>
                                                    </div>
                                                @endif

                                                @if ($booking->cancellation_reason)
                                                    <div class="row mb-4">
                                                        <div class="col-md-12">
                                                            <h6 class="text-muted">{{ __('translate.Cancellation reason') }}
                                                            </h6>
                                                            <p>{{ $booking->cancellation_reason }}</p>
                                                        </div>
                                                    </div>
                                                @endif

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h6 class="text-muted">{{ __('translate.Actions') }}</h6>
                                                        {{-- DEBUG INFO --}}
                                                        <div class="alert alert-info">
                                                            Debug: Payment Status = {{ $booking->payment_status }},
                                                            Passenger Info Status =
                                                            {{ $booking->passenger_info_status ?? 'null' }}
                                                        </div>
                                                        <div class="d-flex flex-wrap gap-4">

                                                            <div>
                                                                <button class="btn btn-secondary">
                                                                    <a class="text-dark"
                                                                        href="{{ route('user.bookings.index') }}">
                                                                        <i class="bi bi-arrow-left"></i>
                                                                        {{ __('translate.Back to Bookings') }}
                                                                    </a>
                                                                </button>
                                                            </div>

                                                            <div>
                                                                @if($booking->payment_status === 'completed' && $booking->passenger_info_status === 'pending')
                                                                    <a href="{{ route('user.passengers.create', $booking) }}"
                                                                        class="btn btn-warning">
                                                                        <i class="fas fa-user-plus"></i>
                                                                        {{ __('translate.Add Passenger Information') }}
                                                                    </a>
                                                                @elseif($booking->passenger_info_status === 'completed')
                                                                    <a href="{{ route('user.passengers.show', $booking) }}"
                                                                        class="btn btn-info">
                                                                        <i class="fas fa-users"></i>
                                                                        {{ __('translate.View Passengers') }}
                                                                    </a>
                                                                @endif
                                                            </div>

                                                            {{-- PDF Download Button --}}
                                                            <div>
                                                                @if($booking->payment_status === 'completed' && $booking->passenger_info_status === 'completed')
                                                                    <a href="{{ route('user.bookings.download-confirmation', $booking) }}"
                                                                        class="btn btn-success w-auto" target="_blank">
                                                                        <i class="fas fa-file-pdf"></i>
                                                                        {{ __('translate.Download Booking Confirmation') }}
                                                                    </a>
                                                                @elseif($booking->payment_status === 'completed' && $booking->passenger_info_status !== 'completed')
                                                                    <button class="btn btn-secondary w-auto" disabled
                                                                        title="{{ __('translate.Complete passenger information to download confirmation') }}">
                                                                        <i class="fas fa-file-pdf"></i>
                                                                        {{ __('translate.Download Booking Confirmation') }}
                                                                    </button>
                                                                    <small class="text-warning d-block mt-2">
                                                                        <i class="fas fa-info-circle"></i>
                                                                        {{ __('translate.Complete passenger information first') }}
                                                                    </small>
                                                                @endif
                                                            </div>

                                                            <div>
                                                                @if ($booking->booking_status == 'pending' || $booking->booking_status == 'confirmed' || $booking->booking_status == 'success')
                                                                    <button type="button" class="btn btn-danger w-auto"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#cancelBookingModal">
                                                                        <i class="bi bi-x-circle"></i>
                                                                        {{ __('translate.Cancel Booking') }}
                                                                    </button>
                                                                @endif
                                                            </div>

                                                            <div>
                                                                @if ($booking->booking_status == 'completed')
                                                                    <button class="btn btn-primary w-auto">
                                                                        <a target="_blank"
                                                                            href="{{ route('front.tourbooking.services.show', ['slug' => $booking->service->slug . '#reviewForm']) }}"
                                                                            class="text-white">
                                                                            <i class="bi bi-star"></i>
                                                                            {{ __('translate.Leave a Review') }}
                                                                        </a>
                                                                    </button>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Dashboard Inner -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End crancy Dashboard -->

    <!-- Cancel Booking Modal -->
    @if ($booking->booking_status == 'pending' || $booking->booking_status == 'confirmed' || $booking->booking_status == 'success')
        <div class="modal fade" id="cancelBookingModal" tabindex="-1" aria-labelledby="cancelBookingModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{ route('user.bookings.cancel', ['id' => $booking->id]) }}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="cancelBookingModalLabel">{{ __('translate.Cancel Booking') }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p class="text-danger">{{ __('translate.Are you sure you want to cancel this booking?') }}</p>
                            <div class="mb-3">
                                <label for="cancellation_reason"
                                    class="form-label">{{ __('translate.Reason for Cancellation') }}</label>
                                <textarea class="form-control" id="cancellation_reason" name="cancellation_reason" rows="3"
                                    required></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">{{ __('translate.Close') }}</button>
                            <button type="submit" class="btn btn-danger">{{ __('translate.Cancel Booking') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
@endsection