<?php

namespace App\Filament\Auth;

use App\Models\User;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Illuminate\Support\Str;
use Filament\Pages\Auth\Register;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Component;

class CustomRegister extends Register
{
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->autofocus()
                    ->live(onBlur: true)
                    ->afterStateUpdated(function (Set $set, ?string $state) {
                        $slug = Str::slug($state);
                        $baseSlug = $slug;
                        $count = 1;

                        while (User::where('slug', $slug)->exists()) {
                            $slug = $baseSlug . '-' . $count;
                            $count++;
                        }

                        $set('slug', $slug);
                    }),
                TextInput::make('slug')
                    ->required()
                    ->maxLength(255)
                    ->readOnly()
                    ->hidden(fn(Get $get): bool => ! $get('name')),
                $this->getEmailFormComponent(),
                $this->getPasswordFormComponent(),
                $this->getPasswordConfirmationFormComponent(),
                $this->getRoleFormComponent(),
            ]);
    }

    protected static function getRoleFormComponent(): Component
    {
        return
            Select::make('roles')
            ->required()
            ->relationship('roles', 'name')
            ->default('Writer');
    }
}
