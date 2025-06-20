<?php

namespace App\Filament\Resources\TechMarkResource\Pages;

use App\Filament\Resources\TechMarkResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTechMark extends EditRecord
{
    protected static string $resource = TechMarkResource::class;
    protected static ?string $title = 'Техник марк мэдээлэл засварлах';

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
