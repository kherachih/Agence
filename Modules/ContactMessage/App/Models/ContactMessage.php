<?php

namespace Modules\ContactMessage\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\ContactMessage\Database\factories\ContactMessageFactory;

class ContactMessage extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['name', 'email', 'phone', 'subject', 'message', 'service_id'];

    public function service()
    {
        return $this->belongsTo(\Modules\TourBooking\App\Models\Service::class, 'service_id');
    }


}
