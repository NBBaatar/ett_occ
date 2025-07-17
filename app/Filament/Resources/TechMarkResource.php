<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TechMarkResource\Pages;
use App\Filament\Resources\TechMarkResource\RelationManagers;
use App\Models\TechMark;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TechMarkResource extends Resource
{
    protected static ?string $model = TechMark::class;

    protected static ?string $navigationIcon = 'heroicon-o-truck';
    protected static ?string $navigationGroup = 'Техник';
    protected static ?string $pluralLabel = 'Техникийн марк';
    protected static ?int $navigationSort = 3;

    public static function getNavigationBadge(): ?string
    {
        return static ::getModel() ::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            -> schema([
                Forms\Components\TextInput ::make('brand')
                    -> label('Техникийн бренд ')
                    -> placeholder('Техникийн марк оруулах')
                    -> required()
                    -> maxLength(255),
                Forms\Components\TextInput ::make('name')
                    -> label('Техникийн марк ')
                    -> placeholder('Техникийн марк оруулах')
                    -> required()
                    -> maxLength(255),

                Forms\Components\Select ::make('tech_type_id')
                    -> native(false)
                    -> relationship('techType', 'name')
                    -> placeholder('Сонгох')
                    -> label('Техникийн төрөл')
                    -> searchable()
                    -> preload()
                    -> required(),
                Forms\Components\Toggle ::make('status')
                    -> required()
                    -> default(true)
                    -> label('Статус'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            -> columns([
                Tables\Columns\TextColumn ::make('name')
                    -> label('Техникийн Марк')
                    -> sortable()
                    -> searchable(isIndividual: false, isGlobal: true),
                Tables\Columns\IconColumn ::make('status')
                    -> label('Төлөв')
                    -> sortable()
                    -> boolean(),
                Tables\Columns\TextColumn ::make('techType.name')
                    -> label('Төхникийн төрөл')
                    -> numeric()
                    -> sortable(),
                Tables\Columns\TextColumn ::make('created_at')
                    -> dateTime()
                    -> sortable()
                    -> toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn ::make('updated_at')
                    -> dateTime()
                    -> sortable()
                    -> toggleable(isToggledHiddenByDefault: true),
            ])
            -> filters([
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
            'index' => Pages\ListTechMarks ::route('/'),
            'create' => Pages\CreateTechMark ::route('/create'),
            'edit' => Pages\EditTechMark ::route('/{record}/edit'),
        ];
    }
}
