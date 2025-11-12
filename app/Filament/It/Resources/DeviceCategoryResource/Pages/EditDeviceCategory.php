<?php

namespace App\Filament\It\Resources\DeviceCategoryResource\Pages;

use App\Filament\It\Resources\DeviceCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDeviceCategory extends EditRecord
{
    protected static string $resource = DeviceCategoryResource::class;
    protected static ?string $title = 'Ангилал мэдээлэл засварлах';

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
