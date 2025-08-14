<?php

namespace App\Filament\App\Resources;

use App\Enums\TrainingStatus;
use App\Filament\App\Resources\EmployeeResource\Pages;
use App\Filament\App\Resources\EmployeeResource\RelationManagers;
use App\Models\Company;
use App\Models\CoOperation;
use App\Models\Employee;
use App\Models\MiningSite;
use App\Models\SubCompany;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Collection;

class EmployeeResource extends Resource
{
    protected static ?string $model = Employee::class;
    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $pluralLabel = 'Ажилтан бүртгэл';
    protected static ?string $navigationGroup = 'Цахим бүртгэл';
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
                        Forms\Components\TextInput ::make('fname')
                            -> required()
                            -> placeholder('Овог оруулах')
                            -> label('Овог')
                            -> maxLength(255),
                        Forms\Components\TextInput ::make('lname')
                            -> required()
                            -> placeholder('Нэр оруулах')
                            -> label('Нэр')
                            -> maxLength(255),
                        Forms\Components\TextInput ::make('register')
                            // ->required()
                            -> placeholder('Регистрийн дугаар оруулах')
                            -> label('Ажилтны регистрийн дугаар')
                            -> unique(Employee::class, 'register', ignoreRecord: true)
                            -> maxLength(255),
                        Forms\Components\TextInput ::make('phone')
                            -> tel()
                            -> placeholder('Холбоо барих утасны дугаар оруулах')
                            -> label('Холбогдох утас')
                            // ->required()
                            -> maxLength(255)
                            -> unique(Employee::class, 'phone', ignoreRecord: true),
                        Forms\Components\DatePicker ::make('date_of_employement')
                            -> native(false)
                            -> displayFormat('Y-m-d')
                            -> label('Ажилт орсон он сар өдөр')
                            -> placeholder('Он сар өдөр')
                            -> required(),
                        // ->columnSpan('full'),
                        Forms\Components\DatePicker ::make('date_of_expiration')
                            -> native(false)
                            -> displayFormat('Y-m-d')
                            -> label('Хүчинтэй хугацаа')
                            -> placeholder('Он сар өдөр')
                            -> required(),
                        Forms\Components\DatePicker ::make('date_of_traing')
                            -> native(false)
                            -> displayFormat('Y-m-d')
                            -> label('Сургалтад хамрагдсан огноо')
                            -> placeholder('Он сар өдөр')
                            -> required()
                            -> columnSpan('full'),
                        // ->columnSpan('full'),
                        Forms\Components\FileUpload ::make('photo')
                            -> disk('public')
                            -> directory('images')
                            -> visibility('public')
                            -> label('Зураг оруулах')
                            -> required()
                            -> columnSpan('full'),
                    ]) -> columns(2),
                Forms\Components\Section ::make()
                    -> schema([
                        Forms\Components\Select ::make('mining_site_id')
                            -> options(MiningSite ::all() -> pluck('name', 'id'))
                            -> afterStateUpdated(function (Set $set) {
                                $set('co_operation_id', null);
                                $set('company_id', null);
                                $set('sub_company_id', null);
                            })
                            -> live()
                            -> placeholder('Сонгох')
                            -> label('Төслийн талбай')
                            -> searchable()
                            -> required()
                            -> preload(),
                        Forms\Components\Select ::make('co_operation_id')
                            -> options(fn (Get $get): Collection => CoOperation ::query()
                                -> where('mining_site_id', $get('mining_site_id'))
                                -> pluck('name', 'id'))
                            -> live()
                            -> placeholder('Сонгох')
                            -> label('Түншлэл')
                            -> searchable()
                            -> required()
                            -> preload(),
                        Forms\Components\Select ::make('company_id')
                            // ->relationship(name: 'company', titleAttribute: 'name')
                            -> placeholder('Сонгох')
                            -> label('Компани')
                            -> options(fn (Get $get): Collection => Company ::query()
                                -> where('co_operation_id', $get('co_operation_id'))
                                -> pluck('name', 'id'))
                            -> searchable()
                            -> required()
                            -> live()
                            -> preload(),
                        Forms\Components\Select ::make('sub_company_id')
                            -> options(fn (Get $get): Collection => SubCompany ::query()
                                -> where('company_id', $get('company_id'))
                                -> pluck('name', 'id'))
                            -> live()
                            // ->relationship(name: 'subCompany', titleAttribute: 'name')
                            -> placeholder('Сонгох')
                            -> label('Туслан гүйцэтгэгч')
                            -> searchable()
                            -> required()
                            -> preload(),
                        Forms\Components\Select ::make('appointment_id')
                            -> native(false)
                            -> relationship(name: 'appointment', titleAttribute: 'name')
                            -> placeholder('Сонгох')
                            -> label('Албан тушаал')
                            -> searchable()
                            -> required()
                            -> preload(),
                        Forms\Components\Select ::make('shift_id')
                            -> native(false)
                            -> relationship(name: 'shift', titleAttribute: 'name')
                            -> placeholder('Сонгох')
                            -> label('Ээлж')
                            -> searchable()
                            -> required()
                            -> preload(),
                    ]) -> columns(2),
                Forms\Components\Section ::make('Ажилтны сургалтын хэсэг')
                    -> schema([
                        Forms\Components\Toggle ::make('is_trained')
                            -> required()
                            -> default(true)
                            -> label('ХАБ-н сургалтад хамрагдсан эсэх'),
                        Forms\Components\Select ::make('training_id')
                            -> native(false)
                            -> relationship(name: 'training', titleAttribute: 'name')
                            -> placeholder('Сонгох')
                            -> label('Сургалтын төрөл')
                            -> searchable()
                            -> required()
                            -> preload(),
                        Forms\Components\Radio ::make('is_trained_status')
                            -> options(TrainingStatus::class)
                            -> label('Сургалтын төлөв')
                            -> required(),
                        Forms\Components\Textarea ::make('hse_description')
                            -> label('ХАБ-ийн сургагч тайлбар оруулах')
                            -> placeholder('Тайлбар оруулах')
                            -> autosize()
                            -> columnSpan('full'),
                        Forms\Components\Textarea ::make('description')
                            -> label('Бусад тайлбар')
                            -> placeholder('Тайлбар оруулах')
                            -> autosize()
                            -> columnSpan('full'),
                        Forms\Components\FileUpload ::make('file')
                            -> disk('public')
                            -> directory('file')
                            -> visibility('public')
                            -> label('Файл хавсаргах')
                            -> columnSpan('full'),
                    ]) -> columns(3),
                Forms\Components\Section ::make()
                    -> schema([
                        Forms\Components\Select ::make('region_id')
                            -> native(false)
                            -> relationship(name: 'region', titleAttribute: 'name')
                            -> placeholder('Сонгох')
                            -> label('Харьяалал')
                            -> searchable()
                            -> preload(),
                        Forms\Components\TextInput ::make('card_number')
                            -> required()
                            -> label('Картын дугаар')
                            -> placeholder('Картын дугаар уншигчаас оруулах')
                            -> numeric()
                            -> visible(fn (): bool => auth() -> user() -> isAdmin())
                            -> maxLength(255),
                        Forms\Components\Select ::make('point_id')
                            -> native(false)
                            -> relationship(name: 'point', titleAttribute: 'name')
                            -> placeholder('Сонгох')
                            -> label('ШНЦ - ээр нэвтрэх')
                            -> searchable()
                            -> required()
                            -> preload(),
                        Forms\Components\TextInput ::make('employee_uid')
                            -> required()
                            -> label('Ажилтны үнэмлэх')
                            -> placeholder('Ажилтны үнэмлэхийн дугаар оруулах')
                            -> maxLength(255)
                            -> unique(Employee::class, 'employee_uid', ignoreRecord: true)
                            -> columnSpan('full')
                            -> visible(fn (): bool => auth() -> user() -> isAdmin())
                            -> dehydrated(),
                    ]) -> columns(3),
                Forms\Components\Toggle ::make('is_active')
                    -> required()
                    -> default(true)
                    -> visible(fn (): bool => auth() -> user() -> isAdmin())
                    -> label('Ажиллаж байгаа эсэх'),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            -> columns([
                Tables\Columns\TextColumn ::make('fname')
                    -> label('Овог')
                    -> searchable(isIndividual: true, isGlobal: true),
                Tables\Columns\TextColumn ::make('lname')
                    -> label('Нэр')
                    -> searchable(isIndividual: true, isGlobal: false),
                Tables\Columns\TextColumn ::make('register')
                    -> label('Регистер')
                    -> searchable(isIndividual: true, isGlobal: false),
                Tables\Columns\TextColumn ::make('phone')
                    -> label('Утас')
                    -> searchable(isIndividual: true, isGlobal: true),
                Tables\Columns\TextColumn ::make('date_of_employement')
                    -> label('Ажилд орсон огноо')
                    -> date()
                    -> searchable(isIndividual: true, isGlobal: true),
                Tables\Columns\TextColumn ::make('company.name')
                    -> label('Компани')
                    -> numeric()
                    -> sortable()
                    -> searchable(isIndividual: true, isGlobal: true),
                // Tables\Columns\TextColumn::make('sub_company_id')
                //     ->numeric()
                //     ->sortable(),
                // Tables\Columns\TextColumn::make('appointment_id')
                //     ->numeric()
                // Tables\Columns\TextColumn::make('appointment_id.name')
                //     ->numeric()
                //     ->sortable(),
                Tables\Columns\TextColumn ::make('coOperation.name')
                    -> label('Гэрээт')
                    -> numeric()
                    -> sortable()
                    -> searchable(isIndividual: true, isGlobal: true),
                Tables\Columns\TextColumn ::make('miningSite.name')
                    -> label('Төслийн талбай')
                    -> numeric()
                    -> sortable()
                    -> searchable(isIndividual: true, isGlobal: true),
                Tables\Columns\TextColumn ::make('subCompany.name')
                    -> label('Туслан')
                    -> numeric()
                    -> sortable()
                    -> searchable(isIndividual: true, isGlobal: true),
                // Tables\Columns\TextColumn::make('shift_id')
                //     ->numeric()
                //     ->sortable(),
                // Tables\Columns\TextColumn::make('region_id')
                //     ->numeric()
                //     ->sortable(),
                Tables\Columns\TextColumn ::make('card_number')
                    -> searchable(isIndividual: true, isGlobal: true),
                Tables\Columns\TextColumn ::make('employee_uid')
                    -> label('Ажилтны код')
                    -> searchable(isIndividual: true, isGlobal: true),
                // Tables\Columns\IconColumn::make('is_active')
                //     ->boolean(),
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
            ]);
//            ->bulkActions([
//                Tables\Actions\BulkActionGroup::make([
//                    Tables\Actions\DeleteBulkAction::make(),
//                ]),
//            ]);
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
            'index' => Pages\ListEmployees ::route('/'),
            'create' => Pages\CreateEmployee ::route('/create'),
            'edit' => Pages\EditEmployee ::route('/{record}/edit'),
        ];
    }
}
