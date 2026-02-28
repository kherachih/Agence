@extends('admin.master_layout')
@section('title')
<title>{{ __('translate.Create Promotion') }}</title>
@endsection
@section('body-header')
<h3 class="crancy-header__title m-0">{{ __('translate.Create Promotion') }}</h3>
<p class="crancy-header__text">{{ __('translate.Manage Content') }} >> {{ __('translate.Promotions') }} >> {{ __('translate.Create') }}</p>
@endsection
@section('body-content')

<section class="crancy-adashboard crancy-show">
    <div class="container container__bscreen">
        <div class="row">
            <div class="col-12">
                <div class="crancy-body">
                    <div class="crancy-dsinner">
                        <div class="crancy-table crancy-table--v3 mg-top-30">
                            <form action="{{ route('admin.promotion.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="crancy-table__inner">
                                            <h4 class="crancy-product-card__title mb-4">{{ __('translate.Promotion Details') }}</h4>

                                            <!-- Title -->
                                            <div class="crancy-form__box mb-3">
                                                <label class="crancy-form__label">{{ __('translate.Title') }} <span class="text-danger">*</span></label>
                                                <div class="crancy-form__input">
                                                    <input type="text" name="title" class="crancy-form__control" value="{{ old('title') }}" placeholder="{{ __('translate.e.g. Summer Sale') }}" required>
                                                </div>
                                                @error('title')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <!-- Message -->
                                            <div class="crancy-form__box mb-3">
                                                <label class="crancy-form__label">{{ __('translate.Message') }} <span class="text-danger">*</span></label>
                                                <div class="crancy-form__input">
                                                    <textarea name="message" class="crancy-form__control" rows="3" placeholder="{{ __('translate.Enter the promotional message that will scroll across the bar') }}" required>{{ old('message') }}</textarea>
                                                </div>
                                                @error('message')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <!-- Link URL -->
                                            <div class="crancy-form__box mb-3">
                                                <label class="crancy-form__label">{{ __('translate.Link URL') }}</label>
                                                <div class="crancy-form__input">
                                                    <input type="url" name="link_url" class="crancy-form__control" value="{{ old('link_url') }}" placeholder="{{ __('translate.e.g. https://example.com/promotion') }}">
                                                    <small class="text-muted">{{ __('translate.URL to redirect when the promotion bar is clicked (optional)') }}</small>
                                                </div>
                                                @error('link_url')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <!-- Link Text -->
                                            <div class="crancy-form__box mb-3">
                                                <label class="crancy-form__label">{{ __('translate.Link Text') }}</label>
                                                <div class="crancy-form__input">
                                                    <input type="text" name="link_text" class="crancy-form__control" value="{{ old('link_text') }}" placeholder="{{ __('translate.e.g. Shop Now') }}">
                                                    <small class="text-muted">{{ __('translate.Text to display as a call-to-action button (optional)') }}</small>
                                                </div>
                                                @error('link_text')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="crancy-table__inner">
                                            <h4 class="crancy-product-card__title mb-4">{{ __('translate.Settings') }}</h4>

                                            <!-- Background Color -->
                                            <div class="crancy-form__box mb-3">
                                                <label class="crancy-form__label">{{ __('translate.Background Color') }}</label>
                                                <div class="crancy-form__input d-flex align-items-center gap-2">
                                                    <input type="color" name="background_color" class="form-control form-control-color" value="{{ old('background_color', '#dc3545') }}" style="width: 50px; height: 40px;">
                                                    <span class="text-muted">{{ __('translate.Bar background color') }}</span>
                                                </div>
                                                @error('background_color')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <!-- Text Color -->
                                            <div class="crancy-form__box mb-3">
                                                <label class="crancy-form__label">{{ __('translate.Text Color') }}</label>
                                                <div class="crancy-form__input d-flex align-items-center gap-2">
                                                    <input type="color" name="text_color" class="form-control form-control-color" value="{{ old('text_color', '#ffffff') }}" style="width: 50px; height: 40px;">
                                                    <span class="text-muted">{{ __('translate.Text color') }}</span>
                                                </div>
                                                @error('text_color')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <!-- Sort Order -->
                                            <div class="crancy-form__box mb-3">
                                                <label class="crancy-form__label">{{ __('translate.Sort Order') }}</label>
                                                <div class="crancy-form__input">
                                                    <input type="number" name="sort_order" class="crancy-form__control" value="{{ old('sort_order', 0) }}" placeholder="0">
                                                    <small class="text-muted">{{ __('translate.Lower numbers appear first') }}</small>
                                                </div>
                                                @error('sort_order')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <!-- Is Active -->
                                            <div class="crancy-form__box mb-3">
                                                <div class="crancy-form__checkbox">
                                                    <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                                                    <label for="is_active">{{ __('translate.Active') }}</label>
                                                    <p class="text-muted">{{ __('translate.Enable to show this promotion on the frontend') }}</p>
                                                </div>
                                            </div>

                                            <!-- Submit Button -->
                                            <div class="crancy-form__box mt-4">
                                                <button type="submit" class="crancy-btn crancy-btn__success w-100">
                                                    <i class="fas fa-save"></i> {{ __('translate.Save Promotion') }}
                                                </button>
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
    </div>
</section>

@endsection
