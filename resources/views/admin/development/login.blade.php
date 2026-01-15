@extends('admin.master_layout')
@section('title')
    <title>{{ __('translate.Development Access') }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('translate.Development Access') }}</h3>
    <p class="crancy-header__text">{{ __('translate.Dashboard') }} >> {{ __('translate.Development Access') }}</p>
@endsection

@section('body-content')
    <section class="crancy-adashboard crancy-show">
        <div class="container container__bscreen">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 col-lg-6">
                    <div class="crancy-body">
                        <div class="crancy-dsinner">
                            <div class="crancy-table crancy-table--v3 mg-top-30">
                                <div class="crancy-customer-filter">
                                    <div class="crancy-customer-filter__single crancy-customer-filter__single--csearch">
                                        <div class="crancy-header__form crancy-header__form--customer">
                                            <h4 class="crancy-product-card__title text-center mb-4">
                                                <svg width="48" height="48" viewBox="0 0 24 24" fill="none" class="mb-3"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 17h-2v-2h2v2zm2.07-7.75l-.9.92C13.45 12.9 13 13.5 13 15h-2v-.5c0-1.1.45-2.1 1.17-2.83l1.24-1.26c.37-.36.59-.86.59-1.41 0-1.1-.9-2-2-2s-2 .9-2 2H8c0-2.21 1.79-4 4-4s4 1.79 4 4c0 .88-.36 1.68-.93 2.25z"
                                                        fill="currentColor" />
                                                </svg>
                                                <br>
                                                {{ __('translate.Development Section') }}
                                            </h4>
                                        </div>
                                    </div>
                                </div>

                                <div class="crancy-table__main">
                                    @if (session('error'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            {{ session('error') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                        </div>
                                    @endif

                                    @if (session('success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            {{ session('success') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                        </div>
                                    @endif

                                    <div class="alert alert-warning" role="alert">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" style="vertical-align: middle;">
                                            <path
                                                d="M12 9V13M12 17.5V17.51M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
                                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                        <strong>{{ __('translate.Security Notice') }}:</strong>
                                        {{ __('translate.This section is protected and requires a special password. All access attempts are logged.') }}
                                    </div>

                                    <form action="{{ route('admin.development.verify') }}" method="POST" class="p-4">
                                        @csrf
                                        <div class="mb-4">
                                            <label for="password"
                                                class="form-label">{{ __('translate.Development Password') }}</label>
                                            <input type="password" class="form-control" id="password" name="password"
                                                placeholder="{{ __('translate.Enter development password') }}" required>
                                        </div>

                                        <div class="d-grid gap-2">
                                            <button type="submit" class="crancy-btn crancy-btn__filter">
                                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M13 7H5C3.89543 7 3 7.89543 3 9V15C3 16.1046 3.89543 17 5 17H19C20.1046 17 21 16.1046 21 15M9 15V13M9 11V13M9 13V15"
                                                        stroke="white" stroke-width="1.5" stroke-linecap="round" />
                                                </svg>
                                                {{ __('translate.Access Development Section') }}
                                            </button>
                                            <a href="{{ route('admin.dashboard') }}"
                                                class="btn btn-outline-secondary">{{ __('translate.Back to Dashboard') }}</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection