@extends('admin_layout')

@section('title')
    <title>{{ __('translate.Quote Details') }}</title>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="crancy-card">
                    <div class="crancy-card-header">
                        <h3 class="card-title">{{ __('translate.Quote Details') }} #{{ $quote->id }}</h3>
                        <a href="{{ route('admin.tourbooking.quotes.index') }}" class="btn btn-secondary">
                            <i class="fa fa-arrow-left"></i> {{ __('translate.Back') }}
                        </a>
                    </div>
                    <div class="crancy-card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="info-box">
                                    <h5>{{ __('translate.Service Information') }}</h5>
                                    <table class="table table-bordered">
                                        @if($quote->service)
                                            <tr>
                                                <th>{{ __('translate.Service Name') }}:</th>
                                                <td>
                                                    <a href="{{ route('front.tourbooking.services.detail', $quote->service->slug) }}" target="_blank">
                                                        {{ $quote->service->translation?->title ?? 'N/A' }}
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>{{ __('translate.Price Per Person') }}:</th>
                                                <td>{{ currency($quote->service->price_per_person) }}</td>
                                            </tr>
                                        @else
                                            <tr>
                                                <th>{{ __('translate.Service') }}:</th>
                                                <td>{{ __('translate.Service not found') }}</td>
                                            </tr>
                                        @endif
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box">
                                    <h5>{{ __('translate.Customer Information') }}</h5>
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>{{ __('translate.Full Name') }}:</th>
                                            <td>{{ $quote->first_name }} {{ $quote->last_name }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('translate.Email') }}:</th>
                                            <td>{{ $quote->email }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('translate.Phone') }}:</th>
                                            <td>{{ $quote->phone }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('translate.Number of Persons') }}:</th>
                                            <td>{{ $quote->number_of_persons }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('translate.Status') }}:</th>
                                            <td>
                                                <select class="form-control status-update" style="width: auto; display: inline-block;">
                                                    <option value="pending" {{ $quote->status == 'pending' ? 'selected' : '' }}>
                                                        {{ __('translate.Pending') }}
                                                    </option>
                                                    <option value="contacted" {{ $quote->status == 'contacted' ? 'selected' : '' }}>
                                                        {{ __('translate.Contacted') }}
                                                    </option>
                                                    <option value="completed" {{ $quote->status == 'completed' ? 'selected' : '' }}>
                                                        {{ __('translate.Completed') }}
                                                    </option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('translate.Submitted Date') }}:</th>
                                            <td>{{ $quote->created_at->format('d M, Y H:i') }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        
                        @if($quote->message)
                            <div class="info-box mt-3">
                                <h5>{{ __('translate.Message') }}</h5>
                                <p>{{ $quote->message }}</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js_section')
    <script>
        $(document).ready(function() {
            // Update quote status
            $('.status-update').on('change', function() {
                var status = $(this).val();
                var url = "{{ route('admin.tourbooking.quotes.update-status', $quote->id) }}";
                
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        status: status
                    },
                    success: function(response) {
                        if(response.success) {
                            toastr.success(response.message);
                        } else {
                            toastr.error(response.message);
                        }
                    },
                    error: function() {
                        toastr.error("{{ __('translate.An error occurred. Please try again later.') }}");
                    }
                });
            });
        });
    });
    </script>
@endsection
