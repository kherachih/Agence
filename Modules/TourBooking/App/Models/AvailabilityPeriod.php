<?php

declare(strict_types=1);

namespace Modules\TourBooking\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

final class AvailabilityPeriod extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'service_id',
        'start_date',
        'end_date',
        'max_people',
        'is_active',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'max_people' => 'integer',
        'is_active' => 'boolean',
    ];

    /**
     * Get the service that this availability period belongs to.
     */
    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    /**
     * Active periods scope.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Future periods scope.
     */
    public function scopeFuture($query)
    {
        return $query->where('end_date', '>=', now()->toDateString());
    }

    /**
     * Current periods scope (periods that include today).
     */
    public function scopeCurrent($query)
    {
        return $query->where('start_date', '<=', now()->toDateString())
            ->where('end_date', '>=', now()->toDateString());
    }

    /**
     * Check if a given date falls within this period.
     */
    public function containsDate($date): bool
    {
        return $date >= $this->start_date && $date <= $this->end_date;
    }
}
