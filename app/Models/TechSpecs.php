<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TechSpecs extends Model
{
    protected $fillable = [
        'name',
        'tech_type_id',
        'status',
    ];

    public function techType() : BelongsTo
    {
        return $this->belongsTo(TechType::class);
    }

}
