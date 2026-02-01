@extends('layout_inner_page')

@section('title')
    <title>{{ __('translate.Destinations') }} | {{ $general_setting->app_name }}</title>
@endsection

@section('front-content')
    @php
        $breadcrumb_title = __('translate.Destinations');
    @endphp
    @include('breadcrumb')

    <!-- tg-destinations-area-start -->
    <div class="tg-destinations-area pt-120 pb-90">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="tg-section-title text-center mb-50">
                        <span class="tg-section-subtitle">{{ __('translate.Explore the World') }}</span>
                        <h2 class="tg-section-title">{{ __('translate.Discover amazing destinations across all continents') }}</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="tg-continents-accordion">
                        @forelse($continents as $continent)
                            <div class="tg-continent-item {{ $loop->first ? 'active' : '' }}" data-continent="{{ $continent->slug }}">
                                <!-- Continent Header -->
                                <div class="tg-continent-header">
                                    <div class="tg-continent-icon">
                                        @if($continent->icon)
                                            <i class="{{ $continent->icon }}"></i>
                                        @else
                                            <i class="fas fa-globe"></i>
                                        @endif
                                    </div>
                                    <div class="tg-continent-info">
                                        <h3 class="tg-continent-name">{{ $continent->name }}</h3>
                                        <span class="tg-continent-count">
                                            {{ $continent->destinationsWithTours->count() }} {{ __('translate.destinations') }}
                                        </span>
                                    </div>
                                    <div class="tg-continent-toggle">
                                        <i class="fas fa-chevron-down"></i>
                                    </div>
                                </div>
                                
                                <!-- Destinations Grid -->
                                <div class="tg-continent-content" style="{{ $loop->first ? 'display: block;' : 'display: none;' }}">
                                    <div class="tg-destinations-grid">
                                        @forelse($continent->destinationsWithTours as $destination)
                                            <div class="tg-destination-card">
                                                <a href="{{ route('front.tourbooking.destinations.show', $destination->slug) }}">
                                                    <div class="tg-destination-thumb">
                                                        @if($destination->image)
                                                            <img src="{{ asset('storage/' . $destination->image) }}" 
                                                                 alt="{{ $destination->name }}" loading="lazy">
                                                        @else
                                                            <img src="{{ asset($general_setting->placeholder_image) }}" 
                                                                 alt="{{ $destination->name }}">
                                                        @endif
                                                        <div class="tg-destination-overlay">
                                                            <span class="tg-destination-tours">
                                                                <i class="fas fa-map-marked-alt"></i>
                                                                {{ $destination->services_count }} {{ __('translate.Tours') }}
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="tg-destination-info">
                                                        <h4 class="tg-destination-name">{{ $destination->name }}</h4>
                                                        <p class="tg-destination-country">
                                                            <i class="fas fa-flag"></i> {{ $destination->country }}
                                                        </p>
                                                    </div>
                                                </a>
                                            </div>
                                        @empty
                                            <div class="col-12 text-center">
                                                <div class="tg-no-destinations">
                                                    <i class="fas fa-map-marker-alt fa-3x mb-3"></i>
                                                    <p>{{ __('translate.No destinations available yet') }}</p>
                                                </div>
                                            </div>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12 text-center">
                                <div class="tg-empty-state">
                                    <i class="fas fa-globe-americas fa-3x mb-3"></i>
                                    <h3>{{ __('translate.No Continents Found') }}</h3>
                                    <p>{{ __('translate.We are working on adding more destinations. Stay tuned!') }}</p>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- tg-destinations-area-end -->
@endsection

