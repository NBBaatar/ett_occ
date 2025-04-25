<?php

namespace App\Filament\Resources\CoOperationResource\Pages;

use App\Filament\Resources\CoOperationResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewCoOperation extends ViewRecord
{
    protected static string $resource = CoOperationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make()->label('Засах'),
        ];
    }
}
