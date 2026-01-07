# Système de Gestion des Passagers - Documentation d'Implémentation

## Vue d'ensemble

Ce document décrit l'implémentation complète du système de gestion des passagers pour le module TourBooking. Ce système permet aux utilisateurs de fournir les informations détaillées des passagers après le paiement, et aux administrateurs de télécharger les confirmations PDF.

## Fonctionnalités Implémentées

### 1. Base de Données

#### Migrations Créées

**Table `passengers`** (`2026_01_07_000000_create_passengers_table.php`)
- Stocke les informations de chaque passager associé à une réservation
- Champs inclus :
  - Informations personnelles : nom, prénom, date de naissance, genre, nationalité
  - Passeport : numéro, date d'expiration, fichier (upload)
  - Assurance : fichier (upload, optionnel)
  - Contact : téléphone, email
  - Exigences spéciales : notes
  - Indicateur : `is_primary` pour identifier le passager principal

**Table `bookings`** (mise à jour : `2026_01_07_000001_add_passenger_info_status_to_bookings_table.php`)
- Ajout de `passenger_info_status` : 'pending' ou 'completed'
- Ajout de `passenger_info_completed_at` : timestamp de complétion

### 2. Modèles

#### Passenger Model (`Modules/TourBooking/App/Models/Passenger.php`)
- Relations : `belongsTo(Booking::class)`
- Méthodes utiles :
  - `getFullNameAttribute()` : Retourne le nom complet
  - `getPassportFileUrlAttribute()` : URL du fichier passeport
  - `getInsuranceFileUrlAttribute()` : URL du fichier assurance
  - `scopePrimary()` : Filtre les passagers principaux
  - `scopeSecondary()` : Filtre les passagers secondaires
  - `hasPassportFile()` : Vérifie si un passeport est uploadé
  - `hasInsuranceFile()` : Vérifie si une assurance est uploadée
  - `hasAllRequiredDocuments()` : Vérifie si tous les documents requis sont présents

#### Booking Model (Mise à jour)
- Ajout de la relation `passengers()` : `hasMany(Passenger::class)`
- Ajout de la relation `primaryPassenger()` : `hasOne(Passenger::class)` avec filtre `is_primary`
- Ajout des champs `passenger_info_status` et `passenger_info_completed_at` dans `$fillable` et `$casts`

### 3. Contrôleurs

#### UserPassengerController (`Modules/TourBooking/App/Http/Controllers/User/PassengerController.php`)

**Méthodes :**

- `create(Booking $booking)` : Affiche le formulaire d'ajout des passagers
  - Vérifie que la réservation appartient à l'utilisateur connecté
  - Vérifie que le paiement est complété
  - Vérifie que les infos passagers ne sont pas déjà complétées
  - Calcule le nombre de passagers attendus (adults + children)

- `store(Request $request, Booking $booking)` : Enregistre les informations des passagers
  - Valide les données de tous les passagers
  - Vérifie que le nombre de passagers correspond à la réservation
  - Upload les fichiers (passeport obligatoire, assurance optionnel)
  - Crée les enregistrements passagers avec le premier marqué comme `is_primary`
  - Met à jour le statut de la réservation (`passenger_info_status = 'completed'`)

- `show(Booking $booking)` : Affiche les informations des passagers
  - Liste tous les passagers avec leurs documents
  - Affiche les liens de téléchargement des documents

- `edit(Booking $booking)` : Affiche le formulaire de modification
  - Permet de modifier les informations des passagers existants

- `update(Request $request, Booking $booking)` : Met à jour les informations
  - Valide les modifications
  - Gère le remplacement des fichiers uploadés
  - Supprime les anciens fichiers avant d'uploader les nouveaux

#### AdminPassengerController (`Modules/TourBooking/App/Http/Controllers/Admin/PassengerController.php`)

**Méthodes :**

- `show(Booking $booking)` : Affiche les informations des passagers pour l'admin
  - Vue détaillée avec toutes les informations
  - Modals de modification pour chaque passager

- `downloadConfirmation(Booking $booking)` : Génère et télécharge le PDF de confirmation
  - Utilise DomPDF pour générer un PDF professionnel
  - Inclut toutes les informations de réservation et des passagers
  - Format stylisé avec en-tête, détails, et pied de page

