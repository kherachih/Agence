# Project: Laravel Multi-purpose Modular Platform

## Project Overview
This is a robust, modular web application built with **Laravel 10**. It features a custom CMS architecture with theme support and a extensive set of modules for various functionalities including E-commerce, LMS (Courses), and Booking (Tour Booking).

### Main Technologies
- **Backend:** Laravel 10 (PHP ^8.1)
- **Modular System:** [nwidart/laravel-modules](https://github.com/nwidart/laravel-modules)
- **Frontend Scaffolding:** Laravel UI
- **Database:** MySQL (default)
- **Key Libraries:**
    - `barryvdh/laravel-dompdf`: PDF generation
    - `intervention/image`: Image processing
    - `laravel/sanctum`: API authentication
    - `laravel/socialite`: Social authentication
    - `nwidart/laravel-modules`: Modular architecture
    - Payment Gateways: Stripe, PayPal, Mollie, Razorpay

### Architecture & Structure
- **`app/`**: Core application logic (Controllers, Models, Middleware).
- **`Modules/`**: Independent functional modules (e.g., Blog, Ecommerce, Course, TourBooking).
- **`Cms/`**: Custom CMS logic, specifically containing `themes/`.
- **`routes/`**: Main application routes (`web.php`, `admin.php`, etc.).
- **`app/Helpers/`**: Custom utility helpers (`helper.php`, `ThemeHelper.php`).

---

## Building and Running

### Prerequisites
- PHP ^8.1
- Composer
- Node.js & NPM
- MySQL

### Setup Instructions
1. **Install PHP Dependencies:**
   ```bash
   composer install
   ```
2. **Install JS Dependencies:**
   ```bash
   npm install
   ```
3. **Configure Environment:**
   ```bash
   cp .env.example .env
   # Update database credentials and other settings in .env
   ```
4. **Generate Application Key:**
   ```bash
   php artisan key:generate
   ```
5. **Run Migrations & Seeders:**
   ```bash
   php artisan migrate --seed
   ```
6. **Compile Assets:**
   ```bash
   npm run dev
   # OR for production
   npm run build
   ```
7. **Start the Server:**
   ```bash
   php artisan serve
   ```

### Key Artisan Commands
- **Modules:**
    - `php artisan module:list`: List all modules.
    - `php artisan module:migrate {module}`: Run migrations for a specific module.
    - `php artisan module:seed {module}`: Seed a specific module.
- **Maintenance:**
    - `php artisan cache:clear`
    - `php artisan config:clear`
    - `php artisan view:clear`

---

## Development Conventions

### Coding Standards
- Follows **PSR-4** autoloading standards.
- **Pint** is used for PHP code styling (check `package.json` and `composer.json`).
- Business logic is often decoupled into Modules found in the `Modules/` directory.

### Routing
- Main routes are defined in `routes/web.php`.
- The application uses a custom theme switcher (`HomeController::switchTheme`).
- Middleware like `HtmlSpecialchars` and `MaintenanceMode` are applied globally to many routes.

### Helpers
- Use `app/Helpers/helper.php` for global utility functions.
- Use `app/Helpers/ThemeHelper.php` for theme-related logic.

### Themes
- Themes are managed under `Cms/themes/`. Switching themes updates the active frontend assets and views.
