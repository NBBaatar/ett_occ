<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PropertyResource\Pages;
use App\Filament\Resources\PropertyResource\RelationManagers;
use App\Models\Property;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PropertyResource extends Resource
{
    protected static ?string $model = Property::class;
    protected static ?string $pluralLabel = 'Техник өмчлөл';
    protected static ?string $navigationIcon = 'heroicon-o-document-check';
    protected static ?string $navigationGroup = 'Техник';
    protected static ?int $navigationSort = 4;

    public static function getNavigationBadge(): ?string
    {
        return static ::getModel() ::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            -> schema([
                Forms\Components\TextInput ::make('name')
                    -> required()
                    -> maxLength(255)
                    -> placeholder('Өмчлөлийн нэр оруулах')
                    -> label('Өмчлөлийн нэр'),
                Forms\Components\Toggle ::make('status')
                    -> default(true)
                    -> required()
                    -> label('Техник өмчлөлийн статус'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            -> columns([
                Tables\Columns\TextColumn ::make('name')
                    -> label('Өмчлөл')
                    -> sortable()
                    -> searchable(isIndividual: false, isGlobal: true),
                Tables\Columns\IconColumn ::make('status')
                    -> label('Төлөв')
                    -> sortable()
                    -> boolean(),
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
            'index' => Pages\ListProperties ::route('/'),
            'create' => Pages\CreateProperty ::route('/create'),
            'edit' => Pages\EditProperty ::route('/{record}/edit'),
        ];
    }
}
