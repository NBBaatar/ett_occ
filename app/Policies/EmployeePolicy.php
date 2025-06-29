<?php

namespace App\Policies;

use App\Models\Employee;
use App\Models\User;
use Filament\Facades\Filament;
use Illuminate\Auth\Access\Response;

class EmployeePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
//        if (Filament ::getCurrentPanel() -> getId() === 'admin') {
//            return $user -> id == true;
//        }
//        if (Filament ::getCurrentPanel() -> getId() === 'app') {
//            return $user -> isAdmin() == true || $user -> isCard() == true || $user -> isClient() == true;
//        }
//
//        return $user;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Employee $employee): bool
    {
        if (Filament ::getCurrentPanel() -> getId() === 'admin') {
            return $user -> isAdmin() == true;
        }
        if (Filament ::getCurrentPanel() -> getId() === 'app') {
            return $user -> isAdmin() == true || $user -> isCard() == true || $user -> isClient() == true;
        }
        return $user;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
//        if (Filament ::getCurrentPanel() -> getId() === 'admin') {
//            return $user -> isAdmin() == true;
//        }
//        if (Filament ::getCurrentPanel() -> getId() === 'app') {
//            return $user -> isAdmin() == true || $user -> isCard() == true || $user -> isClient() == true;
//        }
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Employee $employee): bool
    {
        if (Filament ::getCurrentPanel() -> getId() === 'admin') {
            return $user -> isAdmin() == true;
        }
        if (Filament ::getCurrentPanel() -> getId() === 'app') {
            return $user -> isAdmin() == true || $user -> isCard() == true;
        }
        return $user;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Employee $employee): bool
    {
        if (Filament ::getCurrentPanel() -> getId() === 'admin') {
            return $user -> isAdmin() == true;
        }

        return $user;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Employee $employee): bool
    {
        if (Filament ::getCurrentPanel() -> getId() === 'admin') {
            return $user -> isAdmin() == true;
        }

        return $user;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Employee $employee): bool
    {
        if (Filament ::getCurrentPanel() -> getId() === 'admin') {
            return $user -> isAdmin() == true;
        }
        return $user;
    }
}
