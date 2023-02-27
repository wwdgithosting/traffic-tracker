<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MenuMaster extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'menu_name',
        'url',
        'status',
    ];

    public function roles()
    {
        return $this->hasMany(UserRolePermission::class, 'menu_id', 'id');
    }
}
