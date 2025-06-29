<?php

namespace App\Filament\Resources\TrainigResource\Pages;

use App\Filament\Resources\TrainigResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTrainig extends CreateRecord
{
    protected static string $resource = TrainigResource::class;
    protected static ?string $title = 'Сургалтын төрөл үүсгэх';

    protected function getCreateFormAction(): \Filament\Actions\Action
    {
        return parent ::getCreateFormAction()
            -> label('Үүсгэх');
    }

    protected function getRedirectUrl(): string
    {
        return TrainigResource ::getUrl('index');
    }
}

