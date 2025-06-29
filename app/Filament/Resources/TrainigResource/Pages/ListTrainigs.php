<?php

namespace App\Filament\Resources\TrainigResource\Pages;

use App\Filament\Resources\TrainigResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTrainigs extends ListRecords
{
    protected static string $resource = TrainigResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction ::make() -> label('Шинээр үүсгэх'),
        ];
    }
}
