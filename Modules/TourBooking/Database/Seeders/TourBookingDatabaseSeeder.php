<?php

namespace Modules\TourBooking\Database\Seeders;

use Illuminate\Database\Seeder;

class TourBookingDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            ContinentSeeder::class,
            ServiceTypeSeeder::class,
            DestinationSeeder::class,
        ]);
    }
}
