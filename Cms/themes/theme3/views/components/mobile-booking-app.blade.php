@php
    $theme3_hero = getContent('theme3_hero.content', true);
    $theme3_destinations = destinations();
@endphp

@if ($theme3_hero)
    <!-- Mobile Booking App Interface - Start -->
    <div class="mobile-booking-app">
        <!-- App Header -->
        <div class="mobile-header">
            <div class="header-content">
                <div class="app-icon">
                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16 2C8.268 2 2 8.268 2 16s6.268 14 14 14 14-6.268 14-14S23.732 2 16 2zm0 26C9.373 28 4 22.627 4 16S9.373 4 16 4s12 5.373 12 12-5.373 12-12 12z" fill="#667eea"/>
                        <path d="M16 8c-4.418 0-8 3.582-8 8s3.582 8 8 8 8-3.582 8-8-3.582-8-8-8zm0 14c-3.314 0-6-2.686-6-6s2.686-6 6-6 6 2.686 6 6-2.686 6-6 6z" fill="#764ba2"/>
                        <path d="M16 10c-3.314 0-6 2.686-6 6s2.686 6 6 6 6-2.686 6-6-2.686-6-6-6zm0 10c-2.206 0-4-1.794-4-4s1.794-4 4-4 4 1.794 4 4-1.794 4-4 4z" fill="#ffffff"/>
                    </svg>
                </div>
                <div class="app-title">
                    <h1>Tourex</h1>
                    <p class="subtitle">{{ __('translate.Your Travel Companion') }}</p>
                </div>
            </div>
        </div>

        <!-- Introduction Screen -->
        <div x-data="mobileBookingApp()" x-init="initApp" class="booking-container">
            <!-- Step 1: Welcome Screen -->
            <div x-show="currentStep === 1" x-transition:enter="animate__animated animate__fadeIn" class="step step-1">
                <div class="welcome-content">
                    <div class="welcome-icon">
                        <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="40" cy="40" r="38" stroke="url(#gradient1)" stroke-width="3" fill="none"/>
                            <path d="M40 15c-13.807 0-25 11.193-25 25s11.193 25 25 25 25-11.193 25-25-11.193-25-25-25zm0 45c-11.046 0-20-8.954-20-20s8.954-20 20-20 20 8.954 20 20-8.954 20-20 20z" fill="#667eea"/>
                            <path d="M40 25c-8.284 0-15 6.716-15 15s6.716 15 15 15 15-6.716 15-15-6.716-15-15-15zm0 25c-5.523 0-10-4.477-10-10s4.477-10 10-10 10 4.477 10 10-4.477 10-10 10z" fill="#ffffff"/>
                            <defs>
                                <linearGradient id="gradient1" x1="5" y1="5" x2="75" y2="75">
                                    <stop offset="0%" style="stop-color:#667eea"/>
                                    <stop offset="100%" style="stop-color:#764ba2"/>
                                </linearGradient>
                            </defs>
                        </svg>
                    </div>
                    <h2 class="welcome-title">{{ __('translate.Plan Your Perfect Trip') }}</h2>
                    <p class="welcome-description">{{ __('translate.Get ready for an unforgettable adventure! Find and book the best tours with just a few taps.') }}</p>
                    
                    <div class="quick-features">
                        <div class="feature">
                            <i class="fas fa-map-marked-alt"></i>
                            <span>{{ __('translate.Discover Destinations') }}</span>
                        </div>
                        <div class="feature">
                            <i class="fas fa-calendar-alt"></i>
                            <span>{{ __('translate.Flexible Dates') }}</span>
                        </div>
                        <div class="feature">
                            <i class="fas fa-users"></i>
                            <span>{{ __('translate.Group Bookings') }}</span>
                        </div>
                    </div>

                    <button @click="currentStep = 2" class="primary-button">
                        {{ __('translate.Get Started') }}
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </div>

            <!-- Step 2: Destination Selection -->
            <div x-show="currentStep === 2" x-transition:enter="animate__animated animate__fadeIn" class="step step-2">
                <div class="step-header">
                    <button @click="currentStep = 1" class="back-button">
                        <i class="fas fa-arrow-left"></i>
                    </button>
                    <h3 class="step-title">{{ __('translate.Where do you want to go?') }}</h3>
                </div>

                <div class="destination-search">
                    <div class="search-input-wrapper">
                        <i class="fas fa-search search-icon"></i>
                        <input 
                            type="text" 
                            x-model="searchQuery" 
                            placeholder="{{ __('translate.Search destinations...') }}"
                            class="search-input"
                        >
                    </div>
                </div>

                <div class="destination-list">
                    <template x-for="destination in filteredDestinations" :key="destination.id">
                        <div 
                            @click="selectDestination(destination.id, destination.name)"
                            class="destination-item"
                        >
                            <div class="destination-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="destination-info">
                                <h4 x-text="destination.name" class="destination-name"></h4>
                                <p class="destination-services">{{ __('translate.Available tours') }}</p>
                            </div>
                            <div class="destination-check" x-show="selectedDestination === destination.id">
                                <i class="fas fa-check"></i>
                            </div>
                        </div>
                    </template>
                </div>

                <div class="step-footer">
                    <button 
                        @click="currentStep = 3"
                        :disabled="!selectedDestination"
                        class="primary-button"
                    >
                        {{ __('translate.Next') }}
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </div>

            <!-- Step 3: Tour Selection -->
            <div x-show="currentStep === 3" x-transition:enter="animate__animated animate__fadeIn" class="step step-3">
                <div class="step-header">
                    <button @click="currentStep = 2" class="back-button">
                        <i class="fas fa-arrow-left"></i>
                    </button>
                    <h3 class="step-title">{{ __('translate.Select Your Tour') }}</h3>
                    <p class="step-subtitle">{{ __('translate.Choose from amazing experiences') }}</p>
                </div>

                <div class="tour-types">
                    <div 
                        @click="selectedTourType = 'adventure'"
                        :class="['tour-type', selectedTourType === 'adventure' ? 'active' : '']"
                    >
                        <i class="fas fa-hiking"></i>
                        <span>{{ __('translate.Adventure') }}</span>
                    </div>
                    <div 
                        @click="selectedTourType = 'cultural'"
                        :class="['tour-type', selectedTourType === 'cultural' ? 'active' : '']"
                    >
                        <i class="fas fa-landmark"></i>
                        <span>{{ __('translate.Cultural') }}</span>
                    </div>
                    <div 
                        @click="selectedTourType = 'relaxation'"
                        :class="['tour-type', selectedTourType === 'relaxation' ? 'active' : '']"
                    >
                        <i class="fas fa-umbrella-beach"></i>
                        <span>{{ __('translate.Relaxation') }}</span>
                    </div>
                    <div 
                        @click="selectedTourType = 'family'"
                        :class="['tour-type', selectedTourType === 'family' ? 'active' : '']"
                    >
                        <i class="fas fa-users"></i>
                        <span>{{ __('translate.Family') }}</span>
                    </div>
                </div>

                <div class="step-footer">
                    <button 
                        @click="currentStep = 4"
                        :disabled="!selectedTourType"
                        class="primary-button"
                    >
                        {{ __('translate.Next') }}
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </div>

            <!-- Step 4: Guest Selection -->
            <div x-show="currentStep === 4" x-transition:enter="animate__animated animate__fadeIn" class="step step-4">
                <div class="step-header">
                    <button @click="currentStep = 3" class="back-button">
                        <i class="fas fa-arrow-left"></i>
                    </button>
                    <h3 class="step-title">{{ __('translate.Who is Travelling?') }}</h3>
                </div>

                <div class="guest-selection">
                    <div class="guest-type">
                        <div class="guest-info">
                            <i class="fas fa-user"></i>
                            <span>{{ __('translate.Adults') }}</span>
                            <small>{{ __('translate.Age 18+') }}</small>
                        </div>
                        <div class="guest-quantity">
                            <button @click="decrementAdults" class="quantity-btn">
                                <i class="fas fa-minus"></i>
                            </button>
                            <span x-text="adults" class="quantity-value"></span>
                            <button @click="incrementAdults" class="quantity-btn">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>

                    <div class="guest-type">
                        <div class="guest-info">
                            <i class="fas fa-child"></i>
                            <span>{{ __('translate.Children') }}</span>
                            <small>{{ __('translate.Age 0-17') }}</small>
                        </div>
                        <div class="guest-quantity">
                            <button @click="decrementChildren" class="quantity-btn">
                                <i class="fas fa-minus"></i>
                            </button>
                            <span x-text="children" class="quantity-value"></span>
                            <button @click="incrementChildren" class="quantity-btn">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="step-footer">
                    <button 
                        @click="currentStep = 5"
                        :disabled="adults === 0"
                        class="primary-button"
                    >
                        {{ __('translate.Next') }}
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </div>

            <!-- Step 5: Room Selection -->
            <div x-show="currentStep === 5" x-transition:enter="animate__animated animate__fadeIn" class="step step-5">
                <div class="step-header">
                    <button @click="currentStep = 4" class="back-button">
                        <i class="fas fa-arrow-left"></i>
                    </button>
                    <h3 class="step-title">{{ __('translate.Number of Rooms') }}</h3>
                    <p class="step-subtitle">{{ __('translate.Select rooms based on your needs') }}</p>
                </div>

                <div class="room-selection">
                    <div class="room-info">
                        <i class="fas fa-bed"></i>
                        <span>{{ __('translate.Rooms') }}</span>
                    </div>
                    <div class="room-quantity">
                        <button @click="decrementRooms" class="quantity-btn">
                            <i class="fas fa-minus"></i>
                        </button>
                        <span x-text="rooms" class="quantity-value"></span>
                        <button @click="incrementRooms" class="quantity-btn">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>

                <div class="step-footer">
                    <button 
                        @click="currentStep = 6"
                        :disabled="rooms === 0"
                        class="primary-button"
                    >
                        {{ __('translate.Next') }}
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </div>

            <!-- Step 6: Date Selection -->
            <div x-show="currentStep === 6" x-transition:enter="animate__animated animate__fadeIn" class="step step-6">
                <div class="step-header">
                    <button @click="currentStep = 5" class="back-button">
                        <i class="fas fa-arrow-left"></i>
                    </button>
                    <h3 class="step-title">{{ __('translate.Select Date') }}</h3>
                </div>

                <div class="date-selection">
                    <div class="month-selector">
                        <button @click="previousMonth" class="month-nav">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <span x-text="currentMonth" class="month-name"></span>
                        <button @click="nextMonth" class="month-nav">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>

                    <div class="calendar">
                        <div class="calendar-header">
                            <div class="day">{{ __('translate.Su') }}</div>
                            <div class="day">{{ __('translate.Mo') }}</div>
                            <div class="day">{{ __('translate.Tu') }}</div>
                            <div class="day">{{ __('translate.We') }}</div>
                            <div class="day">{{ __('translate.Th') }}</div>
                            <div class="day">{{ __('translate.Fr') }}</div>
                            <div class="day">{{ __('translate.Sa') }}</div>
                        </div>
                        <div class="calendar-days">
                            <template x-for="(day, index) in calendarDays" :key="index">
                                <div 
                                    @click="selectDate(index)"
                                    :class="['calendar-day', { 
                                        'selected': selectedDate === index,
                                        'disabled': !day.available,
                                        'other-month': day.isOtherMonth
                                    }]"
                                >
                                    <span x-text="day.day"></span>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>

                <div class="step-footer">
                    <button 
                        @click="submitBooking"
                        :disabled="!selectedDate"
                        class="primary-button"
                    >
                        {{ __('translate.Search Tours') }}
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>

            <!-- Step 7: Loading Screen -->
            <div x-show="currentStep === 7" x-transition:enter="animate__animated animate__fadeIn" class="step step-7">
                <div class="loading-content">
                    <div class="loading-spinner">
                        <div class="spinner"></div>
                    </div>
                    <h3>{{ __('translate.Searching for perfect tours...') }}</h3>
                    <p>{{ __('translate.Finding the best options for you') }}</p>
                </div>
            </div>
        </div>
    </div>

    @push('styles')
        <style>
            /* Mobile Booking App Styles */
            .mobile-booking-app {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
                z-index: 9999;
                overflow-y: auto;
            }

            /* Header Styles */
            .mobile-header {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                padding: 20px;
                color: white;
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            }

            .header-content {
                display: flex;
                align-items: center;
                gap: 15px;
            }

            .app-icon svg {
                filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.3));
            }

            .app-title h1 {
                margin: 0;
                font-size: 24px;
                font-weight: bold;
                letter-spacing: -0.5px;
            }

            .app-title .subtitle {
                margin: 5px 0 0 0;
                font-size: 14px;
                opacity: 0.9;
                font-weight: 300;
            }

            /* Booking Container */
            .booking-container {
                padding: 20px;
                max-width: 600px;
                margin: 0 auto;
            }

            /* Step Styles */
            .step {
                min-height: calc(100vh - 100px);
                display: flex;
                flex-direction: column;
            }

            /* Welcome Screen */
            .welcome-content {
                text-align: center;
                margin: auto;
                max-width: 400px;
            }

            .welcome-icon {
                margin-bottom: 30px;
                animation: bounce 2s infinite;
            }

            @keyframes bounce {
                0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
                40% { transform: translateY(-20px); }
                60% { transform: translateY(-10px); }
            }

            .welcome-title {
                font-size: 28px;
                font-weight: bold;
                margin-bottom: 15px;
                color: #333;
                line-height: 1.2;
            }

            .welcome-description {
                font-size: 16px;
                color: #666;
                margin-bottom: 30px;
                line-height: 1.6;
            }

            /* Quick Features */
            .quick-features {
                display: flex;
                justify-content: center;
                gap: 20px;
                margin-bottom: 40px;
            }

            .feature {
                display: flex;
                flex-direction: column;
                align-items: center;
                gap: 5px;
                padding: 10px;
                background: white;
                border-radius: 12px;
                min-width: 100px;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
                transition: transform 0.3s ease;
            }

            .feature:hover {
                transform: translateY(-5px);
                box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            }

            .feature i {
                font-size: 24px;
                color: #667eea;
            }

            .feature span {
                font-size: 13px;
                font-weight: 500;
                color: #333;
            }

            /* Step Header */
            .step-header {
                display: flex;
                align-items: center;
                gap: 15px;
                margin-bottom: 25px;
            }

            .back-button {
                width: 40px;
                height: 40px;
                border-radius: 50%;
                background: white;
                border: none;
                display: flex;
                align-items: center;
                justify-content: center;
                cursor: pointer;
                color: #667eea;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                transition: all 0.3s ease;
            }

            .back-button:hover {
                transform: translateX(-2px);
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
            }

            .step-title {
                margin: 0;
                font-size: 20px;
                font-weight: bold;
                color: #333;
                flex: 1;
            }

            .step-subtitle {
                margin: 5px 0 0 55px;
                color: #666;
                font-size: 14px;
            }

            /* Search Input */
            .destination-search {
                margin-bottom: 20px;
            }

            .search-input-wrapper {
                position: relative;
            }

            .search-icon {
                position: absolute;
                left: 15px;
                top: 50%;
                transform: translateY(-50%);
                color: #666;
            }

            .search-input {
                width: 100%;
                padding: 15px 15px 15px 45px;
                border: 2px solid #e1e5e9;
                border-radius: 12px;
                font-size: 16px;
                transition: border-color 0.3s ease;
                background: white;
            }

            .search-input:focus {
                outline: none;
                border-color: #667eea;
            }

            /* Destination List */
            .destination-list {
                background: white;
                border-radius: 12px;
                overflow: hidden;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            }

            .destination-item {
                display: flex;
                align-items: center;
                gap: 15px;
                padding: 15px;
                border-bottom: 1px solid #f0f0f0;
                cursor: pointer;
                transition: background-color 0.3s ease;
            }

            .destination-item:last-child {
                border-bottom: none;
            }

            .destination-item:hover {
                background-color: #f8f9fa;
            }

            .destination-icon {
                width: 40px;
                height: 40px;
                border-radius: 50%;
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                display: flex;
                align-items: center;
                justify-content: center;
                color: white;
                flex-shrink: 0;
            }

            .destination-info {
                flex: 1;
            }

            .destination-name {
                margin: 0;
                font-size: 16px;
                font-weight: 500;
                color: #333;
            }

            .destination-services {
                margin: 5px 0 0 0;
                font-size: 13px;
                color: #666;
            }

            .destination-check {
                width: 24px;
                height: 24px;
                border-radius: 50%;
                background: #667eea;
                color: white;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            /* Tour Types */
            .tour-types {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                gap: 15px;
                margin-bottom: auto;
            }

            .tour-type {
                background: white;
                padding: 20px;
                border-radius: 12px;
                text-align: center;
                cursor: pointer;
                border: 2px solid transparent;
                transition: all 0.3s ease;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            }

            .tour-type:hover {
                transform: translateY(-2px);
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            }

            .tour-type.active {
                border-color: #667eea;
                background: linear-gradient(135deg, #667eea15 0%, #764ba215 100%);
            }

            .tour-type i {
                font-size: 32px;
                margin-bottom: 10px;
                color: #667eea;
            }

            .tour-type span {
                display: block;
                font-size: 14px;
                font-weight: 500;
                color: #333;
            }

            /* Guest Selection */
            .guest-selection {
                background: white;
                border-radius: 12px;
                padding: 20px;
                margin-bottom: auto;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            }

            .guest-type {
                display: flex;
                align-items: center;
                justify-content: space-between;
                padding: 15px 0;
                border-bottom: 1px solid #f0f0f0;
            }

            .guest-type:last-child {
                border-bottom: none;
            }

            .guest-info {
                display: flex;
                align-items: center;
                gap: 12px;
            }

            .guest-info i {
                font-size: 24px;
                color: #667eea;
            }

            .guest-info span {
                font-weight: 500;
                color: #333;
            }

            .guest-info small {
                display: block;
                color: #666;
                font-size: 12px;
                margin-top: 2px;
            }

            .guest-quantity, .room-quantity {
                display: flex;
                align-items: center;
                gap: 15px;
            }

            .quantity-btn {
                width: 36px;
                height: 36px;
                border-radius: 50%;
                background: #f8f9fa;
                border: 1px solid #dee2e6;
                color: #667eea;
                font-size: 18px;
                cursor: pointer;
                transition: all 0.3s ease;
            }

            .quantity-btn:hover {
                background: #667eea;
                color: white;
                border-color: #667eea;
            }

            .quantity-value {
                font-size: 18px;
                font-weight: 500;
                min-width: 30px;
                text-align: center;
                color: #333;
            }

            /* Room Selection */
            .room-selection {
                background: white;
                border-radius: 12px;
                padding: 20px;
                margin-bottom: auto;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
                display: flex;
                align-items: center;
                justify-content: space-between;
            }

            .room-info {
                display: flex;
                align-items: center;
                gap: 12px;
            }

            .room-info i {
                font-size: 28px;
                color: #667eea;
            }

            .room-info span {
                font-size: 18px;
                font-weight: 500;
                color: #333;
            }

            /* Date Selection */
            .date-selection {
                background: white;
                border-radius: 12px;
                padding: 20px;
                margin-bottom: auto;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            }

            .month-selector {
                display: flex;
                align-items: center;
                justify-content: space-between;
                margin-bottom: 20px;
            }

            .month-nav {
                width: 40px;
                height: 40px;
                border-radius: 50%;
                background: #f8f9fa;
                border: none;
                color: #667eea;
                font-size: 18px;
                cursor: pointer;
                transition: all 0.3s ease;
            }

            .month-nav:hover {
                background: #667eea;
                color: white;
            }

            .month-name {
                font-size: 18px;
                font-weight: 500;
                color: #333;
            }

            /* Calendar */
            .calendar {
                margin-top: 20px;
            }

            .calendar-header {
                display: grid;
                grid-template-columns: repeat(7, 1fr);
                gap: 5px;
                margin-bottom: 10px;
            }

            .day {
                text-align: center;
                font-size: 12px;
                font-weight: 500;
                color: #666;
                padding: 8px;
            }

            .calendar-days {
                display: grid;
                grid-template-columns: repeat(7, 1fr);
                gap: 5px;
            }

            .calendar-day {
                text-align: center;
                padding: 12px;
                border-radius: 8px;
                cursor: pointer;
                transition: all 0.3s ease;
                background: #f8f9fa;
                color: #333;
                font-weight: 500;
            }

            .calendar-day:hover:not(.disabled):not(.other-month) {
                background: #e9ecef;
            }

            .calendar-day.selected {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                color: white;
            }

            .calendar-day.disabled {
                opacity: 0.3;
                cursor: not-allowed;
            }

            .calendar-day.other-month {
                opacity: 0.5;
            }

            /* Step Footer */
            .step-footer {
                margin-top: 20px;
            }

            /* Primary Button */
            .primary-button {
                width: 100%;
                padding: 15px;
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                color: white;
                border: none;
                border-radius: 12px;
                font-size: 16px;
                font-weight: 500;
                cursor: pointer;
                transition: all 0.3s ease;
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 10px;
                box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
            }

            .primary-button:hover:not(:disabled) {
                transform: translateY(-2px);
                box-shadow: 0 6px 20px rgba(102, 126, 234, 0.6);
            }

            .primary-button:disabled {
                opacity: 0.5;
                cursor: not-allowed;
                transform: none;
            }

            .primary-button i {
                font-size: 18px;
            }

            /* Loading Screen */
            .loading-content {
                text-align: center;
                margin: auto;
            }

            .loading-spinner {
                margin-bottom: 20px;
            }

            .spinner {
                width: 50px;
                height: 50px;
                border: 3px solid #f3f3f3;
                border-top: 3px solid #667eea;
                border-radius: 50%;
                animation: spin 1s linear infinite;
                margin: 0 auto;
            }

            @keyframes spin {
                0% { transform: rotate(0deg); }
                100% { transform: rotate(360deg); }
            }

            /* Responsive Styles */
            @media (min-width: 768px) {
                .mobile-booking-app {
                    display: none;
                }
            }

            @media (max-width: 767px) {
                .mobile-booking-app {
                    display: block;
                }
            }
        </style>
    @endpush

    @push('js_section')
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <script>
            function mobileBookingApp() {
                return {
                    currentStep: 1,
                    selectedDestination: null,
                    selectedTourType: null,
                    adults: 0,
                    children: 0,
                    rooms: 0,
                    selectedDate: null,
                    searchQuery: '',
                    currentMonth: '',
                    calendarDays: [],
                    currentMonthIndex: new Date().getMonth(),
                    currentYear: new Date().getFullYear(),
                    destinations: {!! json_encode($theme3_destinations) !!},

                    initApp() {
                        this.loadCalendar();
                    },

                    get filteredDestinations() {
                        if (!this.searchQuery) {
                            return this.destinations;
                        }
                        return this.destinations.filter(dest => 
                            dest.name.toLowerCase().includes(this.searchQuery.toLowerCase())
                        );
                    },

                    selectDestination(id, name) {
                        this.selectedDestination = id;
                    },

                    incrementAdults() {
                        this.adults++;
                    },

                    decrementAdults() {
                        if (this.adults > 0) {
                            this.adults--;
                        }
                    },

                    incrementChildren() {
                        this.children++;
                    },

                    decrementChildren() {
                        if (this.children > 0) {
                            this.children--;
                        }
                    },

                    incrementRooms() {
                        this.rooms++;
                    },

                    decrementRooms() {
                        if (this.rooms > 0) {
                            this.rooms--;
                        }
                    },

                    loadCalendar() {
                        const monthNames = [
                            "{{ __('translate.January') }}", "{{ __('translate.February') }}",
                            "{{ __('translate.March') }}", "{{ __('translate.April') }}",
                            "{{ __('translate.May') }}", "{{ __('translate.June') }}",
                            "{{ __('translate.July') }}", "{{ __('translate.August') }}",
                            "{{ __('translate.September') }}", "{{ __('translate.October') }}",
                            "{{ __('translate.November') }}", "{{ __('translate.December') }}"
                        ];

                        this.currentMonth = `${monthNames[this.currentMonthIndex]} ${this.currentYear}`;

                        const firstDay = new Date(this.currentYear, this.currentMonthIndex, 1);
                        const lastDay = new Date(this.currentYear, this.currentMonthIndex + 1, 0);
                        const prevLastDay = new Date(this.currentYear, this.currentMonthIndex, 0);
                        
                        const firstDayOfWeek = firstDay.getDay();
                        const totalDays = lastDay.getDate();
                        const prevTotalDays = prevLastDay.getDate();

                        const days = [];

                        for (let i = firstDayOfWeek - 1; i >= 0; i--) {
                            days.push({
                                day: prevTotalDays - i,
                                available: false,
                                isOtherMonth: true
                            });
                        }

                        for (let i = 1; i <= totalDays; i++) {
                            days.push({
                                day: i,
                                available: true,
                                isOtherMonth: false
                            });
                        }

                        const remainingDays = 42 - (firstDayOfWeek + totalDays);
                        for (let i = 1; i <= remainingDays; i++) {
                            days.push({
                                day: i,
                                available: false,
                                isOtherMonth: true
                            });
                        }

                        this.calendarDays = days;
                    },

                    previousMonth() {
                        this.currentMonthIndex--;
                        if (this.currentMonthIndex < 0) {
                            this.currentMonthIndex = 11;
                            this.currentYear--;
                        }
                        this.loadCalendar();
                    },

                    nextMonth() {
                        this.currentMonthIndex++;
                        if (this.currentMonthIndex > 11) {
                            this.currentMonthIndex = 0;
                            this.currentYear++;
                        }
                        this.loadCalendar();
                    },

                    selectDate(index) {
                        const day = this.calendarDays[index];
                        if (day.available) {
                            this.selectedDate = index;
                        }
                    },

                    async submitBooking() {
                        this.currentStep = 7;

                        await new Promise(resolve => setTimeout(resolve, 2000));

                        const params = new URLSearchParams({
                            destination_id: this.selectedDestination,
                            tour_type: this.selectedTourType,
                            adults: this.adults,
                            children: this.children,
                            rooms: this.rooms,
                            month: this.currentMonthIndex + 1,
                            year: this.currentYear
                        });

                        window.location.href = `{{ route('front.tourbooking.services') }}?${params.toString()}`;
                    }
                };
            }
        </script>
    @endpush
@endif