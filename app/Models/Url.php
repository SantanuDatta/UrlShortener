<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Url extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'site_name',
        'original_url',
        'shorten_url',
        'click_count'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
