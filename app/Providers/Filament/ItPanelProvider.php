<?php

namespace App\Providers\Filament;

use App\Filament\Helper\CustomLogin;
use App\Http\Middleware\IsIt;
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

class ItPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('it')
            ->path('it')
            ->colors([
                'danger' => Color::Rose,
                'gray' => Color::Gray,
                'info' => Color::Blue,
                'primary' => '#ef9420',
                'success' => Color::Emerald,
                'warning' => Color::Orange,
            ])
            -> userMenuItems([
                MenuItem ::make()
                    -> label('Administrator')
                    -> icon('heroicon-o-cog-6-tooth')
                    -> url('/admin')
                    -> visible(fn (): bool => auth() -> user() -> isAdmin()),
                'logout' => MenuItem::make()->label('Системээс гарах')
            ])
            ->login(CustomLogin::class)
            -> brandName('Эрдэнэс Тавантолгой ХК - Цахим бүртгэл')
            -> brandLogo(asset('images/logo.png'))
            -> favicon(asset('images/favicon.ico'))
            -> font('Poppins')
            ->discoverResources(in: app_path('Filament/It/Resources'), for: 'App\\Filament\\It\\Resources')
            ->discoverPages(in: app_path('Filament/It/Pages'), for: 'App\\Filament\\It\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/It/Widgets'), for: 'App\\Filament\\It\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
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
                IsIt::class,
            ]);
//            ->authMiddleware([
//                Authenticate::class,
//            ]);
    }
}
