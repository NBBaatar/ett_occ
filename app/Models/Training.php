<?php

namespace App\Models;

use App\TrainingStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Training extends Model
{
    protected $fillable = [
        'name',
        'training_hour',
        'is_active',
    ];
    protected $casts = [
        'trainig_status' => TrainingStatus::class,
    ];


    public function employees(): HasMany
    {
        return $this -> hasMany(Employee::class);
    }
}
