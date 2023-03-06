<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedURL extends Model
{
    use HasFactory;
    protected $fillable = [
        'feed_url',
        'feeds_id',
        'limit'
    ];

    public function sub_ids()
    {
        return $this->hasMany(FeedURLSubID::class, 'feed_urls_id', 'id');
    }
}
