<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use App\Models\Article;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Section;
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
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\RestoreAction;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Infolists\Components\TextEntry;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Infolists\Components\ImageEntry;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\ForceDeleteAction;
use Filament\Tables\Actions\RestoreBulkAction;
use App\Filament\Resources\ArticleResource\Pages;
use Filament\Tables\Actions\ForceDeleteBulkAction;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ArticleResource\RelationManagers;
use Filament\Infolists\Components\Section as InfolistSection;

class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;
    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    protected static ?string $navigationGroup = 'Content';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make()
                    ->schema([
                        Section::make()
                            ->description('Create your article here!')
                            ->icon('heroicon-o-document-plus')
                            ->schema([
                                TextInput::make('title')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(function (Set $set, ?string $state) {
                                        $slug = Str::slug($state);
                                        $baseSlug = $slug;
                                        $count = 1;

                                        while (Article::where('slug', $slug)->exists()) {
                                            $slug = $baseSlug . '-' . $count;
                                            $count++;
                                        }

                                        $set('slug', $slug);
                                    }),
                                RichEditor::make('body')
                                    ->required()
                                    ->columnSpanFull()
                                    ->disableToolbarButtons([
                                        'attachFiles',
                                        'codeBlock',
                                    ]),
                            ])
                            ->columnSpan(2),

                        Section::make()
                            ->schema([
                                TextInput::make('slug')
                                    ->required()
                                    ->placeholder('Auto generated')
                                    ->maxLength(255)
                                    ->readOnly(),
                            ])
                            ->columnSpan(1),

                        Section::make()
                            ->schema([
                                FileUpload::make('image')
                                    ->image()
                                    ->imageEditor()
                                    ->openable()
                                    ->directory('images'),
                            ])
                            ->columnSpan(1)
                    ])->visible(fn() => !User::find(Auth::id())->hasRole('Editor'))
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(function (Builder $query) {
                $user = User::find(Auth::id());
                if ($user->hasRole('Writer')) {
                    $query->where('user_id', $user->id);
                } elseif ($user->hasRole('Editor')) {
                    $query->where('status', 'Reviewing');
                }
            })
            ->columns([
                TextColumn::make('index')
                    ->label('No')
                    ->rowIndex(),
                TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->wrap(),
                ImageColumn::make('image'),
                TextColumn::make('author.name')
                    ->label('Author')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('status')
                    ->badge()
                    ->sortable()
                    ->color(fn(string $state): string => match ($state) {
                        'Reviewing' => 'warning',
                        'Published' => 'success',
                        'Rejected' => 'danger',
                    }),
                TextColumn::make('likes_count')
                    ->label('Likes')
                    ->sortable(),
                TextColumn::make('views')
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
                SelectFilter::make('status')
                    ->options([
                        'Reviewing' => 'Reviewing',
                        'Published' => 'Published',
                        'Rejected' => 'Rejected',
                    ]),
                TrashedFilter::make(),
            ])
            ->actions([
                ActionGroup::make([
                    ViewAction::make(),
                    EditAction::make()
                        ->hidden(
                            fn(Article $record) =>
                            $record->status === 'Published' && !User::find(Auth::id())->hasRole('Super Admin')
                        )
                        ->successNotification(
                            function ($record) {
                                return Notification::make()
                                    ->success()
                                    ->title('Article Updated')
                                    ->body("The article titled '{$record->title}' has been updated successfully.")
                                    ->send();
                            }
                        ),
                    DeleteAction::make()
                        ->successNotification(function ($record) {
                            return Notification::make()
                                ->success()
                                ->title('Article deleted')
                                ->body("'{$record->title}' transferred to trash");
                        }),
                    ForceDeleteAction::make()
                        ->successNotification(function ($record) {
                            return Notification::make()
                                ->success()
                                ->title('Article deleted')
                                ->body("'{$record->title}' permanently deleted");
                        }),
                    RestoreAction::make()
                        ->successNotification(function ($record) {
                            return Notification::make()
                                ->success()
                                ->title('Article restored')
                                ->body("'{$record->title}' restored from trash");
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
                            $titles = $records->pluck('title')->implode(', ');

                            return Notification::make()
                                ->success()
                                ->title('Articles deleted')
                                ->body("The following {$count} articles were transferred to trash: {$titles}");
                        }),
                    ForceDeleteBulkAction::make()
                        ->successNotification(function ($records) {
                            $count = $records->count();
                            $titles = $records->pluck('title')->implode(', ');

                            return Notification::make()
                                ->success()
                                ->title('Articles permanently deleted')
                                ->body("The following {$count} articles were permanently deleted: {$titles}");
                        }),
                    RestoreBulkAction::make()
                        ->successNotification(function ($records) {
                            $count = $records->count();
                            $titles = $records->pluck('title')->implode(', ');

                            return Notification::make()
                                ->success()
                                ->title('Articles restored')
                                ->body("The following {$count} articles were restored: {$titles}");
                        }),
                ]),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                InfolistSection::make()
                    ->description('Image')
                    ->icon('heroicon-m-photo')
                    ->schema([
                        ImageEntry::make('image')
                            ->label(false)
                            ->columnSpanFull()
                            ->extraAttributes([
                                'style' => 'justify-content: center; align-items: center;'
                            ])
                    ])
                    ->collapsed()
                    ->hidden(fn($record) => $record->image === null),

                InfolistSection::make()
                    ->schema([
                        TextEntry::make('')
                            ->label(false)
                            ->columnSpanFull()
                            ->view('filament.infolists.entries.articleView'),
                    ])
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ])
            ->withCount('likes');
    }


    public static function getPages(): array
    {
        return [
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'view' => Pages\ViewArticle::route('/{record}'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }
}
