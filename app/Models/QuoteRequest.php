<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuoteRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'first_name',
        'last_name',
        'email',
        'phone',
        'adults',
        'children',
        'room_details',
        'status',
    ];

    public function service()
    {
        return $this->belongsTo(\Modules\TourBooking\App\Models\Service::class, 'service_id');
    }
}
