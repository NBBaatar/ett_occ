<?php

namespace App\Filament\Helper;

use Filament\Actions\Action;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\Auth\Login;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\HtmlString;

class CustomLogin extends Login
{
//    public function form(Form $form): Form
//    {
//        return $form -> schema([
//            TextInput ::make('email')
//                -> label(__('Email хаяг оруулах'))
//                -> required(),
//            TextInput ::make('password')
//                -> label(__('Нүүц үгээ оруулна уу.'))
//                -> required(),
//        ]);
//    }
    protected function getForms(): array
    {
        return [
            'form' => $this -> form(
                $this -> makeForm()
                    -> schema([
                        $this -> getLoginFormComponent(),
                        $this -> getPasswordFormComponent(),
                    ])
                    -> statePath('data'),
            ),
        ];
    }

    protected function getLoginFormComponent(): Component
    {
        return TextInput ::make('email')
            -> label(__('Майл хаяг оруулна уу.'))
            -> email()
            -> required()
            -> autocomplete()
            -> autofocus()
            -> extraInputAttributes(['tabindex' => 1]);
    }

    protected function getPasswordFormComponent(): Component
    {
        return TextInput ::make('password')
            -> label(__('Нүүц үгээ оруулна уу.'))
            -> hint(filament() -> hasPasswordReset() ? new HtmlString(Blade ::render('<x-filament::link :href="filament()->getRequestPasswordResetUrl()" tabindex="3"> {{ __(\'filament-panels::pages/auth/login.actions.request_password_reset.label\') }}</x-filament::link>')) : null)
            -> password()
            -> revealable(filament() -> arePasswordsRevealable())
            -> autocomplete('current-password')
            -> required()
            -> extraInputAttributes(['tabindex' => 2]);
    }

    public function getTitle(): string|Htmlable
    {
        return __('Нэвтрэх');
    }

    protected function getFormActions(): array
    {
        return [
            $this -> getAuthenticateFormAction(),
        ];
    }

    protected function getAuthenticateFormAction(): Action
    {
        return Action ::make('authenticate')
            -> label(__('Нэвтрэх'))
            -> submit('authenticate');
    }

    public function getHeading(): string|Htmlable
    {
        return __('Системд нэвтрэх');
    }

    protected function getCredentialsFromFormData(array $data): array
    {
        return [
            'email' => $data['email'],
            'password' => $data['password'],
        ];
    }
}
