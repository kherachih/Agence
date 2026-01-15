<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin;

class DevAccessLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_id',
        'ip_address',
        'user_agent',
        'action',
    ];

    public $timestamps = false;

    protected $casts = [
        'created_at' => 'datetime',
    ];

    /**
     * Relation with Admin model
     */
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    /**
     * Log a development access action
     */
    public static function logAccess(int $adminId, string $action): void
    {
        self::create([
            'admin_id' => $adminId,
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
            'action' => $action,
        ]);
    }

    /**
     * Get recent logs
     */
    public static function getRecentLogs(int $limit = 10)
    {
        return self::with('admin')->latest('created_at')->limit($limit)->get();
    }
}
