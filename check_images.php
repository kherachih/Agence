<?php

use Modules\TourBooking\App\Models\Service;
use Illuminate\Support\Facades\Cache;

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$slug = 'two-hour-walking-tour-of-manhattan';
$service = Service::where('slug', $slug)->first();

if (!$service) {
    echo "Service found not.\n";
    exit;
}

echo "Service: " . $service->title . "\n";

// Check Logo
$general_setting = Cache::get('setting');
if ($general_setting && $general_setting->logo) {
    $logoPath = public_path($general_setting->logo);
    echo "Logo Path: $logoPath\n";
    if (file_exists($logoPath)) {
        echo "Logo File exists.\n";
        $size = getimagesize($logoPath);
        if ($size) {
            echo "Logo is valid image: " . $size['mime'] . "\n";
        } else {
            echo "Logo is INVALID image.\n";
        }
    } else {
        echo "Logo File missing.\n";
    }
} else {
    echo "No logo set.\n";
}

// Check Thumbnail
$thumbnail = $service->media->where('is_thumbnail', 1)->first();
if ($thumbnail) {
    $thumbPath = public_path('storage/' . $thumbnail->file_path);
    echo "Thumbnail Path: $thumbPath\n";
    if (file_exists($thumbPath)) {
        echo "Thumbnail File exists.\n";
        $size = getimagesize($thumbPath);
        if ($size) {
            echo "Thumbnail is valid image: " . $size['mime'] . "\n";
        } else {
            echo "Thumbnail is INVALID image.\n";
        }
    } else {
        echo "Thumbnail File missing.\n";
    }
} else {
    echo "No thumbnail set.\n";
}

// Check Itinerary Images
foreach ($service->itineraries as $itinerary) {
    if ($itinerary->image) {
        $imgPath = public_path('storage/' . $itinerary->image);
        echo "Itinerary Day " . $itinerary->day_number . " Image Path: $imgPath\n";
        if (file_exists($imgPath)) {
            echo "Itinerary Image exists.\n";
            $size = getimagesize($imgPath);
            if ($size) {
                echo "Itinerary Image is valid: " . $size['mime'] . "\n";
            } else {
                echo "Itinerary Image is INVALID.\n";
            }
        } else {
            echo "Itinerary Image missing.\n";
        }
    }
}
