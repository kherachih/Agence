@extends('user.master_layout')

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('translate.Add Passenger Information') }}</h3>
    <p class="crancy-header__text">{{ __('translate.Dashboard') }} >> {{ __('translate.Bookings') }} >> {{ __('translate.Add Passenger Information') }}</p>
@endsection

@section('body-content')
    <section class="crancy-adashboard crancy-show">
        <div class="container container__bscreen">
            <div class="row">
                <div class="col-12">
                    <div class="crancy-body">
                        <div class="crancy-dsinner">
                            @if(session('error'))
                                <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                                    {{ session('error') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            <!-- Booking Summary -->
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5 class="card-title mb-3">{{ __('translate.Booking Summary') }}</h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p><strong>{{ __('translate.Booking Code') }}:</strong> #{{ $booking->booking_code }}</p>
                                            <p><strong>{{ __('translate.Service') }}:</strong> {{ $booking->service->title ?? 'N/A' }}</p>
                                            <p><strong>{{ __('translate.Check In') }}:</strong> {{ $booking->check_in_date ? $booking->check_in_date->format('d M Y') : 'N/A' }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p><strong>{{ __('translate.Check Out') }}:</strong> {{ $booking->check_out_date ? $booking->check_out_date->format('d M Y') : 'N/A' }}</p>
                                            <p><strong>{{ __('translate.Adults') }}:</strong> {{ $booking->adults }}</p>
                                            <p><strong>{{ __('translate.Children') }}:</strong> {{ $booking->children }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Passenger Form -->
                            <form action="{{ route('user.passengers.store', $booking) }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div id="passenger-forms-container">
                                    @for($i = 0; $i < $totalPassengers; $i++)
                                        <div class="card mb-3 passenger-card" data-index="{{ $i }}">
                                            <div class="card-header">
                                                <h5 class="mb-0">
                                                    {{ __('translate.Passenger') }} {{ $i + 1 }}
                                                    @if($i === 0)
                                                        <span class="badge bg-primary ms-2">{{ __('translate.Primary') }}</span>
                                                    @endif
                                                </h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <!-- First Name -->
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">
                                                            {{ __('translate.First Name') }} <span class="text-danger">*</span>
                                                        </label>
                                                        <input type="text" 
                                                               class="form-control @error('passengers.'.$i.'.first_name') is-invalid @enderror" 
                                                               name="passengers[{{ $i }}][first_name]" 
                                                               value="{{ old('passengers.'.$i.'.first_name') }}"
                                                               required>
                                                        @error('passengers.'.$i.'.first_name')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <!-- Last Name -->
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">
                                                            {{ __('translate.Last Name') }} <span class="text-danger">*</span>
                                                        </label>
                                                        <input type="text" 
                                                               class="form-control @error('passengers.'.$i.'.last_name') is-invalid @enderror" 
                                                               name="passengers[{{ $i }}][last_name]" 
                                                               value="{{ old('passengers.'.$i.'.last_name') }}"
                                                               required>
                                                        @error('passengers.'.$i.'.last_name')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <!-- Date of Birth -->
                                                    <div class="col-md-4 mb-3">
                                                        <label class="form-label">{{ __('translate.Date of Birth') }}</label>
                                                        <input type="date" 
                                                               class="form-control @error('passengers.'.$i.'.date_of_birth') is-invalid @enderror" 
                                                               name="passengers[{{ $i }}][date_of_birth]" 
                                                               value="{{ old('passengers.'.$i.'.date_of_birth') }}">
                                                        @error('passengers.'.$i.'.date_of_birth')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <!-- Gender -->
                                                    <div class="col-md-4 mb-3">
                                                        <label class="form-label">{{ __('translate.Gender') }}</label>
                                                        <select class="form-select @error('passengers.'.$i.'.gender') is-invalid @enderror" 
                                                                name="passengers[{{ $i }}][gender]">
                                                            <option value="">{{ __('translate.Select') }}</option>
                                                            <option value="male" {{ old('passengers.'.$i.'.gender') == 'male' ? 'selected' : '' }}>
                                                                {{ __('translate.Male') }}
                                                            </option>
                                                            <option value="female" {{ old('passengers.'.$i.'.gender') == 'female' ? 'selected' : '' }}>
                                                                {{ __('translate.Female') }}
                                                            </option>
                                                            <option value="other" {{ old('passengers.'.$i.'.gender') == 'other' ? 'selected' : '' }}>
                                                                {{ __('translate.Other') }}
                                                            </option>
                                                        </select>
                                                        @error('passengers.'.$i.'.gender')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <!-- Nationality -->
                                                    <div class="col-md-4 mb-3">
                                                        <label class="form-label">{{ __('translate.Nationality') }}</label>
                                                        <input type="text" 
                                                               class="form-control @error('passengers.'.$i.'.nationality') is-invalid @enderror" 
                                                               name="passengers[{{ $i }}][nationality]" 
                                                               value="{{ old('passengers.'.$i.'.nationality') }}"
                                                               placeholder="{{ __('translate.e.g., French') }}">
                                                        @error('passengers.'.$i.'.nationality')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <!-- Passport Number -->
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">{{ __('translate.Passport Number') }}</label>
                                                        <input type="text" 
                                                               class="form-control @error('passengers.'.$i.'.passport_number') is-invalid @enderror" 
                                                               name="passengers[{{ $i }}][passport_number]" 
                                                               value="{{ old('passengers.'.$i.'.passport_number') }}"
                                                               placeholder="{{ __('translate.e.g., AB1234567') }}">
                                                        @error('passengers.'.$i.'.passport_number')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <!-- Passport Expiry Date -->
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">{{ __('translate.Passport Expiry Date') }}</label>
                                                        <input type="date" 
                                                               class="form-control @error('passengers.'.$i.'.passport_expiry_date') is-invalid @enderror" 
                                                               name="passengers[{{ $i }}][passport_expiry_date]" 
                                                               value="{{ old('passengers.'.$i.'.passport_expiry_date') }}">
                                                        @error('passengers.'.$i.'.passport_expiry_date')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <!-- Passport File -->
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">
                                                            {{ __('translate.Passport Copy') }} <span class="text-danger">*</span>
                                                        </label>
                                                        <input type="file" 
                                                               class="form-control @error('passengers.'.$i.'.passport_file') is-invalid @enderror" 
                                                               name="passengers[{{ $i }}][passport_file]" 
                                                               accept=".pdf,.jpg,.jpeg,.png"
                                                               required>
                                                        <small class="text-muted">{{ __('translate.Accepted formats: PDF, JPG, PNG (Max 5MB)') }}</small>
                                                        @error('passengers.'.$i.'.passport_file')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <!-- Insurance File -->
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">{{ __('translate.Travel Insurance (Optional)') }}</label>
                                                        <input type="file" 
                                                               class="form-control @error('passengers.'.$i.'.insurance_file') is-invalid @enderror" 
                                                               name="passengers[{{ $i }}][insurance_file]" 
                                                               accept=".pdf,.jpg,.jpeg,.png">
                                                        <small class="text-muted">{{ __('translate.Accepted formats: PDF, JPG, PNG (Max 5MB)') }}</small>
                                                        @error('passengers.'.$i.'.insurance_file')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <!-- Phone -->
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">{{ __('translate.Phone Number') }}</label>
                                                        <input type="text" 
                                                               class="form-control @error('passengers.'.$i.'.phone') is-invalid @enderror" 
                                                               name="passengers[{{ $i }}][phone]" 
                                                               value="{{ old('passengers.'.$i.'.phone') }}"
                                                               placeholder="{{ __('translate.e.g., +33 6 12 34 56 78') }}">
                                                        @error('passengers.'.$i.'.phone')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <!-- Email -->
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">{{ __('translate.Email Address') }}</label>
                                                        <input type="email" 
                                                               class="form-control @error('passengers.'.$i.'.email') is-invalid @enderror" 
                                                               name="passengers[{{ $i }}][email]" 
                                                               value="{{ old('passengers.'.$i.'.email') }}"
                                                               placeholder="{{ __('translate.e.g., passenger@example.com') }}">
                                                        @error('passengers.'.$i.'.email')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <!-- Special Requirements -->
                                                    <div class="col-12 mb-3">
                                                        <label class="form-label">{{ __('translate.Special Requirements') }}</label>
                                                        <textarea class="form-control @error('passengers.'.$i.'.special_requirements') is-invalid @enderror" 
                                                                  name="passengers[{{ $i }}][special_requirements]" 
                                                                  rows="3"
                                                                  placeholder="{{ __('translate.Any special requirements or dietary restrictions...') }}">{{ old('passengers.'.$i.'.special_requirements') }}</textarea>
                                                        @error('passengers.'.$i.'.special_requirements')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endfor
                                </div>

                                <!-- Submit Button -->
                                <div class="d-flex justify-content-between mt-4">
                                    <a href="{{ route('user.bookings.details', ['id' => $booking->id]) }}" 
                                       class="btn btn-secondary">
                                        {{ __('translate.Cancel') }}
                                    </a>
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('translate.Save Passenger Information') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
