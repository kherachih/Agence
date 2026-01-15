<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MenuVisibilitySetting;

class MenuVisibilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menuSections = [
            // Main Dashboard
            ['menu_key' => 'dashboard', 'menu_label' => 'Dashboard', 'order' => 1],

            // Financial
            ['menu_key' => 'manage_withdraw', 'menu_label' => 'Manage Withdraw', 'order' => 2],

            // Users & Agencies
            ['menu_key' => 'manage_agency', 'menu_label' => 'Manage Agency', 'order' => 3],
            ['menu_key' => 'manage_user', 'menu_label' => 'Manage User', 'order' => 4],
            ['menu_key' => 'contact_message', 'menu_label' => 'Contact Message', 'order' => 5],
            ['menu_key' => 'support_ticket', 'menu_label' => 'Support Ticket', 'order' => 6],

            // Team & Users Section
            ['menu_key' => 'manage_team', 'menu_label' => 'Manage Team', 'order' => 7],
            ['menu_key' => 'manage_users', 'menu_label' => 'Manage Users', 'order' => 8],

            // CMS & Blogs
            ['menu_key' => 'manage_blog', 'menu_label' => 'Manage Blog', 'order' => 9],
            ['menu_key' => 'manage_pages', 'menu_label' => 'Manage Pages', 'order' => 10],
            ['menu_key' => 'manage_content', 'menu_label' => 'Manage Content', 'order' => 11],

            // Settings & Configuration
            ['menu_key' => 'general_setting', 'menu_label' => 'Setting', 'order' => 12],
            ['menu_key' => 'multi_currency', 'menu_label' => 'Multi Currency', 'order' => 13],
            ['menu_key' => 'language', 'menu_label' => 'Language', 'order' => 14],
            ['menu_key' => 'email_configuration', 'menu_label' => 'Email Configuration', 'order' => 15],
            ['menu_key' => 'website_setup', 'menu_label' => 'Website Setup', 'order' => 16],
            ['menu_key' => 'seo_setup', 'menu_label' => 'SEO Setup', 'order' => 17],
            ['menu_key' => 'payment_method', 'menu_label' => 'Payment Method', 'order' => 18],
            ['menu_key' => 'theme_management', 'menu_label' => 'Theme Management', 'order' => 19],
            ['menu_key' => 'menu_management', 'menu_label' => 'Menu Management', 'order' => 20],

            // Others
            ['menu_key' => 'newsletter', 'menu_label' => 'Newsletter', 'order' => 21],
            ['menu_key' => 'cache_clear', 'menu_label' => 'Cache Clear', 'order' => 22],
        ];

        foreach ($menuSections as $section) {
            MenuVisibilitySetting::updateOrCreate(
                ['menu_key' => $section['menu_key']],
                [
                    'menu_label' => $section['menu_label'],
                    'is_enabled' => true,
                    'order' => $section['order'],
                ]
            );
        }
    }
}
