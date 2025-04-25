<?php

namespace App\Filament\Resources\SubCompanyResource\Pages;

use App\Filament\Resources\SubCompanyResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSubCompany extends EditRecord
{
    protected static string $resource = SubCompanyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
