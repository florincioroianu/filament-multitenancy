<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Database\Seeder;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Restaurant::factory(150)->create()->each(function ($restaurant){
            $restaurant->users()->attach(User::inRandomOrder()->first());
//            $restaurant->users()->attach(User::find(1));
        });
    }
}
