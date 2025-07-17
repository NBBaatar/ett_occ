<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum TrainingStatus: string implements HasLabel, HasColor, HasIcon
{
    case Trained = 'Хамрагдсан';
    case NeedRetraining = 'Давтан_шалгалт_өгөх';
    case NotTrained = 'Шалгалт_өгөөгүй';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::Trained => __('Хамрагдсан'),
            self::NeedRetraining => __('Давтан шалгалт өгөх'),
            self::NotTrained => __('Шалгалт өгөөгүй'),
        };
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::Trained => 'success',
            self::NeedRetraining => 'warning',
            self::NotTrained => 'danger',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::Trained => 'heroicon-o-check-circle',
            self::NeedRetraining => 'hero-icon-o-pencil',
            self::NotTrained => 'heroicon-o-exclamation-circle',
        };
    }
}
