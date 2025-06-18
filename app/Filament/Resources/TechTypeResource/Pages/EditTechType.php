<?php

namespace App\Filament\Resources\TechTypeResource\Pages;

use App\Filament\Resources\TechTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTechType extends EditRecord
{
    protected static string $resource = TechTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
