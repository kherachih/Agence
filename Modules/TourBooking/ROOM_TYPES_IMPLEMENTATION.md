# Room Types System Implementation

## Overview
This document describes the room type system implementation for the Tour Booking module. The system allows administrators to configure different room types (Single, Double, Triple, Double Shared) with price supplements, and customers can select their preferred room type during booking.

## Features Implemented

### 1. Database Schema

#### Room Types Table
- **File**: `Modules/TourBooking/Database/migrations/2026_01_05_000000_create_room_types_table.php`
- **Table**: `room_types`
- **Columns**:
  - `id` (Primary Key)
  - `service_id` (Foreign Key to services table)
  - `type` (ENUM: single, double, triple, double_shared)
  - `price_supplement` (DECIMAL: Additional cost for this room type)
  - `capacity` (INTEGER: Number of people the room can accommodate)
  - `description` (TEXT: Optional description)
  - `is_active` (BOOLEAN: Whether the room type is available)
  - `created_at`, `updated_at` (Timestamps)

#### Bookings Table Update
- **File**: `Modules/TourBooking/Database/migrations/2026_01_05_000001_add_room_type_id_to_bookings_table.php`
- **New Column**: `room_type_id` (Foreign Key to room_types table, nullable)

### 2. Models

#### RoomType Model
- **File**: `Modules/TourBooking/App/Models/RoomType.php`
- **Relationships**:
  - `service()`: BelongsTo Service
- **Methods**:
  - `getDisplayNameAttribute()`: Returns human-readable room type name
  - `getDisplayNameWithPriceAttribute()`: Returns room type name with price supplement
  - `scopeActive()`: Filter only active room types
  - `scopeOfType()`: Filter by specific room type

#### Service Model Updates
- **File**: `Modules/TourBooking/App/Models/Service.php`
- **New Relationships**:
  - `roomTypes()`: HasMany RoomType
  - `activeRoomTypes()`: HasMany RoomType (only active)

#### Booking Model Updates
- **File**: `Modules/TourBooking/App/Models/Booking.php`
- **New Fillable Field**: `room_type_id`
- **New Relationship**:
  - `roomType()`: BelongsTo RoomType

### 3. Frontend Implementation

#### Service Detail Page
- **File**: `Modules/TourBooking/resources/views/front/services/service-detail.blade.php`
- **Changes**:
  - Added room type selection dropdown in booking form
  - Updated Alpine.js booking form to include room type data
  - Added room supplement display showing additional cost
  - Dynamic price calculation includes room type supplement

#### Checkout Page
- **File**: `Modules/TourBooking/resources/views/front/bookings/checkout-view.blade.php`
- **Changes**:
  - Added room type selection dropdown
  - Added room supplement display in order summary
  - JavaScript to update total price when room type changes

### 4. Backend Controllers

#### Front Booking Controller
- **File**: `Modules/TourBooking/App/Http/Controllers/Front/FrontBookingController.php`
- **Changes**:
  - Added RoomType import
  - Updated `bookingCheckoutView()` to handle room type selection
  - Updated `processBooking()` to validate and store room type
  - Updated `calculateBookingPrice()` to include room type supplement in calculations
  - Session storage includes room_type_id

#### Admin Service Controller
- **File**: `Modules/TourBooking/App/Http/Controllers/Admin/ServiceController.php`
- **Changes**:
  - Added RoomType import
  - Updated `store()` to save room types when creating service
  - Updated `update()` to manage room types when editing service

### 5. Admin Forms

#### Service Create Form
- **File**: `Modules/TourBooking/resources/views/admin/services/create.blade.php`
- **New Section**: Room Types Configuration
- **Features**:
  - Dynamic room type management (add/remove room types)
  - Room type dropdown (Single, Double, Triple, Double Shared)
  - Price supplement input for each room type
  - Capacity input for each room type
  - Active/Inactive toggle for each room type
  - Description textarea for each room type
  - JavaScript for dynamic room type addition/removal

## How It Works

### For Administrators

1. **Create/Edit Service**:
   - Navigate to Admin > Tour Booking > Services > Create/Edit
   - Scroll to the "Room Types" section
   - Add room types by clicking "Add Room Type" button
   - Configure each room type:
     - Select room type (Single, Double, Triple, Double Shared)
     - Set price supplement (additional cost on top of base price)
     - Set capacity (number of people)
     - Add optional description
     - Toggle active status
   - Save the service

2. **Room Type Examples**:
   - Single Room: $0 supplement (base price)
   - Double Room: $70 supplement (base price + $70)
   - Triple Room: $120 supplement (base price + $120)
   - Double Room (Shared): $40 supplement (base price + $40)

### For Customers

1. **Browse Tours**:
   - Navigate to service detail page
   - View tour information and base pricing

2. **Book a Tour**:
   - In the "Book This Tour" section, select:
     - Number of adults
     - Number of children
     - **Room Type** (new feature)
   - The total price automatically updates to include room supplement
   - Click "Book Now"

3. **Checkout**:
   - Review booking details
   - See room type selection with supplement amount
   - Final total includes: base price + room supplement + extras
   - Complete payment

## Price Calculation Logic

### Base Price
- Adult Price: $service->discount_adult_price or $service->adult_price
- Child Price: $service->discount_child_price or $service->child_price

### Room Type Supplement
- Retrieved from selected room type: $roomType->price_supplement
- Added to total calculation

### Final Total
```
Total = (Adult Count × Adult Price) 
       + (Child Count × Child Price)
       + Room Type Supplement
       + Extra Services
       - Discount
       + Tax
```

## Migration Instructions

To apply the database changes, run:

```bash
php artisan migrate
```

This will:
1. Create the `room_types` table
2. Add `room_type_id` column to `bookings` table

## Testing Checklist

- [ ] Run migrations successfully
- [ ] Create a service with room types in admin
- [ ] Verify room types are saved to database
- [ ] Browse service detail page as customer
- [ ] Verify room type dropdown appears
- [ ] Select different room types and verify price updates
- [ ] Complete a booking with room type selection
- [ ] Verify room type is saved in booking record
- [ ] Check booking details/invoice shows room type information

## Room Type Definitions

| Type | Description | Typical Capacity | Use Case |
|-------|-------------|----------------|-----------|
| Single | Private room for one person | 1 | Solo travelers |
| Double | Private room for two people | 2 | Couples |
| Triple | Private room for three people | 3 | Small groups/families |
| Double Shared | Shared room for two people (strangers) | 2 | Budget travelers |

## Notes

- Room types are service-specific (configured per service)
- Price supplements are optional (can be $0)
- Only active room types are shown to customers
- Room type selection is optional in booking (nullable)
- System is backward compatible with existing bookings (room_type_id is nullable)

## Future Enhancements

Potential improvements for future consideration:
1. Room type images
2. Room amenities per type
3. Dynamic pricing based on season
4. Room availability calendar per type
5. Multi-language support for room type descriptions
