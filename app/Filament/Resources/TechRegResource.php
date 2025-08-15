<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TechRegResource\Pages;
use App\Filament\Resources\TechRegResource\RelationManagers;
use App\Models\Company;
use App\Models\CoOperation;
use App\Models\MiningSite;
use App\Models\Property;
use App\Models\SubCompany;
use App\Models\TechCategory;
use App\Models\TechMark;
use App\Models\TechReg;
use App\Models\TechSpecs;
use App\Models\TechType;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Collection;

class TechRegResource extends Resource
{
    protected static ?string $model = TechReg::class;
    protected static ?string $navigationIcon = 'heroicon-o-plus-circle';
    protected static ?string $navigationGroup = 'Техник';
    protected static ?string $pluralLabel = 'Техникийн Бүртгэл';
    protected static ?int $navigationSort = 6;
    public static function getNavigationBadge(): ?string
    {
        return static ::getModel() ::count();
    }
    public static function form(Form $form): Form

    {
        return $form
            ->schema([
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
                    ]) -> columns(2),
                Forms\Components\Section::make('Техникийн өөрийн мэдээлэл')
                    -> schema([
                    Forms\Components\Select::make('tech_category_id')
                        -> live()
                        -> options(TechCategory ::all() -> pluck('name', 'id'))
                        ->native(false)
                        ->label('Техникийн ангилал')
                        ->searchable()
                        ->placeholder('Сонгох')
                        ->required(),
                    Forms\Components\Select::make('tech_type_id')
                        -> live()
                        -> options(TechType ::all() -> pluck('name', 'id'))
                        ->native(false)
                        ->label('Техникийн төрөл')
                        ->searchable()
                        ->placeholder('Сонгох')
                        ->required(),
                    Forms\Components\Select::make('tech_mark_id')
                        -> live()
                        -> options(TechMark ::all() -> pluck('name', 'id'))
                        ->native(false)
                        ->label('Техникийн марк, загвар, бренд')
                        ->searchable()
                        ->placeholder('Сонгох')
                        ->required(),
                    Forms\Components\Select::make('tech_specs_id')
                        -> live()
                        -> options(TechSpecs ::all() -> pluck('name', 'id'))
                        ->native(false)
                        ->label('Техникийн үзүүлэлт')
                        ->searchable()
                        ->placeholder('Сонгох'),
//                        ->required(),
                Forms\Components\TextInput::make('tech_number')
                    ->label('Техникийн улсын дугаар')
                    ->maxLength(255)
                    ->required(),
                Forms\Components\TextInput::make('tech_park_number')
                    ->label('Техникийн парк дугаар')
                    ->maxLength(255)
                    ->required(),
                Forms\Components\TextInput::make('tech_aral_numebr')
                    ->label('Техникийн арлын дугаар')
                    ->maxLength(255)
                    ->required(),
                Forms\Components\Select::make('date_of_manufacture')
                    ->options(function () {
                        $years = [];
                        for ($year = 2000; $year <= 2030; $year++) {
                            $years[$year] = $year;
                        }
                        return $years;
                    })
                    -> native(false)
//                    -> displayFormat('Y-m-d')
                    -> label('Үйлдвэрлэсэн огноо')
                    -> placeholder('Он сар өдөр')
                    ->searchable()
                    -> required(),
                Forms\Components\Select::make('date_of_imported')
                    -> native(false)
                    ->options(function () {
                        $years = [];
                        for ($year = 2000; $year <= 2030; $year++) {
                            $years[$year] = $year;
                        }
                        return $years;
                    })
//                    -> displayFormat('Y')
                    -> label('Импортлогдсон огноо')
                    -> placeholder('Он сар өдөр')
                    ->searchable()
                    -> required()
            ]) -> columns(2),
                Forms\Components\Repeater ::make('tech_tewsh')
                    ->visible(fn (Get $get) => $get('tech_type_id') === '8')
                    ->label('Техникийн тэвш')
                    ->schema([
                        Forms\Components\Radio::make('tevsh')
                            ->label('Тэвшний төрөл')
                            ->options([
                                'is_One' => 'Дан',
                                'is_double' => 'Давхар'
                            ])
//                            ->required(),
                    ])->addable(false)
                    ->deletable(false)
                    ->reorderable(false)
                    ->columnSpan('full'),
               Forms\Components\Section::make('Радио станц')
                    ->schema([
                        Forms\Components\TextInput::make('radio_id')
                            ->label('Радио станцын UID')
                            ->maxLength(255)
                            ->required(),
                        Forms\Components\TextInput::make('radio_serial')
                            ->label('Радио станцын сериал дугаар')
                            ->maxLength(255)
                            ->required(),
                    ])->columns(2),
                Forms\Components\FileUpload ::make('property_file')
                    -> disk('public')
                    -> directory('images/properties')
                    -> visibility('public')
                    -> label('Өмчлөлийн гэрчилгээний зураг оруулах')
                    -> required()
                    -> columnSpan('full'),
                Forms\Components\Repeater::make('property')
                    ->label('Техникийн өмчлөл')
                    ->live()
                    ->columnSpan(2)
                    ->columns()
                        ->schema([
//                            Forms\Components\TextInput::make('property_type')
//                            ->label('Өмчлэгчийн төрөл')
//                            ->maxLength(255)
//                            ->required(),
                            Forms\Components\Select::make('property_id')
                                -> live()
                                -> options(Property ::all() -> pluck('name', 'id'))
                                ->native(false)
                                ->label('Өмчлөгчийн төрөл')
                                ->searchable()
                                ->placeholder('Сонгох')
                                ->required(),
                            Forms\Components\Select::make('company_id')
                                -> live()
                                -> options(Company ::all() -> pluck('name', 'id'))
                                ->native(false)
                                ->label('Компани')
                                ->searchable()
                                ->placeholder('Сонгох')
                                ->required(),
                        ])
                    ->addActionLabel('Өмчлөгч нэмэх')->reorderable(false),
//                Forms\Components\Repeater::make('insurance')
//                    ->label('Даатгалын мэдээлэл')
//                    ->live()
//                    ->columnSpan(2)
//                    ->columns()
//                ->schema([
//                    Forms\Components\Section::make('Жолоочийн хариуцлага')
//                    ->schema([
//                        Forms\Components\TextInput::make('driver_insurance_company')
//                            ->label('Даатгал хийгдсэн компани')
//                            ->maxLength(255)
//                            ->required(),
//                        Forms\Components\DatePicker::make('driver_insurance_start_date')
//                            -> native(false)
//                            -> displayFormat('Y-m-d')
//                            -> label('Даатгал эхлэх огноо')
//                            -> placeholder('Он сар өдөр')
//                            -> required(),
//                        Forms\Components\DatePicker::make('driver_insurance_end_date')
//                            -> native(false)
//                            -> displayFormat('Y-m-d')
//                            -> label('Дуусах огноо')
//                            -> placeholder('Он сар өдөр')
//                            -> required(),
//                    ])->columns(2),
//                    Forms\Components\Section::make('Тээврийн хэрэгсэл')
//                    ->schema([
//                        Forms\Components\TextInput::make('tech_insurance_company')
//                            ->label('Даатгал хийсэн компани')
//                            ->maxLength(255)
//                            ->required(),
//                        Forms\Components\DatePicker::make('tech_insurance_start_date')
//                            -> native(false)
//                            -> displayFormat('Y-m-d')
//                            -> label('Даатгал эхлэх огноо')
//                            -> placeholder('Он сар өдөр')
//                            -> required(),
//                        Forms\Components\DatePicker::make('tech_insurance_end_date')
//                            -> native(false)
//                            -> displayFormat('Y-m-d')
//                            -> label('Дуусах огноо')
//                            -> placeholder('Он сар өдөр')
//                            -> required(),
//                    ])->columns(2),
//                ])->addable(false) ->deletable(false),
                Forms\Components\Repeater::make('tech_permission')
                ->live()
                ->label('Зөвшөөрөл олголт')
                ->columns()
                ->columnSpan(2)
                ->schema([
                    Forms\Components\Textarea ::make('description')
                        -> label('Tайлбар')
                        -> placeholder('Тайлбар оруулах')
                        -> autosize()
                        -> columnSpan('full'),
                    Forms\Components\TextInput::make('request_num')
                    ->label('Хүсэлт ирүүлсэн албан тоотын дугаар')
                    ->maxLength(255)
                    ->required(),
                    Forms\Components\TextInput::make('permission_num')
                        ->label('Зөвшөөрлийн дугаар')
                        ->maxLength(255)
                        ->required(),
                    Forms\Components\DatePicker::make('permission_date')
                        -> native(false)
                        -> displayFormat('Y-m-d')
                        -> label('Зөвшөөрөл олгосон огноо')
                        -> placeholder('Он сар өдөр')
                        -> required(),
                    Forms\Components\DatePicker::make('permission_date_expire')
                        -> native(false)
                        -> displayFormat('Y-m-d')
                        -> label('Зөвшөөрөл дуусах огноо')
                        -> placeholder('Он сар өдөр')
                        -> required(),
                    Forms\Components\TextInput::make('permitted_person_1')
                        ->label('Хяналт хийсэн ажилтны-1 /ЗМХ-ийн удирдлага/ ')
                        ->maxLength(255)
                        ->required(),
                    Forms\Components\TextInput::make('permitted_person_2')
                        ->label('Хяналт хийсэн ажилтны-2 /ХАБЭАХ-ийн удирдлага/ ')
                        ->maxLength(255)
                        ->required(),
                    Forms\Components\TextInput::make('permitted_person_3')
                        ->label('Хяналт хийсэн ажилтны-3 /ШУМТГ-ийн удирдлага/ ')
                        ->maxLength(255)
                        ->required(),
                    Forms\Components\TextInput::make('permitted_person_branch_ceo')
                        ->label('Салбарын удирдлага')
                        ->maxLength(255)
                        ->required(),
                ])->addable(false)->deletable(false)->reorderable(false),
                Forms\Components\Toggle::make('status')
                    ->label('Төлөв')
                    ->default(true)
                    ->required(),
            ]);
    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
               Tables\Columns\TextColumn::make('miningSite.name')
                    ->label('Төслийн талбай')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('coOperation.name')
                    ->label('Түншлэл')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('company.name')
                    ->label('Компани')
                    ->numeric()
                    ->sortable(),
