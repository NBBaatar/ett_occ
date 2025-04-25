<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubCompanyResource\Pages;
use App\Filament\Resources\SubCompanyResource\RelationManagers;
use App\Models\SubCompany;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SubCompanyResource extends Resource
{
    protected static ?string $model = SubCompany::class;
    // protected static bool $shouldRegisterNavigation = false;
    protected static ?string $navigationIcon = 'heroicon-o-building-office';
    protected static ?string $pluralLabel = 'Гэрээт';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('company_id')
                    ->native(false)
                    ->relationship(name: 'company', titleAttribute: 'name')
                    ->placeholder('Сонгох')
                    ->label('Толгой компани')
                    ->searchable()
                    ->preload(),
                Forms\Components\TextInput::make('name')
                    ->label('Нэр')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('code')
                     ->label('Компанийн код')
                    ->required()
                    ->maxLength(2),
                Forms\Components\Toggle::make('is_active')
                    ->label('Төлөв')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('company.name')
                    ->label('Толгой компани')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Нэр')
                    ->searchable(),
                Tables\Columns\TextColumn::make('code')
                ->label('Компанийн код')
                    ->searchable(),
                // Tables\Columns\IconColumn::make('is_active')
                //     ->boolean(),
                // Tables\Columns\TextColumn::make('created_at')
                //     ->dateTime()
                //     ->sortable()
                //     ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListSubCompanies::route('/'),
            'create' => Pages\CreateSubCompany::route('/create'),
            'view' => Pages\ViewSubCompany::route('/{record}'),
            'edit' => Pages\EditSubCompany::route('/{record}/edit'),
        ];
    }
}
