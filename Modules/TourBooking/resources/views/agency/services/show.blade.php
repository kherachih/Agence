@extends('admin.master_layout')
@section('title')
    <title>{{ __('translate.Service Details') }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('translate.Service Details') }}</h3>
    <p class="crancy-header__text">{{ __('translate.Tour Booking') }} >> {{ __('translate.Service Details') }}</p>
@endsection

@section('body-content')
    <section class="crancy-adashboard crancy-show">
        <div class="container container__bscreen">
            <div class="row">
                <div class="col-12">
                    <div class="crancy-body">
                        <div class="crancy-dsinner">
                            <div class="row">
                                <div class="col-12 mg-top-30">
                                    <div class="crancy-product-card">
                                        <div class="create_new_btn_inline_box">
                                            <h4 class="crancy-product-card__title">
                                                {{ __('translate.Service Details') }}</h4>
                                            <div>
                                                <a href="{{ route('agency.tourbooking.services.edit', $service->id) }}"
                                                    class="crancy-btn crancy-btn__primary me-2">
                                                    <i class="fa fa-edit"></i> {{ __('translate.Edit') }}
                                                </a>
                                                <a href="{{ route('agency.tourbooking.services.index') }}"
                                                    class="crancy-btn">
                                                    <i class="fa fa-list"></i> {{ __('translate.Back to List') }}
                                                </a>
                                            </div>
                                        </div>

                                        <div class="row mg-top-25">
                                            <div class="col-md-4">
                                                <div class="card">
                                                    <div class="card-body text-center">
                                                        @if ($service->thumbnail && $service->thumbnail->file_path)
                                                            <img src="{{ asset('storage/' . $service->thumbnail->file_path) }}"
                                                                alt="{{ $service->translation->title ?? $service->title }}"
                                                                class="img-fluid mb-3" style="max-height: 200px;">
                                                        @else
                                                            <img src="{{ asset('admin/img/img-placeholder.jpg') }}"
                                                                alt="No image" class="img-fluid mb-3" style="max-height: 200px;">
                                                        @endif

                                                        <h5 class="card-title">
                                                            {{ $service->translation->title ?? $service->title }}
                                                        </h5>
                                                        <p class="text-muted"><small>{{ $service->slug }}</small></p>

                                                        <div class="mt-3">
                                                            @if ($service->status)
                                                                <span
                                                                    class="crancy-badge crancy-badge-success">{{ __('translate.Active') }}</span>
                                                            @else
                                                                <span
                                                                    class="crancy-badge crancy-badge-danger">{{ __('translate.Inactive') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card mt-4">
                                                    <div class="card-header">
                                                        <h5 class="mb-0">{{ __('translate.Quick Actions') }}</h5>
                                                    </div>
                                                    <div class="list-group list-group-flush">
                                                        <a href="{{ route('agency.tourbooking.services.itineraries', $service->id) }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                                            {{ __('translate.Itineraries') }}
                                                            <span class="badge bg-primary rounded-pill">{{ $service->itineraries->count() }}</span>
                                                        </a>
                                                        <a href="{{ route('agency.tourbooking.services.extra-charges', $service->id) }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                                            {{ __('translate.Extra Charges') }}
                                                            <span class="badge bg-primary rounded-pill">{{ $service->extraCharges->count() }}</span>
                                                        </a>
                                                        <a href="{{ route('agency.tourbooking.services.availability', $service->id) }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                                            {{ __('translate.Availability') }}
                                                        </a>
                                                        <a href="{{ route('agency.tourbooking.services.media', $service->id) }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                                            {{ __('translate.Media Gallery') }}
                                                            <span class="badge bg-primary rounded-pill">{{ $service->media->count() }}</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-8">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5 class="mb-0">{{ __('translate.General Information') }}</h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-sm-6 mb-3">
                                                                <label class="fw-bold">{{ __('translate.Service Type') }}:</label>
                                                                <p>{{ $service->serviceType->name ?? 'N/A' }}</p>
                                                            </div>
                                                            <div class="col-sm-6 mb-3">
                                                                <label class="fw-bold">{{ __('translate.Destination') }}:</label>
                                                                <p>{{ $service->destination->name ?? 'N/A' }}</p>
                                                            </div>
                                                            <div class="col-sm-6 mb-3">
                                                                <label class="fw-bold">{{ __('translate.Location') }}:</label>
                                                                <p>{{ $service->location ?? 'N/A' }}</p>
                                                            </div>
                                                            <div class="col-sm-6 mb-3">
                                                                <label class="fw-bold">{{ __('translate.Duration') }}:</label>
                                                                <p>{{ $service->duration ?? 'N/A' }}</p>
                                                            </div>
                                                            <div class="col-sm-6 mb-3">
                                                                <label class="fw-bold">{{ __('translate.Group Size') }}:</label>
                                                                <p>{{ $service->group_size ?? 'N/A' }}</p>
                                                            </div>
                                                            <div class="col-sm-6 mb-3">
                                                                <label class="fw-bold">{{ __('translate.Pricing') }}:</label>
                                                                <p>
                                                                    @if ($service->discount_price)
                                                                        <span class="text-decoration-line-through">{{ $service->full_price }}</span>
                                                                        <span class="text-success fw-bold">{{ $service->discount_price }}</span>
                                                                    @elseif($service->full_price)
                                                                        <span class="fw-bold">{{ $service->full_price }}</span>
                                                                    @elseif($service->price_per_person)
                                                                        <span class="fw-bold">{{ $service->price_per_person }} {{ __('translate.per person') }}</span>
                                                                    @else
                                                                        N/A
                                                                    @endif
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card mt-4">
                                                    <div class="card-header">
                                                        <h5 class="mb-0">{{ __('translate.Description') }}</h5>
                                                    </div>
                                                    <div class="card-body">
                                                        {!! $service->translation->description ?? $service->description !!}
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
            </div>
        </div>
    </section>
@endsection
