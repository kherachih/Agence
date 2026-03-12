<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$s = \Modules\TourBooking\App\Models\Service::where('slug', 'two-hour-walking-tour-of-manhattan')->first();
echo json_encode([
    'adult_price' => $s->adult_price,
    'discount_adult_price' => $s->discount_adult_price,
    'adult_discount_percentage' => $s->adult_discount_percentage,
    'price_per_person' => $s->price_per_person,
    'full_price' => $s->full_price,
    'discount_price' => $s->discount_price,
    'periods' => $s->availability_periods()->get(['id', 'adult_price', 'discount_adult_price', 'adult_discount_percentage', 'start_date', 'end_date'])->toArray()
], JSON_PRETTY_PRINT);
