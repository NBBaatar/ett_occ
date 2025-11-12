<?php

namespace App\Filament\It\Resources\DeviceCategoryResource\Pages;

use App\Filament\It\Resources\DeviceCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDeviceCategories extends ListRecords
{
    protected static string $resource = DeviceCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Шинээр үүсгэх'),
        ];
    }
}
