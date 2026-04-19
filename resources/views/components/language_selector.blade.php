<div class="tg-header-lang-wrapper ml-15 d-none d-sm-flex align-items-center">
    <div class="header-lang-icon" style="color: inherit; opacity: 0.9; font-size: 16px;">
        <i class="fas fa-globe"></i>
    </div>
    <select class="language_code select header-lang-select" name="language_code">
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
        border-radius: 50%; /* Circular button */
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(5px);
        -webkit-backdrop-filter: blur(5px);
        transition: all 0.3s ease;
        height: 40px;
        width: 40px !important;
        min-width: 40px !important;
        padding: 0 !important;
        justify-content: center !important;
        position: relative;
        color: #fff !important;
        cursor: pointer;
    }
    .tg-header-lang-wrapper:hover {
        background: rgba(255, 255, 255, 0.2);
        border-color: #fff;
        transform: scale(1.05);
    }
    
    /* NiceSelect Styling - Icon Only Mode */
    .header-lang-select.nice-select {
        background: transparent !important;
        border: none !important;
        color: transparent !important; /* Hides the current text */
        height: 100% !important;
        width: 100% !important;
        position: absolute !important;
        top: 0;
        left: 0;
        padding: 0 !important;
        margin: 0 !important;
    }
    .header-lang-select.nice-select .current {
        display: none !important; /* Forces text hidden */
    }
    .header-lang-select.nice-select:after {
        display: none !important; /* Hides the small arrow */
    }
    
    .header-lang-select.nice-select .list {
        background-color: #fff !important;
        border-radius: 12px !important;
        box-shadow: 0 10px 40px rgba(0,0,0,0.2) !important;
        margin-top: 15px !important;
        color: #2d3436 !important;
        border: 1px solid rgba(0,0,0,0.05) !important;
        width: 80px !important; 
        left: 50% !important;
        transform: translateX(-50%) !important;
        overflow: hidden;
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
    /* Sticky Header override - keeps it readable if needed, but user asked for white */
    .header-sticky .tg-header-lang-wrapper {
        /* If you want it to change color when sticky, uncomment below */
        /* border-color: rgba(0,0,0,0.2); 
           color: #2d3436 !important; */
    }
    .header-sticky .header-lang-select.nice-select:after {
        /* border-color: #2d3436 !important; */
    }
</style>
