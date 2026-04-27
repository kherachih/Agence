@extends('admin.master_layout')
@section('title')
    <title>{{ __('translate.Create Service') }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('translate.Create Service') }}</h3>
    <p class="crancy-header__text">{{ __('translate.Tour Booking') }} >> {{ __('translate.Create Service') }}</p>
@endsection

@push('style_section')
    <link rel="stylesheet" href="{{ asset('global/select2/select2.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <style>
        /* Currency Input Field Styling */
        .crancy__item-form--currency {
            position: relative;
            display: flex;
            align-items: center;
        }

        .crancy__item-form--currency .crancy__item-input {
            width: 100%;
            padding-right: 40px;
            /* Add space for the currency icon */
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 10px 40px 10px 12px;
            font-size: 14px;
            outline: none;
            transition: border-color 0.3s ease;
        }

        .crancy__item-form--currency .crancy__item-input:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        .crancy__currency-icon {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            pointer-events: none;
            /* Prevents icon from interfering with input clicks */
            z-index: 2;
        }

        .crancy__currency-icon span {
            font-size: 14px;
            color: #666;
            font-weight: 500;
        }

        /* Optional: Style for better visual hierarchy */
        .crancy__item-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #333;
        }

        .mg-top-form-20 {
            margin-top: 20px;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .crancy__item-form--currency .crancy__item-input {
                padding-right: 35px;
            }

            .crancy__currency-icon {
                right: 10px;
            }

            .crancy__currency-icon span {
                font-size: 13px;
            }
        }
    </style>
@endpush



