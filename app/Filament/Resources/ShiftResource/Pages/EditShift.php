<?php

namespace App\Filament\Resources\ShiftResource\Pages;

use App\Filament\Resources\ShiftResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditShift extends EditRecord
{
    protected static string $resource = ShiftResource::class;
    protected static ?string $title = 'Ээлжийн мэдээлэл засварлах';

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make()->label('Засах'),
            Actions\DeleteAction::make()->label('Устгах'),
        ];
    }
}
