<?php

namespace Modules\TourBooking\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\TourBooking\App\Models\Continent;

class ContinentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $continents = [
            [
                'name' => 'Africa',
                'slug' => 'africa',
                'code' => 'AF',
                'description' => 'Discover the beauty of Africa with its diverse wildlife, stunning landscapes, and rich cultural heritage.',
                'icon' => 'fas fa-globe-africa',
                'ordering' => 1,
                'status' => true,
            ],
            [
                'name' => 'Asia',
                'slug' => 'asia',
                'code' => 'AS',
                'description' => 'Explore the ancient wonders and modern marvels of the world\'s largest continent.',
                'icon' => 'fas fa-globe-asia',
                'ordering' => 2,
                'status' => true,
            ],
            [
                'name' => 'Europe',
                'slug' => 'europe',
                'code' => 'EU',
                'description' => 'Experience the rich history, art, and culture of Europe\'s diverse countries.',
                'icon' => 'fas fa-globe-europe',
                'ordering' => 3,
                'status' => true,
            ],
            [
                'name' => 'North America',
                'slug' => 'north-america',
                'code' => 'NA',
                'description' => 'From bustling cities to breathtaking natural wonders, North America has it all.',
                'icon' => 'fas fa-globe-americas',
                'ordering' => 4,
                'status' => true,
            ],
            [
                'name' => 'South America',
                'slug' => 'south-america',
                'code' => 'SA',
                'description' => 'Adventure awaits in South America with its rainforests, mountains, and ancient ruins.',
                'icon' => 'fas fa-globe-americas',
                'ordering' => 5,
                'status' => true,
            ],
            [
                'name' => 'Oceania',
                'slug' => 'oceania',
                'code' => 'OC',
                'description' => 'Discover the unique landscapes and marine life of Australia and the Pacific Islands.',
                'icon' => 'fas fa-water',
                'ordering' => 6,
                'status' => true,
            ],
            [
                'name' => 'Antarctica',
                'slug' => 'antarctica',
                'code' => 'AN',
                'description' => 'Journey to the ends of the Earth and witness the pristine beauty of Antarctica.',
                'icon' => 'fas fa-snowflake',
                'ordering' => 7,
                'status' => true,
            ],
        ];

        foreach ($continents as $continent) {
            Continent::create($continent);
        }
    }
}
