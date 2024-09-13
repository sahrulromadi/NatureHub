<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Contact;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Infolists\Components\Tabs;
use Illuminate\Database\Eloquent\Builder;
use Filament\Infolists\Components\Tabs\Tab;
use Filament\Infolists\Components\TextEntry;
use Illuminate\Database\Eloquent\Collection;
use App\Filament\Resources\ContactResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ContactResource\RelationManagers;

class ContactResource extends Resource
{
    protected static ?string $model = Contact::class;

    protected static ?string $navigationIcon = 'heroicon-c-chat-bubble-left-right';
    protected static ?string $navigationGroup = 'Others';

    // To prohibit create for all roles (including Super Admin)
    public static function canCreate(): bool
    {
        return false;
    }

    public static function canEdit($record): bool
    {
        return false;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // not active
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->description('All messages from the site will be shown here.')
            ->columns([
                Tables\Columns\TextColumn::make('index')
                    ->label('No')
                    ->rowIndex(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Date')
                    ->dateTime()
                    ->sortable()
                    ->dateTime('d/m/Y H:i'),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Updated')
                    ->dateTime()
                    ->sortable()
                    ->dateTime('d/m/Y H:i')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->wrap(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('subject')
                    ->searchable()
                    ->wrap(),
                Tables\Columns\IconColumn::make('status')
                    ->boolean()
                    ->sortable()
                    ->trueIcon('heroicon-s-check-circle')
                    ->trueColor('success')
                    ->falseIcon('heroicon-s-x-circle')
                    ->falseColor('danger'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->modalHeading(fn($record) => $record->subject),
                Tables\Actions\Action::make('toggleStatus')
                    ->label(fn($record) => $record->status ? 'Mark as Unread' : 'Mark as Read')
                    ->icon(fn($record) => $record->status ? 'heroicon-o-eye-slash' : 'heroicon-o-eye')
                    ->color(fn($record) => $record->status ? 'warning' : 'success')
                    ->action(function ($record) {
                        $newStatus = $record->status ? 0 : 1;
                        $record->update([
                            'status' => $newStatus
                        ]);
                    })
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\BulkAction::make('BulkToggleStatus')
                        ->label(
                            fn(?Collection $records) =>
                            $records && $records->count() > 1 ?
                                'Status for Selected' : ($records && $records->first()?->status ? 'Mark as Unread' : 'Mark as Read')
                        )
                        ->icon(
                            fn(?Collection $records) =>
                            $records && $records->count() > 1 ?
                                'heroicon-s-arrow-path-rounded-square' : ($records && $records->first()?->status ? 'heroicon-o-eye-slash' : 'heroicon-o-eye')
                        )
                        ->color(
                            fn(?Collection $records) =>
                            $records && $records->count() > 1 ?
                                'primary' : ($records && $records->first()?->status ? 'warning' : 'success')
                        )
                        ->action(function (?Collection $records) {
                            if ($records && $records->count() > 0) {
                                // count how many have been read and unread
                                $readCount = $records->where('status', 1)->count();
                                $unreadCount = $records->where('status', 0)->count();

                                // logic to set new status
                                $newStatus = $unreadCount > $readCount ? 1 : 0;

                                // update records
                                $records->each(function ($record) use ($newStatus) {
                                    $record->update(['status' => $newStatus]);
                                });
                            }
                        })
                        ->deselectRecordsAfterCompletion()
                ]),
            ])
            ->defaultSort(
                fn($query) => $query
                    ->orderBy('status', 'asc')
                    ->orderBy('created_at', 'desc')
            );
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Tabs::make('Tabs')
                    ->tabs([
                        Tab::make('Sender Info')
                            ->icon('heroicon-c-user-circle')
                            ->schema([
                                TextEntry::make('name')
                                    ->label('Name')
                                    ->icon('heroicon-m-user'),
                                TextEntry::make('email')
                                    ->copyable()
                                    ->icon('heroicon-m-envelope'),
                                TextEntry::make('phone')
                                    ->copyable()
                                    ->icon('heroicon-m-phone'),
                            ])
                            ->inlineLabel(),
                        Tab::make('Message')
                            ->icon('heroicon-o-chat-bubble-oval-left-ellipsis')
                            ->schema([
                                TextEntry::make('message')
                                    ->label(false),
                            ]),
                    ])
                    ->columnSpanFull()
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContacts::route('/'),
            'create' => Pages\CreateContact::route('/create'),
            // 'view' => Pages\ViewContact::route('/{record}'),
            // 'edit' => Pages\EditContact::route('/{record}/edit'),
        ];
    }
}
