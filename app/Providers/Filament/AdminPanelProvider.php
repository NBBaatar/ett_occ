<?php

namespace App\Providers\Filament;


use App\Filament\Widgets\CompanyStatic;
use App\Filament\Widgets\Employee;
use App\Filament\Widgets\EmployeeStatic;
use App\Filament\Widgets\IframeWidget;

use App\Http\Middleware\VerifyIsAdmin;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\MenuItem;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel

            ->id('admin')
            ->path('admin')
            ->userMenuItems([
                MenuItem::make()
                ->label('Цахим үнэмлэх')
                ->icon('heroicon-o-cog-6-tooth')
                ->url('/app'),
                'logout' => MenuItem::make()->label('Системээс гарах')
            ])
            ->userMenuItems([
                MenuItem::make()
                    ->label('Техник бүртгэл')
                    ->icon('heroicon-o-cog-6-tooth')
                    ->url('/tech'),
                'logout' => MenuItem::make()->label('Системээс гарах')
            ])
             ->colors([
                'danger' => Color::Rose,
                'gray' => Color::Gray,
                'info' => Color::Blue,
                'primary' => '#ef9420',
                'success' => Color::Emerald,
                'warning' => Color::Orange,
            ])
            ->brandName('Эрдэнэс Тавантолгой ХК')
            ->brandLogo(asset('images/logo.png'))
            ->favicon(asset('images/favicon.ico'))
            ->sidebarCollapsibleOnDesktop()
            ->font('Poppins')
            ->topNavigation()
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                IframeWidget::class,
            //     // Widgets\AccountWidget::class,
            //     // Widgets\FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
                VerifyIsAdmin::class,
            ]);
//            ->authMiddleware([
//                Authenticate::class,
//            ]);


    }
}
