# Guide de Test du Système de Types de Chambres

## Vue d'ensemble
Ce guide vous explique comment tester le système de types de chambres que nous avons implémenté. Le système permet aux administrateurs de configurer différents types de chambres avec suppléments de prix pour chaque service, et aux clients de sélectionner leur type de chambre préféré lors de la réservation.

## Prérequis

### 1. Exécuter les Migrations de Base de Données

Avant de tester, vous devez exécuter les migrations pour créer les tables nécessaires:

```bash
php artisan migrate
```

Les migrations suivantes seront exécutées:
- `2026_01_05_000000_create_room_types_table.php` - Crée la table `room_types`
- `2026_01_05_000001_add_room_type_id_to_bookings_table.php` - Ajoute la colonne `room_type_id` à la table `bookings`

## Étapes de Test

### Étape 1: Configuration des Types de Chambres (Admin)

1. Connectez-vous au panneau d'administration
2. Naviguez vers: **Tour Booking** > **Services**
3. Cliquez sur **Edit** sur un service existant ou **Create** pour un nouveau service
4. Faites défiler jusqu'à la section **Room Types**
5. Configurez les types de chambres:

   **Pour chaque type de chambre:**
   - **Room Type**: Sélectionnez le type (Single, Double, Triple, Double Shared)
   - **Price Supplement**: Entrez le supplément de prix (ex: 70 pour $70 de plus)
   - **Capacity**: Entrez la capacité de la chambre (nombre de personnes)
   - **Status**: Activez ou désactivez le type de chambre
   - **Description**: Ajoutez une description optionnelle

6. Cliquez sur **Add Room Type** pour ajouter d'autres types
7. Cliquez sur **Update Service** pour sauvegarder

**Exemple de configuration:**
```
Single Room: $0 supplement, Capacity: 1
Double Room: $70 supplement, Capacity: 2
Triple Room: $100 supplement, Capacity: 3
Double Room (Shared): $50 supplement, Capacity: 2
```

### Étape 2: Test du Frontend - Page de Détail du Service

1. Allez sur la page de détail d'un service configuré
2. Localisez le formulaire de réservation
3. Vous devriez voir un menu déroulant **Room Type**
4. Sélectionnez différents types de chambres
5. Observez que le **Total Cost** se met à jour automatiquement pour inclure le supplément

**Calcul du prix:**
```
Total = (Adult Price × Adults) + (Child Price × Children) + Room Supplement
```

### Étape 3: Test du Frontend - Page de Checkout

1. Cliquez sur **Book Now** sur la page de détail du service
2. Remplissez les informations du client
3. Dans la section **Room Type**, sélectionnez un type de chambre
4. Vérifiez que le **Room Supplement** s'affiche dans le récapitulatif de commande
5. Vérifiez que le **Total** inclut correctement le supplément

### Étape 4: Vérification de la Base de Données

Après une réservation, vérifiez que les données sont correctement stockées:

```sql
-- Vérifier les types de chambres configurés
SELECT * FROM room_types WHERE service_id = [service_id];

-- Vérifier les réservations avec type de chambre
SELECT b.*, rt.type, rt.price_supplement 
FROM bookings b 
LEFT JOIN room_types rt ON b.room_type_id = rt.id 
WHERE b.id = [booking_id];
```

## Scénarios de Test

### Scénario 1: Réservation avec Chambre Double
- Prix de base: $180
- Supplément chambre double: $70
- Total attendu: $250

### Scénario 2: Réservation avec Chambre Triple
- Prix de base: $180
- Supplément chambre triple: $100
- Total attendu: $280

### Scénario 3: Réservation avec Chambre Simple
- Prix de base: $180
- Supplément chambre simple: $0
- Total attendu: $180

### Scénario 4: Réservation avec Chambre Double Partagée
- Prix de base: $180
- Supplément chambre double partagée: $50
- Total attendu: $230

## Dépannage

