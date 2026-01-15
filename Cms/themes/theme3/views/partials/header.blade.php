<header class="site-header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand" href="/">
                @if(isset($header_content->logo))
                    <img src="{{ asset($header_content->logo) }}" alt="{{ $seo_setting->site_name ?? 'TourEx' }}"
                        height="45">
                @else
                    <span class="brand-text">{{ $seo_setting->site_name ?? 'TourEx' }}</span>
                @endif
            </a>

            <!-- Mobile Toggle -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navigation -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    @foreach(app('Theme\Theme1\Services\Theme1Service')->getNavigation() as $item)
                        <li class="nav-item">
                            <a class="nav-link {{ request()->url() == $item['url'] ? 'active' : '' }}"
                                href="{{ $item['url'] }}">
                                <i class="{{ $item['icon'] }} me-1"></i>
                                {{ $item['label'] }}
                            </a>
                        </li>
                    @endforeach

                    <!-- Currency Selector -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle currency-selector" href="#" role="button"
                            data-bs-toggle="dropdown">
                            <i class="fas fa-money-bill-wave me-1"></i>
                            <span class="currency-code">{{ session('currency_code', 'USD') }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end currency-dropdown">
                            @if(isset($currency_list))
                                @foreach($currency_list as $currency)
                                    <li>
                                        <a class="dropdown-item currency-item {{ session('currency_code') == $currency->currency_code ? 'active' : '' }}"
                                            href="#" onclick="changeCurrency('{{ $currency->currency_code }}')">
                                            <i class="fas fa-coins me-2"></i>
                                            {{ $currency->currency_name }} ({{ $currency->currency_icon }})
                                        </a>
                                    </li>
                                @endforeach
                            @else
                                <li><a class="dropdown-item" href="#" onclick="changeCurrency('USD')"><i
                                            class="fas fa-dollar-sign me-2"></i> USD</a></li>
                                <li><a class="dropdown-item" href="#" onclick="changeCurrency('EUR')"><i
                                            class="fas fa-euro-sign me-2"></i> EUR</a></li>
                                <li><a class="dropdown-item" href="#" onclick="changeCurrency('GBP')"><i
                                            class="fas fa-pound-sign me-2"></i> GBP</a></li>
                            @endif
                        </ul>
                    </li>

                    <!-- Language Selector -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle language-selector" href="#" role="button"
                            data-bs-toggle="dropdown">
                            <i class="fas fa-globe me-1"></i>
                            <span class="lang-code">{{ strtoupper(session('front_lang', app()->getLocale())) }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end language-dropdown">
                            @if(isset($language_list))
                                @foreach($language_list as $lang)
                                    <li>
                                        <a class="dropdown-item language-item {{ session('front_lang') == $lang->lang_code ? 'active' : '' }}"
                                            href="{{ route('language-switcher', ['lang_code' => $lang->lang_code]) }}">
                                            <i class="fas fa-language me-2"></i>
                                            {{ $lang->lang_name }}
                                        </a>
                                    </li>
                                @endforeach
                            @else
                                <li><a class="dropdown-item" href="{{ route('language.switch', 'en') }}"><i
                                            class="fas fa-flag-usa me-2"></i> English</a></li>
                                <li><a class="dropdown-item" href="{{ route('language.switch', 'fr') }}"><i
                                            class="fas fa-flag me-2"></i> Français</a></li>
                            @endif
                        </ul>
                    </li>

                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item ms-2">
                            <a class="btn btn-outline-primary btn-sm" href="{{ route('user.login') }}">
                                <i class="fas fa-sign-in-alt me-1"></i> Login
                            </a>
                        </li>
                        <li class="nav-item ms-1">
                            <a class="btn btn-primary btn-sm" href="{{ route('user.register') }}">
                                <i class="fas fa-user-plus me-1"></i> Register
                            </a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle user-dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown">
                                <img src="{{ auth()->user()->avatar ?? asset('backend/images/avatar.png') }}"
                                    alt="{{ auth()->user()->name }}" class="rounded-circle me-1" width="32">
                                <span class="user-name">{{ auth()->user()->name }}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end user-dropdown">
                                <li>
                                    <a class="dropdown-item" href="{{ route('user.dashboard') }}">
                                        <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('user.profile') }}">
                                        <i class="fas fa-user me-2"></i> Profile
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('user.bookings') }}">
                                        <i class="fas fa-calendar-check me-2"></i> My Bookings
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt me-2"></i> Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</header>

