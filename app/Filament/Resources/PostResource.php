<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Post;
use Filament\Forms;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\BooleanColumn;

use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use App\Models\Category;
use Filament\Forms\Components\FileUpload;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\ColorColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\TextColumn\TextColumnSize;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Create a post')
                 ->description('create a post over here.')
                 ->collapsible()


                ->schema([
                    TextInput::make('title')->required(),
                    TextInput::make('slug')->required(),
                    Select::make('category_id')
                    ->options(Category::all()->pluck('name','id')),
                    ColorPicker::make('color')->required(),
                    MarkdownEditor::make('content')->required() ->columnSpanFull(),

                ])->columnSpan(2)->columns(2),


                Section::make("Meta")
                    ->schema([
                        FileUpload::make('thumbnail')->disk('public')->directory('thumbnails'),
                        TagsInput::make('tags')->required(),
                        Checkbox::make ('published')->required(),
                    ])->columnSpan(1),

            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('thumbnail'),
                ColorColumn::make('color'),
                TextColumn::make('title'),
                TextColumn::make('slug'),
                TextColumn::make('category.name'),
                TextColumn::make('tags'),
                BooleanColumn::make('published'),
            ])
            ->filters([

            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
