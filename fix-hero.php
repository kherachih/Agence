<?php
$hero_file = __DIR__ . '/Cms/themes/theme3/views/components/hero.blade.php';
$temp_file = __DIR__ . '/Cms/themes/theme3/views/components/hero.tmp';

// Read the current content
$content = file_get_contents($hero_file);

echo "Current hero.blade.php content:\n";
echo "-----------------------------------\n";
echo substr($content, 0, 200) . "..." . "\n";
echo "-----------------------------------\n\n";

// Check if we have the problematic endif issue
$lines = explode("\n", $content);
echo "Line count: " . count($lines) . "\n";

$if_count = 0;
$endif_count = 0;
$foreach_count = 0;
$endforeach_count = 0;

foreach ($lines as $i => $line) {
    if (strpos(trim($line), '@if') === 0) {
        $if_count++;
        echo "Line " . ($i+1) . ": " . trim($line) . "\n";
    } elseif (strpos(trim($line), '@endif') === 0) {
        $endif_count++;
        echo "Line " . ($i+1) . ": " . trim($line) . "\n";
    } elseif (strpos(trim($line), '@foreach') === 0) {
        $foreach_count++;
    } elseif (strpos(trim($line), '@endforeach') === 0) {
        $endforeach_count++;
    }
}

echo "\nControl structures count:\n";
echo "  @if:     " . $if_count . "\n";
echo "  @endif:  " . $endif_count . "\n";
echo "  @foreach:" . $foreach_count . "\n";
echo "  @endforeach:" . $endforeach_count . "\n";

if ($if_count !== $endif_count) {
    echo "\n❌ MISMATCH! @if and @endif counts do not match\n";
}

if ($foreach_count !== $endforeach_count) {
    echo "❌ MISMATCH! @foreach and @endforeach counts do not match\n";
}

// Fix the hero file
$fixed_content = <<<'BLADE'
@php
    $theme3_hero = getContent('theme3_hero.content', true);
    $theme3_destinations = destinations();
    $isMobile = isMobile();
@endphp

