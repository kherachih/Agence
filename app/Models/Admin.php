<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
        'admin_type',
        'image',
    ];

    const STATUS_ACTIVE = 'enable';

    const STATUS_INACTIVE = 'disable';

    public function isSuperAdmin()
    {
        return $this->admin_type == 'super_admin';
    }


}
