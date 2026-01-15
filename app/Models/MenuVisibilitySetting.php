<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuVisibilitySetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'menu_key',
        'menu_label',
        'is_enabled',
        'order',
        'parent_key',
    ];

    protected $casts = [
        'is_enabled' => 'boolean',
        'order' => 'integer',
    ];

    /**
     * Scope to get only enabled menus
     */
    public function scopeEnabled($query)
    {
        return $query->where('is_enabled', true);
    }

    /**
     * Check if a specific menu is enabled
     */
    public static function isMenuEnabled(string $key): bool
    {
        $setting = self::where('menu_key', $key)->first();
        return $setting ? $setting->is_enabled : true; // Default to enabled if not set
    }

    /**
     * Toggle menu visibility
     */
    public static function toggleMenu(string $key): bool
    {
        $setting = self::where('menu_key', $key)->first();
        if ($setting) {
            $setting->is_enabled = !$setting->is_enabled;
            $setting->save();
            return $setting->is_enabled;
        }
        return true;
    }

    /**
     * Get all menus ordered
     */
    public static function getAllMenus()
    {
        return self::orderBy('order')->get();
    }
}
