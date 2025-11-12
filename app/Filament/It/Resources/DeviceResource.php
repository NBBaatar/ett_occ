<?php

namespace App\Filament\It\Resources;

use App\Filament\It\Resources\DeviceResource\Pages;
use App\Filament\It\Resources\DeviceResource\RelationManagers;
use App\Models\Device;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DeviceResource extends Resource
{
    protected static ?string $model = Device::class;

    protected static ?string $navigationIcon = 'heroicon-o-queue-list';
    protected static ?string $pluralLabel = 'Төхөөрөмж';
    protected static ?string $navigationGroup = 'Бүртгэл';
    protected static ?int $navigationSort = 1;
    public static function getNavigationBadge(): ?string
    {
        return static ::getModel() ::count();
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('device_category_id')
                    ->relationship('device_category', 'name')
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Repeater ::make('data')
                    ->label('Data')
                    ->schema([
                        Forms\Components\Select::make('device_type')
                            ->label('Select Device')
                            ->native(false)
                            ->live()
                            ->options([
                                'camera' => 'camera',
                                'network' => 'network',
                                'switch' => 'switch',
                                'wireless' => 'wireless',
                                'printer' => 'printer',
                                'computer' => 'computer',
                                'server' => 'server',
                            ])
                            ->required(),
                        Forms\Components\TextInput::make('location')
                        ->required()
                        ->maxLength(255)
                        ->label('Location')
                        ->placeholder('Insert Location')
                    ])->addable(false)
                    ->deletable(false)
                    ->reorderable(false)
                    -> columns(2)
                    ->columnSpan('full'),
                Forms\Components\Toggle::make('status')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('device_category.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Device Name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('data.device_type')
                    ->label('Device Type')
                    ->getStateUsing(function ($record) {
                        if (!$record->data) return null;
                        return collect($record->data)
                            ->pluck('device_type')
                            ->filter()
                            ->join(', ');
                    }),
                Tables\Columns\TextColumn::make('data.location')
                    ->label('Device Location')
                    ->getStateUsing(function ($record) {
                        if (!$record->data) return null;
                        return collect($record->data)
                            ->pluck('location')
                            ->filter()
                            ->join(', ');
                    }),
                Tables\Columns\IconColumn::make('status')
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
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListDevices::route('/'),
            'create' => Pages\CreateDevice::route('/create'),
            'edit' => Pages\EditDevice::route('/{record}/edit'),
        ];
    }
}
