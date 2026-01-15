@extends('admin.master_layout')
@section('title')
    <title>{{ __('translate.Development Settings') }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('translate.Development Settings') }}</h3>
    <p class="crancy-header__text">{{ __('translate.Dashboard') }} >> {{ __('translate.Development Settings') }}</p>
@endsection

@section('body-content')
    <section class="crancy-adashboard crancy-show">
        <div class="container container__bscreen">
            <div class="row">
                <div class="col-12">
                    <div class="crancy-body">
                        <div class="crancy-dsinner">

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

                            <!-- Menu Visibility Management -->
                            <div class="crancy-table crancy-table--v3 mg-top-30">
                                <div class="crancy-customer-filter">
                                    <div
                                        class="crancy-customer-filter__single crancy-customer-filter__single--csearch d-flex items-center justify-between">
                                        <div class="crancy-header__form crancy-header__form--customer">
                                            <h4 class="crancy-product-card__title">
                                                {{ __('translate.Menu Visibility Management') }}
                                            </h4>
                                            <p class="text-muted">{{ __('translate.Toggle menu sections visibility') }}</p>
                                        </div>
                                        <div>
                                            <a href="{{ route('admin.development.logout') }}"
                                                class="crancy-btn crancy-btn__filter crancy-btn--outline">
                                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M19 11L20.2929 9.70711C20.6834 9.31658 20.6834 8.68342 20.2929 8.29289L19 7"
                                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path
                                                        d="M20 9H12M5 17C2.79086 17 1 15.2091 1 13V5C1 2.79086 2.79086 1 5 1M5 17C7.20914 17 9 15.2091 9 13V5C9 2.79086 7.20914 1 5 1M5 17H13C15.2091 17 17 15.2091 17 13M5 1H13C15.2091 1 17 2.79086 17 5"
                                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                </svg>
                                                {{ __('translate.Exit Development Mode') }}
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="crancy-table-tab-1" role="tabpanel">
                                        <table class="crancy-table__main crancy-table__main-v3">
                                            <thead class="crancy-table__head">
                                                <tr>
                                                    <th class="crancy-table__column-1 crancy-table__h1">
                                                        {{ __('translate.Menu Section') }}
                                                    </th>
                                                    <th class="crancy-table__column-2 crancy-table__h2">
                                                        {{ __('translate.Menu Key') }}
                                                    </th>
                                                    <th class="crancy-table__column-3 crancy-table__h3">
                                                        {{ __('translate.Status') }}
                                                    </th>
                                                    <th class="crancy-table__column-4 crancy-table__h4">
                                                        {{ __('translate.Action') }}
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="crancy-table__body">
                                                @forelse ($menus as $menu)
                                                    <tr>
                                                        <td class="crancy-table__column-1 crancy-table__data-1">
                                                            <strong>{{ $menu->menu_label }}</strong>
                                                        </td>
                                                        <td class="crancy-table__column-2 crancy-table__data-2">
                                                            <code>{{ $menu->menu_key }}</code>
                                                        </td>
                                                        <td class="crancy-table__column-3 crancy-table__data-3">
                                                            @if ($menu->is_enabled)
                                                                <span
                                                                    class="crancy-badge crancy-table__status--paid">{{ __('translate.Enabled') }}</span>
                                                            @else
                                                                <span
                                                                    class="crancy-badge crancy-table__status--cancel">{{ __('translate.Disabled') }}</span>
                                                            @endif
                                                        </td>
                                                        <td class="crancy-table__column-4 crancy-table__data-4">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input menu-toggle-switch"
                                                                    type="checkbox" data-menu-key="{{ $menu->menu_key }}"
                                                                    {{ $menu->is_enabled ? 'checked' : '' }}>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="4" class="text-center">
                                                            {{ __('translate.No menu settings found') }}
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- Change Password Section -->
                            <div class="crancy-table crancy-table--v3 mg-top-30">
                                <div class="crancy-customer-filter">
                                    <div class="crancy-customer-filter__single crancy-customer-filter__single--csearch">
                                        <div class="crancy-header__form crancy-header__form--customer">
                                            <h4 class="crancy-product-card__title">
                                                {{ __('translate.Change Development Password') }}
                                            </h4>
                                        </div>
                                    </div>
                                </div>

                                <div class="crancy-table__main p-4">
                                    <form action="{{ route('admin.development.update-password') }}" method="POST"
                                        class="row g-3">
                                        @csrf
                                        <div class="col-md-4">
                                            <label for="current_password"
                                                class="form-label">{{ __('translate.Current Password') }}</label>
                                            <input type="password" class="form-control" id="current_password"
                                                name="current_password" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="new_password"
                                                class="form-label">{{ __('translate.New Password') }}</label>
                                            <input type="password" class="form-control" id="new_password"
                                                name="new_password" required minlength="8">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="new_password_confirmation"
                                                class="form-label">{{ __('translate.Confirm New Password') }}</label>
                                            <input type="password" class="form-control" id="new_password_confirmation"
                                                name="new_password_confirmation" required minlength="8">
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="crancy-btn crancy-btn__filter">
                                                {{ __('translate.Update Password') }}
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- Access Logs -->
                            <div class="crancy-table crancy-table--v3 mg-top-30">
                                <div class="crancy-customer-filter">
                                    <div class="crancy-customer-filter__single crancy-customer-filter__single--csearch">
                                        <div class="crancy-header__form crancy-header__form--customer">
                                            <h4 class="crancy-product-card__title">{{ __('translate.Recent Access Logs') }}
                                            </h4>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="crancy-table-tab-2" role="tabpanel">
                                        <table class="crancy-table__main crancy-table__main-v3">
                                            <thead class="crancy-table__head">
                                                <tr>
                                                    <th class="crancy-table__column-1 crancy-table__h1">
                                                        {{ __('translate.Admin') }}
                                                    </th>
                                                    <th class="crancy-table__column-2 crancy-table__h2">
                                                        {{ __('translate.Action') }}
                                                    </th>
                                                    <th class="crancy-table__column-3 crancy-table__h3">
                                                        {{ __('translate.IP Address') }}
                                                    </th>
                                                    <th class="crancy-table__column-4 crancy-table__h4">
                                                        {{ __('translate.Time') }}
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="crancy-table__body">
                                                @forelse ($recentLogs as $log)
                                                    <tr>
                                                        <td class="crancy-table__column-1 crancy-table__data-1">
                                                            {{ $log->admin->name ?? 'N/A' }}
                                                        </td>
                                                        <td class="crancy-table__column-2 crancy-table__data-2">
                                                            {{ $log->action }}
                                                        </td>
                                                        <td class="crancy-table__column-3 crancy-table__data-3">
                                                            {{ $log->ip_address }}
                                                        </td>
                                                        <td class="crancy-table__column-4 crancy-table__data-4">
                                                            {{ $log->created_at->format('Y-m-d H:i:s') }}
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="4" class="text-center">
                                                            {{ __('translate.No logs found') }}
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
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

@push('js_section')
    <script>
        "use strict";
        $(document).ready(function() {
            // Handle menu toggle
            $('.menu-toggle-switch').change(function() {
                const menuKey = $(this).data('menu-key');
                const toggleSwitch = $(this);

                $.ajax({
                    url: '{{ route('admin.development.toggle-menu') }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        menu_key: menuKey
                    },
                    success: function(response) {
                        if (response.success) {
                            toastr.success(response.message);
                        }
                    },
                    error: function(xhr) {
                        toastr.error('{{ __('translate.An error occurred') }}');
                        // Revert the toggle
                        toggleSwitch.prop('checked', !toggleSwitch.prop('checked'));
                    }
                });
            });
        });
    </script>
@endpush
