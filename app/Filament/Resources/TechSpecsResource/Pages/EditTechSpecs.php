<?php

namespace App\Filament\Resources\TechSpecsResource\Pages;

use App\Filament\Resources\TechSpecsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTechSpecs extends EditRecord
{
    protected static string $resource = TechSpecsResource::class;
    protected static ?string $title = 'Техникийн хүчин чадлын мэдээлэл засварлах';

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
