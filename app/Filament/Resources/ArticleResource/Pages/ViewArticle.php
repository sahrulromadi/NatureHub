<?php

namespace App\Filament\Resources\ArticleResource\Pages;

use App\Models\User;
use Filament\Actions;
use App\Models\Article;
use Filament\Actions\Action;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Select;
use Filament\Resources\Pages\ViewRecord;
use App\Filament\Resources\ArticleResource;

class ViewArticle extends ViewRecord
{
    protected static string $resource = ArticleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('Update Status')
                ->form([
                    Select::make('status')
                        ->options([
                            'Published' => 'Accepted',
                            'Rejected' => 'Rejected',
                        ])
                ])
                ->fillForm(fn(Article $record): array => [
                    'status' => $record->status,
                ])
                ->action(function (Article $record, array $data): void {
                    $record->status = $data['status'];
                    $record->save();
                })
                ->visible(fn() => !User::find(Auth::id())->hasRole('Writer'))
                ->successNotificationTitle('Status updated successfully!'),
        ];
    }
}
