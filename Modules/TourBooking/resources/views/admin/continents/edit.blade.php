@extends('admin.master_layout')
@section('title')
    <title>{{ __('translate.Edit Continent') }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('translate.Edit Continent') }}</h3>
    <p class="crancy-header__text">{{ __('translate.Tour Booking') }} >> {{ __('translate.Edit Continent') }}</p>
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
                                    <div class="crancy-header__form crancy-header__form--customer create_new_btn_inline_box">
                                        <h4 class="crancy-product-card__title">{{ __('translate.Edit Continent') }}</h4>
                                        <a href="{{ route('admin.tourbooking.continents.index') }}" class="crancy-btn">
                                            <i class="fa fa-arrow-left"></i> {{ __('translate.Back') }}
                                        </a>
                                    </div>
                                </div>

                                <form action="{{ route('admin.tourbooking.continents.update', $continent) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="name">{{ __('translate.Name') }} <span class="text-danger">*</span></label>
                                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                                                    value="{{ old('name', $continent->name) }}" required>
                                                @error('name')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="slug">{{ __('translate.Slug') }} <span class="text-danger">*</span></label>
                                                <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror"
                                                    value="{{ old('slug', $continent->slug) }}" required>
                                                @error('slug')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="code">{{ __('translate.Code') }}</label>
                                                <input type="text" name="code" id="code" class="form-control @error('code') is-invalid @enderror"
                                                    value="{{ old('code', $continent->code) }}" maxlength="10">
                                                @error('code')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="icon">{{ __('translate.Icon') }} (Font Awesome Class)</label>
                                                <input type="text" name="icon" id="icon" class="form-control @error('icon') is-invalid @enderror"
                                                    value="{{ old('icon', $continent->icon) }}" placeholder="fas fa-globe-europe">
                                                @error('icon')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="ordering">{{ __('translate.Ordering') }}</label>
                                                <input type="number" name="ordering" id="ordering" class="form-control @error('ordering') is-invalid @enderror"
                                                    value="{{ old('ordering', $continent->ordering) }}" min="0">
                                                @error('ordering')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="image">{{ __('translate.Image') }}</label>
                                                <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror"
                                                    accept="image/*">
                                                @if($continent->image)
                                                    <div class="mt-2">
                                                        <img src="{{ asset('storage/' . $continent->image) }}" alt="{{ $continent->name }}" class="img-thumbnail" width="100">
                                                    </div>
                                                @endif
                                                @error('image')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group mb-3">
                                                <label for="description">{{ __('translate.Description') }}</label>
                                                <textarea name="description" id="description" rows="4" class="form-control @error('description') is-invalid @enderror">{{ old('description', $continent->description) }}</textarea>
                                                @error('description')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group mb-3">
                                                <div class="form-check">
                                                    <input type="checkbox" name="status" id="status" class="form-check-input" value="1" {{ $continent->status ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="status">{{ __('translate.Active') }}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="crancy-btn">
                                            <i class="fa fa-save"></i> {{ __('translate.Update Continent') }}
                                        </button>
                                    </div>
                                </form>
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
        "use strict"

        // Auto-generate slug from name (only if slug is empty)
        document.getElementById('name').addEventListener('input', function() {
            const slugField = document.getElementById('slug');
            if (slugField.value === '') {
                const name = this.value;
                const slug = name.toLowerCase()
                    .replace(/[^a-z0-9]+/g, '-')
                    .replace(/(^-|-$)/g, '');
                slugField.value = slug;
            }
        });
    </script>
@endpush
