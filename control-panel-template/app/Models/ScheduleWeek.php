<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ScheduleWeek extends Model
{
    use HasFactory;

    protected $fillable = [
        'schedule_id',
        'week_number',
    ];

    // RELATIONSHIPS
    public function workShifts(): HasMany
    {
        return $this->hasMany(ScheduleWorkShift::class);
    }

    public function schedule(): BelongsTo
    {
        return $this->belongsTo(Schedule::class);
    }


}
