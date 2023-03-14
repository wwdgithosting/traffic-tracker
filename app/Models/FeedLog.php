<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedLog extends Model
{
    use HasFactory;
    protected $fillable = [
        'feed_date',
        'partner',
        'subid',
        'ip',
        'country_iso',
        'keyword',
        'browser',
        'device',
        'os',
        'os_version',
        'browser_user_agent',
        'browser_language',
        'referrer',
        'url',
        'latency',
        'count',
        'fallback_feed_url_count',
        'pid',
        'user_id',
        'org_id',
        'partner_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function partners()
    {
        return $this->belongsTo(Partner::class, 'partner_id', 'id');
    }

    public function organisation()
    {
        return $this->belongsTo(Organisation::class, 'org_id', 'id');
    }
}
