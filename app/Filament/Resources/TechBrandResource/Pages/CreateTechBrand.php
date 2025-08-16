<?php

namespace App\Filament\Resources\TechBrandResource\Pages;

use App\Filament\Resources\TechBrandResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTechBrand extends CreateRecord
{
    protected static string $resource = TechBrandResource::class;
    protected static ?string $title = 'Техникийн бренд үүсгэх';
    protected function getCreateFormAction(): \Filament\Actions\Action
    {
        return parent::getCreateFormAction()
            ->label('Үүсгэх');
    }
    protected  function getRedirectUrl(): string
    {
        return TechBrandResource::getUrl('index');
    }
}
