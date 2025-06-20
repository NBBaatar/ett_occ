<?php

namespace App\Filament\Resources\TechTypeResource\Pages;

use App\Filament\Resources\TechTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTechType extends EditRecord
{
    protected static string $resource = TechTypeResource::class;
    protected static ?string $title = 'Техник төрлийн мэдээлэл засварлах';

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