- `downloadPassport(Passenger $passenger)` : Télécharge le fichier passeport
  - Vérifie l'existence du fichier
  - Force le téléchargement

- `downloadInsurance(Passenger $passenger)` : Télécharge le fichier assurance
  - Vérifie l'existence du fichier
  - Force le téléchargement

- `update(Request $request, Passenger $passenger)` : Met à jour un passager (admin)
  - Permet à l'admin de modifier les informations
  - Ne permet pas l'upload de fichiers via cette méthode

### 4. Routes

#### Routes Utilisateur (préfixe : `user/`)
- `GET /user/bookings/{booking}/passengers/create` → `user.passengers.create`
- `POST /user/bookings/{booking}/passengers` → `user.passengers.store`
- `GET /user/bookings/{booking}/passengers` → `user.passengers.show`
- `GET /user/bookings/{booking}/passengers/edit` → `user.passengers.edit`
- `PUT /user/bookings/{booking}/passengers` → `user.passengers.update`

#### Routes Admin (préfixe : `admin/tourbooking/`)
- `GET /admin/tourbooking/bookings/{booking}/passengers` → `admin.tourbooking.passengers.show`
- `GET /admin/tourbooking/bookings/{booking}/passengers/download-confirmation` → `admin.tourbooking.passengers.download-confirmation`
- `GET /admin/tourbooking/passengers/{passenger}/download-passport` → `admin.tourbooking.passengers.download-passport`
- `GET /admin/tourbooking/passengers/{passenger}/download-insurance` → `admin.tourbooking.passengers.download-insurance`
- `PUT /admin/tourbooking/passengers/{passenger}` → `admin.tourbooking.passengers.update`

### 5. Vues

#### Vues Utilisateur

**`Modules/TourBooking/resources/views/user/passenger/create.blade.php`**
- Formulaire dynamique pour ajouter des passagers
- Génère automatiquement les champs pour chaque passager (basé sur adults + children)
- Champs inclus :
  - Nom, Prénom (obligatoire)
  - Date de naissance, Genre, Nationalité
  - Numéro de passeport, Date d'expiration
  - Upload passeport (obligatoire, max 5MB, formats: PDF, JPG, PNG)
  - Upload assurance (optionnel, max 5MB, formats: PDF, JPG, PNG)
  - Téléphone, Email
  - Exigences spéciales
- Résumé de la réservation affiché en haut
- Validation côté serveur et client

**`Modules/TourBooking/resources/views/user/passenger/show.blade.php`**
- Affichage tabulaire de tous les passagers
- Liens de téléchargement pour chaque document
- Badge "Primary" pour le passager principal
- Section des exigences spéciales si présentes
- Bouton de modification si les infos sont complétées

#### Vues Admin

**`Modules/TourBooking/resources/views/admin/passenger/show.blade.php`**
- Vue détaillée de tous les passagers d'une réservation
- Tableau avec toutes les informations
- Boutons de téléchargement des documents
- Modals de modification pour chaque passager
- Bouton "Download Confirmation PDF" en haut

**`Modules/TourBooking/resources/views/admin/passenger/confirmation-pdf.blade.php`**
- Template HTML/CSS pour génération PDF
- Design professionnel avec :
  - En-tête avec code de réservation
  - Boîte de statut de confirmation
  - Section détails de réservation
  - Section informations client
  - Section informations passagers (avec cartes individuelles)
  - Section exigences spéciales
  - Pied de page avec informations de génération
- Styles CSS intégrés pour un rendu parfait en PDF

### 6. Notifications et Alertes

#### Sur le Tableau de Bord Utilisateur

**Fichier : `Modules/TourBooking/resources/views/user/booking/index.blade.php`**
- Alerte en haut de page si des réservations ont un paiement complété mais infos passagers en attente
- Message : "Action Required: Complete Passenger Information"
- Bouton direct vers le formulaire d'ajout pour chaque réservation concernée
- Badge "Add Passengers" dans la liste des réservations

#### Sur la Page de Détails de Réservation

**Fichier : `Modules/TourBooking/resources/views/user/booking/details.blade.php`**
- Alerte importante si paiement complété mais infos passagers en attente
- Bouton "Add Passenger Information Now" si infos non complétées
- Bouton "View Passengers" si infos complétées
- Affichage du statut "Passenger Info" dans le tableau

