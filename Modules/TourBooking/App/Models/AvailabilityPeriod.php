<?php

declare(strict_types=1);

namespace Modules\TourBooking\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
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
        'adult_price',
        'adult_discount_percentage',
        'discount_adult_price',
        'child_price',
        'child_discount_percentage',
        'discount_child_price',
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
        'adult_price' => 'decimal:2',
        'adult_discount_percentage' => 'decimal:2',
        'discount_adult_price' => 'decimal:2',
        'child_price' => 'decimal:2',
        'child_discount_percentage' => 'decimal:2',
        'discount_child_price' => 'decimal:2',
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

    /**
     * Get computed discounted adult price attribute.
     */
    protected function computedAdultPrice(): Attribute
    {
        return Attribute::make(
            get: function () {
                if (!empty($this->adult_price) && !empty($this->adult_discount_percentage)) {
                    return $this->adult_price - ($this->adult_price * ($this->adult_discount_percentage / 100));
                }
                return $this->discount_adult_price ?? $this->adult_price;
            }
        );
    }

    /**
     * Get computed discounted child price attribute.
     */
    protected function computedChildPrice(): Attribute
    {
        return Attribute::make(
            get: function () {
                if (!empty($this->child_price) && !empty($this->child_discount_percentage)) {
                    return $this->child_price - ($this->child_price * ($this->child_discount_percentage / 100));
                }
                return $this->discount_child_price ?? $this->child_price;
            }
        );
    }

    /**
     * Get adult price display with discount badge.
     */
    public function getAdultPriceDisplayAttribute(): string
    {
        $price = $this->adult_price;
        $discountedPrice = $this->computed_adult_price;
        
        if (!empty($this->adult_discount_percentage) && $this->adult_discount_percentage > 0) {
            return '<del>' . currency($price) . '</del> ' . currency($discountedPrice);
        }
        
        if (!empty($this->discount_adult_price) && $this->discount_adult_price < $price) {
            return '<del>' . currency($price) . '</del> ' . currency($this->discount_adult_price);
        }
        
        return currency($price);
    }

    /**
     * Get child price display with discount badge.
     */
    public function getChildPriceDisplayAttribute(): string
    {
        $price = $this->child_price;
        $discountedPrice = $this->computed_child_price;
        
        if (!empty($this->child_discount_percentage) && $this->child_discount_percentage > 0) {
            return '<del>' . currency($price) . '</del> ' . currency($discountedPrice);
        }
        
        if (!empty($this->discount_child_price) && $this->discount_child_price < $price) {
            return '<del>' . currency($price) . '</del> ' . currency($this->discount_child_price);
        }
        
        return currency($price);
    }

    /**
     * Get adult discount badge HTML.
     */
    public function getAdultDiscountBadgeAttribute(): string
    {
        if (!empty($this->adult_discount_percentage) && $this->adult_discount_percentage > 0) {
            return '<span class="badge bg-danger">' . number_format((float)$this->adult_discount_percentage, 0) . '% OFF</span>';
        }
        
        if (!empty($this->adult_price) && !empty($this->discount_adult_price) && $this->discount_adult_price < $this->adult_price) {
            $percentage = round((($this->adult_price - $this->discount_adult_price) / $this->adult_price) * 100);
            return '<span class="badge bg-danger">' . $percentage . '% OFF</span>';
        }
        
        return '';
    }

    /**
     * Get child discount badge HTML.
     */
    public function getChildDiscountBadgeAttribute(): string
    {
        if (!empty($this->child_discount_percentage) && $this->child_discount_percentage > 0) {
            return '<span class="badge bg-danger">' . number_format((float)$this->child_discount_percentage, 0) . '% OFF</span>';
        }
        
        if (!empty($this->child_price) && !empty($this->discount_child_price) && $this->discount_child_price < $this->child_price) {
            $percentage = round((($this->child_price - $this->discount_child_price) / $this->child_price) * 100);
            return '<span class="badge bg-danger">' . $percentage . '% OFF</span>';
        }
        
        return '';
    }

    /**
     * Check if period has custom pricing.
     */
    public function hasCustomPricing(): bool
    {
        return !empty($this->adult_price) || !empty($this->child_price);
    }
}
