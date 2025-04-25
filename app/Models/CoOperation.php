<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CoOperation extends Model
{
    /** @use HasFactory<\Database\Factories\CoOperationFactory> */
    use HasFactory;
    protected $fillable = [
        'mining_site_id',
        'name',
        'code',
        'is_active',
    ];
    public function miningSite () : BelongsTo
    {
        return $this->belongsTo(MiningSite::class);
    }
    public function companies () : HasMany {
        return $this->hasMany(Company::class);
    }
    public function employees() : HasMany {
        return $this->hasMany(Employee::class);
    }
}
