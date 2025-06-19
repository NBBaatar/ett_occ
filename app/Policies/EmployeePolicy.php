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
        if(Filament::getCurrentPanel()->getId() === 'admin'){
            return $user->id == 1;
        }
        if(Filament::getCurrentPanel()->getId() === 'app'){
            return $user->id == 1 || $user->id == 2;
        }
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Employee $employee): bool
    {
        if(Filament::getCurrentPanel()->getId() === 'admin'){
            return $user->id == 1;
        }
        if(Filament::getCurrentPanel()->getId() === 'app'){
            return $user->id == 1 || $user->id == 2;
        }
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        if(Filament::getCurrentPanel()->getId() === 'admin'){
            return $user->id == 1;
        }
        if(Filament::getCurrentPanel()->getId() === 'app'){
            return $user->id == 1 || $user->id == 2;
        }
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Employee $employee): bool
    {
        if(Filament::getCurrentPanel()->getId() === 'admin'){
            return $user->id == 1;
        }
        if(Filament::getCurrentPanel()->getId() === 'app'){
            return $user->id == 1 || $user->id == 2;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Employee $employee): bool
    {
        if(Filament::getCurrentPanel()->getId() === 'admin'){
            return $user->id == 1;
        }

        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Employee $employee): bool
    {
        if(Filament::getCurrentPanel()->getId() === 'admin'){
            return $user->id == 1;
        }

        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Employee $employee): bool
    {
        if(Filament::getCurrentPanel()->getId() === 'admin'){
            return $user->id == 1;
        }
        return false;
    }
}
