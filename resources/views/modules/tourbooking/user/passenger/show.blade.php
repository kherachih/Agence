@extends('user.master_layout')

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('translate.Passenger Information') }}</h3>
    <p class="crancy-header__text">{{ __('translate.Dashboard') }} >> {{ __('translate.Bookings') }} >> {{ __('translate.Passenger Information') }}</p>
@endsection

@section('body-content')
    <section class="crancy-adashboard crancy-show">
        <div class="container container__bscreen">
            <div class="row">
                <div class="col-12">
                    <div class="crancy-body">
                        <div class="crancy-dsinner">
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            <!-- Booking Summary -->
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5 class="card-title mb-3">{{ __('translate.Booking Details') }}</h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p><strong>{{ __('translate.Service') }}:</strong> {{ $booking->service->title ?? 'N/A' }}</p>
                                            <p><strong>{{ __('translate.Check In') }}:</strong> {{ $booking->check_in_date ? $booking->check_in_date->format('d M Y') : 'N/A' }}</p>
                                            <p><strong>{{ __('translate.Check Out') }}:</strong> {{ $booking->check_out_date ? $booking->check_out_date->format('d M Y') : 'N/A' }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p><strong>{{ __('translate.Total') }}:</strong> {{ currency($booking->total) }}</p>
                                            <p><strong>{{ __('translate.Payment Status') }}:</strong> 
                                                <span class="badge bg-{{ $booking->payment_status === 'completed' ? 'success' : 'warning' }}">
                                                    {{ $booking->payment_status }}
                                                </span>
                                            </p>
                                            <p><strong>{{ __('translate.Passenger Info') }}:</strong> 
                                                <span class="badge bg-{{ $booking->passenger_info_status === 'completed' ? 'success' : 'warning' }}">
                                                    {{ $booking->passenger_info_status }}
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Passengers List -->
                            <div class="card mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0">{{ __('translate.Passengers') }}</h5>
                                    @if($booking->passenger_info_status === 'completed')
                                        <a href="{{ route('user.passengers.edit', $booking) }}" class="btn btn-sm btn-primary">
                                            {{ __('translate.Edit Information') }}
                                        </a>
                                    @endif
                                </div>
                                <div class="card-body">
                                    @if($passengers->count() > 0)
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>{{ __('translate.#') }}</th>
                                                        <th>{{ __('translate.Name') }}</th>
                                                        <th>{{ __('translate.Passport') }}</th>
                                                        <th>{{ __('translate.Documents') }}</th>
                                                        <th>{{ __('translate.Contact') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($passengers as $index => $passenger)
                                                        <tr>
                                                            <td>{{ $index + 1 }}
                                                                @if($passenger->is_primary)
                                                                    <span class="badge bg-primary ms-1">{{ __('translate.Primary') }}</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <strong>{{ $passenger->full_name }}</strong><br>
                                                                <small class="text-muted">
                                                                    {{ $passenger->date_of_birth ? $passenger->date_of_birth->format('d M Y') : '' }}
                                                                    @if($passenger->gender)
                                                                        • {{ __('translate.'.$passenger->gender) }}
                                                                    @endif
                                                                </small>
                                                            </td>
                                                            <td>
                                                                @if($passenger->passport_number)
                                                                    {{ $passenger->passport_number }}<br>
                                                                    <small class="text-muted">
                                                                        {{ $passenger->passport_expiry_date ? $passenger->passport_expiry_date->format('d M Y') : '' }}
                                                                    </small>
                                                                @else
                                                                    <span class="text-muted">{{ __('translate.Not provided') }}</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if($passenger->passport_file)
                                                                    <a href="{{ $passenger->passport_file_url }}" target="_blank" class="btn btn-sm btn-outline-primary me-1">
                                                                        <i class="fas fa-file-pdf"></i> {{ __('translate.Passport') }}
                                                                    </a>
                                                                @endif
                                                                @if($passenger->insurance_file)
                                                                    <a href="{{ $passenger->insurance_file_url }}" target="_blank" class="btn btn-sm btn-outline-success">
                                                                        <i class="fas fa-shield-alt"></i> {{ __('translate.Insurance') }}
                                                                    </a>
                                                                @endif
                                                                @if(!$passenger->passport_file && !$passenger->insurance_file)
                                                                    <span class="text-muted">{{ __('translate.No documents') }}</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if($passenger->phone)
                                                                    <div><i class="fas fa-phone me-1"></i>{{ $passenger->phone }}</div>
                                                                @endif
                                                                @if($passenger->email)
                                                                    <div><i class="fas fa-envelope me-1"></i>{{ $passenger->email }}</div>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    @else
                                        <div class="text-center py-4">
                                            <p class="text-muted">{{ __('translate.No passenger information provided yet.') }}</p>
                                            <a href="{{ route('user.passengers.create', $booking) }}" class="btn btn-primary">
                                                {{ __('translate.Add Passenger Information') }}
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Special Requirements -->
                            @if($passengers->where('special_requirements', '!=', null)->count() > 0)
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <h5 class="mb-0">{{ __('translate.Special Requirements') }}</h5>
                                    </div>
                                    <div class="card-body">
                                        @foreach($passengers as $passenger)
                                            @if($passenger->special_requirements)
                                                <div class="alert alert-info mb-2">
                                                    <strong>{{ $passenger->full_name }}:</strong>
                                                    {{ $passenger->special_requirements }}
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            <!-- Back Button -->
                            <div class="mt-4">
                                <a href="{{ route('user.bookings.details', ['id' => $booking->id]) }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left me-2"></i>{{ __('translate.Back to Booking') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
