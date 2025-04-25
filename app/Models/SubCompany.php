<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubCompany extends Model
{
    /** @use HasFactory<\Database\Factories\SubCompanyFactory> */
    use HasFactory;
     protected $fillable = [
        'company_id',
        'name',
        'code',
        'is_active',
    ];
    public function company() : BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
