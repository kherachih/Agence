<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;
use App\Models\MenuItem;
use Illuminate\Support\Str;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Find the primary menu by location (it might already exist)
        $menu = Menu::where('location', 'primary_menu')->first();
        
        if (!$menu) {
            // If no menu with primary_menu location exists, create one
            $menu = Menu::create([
                'name' => 'Primary Menu',
                'slug' => 'primary_menu',
                'location' => 'primary_menu',
                'description' => 'Main navigation menu for the website header',
                'status' => 1
            ]);
        }

        // Check if Destinations menu item already exists
        $destinationsExists = MenuItem::where('menu_id', $menu->id)
            ->where('title', 'Destinations')
            ->exists();

        if (!$destinationsExists) {
            // Get the highest order for new items
            $maxOrder = MenuItem::where('menu_id', $menu->id)
                ->where('parent_id', 0)
                ->max('order') ?? 0;

            // Add Destinations menu item
            MenuItem::create([
                'menu_id' => $menu->id,
                'title' => 'Destinations',
                'url' => '/destinations',
                'target' => '_self',
                'icon_class' => '',
                'parent_id' => 0,
                'order' => $maxOrder + 1,
                'type' => 'custom',
                'type_id' => null,
                'css_class' => '',
                'status' => 1
            ]);
        }

        // Check if Request Quote menu item already exists
        $requestQuoteExists = MenuItem::where('menu_id', $menu->id)
            ->where('title', 'Request Quote')
            ->exists();

        if (!$requestQuoteExists) {
            // Get the highest order for new items
            $maxOrder = MenuItem::where('menu_id', $menu->id)
                ->where('parent_id', 0)
                ->max('order') ?? 0;

            // Add Request Quote menu item
            MenuItem::create([
                'menu_id' => $menu->id,
                'title' => 'Request Quote',
                'url' => '/quote-request',
                'target' => '_self',
                'icon_class' => '',
                'parent_id' => 0,
                'order' => $maxOrder + 1,
                'type' => 'custom',
                'type_id' => null,
                'css_class' => '',
                'status' => 1
            ]);
        }
    }
}