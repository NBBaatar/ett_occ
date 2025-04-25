<?php

namespace App\Filament\Resources\CoOperationResource\Pages;

use App\Filament\Resources\CoOperationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCoOperations extends ListRecords
{
    protected static string $resource = CoOperationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Шинээр үүсгэх'),
        ];
    }
}
