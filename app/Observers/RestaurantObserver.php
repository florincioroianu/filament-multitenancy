<?php

namespace App\Observers;

use App\Models\Restaurant;
use Illuminate\Support\Str;

class RestaurantObserver
{
    /**
     * Handle events after all transactions are committed.
     *
     * @var bool
     */
    public bool $afterCommit = true;

    /**
     * Handle the Restaurant "created" event.
     */
    public function created(Restaurant $restaurant): void
    {
        $restaurant->updateQuietly(['slug' => Str::slug($restaurant->name)]);
    }

    /**
     * Handle the Restaurant "updated" event.
     */
    public function updated(Restaurant $restaurant): void
    {
        if($restaurant->isDirty('name')){
            $restaurant->updateQuietly(['slug' => Str::slug($restaurant->name)]);
        }
    }

    /**
     * Handle the Restaurant "deleted" event.
     */
    public function deleted(Restaurant $restaurant): void
    {
        //
    }

    /**
     * Handle the Restaurant "restored" event.
     */
    public function restored(Restaurant $restaurant): void
    {
        //
    }

    /**
     * Handle the Restaurant "force deleted" event.
     */
    public function forceDeleted(Restaurant $restaurant): void
    {
        //
    }
}
