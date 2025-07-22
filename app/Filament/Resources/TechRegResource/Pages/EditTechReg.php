<?php

namespace App\Filament\Resources\TechRegResource\Pages;

use App\Filament\Resources\TechRegResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTechReg extends EditRecord
{
    protected static string $resource = TechRegResource::class;
    protected static ?string $title = 'Техникийн мэдээлэл засварлах';

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
