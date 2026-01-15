@extends('admin.master_layout')
@section('title')
    <title>{{ __('translate.Agency Applications') }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('translate.Agency Applications') }}</h3>
    <p class="crancy-header__text">{{ __('translate.Manage') }} >> {{ __('translate.Agency Applications') }}</p>
@endsection

@section('body-content')
    <!-- crancy Dashboard -->
    <section class="crancy-adashboard crancy-show">
        <div class="container container__bscreen">
            <div class="row">
                <div class="col-12">
                    <div class="crancy-body">
                        <div class="crancy-dsinner">

                            <!-- Statistics Cards -->
                            <div class="row mg-top-30">
                                <div class="col-md-3">
                                    <div class="card text-center">
                                        <div class="card-body">
                                            <h4 class="text-warning">{{ $pending_count }}</h4>
                                            <p class="mb-0">{{ __('translate.Pending') }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card text-center">
                                        <div class="card-body">
                                            <h4 class="text-success">{{ $approved_count }}</h4>
                                            <p class="mb-0">{{ __('translate.Approved') }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card text-center">
                                        <div class="card-body">
                                            <h4 class="text-danger">{{ $rejected_count }}</h4>
                                            <p class="mb-0">{{ __('translate.Rejected') }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card text-center">
                                        <div class="card-body">
                                            <h4 class="text-primary">{{ $applications->total() }}</h4>
                                            <p class="mb-0">{{ __('translate.Total') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="crancy-table crancy-table--v3 mg-top-30">

                                <div class="crancy-customer-filter">
                                    <div
                                        class="crancy-customer-filter__single crancy-customer-filter__single--csearch d-flex items-center justify-between create_new_btn_box">
                                        <div
                                            class="crancy-header__form crancy-header__form--customer create_new_btn_inline_box">
                                            <h4 class="crancy-product-card__title">
                                                {{ __('translate.Agency Applications List') }}</h4>
                                        </div>
                                        <div class="crancy-header__form crancy-header__form--customer">
                                            <form action="{{ route('admin.agency-applications.index') }}" method="GET">
                                                <select name="status" class="form-control" onchange="this.form.submit()">
                                                    <option value="all" {{ request('status') == 'all' ? 'selected' : '' }}>
                                                        {{ __('translate.All') }}</option>
                                                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>{{ __('translate.Pending') }}</option>
                                                    <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>{{ __('translate.Approved') }}</option>
                                                    <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>{{ __('translate.Rejected') }}</option>
                                                </select>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- crancy Table -->
                                <div id="crancy-table__main_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">

                                    <table class="crancy-table__main crancy-table__main-v3 dataTable no-footer">
                                        <!-- crancy Table Head -->
                                        <thead class="crancy-table__head">
                                            <tr>
                                                <th class="crancy-table__column-2 crancy-table__h2">
                                                    {{ __('translate.Serial') }}
                                                </th>

                                                <th class="crancy-table__column-2 crancy-table__h2">
                                                    {{ __('translate.Agency Name') }}
                                                </th>

                                                <th class="crancy-table__column-2 crancy-table__h2">
                                                    {{ __('translate.Email') }}
                                                </th>

                                                <th class="crancy-table__column-2 crancy-table__h2">
                                                    {{ __('translate.Location') }}
                                                </th>

                                                <th class="crancy-table__column-2 crancy-table__h2">
                                                    {{ __('translate.Submission Date') }}
                                                </th>

                                                <th class="crancy-table__column-2 crancy-table__h2">
                                                    {{ __('translate.Status') }}
                                                </th>

                                                <th class="crancy-table__column-3 crancy-table__h3">
                                                    {{ __('translate.Action') }}
                                                </th>

                                            </tr>
                                        </thead>
                                        <!-- crancy Table Body -->
                                        <tbody class="crancy-table__body">
                                            @forelse ($applications as $index => $application)
                                                <tr class="odd">

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">
                                                            {{ $applications->firstItem() + $index }}</h4>
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">
                                                            <a
                                                                href="{{ route('admin.agency-applications.show', $application->id) }}">
                                                                {{ html_decode($application->agency_name) }}
                                                            </a>
                                                        </h4>
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">{{ $application->email }}</h4>
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">
                                                            {{ $application->city }}, {{ $application->state }},
                                                            {{ $application->country }}
                                                        </h4>
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">
                                                            {{ $application->created_at->format('d M Y') }}</h4>
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        @if ($application->status == 'approved')
                                                            <span class="badge bg-success">{{ __('translate.Approved') }}</span>
                                                        @elseif ($application->status == 'rejected')
                                                            <span class="badge bg-danger">{{ __('translate.Rejected') }}</span>
                                                        @else
                                                            <span class="badge bg-warning">{{ __('translate.Pending') }}</span>
                                                        @endif
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <a href="{{ route('admin.agency-applications.show', $application->id) }}"
                                                            class="crancy-btn">
                                                            <i class="fas fa-eye"></i> {{ __('translate.View Details') }}
                                                        </a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="7" class="text-center">
                                                        {{ __('translate.No applications found') }}</td>
                                                </tr>
                                            @endforelse

                                        </tbody>
                                        <!-- End crancy Table Body -->
                                    </table>

                                    <!-- Pagination -->
                                    <div class="crancy-table-bottom">
                                        <div class="dataTables_info">
                                            {{ __('translate.Showing') }} {{ $applications->firstItem() }}
                                            {{ __('translate.to') }} {{ $applications->lastItem() }}
                                            {{ __('translate.of') }} {{ $applications->total() }}
                                            {{ __('translate.entries') }}
                                        </div>
                                        <div class="dataTables_paginate">
                                            {{ $applications->links() }}
                                        </div>
                                    </div>

                                </div>
                                <!-- End crancy Table -->
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End crancy Dashboard -->

@endsection