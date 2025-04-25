<?php

namespace App\Filament\Resources\MiningSiteResource\Pages;

use App\Filament\Resources\MiningSiteResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewMiningSite extends ViewRecord
{
    protected static string $resource = MiningSiteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make()->label('Засах'),
        ];
    }
}
