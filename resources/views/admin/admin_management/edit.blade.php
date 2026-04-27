@extends('admin.master_layout')
@section('title')
    <title>{{ $title }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ $title }}</h3>
    <p class="crancy-header__text">{{ __('translate.Manage Admin') }} >> {{ $title }}</p>
@endsection

@section('body-content')
    <section class="crancy-adashboard crancy-show">
        <div class="container container__bscreen">
            <div class="row">
                <div class="col-12">
                    <div class="crancy-body">
                        <div class="crancy-dsinner">
                            <form action="{{ route('admin.admin-management.update', $admin->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-12 mg-top-30">
                                        <div class="crancy-product-card">
                                            <div class="create_new_btn_inline_box">
                                                <h4 class="crancy-product-card__title">{{ __('translate.Admin Information') }}</h4>
                                                <a href="{{ route('admin.admin-management.index') }}" class="crancy-btn"><i class="fa fa-list"></i> {{ __('translate.Admin List') }}</a>
                                            </div>

                                            <div class="row mg-top-30">
                                                <div class="col-lg-6 col-md-6 col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('translate.Name') }} *</label>
                                                        <input class="crancy__item-input" type="text" name="name" value="{{ old('name', $admin->name) }}" required>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6 col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('translate.Email') }} *</label>
                                                        <input class="crancy__item-input" type="email" name="email" value="{{ old('email', $admin->email) }}" required>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6 col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('translate.Password') }} ({{ __('translate.Leave blank to keep current') }})</label>
                                                        <input class="crancy__item-input" type="password" name="password">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6 col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('translate.Confirm Password') }}</label>
                                                        <input class="crancy__item-input" type="password" name="password_confirmation">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6 col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('translate.Role') }} *</label>
                                                        <select class="crancy__item-input" name="admin_type" required>
                                                            <option value="super_admin" {{ old('admin_type', $admin->admin_type) == 'super_admin' ? 'selected' : '' }}>{{ __('translate.Super Admin') }}</option>
                                                            <option value="marketing" {{ old('admin_type', $admin->admin_type) == 'marketing' ? 'selected' : '' }}>{{ __('translate.Marketing') }}</option>
                                                            <option value="support" {{ old('admin_type', $admin->admin_type) == 'support' ? 'selected' : '' }}>{{ __('translate.Support') }}</option>
                                                            <option value="admin" {{ old('admin_type', $admin->admin_type) == 'admin' ? 'selected' : '' }}>{{ __('translate.Admin') }}</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6 col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('translate.Status') }} *</label>
                                                        <select class="crancy__item-input" name="status" required>
                                                            <option value="enable" {{ old('status', $admin->status) == 'enable' ? 'selected' : '' }}>{{ __('translate.Active') }}</option>
                                                            <option value="disable" {{ old('status', $admin->status) == 'disable' ? 'selected' : '' }}>{{ __('translate.Inactive') }}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mg-top-30">
                                                <div class="col-12">
                                                    <button class="crancy-btn" type="submit">{{ __('translate.Update') }}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
