<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TechCategoryResource\Pages;
use App\Filament\Resources\TechCategoryResource\RelationManagers;
use App\Models\TechCategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TechCategoryResource extends Resource
{
    protected static ?string $model = TechCategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
    protected static ?string $navigationGroup = 'Техник';
    protected static ?string $pluralLabel = 'Техникийн ангилал';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('Техник ангиллын нэр')
                    ->label('Ангиллын нэр'),
                Forms\Components\Toggle::make('status')
                    ->default(true)
                    ->required()
                    ->label('Техник ангилал статус'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Ангилал')
                    ->sortable()
                    ->searchable(isIndividual: false, isGlobal: true),
                Tables\Columns\IconColumn::make('status')
                    ->label('Төлөв')
                    ->sortable()
                    ->boolean(),
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
            'index' => Pages\ListTechCategories::route('/'),
            'create' => Pages\CreateTechCategory::route('/create'),
            'edit' => Pages\EditTechCategory::route('/{record}/edit'),
        ];
    }
}
