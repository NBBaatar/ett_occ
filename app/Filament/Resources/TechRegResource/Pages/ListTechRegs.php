<?php

namespace App\Filament\Resources\TechRegResource\Pages;

use App\Filament\Resources\TechRegResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTechRegs extends ListRecords
{
    protected static string $resource = TechRegResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Шинээр үүсгэх'),
        ];
    }
}
