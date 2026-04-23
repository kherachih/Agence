<?php

declare(strict_types=1);

namespace Modules\TourBooking\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

final class ServiceMedia extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'service_id',
        'file_path',
        'file_type',
        'file_name',
        'caption',
        'is_featured',
        'is_thumbnail',
        'display_order',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_featured' => 'boolean',
        'is_thumbnail' => 'boolean',
        'display_order' => 'integer',
    ];

    /**
     * Get the service that this media belongs to.
     */
    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    /**
     * Images only scope.
     */
    public function scopeImages($query)
    {
        return $query->where('file_type', 'image');
    }

    /**
     * Videos only scope.
     */
    public function scopeVideos($query)
    {
        return $query->where('file_type', 'video');
    }

    /**
     * Featured media scope.
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    /**
     * Thumbnail media scope.
     */
    public function scopeThumbnail($query)
    {
        return $query->where('is_thumbnail', true);
    }

    /**
     * Get the full URL of the media file.
     */
    public function getUrlAttribute(): string
    {
        if ($this->file_path && file_exists(public_path('uploads/' . $this->file_path))) {
            return asset('uploads/' . $this->file_path);
        }
        
        return asset('storage/' . $this->file_path);
    }

    /**
     * Check if the file exists on disk (in any common location).
     */
    public function getFileExistsAttribute(): bool
    {
        if (!$this->file_path) return false;
        
        return file_exists(public_path('uploads/' . $this->file_path)) || 
               file_exists(public_path('storage/' . $this->file_path)) ||
               file_exists(storage_path('app/public/' . $this->file_path));
    }

    /**
     * Check if the file exists in storage but is missing the public link.
     */
    public function getIsLinkBrokenAttribute(): bool
    {
        if (!$this->file_path) return false;

        $existsInStorage = file_exists(storage_path('app/public/' . $this->file_path));
        $existsInPublic = file_exists(public_path('storage/' . $this->file_path));
        $existsInUploads = file_exists(public_path('uploads/' . $this->file_path));

        return $existsInStorage && !$existsInPublic && !$existsInUploads;
    }
}
 