<?php

use App\Models\Schedule;
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
        Schema::create('schedule_weeks', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Schedule::class, 'schedule_id')
                ->constrained('schedules')
                ->onUpdate('cascade');
            $table->smallInteger('week_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedule_weeks');
    }
};
