<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TechBrand extends Model
{
    protected $fillable = [
        'name',
        'status',
        'tech_type_id'
    ];
    public function TechRegs() : HasMany
    {
        return $this->hasMany(TechReg::class);
    }
    public function techType() : BelongsTo
    {
        return $this->belongsTo(TechType::class);
    }
    public function techBrands() : HasMany
    {
        return $this->hasMany(TechBrand::class);
    }
}
