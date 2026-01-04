
<header class="site-header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand" href="/">
                @if(isset($header_content->logo))
                    <img src="{{ asset($header_content->logo) }}" alt="{{ $seo_setting->site_name ?? 'TourEx' }}" height="45">
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
                            <a class="nav-link {{ request()->url() == $item['url'] ? 'active' : '' }}" href="{{ $item['url'] }}">
                                <i class="{{ $item['icon'] }} me-1"></i>
                                {{ $item['label'] }}
                            </a>
                        </li>
                    @endforeach

                    <!-- Currency Selector -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle currency-selector" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="fas fa-coins me-1"></i>
                            <span class="currency-code">{{ session('currency', 'USD') }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end currency-dropdown">
                            <li><a class="dropdown-item" href="#" onclick="changeCurrency('USD')"><i class="fas fa-dollar-sign me-2"></i> USD</a></li>
                            <li><a class="dropdown-item" href="#" onclick="changeCurrency('EUR')"><i class="fas fa-euro-sign me-2"></i> EUR</a></li>
                            <li><a class="dropdown-item" href="#" onclick="changeCurrency('GBP')"><i class="fas fa-pound-sign me-2"></i> GBP</a></li>
                            <li><a class="dropdown-item" href="#" onclick="changeCurrency('CAD')"><i class="fas fa-dollar-sign me-2"></i> CAD</a></li>
                            <li><a class="dropdown-item" href="#" onclick="changeCurrency('AUD')"><i class="fas fa-dollar-sign me-2"></i> AUD</a></li>
                        </ul>
                    </li>

                    <!-- Language Selector -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle language-selector" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="fas fa-globe me-1"></i>
                            <span class="lang-code">{{ strtoupper(app()->getLocale()) }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end language-dropdown">
                            <li><a class="dropdown-item" href="{{ route('language.switch', 'en') }}"><i class="fas fa-flag-usa me-2"></i> English</a></li>
                            <li><a class="dropdown-item" href="{{ route('language.switch', 'fr') }}"><i class="fas fa-flag me-2"></i> Français</a></li>
                            <li><a class="dropdown-item" href="{{ route('language.switch', 'es') }}"><i class="fas fa-flag me-2"></i> Español</a></li>
                            <li><a class="dropdown-item" href="{{ route('language.switch', 'de') }}"><i class="fas fa-flag me-2"></i> Deutsch</a></li>
                            <li><a class="dropdown-item" href="{{ route('language.switch', 'ar') }}"><i class="fas fa-flag me-2"></i> العربية</a></li>
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
                            <a class="nav-link dropdown-toggle user-dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                <img src="{{ auth()->user()->avatar ?? asset('backend/images/avatar.png') }}"
                                     alt="{{ auth()->user()->name }}"
                                     class="rounded-circle me-1"
                                     width="32">
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
                                <li><hr class="dropdown-divider"></li>
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
                    <img src="{{ asset($header_content->logo) }}" alt="{{ $seo_setting->site_name ?? 'TourEx' }}" height="40">
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
                            <a class="nav-link {{ request()->url() == $item['url'] ? 'active' : '' }}" href="{{ $item['url'] }}">
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
                                     alt="{{ auth()->user()->name }}"
                                     class="rounded-circle me-1"
                                     width="30">
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
                                <li><hr class="dropdown-divider"></li>
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
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        transition: all 0.3s ease;
        transform: translateX(-50%);
    }

    .nav-item .nav-link:hover::after,
    .nav-item .nav-link.active::after {
        width: 80%;
    }

    .nav-item .nav-link:hover,
    .nav-item .nav-link.active {
        color: #667eea;
    }

    /* Currency Selector */
    .currency-selector {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        color: #ffffff !important;
        padding: 0.5rem 1.25rem !important;
        border-radius: 25px;
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(240, 147, 251, 0.3);
    }

    .currency-selector:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(240, 147, 251, 0.4);
    }

    .currency-selector .currency-code {
        font-weight: 700;
    }

    .currency-dropdown {
        border: none;
        border-radius: 12px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
        padding: 0.5rem;
        min-width: 180px;
    }

    .currency-dropdown .dropdown-item {
        padding: 0.75rem 1rem;
        border-radius: 8px;
        margin-bottom: 0.25rem;
        transition: all 0.3s ease;
        color: #2c3e50;
        font-weight: 500;
    }

    .currency-dropdown .dropdown-item:hover {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        color: #ffffff;
        transform: translateX(5px);
    }

    .currency-dropdown .dropdown-item:last-child {
        margin-bottom: 0;
    }

    /* Language Selector */
    .language-selector {
        background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        color: #ffffff !important;
        padding: 0.5rem 1.25rem !important;
        border-radius: 25px;
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(79, 172, 254, 0.3);
    }

    .language-selector:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(79, 172, 254, 0.4);
    }

    .language-selector .lang-code {
        font-weight: 700;
    }

    .language-dropdown {
        border: none;
        border-radius: 12px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
        padding: 0.5rem;
        min-width: 180px;
    }

    .language-dropdown .dropdown-item {
        padding: 0.75rem 1rem;
        border-radius: 8px;
        margin-bottom: 0.25rem;
        transition: all 0.3s ease;
        color: #2c3e50;
        font-weight: 500;
    }

    .language-dropdown .dropdown-item:hover {
        background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        color: #ffffff;
        transform: translateX(5px);
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
        border: 2px solid #667eea;
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
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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
        border: 2px solid #667eea;
        color: #667eea;
        font-weight: 600;
        padding: 0.5rem 1.5rem;
        border-radius: 25px;
        transition: all 0.3s ease;
    }

    .btn-outline-primary:hover {
        background: #667eea;
        color: #ffffff;
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
    }

    .btn-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        font-weight: 600;
        padding: 0.5rem 1.5rem;
        border-radius: 25px;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
    }

    /* Navbar Toggler */
    .navbar-toggler {
        border: 2px solid #667eea;
        padding: 0.5rem;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .navbar-toggler:hover {
        background: #667eea;
    }

    .navbar-toggler:focus {
        box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
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
