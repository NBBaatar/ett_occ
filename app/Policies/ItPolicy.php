<?php

namespace App\Policies;

use App\Models\Devices;
use App\Models\User;
use Filament\Facades\Filament;
use Illuminate\Auth\Access\Response;

class ItPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        if (Filament ::getCurrentPanel() -> getId() === 'it') {
            return $user -> isIt() == true;
        }
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Devices $devices): bool
    {
        if (Filament ::getCurrentPanel() -> getId() === 'it') {
            return $user -> isIt() == true;
        }
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        if (Filament ::getCurrentPanel() -> getId() === 'it') {
            return $user -> isIt() == true;
        }
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Devices $devices): bool
    {
        if (Filament ::getCurrentPanel() -> getId() === 'it') {
            return $user -> isIt() == true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Devices $devices): bool
    {
        if (Filament ::getCurrentPanel() -> getId() === 'it') {
            return $user -> isIt() == true;
        }
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Devices $devices): bool
    {
        if (Filament ::getCurrentPanel() -> getId() === 'it') {
            return $user -> isIt() == true;
        }
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Devices $devices): bool
    {
        if (Filament ::getCurrentPanel() -> getId() === 'it') {
            return $user -> isIt() == true;
        }
        return false;
    }
}
