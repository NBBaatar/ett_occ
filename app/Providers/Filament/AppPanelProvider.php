<?php

namespace App\Providers\Filament;

use App\Filament\App\Pages\Tenancy\EditTeamProfile;
use App\Filament\App\Pages\Tenancy\RegisterTeam;
use App\Filament\Helper\CustomLogin;
use App\Filament\Widgets\IframeWidget;
use App\Http\Middleware\VerifyIsAdmin;
use App\Http\Middleware\VerifyIsApp;
use App\Models\Team;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\MenuItem;
use Filament\Navigation\NavigationItem;
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

class AppPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            -> default()
            -> id('app')
//            ->tenant(Team::class, ownershipRelationship: 'team')
//            ->tenantRegistration(RegisterTeam::class)
//            ->tenantProfile(EditTeamProfile::class)

            -> path('app')
            -> login(CustomLogin::class)
//            ->profile()
            -> userMenuItems([
                MenuItem ::make()
                    -> label('Administrator')
                    -> icon('heroicon-o-cog-6-tooth')
                    -> url('/admin')
                    -> visible(fn (): bool => auth() -> user() -> isAdmin()),
               'logout' => MenuItem::make()->label('Системээс гарах')
            ])
            //Sidebar deer erheer haruulah tohirgoo
//            -> navigationItems([
//                NavigationItem ::make('Сургалтын бүртгэл')
//                    -> url('/edu')
//                    -> icon('heroicon-o-user-circle')
//                    -> visible(fn (): bool => auth() -> user() -> isCard())
//                    -> group('Сургалт')
//            ])
            -> colors([
                'danger' => Color::Rose,
                'gray' => Color::Gray,
                'info' => Color::Blue,
                'primary' => '#ef9420',
                'success' => Color::Emerald,
                'warning' => Color::Orange,
            ])
            -> brandName('Эрдэнэс Тавантолгой ХК - Цахим бүртгэл')
            -> brandLogo(asset('images/logo.png'))
            -> favicon(asset('images/favicon.ico'))
            -> font('Poppins')
            ->sidebarCollapsibleOnDesktop()

            -> discoverResources(in: app_path('Filament/App/Resources'), for: 'App\\Filament\\App\\Resources')
            -> discoverPages(in: app_path('Filament/App/Pages'), for: 'App\\Filament\\App\\Pages')
            -> pages([
                Pages\Dashboard::class,
            ])
            -> discoverWidgets(in: app_path('Filament/App/Widgets'), for: 'App\\Filament\\App\\Widgets')
            -> widgets([
                IframeWidget::class,
//                      Widgets\AccountWidget::class,
                // Widgets\FilamentInfoWidget::class,
            ])
            -> middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            -> authMiddleware([
                Authenticate::class,
            ]);
    }
}
