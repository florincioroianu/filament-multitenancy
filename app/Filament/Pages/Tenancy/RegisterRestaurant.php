<?php

namespace App\Filament\Pages\Tenancy;

use App\Models\Restaurant;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\Tenancy\RegisterTenant;
use Illuminate\Database\Eloquent\Model;

class RegisterRestaurant extends RegisterTenant
{
//    protected static string $view = 'filament.pages.tenancy.register-restaurant';

    public static function getLabel(): string
    {
        return 'Register restaurant';
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name'),
                TextInput::make('city'),
                TextInput::make('country'),
                // ...
            ]);
    }

    protected function handleRegistration(array $data): Model
    {
        $restaurant = Restaurant::create($data);

        $restaurant->users()->attach(auth()->user());

        return $restaurant;
    }
}
