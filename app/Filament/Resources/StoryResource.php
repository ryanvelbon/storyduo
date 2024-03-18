<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StoryResource\Pages;
use App\Filament\Resources\StoryResource\RelationManagers;
use App\Models\Story;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class StoryResource extends Resource
{
    protected static ?string $model = Story::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Tabs')
                    ->columnSpanFull()
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Overview')
                            ->icon('heroicon-m-bell')
                            ->schema([
                                Forms\Components\Select::make('author_id')
                                    ->relationship(name: 'author', titleAttribute: 'username')
                                    ->searchable(['name', 'username', 'email']),
                                Forms\Components\Select::make('language_id')
                                    ->relationship(name: 'language', titleAttribute: 'name'),
                                Forms\Components\TextInput::make('title')
                                    ->live(debounce: '1000')
                                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state)))
                                    ->required()
                                    ->maxLength(70),
                                Forms\Components\TextInput::make('title_en')
                                    ->label('Title (English)')
                                    ->required()
                                    ->maxLength(70),
                                Forms\Components\TextInput::make('slug')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\RichEditor::make('description')
                                    ->required()
                                    ->maxLength(500)
                                    ->columnSpanFull()
                                    ->toolbarButtons([
                                        'bold',
                                        'italic',
                                        'redo',
                                        'undo',
                                    ]),
                                Forms\Components\FileUpload::make('feat_img')
                                    ->image()
                                    ->maxSize(1024),
                                Forms\Components\Toggle::make('published')
                                    ->required(),
                            ]),
                        Forms\Components\Tabs\Tab::make('Content Segments')
                            ->icon('heroicon-m-bell')
                            ->schema([
                                Forms\Components\Repeater::make('segments')
                                    ->relationship()
                                    ->schema([
                                        Forms\Components\FileUpload::make('img')
                                            ->label('Image')
                                            ->image()
                                            ->maxSize(1024),
                                        Forms\Components\RichEditor::make('text_lan1')
                                            ->label('Text')
                                            ->required()
                                            ->maxLength(500)
                                            ->toolbarButtons([
                                                'bold',
                                                'italic',
                                                'redo',
                                                'undo',
                                            ]),
                                        Forms\Components\RichEditor::make('text_lan2')
                                            ->label('Text (English)')
                                            ->maxLength(500)
                                            ->toolbarButtons([
                                                'bold',
                                                'italic',
                                                'redo',
                                                'undo',
                                            ]),
                                    ])
                                    ->columns(3)
                                    ->orderColumn('sort')
                                    ->defaultItems(0)
                            ]),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('author.name'),
                Tables\Columns\ImageColumn::make('feat_img')
                    ->label('Image'),
                Tables\Columns\TextColumn::make('language.code')
                    ->label('Lang'),
                Tables\Columns\TextColumn::make('title')
                    ->description(fn (Story $record): string => $record->title_en)
                    ->searchable(),
                Tables\Columns\ToggleColumn::make('published'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
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
            'index' => Pages\ListStories::route('/'),
            'create' => Pages\CreateStory::route('/create'),
            'edit' => Pages\EditStory::route('/{record}/edit'),
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
