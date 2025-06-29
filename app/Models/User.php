<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasTenants;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable implements HasTenants, FilamentUser
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
        'is_card',
        'is_tech',
        'is_client',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',

    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_admin' => 'boolean',
            'is_card' => 'boolean',
            'is_tech' => 'boolean',
        ];
    }

    public function teams(): BelongsToMany
    {
        return $this -> belongsToMany(Team::class);
    }

    public function getTenants(Panel $panel): Collection
    {
        return $this -> teams;
    }

    public function canAccessTenant(Model $tenant): bool
    {
        return $this -> teams() -> whereKey($tenant) -> exists();
    }

    public function canAccessPanel(Panel $panel): bool
    {
        if ($panel -> getId() === 'admin') {
            return str_ends_with($this -> is_admin, '1');
        }
        if ($panel -> getId() === 'app') {
            return str_ends_with($this -> is_card || $this -> is_client, '1');
        }

        if ($panel -> getId() === 'tech') {
            return str_ends_with($this -> is_tech, '1');
        }
        return false;
    }

    public function isAdmin(): bool
    {
        return $this -> is_admin === true;
    }

    public function isCard(): bool
    {
        return $this -> is_card === true;
    }

    public function isTech(): bool
    {
        return $this -> is_tech === true;
    }

    public function isClient(): bool
    {
        return $this -> is_client === true;
    }

}
