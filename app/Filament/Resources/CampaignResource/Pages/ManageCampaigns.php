<?php

namespace App\Filament\Resources\CampaignResource\Pages;

use Filament\Actions;
use Illuminate\Support\Facades\Auth;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ManageRecords;
use App\Filament\Resources\CampaignResource;

class ManageCampaigns extends ManageRecords
{
    protected static string $resource = CampaignResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->mutateFormDataUsing(function (array $data): array {
                    $data['user_id'] = Auth::id();

                    return $data;
                })
                ->successNotification(
                    function ($record) {
                        return Notification::make()
                            ->success()
                            ->title('Campaign Created')
                            ->body("The campaign titled '{$record->name}' has been created successfully.")
                            ->send();
                    }
                )
        ];
    }
}