### Problème: "Cannot access offset of type string on string"

**Cause:** Ce problème a été corrigé dans la dernière version. Assurez-vous d'avoir les fichiers mis à jour:
- `Modules/TourBooking/resources/views/admin/services/edit.blade.php`
- `Modules/TourBooking/resources/views/agency/services/edit.blade.php`

**Solution:** Les fichiers utilisent maintenant la syntaxe d'objet `$roomType->type` au lieu de `$roomType['type']`.

### Problème: Les types de chambres ne s'affichent pas dans le formulaire

**Vérifications:**
1. Assurez-vous que les migrations ont été exécutées
2. Vérifiez que le service a des types de chambres configurés
3. Vérifiez que les types de chambres sont actifs (`is_active = 1`)

### Problème: Le prix total ne se met pas à jour

**Vérifications:**
1. Vérifiez que JavaScript est activé dans le navigateur
2. Vérifiez qu'il n'y a pas d'erreurs dans la console du navigateur (F12)
3. Vérifiez que les attributs `data-supplement` sont corrects dans le HTML

### Problème: Le supplément de chambre n'est pas sauvegardé

**Vérifications:**
1. Vérifiez que le formulaire inclut le champ `room_type_id`
2. Vérifiez que le contrôleur traite correctement les données de type de chambre
3. Vérifiez les logs Laravel pour les erreurs

## Structure de la Base de Données

### Table `room_types`

| Colonne | Type | Description |
|---------|------|-------------|
| id | bigint | ID unique |
| service_id | bigint | ID du service (foreign key) |
| type | enum | single, double, triple, double_shared |
| price_supplement | decimal | Supplément de prix |
| capacity | int | Capacité de la chambre |
| description | text | Description optionnelle |
| is_active | boolean | Statut actif/inactif |
| created_at | timestamp | Date de création |
| updated_at | timestamp | Date de mise à jour |

### Table `bookings` (colonne ajoutée)

| Colonne | Type | Description |
|---------|------|-------------|
| room_type_id | bigint (nullable) | ID du type de chambre (foreign key) |

## Fonctionnalités Implémentées

### Admin Panel
- ✅ Création de types de chambres lors de la création d'un service
- ✅ Édition des types de chambres existants
- ✅ Ajout dynamique de nouveaux types de chambres
- ✅ Suppression de types de chambres
- ✅ Activation/désactivation des types de chambres

### Frontend - Page de Détail
- ✅ Sélection de type de chambre dans le formulaire de réservation
- ✅ Affichage du supplément de prix
- ✅ Calcul automatique du total avec le supplément

### Frontend - Page de Checkout
- ✅ Sélection de type de chambre
- ✅ Affichage du supplément dans le récapitulatif
- ✅ Mise à jour dynamique du total

### Backend
- ✅ Stockage du type de chambre sélectionné dans la réservation
- ✅ Calcul du prix avec supplément
- ✅ Validation du type de chambre
- ✅ Relations Eloquent entre les modèles

## Prochaines Étapes

Une fois le test réussi, vous pouvez envisager:
1. Ajouter des traductions pour les noms de types de chambres
2. Ajouter des images pour chaque type de chambre
3. Implémenter des règles de disponibilité par type de chambre
4. Ajouter des rapports sur les types de chambres les plus réservés
5. Implémenter des promotions sur certains types de chambres

## Support

Si vous rencontrez des problèmes lors du test:
1. Vérifiez les logs Laravel: `storage/logs/laravel.log`
2. Vérifiez la console du navigateur pour les erreurs JavaScript
3. Vérifiez que toutes les migrations ont été exécutées
4. Vérifiez que les fichiers ont été correctement mis à jour

## Conclusion

Le système de types de chambres est maintenant entièrement implémenté et prêt à être testé. Suivez les étapes ci-dessus pour vérifier que tout fonctionne correctement. N'hésitez pas à nous faire part de tout problème ou suggestion d'amélioration.
