@extends('admin.master_layout')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('translate.Passenger Information') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('translate.Home') }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.tourbooking.bookings.index') }}">{{ __('translate.Bookings') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('translate.Passengers') }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Booking Summary -->
                    <div class="card card-primary card-outline mb-4">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('translate.Booking Details') }}</h3>
                            <div class="card-tools">
                                <a href="{{ route('admin.tourbooking.bookings.show', $booking) }}" class="btn btn-sm btn-default">
                                    <i class="fas fa-arrow-left"></i> {{ __('translate.Back to Booking') }}
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <p><strong>{{ __('translate.Booking Code') }}:</strong> #{{ $booking->booking_code }}</p>
                                    <p><strong>{{ __('translate.Service') }}:</strong> {{ $booking->service->title ?? 'N/A' }}</p>
                                    <p><strong>{{ __('translate.Check In') }}:</strong> {{ $booking->check_in_date ? $booking->check_in_date->format('d M Y') : 'N/A' }}</p>
                                </div>
                                <div class="col-md-6">
                                    <p><strong>{{ __('translate.Check Out') }}:</strong> {{ $booking->check_out_date ? $booking->check_out_date->format('d M Y') : 'N/A' }}</p>
                                    <p><strong>{{ __('translate.Total') }}:</strong> {{ currency($booking->total) }}</p>
                                    <p><strong>{{ __('translate.Customer') }}:</strong> {{ $booking->customer_name ?? $booking->user->name ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Passengers List -->
                    <div class="card card-primary card-outline mb-4">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('translate.Passengers List') }}</h3>
                            <div class="card-tools">
                                <a href="{{ route('admin.tourbooking.passengers.download-confirmation', $booking) }}" 
                                   class="btn btn-sm btn-success">
                                    <i class="fas fa-file-pdf"></i> {{ __('translate.Download Confirmation PDF') }}
                                </a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            @if($passengers->count() > 0)
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>{{ __('translate.#') }}</th>
                                                <th>{{ __('translate.Name') }}</th>
                                                <th>{{ __('translate.Personal Info') }}</th>
                                                <th>{{ __('translate.Passport') }}</th>
                                                <th>{{ __('translate.Documents') }}</th>
                                                <th>{{ __('translate.Contact') }}</th>
                                                <th>{{ __('translate.Actions') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($passengers as $index => $passenger)
                                                <tr>
                                                    <td>{{ $index + 1 }}
                                                        @if($passenger->is_primary)
                                                            <span class="badge badge-primary ml-1">{{ __('translate.Primary') }}</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <strong>{{ $passenger->full_name }}</strong>
                                                    </td>
                                                    <td>
                                                        <small class="text-muted">
                                                            {{ __('translate.DOB') }}: {{ $passenger->date_of_birth ? $passenger->date_of_birth->format('d M Y') : 'N/A' }}<br>
                                                            {{ __('translate.Gender') }}: {{ $passenger->gender ? __('translate.'.$passenger->gender) : 'N/A' }}<br>
                                                            {{ __('translate.Nationality') }}: {{ $passenger->nationality ?? 'N/A' }}
                                                        </small>
                                                    </td>
                                                    <td>
                                                        @if($passenger->passport_number)
                                                            <strong>{{ $passenger->passport_number }}</strong><br>
                                                            <small class="text-muted">
                                                                {{ __('translate.Expiry') }}: {{ $passenger->passport_expiry_date ? $passenger->passport_expiry_date->format('d M Y') : 'N/A' }}
                                                            </small>
                                                        @else
                                                            <span class="text-muted">{{ __('translate.Not provided') }}</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($passenger->passport_file)
                                                            <a href="{{ route('admin.tourbooking.passengers.download-passport', $passenger) }}" 
                                                               class="btn btn-xs btn-outline-primary" target="_blank">
                                                                <i class="fas fa-file-pdf"></i> {{ __('translate.Passport') }}
                                                            </a>
                                                        @endif
                                                        @if($passenger->insurance_file)
                                                            <a href="{{ route('admin.tourbooking.passengers.download-insurance', $passenger) }}" 
                                                               class="btn btn-xs btn-outline-success" target="_blank">
                                                                <i class="fas fa-shield-alt"></i> {{ __('translate.Insurance') }}
                                                            </a>
                                                        @endif
                                                        @if(!$passenger->passport_file && !$passenger->insurance_file)
                                                            <span class="text-muted">{{ __('translate.No documents') }}</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($passenger->phone)
                                                            <div><i class="fas fa-phone mr-1"></i>{{ $passenger->phone }}</div>
                                                        @endif
                                                        @if($passenger->email)
                                                            <div><i class="fas fa-envelope mr-1"></i>{{ $passenger->email }}</div>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <button type="button" 
                                                                class="btn btn-xs btn-info"
                                                                data-bs-toggle="modal" 
                                                                data-bs-target="#editPassengerModal{{ $passenger->id }}">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="text-center py-4">
                                    <p class="text-muted">{{ __('translate.No passenger information provided yet.') }}</p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Special Requirements -->
                    @if($passengers->where('special_requirements', '!=', null)->count() > 0)
                        <div class="card card-info card-outline mb-4">
                            <div class="card-header">
                                <h3 class="card-title">{{ __('translate.Special Requirements') }}</h3>
                            </div>
                            <div class="card-body">
                                @foreach($passengers as $passenger)
                                    @if($passenger->special_requirements)
                                        <div class="alert alert-info mb-2">
                                            <strong>{{ $passenger->full_name }}:</strong>
                                            {{ $passenger->special_requirements }}
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Passenger Modals -->
    @foreach($passengers as $passenger)
        <div class="modal fade" id="editPassengerModal{{ $passenger->id }}" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <form action="{{ route('admin.tourbooking.passengers.update', $passenger) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">{{ __('translate.Edit Passenger') }}: {{ $passenger->full_name }}</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">{{ __('translate.First Name') }}</label>
                                    <input type="text" class="form-control" name="first_name" value="{{ $passenger->first_name }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">{{ __('translate.Last Name') }}</label>
                                    <input type="text" class="form-control" name="last_name" value="{{ $passenger->last_name }}" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">{{ __('translate.Date of Birth') }}</label>
                                    <input type="date" class="form-control" name="date_of_birth" value="{{ $passenger->date_of_birth ? $passenger->date_of_birth->format('Y-m-d') : '' }}">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">{{ __('translate.Gender') }}</label>
                                    <select class="form-select" name="gender">
                                        <option value="">{{ __('translate.Select') }}</option>
                                        <option value="male" {{ $passenger->gender == 'male' ? 'selected' : '' }}>{{ __('translate.Male') }}</option>
                                        <option value="female" {{ $passenger->gender == 'female' ? 'selected' : '' }}>{{ __('translate.Female') }}</option>
                                        <option value="other" {{ $passenger->gender == 'other' ? 'selected' : '' }}>{{ __('translate.Other') }}</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">{{ __('translate.Nationality') }}</label>
                                    <input type="text" class="form-control" name="nationality" value="{{ $passenger->nationality }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">{{ __('translate.Passport Number') }}</label>
                                    <input type="text" class="form-control" name="passport_number" value="{{ $passenger->passport_number }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">{{ __('translate.Passport Expiry') }}</label>
                                    <input type="date" class="form-control" name="passport_expiry_date" value="{{ $passenger->passport_expiry_date ? $passenger->passport_expiry_date->format('Y-m-d') : '' }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">{{ __('translate.Phone') }}</label>
                                    <input type="text" class="form-control" name="phone" value="{{ $passenger->phone }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">{{ __('translate.Email') }}</label>
                                    <input type="email" class="form-control" name="email" value="{{ $passenger->email }}">
                                </div>
                                <div class="col-12 mb-3">
                                    <label class="form-label">{{ __('translate.Special Requirements') }}</label>
                                    <textarea class="form-control" name="special_requirements" rows="3">{{ $passenger->special_requirements }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-bs-dismiss="modal">{{ __('translate.Cancel') }}</button>
                            <button type="submit" class="btn btn-primary">{{ __('translate.Save Changes') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
</div>
@endsection
