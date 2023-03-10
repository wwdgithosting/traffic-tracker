<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Partner extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'partners_name',
        'org_id',
        'status',
    ];

    public function organisations()
    {
        return $this->belongsToMany(Organisation::class, 'organization_partners', 'partner_id', 'org_id');
    }
}