@section('body-content')
    <section class="crancy-adashboard crancy-show">
        <div class="container container__bscreen">
            <div class="row">
                <div class="col-12">
                    <div class="crancy-body">
                        <div class="crancy-dsinner">
                            <form action="{{ route('admin.tourbooking.services.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12 mg-top-30">
                                        <div class="crancy-product-card">
                                            <div class="create_new_btn_inline_box">
                                                <h4 class="crancy-product-card__title">
                                                    {{ __('translate.Basic Information') }}</h4>
                                                <a href="{{ route('admin.tourbooking.services.index') }}"
                                                    class="crancy-btn"><i class="fa fa-list"></i>
                                                    {{ __('translate.Service List') }}</a>
                                            </div>

                                            <div class="row mg-top-30">
                                                <div class="col-lg-6 col-md-6 col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('translate.Title') }}
                                                            *</label>
                                                        <input class="crancy__item-input" type="text" name="title"
                                                            id="title" value="{{ old('title') }}" required>
                                                        @error('title')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6 col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label">{{ __('translate.Slug') }}</label>
                                                        <input class="crancy__item-input" type="text" name="slug"
                                                            id="slug" value="{{ old('slug') }}">
                                                        @error('slug')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-md-6 col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label">{{ __('translate.Service Type') }}
                                                            *</label>
                                                        <select class="crancy__item-input" name="service_type_id" required>
                                                            <option value="">{{ __('translate.Select Type') }}
                                                            </option>
                                                            @foreach ($serviceTypes as $type)
                                                                <option value="{{ $type->id }}"
                                                                    {{ old('service_type_id') == $type->id ? 'selected' : '' }}>
                                                                    {{ $type->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('service_type_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-md-6 col-12">
                                                     <div class="crancy__item-form--group mg-top-form-20">
                                                         <label
                                                             class="crancy__item-label">{{ __('translate.Select Destinations') }}</label>
                                                         <select class="crancy__item-input select2" name="destination_ids[]" multiple required>
                                                             @foreach ($destinations as $destination)
                                                                 <option value="{{ $destination->id }}"
                                                                     {{ (is_array(old('destination_ids')) && in_array($destination->id, old('destination_ids'))) ? 'selected' : '' }}>
                                                                     {{ $destination->name }}
                                                                 </option>
                                                             @endforeach
                                                         </select>
                                                         @error('destination_ids')
                                                             <span class="text-danger">{{ $message }}</span>
                                                         @enderror
                                                     </div>
                                                 </div>

                                                <div class="col-lg-4 col-md-6 col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label">{{ __('translate.Location') }}</label>
                                                        <input class="crancy__item-input" type="text" name="location"
                                                            value="{{ old('location') }}">
                                                        @error('location')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label">{{ __('translate.Map Image') }}</label>
                                                        <input class="crancy__item-input" type="file" name="map_image" accept="image/*">
                                                        @error('map_image')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6 col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label">{{ __('translate.Duration') }}</label>
                                                        <input class="crancy__item-input" type="text" name="duration"
                                                            value="{{ old('duration') }}"
                                                            placeholder="e.g. 3 hours, 2 days">
                                                        @error('duration')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6 col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label">{{ __('translate.Group Size') }}</label>
                                                        <input class="crancy__item-input" type="text" name="group_size"
                                                            value="{{ old('group_size') }}"
                                                            placeholder="e.g. Up to 10 people">
                                                        @error('group_size')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-md-6 col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label">{{ __('translate.Age range') }}</label>
                                                        <input class="crancy__item-input" type="text" name="age_range"
                                                            value="{{ old('age_range') }}"
                                                            placeholder="e.g. 18-99">
                                                        @error('age_range')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>


                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label">{{ __('translate.Short Description') }}</label>
                                                        <textarea class="crancy__item-input summernote" name="short_description" rows="8">{{ old('short_description') }}</textarea>
                                                        @error('short_description')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label">{{ __('translate.Description') }}</label>
                                                        <textarea class="crancy__item-input summernote" name="description" rows="15">{{ old('description') }}</textarea>
                                                        @error('description')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label">{{ __('translate.Status') }}</label>
                                                        <div
                                                            class="crancy-ptabs__notify-switch crancy-ptabs__notify-switch--two">
                                                            <label class="crancy__item-switch">
                                                                <input name="status" type="checkbox" checked
                                                                    value="1">
                                                                <span
                                                                    class="crancy__item-switch--slide crancy__item-switch--round"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 mg-top-30">
                                        <div class="crancy-product-card">
                                            <h4 class="crancy-product-card__title">
                                                {{ __('translate.Good to know') }}
                                            </h4>

                                            <div class="row mg-top-30">
                                                <div class="col-12">
                                                    <div class="alert alert-info mb-20">
                                                        <i class="fa fa-info-circle"></i>
                                                        {{ __('translate.Add country-specific information such as currency, plugs, and vaccines.') }}
                                                    </div>
                                                </div>

                                                <div class="col-12" id="good-to-know-container">
                                                    <div class="country-info-item mb-4 pb-4 border-bottom" data-index="0">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-12">
                                                                <div class="crancy__item-form--group mg-top-form-20">
                                                                    <label class="crancy__item-label">{{ __('translate.Currency') }}</label>
                                                                    <input class="crancy__item-input" type="text" name="good_to_know[0][currency]" placeholder="e.g. Euro">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-12">
                                                                <div class="crancy__item-form--group mg-top-form-20">
                                                                    <label class="crancy__item-label">{{ __('translate.Prises et adaptateurs') }}</label>
                                                                    <input class="crancy__item-input" type="text" name="good_to_know[0][plugs]" placeholder="e.g. Type C, E">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-12">
                                                                <div class="crancy__item-form--group mg-top-form-20">
                                                                    <label class="crancy__item-label">{{ __('translate.Vaccines') }}</label>
                                                                    <input class="crancy__item-input" type="text" name="good_to_know[0][vaccines]" placeholder="e.g. Hepatite A">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-12">
                                                                <div class="crancy__item-form--group mg-top-form-20">
                                                                    <label class="crancy__item-label">{{ __('translate.Payment Information') }}</label>
                                                                    <input class="crancy__item-input" type="text" name="good_to_know[0][payment]" placeholder="e.g. Cards accepted">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12 mg-top-20">
                                                    <button type="button" class="crancy-btn" id="add-country-info">
                                                        <i class="fa fa-plus"></i> {{ __('translate.Add Country Info') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 mg-top-30">
                                            <div class="crancy-product-card">
                                                <h4 class="crancy-product-card__title">
                                                    {{ __('translate.Room Types') }}
                                                </h4>
    
                                                <div class="row mg-top-30">
                                                    <div class="col-12">
                                                        <div class="alert alert-info mb-20">
                                                            <i class="fa fa-info-circle"></i>
                                                            {{ __('translate.Configure room types with price supplements for this service.') }}
                                                        </div>
                                                    </div>
    
                                                    <div class="col-12" id="room-types-container">
                                                        <div class="room-type-item" data-index="0">
                                                            <div class="row">
                                                                <div class="col-lg-3 col-md-6 col-12">
                                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                                        <label class="crancy__item-label">{{ __('translate.Room Type') }}</label>
                                                                        <select class="crancy__item-input room-type-select" name="room_types[0][type]" required>
                                                                            <option value="">{{ __('translate.Select Type') }}</option>
                                                                            <option value="single">{{ __('translate.Single Room') }}</option>
                                                                            <option value="double">{{ __('translate.Double Room') }}</option>
                                                                            <option value="triple">{{ __('translate.Triple Room') }}</option>
                                                                            <option value="double_shared">{{ __('translate.Double Room (Shared)') }}</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
    
                                                                <div class="col-lg-3 col-md-6 col-12">
                                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                                        <label class="crancy__item-label">{{ __('translate.Price Supplement') }}</label>
                                                                        <div class="crancy__item-form--currency">
                                                                            <input class="crancy__item-input room-type-supplement" type="number" step="0.01" name="room_types[0][price_supplement]" value="0">
                                                                            <div class="crancy__currency-icon">
                                                                                <span>{{ config('settings.currency_icon', '$') }}</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
    
                                                                <div class="col-lg-3 col-md-6 col-12">
                                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                                        <label class="crancy__item-label">{{ __('translate.Capacity') }}</label>
                                                                        <input class="crancy__item-input room-type-capacity" type="number" name="room_types[0][capacity]" value="1" min="1">
                                                                    </div>
                                                                </div>
    
                                                                <div class="col-lg-3 col-md-6 col-12">
                                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                                        <label class="crancy__item-label">{{ __('translate.Status') }}</label>
                                                                        <div class="crancy-ptabs__notify-switch crancy-ptabs__notify-switch--two">
                                                                            <label class="crancy__item-switch">
                                                                                <input type="checkbox" name="room_types[0][is_active]" value="1" checked>
                                                                                <span class="crancy__item-switch--slide crancy__item-switch--round"></span>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
    
                                                                <div class="col-12">
                                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                                        <label class="crancy__item-label">{{ __('translate.Description') }}</label>
                                                                        <textarea class="crancy__item-input room-type-description" name="room_types[0][description]" rows="3" placeholder="Optional description for this room type"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
    
                                                    <div class="col-12 mg-top-20">
                                                        <button type="button" class="crancy-btn" id="add-room-type">
                                                            <i class="fa fa-plus"></i> {{ __('translate.Add Room Type') }}
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 mg-top-30">
                                        <div class="crancy-product-card">
                                            <h4 class="crancy-product-card__title">
                                                {{ __('translate.Additional Information') }}</h4>

                                            <div class="row mg-top-30">

                                                <div class="col-lg-6 col-md-6 col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label">{{ __('translate.Ticket') }}</label>
                                                        <input class="crancy__item-input" type="text" name="ticket"
                                                            value="{{ old('ticket') }}"
                                                            placeholder="e.g. Mobile Voucher or Printed Ticket">
                                                        @error('ticket')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6 col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label">{{ __('translate.Video URL') }}</label>
                                                        <input class="crancy__item-input" type="text" name="video_url"
                                                            value="{{ old('video_url') }}"
                                                            placeholder="YouTube or Vimeo URL">
                                                        @error('video_url')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6 col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label">{{ __('translate.Languages') }}</label>
                                                        <select class="crancy__item-input select2" name="languages[]"
                                                            multiple>
                                                            @foreach ($enum_languages as $key => $language)
                                                                <option value="{{ $language->name }}">
                                                                    {{ $language->value }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6 col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label">{{ __('translate.Amenities') }}</label>
                                                        <select class="crancy__item-input select2" name="amenities[]"
                                                            multiple>
                                                            @foreach ($amenities as $key => $amenity)
                                                                <option value="{{ $amenity->translation->id }}">
                                                                    {{ $amenity->translation->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-12 mg-top-30">
                                                    <h4 class="crancy-product-card__title">{{ __('translate.Included') }}</h4>
                                                    <div id="included-container">
                                                        <div class="included-item mb-4 pb-4 border-bottom" data-index="0">
                                                            <div class="row">
                                                                <div class="col-lg-3 col-12">
                                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                                        <label class="crancy__item-label">{{ __('translate.Category') }}</label>
                                                                        <select class="crancy__item-input category-select" name="included[0][category]">
                                                                            <option value="accommodation">{{ __('translate.Accommodation') }}</option>
                                                                            <option value="meals">{{ __('translate.Meals') }}</option>
                                                                            <option value="guide">{{ __('translate.Guide') }}</option>
                                                                            <option value="transport">{{ __('translate.Transport') }}</option>
                                                                            <option value="others" selected>{{ __('translate.Others') }}</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 col-12">
                                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                                        <label class="crancy__item-label">{{ __('translate.Title') }}</label>
                                                                        <input class="crancy__item-input" type="text" name="included[0][title]" placeholder="e.g. 7 Nights Accommodation">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-5 col-12">
                                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                                        <label class="crancy__item-label">{{ __('translate.Details') }}</label>
                                                                        <textarea class="crancy__item-input" name="included[0][details]" rows="2"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 dietary-options" style="display:none;">
                                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                                        <label class="crancy__item-label">{{ __('translate.Dietary Options') }}</label>
                                                                        <select class="crancy__item-input select2" name="included[0][dietary][]" multiple>
                                                                            <option value="Vegetarian">Vegetarian</option>
                                                                            <option value="Vegan">Vegan</option>
                                                                            <option value="Halal">Halal</option>
                                                                            <option value="Gluten-Free">Gluten-Free</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="button" class="crancy-btn" id="add-included">
                                                        <i class="fa fa-plus"></i> {{ __('translate.Add Included') }}
                                                    </button>
                                                </div>

                                                <div class="col-12 mg-top-30">
                                                    <h4 class="crancy-product-card__title">{{ __('translate.Excluded') }}</h4>
                                                    <div id="excluded-container">
                                                        <div class="excluded-item mb-4 pb-4 border-bottom" data-index="0">
                                                            <div class="row">
                                                                <div class="col-lg-3 col-12">
                                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                                        <label class="crancy__item-label">{{ __('translate.Category') }}</label>
                                                                        <select class="crancy__item-input" name="excluded[0][category]">
                                                                            <option value="others" selected>{{ __('translate.Others') }}</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 col-12">
                                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                                        <label class="crancy__item-label">{{ __('translate.Title') }}</label>
                                                                        <input class="crancy__item-input" type="text" name="excluded[0][title]" placeholder="e.g. Flights">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-5 col-12">
                                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                                        <label class="crancy__item-label">{{ __('translate.Details') }}</label>
                                                                        <textarea class="crancy__item-input" name="excluded[0][details]" rows="2"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="button" class="crancy-btn" id="add-excluded">
                                                        <i class="fa fa-plus"></i> {{ __('translate.Add Excluded') }}
                                                    </button>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label">{{ __('translate.Tour Plan Sub Title') }}</label>
                                                        <input class="crancy__item-input" type="text"
                                                            name="tour_plan_sub_title"
                                                            value="{{ old('tour_plan_sub_title') }}"
                                                            placeholder="Tour Plan Sub Title">
                                                        @error('tour_plan_sub_title')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-12 mg-top-30">
                                        <div class="crancy-product-card">
                                            <h4 class="crancy-product-card__title">{{ __('translate.SEO Information') }}
                                            </h4>

                                            <div class="row mg-top-30">
                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label">{{ __('translate.SEO Title') }}</label>
                                                        <input class="crancy__item-input" type="text" name="seo_title"
                                                            value="{{ old('seo_title') }}">
                                                        @error('seo_title')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label">{{ __('translate.SEO Description') }}</label>
                                                        <textarea class="crancy__item-input summernote" name="seo_description" rows="3">{{ old('seo_description') }}</textarea>
                                                        @error('seo_description')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label">{{ __('translate.SEO Keywords') }}</label>
                                                        <input class="crancy__item-input" type="text"
                                                            name="seo_keywords" value="{{ old('seo_keywords') }}"
                                                            placeholder="Comma separated keywords">
                                                        @error('seo_keywords')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 mg-top-30">
                                        <div class="crancy-product-card">
                                            <h4 class="crancy-product-card__title">{{ __('translate.Display Options') }}
                                            </h4>

                                            <div class="row mg-top-30">
                                                <div class="col-lg-3 col-md-4 col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label">{{ __('translate.Featured') }}</label>
                                                        <div
                                                            class="crancy-ptabs__notify-switch crancy-ptabs__notify-switch--two">
                                                            <label class="crancy__item-switch">
                                                                <input name="is_featured" type="checkbox"
                                                                    {{ old('is_featured') ? 'checked' : '' }}
                                                                    value="1">
                                                                <span
                                                                    class="crancy__item-switch--slide crancy__item-switch--round"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3 col-md-4 col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label">{{ __('translate.Popular') }}</label>
                                                        <div
                                                            class="crancy-ptabs__notify-switch crancy-ptabs__notify-switch--two">
                                                            <label class="crancy__item-switch">
                                                                <input name="is_popular" type="checkbox"
                                                                    {{ old('is_popular') ? 'checked' : '' }}
                                                                    value="1">
                                                                <span
                                                                    class="crancy__item-switch--slide crancy__item-switch--round"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3 col-md-4 col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label">{{ __('translate.Show on Homepage') }}</label>
                                                        <div
                                                            class="crancy-ptabs__notify-switch crancy-ptabs__notify-switch--two">
                                                            <label class="crancy__item-switch">
                                                                <input name="show_on_homepage" type="checkbox"
                                                                    {{ old('show_on_homepage') ? 'checked' : '' }}
                                                                    value="1">
                                                                <span
                                                                    class="crancy__item-switch--slide crancy__item-switch--round"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3 col-md-4 col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label">{{ __('translate.Is New') }}</label>
                                                        <div
                                                            class="crancy-ptabs__notify-switch crancy-ptabs__notify-switch--two">
                                                            <label class="crancy__item-switch">
                                                                <input checked name="is_new" type="checkbox"
                                                                    value="1">
                                                                <span
                                                                    class="crancy__item-switch--slide crancy__item-switch--round"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3 col-md-4 col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label">{{ __('translate.Guaranteed Departure') }}</label>
                                                        <div
                                                            class="crancy-ptabs__notify-switch crancy-ptabs__notify-switch--two">
                                                            <label class="crancy__item-switch">
                                                                <input name="guaranteed_departure" type="checkbox"
                                                                    value="1">
                                                                <span
                                                                    class="crancy__item-switch--slide crancy__item-switch--round"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 mg-top-30">
                                        <div class="alert alert-info">
                                            <i class="fa fa-info-circle"></i>
                                            {{ __('translate.After creating the service, you can upload images and videos from the Media Gallery section.') }}
                                        </div>
                                        <button class="crancy-btn"
                                            type="submit">{{ __('translate.Create Service') }}</button>
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

@push('js_section')
    <script src="{{ asset('global/select2/select2.min.js') }}"></script>
    <script src="{{ asset('global/tinymce/js/tinymce/tinymce.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        (function($) {
            "use strict"
            $(document).ready(function() {
                $("#title").on("keyup", function(e) {
                    let inputValue = $(this).val();
                    let slug = inputValue.toLowerCase().replace(/[^\w ]+/g, '').replace(/ +/g, '-');
                    $("#slug").val(slug);
                });

                $('.select2').select2({
                    tags: true,
                    width: '100%',
                    tokenSeparators: [',', ' ']
                });

                // Initialize timepicker
                $(".timepicker").flatpickr({
                    enableTime: true,
                    noCalendar: true,
                    dateFormat: "H:i",
                    time_24hr: true
                });


                tinymce.init({
                    selector: '.summernote',
                    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
                    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
                    tinycomments_mode: 'embedded',
                    tinycomments_author: 'Author name',
                    mergetags_list: [{
                            value: 'First.Name',
                            title: 'First Name'
                        },
                        {
                            value: 'Email',
                            title: 'Email'
                        },
                    ]
                });

                // Room type management
                let roomTypeIndex = 1;
                const roomTypesContainer = document.getElementById('room-types-container');

                document.getElementById('add-room-type').addEventListener('click', function() {
                    const newRoomType = document.createElement('div');
                    newRoomType.className = 'room-type-item';
                    newRoomType.dataset.index = roomTypeIndex;
                    newRoomType.innerHTML = `
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-12">
                                <div class="crancy__item-form--group mg-top-form-20">
                                    <label class="crancy__item-label">{{ __('translate.Room Type') }}</label>
                                    <select class="crancy__item-input room-type-select" name="room_types[${roomTypeIndex}][type]" required>
                                        <option value="">{{ __('translate.Select Type') }}</option>
                                        <option value="single">{{ __('translate.Single Room') }}</option>
                                        <option value="double">{{ __('translate.Double Room') }}</option>
                                        <option value="triple">{{ __('translate.Triple Room') }}</option>
                                        <option value="double_shared">{{ __('translate.Double Room (Shared)') }}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 col-12">
                                <div class="crancy__item-form--group mg-top-form-20">
                                    <label class="crancy__item-label">{{ __('translate.Price Supplement') }}</label>
                                    <div class="crancy__item-form--currency">
                                        <input class="crancy__item-input room-type-supplement" type="number" step="0.01" name="room_types[${roomTypeIndex}][price_supplement]" value="0">
                                        <div class="crancy__currency-icon">
                                            <span>{{ config('settings.currency_icon', '$') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 col-12">
                                <div class="crancy__item-form--group mg-top-form-20">
                                    <label class="crancy__item-label">{{ __('translate.Capacity') }}</label>
                                    <input class="crancy__item-input room-type-capacity" type="number" name="room_types[${roomTypeIndex}][capacity]" value="1" min="1">
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 col-12">
                                <div class="crancy__item-form--group mg-top-form-20">
                                    <label class="crancy__item-label">{{ __('translate.Status') }}</label>
                                    <div class="crancy-ptabs__notify-switch crancy-ptabs__notify-switch--two">
                                        <label class="crancy__item-switch">
                                            <input type="checkbox" name="room_types[${roomTypeIndex}][is_active]" value="1" checked>
                                            <span class="crancy__item-switch--slide crancy__item-switch--round"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="crancy__item-form--group mg-top-form-20">
                                    <label class="crancy__item-label">{{ __('translate.Description') }}</label>
                                    <textarea class="crancy__item-input room-type-description" name="room_types[${roomTypeIndex}][description]" rows="3" placeholder="Optional description for this room type"></textarea>
                                </div>
                            </div>

                            <div class="col-12">
                                <button type="button" class="crancy-btn btn-danger remove-room-type" style="background-color: #dc3545;">
                                    <i class="fa fa-trash"></i> {{ __('translate.Remove') }}
                                </button>
                            </div>
                        </div>
                    `;
                    roomTypesContainer.appendChild(newRoomType);
                    roomTypeIndex++;
                });

                // Event delegation for remove buttons
                roomTypesContainer.addEventListener('click', function(e) {
                    if (e.target.closest('.remove-room-type')) {
                        const roomTypeItem = e.target.closest('.room-type-item');
                        if (roomTypesContainer.querySelectorAll('.room-type-item').length > 1) {
                            roomTypeItem.remove();
                        } else {
                            alert('{{ __('translate.At least one room type is required.') }}');
                        }
                    }
                });

                // Good to know country management
                let countryIndex = 1;
                const goodToKnowContainer = document.getElementById('good-to-know-container');

                document.getElementById('add-country-info').addEventListener('click', function() {
                    const newCountry = document.createElement('div');
                    newCountry.className = 'country-info-item mb-4 pb-4 border-bottom';
                    newCountry.dataset.index = countryIndex;
                    newCountry.innerHTML = `
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="crancy__item-form--group mg-top-form-20">
                                    <label class="crancy__item-label">{{ __('translate.Currency') }}</label>
                                    <input class="crancy__item-input" type="text" name="good_to_know[${countryIndex}][currency]" placeholder="e.g. Euro">
                                </div>
                            </div>
                            <div class="col-lg-4 col-12">
                                <div class="crancy__item-form--group mg-top-form-20">
                                    <label class="crancy__item-label">{{ __('translate.Prises et adaptateurs') }}</label>
                                    <input class="crancy__item-input" type="text" name="good_to_know[${countryIndex}][plugs]" placeholder="e.g. Type C, E">
                                </div>
                            </div>
                            <div class="col-lg-4 col-12">
                                <div class="crancy__item-form--group mg-top-form-20">
                                    <label class="crancy__item-label">{{ __('translate.Vaccines') }}</label>
                                    <input class="crancy__item-input" type="text" name="good_to_know[${countryIndex}][vaccines]" placeholder="e.g. Hepatite A">
                                </div>
                            </div>
                            <div class="col-lg-4 col-12">
                                <div class="crancy__item-form--group mg-top-form-20">
                                    <label class="crancy__item-label">{{ __('translate.Payment Information') }}</label>
                                    <input class="crancy__item-input" type="text" name="good_to_know[${countryIndex}][payment]" placeholder="e.g. Cards accepted">
                                </div>
                            </div>
                            <div class="col-12 mg-top-20">
                                <button type="button" class="crancy-btn btn-danger remove-country-info" style="background-color: #dc3545;">
                                    <i class="fa fa-trash"></i> {{ __('translate.Remove') }}
                                </button>
                            </div>
                        </div>
                    `;
                    goodToKnowContainer.appendChild(newCountry);
                    countryIndex++;
                });

                // Event delegation for remove buttons
                goodToKnowContainer.addEventListener('click', function(e) {
                    if (e.target.closest('.remove-country-info')) {
                        const countryItem = e.target.closest('.country-info-item');
                        countryItem.remove();
                    }
                });

                // Included management
                const includedContainer = document.getElementById('included-container');
                let includedIndex = includedContainer.querySelectorAll('.included-item').length;

                document.getElementById('add-included').addEventListener('click', function() {
                    const newItem = document.createElement('div');
                    newItem.className = 'included-item mb-4 pb-4 border-bottom';
                    newItem.dataset.index = includedIndex;
                    newItem.innerHTML = `
                        <div class="row">
                            <div class="col-lg-3 col-12">
                                <div class="crancy__item-form--group mg-top-form-20">
                                    <label class="crancy__item-label">{{ __('translate.Category') }}</label>
                                    <select class="crancy__item-input category-select" name="included[${includedIndex}][category]">
                                        <option value="accommodation">{{ __('translate.Accommodation') }}</option>
                                        <option value="meals">{{ __('translate.Meals') }}</option>
                                        <option value="guide">{{ __('translate.Guide') }}</option>
                                        <option value="transport">{{ __('translate.Transport') }}</option>
                                        <option value="others" selected>{{ __('translate.Others') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-12">
                                <div class="crancy__item-form--group mg-top-form-20">
                                    <label class="crancy__item-label">{{ __('translate.Title') }}</label>
                                    <input class="crancy__item-input" type="text" name="included[${includedIndex}][title]" placeholder="e.g. 7 Nights Accommodation">
                                </div>
                            </div>
                            <div class="col-lg-5 col-12">
                                <div class="crancy__item-form--group mg-top-form-20">
                                    <label class="crancy__item-label">{{ __('translate.Details') }}</label>
                                    <textarea class="crancy__item-input" name="included[${includedIndex}][details]" rows="2"></textarea>
                                </div>
                            </div>
                            <div class="col-12 dietary-options" style="display:none;">
                                <div class="crancy__item-form--group mg-top-form-20">
                                    <label class="crancy__item-label">{{ __('translate.Dietary Options') }}</label>
                                    <select class="crancy__item-input select2-new" name="included[${includedIndex}][dietary][]" multiple>
                                        <option value="Vegetarian">Vegetarian</option>
                                        <option value="Vegan">Vegan</option>
                                        <option value="Halal">Halal</option>
                                        <option value="Gluten-Free">Gluten-Free</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 mg-top-20">
                                <button type="button" class="crancy-btn btn-danger remove-included" style="background-color: #dc3545;">
                                    <i class="fa fa-trash"></i> {{ __('translate.Remove') }}
                                </button>
                            </div>
                        </div>
                    `;
                    includedContainer.appendChild(newItem);
                    
                    // Initialize Select2 for the new item if it's meals
                    $(newItem).find('.select2-new').select2({
                        width: '100%'
                    });
                    
                    includedIndex++;
                });

                includedContainer.addEventListener('change', function(e) {
                    if (e.target.classList.contains('category-select')) {
                        const row = e.target.closest('.row');
                        const dietaryOptions = row.querySelector('.dietary-options');
                        if (e.target.value === 'meals') {
                            dietaryOptions.style.display = 'block';
                        } else {
                            dietaryOptions.style.display = 'none';
                        }
                    }
                });

                includedContainer.addEventListener('click', function(e) {
                    if (e.target.closest('.remove-included')) {
                        e.target.closest('.included-item').remove();
                    }
                });

                // Excluded management
                const excludedContainer = document.getElementById('excluded-container');
                let excludedIndex = excludedContainer.querySelectorAll('.excluded-item').length;

                document.getElementById('add-excluded').addEventListener('click', function() {
                    const newItem = document.createElement('div');
                    newItem.className = 'excluded-item mb-4 pb-4 border-bottom';
                    newItem.dataset.index = excludedIndex;
                    newItem.innerHTML = `
                        <div class="row">
                            <div class="col-lg-3 col-12">
                                <div class="crancy__item-form--group mg-top-form-20">
                                    <label class="crancy__item-label">{{ __('translate.Category') }}</label>
                                    <select class="crancy__item-input" name="excluded[${excludedIndex}][category]">
                                        <option value="others" selected>{{ __('translate.Others') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-12">
                                <div class="crancy__item-form--group mg-top-form-20">
                                    <label class="crancy__item-label">{{ __('translate.Title') }}</label>
                                    <input class="crancy__item-input" type="text" name="excluded[${excludedIndex}][title]" placeholder="e.g. Flights">
                                </div>
                            </div>
                            <div class="col-lg-5 col-12">
                                <div class="crancy__item-form--group mg-top-form-20">
                                    <label class="crancy__item-label">{{ __('translate.Details') }}</label>
                                    <textarea class="crancy__item-input" name="excluded[${excludedIndex}][details]" rows="2"></textarea>
                                </div>
                            </div>
                            <div class="col-12 mg-top-20">
                                <button type="button" class="crancy-btn btn-danger remove-excluded" style="background-color: #dc3545;">
                                    <i class="fa fa-trash"></i> {{ __('translate.Remove') }}
                                </button>
                            </div>
                        </div>
                    `;
                    excludedContainer.appendChild(newItem);
                    excludedIndex++;
                });

                excludedContainer.addEventListener('click', function(e) {
                    if (e.target.closest('.remove-excluded')) {
                        e.target.closest('.excluded-item').remove();
                    }
                });
            });
        })(jQuery);
    </script>
@endpush