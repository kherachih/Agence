<?php

declare(strict_types=1);

namespace Modules\TourBooking\App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

final class Passenger extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'booking_id',
        'first_name',
        'last_name',
        'date_of_birth',
        'gender',
        'nationality',
        'passport_number',
        'passport_expiry_date',
        'passport_file',
        'flight_ticket_file',
        'insurance_file',
        'phone',
        'email',
        'special_requirements',
        'is_primary',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'date_of_birth' => 'date',
        'passport_expiry_date' => 'date',
        'is_primary' => 'boolean',
    ];

    /**
     * Get the booking that owns the passenger.
     */
    public function booking(): BelongsTo
    {
        return $this->belongsTo(Booking::class);
    }

    /**
     * Get the user who owns the booking.
     */
    public function user()
    {
        return $this->booking->user ?? null;
    }

    /**
     * Get the full name of the passenger.
     */
    public function getFullNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }

    /**
     * Get the passport file URL.
     */
    public function getPassportFileUrlAttribute(): string
    {
        return $this->passport_file ? asset('storage/' . $this->passport_file) : '';
    }

    /**
     * Get the flight ticket file URL.
     */
    public function getFlightTicketFileUrlAttribute(): string
    {
        return $this->flight_ticket_file ? asset('storage/' . $this->flight_ticket_file) : '';
    }

    /**
     * Get the insurance file URL.
     */
    public function getInsuranceFileUrlAttribute(): string
    {
        return $this->insurance_file ? asset('storage/' . $this->insurance_file) : '';
    }

    /**
     * Scope to get only primary passengers.
     */
    public function scopePrimary($query)
    {
        return $query->where('is_primary', true);
    }

    /**
     * Scope to get only secondary passengers.
     */
    public function scopeSecondary($query)
    {
        return $query->where('is_primary', false);
    }

    /**
     * Check if passenger has passport file.
     */
    public function hasPassportFile(): bool
    {
        return !empty($this->passport_file);
    }

    /**
     * Check if passenger has flight ticket file.
     */
    public function hasFlightTicketFile(): bool
    {
        return !empty($this->flight_ticket_file);
    }

    /**
     * Check if passenger has insurance file.
     */
    public function hasInsuranceFile(): bool
    {
        return !empty($this->insurance_file);
    }

    /**
     * Check if all required documents are uploaded.
     */
    public function hasAllRequiredDocuments(): bool
    {
        return $this->hasPassportFile();
    }
}
