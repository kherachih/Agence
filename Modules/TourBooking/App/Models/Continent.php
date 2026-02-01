<?php

declare(strict_types=1);

namespace Modules\TourBooking\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

final class Continent extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slug',
        'code',
        'description',
        'image',
        'icon',
        'ordering',
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'status' => 'boolean',
        'ordering' => 'integer',
    ];

    /**
     * Get destinations for this continent.
     */
    public function destinations(): HasMany
    {
        return $this->hasMany(Destination::class);
    }

    /**
     * Get active destinations for this continent.
     */
    public function activeDestinations(): HasMany
    {
        return $this->hasMany(Destination::class)->where('status', true);
    }

    /**
     * Get destinations with available tours for this continent.
     */
    public function destinationsWithTours(): HasMany
    {
        return $this->hasMany(Destination::class)
            ->where('status', true)
            ->whereHas('services', function ($query) {
                $query->where('status', true);
            });
    }

    /**
     * Get the translation for this continent.
     */
    public function translation(): HasOne
    {
        return $this->hasOne(ContinentTranslation::class)
            ->where('lang_code', app()->getLocale());
    }

    /**
     * Get all translations for this continent.
     */
    public function translations(): HasMany
    {
        return $this->hasMany(ContinentTranslation::class);
    }

    /**
     * Get active continents.
     */
    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    /**
     * Scope to order by ordering column.
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('ordering', 'asc');
    }
}
