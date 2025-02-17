<?php
namespace App\Filament\Resources;

use App\Filament\Resources\EmployerResource\Pages;
use App\Models\Employer;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\NumberInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;

class EmployerResource extends Resource
{
    protected static ?string $model = Employer::class;
    protected static ?string $navigationIcon = 'heroicon-o-calculator';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required(),
                TextInput::make('position')->required(),
                TextInput::make('basic_salary') ->numeric(),
                TextInput::make('ot_salary')->numeric(),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->sortable()->searchable(),
                TextColumn::make('position')->sortable(),
                TextColumn::make('basic_salary')->money('LKR'),
                TextColumn::make('ot_salary')->money('LKR'),
                TextColumn::make('total_salary')->money('LKR')->label('Total Salary'),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEmployers::route('/'),
            'create' => Pages\CreateEmployer::route('/create'),
            'edit' => Pages\EditEmployer::route('/{record}/edit'),
        ];
    }
}
