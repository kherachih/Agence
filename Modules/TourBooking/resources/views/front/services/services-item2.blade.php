@if ($allServices->count() > 0)
    <div class="tg-listing-grid-item tour-radar-style">
        <div @class(['row list-card', 'list-card-open' => $isListView == 'true'])>
            @foreach ($allServices as $key => $service)
                <div class="col-xxl-4 col-xl-6 col-lg-6 col-md-6 tg-grid-full">
                    <div class="tour-card">
                        {{-- Hero Image Section --}}
                        <div class="tour-card__hero">
                            <a href="{{ route('front.tourbooking.services.show', ['slug' => $service?->slug]) }}" class="tour-card__hero-link">
                                <img class="tour-card__hero-image"
                                    src="{{ asset('storage/' . $service?->thumbnail?->file_path) }}"
                                    alt="{{ $service?->thumbnail?->caption ?? $service?->translation?->title }}">
                                
                                {{-- Badges --}}
                                @if ($service?->adult_discount_percentage > 0)
                                    <span class="tour-card__badge tour-card__badge--discount">-{{ number_format($service?->adult_discount_percentage, 0) }}%</span>
                                @elseif ($service?->is_new == 1)
                                    <span class="tour-card__badge tour-card__badge--new">New</span>
                                @endif
                                
                                @if ($service?->is_featured == 1)
                                    <span class="tour-card__badge tour-card__badge--featured">
                                        <i class="fa-solid fa-star"></i> Featured
                                    </span>
                                @endif
                            </a>
                            
                            {{-- Wishlist Button --}}
                            <div @class([
                                'tour-card__wishlist',
                                'active' => $service?->my_wishlist_exists == 1,
                            ]) data-url="{{ route('user.wishlist.store') }}"
                                onclick="addToWishlist({{ $service->id }}, this, 'service')">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                        </div>
                        
                        {{-- Content Section --}}
                        <div class="tour-card__content">
                            {{-- Rating --}}
                            <div class="tour-card__rating">
                                <span class="tour-card__rating-score">{{ number_format($service?->active_reviews_avg_rating ?? 0, 1) }}</span>
                                <span class="tour-card__rating-stars">
                                    @foreach (range(1, 5) as $star)
                                        <i class="fa-solid fa-star {{ $service?->active_reviews_avg_rating >= $star ? 'active' : '' }}"></i>
                                    @endforeach
                                </span>
                                <span class="tour-card__rating-count">({{ $service?->active_reviews_count ?? 0 }} {{ $service?->active_reviews_count > 1 ? __('translate.Reviews') : __('translate.Review') }})</span>
                            </div>
                            
                            {{-- Title --}}
                            <h3 class="tour-card__title">
                                <a href="{{ route('front.tourbooking.services.show', ['slug' => $service?->slug]) }}">
                                    {{ Str::limit($service?->translation?->title, 50) }}
                                </a>
                            </h3>
                            
                            {{-- Meta Info --}}
                            <div class="tour-card__meta">
                                <div class="tour-card__meta-item">
                                    <i class="fa-solid fa-location-dot"></i>
                                    <span>{{ $service?->location }}</span>
                                </div>
                                @if ($service?->duration)
                                    <div class="tour-card__meta-item">
                                        <i class="fa-regular fa-clock"></i>
                                        <span>{{ $service?->duration }}</span>
                                    </div>
                                @endif
                                @if (!empty($service?->languages))
                                    <div class="tour-card__meta-item">
                                        <i class="fa-solid fa-globe"></i>
                                        <span>{{ is_array($service?->languages) ? implode(', ', $service?->languages) : $service?->languages }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                        
                        {{-- Details / Price Section --}}
                        <div class="tour-card__details">
                            @if ($service?->adult_discount_percentage > 0)
                                <span class="tour-card__discount-badge">{{ $service?->adult_discount_percentage }}% {{ __('translate.OFF') }}</span>
                            @endif
                            
                            <div class="tour-card__price-row">
                                <div class="tour-card__price-wrap">
                                    @if($service?->adult_price && ($service?->discount_adult_price || $service?->adult_discount_percentage > 0))
                                        <span class="tour-card__price-old">{{ currency($service?->adult_price) }}</span>
                                    @endif
                                    <div class="tour-card__price-main">
                                        <span class="tour-card__price-value">{!! $service->discounted_price ? currency($service->discounted_price) : currency($service?->adult_price) !!}</span>
                                        <span class="tour-card__price-label">{{ __('translate.per person') }}</span>
                                    </div>
                                </div>
                            </div>
                            
                            {{-- Action Buttons --}}
                            <div class="tour-card__actions">
                                <a class="tour-card__btn tour-card__btn--primary" href="{{ route('front.tourbooking.services.show', ['slug' => $service?->slug]) }}">
                                    {{ __('translate.See availability') }}
                                </a>
                                <a class="tour-card__btn tour-card__btn--secondary" href="{{ route('front.tourbooking.services.download-tour-plan', $service->slug) }}" target="_blank">
                                    <i class="fa-solid fa-book-open"></i>
                                    <span class="btn-text">{{ __('translate.Brochure') }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="text-center mt-50 mb-30">
            @include('components.front.custom-pagination', ['items' => $allServices])
        </div>
    </div>
    
    {{-- Styles --}}
    <style>
        /* Tour Card - TourRadar Style */
        .tour-radar-style .tour-card {
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            height: 100%;
            display: flex;
            flex-direction: column;
            transition: box-shadow 0.3s ease;
        }
        
        .tour-radar-style .tour-card:hover {
            box-shadow: 0 4px 16px rgba(0,0,0,0.12);
        }
        
        /* Hero Image */
        .tour-card__hero {
            position: relative;
            aspect-ratio: 16/10;
            overflow: hidden;
        }
        
        .tour-card__hero-link {
            display: block;
            width: 100%;
            height: 100%;
        }
        
        .tour-card__hero-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }
        
        .tour-card:hover .tour-card__hero-image {
            transform: scale(1.03);
        }
        
        /* Badges */
        .tour-card__badge {
            position: absolute;
            padding: 4px 10px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .tour-card__badge--discount {
            top: 12px;
            left: 12px;
            background: #ff4757;
            color: white;
        }
        
        .tour-card__badge--new {
            top: 12px;
            left: 12px;
            background: #2ed573;
            color: white;
        }
        
        .tour-card__badge--featured {
            top: 12px;
            right: 12px;
            background: rgba(0,0,0,0.7);
            color: #ffd700;
        }
        
        .tour-card__badge--featured i {
            font-size: 10px;
            margin-right: 3px;
        }
        
        /* Wishlist */
        .tour-card__wishlist {
            position: absolute;
            bottom: 12px;
            right: 12px;
            width: 36px;
            height: 36px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 2px 8px rgba(0,0,0,0.15);
            transition: all 0.2s ease;
        }
        
        .tour-card__wishlist i {
            font-size: 16px;
            color: #666;
            transition: color 0.2s ease;
        }
        
        .tour-card__wishlist:hover {
            transform: scale(1.1);
        }
        
        .tour-card__wishlist:hover i,
        .tour-card__wishlist.active i {
            color: #ff4757;
        }
        
        .tour-card__wishlist.active i {
            font-weight: 900;
        }
        
        /* Content */
        .tour-card__content {
            padding: 16px;
            flex: 1;
        }
        
        /* Rating */
        .tour-card__rating {
            display: flex;
            align-items: center;
            gap: 6px;
            margin-bottom: 8px;
        }
        
        .tour-card__rating-score {
            font-size: 14px;
            font-weight: 700;
            color: #333;
        }
        
        .tour-card__rating-stars {
            display: flex;
            gap: 2px;
        }
        
        .tour-card__rating-stars i {
            font-size: 12px;
            color: #ddd;
        }
        
        .tour-card__rating-stars i.active {
            color: #ffc107;
        }
        
        .tour-card__rating-count {
            font-size: 13px;
            color: #666;
        }
        
        /* Title */
        .tour-card__title {
            font-size: 16px;
            font-weight: 600;
            line-height: 1.4;
            margin-bottom: 12px;
        }
        
        .tour-card__title a {
            color: #333;
            text-decoration: none;
            transition: color 0.2s ease;
        }
        
        .tour-card__title a:hover {
            color: var(--tg-theme-primary, #ff6b35);
        }
        
        /* Meta */
        .tour-card__meta {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }
        
        .tour-card__meta-item {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            color: #666;
        }
        
        .tour-card__meta-item i {
            font-size: 14px;
            color: #999;
            width: 16px;
            text-align: center;
        }
        
        /* Details / Price Section */
        .tour-card__details {
            padding: 16px;
            border-top: 1px solid #f0f0f0;
            background: #fafafa;
        }
        
        .tour-card__discount-badge {
            display: inline-block;
            background: #ff4757;
            color: white;
            padding: 3px 8px;
            border-radius: 4px;
            font-size: 11px;
            font-weight: 600;
            margin-bottom: 8px;
        }
        
        .tour-card__price-row {
            margin-bottom: 12px;
        }
        
        .tour-card__price-wrap {
            display: flex;
            align-items: baseline;
            gap: 8px;
        }
        
        .tour-card__price-old {
            font-size: 14px;
            color: #999;
            text-decoration: line-through;
        }
        
        .tour-card__price-main {
            display: flex;
            align-items: baseline;
            gap: 4px;
        }
        
        .tour-card__price-value {
            font-size: 20px;
            font-weight: 700;
            color: var(--tg-theme-primary, #ff6b35);
        }
        
        .tour-card__price-label {
            font-size: 13px;
            color: #666;
        }
        
        /* Action Buttons */
        .tour-card__actions {
            display: flex;
            gap: 8px;
        }
        
        .tour-card__btn {
            flex: 1;
            padding: 10px 12px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 600;
            text-align: center;
            text-decoration: none;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            border: none;
            cursor: pointer;
        }
        
        .tour-card__btn--primary {
            background: var(--tg-theme-primary, #ff6b35);
            color: white;
        }
        
        .tour-card__btn--primary:hover {
            background: var(--tg-theme-secondary, #e55a2b);
            color: white;
        }
        
        .tour-card__btn--secondary {
            background: white;
            color: #333;
            border: 1px solid #ddd;
        }
        
        .tour-card__btn--secondary:hover {
            background: #f5f5f5;
            border-color: #ccc;
            color: #333;
        }
        
        .tour-card__btn i {
            font-size: 14px;
        }
        
        /* ===== RESPONSIVE DESIGN ===== */
        
        /* Mobile (up to 767px) */
        @media (max-width: 767px) {
            .tour-card__hero {
                aspect-ratio: 16/9;
                min-height: 180px;
            }
            
            .tour-card__title {
                font-size: 15px;
                line-height: 1.3;
            }
            
            .tour-card__content,
            .tour-card__details {
                padding: 12px;
            }
            
            .tour-card__rating-score {
                font-size: 13px;
            }
            
            .tour-card__rating-count {
                font-size: 12px;
            }
            
            .tour-card__price-value {
                font-size: 18px;
            }
            
            .tour-card__btn {
                padding: 10px 8px;
                font-size: 12px;
            }
            
            /* Sur mobile, cacher le texte du bouton brochure et montrer seulement l'icone + PDF */
            .tour-card__btn--secondary .btn-text {
                display: none;
            }
            
            .tour-card__btn--secondary::after {
                content: 'PDF';
                margin-left: 4px;
            }
        }
        
        /* Tablet (768px - 991px) */
        @media (min-width: 768px) and (max-width: 991px) {
            .tour-card__title {
                font-size: 15px;
            }
            
            .tour-card__hero {
                aspect-ratio: 16/10;
            }
        }
        
        /* Desktop (992px+) */
        @media (min-width: 992px) {
            .tour-card__hero {
                aspect-ratio: 16/10;
            }
        }
        
        /* Large Desktop (1200px+) */
        @media (min-width: 1200px) {
            .tour-card__title {
                font-size: 17px;
            }
        }
        
        /* ===== LIST VIEW ===== */
        .list-card-open .tg-grid-full {
            flex: 0 0 100%;
            max-width: 100%;
        }
        
        .list-card-open .tour-card {
            flex-direction: row;
            align-items: stretch;
        }
        
        .list-card-open .tour-card__hero {
            width: 320px;
            flex-shrink: 0;
            aspect-ratio: auto;
        }
        
        .list-card-open .tour-card__content {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        
        .list-card-open .tour-card__details {
            width: 280px;
            flex-shrink: 0;
            border-top: none;
            border-left: 1px solid #f0f0f0;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        
        /* List View Mobile */
        @media (max-width: 991px) {
            .list-card-open .tour-card {
                flex-direction: column;
            }
            
            .list-card-open .tour-card__hero {
                width: 100%;
                aspect-ratio: 16/9;
            }
            
            .list-card-open .tour-card__details {
                width: 100%;
                border-left: none;
                border-top: 1px solid #f0f0f0;
            }
        }
    </style>
@else
    <div class="col-12">
        <div class="text-center py-5">
            <i class="fa-regular fa-folder-open fa-3x text-muted mb-3"></i>
            <p class="text-muted">{{ __('translate.No tours found') }}</p>
        </div>
    </div>
@endif