{{-- <header class="site-header">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand" href="/">
                @if(isset($header_content->logo))
                <img src="{{ asset($header_content->logo) }}" alt="{{ $seo_setting->site_name ?? 'TourEx' }}"
                    height="40">
                @else
                {{ $seo_setting->site_name ?? 'TourEx' }}
                @endif
            </a>

            <!-- Mobile Toggle -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navigation -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @foreach(app('Theme\Theme1\Services\Theme1Service')->getNavigation() as $item)
                    <li class="nav-item">
                        <a class="nav-link {{ request()->url() == $item['url'] ? 'active' : '' }}"
                            href="{{ $item['url'] }}">
                            <i class="{{ $item['icon'] }} me-1"></i>
                            {{ $item['label'] }}
                        </a>
                    </li>
                    @endforeach

                    <!-- Authentication Links -->
                    @guest
                    <li class="nav-item">
                        <a class="btn btn-primary ms-2" href="{{ route('user.login') }}">
                            <i class="fas fa-sign-in-alt me-1"></i> Login
                        </a>
                    </li>
                    @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            <img src="{{ auth()->user()->avatar ?? asset('backend/images/avatar.png') }}"
                                alt="{{ auth()->user()->name }}" class="rounded-circle me-1" width="30">
                            {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="{{ route('user.dashboard') }}">
                                    <i class="fas fa-tachometer-alt me-1"></i> Dashboard
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('user.profile') }}">
                                    <i class="fas fa-user me-1"></i> Profile
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt me-1"></i> Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</header> --}}

@push('styles')
    <style>
        /* Site Header Styles */
        .site-header {
            background: #ffffff;
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.08);
            position: sticky;
            top: 0;
            z-index: 1000;
            transition: all 0.3s ease;
        }

        .navbar {
            padding: 1rem 0;
        }

        /* Logo Styles */
        .navbar-brand {
            font-size: 1.5rem;
            font-weight: 700;
            color: #2c3e50;
            display: flex;
            align-items: center;
        }

        .navbar-brand img {
            max-height: 45px;
            width: auto;
            transition: transform 0.3s ease;
        }

        .navbar-brand:hover img {
            transform: scale(1.05);
        }

        .brand-text {
            background: linear-gradient(135deg, #BE3144 0%, #8B2332 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Navigation Links */
        .nav-item .nav-link {
            padding: 0.75rem 1.25rem;
            color: #2c3e50;
            font-weight: 500;
            transition: all 0.3s ease;
            position: relative;
        }

        .nav-item .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 2px;
            background: linear-gradient(135deg, #BE3144 0%, #8B2332 100%);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        .nav-item .nav-link:hover::after,
        .nav-item .nav-link.active::after {
            width: 80%;
        }

        .nav-item .nav-link:hover,
        .nav-item .nav-link.active {
            color: #BE3144;
        }

        /* Currency Selector - Modern Glassmorphism Design */
        .currency-selector {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.25) 0%, rgba(255, 255, 255, 0.15) 100%);
            backdrop-filter: blur(15px) saturate(180%);
            -webkit-backdrop-filter: blur(15px) saturate(180%);
            border: 1.5px solid rgba(255, 255, 255, 0.3);
            color: #2c3e50 !important;
            padding: 0.65rem 1.5rem !important;
            border-radius: 30px;
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 8px 32px rgba(190, 49, 68, 0.2),
                inset 0 1px 0 rgba(255, 255, 255, 0.5);
            position: relative;
            overflow: hidden;
        }

        .currency-selector::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.6s ease;
        }

        .currency-selector:hover::before {
            left: 100%;
        }

        .currency-selector:hover {
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 12px 40px rgba(190, 49, 68, 0.35),
                inset 0 1px 0 rgba(255, 255, 255, 0.6);
            border-color: rgba(255, 255, 255, 0.5);
        }

        .currency-selector .currency-code {
            font-weight: 700;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .currency-selector i {
            filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.1));
        }

        .currency-dropdown {
            border: none;
            border-radius: 16px;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px) saturate(180%);
            -webkit-backdrop-filter: blur(20px) saturate(180%);
            box-shadow: 0 15px 60px rgba(0, 0, 0, 0.2),
                0 5px 15px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.5);
            padding: 0.75rem;
            min-width: 200px;
            animation: dropdownFadeIn 0.3s ease;
        }

        @keyframes dropdownFadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .currency-dropdown .dropdown-item {
            padding: 0.85rem 1.25rem;
            border-radius: 10px;
            margin-bottom: 0.35rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            color: #2c3e50;
            font-weight: 600;
            font-size: 0.95rem;
            position: relative;
            overflow: hidden;
        }

        .currency-dropdown .dropdown-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: linear-gradient(135deg, #BE3144 0%, #8B2332 100%);
            transform: scaleY(0);
            transition: transform 0.3s ease;
        }

        .currency-dropdown .dropdown-item:hover::before {
            transform: scaleY(1);
        }

        .currency-dropdown .dropdown-item:hover {
            background: linear-gradient(135deg, rgba(190, 49, 68, 0.15) 0%, rgba(139, 35, 50, 0.15) 100%);
            color: #BE3144;
            transform: translateX(8px);
            padding-left: 1.75rem;
        }

        .currency-dropdown .dropdown-item:hover i {
            transform: scale(1.2) rotate(10deg);
        }

        .currency-dropdown .dropdown-item i {
            transition: all 0.3s ease;
        }

        .currency-dropdown .dropdown-item:last-child {
            margin-bottom: 0;
        }

        /* Language Selector - Modern Glassmorphism Design */
        .language-selector {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.25) 0%, rgba(255, 255, 255, 0.15) 100%);
            backdrop-filter: blur(15px) saturate(180%);
            -webkit-backdrop-filter: blur(15px) saturate(180%);
            border: 1.5px solid rgba(255, 255, 255, 0.3);
            color: #2c3e50 !important;
            padding: 0.65rem 1.5rem !important;
            border-radius: 30px;
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 8px 32px rgba(190, 49, 68, 0.2),
                inset 0 1px 0 rgba(255, 255, 255, 0.5);
            position: relative;
            overflow: hidden;
        }

        .language-selector::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.6s ease;
        }

        .language-selector:hover::before {
            left: 100%;
        }

        .language-selector:hover {
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 12px 40px rgba(190, 49, 68, 0.35),
                inset 0 1px 0 rgba(255, 255, 255, 0.6);
            border-color: rgba(255, 255, 255, 0.5);
        }

        .language-selector .lang-code {
            font-weight: 700;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .language-selector i {
            filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.1));
        }

        .language-dropdown {
            border: none;
            border-radius: 16px;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px) saturate(180%);
            -webkit-backdrop-filter: blur(20px) saturate(180%);
            box-shadow: 0 15px 60px rgba(0, 0, 0, 0.2),
                0 5px 15px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.5);
            padding: 0.75rem;
            min-width: 200px;
            animation: dropdownFadeIn 0.3s ease;
        }

        .language-dropdown .dropdown-item {
            padding: 0.85rem 1.25rem;
            border-radius: 10px;
            margin-bottom: 0.35rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            color: #2c3e50;
            font-weight: 600;
            font-size: 0.95rem;
            position: relative;
            overflow: hidden;
        }

        .language-dropdown .dropdown-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: linear-gradient(135deg, #BE3144 0%, #8B2332 100%);
            transform: scaleY(0);
            transition: transform 0.3s ease;
        }

        .language-dropdown .dropdown-item:hover::before {
            transform: scaleY(1);
        }

        .language-dropdown .dropdown-item:hover {
            background: linear-gradient(135deg, rgba(190, 49, 68, 0.15) 0%, rgba(139, 35, 50, 0.15) 100%);
            color: #BE3144;
            transform: translateX(8px);
            padding-left: 1.75rem;
        }

        .language-dropdown .dropdown-item:hover i {
            transform: scale(1.2) rotate(10deg);
        }

        .language-dropdown .dropdown-item i {
            transition: all 0.3s ease;
        }

        .language-dropdown .dropdown-item:last-child {
            margin-bottom: 0;
        }

        /* User Dropdown */
        .user-dropdown-toggle {
            display: flex;
            align-items: center;
            padding: 0.5rem 1rem !important;
            border-radius: 25px;
            transition: all 0.3s ease;
            background: #f8f9fa;
        }

        .user-dropdown-toggle:hover {
            background: #e9ecef;
        }

        .user-dropdown-toggle img {
            width: 32px;
            height: 32px;
            object-fit: cover;
            border: 2px solid #BE3144;
        }

        .user-dropdown-toggle .user-name {
            font-weight: 600;
            color: #2c3e50;
        }

        .user-dropdown {
            border: none;
            border-radius: 12px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
            padding: 0.5rem;
            min-width: 200px;
        }

        .user-dropdown .dropdown-item {
            padding: 0.75rem 1rem;
            border-radius: 8px;
            margin-bottom: 0.25rem;
            transition: all 0.3s ease;
            color: #2c3e50;
            font-weight: 500;
        }

        .user-dropdown .dropdown-item:hover {
            background: linear-gradient(135deg, #BE3144 0%, #8B2332 100%);
            color: #ffffff;
            transform: translateX(5px);
        }

        .user-dropdown .dropdown-item.text-danger:hover {
            background: linear-gradient(135deg, #ff6b6b 0%, #ee5a5a 100%);
            color: #ffffff;
        }

        .user-dropdown .dropdown-item:last-child {
            margin-bottom: 0;
        }

        .user-dropdown .dropdown-divider {
            margin: 0.5rem 0;
            border-color: #e9ecef;
        }

        /* Buttons */
        .btn-outline-primary {
            border: 2px solid #BE3144;
            color: #BE3144;
            font-weight: 600;
            padding: 0.5rem 1.5rem;
            border-radius: 25px;
            transition: all 0.3s ease;
        }

        .btn-outline-primary:hover {
            background: #BE3144;
            color: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(190, 49, 68, 0.3);
        }

        .btn-primary {
            background: linear-gradient(135deg, #BE3144 0%, #8B2332 100%);
            border: none;
            font-weight: 600;
            padding: 0.5rem 1.5rem;
            border-radius: 25px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(190, 49, 68, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(190, 49, 68, 0.4);
        }

        /* Navbar Toggler */
        .navbar-toggler {
            border: 2px solid #BE3144;
            padding: 0.5rem;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .navbar-toggler:hover {
            background: #BE3144;
        }

        .navbar-toggler:focus {
            box-shadow: 0 0 0 0.2rem rgba(190, 49, 68, 0.25);
        }

        /* Responsive Styles */
        @media (max-width: 991px) {
            .navbar-collapse {
                margin-top: 1rem;
            }

            .nav-item .nav-link {
                padding: 0.75rem 1rem;
            }

            .currency-selector,
            .language-selector {
                margin: 0.5rem 0;
            }
        }
    </style>
@endpush

@push('scripts')
    <script>
        function changeCurrency(currency) {
            // Make an AJAX request to change the currency
            fetch(`{{ route('currency.switch', ':currency') }}`.replace(':currency', currency), {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ currency: currency })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Update the currency display
                        document.querySelector('.currency-code').textContent = currency;
                        // Reload the page to update prices
                        location.reload();
                    }
                })
                .catch(error => console.error('Error changing currency:', error));
        }
    </script>
@endpush