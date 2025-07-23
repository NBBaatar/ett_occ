<?php

namespace App\Policies;

use App\Models\TechReg;
use App\Models\User;
use Filament\Facades\Filament;
use Illuminate\Auth\Access\Response;

class TechRegPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, TechReg $techReg): bool
    {
        if (Filament ::getCurrentPanel() -> getId() === 'admin') {
            return $user -> isAdmin() == true;
        }
        if (Filament ::getCurrentPanel() -> getId() === 'tech') {
            return $user -> isAdmin() == true || $user -> isTech() == true;
        }
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, TechReg $techReg): bool
    {
        if (Filament ::getCurrentPanel() -> getId() === 'admin') {
            return $user -> isAdmin() == true;
        }
        if (Filament ::getCurrentPanel() -> getId() === 'tech') {
            return $user -> isAdmin() == true || $user -> isTech() == true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, TechReg $techReg): bool
    {
        if (Filament ::getCurrentPanel() -> getId() === 'admin') {
            return $user -> isAdmin() == true;
        }
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, TechReg $techReg): bool
    {
        if (Filament ::getCurrentPanel() -> getId() === 'admin') {
            return $user -> isAdmin() == true;
        }

        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, TechReg $techReg): bool
    {
        if (Filament ::getCurrentPanel() -> getId() === 'admin') {
            return $user -> isAdmin() == true;
        }

        return false;
    }
}
