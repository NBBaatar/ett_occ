<?php

namespace App\Filament\Resources\TechBrandResource\Pages;

use App\Filament\Resources\TechBrandResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTechBrands extends ListRecords
{
    protected static string $resource = TechBrandResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Шинээр үүсгэх'),
        ];
    }
}
