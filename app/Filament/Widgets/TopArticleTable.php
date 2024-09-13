<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use App\Filament\Resources\ArticleResource;
use Filament\Widgets\TableWidget as BaseWidget;

class TopArticleTable extends BaseWidget
{
    protected static ?int $sort = 7;

    public static function canView(): bool
    {
        return User::find(Auth::id())->hasAnyRole(['Super Admin', 'Admin']);
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(
                ArticleResource::getEloquentQuery()->withCount('likes')
                    ->orderBy('likes_count', 'desc')
                    ->orderBy('created_at', 'desc')
                    ->limit(5)
            )
            ->defaultPaginationPageOption(5)
            ->recordUrl(
                fn(Model $record): string => route('articles.show', ['article' => $record->slug]),
            )
            ->columns([
                Tables\Columns\TextColumn::make('index')
                    ->label('No')
                    ->rowIndex(),
                Tables\Columns\TextColumn::make('title')
                    ->wrap(),
                Tables\Columns\TextColumn::make('likes_count')
                    ->label('Likes'),
                Tables\Columns\TextColumn::make('author.name')
                    ->label('Author')
            ]);
    }
}
