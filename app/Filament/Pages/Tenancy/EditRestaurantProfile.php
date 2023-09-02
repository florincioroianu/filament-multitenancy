<?php

namespace App\Filament\Pages\Tenancy;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Pages\Tenancy\EditTenantProfile;

class EditRestaurantProfile extends EditTenantProfile
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

//    protected static string $view = 'filament.pages.edit-restaurant-profile';

    public static function getLabel(): string
    {
        return 'Restaurant profile';
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name'),
                TextInput::make('address'),
                Toggle::make('active')
                // ...
            ]);
    }
}
