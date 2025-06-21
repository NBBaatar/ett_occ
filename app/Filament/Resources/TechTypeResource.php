<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TechTypeResource\Pages;
use App\Filament\Resources\TechTypeResource\RelationManagers;
use App\Models\TechType;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TechTypeResource extends Resource
{
    protected static ?string $model = TechType::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-group';
    protected static ?string $navigationGroup = 'Техник';
    protected static ?string $pluralLabel = 'Техникийн төрөл';
    protected static ?int $navigationSort = 2;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('Техник төрлийн нэр')
                    ->label('Төрлийн нэр'),

                Forms\Components\Select::make('tech_category_id')
                    ->placeholder(' Сонгох')
                    ->label('Төхникийн ангилал')
                    ->searchable()
                    ->relationship('techCategory', 'name')
                    ->preload()
                    ->required(),
                Forms\Components\Toggle::make('status')
                    ->default(true)
                    ->required()
                    ->label('Статус'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Төхникийн төрөл')
                    ->sortable()
                    ->searchable(isIndividual: false, isGlobal: true),
                Tables\Columns\IconColumn::make('status')
                    ->sortable()
                    ->label('Төлөв')
                    ->boolean(),
                Tables\Columns\TextColumn::make('techCategory.name')
                    ->label('Төхникийн ангилал')
                    ->numeric()
                    ->searchable(isIndividual: false, isGlobal: true)
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
            ->actions([
                Tables\Actions\ViewAction::make()->label('Харах'),
                Tables\Actions\EditAction::make()->label('Засах'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()->label('Устгах'),
                ])->label('Үйлдэл'),
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
            'index' => Pages\ListTechTypes::route('/'),
            'create' => Pages\CreateTechType::route('/create'),
            'edit' => Pages\EditTechType::route('/{record}/edit'),
        ];
    }
}
