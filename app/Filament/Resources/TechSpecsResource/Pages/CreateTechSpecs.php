<?php

namespace App\Filament\Resources\TechSpecsResource\Pages;

use App\Filament\Resources\TechSpecsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTechSpecs extends CreateRecord
{
    protected static string $resource = TechSpecsResource::class;
    protected static ?string $title = 'Техникийн хүчин чадал үүсгэх';
    protected function getCreateFormAction(): \Filament\Actions\Action
    {
        return parent::getCreateFormAction()
            ->label('Үүсгэх');
    }
    protected  function getRedirectUrl(): string
    {
        return TechSpecsResource::getUrl('index');
    }
}
