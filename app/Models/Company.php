<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    /** @use HasFactory<\Database\Factories\CompanyFactory> */
    use HasFactory;
    protected $fillable = [
        'co_operation_id',
        'name',
        'is_active',
    ];
    public function coOperation() : BelongsTo
    {
        return $this->belongsTo(CoOperation::class);
    }
    public function subCompanies() : HasMany
    {
        return $this->HasMany(SubCompany::class);
    }
    public function employees() : HasMany
    {
        return $this->hasMany(Employee::class);
    }
     public function points() : HasMany
    {
        return $this->hasMany(Point::class);
    }
}
