<?php

namespace App\Filament\Resources\TrainigResource\Pages;

use App\Filament\Resources\TrainigResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTrainig extends EditRecord
{
    protected static string $resource = TrainigResource::class;
    protected static ?string $title = 'Сургалтын мэдээлэл засварлах';

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction ::make(),
        ];
    }
}