@push('style_section')
<style>
    /* Continents Accordion */
    .tg-continents-accordion {
        max-width: 1200px;
        margin: 0 auto;
    }

    .tg-continent-item {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
        margin-bottom: 20px;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .tg-continent-item:hover {
        box-shadow: 0 4px 25px rgba(0, 0, 0, 0.12);
    }

    /* Continent Header */
    .tg-continent-header {
        display: flex;
        align-items: center;
        padding: 25px 30px;
        cursor: pointer;
        background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
        border-bottom: 2px solid transparent;
        transition: all 0.3s ease;
    }

    .tg-continent-item.active .tg-continent-header {
        border-bottom-color: #e9ecef;
        background: linear-gradient(135deg, #fff8e1 0%, #ffffff 100%);
    }

    .tg-continent-icon {
        width: 55px;
        height: 55px;
        background: linear-gradient(135deg, #ffc107 0%, #ff9800 100%);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 20px;
        flex-shrink: 0;
    }

    .tg-continent-icon i {
        font-size: 24px;
        color: #fff;
    }

    .tg-continent-info {
        flex: 1;
    }

    .tg-continent-name {
        font-size: 20px;
        font-weight: 600;
        color: #1a1a1a;
        margin-bottom: 4px;
    }

    .tg-continent-count {
        font-size: 14px;
        color: #6c757d;
    }

    .tg-continent-toggle {
        width: 36px;
        height: 36px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #fff;
        border-radius: 50%;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    .tg-continent-toggle i {
        color: #ffc107;
        font-size: 13px;
        transition: transform 0.3s ease;
    }

    .tg-continent-item.active .tg-continent-toggle i {
        transform: rotate(180deg);
    }

    /* Continent Content */
    .tg-continent-content {
        padding: 0;
        background: #f8f9fa;
    }

    /* Destinations Grid */
    .tg-destinations-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
        gap: 20px;
        padding: 25px;
    }

    /* Destination Card */
    .tg-destination-card {
        background: #fff;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.06);
        transition: all 0.3s ease;
    }

    .tg-destination-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
    }

    .tg-destination-card a {
        display: block;
        color: inherit;
        text-decoration: none;
    }

    .tg-destination-thumb {
        position: relative;
        height: 170px;
        overflow: hidden;
    }

    .tg-destination-thumb img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .tg-destination-card:hover .tg-destination-thumb img {
        transform: scale(1.08);
    }

    .tg-destination-overlay {
        position: absolute;
        top: 10px;
        right: 10px;
    }

    .tg-destination-tours {
        background: rgba(255, 193, 7, 0.95);
        color: #1a1a1a;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .tg-destination-info {
        padding: 15px;
    }

    .tg-destination-name {
        font-size: 16px;
        font-weight: 600;
        color: #1a1a1a;
        margin-bottom: 6px;
    }

    .tg-destination-country {
        font-size: 13px;
        color: #6c757d;
        margin: 0;
    }

    .tg-destination-country i {
        margin-right: 4px;
        color: #ffc107;
    }

    /* No Destinations */
    .tg-no-destinations {
        grid-column: 1 / -1;
        text-align: center;
        padding: 40px;
        color: #6c757d;
    }

    /* Empty State */
    .tg-empty-state {
        padding: 60px 20px;
        color: #6c757d;
    }

    .tg-empty-state i {
        color: #dee2e6;
    }

    /* Section Title Override */
    .tg-section-title {
        margin-bottom: 40px;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .tg-continent-header {
            padding: 18px 20px;
        }

        .tg-continent-icon {
            width: 45px;
            height: 45px;
        }

        .tg-continent-icon i {
            font-size: 20px;
        }

        .tg-continent-name {
            font-size: 17px;
        }

        .tg-destinations-grid {
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 15px;
            padding: 15px;
        }

        .tg-destination-thumb {
            height: 140px;
        }
    }

    @media (max-width: 480px) {
        .tg-destinations-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
@endpush

@push('js_section')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const continentItems = document.querySelectorAll('.tg-continent-item');
        
        continentItems.forEach(item => {
            const header = item.querySelector('.tg-continent-header');
            const content = item.querySelector('.tg-continent-content');
            
            header.addEventListener('click', function() {
                // Toggle current item
                const isActive = item.classList.contains('active');
                
                // Close all other items
                continentItems.forEach(otherItem => {
                    if (otherItem !== item) {
                        otherItem.classList.remove('active');
                        otherItem.querySelector('.tg-continent-content').style.display = 'none';
                    }
                });
                
                // Toggle current item
                if (isActive) {
                    item.classList.remove('active');
                    content.style.display = 'none';
                } else {
                    item.classList.add('active');
                    content.style.display = 'block';
                }
            });
        });
    });
</script>
@endpush
