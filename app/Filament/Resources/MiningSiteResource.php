<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MiningSiteResource\Pages;
use App\Filament\Resources\MiningSiteResource\RelationManagers;
use App\Models\MiningSite;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MiningSiteResource extends Resource
{
    protected static ?string $model = MiningSite::class;
    protected static ?string $navigationIcon = 'heroicon-o-building-library';
    protected static ?string $pluralLabel = 'Төслийн талбай';
    protected static ?string $navigationGroup = 'Төсөл';
    protected static ?int $navigationSort = 1;

    public static function getNavigationBadge(): ?string
    {
        return static ::getModel() ::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            -> schema([
                Forms\Components\TextInput ::make('name')
                    -> label('Төслийн нэр')
                    -> required()
                    -> maxLength(255),
                Forms\Components\TextInput ::make('code')
                    -> label('Төслийн код')
                    -> required()
                    -> maxLength(2),
                Forms\Components\Toggle ::make('is_active')
                    -> label('Төлөв')
                    -> required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            -> columns([
                Tables\Columns\TextColumn ::make('name')
                    -> label('Төслийн нэр')
                    -> searchable(),
                Tables\Columns\TextColumn ::make('code')
                    -> label('Төслийн код')
                    -> searchable(),
                Tables\Columns\TextColumn ::make('employees_count') -> counts('employees')
                    -> label('Ажилтан тоо')
                    -> sortable(),
                Tables\Columns\IconColumn ::make('is_active')
                    -> label('Төлөв')
                    -> boolean(),

                // Tables\Columns\TextColumn::make('created_at')
                //     ->dateTime()
                //     ->sortable()
                //     ->toggleable(isToggledHiddenByDefault: true),
                // Tables\Columns\TextColumn::make('updated_at')
                //     ->dateTime()
                //     ->sortable()
                //     ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListMiningSites ::route('/'),
            'create' => Pages\CreateMiningSite ::route('/create'),
            'view' => Pages\ViewMiningSite ::route('/{record}'),
            'edit' => Pages\EditMiningSite ::route('/{record}/edit'),
        ];
    }
}
