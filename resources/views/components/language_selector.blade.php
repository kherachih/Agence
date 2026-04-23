<div class="tg-header-lang-wrapper ml-15 mr-15 d-none d-sm-flex align-items-center">
    <div class="header-lang-display d-flex align-items-center" style="position: relative; z-index: 1; pointer-events: none;">
        <i class="fas fa-globe me-2"></i>
        <span class="lang-code" style="font-weight: 700; font-size: 14px;">{{ strtoupper(session('front_lang', app()->getLocale())) }}</span>
    </div>
    <select class="language_code select header-lang-select" name="language_code" onchange="window.location.href = '{{ route('language-switcher') }}' + '?lang_code=' + this.value">
        @foreach($language_list ?? [] as $lang)
            <option value="{{ $lang->lang_code }}" {{ session('front_lang') == $lang->lang_code ? 'selected' : '' }}>
                {{ strtoupper($lang->lang_code) }}
            </option>
        @endforeach
    </select>
</div>

<style>
    .tg-header-lang-wrapper {
        border: 1px solid rgba(255, 255, 255, 0.4);
        border-radius: 30px; /* Pill shaped */
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(5px);
        -webkit-backdrop-filter: blur(5px);
        transition: all 0.3s ease;
        height: 38px;
        padding: 0 15px !important;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        color: #fff !important;
        cursor: pointer;
        min-width: 80px;
    }
    .tg-header-lang-wrapper:hover {
        background: rgba(255, 255, 255, 0.2);
        border-color: #fff;
        transform: scale(1.05);
    }
    
    /* NiceSelect Styling - Hidden but functional */
    .header-lang-select.nice-select {
        background: transparent !important;
        border: none !important;
        color: transparent !important;
        height: 100% !important;
        width: 100% !important;
        position: absolute !important;
        top: 0;
        left: 0;
        padding: 0 !important;
        margin: 0 !important;
        z-index: 2;
    }
    .header-lang-select.nice-select .current {
        display: none !important;
    }
    .header-lang-select.nice-select:after {
        display: none !important;
    }
    
    .header-lang-select.nice-select .list {
        background-color: #fff !important;
        border-radius: 12px !important;
        box-shadow: 0 10px 40px rgba(0,0,0,0.2) !important;
        margin-top: 10px !important;
        color: #2d3436 !important;
        border: 1px solid rgba(0,0,0,0.05) !important;
        width: 100px !important; 
        left: 50% !important;
        transform: translateX(-50%) !important;
        overflow: hidden;
        z-index: 9999 !important;
    }
    .header-lang-select.nice-select .option {
        padding: 10px 15px !important;
        font-weight: 700 !important;
        font-size: 14px !important;
        transition: all 0.2s ease !important;
        line-height: 1.5 !important;
        text-align: center !important;
        display: block !important;
    }
    .header-lang-select.nice-select .option:hover, 
    .header-lang-select.nice-select .option.selected.focus {
        color: #be3144 !important;
        background-color: rgba(190, 49, 68, 0.05) !important;
    }

    /* Sticky/Dark Header behavior if needed */
    .header-sticky .tg-header-lang-wrapper {
        /* Optional: Change colors when header becomes sticky */
    }
</style>
