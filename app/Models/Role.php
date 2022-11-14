<?php

namespace App\Models;

use App\Models\User;
use App\Trait\RolesAvailable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;
    use RolesAvailable;

    public function scopeGetAllAdminRoleId($query)
    {
        return $query->where('role', 'Admin_1')->orWhere('role', 'Admin_2')->orWhere('role', 'Admin_3');
    }


    protected $fillable = [
        'role'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
