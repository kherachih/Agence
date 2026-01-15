<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class DevAccessPassword extends Model
{
    use HasFactory;

    protected $fillable = ['password'];

    protected $hidden = ['password'];

    /**
     * Verify if the provided password matches the stored password
     */
    public static function verifyPassword(string $password): bool
    {
        $record = self::first();
        if (!$record) {
            return false;
        }
        return Hash::check($password, $record->password);
    }

    /**
     * Update the development access password
     */
    public static function updatePassword(string $newPassword): bool
    {
        $record = self::first();
        if (!$record) {
            $record = new self();
        }
        $record->password = Hash::make($newPassword);
        return $record->save();
    }

    /**
     * Get the current password record
     */
    public static function getCurrentRecord()
    {
        return self::first();
    }
}
