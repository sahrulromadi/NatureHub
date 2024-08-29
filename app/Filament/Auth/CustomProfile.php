<?php

namespace App\Filament\Auth;

use App\Models\User;
use Filament\Forms\Form;
use Filament\Pages\Auth\EditProfile;
use Filament\Forms\Components\FileUpload;

class CustomProfile extends EditProfile
{
    protected ?string $model = User::class;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('image')
                    ->image()
                    ->avatar()
                    ->imageEditor()
                    ->circleCropper()
                    ->directory('images'),
                $this->getNameFormComponent(),
                $this->getEmailFormComponent(),
                $this->getPasswordFormComponent(),
                $this->getPasswordConfirmationFormComponent(),
            ]);
    }
}
