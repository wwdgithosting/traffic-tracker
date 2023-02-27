<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserRolePermission extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'user_role_id',
        'menu_id',
    ];

    public function permission()
    {
        return $this->belongsToMany(MenuMaster::class);
    }
}
