<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
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
    ];
}
