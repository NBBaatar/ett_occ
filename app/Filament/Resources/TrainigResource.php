<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TrainigResource\Pages;
use App\Filament\Resources\TrainigResource\RelationManagers;
use App\Models\Training;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TrainigResource extends Resource
{
    protected static ?string $model = Training::class;
    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    protected static ?string $pluralLabel = 'Сургалт';
    protected static ?string $navigationGroup = 'Сургалтын төрөл';
    protected static ?int $navigationSort = 1;

    public static function getNavigationBadge(): ?string
    {
        return static ::getModel() ::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            -> schema([
                Forms\Components\Section ::make()
                    -> schema([
                        Forms\Components\TextInput ::make('name')
                            -> required()
                            -> placeholder('Сургалтын нэр оруулах')
                            -> label('Нэр')
                            -> maxLength(255),
                        Forms\Components\TextInput ::make('training_hour')
                            -> numeric()
                            -> required()
                            -> placeholder('Тоон утга')
                            -> label('Цаг оруулах')
                            -> maxLength(255),
                    ]),
                Forms\Components\Toggle ::make('is_active')
                    -> required()
                    -> default(true)
                    -> label('Ажиллаж байгаа эсэх'),
            ]);


    }

    public static function table(Table $table): Table
    {
        return $table
            -> columns([
                Tables\Columns\TextColumn ::make('name')
                    -> label('Сургалтын төрөл'),
                Tables\Columns\TextColumn ::make('training_hour')
                    -> label('Хамрагдвал зохих'),
                Tables\Columns\IconColumn ::make('is_active')
                    -> label('Төлөв')
                    -> sortable()
                    -> boolean(),
            ])
            -> filters([
                //
            ])
            -> actions([
                Tables\Actions\EditAction ::make(),
            ])
            -> bulkActions([
                Tables\Actions\BulkActionGroup ::make([
                    Tables\Actions\DeleteBulkAction ::make(),
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
            'index' => Pages\ListTrainigs ::route('/'),
            'create' => Pages\CreateTrainig ::route('/create'),
            'edit' => Pages\EditTrainig ::route('/{record}/edit'),
        ];
    }
}
