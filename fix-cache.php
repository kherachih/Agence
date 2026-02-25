<?php
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

echo "<h1>Laravel Fix Tool</h1>";

try {
    echo "Clearing View Cache... ";
    Artisan::call('view:clear');
    echo "Done.<br>";

    echo "Clearing Cache... ";
    Artisan::call('cache:clear');
    echo "Done.<br>";

    echo "Clearing Config Cache... ";
    Artisan::call('config:clear');
    echo "Done.<br>";

    echo "Clearing Route Cache... ";
    Artisan::call('route:clear');
    echo "Done.<br>";
    
    echo "Running Optimize... ";
    Artisan::call('optimize');
    echo "Done.<br>";

    echo "<br><br><b>All caches cleared successfully!</b>";
} catch (\Exception $e) {
    echo "<br><br><b style='color:red'>Error: " . $e->getMessage() . "</b>";
}
