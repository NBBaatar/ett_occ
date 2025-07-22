<?php

namespace App\Filament\Resources\TechRegResource\Pages;

use App\Filament\Resources\TechRegResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateTechReg extends CreateRecord
{
    protected static string $resource = TechRegResource::class;
    protected static ?string $title = 'Шинэ техник үүсгэх';
    protected function getCreateFormAction(): \Filament\Actions\Action
    {
        return parent::getCreateFormAction()
            ->label('Үүсгэх');
    }
    protected  function getRedirectUrl(): string
    {
        return TechRegResource::getUrl('index');
    }
    protected  function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->title('Мэдээлэл')
            ->success()
            ->body('Мэдээлэл амжилттай хадаглагдлаа.')
            ->duration(3000)
            ->send();
    }
}
