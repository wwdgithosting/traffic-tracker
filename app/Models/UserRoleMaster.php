<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserRoleMaster extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'role_name',
        'status',
    ];

    public function permission()
    {
        return $this->belongsToMany(UserRolePermission::class, 'user_role_permissions',  'user_role_id', 'id');
    }

    public function permissions()
    {
        return $this->hasMany(UserRolePermission::class, 'user_role_id', 'id');
    }
}
