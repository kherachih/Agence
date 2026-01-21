@extends('admin.master_layout')
@section('title')
    <title>{{ __('translate.Quote Request Details') }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('translate.Quote Request Details') }}</h3>
    <p class="crancy-header__text">{{ __('translate.Manage') }} >> {{ __('translate.Quote Requests') }} >>
        {{ __('translate.Details') }}
    </p>
@endsection

@section('body-content')
    <section class="crancy-adashboard crancy-show">
        <div class="container container__bscreen">
            <div class="row">
                <div class="col-12">
                    <div class="crancy-body">
                        <div class="crancy-dsinner">
                            <div class="crancy-table crancy-table--v3 mg-top-30">
                                <div class="crancy-customer-filter">
                                    <div class="crancy-header__form crancy-header__form--customer">
                                        <h4 class="crancy-product-card__title">{{ __('translate.Request Information') }}
                                        </h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>{{ __('translate.Name') }}</th>
                                            <td>{{ $quote->first_name }} {{ $quote->last_name }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('translate.Email') }}</th>
                                            <td>{{ $quote->email }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('translate.Phone') }}</th>
                                            <td><a href="tel:{{ $quote->phone }}">{{ $quote->phone }}</a></td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('translate.Service') }}</th>
                                            <td>
                                                @if($quote->service)
                                                    <a href="{{ route('front.tourbooking.services.show', $quote->service->slug) }}"
                                                        target="_blank">
                                                        {{ $quote->service->translation?->title }}
                                                    </a>
                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('translate.Adults') }}</th>
                                            <td>{{ $quote->adults }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('translate.Children') }}</th>
                                            <td>{{ $quote->children }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('translate.Room Details / Message') }}</th>
                                            <td>{{ $quote->room_details }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('translate.Date') }}</th>
                                            <td>{{ $quote->created_at->format('d M Y, h:i A') }}</td>
                                        </tr>
                                    </table>

                                    <div class="mt-4">
                                        <h4 class="mb-3">{{ __('translate.Send Quote via Email') }}</h4>
                                        <form action="{{ route('admin.quote-requests.send', $quote->id) }}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="price_adult"
                                                        class="form-label">{{ __('translate.Price per Adult') }}</label>
                                                    <input type="text" name="price_adult" id="price_adult"
                                                        class="form-control" required>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="children_price"
                                                        class="form-label">{{ __('translate.Price per Child') }}</label>
                                                    <input type="text" name="children_price" id="children_price"
                                                        class="form-control">
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="rooms"
                                                        class="form-label">{{ __('translate.Number of Rooms') }}</label>
                                                    <input type="text" name="rooms" id="rooms" class="form-control"
                                                        required>
                                                </div>
                                                <div class="col-12 mb-3">
                                                    <label for="message"
                                                        class="form-label">{{ __('translate.Room Details / Message') }}</label>
                                                    <textarea name="message" id="message" rows="5" class="form-control"
                                                        required>{{ $quote->room_details }}</textarea>
                                                </div>
                                                <div class="col-12">
                                                    <button type="submit"
                                                        class="crancy-btn">{{ __('translate.Send Quote') }}</button>
                                                    <a href="{{ route('admin.quote-requests.index') }}"
                                                        class="crancy-btn crancy-btn--gray">{{ __('translate.Back to List') }}</a>
                                                </div>
                                            </div>
                                        </form>
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