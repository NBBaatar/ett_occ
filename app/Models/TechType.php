<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TechType extends Model
{

    protected $fillable = [
        'name',
        'status',
        'specs',
        'tech_category_id'
        ];

    public function techCategory() : BelongsTo
    {
        return $this->belongsTo(TechCategory::class);
    }
    public function techMarks() : HasMany
    {
        return $this->hasMany(TechMark::class);
    }
    public function TechRegs() : HasMany
    {
        return $this->hasMany(TechReg::class);
    }
    public function techSpecs() : HasMany
    {
        return $this->hasMany(TechSpecs::class);
    }

}
