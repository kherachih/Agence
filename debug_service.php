<?php
use Modules\TourBooking\App\Models\Service;
use Illuminate\Support\Facades\Schema;

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

header('Content-Type: text/plain');
echo "--- DIAGNOSTIC SERVICE ---\n";

$id = $_GET['id'] ?? 2;

try {
    echo "1. Verification de la base de données...\n";
    if (Schema::hasTable('services')) {
        echo "Table 'services' existe.\n";
    } else {
        echo "ERREUR: Table 'services' introuvable !\n";
    }

    echo "\n2. Tentative de chargement du Service ID: $id...\n";
    $service = Service::find($id);
    
    if (!$service) {
        die("ERREUR: Service avec l'ID $id non trouvé dans la base de données.\n");
    }
    echo "Service trouvé: " . $service->title . "\n";

    echo "\n3. Chargement des relations...\n";
    // On teste une par une pour voir laquelle plante
    $relations = ['translation', 'serviceType', 'destination', 'thumbnail', 'media', 'extraCharges', 'availabilities', 'itineraries'];
    foreach ($relations as $rel) {
        try {
            echo "Chargement de '$rel'... ";
            $service->load($rel);
            echo "OK\n";
        } catch (\Exception $e) {
            echo "ECHEC ! Erreur: " . $e->getMessage() . "\n";
        }
    }

    echo "\n4. Test du rendu de la vue...\n";
    try {
        $view = view('tourbooking::admin.services.show', compact('service'))->render();
        echo "Vue générée avec succès ! (Longueur: " . strlen($view) . " caractères)\n";
    } catch (\Exception $e) {
        echo "ERREUR DE VUE: " . $e->getMessage() . "\n";
        echo "Fichier: " . $e->getFile() . " à la ligne " . $e->getLine() . "\n";
    }

} catch (\Throwable $e) {
    echo "\nFATAL ERROR: " . $e->getMessage() . "\n";
    echo "Fichier: " . $e->getFile() . " à la ligne " . $e->getLine() . "\n";
    echo "Stack trace:\n" . $e->getTraceAsString() . "\n";
}
