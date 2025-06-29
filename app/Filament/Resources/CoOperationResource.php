<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CoOperationResource\Pages;
use App\Filament\Resources\CoOperationResource\RelationManagers;
use App\Models\CoOperation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CoOperationResource extends Resource
{
    protected static ?string $model = CoOperation::class;

    protected static ?string $navigationIcon = 'heroicon-o-home-modern';
    protected static ?string $pluralLabel = 'Түншлэл';
    protected static ?string $navigationGroup = 'Төсөл';
    protected static ?int $navigationSort = 2;

    public static function getNavigationBadge(): ?string
    {
        return static ::getModel() ::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            -> schema([
                Forms\Components\TextInput ::make('name')
                    -> label('Түншлэлийн нэр')
                    -> required()
                    -> maxLength(255),
                Forms\Components\TextInput ::make('code')
                    -> label('Түншлэлийн код')
                    -> required()
                    -> maxLength(2),
                Forms\Components\Select ::make('mining_site_id')
                    -> native(false)
                    -> relationship(name: 'miningSite', titleAttribute: 'name')
                    //  ->options(fn (Get $get): Collection => MiningSite::query()
                    // ->where('mining_site_id', $get('mining_site_id'))
                    // ->pluck('name', 'id'))
                    -> placeholder('Сонгох')
                    -> label('Төслийн талбай')
                    -> searchable()
                    -> preload(),
                // Forms\Components\Toggle::make('is_active')
                //     ->label('Төлөв')
                //     ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            -> columns([
                Tables\Columns\TextColumn ::make('name')
                    -> label('Түншлэлийн нэр')
                    -> searchable(),
                Tables\Columns\TextColumn ::make('code')
                    -> label('Түншлэлийн код')
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
            'index' => Pages\ListCoOperations ::route('/'),
            'create' => Pages\CreateCoOperation ::route('/create'),
            'view' => Pages\ViewCoOperation ::route('/{record}'),
            'edit' => Pages\EditCoOperation ::route('/{record}/edit'),
        ];
    }
}
