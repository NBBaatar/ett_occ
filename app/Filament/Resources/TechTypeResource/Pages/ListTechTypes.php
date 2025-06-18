<?php

namespace App\Filament\Resources\TechTypeResource\Pages;

use App\Filament\Resources\TechTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTechTypes extends ListRecords
{
    protected static string $resource = TechTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
