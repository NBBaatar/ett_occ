<?php

namespace App\Filament\Resources\TechBrandResource\Pages;

use App\Filament\Resources\TechBrandResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTechBrand extends EditRecord
{
    protected static string $resource = TechBrandResource::class;

    protected static ?string $title = 'Техник бренд мэдээлэл засварлах';

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
