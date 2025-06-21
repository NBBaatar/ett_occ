<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TechSpecsResource\Pages;
use App\Filament\Resources\TechSpecsResource\RelationManagers;
use App\Models\TechSpecs;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TechSpecsResource extends Resource
{
    protected static ?string $model = TechSpecs::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-chart-bar';
    protected static ?string $navigationGroup = 'Техник';
    protected static ?string $pluralLabel = 'Техникийн хүчин чадал';
    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\Select::make('tech_type_id')
				     ->native(false)
				     ->relationship('techType', 'name')
				     ->placeholder('Сонгох')
				     ->label('Техникийн төрөл сонгох')
				     ->searchable()
				     ->required()
				     ->preload(),
                Forms\Components\TextInput::make('name')
                    ->label('Хүчин чадал')
                    ->placeholder('Техникийн хүчин чадлын мэдээлэл оруулах')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Toggle::make('is_active')
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
				                ->label('Хүчин чадал')
				                ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('techType.name')
				                ->label('Техникийн төрөл')
				                ->sortable()
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_active')
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
            'index' => Pages\ListTechSpecs::route('/'),
            'create' => Pages\CreateTechSpecs::route('/create'),
            'edit' => Pages\EditTechSpecs::route('/{record}/edit'),
        ];
    }
}
