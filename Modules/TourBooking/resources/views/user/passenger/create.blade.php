@extends('user.master_layout')

@section('content')
    <div class="crancy-body">
        <div class="crancy-sm-grid">
            <!-- Sidebar -->
            @include('user.sidebar')

            <!-- Main Content -->
            <div class="crancy-main-content">
                <div class="crancy-profile-section">
                    <div class="crancy-profile__header mb-4">
                        <h4 class="crancy-profile__title">
                            {{ __('translate.Add Passenger Information') }}
                        </h4>
                        <p class="crancy-profile__subtitle">
                            {{ __('translate.Please provide information for all passengers (:count)', ['count' => $totalPassengers]) }}
                        </p>
                    </div>

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
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
                                    <p><strong>{{ __('translate.Booking Code') }}:</strong> #{{ $booking->booking_code }}
                                    </p>
                                    <p><strong>{{ __('translate.Service') }}:</strong>
                                        {{ $booking->service->title ?? 'N/A' }}</p>
                                    <p><strong>{{ __('translate.Check In') }}:</strong>
                                        {{ $booking->check_in_date ? $booking->check_in_date->format('d M Y') : 'N/A' }}</p>
                                </div>
                                <div class="col-md-6">
                                    <p><strong>{{ __('translate.Check Out') }}:</strong>
                                        {{ $booking->check_out_date ? $booking->check_out_date->format('d M Y') : 'N/A' }}
                                    </p>
                                    <p><strong>{{ __('translate.Adults') }}:</strong> {{ $booking->adults }}</p>
                                    <p><strong>{{ __('translate.Children') }}:</strong> {{ $booking->children }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Passenger Form -->
                    <form action="{{ route('user.passengers.store', $booking) }}" method="POST"
                        enctype="multipart/form-data">
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
                                                    class="form-control @error('passengers.' . $i . '.first_name') is-invalid @enderror"
                                                    name="passengers[{{ $i }}][first_name]"
                                                    value="{{ old('passengers.' . $i . '.first_name') }}" required>
                                                @error('passengers.' . $i . '.first_name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <!-- Last Name -->
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">
                                                    {{ __('translate.Last Name') }} <span class="text-danger">*</span>
                                                </label>
                                                <input type="text"
                                                    class="form-control @error('passengers.' . $i . '.last_name') is-invalid @enderror"
                                                    name="passengers[{{ $i }}][last_name]"
                                                    value="{{ old('passengers.' . $i . '.last_name') }}" required>
                                                @error('passengers.' . $i . '.last_name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <!-- Date of Birth -->
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label">{{ __('translate.Date of Birth') }}</label>
                                                <input type="date"
                                                    class="form-control @error('passengers.' . $i . '.date_of_birth') is-invalid @enderror"
                                                    name="passengers[{{ $i }}][date_of_birth]"
                                                    value="{{ old('passengers.' . $i . '.date_of_birth') }}">
                                                @error('passengers.' . $i . '.date_of_birth')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <!-- Gender -->
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label">{{ __('translate.Gender') }}</label>
                                                <select
                                                    class="form-select @error('passengers.' . $i . '.gender') is-invalid @enderror"
                                                    name="passengers[{{ $i }}][gender]">
                                                    <option value="">{{ __('translate.Select') }}</option>
                                                    <option value="male" {{ old('passengers.' . $i . '.gender') == 'male' ? 'selected' : '' }}>
                                                        {{ __('translate.Male') }}
                                                    </option>
                                                    <option value="female" {{ old('passengers.' . $i . '.gender') == 'female' ? 'selected' : '' }}>
                                                        {{ __('translate.Female') }}
                                                    </option>
                                                    <option value="other" {{ old('passengers.' . $i . '.gender') == 'other' ? 'selected' : '' }}>
                                                        {{ __('translate.Other') }}
                                                    </option>
                                                </select>
                                                @error('passengers.' . $i . '.gender')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <!-- Nationality -->
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label">{{ __('translate.Nationality') }}</label>
                                                <input type="text"
                                                    class="form-control @error('passengers.' . $i . '.nationality') is-invalid @enderror"
                                                    name="passengers[{{ $i }}][nationality]"
                                                    value="{{ old('passengers.' . $i . '.nationality') }}"
                                                    placeholder="{{ __('translate.e.g., French') }}">
                                                @error('passengers.' . $i . '.nationality')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <!-- Passport Number -->
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">{{ __('translate.Passport Number') }}</label>
                                                <input type="text"
                                                    class="form-control @error('passengers.' . $i . '.passport_number') is-invalid @enderror"
                                                    name="passengers[{{ $i }}][passport_number]"
                                                    value="{{ old('passengers.' . $i . '.passport_number') }}"
                                                    placeholder="{{ __('translate.e.g., AB1234567') }}">
                                                @error('passengers.' . $i . '.passport_number')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <!-- Passport Expiry Date -->
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">{{ __('translate.Passport Expiry Date') }}</label>
                                                <input type="date"
                                                    class="form-control @error('passengers.' . $i . '.passport_expiry_date') is-invalid @enderror"
                                                    name="passengers[{{ $i }}][passport_expiry_date]"
                                                    value="{{ old('passengers.' . $i . '.passport_expiry_date') }}">
                                                @error('passengers.' . $i . '.passport_expiry_date')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <!-- Travel Documents Upload -->
                                            <div class="col-12 mb-3">
                                                <label class="form-label">
                                                    {{ __('translate.Travel Documents') }} <span class="text-danger">*</span>
                                                </label>
                                                <input type="file"
                                                    class="form-control travel-documents-input @error('passengers.' . $i . '.travel_documents') is-invalid @enderror @error('passengers.' . $i . '.passport_file') is-invalid @enderror @error('passengers.' . $i . '.flight_ticket_file') is-invalid @enderror @error('passengers.' . $i . '.insurance_file') is-invalid @enderror"
                                                    id="travel_documents_{{ $i }}"
                                                    name="passengers[{{ $i }}][travel_documents][]"
                                                    accept=".pdf,.jpg,.jpeg,.png" multiple required
                                                    data-passenger-index="{{ $i }}">
                                                <small class="text-muted d-block mt-1">
                                                    <i class="fas fa-info-circle"></i>
                                                    {{ __('translate.Please upload 1 to 3 documents') }}:
                                                    <br>
                                                    <strong>1. {{ __('translate.Passport') }}</strong>
                                                    ({{ __('translate.Required') }})
                                                    <br>
                                                    2. {{ __('translate.Flight Ticket') }} ({{ __('translate.Optional') }})
                                                    <br>
                                                    3. {{ __('translate.Travel Insurance') }} ({{ __('translate.Optional') }})
                                                    <br>
                                                    <em>{{ __('translate.Accepted formats: PDF, JPG, PNG (Max 5MB each)') }}</em>
                                                </small>
                                                <div class="uploaded-files-preview mt-2" id="preview_{{ $i }}"></div>
                                                @error('passengers.' . $i . '.travel_documents')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                                @error('passengers.' . $i . '.passport_file')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                                @error('passengers.' . $i . '.flight_ticket_file')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                                @error('passengers.' . $i . '.insurance_file')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <!-- Phone -->
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">{{ __('translate.Phone Number') }}</label>
                                                <input type="text"
                                                    class="form-control @error('passengers.' . $i . '.phone') is-invalid @enderror"
                                                    name="passengers[{{ $i }}][phone]"
                                                    value="{{ old('passengers.' . $i . '.phone') }}"
                                                    placeholder="{{ __('translate.e.g., +33 6 12 34 56 78') }}">
                                                @error('passengers.' . $i . '.phone')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <!-- Email -->
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">{{ __('translate.Email Address') }}</label>
                                                <input type="email"
                                                    class="form-control @error('passengers.' . $i . '.email') is-invalid @enderror"
                                                    name="passengers[{{ $i }}][email]"
                                                    value="{{ old('passengers.' . $i . '.email') }}"
                                                    placeholder="{{ __('translate.e.g., passenger@example.com') }}">
                                                @error('passengers.' . $i . '.email')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <!-- Special Requirements -->
                                            <div class="col-12 mb-3">
                                                <label class="form-label">{{ __('translate.Special Requirements') }}</label>
                                                <textarea
                                                    class="form-control @error('passengers.' . $i . '.special_requirements') is-invalid @enderror"
                                                    name="passengers[{{ $i }}][special_requirements]" rows="3"
                                                    placeholder="{{ __('translate.Any special requirements or dietary restrictions...') }}">{{ old('passengers.' . $i . '.special_requirements') }}</textarea>
                                                @error('passengers.' . $i . '.special_requirements')
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
@endsection

@push('js_section')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Handle travel documents file upload preview
    const travelDocInputs = document.querySelectorAll('.travel-documents-input');
    
    travelDocInputs.forEach(input => {
        input.addEventListener('change', function() {
            const index = this.getAttribute('data-passenger-index');
            const previewDiv = document.getElementById('preview_' + index);
            const files = this.files;
            
            // Clear previous preview
            previewDiv.innerHTML = '';
            
            // Check max files
            if (files.length > 3) {
                previewDiv.innerHTML = '<div class="alert alert-danger mt-2"><i class="fas fa-exclamation-triangle"></i> {{ __("translate.Maximum 3 files allowed") }}</div>';
                this.value = '';
                return;
            }
            
            // Check if at least one file is selected
            if (files.length === 0) {
                return;
            }
            
            // Create preview for each file
            let previewHTML = '<div class="uploaded-files-list mt-2">';
            previewHTML += '<h6 class="mb-2">{{ __("translate.Selected Files") }}:</h6>';
            previewHTML += '<ul class="list-group">';
            
            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                const fileName = file.name;
                const fileSize = (file.size / (1024 * 1024)).toFixed(2); // in MB
                const fileIcon = getFileIcon(fileName);
                
                // Check file size (max 5MB)
                if (file.size > 5 * 1024 * 1024) {
                    previewHTML += `<li class="list-group-item list-group-item-danger">
                        <i class="${fileIcon}"></i> ${fileName} 
                        <span class="badge bg-danger float-end">${fileSize} MB - {{ __("translate.Too large") }}</span>
                    </li>`;
                } else {
                    let badge = '';
                    if (i === 0) {
                        badge = '<span class="badge bg-primary float-end">{{ __("translate.Passport") }}</span>';
                    } else if (i === 1) {
                        badge = '<span class="badge bg-info float-end">{{ __("translate.Flight Ticket") }}</span>';
                    } else if (i === 2) {
                        badge = '<span class="badge bg-success float-end">{{ __("translate.Travel Insurance") }}</span>';
                    }
                    
                    previewHTML += `<li class="list-group-item">
                        <i class="${fileIcon}"></i> ${fileName} 
                        <small class="text-muted">(${fileSize} MB)</small>
                        ${badge}
                    </li>`;
                }
            }
            
            previewHTML += '</ul>';
            previewHTML += '</div>';
            
            previewDiv.innerHTML = previewHTML;
        });
    });
    
    function getFileIcon(filename) {
        const extension = filename.split('.').pop().toLowerCase();
        switch(extension) {
            case 'pdf':
                return 'fas fa-file-pdf text-danger';
            case 'jpg':
            case 'jpeg':
            case 'png':
                return 'fas fa-file-image text-primary';
            default:
                return 'fas fa-file';
        }
    }
});
</script>
@endpush

@push('style_section')
<style>
    .uploaded-files-preview {
        margin-top: 10px;
    }
    
    .uploaded-files-list ul {
        margin-bottom: 0;
    }
    
    .uploaded-files-list .list-group-item {
        padding: 10px 15px;
        border: 1px solid #dee2e6;
        background-color: #f8f9fa;
    }
    
    .uploaded-files-list .list-group-item i {
        margin-right: 8px;
    }
    
    .travel-documents-input {
        cursor: pointer;
    }
    
    .uploaded-files-list h6 {
        font-size: 14px;
        font-weight: 600;
        color: #495057;
    }
</style>
@endpush
