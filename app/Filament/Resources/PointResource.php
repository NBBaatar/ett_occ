<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PointResource\Pages;
use App\Filament\Resources\PointResource\RelationManagers;
use App\Models\Company;
use App\Models\Point;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Collection;

class PointResource extends Resource
{
    protected static ?string $model = Point::class;
    // protected static bool $shouldRegisterNavigation = false;
    protected static ?string $pluralLabel = 'Шалган нэвтрүүлэх цэг';
    protected static ?string $navigationIcon = 'heroicon-o-arrow-left-start-on-rectangle';
    protected static ?string $navigationGroup = 'ШНЦ';

    public static function getNavigationBadge(): ?string
    {
        return static ::getModel() ::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            -> schema([
                Forms\Components\TextInput ::make('name')
                    -> label('ШНЦ -н дугаар')
                    -> required()
                    -> numeric()
                    -> maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            -> columns([
                Tables\Columns\TextColumn ::make('name')
                    -> label('ШНЦ -н дугаар')
                    -> searchable(),
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
            'index' => Pages\ListPoints ::route('/'),
            'create' => Pages\CreatePoint ::route('/create'),
            'edit' => Pages\EditPoint ::route('/{record}/edit'),
        ];
    }
}
