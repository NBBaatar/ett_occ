<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TechSpecs extends Model
{
    protected $fillable = [
        'name',
        'tech_mark_id',
        'status',
    ];

    public function techMark() : BelongsTo
    {
        return $this->belongsTo(TechMark::class);
    }
    public function TechRegs() : HasMany
    {
        return $this->hasMany(TechReg::class);
    }

}
