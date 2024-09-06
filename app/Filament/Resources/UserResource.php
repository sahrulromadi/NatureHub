<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\UserResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\UserResource\RelationManagers;
use Filament\Tables\Filters\TrashedFilter;

class UserResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?string $navigationIcon = 'heroicon-s-user-group';
    protected static ?string $navigationGroup = 'Others';

    public static function canCreate(): bool
    {
        return false;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('roles')
                    ->relationship('roles', 'name')
                    ->preload(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\Layout\Split::make([
                    Tables\Columns\Layout\Stack::make([
                        Tables\Columns\TextColumn::make('name')
                            ->searchable()
                            ->weight('medium')
                            ->alignCenter(),
                        Tables\Columns\TextColumn::make('roles.name')
                            ->searchable()
                            ->color('gray')
                            ->alignCenter()
                    ]),
                    Tables\Columns\TextColumn::make('email')
                        ->icon('heroicon-s-envelope')
                        ->searchable()
                        ->alignCenter(),
                    Tables\Columns\ImageColumn::make('image')
                        ->circular()
                        ->alignCenter(),
                    Tables\Columns\TextColumn::make('created_at')
                        ->dateTime('d/m/Y H:i')
                        ->sortable()
                        ->alignCenter(),
                ]),
            ])
            ->filters([
                TrashedFilter::make()
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->successNotification(
                        function ($record) {
                            $updatedRecord = $record->fresh(); 
                            $roleName = $updatedRecord->roles->pluck('name')->join(', ');

                            return Notification::make()
                                ->success()
                                ->title('User role updated')
                                ->body("'{$updatedRecord->name}' has been updated to '{$roleName}'");
                        }
                    ),
                Tables\Actions\DeleteAction::make()
                    ->successNotification(function ($record) {
                        return Notification::make()
                            ->success()
                            ->title('User deleted')
                            ->body("'{$record->name}' transferred to trash");
                    }),
                Tables\Actions\ForceDeleteAction::make()
                    ->successNotification(function ($record) {
                        return Notification::make()
                            ->success()
                            ->title('User deleted')
                            ->body("'{$record->name}' permanently deleted");
                    }),
                Tables\Actions\RestoreAction::make()
                    ->successNotification(function ($record) {
                        return Notification::make()
                            ->success()
                            ->title('User restored')
                            ->body("'{$record->name}' restored from trash");
                    })
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->successNotification(function ($records) {
                            $count = $records->count();
                            $names = $records->pluck('name')->implode(', ');

                            return Notification::make()
                                ->success()
                                ->title('Users deleted')
                                ->body("The following {$count} users were transferred to trash: {$names}");
                        }),
                    Tables\Actions\ForceDeleteBulkAction::make()
                        ->successNotification(function ($records) {
                            $count = $records->count();
                            $names = $records->pluck('name')->implode(', ');

                            return Notification::make()
                                ->success()
                                ->title('Users permanently deleted')
                                ->body("The following {$count} users were permanently deleted: {$names}");
                        }),
                    Tables\Actions\RestoreBulkAction::make()
                        ->successNotification(function ($records) {
                            $count = $records->count();
                            $names = $records->pluck('name')->implode(', ');

                            return Notification::make()
                                ->success()
                                ->title('Users restored')
                                ->body("The following {$count} users were restored: {$names}");
                        }),
                ]),
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
            'index' => Pages\ListUsers::route('/'),
            // 'create' => Pages\CreateUser::route('/create'),
            // 'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
