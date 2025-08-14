<?php

namespace App\Filament\Tech\Widgets;

use App\Models\Company;
use App\Models\CoOperation;
use App\Models\TechReg;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class TechStatic extends BaseWidget
{
    protected function getStats(): array
    {

           return [
               Stat::make('Нийт техник', TechReg::count())
                   ->description('Системд бүртгэгдсэн техник тоо')
                   ->descriptionIcon('heroicon-m-adjustments-vertical', IconPosition::Before)
                   ->chart([10,15,55,60,73,87,100,250,350])
                   ->color('success'),
               Stat::make('Нийт компани', Company::count())
                   ->description('Системд бүртгэгдсэн компанийн тоо')
                   ->descriptionIcon('heroicon-m-building-office-2', IconPosition::Before)
                   ->chart([10,15,55,60,73,87,100,250,350])
                   ->color('warning'),
               Stat::make('Нийт түншлэл', CoOperation::count())
                   ->description('Системд бүртгэгдсэн түншлэлийн тоо')
                   ->descriptionIcon('heroicon-m-home-modern', IconPosition::Before)
                   ->chart([10,15,55,60,73,87,100,250,350])
                   ->color('info'),
           ];

    }
}
