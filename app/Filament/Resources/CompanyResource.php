<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CompanyResource\Pages;
use App\Filament\Resources\CompanyResource\RelationManagers;
use App\Models\Company;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CompanyResource extends Resource
{
    protected static ?string $model = Company::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';
    protected static ?string $pluralLabel = 'Компани';
    protected static ?string $navigationGroup = 'Төсөл';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Forms\Components\Select::make('mining_site_id')
                //     ->native(false)
                //     ->relationship(name: 'miningSites', titleAttribute: 'name')
                //     //  ->options(fn (Get $get): Collection => MiningSite::query()
                //     // ->where('mining_site_id', $get('mining_site_id'))
                //     // ->pluck('name', 'id'))
                //     ->placeholder('Сонгох')
                //     ->label('Төслийн талбай')
                //     ->searchable()
                //     ->preload(),
                Forms\Components\Select::make('co_operation_id')
                    ->native(false)
                    ->relationship(name: 'coOperation', titleAttribute: 'name')
                    ->placeholder('Сонгох')
                    ->label('Түншлэл')
                    ->searchable()
                    ->preload(),
                Forms\Components\TextInput::make('name')
                     ->label('Нэр')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Toggle::make('is_active')
                    ->label('Төлөв')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('coOperation.name')
                    ->label('Туслан гүйцэтгэгч')
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Нэр')
                    ->searchable(),
                Tables\Columns\TextColumn::make('employees_count')->counts('employees')
                    ->label('Ажилтан тоо')
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Төлөв')
                    ->boolean(),
                // Tables\Columns\TextColumn::make('created_at')
                //     ->dateTime()
                //     ->sortable()
                //     ->toggleable(isToggledHiddenByDefault: true),
                // Tables\Columns\TextColumn::make('updated_at')
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
            'index' => Pages\ListCompanies::route('/'),
            'create' => Pages\CreateCompany::route('/create'),
            'view' => Pages\ViewCompany::route('/{record}'),
            'edit' => Pages\EditCompany::route('/{record}/edit'),
        ];
    }
}
