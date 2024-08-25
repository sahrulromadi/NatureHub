<?php

namespace App\Filament\Resources\ArticleResource\Pages;

use Filament\Actions;
use Illuminate\Support\Facades\Auth;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\ArticleResource;
use App\Models\Article;

class ListArticles extends ListRecords
{
    protected static string $resource = ArticleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->mutateFormDataUsing(function (array $data): array {
                    $data['user_id'] = Auth::id();

                    return $data;
                })
                ->successNotification(function (Article $record) {
                    $title = $record->title;
                    Notification::make()
                        ->success()
                        ->title('Article Created')
                        ->body("The article titled '{$title}' has been created successfully.")
                        ->send();
                })
        ];
    }
}
