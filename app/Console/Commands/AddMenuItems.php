<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Menu;
use App\Models\MenuItem;

class AddMenuItems extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'menu:add-items {--menu-location=primary_menu : The menu location}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add Destinations and Request Quote items to the menu';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $menuLocation = $this->option('menu-location');
        
        // Find the menu by location
        $menu = Menu::where('location', $menuLocation)->where('status', 1)->first();
        
        if (!$menu) {
            $this->error("Menu with location '{$menuLocation}' not found!");
            $this->info("Available menus:");
            $menus = Menu::where('status', 1)->get();
            foreach ($menus as $m) {
                $this->info("- ID: {$m->id}, Name: {$m->name}, Location: {$m->location}");
            }
            return Command::FAILURE;
        }
        
        $this->info("Found menu: {$menu->name} (ID: {$menu->id})");
        
        // Get the max order
        $maxOrder = MenuItem::where('menu_id', $menu->id)->max('order') ?? 0;
        
        // Check if Destinations already exists
        $destinationsExists = MenuItem::where('menu_id', $menu->id)
            ->where('title', 'Destinations')
            ->exists();
            
        if (!$destinationsExists) {
            $maxOrder++;
            MenuItem::create([
                'menu_id' => $menu->id,
                'title' => 'Destinations',
                'url' => route('front.tourbooking.destinations'),
                'target' => '_self',
                'icon_class' => '',
                'parent_id' => 0,
                'order' => $maxOrder,
                'type' => 'custom',
                'type_id' => 0,
                'css_class' => '',
                'status' => 1,
            ]);
            $this->info("✓ Added 'Destinations' menu item");
        } else {
            $this->warn("'Destinations' menu item already exists");
        }
        
        // Check if Request Quote already exists
        $quoteExists = MenuItem::where('menu_id', $menu->id)
            ->where('title', 'Request Quote')
            ->exists();
            
        if (!$quoteExists) {
            $maxOrder++;
            MenuItem::create([
                'menu_id' => $menu->id,
                'title' => 'Request Quote',
                'url' => route('quote-request.form'),
                'target' => '_self',
                'icon_class' => '',
                'parent_id' => null,
                'order' => $maxOrder,
                'type' => 'custom',
                'type_id' => null,
                'css_class' => '',
                'status' => 1,
            ]);
            $this->info("✓ Added 'Request Quote' menu item");
        } else {
            $this->warn("'Request Quote' menu item already exists");
        }
        
        $this->info("\nMenu items have been successfully added!");
        
        return Command::SUCCESS;
    }
}