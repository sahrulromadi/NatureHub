<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Set;
use App\Models\Campaign;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Forms\Components\Tabs;
use Filament\Tables\Filters\Filter;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Actions\DeleteAction;
use Illuminate\Database\Eloquent\Builder;
use Filament\Infolists\Components\Section;
use Filament\Tables\Actions\RestoreAction;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Infolists\Components\Fieldset;
use Filament\Infolists\Components\TextEntry;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Infolists\Components\ImageEntry;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\ForceDeleteAction;
use Filament\Tables\Actions\RestoreBulkAction;
use App\Filament\Resources\CampaignResource\Pages;
use Filament\Tables\Actions\ForceDeleteBulkAction;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CampaignResource\RelationManagers;

class CampaignResource extends Resource
{
    protected static ?string $model = Campaign::class;
    protected static ?string $navigationIcon = 'heroicon-o-globe-asia-australia';
    protected static ?string $navigationGroup = 'Content';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Tabs')
                    ->tabs([
                        Tab::make('Tab 1')
                            ->icon('heroicon-m-pencil')
                            ->schema([
                                TextInput::make('name')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(function (Set $set, ?string $state) {
                                        $slug = Str::slug($state);
                                        $baseSlug = $slug;
                                        $count = 1;

                                        while (Campaign::where('slug', $slug)->exists()) {
                                            $slug = $baseSlug . '-' . $count;
                                            $count++;
                                        }

                                        $set('slug', $slug);
                                    }),
                                TextInput::make('slug')
                                    ->required()
                                    ->maxLength(255)
                                    ->readOnly()
                                    ->columnSpan(1),
                                RichEditor::make('summary')
                                    ->required()
                                    ->columnSpanFull()
                                    ->disableToolbarButtons([
                                        'attachFiles',
                                        'codeBlock',
                                    ]),
                            ])
                            ->columns(2),
                        Tab::make('Tab 2')
                            ->icon('heroicon-c-photo')
                            ->schema([
                                FileUpload::make('image')
                                    ->label('Poster')
                                    ->image()
                                    ->imageEditor()
                                    ->imageResizeMode('cover')
                                    ->imageCropAspectRatio('3508:4961')
                                    ->imageResizeTargetWidth('3508')
                                    ->imageResizeTargetHeight('4961')
                                    ->openable()
                                    ->directory('images')
                                    ->columnSpan(1)
                                    ->imagePreviewHeight('250'),
                                FileUpload::make('banner')
                                    ->image()
                                    ->imageEditor()
                                    ->imageResizeMode('cover')
                                    ->imageCropAspectRatio('16:9')
                                    ->imageResizeTargetWidth('1920')
                                    ->imageResizeTargetHeight('1080')
                                    ->openable()
                                    ->directory('images')
                                    ->columnSpan(1)
                                    ->imagePreviewHeight('250'),
                                RichEditor::make('content')
                                    ->required()
                                    ->columnSpanFull()
                                    ->disableToolbarButtons([
                                        'attachFiles',
                                        'codeBlock',
                                    ]),
                            ]),
                    ])
                    ->columnSpanFull()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(function (Builder $query) {
                $userId = Auth::id();
                $query->where('user_id', $userId);
            })
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->wrap(),
                TextColumn::make('summary')
                    ->wrap()
                    ->html(),
                ImageColumn::make('image')
                    ->label('Poster'),
                ImageColumn::make('banner'),
                TextColumn::make('author.name')
                    ->label('Author')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('deleted_at')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                TrashedFilter::make(),
                Filter::make('is_starred')
                    ->label('Starred')
                    ->toggle()
            ])
            ->actions([
                ActionGroup::make([
                    ViewAction::make(),
                    Tables\Actions\Action::make('star')
                        ->action(function ($record) {
                            $record->update([
                                'is_starred' => !$record->is_starred
                            ]);
                        })
                        ->color('warning')
                        ->icon(fn($record) => $record->is_starred ? 'heroicon-s-star' : 'heroicon-o-star'),
                    EditAction::make()
                        ->successNotification(
                            function ($record) {
                                return Notification::make()
                                    ->success()
                                    ->title('Campaign Updated')
                                    ->body("The campaign titled '{$record->name}' has been updated successfully.")
                                    ->send();
                            }
                        ),
                    DeleteAction::make()
                        ->successNotification(function ($record) {
                            return Notification::make()
                                ->success()
                                ->title('Campaign deleted')
                                ->body("'{$record->name}' transferred to trash");
                        }),
                    ForceDeleteAction::make()
                        ->successNotification(function ($record) {
                            return Notification::make()
                                ->success()
                                ->title('Campaign deleted')
                                ->body("'{$record->name}' permanently deleted");
                        }),
                    RestoreAction::make()
                        ->successNotification(function ($record) {
                            return Notification::make()
                                ->success()
                                ->title('Campaign restored')
                                ->body("'{$record->name}' restored from trash");
                        })
                ])
                    ->button()
                    ->label('Actions')
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->successNotification(function ($records) {
                            $count = $records->count();
                            $names = $records->pluck('name')->implode(', ');

                            return Notification::make()
                                ->success()
                                ->title('Campaigns deleted')
                                ->body("The following {$count} campaigns were transferred to trash: {$names}");
                        }),
                    ForceDeleteBulkAction::make()
                        ->successNotification(function ($records) {
                            $count = $records->count();
                            $names = $records->pluck('name')->implode(', ');

                            return Notification::make()
                                ->success()
                                ->title('Campaigns permanently deleted')
                                ->body("The following {$count} campaigns were permanently deleted: {$names}");
                        }),
                    RestoreBulkAction::make()
                        ->successNotification(function ($records) {
                            $count = $records->count();
                            $names = $records->pluck('name')->implode(', ');

                            return Notification::make()
                                ->success()
                                ->title('Campaigns restored')
                                ->body("The following {$count} campaigns were restored: {$names}");
                        }),
                ]),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make()
                    ->description('Poster')
                    ->icon('heroicon-m-photo')
                    ->schema([
                        ImageEntry::make('image')
                            ->label(false)
                            ->defaultImageUrl(asset('img/defaultPoster.png'))
                            ->columnSpanFull()
                            ->width(300)
                            ->height(400)
                            ->extraAttributes([
                                'style' => 'justify-content: center; align-items: center;'
                            ])
                    ])
                    ->collapsed()
                    ->hidden(fn($record) => $record->image === null),

                Fieldset::make('Content')
                    ->schema([
                        TextEntry::make('')
                            ->label(false)
                            ->columnSpanFull()
                            ->view('filament.infolists.entries.campaignView')
                    ])

            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageCampaigns::route('/'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
