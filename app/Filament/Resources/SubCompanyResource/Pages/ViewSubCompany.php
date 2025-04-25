<?php

namespace App\Filament\Resources\SubCompanyResource\Pages;

use App\Filament\Resources\SubCompanyResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewSubCompany extends ViewRecord
{
    protected static string $resource = SubCompanyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make()->label('Засах'),
        ];
    }
}
