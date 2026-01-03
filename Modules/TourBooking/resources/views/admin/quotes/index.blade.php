@extends('admin_layout')

@section('title')
    <title>{{ __('translate.Quote Requests') }}</title>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="crancy-card">
                    <div class="crancy-card-header">
                        <h3 class="card-title">{{ __('translate.Quote Requests') }}</h3>
                    </div>
                    <div class="crancy-card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>{{ __('translate.ID') }}</th>
                                        <th>{{ __('translate.Service') }}</th>
                                        <th>{{ __('translate.Name') }}</th>
                                        <th>{{ __('translate.Email') }}</th>
                                        <th>{{ __('translate.Phone') }}</th>
                                        <th>{{ __('translate.Persons') }}</th>
                                        <th>{{ __('translate.Status') }}</th>
                                        <th>{{ __('translate.Date') }}</th>
                                        <th>{{ __('translate.Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($quotes as $quote)
                                        <tr>
                                            <td>{{ $quote->id }}</td>
                                            <td>
                                                @if($quote->service)
                                                    <a href="{{ route('front.tourbooking.services.detail', $quote->service->slug) }}" target="_blank">
                                                        {{ $quote->service->translation?->title ?? 'N/A' }}
                                                    </a>
                                                @else
                                                    {{ __('translate.N/A') }}
                                                @endif
                                            </td>
                                            <td>{{ $quote->first_name }} {{ $quote->last_name }}</td>
                                            <td>{{ $quote->email }}</td>
                                            <td>{{ $quote->phone }}</td>
                                            <td>{{ $quote->number_of_persons }}</td>
                                            <td>
                                                @if($quote->status == 'pending')
                                                    <span class="badge bg-warning text-dark">{{ __('translate.Pending') }}</span>
                                                @elseif($quote->status == 'contacted')
                                                    <span class="badge bg-info text-white">{{ __('translate.Contacted') }}</span>
                                                @elseif($quote->status == 'completed')
                                                    <span class="badge bg-success text-white">{{ __('translate.Completed') }}</span>
                                                @endif
                                            </td>
                                            <td>{{ $quote->created_at->format('d M, Y') }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ route('admin.tourbooking.quotes.show', $quote->id) }}" class="btn btn-sm btn-info">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    <button type="button" class="btn btn-sm btn-danger delete-quote" data-url="{{ route('admin.tourbooking.quotes.destroy', $quote->id) }}">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="9" class="text-center">
                                                <p class="mb-0">{{ __('translate.No quote requests found') }}</p>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        @if($quotes->hasPages())
                            <div class="d-flex justify-content-center mt-3">
                                {{ $quotes->appends(request()->query())->links() }}
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
            // Delete quote
            $(document).on('click', '.delete-quote', function(e) {
                e.preventDefault();
                var url = $(this).data('url');
                
                if(confirm('{{ __("translate.Are you sure you want to delete this quote?") }}')) {
                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            if(response.success) {
                                toastr.success(response.message);
                                setTimeout(function() {
                                    location.reload();
                                }, 1000);
                            } else {
                                toastr.error(response.message);
                            }
                        },
                        error: function() {
                            toastr.error('{{ __("translate.An error occurred. Please try again later.") }}');
                        }
                    });
                }
            });
        });
    });
    </script>
@endsection
