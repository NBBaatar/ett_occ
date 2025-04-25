<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;
use Illuminate\Contracts\View\View;

class IframeWidget extends Widget
{
    protected static string $view = 'filament.widgets.iframe-widget';
    protected static ?int $sort = 3;
    protected static ?string $heading = 'Iframe';
    protected static ?string $maxContentWidth = 'full';
    protected int | string | array $columnSpan = 'full';
    public function render(): View
    {
        return view('filament.widgets.iframe-widget');
    }
}
