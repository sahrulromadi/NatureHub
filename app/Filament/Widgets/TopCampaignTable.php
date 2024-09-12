<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;
use App\Filament\Resources\CampaignResource;
use Filament\Widgets\TableWidget as BaseWidget;

class TopCampaignTable extends BaseWidget
{
    protected static ?int $sort = 8;

    public static function canView(): bool
    {
        return User::find(Auth::id())->hasAnyRole(['Super Admin', 'Admin']);
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(
                CampaignResource::getEloquentQuery()->withCount('likes')
                    ->orderBy('likes_count', 'desc')
                    ->orderBy('created_at', 'desc')
                    ->limit(5)
            )
            ->defaultPaginationPageOption(5)
            ->recordUrl(route('filament.dashboard.resources.campaigns.index'))
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Date')
                    ->dateTime()
                    ->sortable()
                    ->dateTime('d/m/Y H:i'),
                Tables\Columns\TextColumn::make('name')
                    ->wrap(),
                Tables\Columns\TextColumn::make('likes_count')
                    ->label('Likes'),
            ]);
    }
}
