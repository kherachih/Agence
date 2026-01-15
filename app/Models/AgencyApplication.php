<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgencyApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'agency_name',
        'agency_slug',
        'email',
        'phone',
        'password',
        'about_agency',
        'country',
        'state',
        'city',
        'address',
        'website',
        'location_map',
        'facebook',
        'linkedin',
        'twitter',
        'instagram',
        'agency_logo',
        'business_license',
        'id_document',
        'tax_certificate',
        'insurance_document',
        'other_documents',
        'status',
        'admin_notes',
        'reviewed_by',
        'reviewed_at',
        'user_id',
    ];

    protected $casts = [
        'other_documents' => 'array',
        'reviewed_at' => 'datetime',
    ];

    protected $hidden = [
        'password',
    ];

    /**
     * Get the admin who reviewed this application
     */
    public function reviewer()
    {
        return $this->belongsTo(Admin::class, 'reviewed_by');
    }

    /**
     * Get the user account created from this application
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Scope for pending applications
     */
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    /**
     * Scope for approved applications
     */
    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }

    /**
     * Scope for rejected applications
     */
    public function scopeRejected($query)
    {
        return $query->where('status', 'rejected');
    }
}
