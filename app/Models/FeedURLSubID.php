<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedURLSubID extends Model
{
    use HasFactory;
    protected $fillable = [
        'feed_urls_id',
        'sub_id',
        'feed_url_index',
        'limit',
        'feed_id'
    ];
}
