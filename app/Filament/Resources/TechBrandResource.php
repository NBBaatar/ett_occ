<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TechBrandResource\Pages;
use App\Filament\Resources\TechBrandResource\RelationManagers;
use App\Models\TechBrand;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TechBrandResource extends Resource
{
    protected static ?string $model = TechBrand::class;
    protected static ?string $navigationGroup = 'Техник';
    protected static ?string $pluralLabel = 'Техникийн бренд';
    protected static ?int $navigationSort = 3;
    public static function getNavigationBadge(): ?string
    {
        return static ::getModel() ::count();
    }
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Бренд нэр')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Toggle::make('status')
                    ->label('Төлөв')
                    ->default(true)
                    ->required(),
                Forms\Components\Select::make('tech_type_id')
                    ->relationship('techType', 'name')
                    ->live()
                    -> placeholder('Сонгох')
                    ->preload()
                    ->searchable()
                    ->label('Төхникийн төрөл')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    -> label('Бренд')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\IconColumn::make('status')
                    ->label('Төлөв')
                    ->sortable()
                    ->boolean(),
                Tables\Columns\TextColumn::make('techType.name')
                    ->label('Төхникийн төрөл')
                    ->numeric()
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            -> actions([
                Tables\Actions\ViewAction ::make() -> label('Харах'),
                Tables\Actions\EditAction ::make() -> label('Засах'),
            ])
            -> bulkActions([
                Tables\Actions\BulkActionGroup ::make([
                    Tables\Actions\DeleteBulkAction ::make() -> label('Устгах'),
                ]) -> label('Үйлдэл'),
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
            'index' => Pages\ListTechBrands::route('/'),
            'create' => Pages\CreateTechBrand::route('/create'),
            'edit' => Pages\EditTechBrand::route('/{record}/edit'),
        ];
    }
}
