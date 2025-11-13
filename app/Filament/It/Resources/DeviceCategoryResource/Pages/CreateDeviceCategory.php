<?php

namespace App\Filament\It\Resources\DeviceCategoryResource\Pages;

use App\Filament\It\Resources\DeviceCategoryResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateDeviceCategory extends CreateRecord
{
    protected static string $resource = DeviceCategoryResource::class;
    protected static ?string $title = 'Шинэ ангилал үүсгэх';
    protected  function getRedirectUrl(): string
    {
        return \App\Filament\It\Resources\DeviceCategoryResource::getUrl('index');
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
