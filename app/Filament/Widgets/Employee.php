<?php

namespace App\Filament\Widgets;

use App\Models\Employee as ModelsEmployee;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class Employee extends ChartWidget
{
    protected static ?string $heading = 'Ажилтны бүртгэл';
    protected static string $color ='info';
    protected function getData(): array
    {
        $data = Trend::model(ModelsEmployee::class)
        ->between(
            start: now()->startOfMonth(),
            end: now()->endOfMonth(),
        )
        ->perWeek()
        ->count();

    return [
        'datasets' => [
            [
                'label' => 'Бүртгэгсэн ажилтан',
                'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
            ],
        ],
        'labels' => $data->map(fn (TrendValue $value) => $value->date),
    ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