@if ($theme3_hero)
    @if ($isMobile)
        {{-- Mobile Booking App Interface --}}
        @include('theme::components.mobile-booking-app')
    @else
        {{-- Desktop Hero Section --}}
        <div class="tg-hero-area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <div class="tg-hero-content text-center">
                            <div class="tg-hero-title-box mb-30">
                                <h2 class="tg-hero-title wow fadeInUp">
                                    {{ getTranslatedValue($theme3_hero, 'title') }}
                                </h2>
                                <h3 class="tg-hero-tu-title wow fadeInUp">
                                    {{ getTranslatedValue($theme3_hero, 'sub_title') }}
                                </h3>
                            </div>
                            <div class="tg-hero-tu-avatar-wrap d-flex justify-content-center flex-wrap align-items-center wow fadeInUp">
                                <span class="tg-hero-tu-avatar d-inline-block mr-10 mb-15">
                                    <img src="{{ asset(getSingleImage($theme3_hero, 'peoples_image')) }}" alt="">
                                </span>
                                <span class="tg-hero-tu-avatar-text d-inline-block mr-10 p-relative mb-15">
                                    {!! strip_tags(clean(getTranslatedValue($theme3_hero, 'description')), '<br>') !!}
                                </span>
                            </div>
                            <div class="tg-booking-form-item tg-booking-tu-wrapper mt-15">
                                <form x-data="bookingForm()" @submit.prevent="submitForm">
                                    <div class="tg-booking-form-input-group d-flex align-items-end justify-content-between">
                                        <div class="tg-booking-form-parent-inner tg-hero-quantity p-relative mr-15 mb-10">
                                            <span class="tg-booking-form-title">{{ __('translate.Location:') }}</span>
                                            <div class="tg-booking-add-input-field tg-booking-quantity-toggle">
                                                <span class="location">
                                                    <svg width="13" height="16" viewBox="0 0 13 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M12.3329 6.7071C12.3329 11.2324 6.55512 15.1111 6.55512 15.1111C6.55512 15.1111 0.777344 11.2324 0.777344 6.7071C0.777344 5.16402 1.38607 3.68414 2.46962 2.59302C3.55316 1.5019 5.02276 0.888916 6.55512 0.888916C8.08748 0.888916 9.55708 1.5019 10.6406 2.59302C11.7242 3.68414 12.3329 5.16402 12.3329 6.7071Z" stroke="currentColor" stroke-width="1.15556" stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M6.55512 8.64649C7.61878 8.64649 8.48105 7.7782 8.48105 6.7071C8.48105 5.636 7.61878 4.7677 6.55512 4.7677C5.49146 4.7677 4.6292 5.636 4.6292 6.7071C4.6292 7.7782 5.49146 8.64649 6.55512 8.64649Z" stroke="currentColor" stroke-width="1.15556" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </span>
                                                <span x-show="destination" x-text="destination" class="tg-booking-title-value">
                                                    {{ __('translate.Where to ?') }}
                                                </span>
                                                <span x-show="!destination" class="tg-booking-title-value">
                                                    {{ __('translate.Where to ?') }}
                                                </span>
                                                <span class="angle-down">
                                                    <svg width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M1.6665 1L6.99984 6.33333L12.332 1" stroke="#353844" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </span>
                                            </div>
                                            <div class="tg-booking-form-location-list tg-booking-quantity-active">
                                                <ul class="scrool-bar scrool-height pr-5">
                                                    @foreach ($theme3_destinations as $key => $destination)
                                                        <li @click="selectDestination(`{{ $destination->id }}`, `{{ $destination->name }}`)">
                                                            <i class="fa-regular fa-location-dot"></i>
                                                            <span>{{ $destination->name }}</span>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="tg-booking-form-search-btn mb-10">
                                            <button class="bk-search-button" type="submit">Search
                                                <span class="ml-5">
                                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_53_103)">
                                                            <path d="M13.2218 13.2222L10.5188 10.5192M12.1959 6.48705C12.1959 9.6402 9.63977 12.1963 6.48662 12.1963C3.33348 12.1963 0.777344 9.6402 0.777344 6.48705C0.777344 3.3339 3.33348 0.777771 6.48662 0.777771C9.63977 0.777771 12.1959 3.3339 12.1959 6.48705Z" stroke="currentColor" stroke-width="1.575" stroke-linecap="round" stroke-linejoin="round" />
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_53_103">
                                                                <rect width="14" height="14" fill="currentColor" />
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endif

@push('js_section')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        function bookingForm() {
            return {
                destination: '',
                destination_id: '',
                adults: '',
                children: '',
                selectDestination(destinationId, destinationName) {
                    this.destination_id = destinationId;
                    this.destination = destinationName;
                },
                submitForm() {
                    const params = new URLSearchParams({
                        destination: this.destination,
                        destination_id: this.destination_id,
                        adults: this.adults,
                        children: this.children
                    });
                    window.location.href = `{{ route('front.tourbooking.services') }}?${params.toString()}`;
                }
            }
        }
    </script>
@endpush
BLADE;

// Try to write the fixed content
echo "\n\nWriting fixed hero.blade.php...\n";

if (file_put_contents($temp_file, $fixed_content) !== false) {
    if (@rename($hero_file, $hero_file . '.backup')) {
        if (@rename($temp_file, $hero_file)) {
            echo "✅ Success! Hero component fixed and backup created\n";
            
            // Verify the fix
            $new_content = file_get_contents($hero_file);
            $new_lines = explode("\n", $new_content);
            $new_if_count = 0;
            $new_endif_count = 0;
            
            foreach ($new_lines as $line) {
                if (strpos(trim($line), '@if') === 0) $new_if_count++;
                if (strpos(trim($line), '@endif') === 0) $new_endif_count++;
            }
            
            echo "\nNew control structure counts:\n";
            echo "  @if:     " . $new_if_count . "\n";
            echo "  @endif:  " . $new_endif_count . "\n";
            
            if ($new_if_count === $new_endif_count) {
                echo "✅ Control structures are now balanced\n";
            }
            
        } else {
            echo "❌ Failed to rename temporary file to hero.blade.php\n";
            copy($hero_file . '.backup', $hero_file);
            unlink($hero_file . '.backup');
        }
    } else {
        echo "❌ Failed to create backup of original hero.blade.php\n";
        unlink($temp_file);
    }
} else {
    echo "❌ Failed to write fixed content to temporary file\n";
}
?>