## Flux Utilisateur Complet

### 1. Réservation et Paiement
1. L'utilisateur sélectionne le nombre de passagers (adults + children) lors de la réservation
2. L'utilisateur complète le paiement via Stripe, PayPal, etc.
3. Après paiement réussi, redirection vers le tableau de bord utilisateur

### 2. Notification sur le Tableau de Bord
1. L'utilisateur arrive sur son tableau de bord
2. Une alerte s'affiche : "Action Required: Complete Passenger Information"
3. La liste des réservations montre un badge "Add Passengers" pour les réservations concernées

### 3. Complétion des Informations Passagers
1. L'utilisateur clique sur "Add Passengers" pour une réservation
2. Formulaire affiché avec autant de sections que de passagers
3. L'utilisateur remplit pour chaque passager :
   - Nom, Prénom (obligatoire)
   - Passeport : numéro, date d'expiration, fichier (obligatoire)
   - Assurance : fichier (optionnel)
   - Autres informations optionnelles
4. Soumission du formulaire
5. Validation et enregistrement des données
6. Mise à jour du statut de réservation : `passenger_info_status = 'completed'`

### 4. Confirmation et Gestion
1. L'utilisateur peut voir les informations des passagers
2. L'utilisateur peut modifier les informations si nécessaire
3. Les documents sont accessibles pour téléchargement

## Flux Admin

### 1. Consultation des Passagers
1. Admin accède à la page de détails d'une réservation
2. Bouton pour voir les passagers de la réservation
3. Vue détaillée avec toutes les informations

### 2. Téléchargement des Documents
1. Admin peut télécharger chaque fichier (passeport, assurance)
2. Vérification de l'existence du fichier avant téléchargement
3. Téléchargement forcé du fichier

### 3. Génération PDF de Confirmation
1. Admin clique sur "Download Confirmation PDF"
2. Génération automatique du PDF avec :
   - Toutes les informations de réservation
   - Toutes les informations des passagers
   - Statut des documents uploadés
   - Format professionnel stylisé
3. Téléchargement immédiat du fichier

### 4. Modification des Informations
1. Admin peut modifier les informations de chaque passager via modal
2. Mise à jour des données sans ré-upload de fichiers
3. Sauvegarde et retour à la vue

## Configuration Requise

### 1. Exécuter les Migrations

```bash
php artisan migrate
```

Cela créera les tables :
- `passengers`
- Mettra à jour `bookings` avec les nouveaux champs

### 2. Vérifier les Permissions

Assurez-vous que les dossiers suivants sont accessibles en écriture :
- `storage/app/public/passengers/passports`
- `storage/app/public/passengers/insurance`

Si nécessaire, créer un lien symbolique :
```bash
php artisan storage:link
```

### 3. Vérifier DomPDF

Assurez-vous que DomPDF est installé et configuré :
```bash
composer require barryvdh/laravel-dompdf
```

Configuration dans `config/dompdf.php` (doit déjà exister dans le projet)

## Validation des Données

### Règles de Validation

**Pour chaque passager :**
- `first_name` : requis, string, max 255 caractères
- `last_name` : requis, string, max 255 caractères
- `date_of_birth` : optionnel, date valide
- `gender` : optionnel, dans [male, female, other]
- `nationality` : optionnel, string, max 100 caractères
- `passport_number` : optionnel, string, max 50 caractères
- `passport_expiry_date` : optionnel, date, après aujourd'hui
- `passport_file` : requis, fichier, formats [pdf, jpg, jpeg, png], max 5MB
- `insurance_file` : optionnel, fichier, formats [pdf, jpg, jpeg, png], max 5MB
- `phone` : optionnel, string, max 20 caractères
- `email` : optionnel, email valide, max 255 caractères
- `special_requirements` : optionnel, string, max 1000 caractères

### Validation du Nombre de Passagers

Le système vérifie automatiquement que :
- Nombre de passagers soumis = adults + children de la réservation
- Empêche la soumission si le nombre ne correspond pas

## Sécurité

### Contrôles d'Accès

1. **Contrôleur Utilisateur**
   - Vérifie que `booking->user_id === auth()->id()`
   - Empêche l'accès aux réservations d'autres utilisateurs
   - Vérifie que le paiement est complété avant de permettre l'ajout

