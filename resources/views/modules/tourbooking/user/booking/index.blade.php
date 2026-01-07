@extends('user.master_layout')
@section('title')
    <title>{{ __('translate.Bookings list') }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('translate.Bookings list') }}</h3>
    <p class="crancy-header__text">{{ __('translate.Bookings list') }} >> {{ __('translate.Bookings list') }}</p>
@endsection

@section('body-content')
    <section class="crancy-adashboard crancy-show">
        <div class="container container__bscreen">
            <div class="row">
                <div class="col-12">
                    <div class="crancy-body">
                        <div class="crancy-dsinner">
                            <!-- Notification for pending passenger info -->
                            @auth()
                                @php
                                    $pendingPassengerInfoBookings = $bookings->filter(function($booking) {
                                        return $booking->payment_status === 'completed'
                                            && $booking->passenger_info_status === 'pending';
                                    });
                                @endphp
                                @if($pendingPassengerInfoBookings->count() > 0)
                                    <div class="alert alert-warning alert-dismissible fade show mb-3" role="alert">
                                        <h5 class="alert-heading">
                                            <i class="fas fa-exclamation-triangle me-2"></i>
                                            {{ __('translate.Action Required: Complete Passenger Information') }}
                                        </h5>
                                        <p class="mb-2">
                                            {{ __('translate.You have :count booking(s) with completed payment but missing passenger information.', ['count' => $pendingPassengerInfoBookings->count()]) }}
                                        </p>
                                        <p class="mb-0">
                                            {{ __('translate.Please provide the required passenger details to complete your reservation.') }}
                                        </p>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif
                            @endauth

                            <div class="crancy-table crancy-table--v3 mg-top-30">
 
                                <div class="crancy-customer-filter">
                                    <div
                                        class="crancy-header__form crancy-header__form--customer create_new_btn_inline_box">
                                        <h4 class="crancy-product-card__title">{{ __('translate.My bookings') }}</h4>
                                    </div>
                                </div>

                                <div id="crancy-table__main_wrapper" class=" dt-bootstrap5 no-footer">
                                    <table class="crancy-table__main crancy-table__main-v3  no-footer" id="dataTable">
                                        <thead class="crancy-table__head">
                                            <tr>
                                                <th class="crancy-table__column-2 crancy-table__h2 sorting">
                                                    {{ __('translate.Booking Code') }}</th>
                                                <th class="crancy-table__column-2 crancy-table__h2 sorting">
                                                    {{ __('translate.Service Title') }}</th>
                                                <th class="crancy-table__column-2 crancy-table__h2 sorting">
                                                    {{ __('translate.Total Amount') }}</th>
                                                <th class="crancy-table__column-2 crancy-table__h2 sorting">
                                                    {{ __('translate.Location') }}</th>
                                                <th class="crancy-table__column-2 crancy-table__h2 sorting">
                                                    {{ __('translate.Status') }}</th>
                                                <th class="crancy-table__column-2 crancy-table__h2 sorting">
                                                    {{ __('translate.Action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody class="crancy-table__body">
                                            @foreach ($bookings as $booking)
                                                <tr class="odd">
                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        #{{ $booking->booking_code ?? 'N/A' }}</td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        {{ Str::limit($booking->service->title, 50) }}
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        {{ currency($booking->total) }}
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        {{ $booking?->service?->location ?? 'N/A' }}
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <span
                                                            class="crancy-badge crancy-table__status--paid">{{ $booking->booking_status }}</span>
                                                    </td>
                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <div class="btn-group">
                                                            <a href="{{ route('user.bookings.details', ['id' => $booking->id]) }}"
                                                                class="crancy-action__btn crancy-action__edit crancy-btn"><i
                                                                    class="fas fa-eye"></i>
                                                                {{ __('translate.Details') }}
                                                            </a>
                                                            @if($booking->payment_status === 'completed' && $booking->passenger_info_status === 'pending')
                                                                <a href="{{ route('user.passengers.create', $booking) }}"
                                                                   class="crancy-action__btn crancy-action__edit crancy-btn btn-warning">
                                                                    <i class="fas fa-user-plus"></i>
                                                                    {{ __('translate.Add Passengers') }}
                                                                </a>
                                                            @endif
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
