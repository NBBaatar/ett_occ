<?php

namespace App\Filament\Resources\TechMarkResource\Pages;

use App\Filament\Resources\TechMarkResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTechMarks extends ListRecords
{
    protected static string $resource = TechMarkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Шинээр үүсгэх'),
        ];
    }
}
