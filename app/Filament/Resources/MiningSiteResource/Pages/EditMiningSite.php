<?php

namespace App\Filament\Resources\MiningSiteResource\Pages;

use App\Filament\Resources\MiningSiteResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMiningSite extends EditRecord
{
    protected static string $resource = MiningSiteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make()->label('Засах'),
            Actions\DeleteAction::make()->label('Устгах'),
        ];
    }
}
