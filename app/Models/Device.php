<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Device extends Model
{
    protected $fillable = [
        'name',
        'device_category_id',
        'data'.
        'status',
    ];
    protected $casts = ['data' => 'array'];
    public function device_category() : BelongsTo
    {
        return $this->belongsTo(DeviceCategory::class);
    }
}
