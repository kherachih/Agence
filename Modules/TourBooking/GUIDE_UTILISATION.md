# Guide d'Utilisation - Système de Gestion des Passagers

## 📍 Où trouver le formulaire pour ajouter les informations des passagers ?

### 1. **Sur le Tableau de Bord Utilisateur**

Après le paiement, vous serez redirigé vers votre tableau de bord. Vous verrez :

1. **Alerte en haut de page** : "Action Required: Complete Passenger Information"
   - Cette alerte s'affiche si vous avez des réservations avec paiement complété mais infos passagers manquantes
   - Elle contient un bouton direct vers le formulaire

2. **Dans la liste des réservations** :
   - Chaque réservation concernée aura un bouton jaune **"Add Passengers"**
   - Cliquez sur ce bouton pour aller au formulaire

### 2. **Sur la Page "Booking Details"**

Si vous cliquez sur "Details" d'une réservation, vous verrez :

1. **Alerte importante** (si paiement complété mais infos passagers manquantes) :
   - Message : "Action Required: Complete Passenger Information"
   - Bouton : **"Add Passenger Information Now"** (bouton jaune)
   - Cliquez sur ce bouton pour aller au formulaire

2. **Dans la section "Actions"** (en bas de page) :
   - Si infos passagers non complétées : bouton **"Add Passenger Information"**
   - Si infos passagers complétées : bouton **"View Passengers"**

## 📋 Le Formulaire de Création des Passagers

Une fois sur le formulaire, vous verrez :

### Structure du Formulaire

Pour chaque passager (2, 3, ou 4 selon votre réservation), vous devez remplir :

#### ✅ Champs Obligatoires

1. **First Name** (Prénom)
   - Exemple : Jean

2. **Last Name** (Nom)
   - Exemple : Dupont

3. **Passport Copy** (Fichier passeport)
   - **Obligatoire pour chaque passager**
   - Formats acceptés : PDF, JPG, JPEG, PNG
   - Taille maximale : 5MB
   - Cliquez sur "Choose File" pour sélectionner le fichier
   - Le fichier doit être une copie ou photo du passeport

#### ⚪ Champs Optionnels

4. **Date of Birth** (Date de naissance)
   - Exemple : 15/01/1990

5. **Gender** (Genre)
   - Options : Male, Female, Other

6. **Nationality** (Nationalité)
   - Exemple : French

7. **Passport Number** (Numéro de passeport)
   - Exemple : AB1234567

