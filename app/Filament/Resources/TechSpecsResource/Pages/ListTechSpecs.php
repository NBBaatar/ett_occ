<?php

namespace App\Filament\Resources\TechSpecsResource\Pages;

use App\Filament\Resources\TechSpecsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTechSpecs extends ListRecords
{
    protected static string $resource = TechSpecsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Шинээр үүсгэх'),
        ];
    }
}
