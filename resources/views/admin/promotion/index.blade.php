@extends('admin.master_layout')
@section('title')
<title>{{ __('translate.Promotions') }}</title>
@endsection
@section('body-header')
<h3 class="crancy-header__title m-0">{{ __('translate.Promotions') }}</h3>
<p class="crancy-header__text">{{ __('translate.Manage Content') }} >> {{ __('translate.Promotions') }}</p>
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
                                <div class="crancy-customer-filter__single crancy-customer-filter__single--csearch d-flex items-center justify-between create_new_btn_box">
                                    <div class="crancy-header__form crancy-header__form--customer create_new_btn_inline_box">
                                        <h4 class="crancy-product-card__title">{{ __('translate.Promotional Bar') }}</h4>
                                        <a href="{{ route('admin.promotion.create') }}" class="crancy-btn"><span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                    <path d="M8 1V15" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M1 8H15" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                            </span> {{ __('translate.Create Promotion') }}</a>
                                    </div>
                                </div>
                            </div>

                            <!-- crancy Table -->
                            <div id="crancy-table__main_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                @if($promotions->count() > 0)
                                <table class="crancy-table__main crancy-table__main-v3 dataTable no-footer" id="dataTable">
                                    <!-- crancy Table Head -->
                                    <thead class="crancy-table__head">
                                        <tr>
                                            <th class="crancy-table__column-1 crancy-table__h1 sorting">
                                                {{ __('translate.ID') }}
                                            </th>
                                            <th class="crancy-table__column-2 crancy-table__h2 sorting">
                                                {{ __('translate.Title') }}
                                            </th>
                                            <th class="crancy-table__column-2 crancy-table__h2 sorting">
                                                {{ __('translate.Message') }}
                                            </th>
                                            <th class="crancy-table__column-2 crancy-table__h2 sorting">
                                                {{ __('translate.Status') }}
                                            </th>
                                            <th class="crancy-table__column-2 crancy-table__h2 sorting">
                                                {{ __('translate.Period') }}
                                            </th>
                                            <th class="crancy-table__column-3 crancy-table__h3 sorting">
                                                {{ __('translate.Action') }}
                                            </th>
                                        </tr>
                                    </thead>
                                    <!-- crancy Table Body -->
                                    <tbody class="crancy-table__body">
                                        @foreach($promotions as $index => $promotion)
                                        <tr>
                                            <td class="crancy-table__column-1 crancy-table__data-1">
                                                <div class="crancy-table__product">
                                                    <h4 class="crancy-table__product-title">{{ $promotion->id }}</h4>
                                                </div>
                                            </td>
                                            <td class="crancy-table__column-2 crancy-table__data-2">
                                                <h4 class="crancy-table__product-title">{{ $promotion->title }}</h4>
                                            </td>
                                            <td class="crancy-table__column-2 crancy-table__data-2">
                                                <h4 class="crancy-table__product-title">
                                                    {{ Str::limit($promotion->message, 50) }}
                                                </h4>
                                            </td>
                                            <td class="crancy-table__column-2 crancy-table__data-2">
                                                <form action="{{ route('admin.promotion.toggle', $promotion->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @if($promotion->is_active)
                                                    <button type="submit" class="badge bg-success border-0 cursor-pointer">
                                                        {{ __('translate.Active') }}
                                                    </button>
                                                    @else
                                                    <button type="submit" class="badge bg-danger border-0 cursor-pointer">
                                                        {{ __('translate.Inactive') }}
                                                    </button>
                                                    @endif
                                                </form>
                                            </td>
                                            <td class="crancy-table__column-2 crancy-table__data-2">
                                                <small>
                                                    @if($promotion->starts_at)
                                                    {{ $promotion->starts_at->format('d M Y') }}
                                                    @else
                                                    {{ __('translate.Anytime') }}
                                                    @endif
                                                    -
                                                    @if($promotion->ends_at)
                                                    {{ $promotion->ends_at->format('d M Y') }}
                                                    @else
                                                    {{ __('translate.Ongoing') }}
                                                    @endif
                                                </small>
                                            </td>
                                            <td class="crancy-table__column-3 crancy-table__data-3">
                                                <div>
                                                    <a href="{{ route('admin.promotion.edit', $promotion->id) }}" class="crancy-btn crancy-btn__success"><i class="fas fa-edit"></i> {{ __('translate.Edit') }}</a>
                                                    <a href="javascript:;" onclick="deleteModal('{{ $promotion->id }}')" class="crancy-btn crancy-btn__danger ms-2"><i class="fas fa-trash"></i> {{ __('translate.Delete') }}</a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <!-- End crancy Table Body -->
                                </table>

                                <!-- Pagination -->
                                <div class="mt-3">
                                    {{ $promotions->links() }}
                                </div>
                                @else
                                <div class="alert alert-info text-center">
                                    {{ __('translate.No promotions found') }}. <a href="{{ route('admin.promotion.create') }}">{{ __('translate.Create your first promotion') }}</a>.
                                </div>
                                @endif
                            </div>
                            <!-- End crancy Table -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('translate.Delete Promotion') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>{{ __('translate.Are you sure you want to delete this promotion? This action cannot be undone.') }}</p>
            </div>
            <div class="modal-footer">
                <form id="deleteForm" action="" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('translate.Cancel') }}</button>
                    <button type="submit" class="btn btn-danger">{{ __('translate.Delete') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js_section')
<script>
    function deleteModal(id) {
        $('#deleteForm').attr('action', '{{ url("admin/promotions") }}/' + id);
        $('#deleteModal').modal('show');
    }
</script>
@endpush
