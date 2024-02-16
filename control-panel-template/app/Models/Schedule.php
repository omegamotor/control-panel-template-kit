<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'cycle_length',
        'start_date'
    ];

    // RELATIONSHIPS
    public function weeks(): HasMany
    {
        return $this->hasMany(ScheduleWeek::class);
    }
}
