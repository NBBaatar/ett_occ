<?php

namespace App\Filament\Resources\MiningSiteResource\Pages;

use App\Filament\Resources\MiningSiteResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMiningSites extends ListRecords
{
    protected static string $resource = MiningSiteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Шинээр үүсгэх'),
        ];
    }
}