2. **Contrôleur Admin**
   - Pas de restriction spécifique (admin a accès à toutes les réservations)
   - Vérifie l'existence des fichiers avant téléchargement

### Gestion des Fichiers

- Les fichiers sont stockés dans `storage/app/public/passengers/`
- Dossiers séparés : `passports/` et `insurance/`
- Noms de fichiers générés automatiquement par Laravel
- Anciens fichiers supprimés lors de la modification
- Taille maximale : 5MB par fichier
- Formats acceptés : PDF, JPG, JPEG, PNG

## Personnalisation

### Traductions

Toutes les chaînes utilisent `__('translate.key')` pour permettre la traduction dans plusieurs langues.

### Styles

Les vues utilisent les classes CSS existantes du projet :
- `crancy-*` pour le style utilisateur
- `card-*`, `btn-*`, `badge-*` pour Bootstrap
- Styles personnalisés dans le template PDF

## Tests Recommandés

### Scénarios de Test

1. **Flux normal**
   - Créer une réservation avec 2 adultes et 1 enfant
   - Compléter le paiement
   - Vérifier que la notification s'affiche
   - Ajouter les informations des 3 passagers
   - Vérifier que les fichiers sont uploadés
   - Vérifier que le statut passe à 'completed'

2. **Validation**
   - Essayer de soumettre sans le nom
   - Essayer de soumettre sans le fichier passeport
   - Essayer de soumettre un nombre incorrect de passagers
   - Essayer d'accéder à une réservation d'un autre utilisateur

3. **Modification**
   - Modifier les informations d'un passager
   - Remplacer le fichier passeport
   - Vérifier que l'ancien fichier est supprimé

4. **Admin**
   - Télécharger le PDF de confirmation
   - Télécharger les fichiers des passagers
   - Modifier les informations via admin
   - Vérifier que le PDF contient toutes les informations

## Dépannage

### Problèmes Courants

**1. Fichiers non uploadés**
- Vérifier les permissions du dossier `storage/app/public/passengers/`
- Vérifier que `php artisan storage:link` a été exécuté
- Vérifier la configuration `filesystems.php`

**2. PDF non généré**
- Vérifier que DomPDF est installé : `composer show barryvdh/laravel-dompdf`
- Vérifier la configuration dans `config/dompdf.php`
- Vérifier les permissions d'écriture dans `storage/`

**3. Notification ne s'affiche pas**
- Vérifier que `passenger_info_status` est bien à 'pending' dans la base de données
- Vérifier que `payment_status` est bien à 'completed'
- Vider le cache : `php artisan cache:clear`

**4. Erreur de validation**
- Vérifier la taille maximale upload dans `php.ini` (`upload_max_filesize`, `post_max_size`)
- Vérifier les types MIME acceptés dans la validation

## Structure des Fichiers Créés

```
Modules/TourBooking/
├── Database/migrations/
│   ├── 2026_01_07_000000_create_passengers_table.php
│   └── 2026_01_07_000001_add_passenger_info_status_to_bookings_table.php
├── App/
│   ├── Models/
│   │   ├── Passenger.php
│   │   └── Booking.php (modifié)
│   └── Http/Controllers/
│       ├── User/
│       │   └── PassengerController.php
│       └── Admin/
│           └── PassengerController.php
├── resources/views/
│   ├── user/
│   │   ├── passenger/
│   │   │   ├── create.blade.php
│   │   │   └── show.blade.php
│   │   └── booking/
│   │       ├── index.blade.php (modifié)
│   │       └── details.blade.php (modifié)
│   └── admin/
│       └── passenger/
│           ├── show.blade.php
│           └── confirmation-pdf.blade.php
└── routes/
    └── web.php (modifié)
```

## Conclusion

Ce système de gestion des passagers est maintenant complètement intégré dans le module TourBooking. Il offre :

- ✅ Collecte complète des informations des passagers
- ✅ Upload sécurisé des documents (passeport, assurance)
- ✅ Notifications claires sur le tableau de bord utilisateur
- ✅ Génération professionnelle de PDF de confirmation
- ✅ Interface admin complète pour gestion et téléchargement
- ✅ Validation robuste des données
- ✅ Sécurité des accès et des fichiers

Pour toute question ou amélioration, n'hésitez pas à consulter l'équipe de développement.
