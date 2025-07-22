<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TechReg extends Model
{
    protected $fillable = [
        'mining_site_id',
        'co_operation_id',
        'company_id',
        'sub_company_id',
        'tech_category_id',
        'tech_type_id',
        'tech_mark_id',
        'tech_specs_id',
        'tech_number',
        'tech_park_number',
        'tech_aral_numebr',
        'date_of_manufacture',
        'date_of_imported',
        'tech_tewsh',
        'radio_id',
        'radio_serial',
        'status',
        'property_file',
        'property',
        'insurance',
        'tech_permission'
    ];
    protected $casts = [
        'tech_tewsh' => 'array',
        'property' => 'array',
        'insurance' => 'array',
        'tech_permission' => 'array',
    ];

    public function company(): BelongsTo
    {
        return $this -> belongsTo(Company::class);
    }
    public function coOperation(): BelongsTo
    {
        return $this -> belongsTo(CoOperation::class);
    }

    public function miningSite(): BelongsTo
    {
        return $this -> belongsTo(MiningSite::class);
    }

    public function subCompany(): BelongsTo
    {
        return $this -> belongsTo(SubCompany::class);
    }
    public function TechCategory() : BelongsTo
    {
        return $this->belongsTo(TechCategory::class);
    }
    public function TechType() : BelongsTo
    {
        return $this->belongsTo(TechType::class);
    }
    public function TechMark() : BelongsTo
    {
        return $this->belongsTo(TechMark::class);
    }
    public function TechSpecs() : BelongsTo
    {
        return $this->belongsTo(TechSpecs::class);
    }
}
