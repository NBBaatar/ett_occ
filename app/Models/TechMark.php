<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TechMark extends Model
{
    protected $fillable = [
        'name',
        'brand',
        'status',
        'tech_type_id'
    ];
    public function techType() : BelongsTo
    {
        return $this->belongsTo(TechType::class);
    }
}
