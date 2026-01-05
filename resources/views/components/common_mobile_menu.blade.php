<div class="tgmobile__menu">
    <nav class="tgmobile__menu-box">
        <div class="close-btn"><i class="fa-solid fa-xmark"></i></div>
        <div class="nav-logo">
            <a href="{{ route('home') }}"><img src="{{ asset($general_setting->secondary_logo) }}"
                    alt="logo"></a>
        </div>
        <div class="tgmobile__menu-outer">
            <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
        </div>
        <div class="mobile-selectors">
            <div class="mobile-selector-item">
                <label class="mobile-selector-label">{{ __('translate.Currency') }}</label>
                <select class="currency_code mobile-select" name="currency_code">
                    @foreach($currency_list as $currency)
                        <option value="{{ $currency->currency_code }}" {{ session('currency_code') == $currency->currency_code ? 'selected' : '' }}>
                            {{ $currency->currency_name }} ({{ $currency->currency_icon }})
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mobile-selector-item">
                <label class="mobile-selector-label">{{ __('translate.Language') }}</label>
                <select class="language_code mobile-select" name="language_code">
                    @foreach($language_list as $lang)
                        <option value="{{ $lang->lang_code }}" {{ session('front_lang') == $lang->lang_code ? 'selected' : '' }}>
                            {{ $lang->lang_name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <style>
            .mobile-selectors {
                padding: 20px 0;
                border-top: 1px solid rgba(255, 255, 255, 0.1);
                margin-top: 20px;
            }
            
            .mobile-selector-item {
                margin-bottom: 15px;
            }
            
            .mobile-selector-item:last-child {
                margin-bottom: 0;
            }
            
            .mobile-selector-label {
                display: block;
                color: #4a90e2;
                font-size: 14px;
                font-weight: 700;
                margin-bottom: 8px;
                text-transform: uppercase;
                letter-spacing: 0.5px;
            }
            
            .mobile-select {
                width: 100%;
                appearance: none;
                -webkit-appearance: none;
                -moz-appearance: none;
                padding: 14px 45px 14px 18px;
                border: 2px solid #4a90e2;
                border-radius: 12px;
                background: linear-gradient(135deg, #2d3436 0%, #1a1d20 100%);
                font-size: 16px;
                font-weight: 600;
                color: #ffffff;
                cursor: pointer;
                transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                font-family: inherit;
                position: relative;
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            }
            
            .mobile-select:hover {
                border-color: #5ba3f5;
                background: linear-gradient(135deg, #3d4447 0%, #2a2d30 100%);
                box-shadow: 0 6px 20px rgba(74, 144, 226, 0.4);
                transform: translateY(-2px);
            }
            
            .mobile-select:focus {
                outline: none;
                border-color: #4a90e2;
                box-shadow: 0 0 0 4px rgba(74, 144, 226, 0.3), 0 6px 20px rgba(74, 144, 226, 0.4);
            }
            
            .mobile-selector-item {
                position: relative;
            }
            
            .mobile-selector-item::after {
                content: '';
                position: absolute;
                top: 48px;
                right: 18px;
                width: 0;
                height: 0;
                border-left: 7px solid transparent;
                border-right: 7px solid transparent;
                border-top: 8px solid #4a90e2;
                pointer-events: none;
                z-index: 1;
            }
            
            .mobile-select option {
                padding: 14px 18px;
                background: #2d3436;
                color: #ffffff;
                font-weight: 600;
                font-size: 16px;
            }
            
            .mobile-select option:hover {
                background: #4a90e2;
            }
            
            .mobile-select option:checked {
                background: linear-gradient(135deg, #4a90e2 0%, #357abd 100%);
                color: #ffffff;
            }
        </style>
        <div class="social-links">
            <ul class="list-wrap">
                @if ($footer->facebook)
                    <li><a href="{{ $footer->facebook }}"><i class="fab fa-facebook-f"></i></a></li>
                @endif
                @if ($footer->twitter)
                    <li><a href="{{ $footer->twitter }}"><i class="fab fa-twitter"></i></a></li>
                @endif
                @if ($footer->instagram)
                    <li><a href="{{ $footer->instagram }}"><i class="fab fa-instagram"></i></a></li>
                @endif
                @if ($footer->linkedin)
                    <li><a href="{{ $footer->linkedin }}"><i class="fab fa-linkedin-in"></i></a></li>
                @endif
                @if ($footer->youtube)
                    <li><a href="{{ $footer->youtube }}"><i class="fab fa-youtube"></i></a></li>
                @endif
            </ul>
        </div>
    </nav>
</div>
<div class="tgmobile__menu-backdrop"></div>