<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class organization_partner extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'org_id',
        'partner_id',
        'status'
    ];
}
