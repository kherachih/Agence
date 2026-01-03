<?php

namespace Modules\TourBooking\App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\TourBooking\Database\Factories\QuoteFactory;

class Quote extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'first_name',
        'last_name',
        'number_of_persons',
        'phone',
        'email',
        'message',
        'status',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the service that owns the quote.
     */
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    /**
     * Scope a query to only include pending quotes.
     */
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    /**
     * Scope a query to only include contacted quotes.
     */
    public function scopeContacted($query)
    {
        return $query->where('status', 'contacted');
    }

    /**
     * Scope a query to only include completed quotes.
     */
    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }
}
