<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;
use App\Filament\Resources\ContactResource;
use Filament\Widgets\TableWidget as BaseWidget;

class WidgetContactTable extends BaseWidget
{
    protected static ?int $sort = 6;
    protected int | string | array $columnSpan = 'full';

    public static function canView(): bool
    {
        return User::find(Auth::id())->hasAnyRole(['Super Admin', 'Admin']);
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(
                ContactResource::getEloquentQuery()->where('status', 0)
            )
            ->description('Unread messages from the site will be shown here.')
            ->defaultPaginationPageOption(5)
            ->defaultSort('created_at', 'desc')
            ->recordUrl(route('filament.dashboard.resources.contacts.index'))
            ->columns([
                Tables\Columns\TextColumn::make('index')
                    ->label('No')
                    ->rowIndex(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Date')
                    ->dateTime()
                    ->sortable()
                    ->dateTime('d/m/Y H:i'),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->wrap(),
                Tables\Columns\TextColumn::make('subject')
                    ->searchable()
                    ->wrap(),
            ]);
    }
}
