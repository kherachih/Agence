@extends('admin.master_layout')
@section('title')
    <title>{{ __('translate.Agency Application Details') }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('translate.Agency Application Details') }}</h3>
    <p class="crancy-header__text">{{ __('translate.Dashboard') }} >> {{ __('translate.Agency Application Details') }}</p>
@endsection

@section('body-content')
    <!-- crancy Dashboard -->
    <section class="crancy-adashboard crancy-show">
        <div class="container container__bscreen">
            <div class="row">
                <div class="col-12">
                    <div class="crancy-body">
                        <div class="crancy-dsinner">

                            <!-- Status Badge -->
                            <div class="alert alert-{{ $application->status == 'approved' ? 'success' : ($application->status == 'rejected' ? 'danger' : 'warning') }} mg-top-30">
                                <h5>
                                    {{ __('translate.Status') }}: 
                                    @if($application->status == 'approved')
                                        <span class="badge bg-success">{{ __('translate.Approved') }}</span>
                                    @elseif($application->status == 'rejected')
                                        <span class="badge bg-danger">{{ __('translate.Rejected') }}</span>
                                    @else
                                        <span class="badge bg-warning text-dark">{{ __('translate.Pending') }}</span>
                                    @endif
                                </h5>
                                <small>{{ __('translate.Submitted on') }}: {{ $application->created_at->format('d M Y, h:i A') }}</small>
                            </div>

                            <!-- Agency Information -->
                            <div class="crancy-table crancy-table--v3 mg-top-30">
                                <div class="crancy-customer-filter">
                                    <div class="crancy-customer-filter__single crancy-customer-filter__single--csearch">
                                        <div class="crancy-header__form crancy-header__form--customer">
                                            <h4 class="crancy-product-card__title">{{ __('translate.Agency Information') }}</h4>
                                        </div>
                                    </div>
                                </div>

                                <div id="crancy-table__main_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                    <table class="crancy-table__main crancy-table__main-v3 dataTable no-footer">
                                        <tbody class="crancy-table__body review-detials">
                                            <tr class="odd">
                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title">{{ __('translate.Agency Name') }}</h4>
                                                </td>
                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title">{{ html_decode($application->agency_name) }}</h4>
                                                </td>
                                            </tr>

                                            <tr class="odd">
                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title">{{ __('translate.Agency Slug') }}</h4>
                                                </td>
                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title">{{ $application->agency_slug }}</h4>
                                                </td>
                                            </tr>

                                            <tr class="odd">
                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title">{{ __('translate.Email') }}</h4>
                                                </td>
                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title">{{ $application->email }}</h4>
                                                </td>
                                            </tr>

                                            <tr class="odd">
                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title">{{ __('translate.Phone') }}</h4>
                                                </td>
                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title">{{ $application->phone }}</h4>
                                                </td>
                                            </tr>

                                            <tr class="odd">
                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title">{{ __('translate.Agency logo') }}</h4>
                                                </td>
                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    @if($application->agency_logo)
                                                    <img src="{{ asset($application->agency_logo) }}" alt="Agency Logo" style="max-width: 200px;">
                                                    @endif
                                                </td>
                                            </tr>

                                            <tr class="odd">
                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title">{{ __('translate.About Agency') }}</h4>
                                                </td>
                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <p>{{ html_decode($application->about_agency) }}</p>
                                                </td>
                                            </tr>

                                            <tr class="odd">
                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title">{{ __('translate.Location') }}</h4>
                                                </td>
                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title">
                                                        {{ $application->address }}<br>
                                                        {{ $application->city }}, {{ $application->state }}<br>
                                                        {{ $application->country }}
                                                    </h4>
                                                </td>
                                            </tr>

                                            <tr class="odd">
                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title">{{ __('translate.Website') }}</h4>
                                                </td>
                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    @if($application->website)
                                                    <a href="{{ $application->website }}" target="_blank">{{ $application->website }}</a>
                                                    @else
                                                    <span>-</span>
                                                    @endif
                                                </td>
                                            </tr>

                                            <tr class="odd">
                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title">{{ __('translate.Social Media') }}</h4>
                                                </td>
                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    @if($application->facebook) <i class="fab fa-facebook"></i> <a href="{{ $application->facebook }}" target="_blank">Facebook</a><br> @endif
                                                    @if($application->linkedin) <i class="fab fa-linkedin"></i> <a href="{{ $application->linkedin }}" target="_blank">LinkedIn</a><br> @endif
                                                    @if($application->twitter) <i class="fab fa-twitter"></i> <a href="{{ $application->twitter }}" target="_blank">Twitter</a><br> @endif
                                                    @if($application->instagram) <i class="fab fa-instagram"></i> <a href="{{ $application->instagram }}" target="_blank">Instagram</a> @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Documents Section -->
                            <div class="crancy-table crancy-table--v3 mg-top-30">
                                <div class="crancy-customer-filter">
                                    <div class="crancy-customer-filter__single crancy-customer-filter__single--csearch">
                                        <div class="crancy-header__form crancy-header__form--customer">
                                            <h4 class="crancy-product-card__title text-danger">
                                                <i class="fas fa-file-alt"></i> {{ __('translate.Uploaded Documents') }}
                                            </h4>
                                        </div>
                                    </div>
                                </div>

                                <div id="crancy-table__main_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                    <table class="crancy-table__main crancy-table__main-v3 dataTable no-footer">
                                        <tbody class="crancy-table__body review-detials">
                                            <tr class="odd">
                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title">{{ __('translate.Business License') }} <span class="text-danger">*</span></h4>
                                                </td>
                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    @if($application->business_license)
                                                    <a href="{{ asset($application->business_license) }}" target="_blank" class="btn btn-sm btn-primary">
                                                        <i class="fas fa-download"></i> {{ __('translate.Download') }}
                                                    </a>
                                                    @endif
                                                </td>
                                            </tr>

                                            <tr class="odd">
                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title">{{ __('translate.ID Document') }} <span class="text-danger">*</span></h4>
                                                </td>
                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    @if($application->id_document)
                                                    <a href="{{ asset($application->id_document) }}" target="_blank" class="btn btn-sm btn-primary">
                                                        <i class="fas fa-download"></i> {{ __('translate.Download') }}
                                                    </a>
                                                    @endif
                                                </td>
                                            </tr>

                                            <tr class="odd">
                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title">{{ __('translate.Tax Certificate') }}</h4>
                                                </td>
                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    @if($application->tax_certificate)
                                                    <a href="{{ asset($application->tax_certificate) }}" target="_blank" class="btn btn-sm btn-primary">
                                                        <i class="fas fa-download"></i> {{ __('translate.Download') }}
                                                    </a>
                                                    @else
                                                    <span class="text-muted">{{ __('translate.Not provided') }}</span>
                                                    @endif
                                                </td>
                                            </tr>

                                            <tr class="odd">
                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title">{{ __('translate.Insurance Document') }}</h4>
                                                </td>
                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    @if($application->insurance_document)
                                                    <a href="{{ asset($application->insurance_document) }}" target="_blank" class="btn btn-sm btn-primary">
                                                        <i class="fas fa-download"></i> {{ __('translate.Download') }}
                                                    </a>
                                                    @else
                                                    <span class="text-muted">{{ __('translate.Not provided') }}</span>
                                                    @endif
                                                </td>
                                            </tr>

                                            @if($application->other_documents && count($application->other_documents) > 0)
                                            <tr class="odd">
                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title">{{ __('translate.Other Documents') }}</h4>
                                                </td>
                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    @foreach($application->other_documents as $index => $doc)
                                                    <a href="{{ asset($doc) }}" target="_blank" class="btn btn-sm btn-secondary mb-1">
                                                        <i class="fas fa-download"></i> {{ __('translate.Document') }} {{ $index + 1 }}
                                                    </a>
                                                    @endforeach
                                                </td>
                                            </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Admin Notes Section (if reviewed) -->
                            @if($application->admin_notes)
                            <div class="crancy-table crancy-table--v3 mg-top-30">
                                <div class="alert alert-info">
                                    <h5><i class="fas fa-sticky-note"></i> {{ __('translate.Admin Notes') }}</h5>
                                    <p>{{ $application->admin_notes }}</p>
                                    @if($application->reviewer)
                                    <small>{{ __('translate.Reviewed by') }}: {{ $application->reviewer->name }} {{ __('translate.on') }} {{ $application->reviewed_at->format('d M Y, h:i A') }}</small>
                                    @endif
                                </div>
                            </div>
                            @endif

                            <!-- Action Buttons -->
                            @if($application->status == 'pending')
                            <div class="mg-top-30">
                                <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#approvalModal" class="crancy-btn crancy-color11__bg">
                                    <i class="fas fa-check"></i> {{ __('translate.Approve Application') }}
                                </a>
                                
                                <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#rejectionModal" class="crancy-btn crancy-color2__bg">
                                    <i class="fas fa-times"></i> {{ __('translate.Reject Application') }}
                                </a>
                            </div>
                            @endif

                            <div class="mg-top-20">
                                <a href="{{ route('admin.agency-applications.index') }}" class="crancy-btn crancy-btn__nostyle">
                                    <i class="fas fa-arrow-left"></i> {{ __('translate.Back to List') }}
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End crancy Dashboard -->

    <!-- Approval Modal -->
    <div class="modal fade" id="approvalModal" tabindex="-1" aria-labelledby="approvalModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content" action="{{ route('admin.agency-applications.approve', $application->id) }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="approvalModalLabel">{{ __('translate.Approve Application') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>{{ __('translate.Are you sure you want to approve this agency application?') }}</p>
                    <p class="text-success"><strong>{{ __('translate.This will create an agency account and send login credentials to the email address provided.') }}</strong></p>
                    
                    <div class="crancy__item-form--group mg-top-20">
                        <label class="crancy__item-label">{{ __('translate.Admin Notes') }} ({{ __('translate.Optional') }})</label>
                        <textarea class="crancy__item-input crancy__item-textarea" name="admin_notes" rows="3" placeholder="{{ __('translate.Add any notes for internal reference') }}"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('translate.Cancel') }}</button>
                    <button type="submit" class="btn btn-success">{{ __('translate.Yes, Approve') }}</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Rejection Modal -->
    <div class="modal fade" id="rejectionModal" tabindex="-1" aria-labelledby="rejectionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content" action="{{ route('admin.agency-applications.reject', $application->id) }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="rejectionModalLabel">{{ __('translate.Reject Application') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>{{ __('translate.Are you sure you want to reject this agency application?') }}</p>
                    
                    <div class="crancy__item-form--group mg-top-20">
                        <label class="crancy__item-label">{{ __('translate.Reason for Rejection') }} <span class="text-danger">*</span></label>
                        <textarea class="crancy__item-input crancy__item-textarea" name="admin_notes" rows="4" placeholder="{{ __('translate.Please provide a reason for rejection. This will be sent to the applicant.') }}" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('translate.Cancel') }}</button>
                    <button type="submit" class="btn btn-danger">{{ __('translate.Yes, Reject') }}</button>
                </div>
            </form>
        </div>
    </div>

@endsection
