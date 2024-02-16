<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ScheduleWorkShift extends Model
{
    use HasFactory;

    protected $fillable = [
        'schedule_week_id',
        'day_of_week',
        'start_time',
        'end_time',
        'is_work_day',
    ];

    public function getStartTime(){
        return Carbon::parse($this->start_time)->format('G:i');;
    }

    public function getEndTime(){
        return Carbon::parse($this->end_time)->format('G:i');;
    }

    // RELATIONSHIPS
    public function scheduleWeek(): BelongsTo
    {
        return $this->belongsTo(ScheduleWeek::class);
    }
}
