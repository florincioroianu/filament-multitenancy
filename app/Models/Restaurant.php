<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Restaurant extends Model
{
    use HasFactory;

    /**
     * @return HasOne
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class)->first();
    }

    /**
     * The users that belong to the restaurant.
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
