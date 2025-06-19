<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Employee extends Model
{
    /** @use HasFactory<\Database\Factories\EmployeeFactory> */
    use HasFactory;
protected $fillable = [
        'fname',
        'lname',
        'register',
        'phone',
        'date_of_employement',
        'date_of_expiration',
        'photo',
        'company_id',
        'appointment_id',
        'co_operation_id',
        'mining_site_id',
        'sub_company_id',
        'shift_id',
        'region_id',
        'point_id',
        'card_number',
        'employee_uid',
        'is_active',
        'description',
        'is_trained',
    ];
    public function company() : BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
    public function appointment() : BelongsTo
    {
        return $this->belongsTo(Appointment::class);
    }
    public function coOperation() : BelongsTo
    {
        return $this->belongsTo(CoOperation::class);
    }
    public function miningSite() : BelongsTo
    {
        return $this->belongsTo(MiningSite::class);
    }
    public function subCompany() : BelongsTo
    {
        return $this->belongsTo(SubCompany::class);
    }
    public function shift() : BelongsTo
    {
        return $this->belongsTo(Shift::class);
    }
    public function region() : BelongsTo
    {
        return $this->belongsTo(Region::class);
    }
    public function point() : BelongsTo
    {
        return $this->belongsTo(Point::class);
    }
//    public function team() : BelongsTo
//    {
//        return $this->belongsTo(Team::class);
//    }

}
