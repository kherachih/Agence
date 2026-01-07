# 🚨 IMPORTANT - Instructions pour Activer le Système de Passagers

## Problème Actuel
Vous ne voyez PAS les boutons "Add Passengers" ni l'alerte "Action Required: Complete Passenger Information" car les migrations n'ont pas été exécutées.

## ✅ Solution : Exécuter les Migrations

### Étape 1 : Exécuter les migrations

Ouvrez votre terminal dans le dossier du projet et exécutez :

```bash
php artisan migrate
```

Cela va :
1. Créer la table `passengers`
2. Ajouter les champs `passenger_info_status` et `passenger_info_completed_at` à la table `bookings`

### Étape 2 : Vérifier que les migrations ont réussi

Vous devriez voir un message comme :
```
Migrating: 2026_01_07_000000_create_passengers_table.php
Migrating: 2026_01_07_000001_add_passenger_info_status_to_bookings_table.php
Migrated:  2026_01_07_000000_create_passengers_table.php
Migrated:  2026_01_07_000001_add_passenger_info_status_to_bookings_table.php
```

### Étape 3 : Vérifier dans la base de données

Allez dans phpMyAdmin ou votre outil de gestion de base de données et vérifiez :

1. **Table `passengers` existe-t-elle ?**
   ```sql
   SHOW TABLES LIKE 'passengers';
   ```

2. **Champs existent-ils dans `bookings` ?**
   ```sql
   SHOW COLUMNS FROM bookings LIKE 'passenger_info%';
   ```
   
   Vous devriez voir :
   - `passenger_info_status` (enum: 'pending', 'completed', default: 'pending')
   - `passenger_info_completed_at` (timestamp, nullable)

## 🔄 Après les Migrations

Une fois les migrations exécutées, vous verrez :

### 1. Sur le Tableau de Bord Utilisateur

✅ **Alerte jaune en haut de page** : "Action Required: Complete Passenger Information"
   - Cette alerte s'affiche automatiquement pour toutes les réservations avec paiement complété mais infos passagers manquantes

✅ **Bouton "Add Passengers" dans la liste**
   - Chaque réservation concernée aura un bouton jaune
   - Cliquez dessus pour aller au formulaire

### 2. Sur la Page "Booking Details"

✅ **Alerte jaune** : "Action Required: Complete Passenger Information"
   - S'affiche si paiement complété mais infos passagers manquantes

✅ **Bouton "Add Passenger Information Now"** (bouton jaune)
   - Dans l'alerte et dans la section "Actions"

## 📋 Comment Utiliser le Système

### Flux Complet

1. **Faites une réservation** avec 2, 3 ou 4 passagers
2. **Complétez le paiement** (Stripe, PayPal, etc.)
3. **Redirection automatique** vers le tableau de bord utilisateur
4. **Alerte s'affiche** : "Action Required: Complete Passenger Information"
5. **Cliquez sur "Add Passengers"** (dans la liste ou sur les détails)
6. **Formulaire s'ouvre** avec autant de sections que de passagers
7. **Pour chaque passager, remplissez :**
   - ✅ First Name (Prénom) - OBLIGATOIRE
   - ✅ Last Name (Nom) - OBLIGATOIRE
   - ✅ Passport Copy (Fichier passeport) - OBLIGATOIRE
   - ⚪ Travel Insurance (Assurance) - Optionnel
   - Autres informations optionnelles
8. **Cliquez sur "Save Passenger Information"**
9. **Confirmation** et redirection vers la page de détails
10. **Le bouton change** à "View Passengers"

## 🔧 Si les migrations échouent

### Erreur : "Base table or view not found"

Si vous voyez cette erreur, c'est que la table `bookings` n'existe pas.

**Solution :**
```bash
# Créez d'abord la table bookings si elle n'existe pas
php artisan migrate:rollback --step=0
# Puis réexécutez
php artisan migrate
```

### Erreur : "SQLSTATE[42S02]: Base table or view not found"

Cela peut arriver si la table `bookings` a été modifiée manuellement.

**Solution :**
```bash
# Vérifiez les migrations en attente
php artisan migrate:status

# Si des migrations sont en attente, forcez-les
php artisan migrate --force
```

## 📁 Vérification des Permissions

Assurez-vous que les dossiers de stockage existent :

```bash
# Vérifiez le dossier passengers
ls -la storage/app/public/passengers/

# Si le dossier n'existe pas, créez-le
mkdir -p storage/app/public/passengers/passports
mkdir -p storage/app/public/passengers/insurance

# Donnez les permissions
chmod -R 755 storage/app/public/passengers/
```

## 🧪 Tester le Système

### Test 1 : Vérifier les alertes

1. Exécutez `php artisan migrate`
2. Allez sur le tableau de bord utilisateur
3. Vérifiez que l'alerte s'affiche pour une réservation avec paiement complété
4. Vérifiez que le bouton "Add Passengers" est visible

### Test 2 : Créer une réservation de test

1. Créez une nouvelle réservation via le formulaire frontal
2. Complétez le paiement
3. Allez sur le tableau de bord
4. Vérifiez que l'alerte s'affiche
5. Cliquez sur "Add Passengers"
6. Remplissez le formulaire
7. Soumettez
8. Vérifiez que les informations sont enregistrées

## 📞 Si Toujours des Problèmes

### Vérifiez les logs

```bash
# Regardez les logs Laravel
tail -f storage/logs/laravel.log
```

### Vérifiez la configuration

```bash
# Vérifiez que le lien symbolique storage existe
ls -la public/storage

# Si non, créez-le
php artisan storage:link
```

## 📞 Support

Si après avoir exécuté `php artisan migrate` vous avez toujours des problèmes :

1. **Videz le cache** :
   ```bash
   php artisan cache:clear
   php artisan config:clear
   php artisan view:clear
   ```

2. **Vérifiez les permissions PHP** :
   - `upload_max_filesize` doit être au moins 10M
   - `post_max_size` doit être au moins 10M
   - `memory_limit` doit être suffisant

3. **Contactez le support** avec :
   - Le message exact d'erreur
   - Une capture d'écran
   - Le résultat de `php artisan migrate:status`

---

## ✅ Résumé

**Pour activer le système de passagers, vous DEVEZ exécuter :**

```bash
php artisan migrate
```

C'est tout ! Après cela, le système sera complètement fonctionnel.
