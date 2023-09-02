<?php

namespace App\Models;

use Database\Factories\RestaurantFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;

/**
 * App\Models\Restaurant
 *
 * @property int $id
 * @property string $name
 * @property string|null $slug
 * @property int $active
 * @property string $country
 * @property string $city
 * @property string|null $address
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read User|null $user
 * @property-read Collection<int, User> $users
 * @property-read int|null $users_count
 * @method static RestaurantFactory factory($count = null, $state = [])
 * @method static Builder|Restaurant newModelQuery()
 * @method static Builder|Restaurant newQuery()
 * @method static Builder|Restaurant query()
 * @method static Builder|Restaurant whereActive($value)
 * @method static Builder|Restaurant whereAddress($value)
 * @method static Builder|Restaurant whereCity($value)
 * @method static Builder|Restaurant whereCountry($value)
 * @method static Builder|Restaurant whereCreatedAt($value)
 * @method static Builder|Restaurant whereDeletedAt($value)
 * @method static Builder|Restaurant whereId($value)
 * @method static Builder|Restaurant whereName($value)
 * @method static Builder|Restaurant whereSlug($value)
 * @method static Builder|Restaurant whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'active',
        'country',
        'city',
        'address',
    ];

    /**
     * @return HasOne
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }

    /**
     * The users that belong to the restaurant.
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
