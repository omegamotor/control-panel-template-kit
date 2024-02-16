<?php

use App\Models\ScheduleWeek;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('schedule_work_shifts', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(ScheduleWeek::class, 'schedule_week_id')
                ->constrained('schedule_weeks')
                ->onUpdate('cascade');
            $table->smallInteger('day_of_week');
            $table->time('start_time');
            $table->time('end_time');
            $table->boolean('is_work_day');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedule_work_shifts');
    }
};
