<?php

namespace App\Filament\Widgets;

use App\Models\Company;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
class CompanyChart extends ChartWidget
{
    protected static ?int $sord = 3;
    protected static ?string $heading = 'Компанийн бүртгэл';
    protected static string $color ='warning';

    protected function getData(): array
    {
        $data = Trend::model(Company::class)
        ->between(
            start: now()->startOfMonth(),
            end: now()->endOfMonth(),
        )
        ->perWeek()
        ->count();

    return [
        'datasets' => [
            [
                'label' => 'Компани',
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
