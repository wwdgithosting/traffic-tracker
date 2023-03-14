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
        'id',
        'name',
        'limit',
        'feed_url',
        'sub_id',
        'ip_limit',
        'sid_limit',
        'feed_url_waterfall',
        'randomise',
        'latency_test',
        'fallback_feed_url',
        'notes',
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
        'ip',
        'created_user_id',
        'org_id',
        'feed_title'

    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'name', 'id');
    }

    public function partners()
    {
        return $this->belongsTo(Partner::class, 'name', 'id');
    }

    public function organisation()
    {
        return $this->belongsTo(Organisation::class, 'org_id', 'id');
    }
}
