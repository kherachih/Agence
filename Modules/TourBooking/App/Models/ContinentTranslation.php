<?php

declare(strict_types=1);

namespace Modules\TourBooking\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

final class ContinentTranslation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'continent_id',
        'lang_code',
        'name',
        'description',
    ];

    /**
     * Get the continent that owns the translation.
     */
    public function continent(): BelongsTo
    {
        return $this->belongsTo(Continent::class);
    }
}
