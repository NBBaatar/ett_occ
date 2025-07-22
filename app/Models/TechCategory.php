<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TechCategory extends Model
{
    protected $fillable = [
        'name',
        'status'
    ];
    public function techTypes() : HasMany
    {
        return $this->hasMany(TechType::class);
    }
    public function TechRegs() : HasMany
    {
        return $this->hasMany(TechReg::class);
    }
}
