<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TechMark extends Model
{
    protected $fillable = [
        'name',
        'status',
        'tech_brand_id'
    ];
    public function techBrand() : BelongsTo
    {
        return $this->belongsTo(TechBrand::class);
    }
    public function TechRegs() : HasMany
    {
        return $this->hasMany(TechReg::class);
    }
}
