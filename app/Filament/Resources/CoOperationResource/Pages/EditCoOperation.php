<?php

namespace App\Filament\Resources\CoOperationResource\Pages;

use App\Filament\Resources\CoOperationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCoOperation extends EditRecord
{
    protected static string $resource = CoOperationResource::class;
    protected static ?string $title = 'Түншлэлийн мэдээлэл засварлах';

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