8. **Passport Expiry Date** (Date d'expiration du passeport)
   - Doit être dans le futur
   - Exemple : 15/01/2030

9. **Travel Insurance** (Assurance voyage)
   - Optionnel
   - Formats acceptés : PDF, JPG, JPEG, PNG
   - Taille maximale : 5MB
   - Cliquez sur "Choose File" si vous avez une assurance

10. **Phone Number** (Numéro de téléphone)
    - Exemple : +33 6 12 34 56 78

11. **Email Address** (Adresse email)
    - Exemple : jean.dupont@email.com

12. **Special Requirements** (Exigences spéciales)
    - Exemple : Régime végétarien, allergies alimentaires, besoins spéciaux

## 🔧 Pourquoi le bouton ne s'affiche pas ?

Le bouton "Add Passenger Information" ne s'affiche QUE si :

1. ✅ `payment_status` est égal à `'completed'`
2. ✅ `passenger_info_status` est égal à `'pending'`

### Vérification des conditions

Si le bouton ne s'affiche pas, vérifiez :

#### Condition 1 : Paiement complété ?
Dans la base de données, le champ `payment_status` doit être `'completed'`

**Comment vérifier :**
```sql
SELECT payment_status FROM bookings WHERE id = [votre_booking_id];
```

**Si ce n'est pas 'completed' :**
- Le paiement n'a pas été validé
- Vous devez d'abord compléter le paiement
- Le bouton ne s'affichera pas

#### Condition 2 : Migrations exécutées ?
Les nouvelles tables doivent être créées :

```bash
php artisan migrate
```

Cela créera :
- Table `passengers`
- Champs `passenger_info_status` et `passenger_info_completed_at` dans `bookings`

**Comment vérifier :**
```sql
SHOW COLUMNS FROM bookings LIKE 'passenger_info%';
```

#### Condition 3 : Statut initial
Par défaut, `passenger_info_status` est `'pending'` pour toutes les nouvelles réservations.

## 🚨 Dépannage

### Problème : Le bouton ne s'affiche pas

**Étape 1 : Vérifier le statut de paiement**

Allez dans phpMyAdmin ou votre outil de gestion de base de données :
```sql
SELECT id, booking_code, payment_status, passenger_info_status 
FROM bookings 
WHERE id = [votre_booking_id];
```

**Résultats attendus :**
- `payment_status` = 'completed'
- `passenger_info_status` = 'pending'

**Si `payment_status` n'est pas 'completed' :**
- Le paiement n'est pas complété
- Complétez d'abord le paiement
- Le bouton apparaîtra après le paiement

### Problème : Formulaire ne s'ouvre pas

Si le bouton s'affiche mais le formulaire ne s'ouvre pas :

**Vérifiez les routes :**
```bash
php artisan route:list --name=user.passengers
```

**Résultat attendu :**
```
GET|HEAD  user/bookings/{booking}/passengers/create  user.passengers.create
```

**Si la route n'existe pas :**
- Vérifiez que vous avez exécuté les migrations
- Vérifiez que le fichier routes/web.php contient bien les routes passagers

### Problème : Upload de fichiers ne fonctionne pas

**Vérifiez les permissions :**
```bash
# Le dossier doit être accessible en écriture
ls -la storage/app/public/passengers/

# Si le dossier n'existe pas, créez-le
mkdir -p storage/app/public/passengers/passports
mkdir -p storage/app/public/passengers/insurance

# Donnez les permissions
chmod -R 755 storage/app/public/passengers/
```

**Vérifiez le lien symbolique :**
```bash
php artisan storage:link
```

**Vérifiez la configuration PHP :**
```bash
# Vérifiez la taille maximale upload
php -i | grep upload_max_filesize
php -i | grep post_max_size
```

**Valeurs recommandées :**
- `upload_max_filesize = 10M`
- `post_max_size = 10M`

## 📸 Comment uploader les fichiers de passeport

### Étape 1 : Sélectionner le fichier

1. Dans le formulaire du passager, trouvez le champ **"Passport Copy"**
2. Cliquez sur le bouton **"Choose File"** (ou "Parcourir" en français)
3. Sélectionnez votre fichier de passeport (PDF ou image)

### Étape 2 : Vérifier le fichier

Le fichier doit :
- ✅ Être au format PDF, JPG, JPEG, ou PNG
- ✅ Faire moins de 5MB
- ✅ Contenir une copie lisible du passeport

### Étape 3 : Soumettre le formulaire

1. Remplissez tous les champs obligatoires pour TOUS les passagers
2. Cliquez sur le bouton **"Save Passenger Information"** en bas
3. Attendez le message de succès

## ✅ Après la soumission

### Ce qui se passe :

1. Les fichiers sont uploadés dans `storage/app/public/passengers/`
2. Les informations sont enregistrées dans la base de données
3. Le statut `passenger_info_status` passe à `'completed'`
4. Vous êtes redirigé vers la page de détails de réservation
5. Le bouton change de "Add Passenger Information" à "View Passengers"

### Vérifier que tout est bon :

Allez sur la page de détails de réservation, vous devriez voir :

1. ✅ Badge "Passenger Info: Completed" (vert)
2. ✅ Bouton "View Passengers" (bleu)
3. ✅ Plus d'alerte jaune en haut de page

## 🎯 Résumé du Flux Complet

```
1. Utilisateur fait une réservation (2, 3, ou 4 passagers)
   ↓
2. Utilisateur complète le paiement (Stripe, PayPal, etc.)
   ↓
3. Redirection vers le tableau de bord utilisateur
   ↓
4. Alerte s'affiche : "Action Required: Complete Passenger Information"
   ↓
5. Utilisateur clique sur "Add Passengers" (dans la liste ou sur les détails)
   ↓
6. Formulaire s'ouvre avec autant de sections que de passagers
   ↓
7. Utilisateur remplit pour chaque passager :
   - Nom, Prénom (obligatoire)
   - Passeport : fichier (obligatoire)
   - Assurance : fichier (optionnel)
   ↓
8. Utilisateur soumet le formulaire
   ↓
9. Fichiers uploadés et informations enregistrées
   ↓
10. Statut passe à "completed"
   ↓
11. Redirection vers la page de détails
   ↓
12. Utilisateur peut voir et modifier les informations
```

## 📞 Si vous avez toujours des problèmes

### Vérifiez ces points :

1. ✅ Les migrations ont-elles été exécutées ?
   ```bash
   php artisan migrate:status
   ```

2. ✅ Le lien symbolique storage est-il créé ?
   ```bash
   php artisan storage:link
   ```

3. ✅ Les permissions sont-elles correctes ?
   ```bash
   chmod -R 755 storage/
   ```

4. ✅ Le statut de paiement est-il 'completed' ?
   Vérifiez dans la base de données

5. ✅ Le navigateur supporte-t-il les formats ?
   PDF, JPG, JPEG, PNG sont supportés par tous les navigateurs modernes

### Contactez le support

Si après avoir vérifié tous ces points, le problème persiste :
- Vérifiez les logs Laravel : `storage/logs/laravel.log`
- Contactez l'équipe de développement avec :
  - Le code de réservation
  - Une capture d'écran du problème
  - Les messages d'erreur éventuels

## 📁 Emplacements des fichiers

### Fichiers uploadés
```
storage/app/public/passengers/
├── passports/
│   ├── [timestamp]_passport_1.pdf
│   ├── [timestamp]_passport_2.jpg
│   └── ...
└── insurance/
    ├── [timestamp]_insurance_1.pdf
    └── ...
```

### Vues et Contrôleurs
- Formulaire de création : `Modules/TourBooking/resources/views/user/passenger/create.blade.php`
- Contrôleur utilisateur : `Modules/TourBooking/App/Http/Controllers/User/PassengerController.php`
- Contrôleur admin : `Modules/TourBooking/App/Http/Controllers/Admin/PassengerController.php`

## 💡 Conseils

1. **Préparez vos fichiers à l'avance**
   - Scannez vos passeports en PDF ou JPG
   - Renommez-les clairement (ex: passport_jean.pdf)

2. **Remplissez tous les champs obligatoires**
   - Nom et prénom sont requis pour chaque passager
   - Le fichier passeport est OBLIGATOIRE pour chaque passager

3. **Vérifiez avant de soumettre**
   - Assurez-vous que tous les fichiers sont sélectionnés
   - Vérifiez que les informations sont correctes

4. **Gardez une copie**
   - Après soumission, vous pouvez voir et modifier les informations
   - Les fichiers restent accessibles pour téléchargement

Ce guide devrait vous aider à utiliser le système de gestion des passagers efficacement !
