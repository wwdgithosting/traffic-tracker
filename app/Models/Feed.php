<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Feed extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'feed_name',
        'subid',
        'ip',
        'limit',
        'url',
        'randomise',
        'fallback_feed_url',
        'status',
        'country_code',
        'keyword',
        'browser',
        'device',
        'os',
        'os_version',
        'browser_user_agent',
        'browser_language',
        'referrer',

    ];
}