//                Tables\Columns\TextColumn::make('subCompany.name')
//                    ->numeric()
//                    ->sortable(),
                Tables\Columns\TextColumn::make('techCategory.name')
                    ->label('Техник ангилал')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('techType.name')
                    ->label('Техникийн төрөл')
                    ->numeric()
                    ->sortable(),
//                Tables\Columns\TextColumn::make('techMark.name')
//                    ->numeric()
//                    ->sortable(),
//                Tables\Columns\TextColumn::make('techSpecs.name')
//                    ->numeric()
//                    ->sortable(),
                Tables\Columns\TextColumn::make('tech_number')
                    ->label('Техникийн улсын дугаар')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tech_park_number')
                    ->label('Техникийн парк дугаар')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tech_aral_numebr')
                    ->label('Техникийн арлын дугаар')
                    ->searchable(),
                Tables\Columns\TextColumn::make('date_of_manufacture')
                    ->label('Үйлдвэрлэсэн огноо')
                    ->date()
                    ->sortable(),
//                Tables\Columns\TextColumn::make('date_of_imported')
//                    ->date()
//                    ->sortable(),
//                Tables\Columns\TextColumn::make('radio_id')
//                    ->searchable(),
//                Tables\Columns\TextColumn::make('radio_serial')
//                    ->searchable(),
                Tables\Columns\IconColumn ::make('tech_tewsh.tevsh')
                    ->icon(fn (string $state): string => match ($state) {
                        'is_One' => 'heroicon-o-minus',
                        'is_double' => 'heroicon-o-plus',
                    })
                    ->color(fn (string $state): string => match ($state) {
                        'is_One' => 'info',
                        'is_double' => 'warning',
                    })
                    ->label('Тэвш')
                    ->getStateUsing(function ($record) {
                        if (!$record->tech_tewsh) return null;
                        return collect($record->tech_tewsh)
                            ->pluck('tevsh')
                            ->filter()
                            ->join(', ');
                    })
                    ->sortable()
                    ->searchable(query: function (Builder $query, string $search) {
                        return $query->whereJsonContains('tech_tewsh', ['tevsh' => $search]);
                    }),
                Tables\Columns\IconColumn::make('status')
                    ->boolean(),
//                Tables\Columns\TextColumn::make('property_file')
//                    ->searchable(),
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
            'index' => Pages\ListTechRegs::route('/'),
            'create' => Pages\CreateTechReg::route('/create'),
            'edit' => Pages\EditTechReg::route('/{record}/edit'),
        ];
    }
}
