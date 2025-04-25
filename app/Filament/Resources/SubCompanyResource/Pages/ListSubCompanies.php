<?php

namespace App\Filament\Resources\SubCompanyResource\Pages;

use App\Filament\Resources\SubCompanyResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSubCompanies extends ListRecords
{
    protected static string $resource = SubCompanyResource::class;

     protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Шинээр үүсгэх'),
        ];
    }
}
