<?php

namespace App\Filament\Auth;

use App\Models\User;
use Filament\Forms\Form;
use Filament\Forms\Components\Split;
use Filament\Pages\Auth\EditProfile;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\FileUpload;

class CustomProfile extends EditProfile
{
    protected ?string $model = User::class;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Split::make([
                    Section::make([
                        FileUpload::make('image')
                            ->label(false)
                            ->image()
                            ->avatar()
                            ->imageEditor()
                            ->circleCropper()
                            ->directory('images')
                            ->extraAttributes([
                                'style' => 'justify-content: center; align-items: center;'
                            ])
                    ]),

                    Section::make([
                        $this->getNameFormComponent(),
                        $this->getEmailFormComponent(),
                        $this->getPasswordFormComponent(),
                        $this->getPasswordConfirmationFormComponent(),
                    ])
                ])
            ]);
    }
}
