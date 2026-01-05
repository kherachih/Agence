<?php

declare(strict_types=1);

namespace Modules\TourBooking\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

final class RoomType extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'service_id',
        'type',
        'price_supplement',
        'capacity',
        'description',
        'is_active',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'price_supplement' => 'decimal:2',
        'capacity' => 'integer',
        'is_active' => 'boolean',
    ];

    /**
     * Get the service that owns the room type.
     */
    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    /**
     * Get the display name for the room type.
     */
    public function getDisplayNameAttribute(): string
    {
        return match($this->type) {
            'single' => 'Single Room',
            'double' => 'Double Room',
            'triple' => 'Triple Room',
            'double_shared' => 'Double Room (Shared)',
            default => ucfirst($this->type),
        };
    }

    /**
     * Get the display name with price supplement.
     */
    public function getDisplayNameWithPriceAttribute(): string
    {
        $name = $this->display_name;
        if ($this->price_supplement > 0) {
            $name .= ' (+' . currency($this->price_supplement) . ')';
        }
        return $name;
    }

    /**
     * Scope a query to only include active room types.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope a query to filter by type.
     */
    public function scopeOfType($query, string $type)
    {
        return $query->where('type', $type);
    }
}
