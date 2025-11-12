<?php

namespace App\Filament\It\Resources\DeviceResource\Pages;

use App\Filament\It\Resources\DeviceResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateDevice extends CreateRecord
{
    protected static string $resource = DeviceResource::class;
    protected static ?string $title = 'Шинэ төхөөрөмж үүсгэх';
    protected  function getRedirectUrl(): string
    {
        return \App\Filament\Tech\Resources\DeviceResource::getUrl('index');
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
