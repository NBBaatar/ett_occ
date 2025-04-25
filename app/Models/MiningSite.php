<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MiningSite extends Model
{
    /** @use HasFactory<\Database\Factories\MiningSiteFactory> */
    use HasFactory;
    protected $fillable = [
        'name',
        'code',
        'is_active',
    ];
    public function coOperations(): HasMany{
        return $this->hasMany(CoOperation::class);
    }
    public function employees(): HasMany{
        return $this->hasMany(Employee::class);
    }
}
