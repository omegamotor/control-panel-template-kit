<?php

namespace Database\Seeders;

use App\Models\Schedule;
use App\Models\ScheduleWorkShift;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScheduleDHLSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Schedule
        $schedule = Schedule::create([
            'title' => 'DHL',
            'cycle_length' => '12',
            'start_date' => '2023-11-27'
        ]);

        // Create weeks for schedule
        $scheduleWeeksData = [];
        for ($i = 1; $i <= $schedule->cycle_length; $i++) {
            $scheduleWeeksData[] = ['week_number' => $i];
        }

        $schedule->weeks()->createMany($scheduleWeeksData);

        $scheduleWorkShifts = [
            [
                 "schedule_week_id" => 1,
                 "day_of_week" => 1,
                 "start_time" => "08:00:00",
                 "end_time" => "16:00:00",
                 "is_work_day" => 0,],
            [
                 "schedule_week_id" => 1,
                 "day_of_week" => 2,
                 "start_time" => "01:30:00",
                 "end_time" => "07:30:00",
                 "is_work_day" => 1,],
            [
                 "schedule_week_id" => 1,
                 "day_of_week" => 3,
                 "start_time" => "01:30:00",
                 "end_time" => "07:30:00",
                 "is_work_day" => 1,],
            [
                 "schedule_week_id" => 1,
                 "day_of_week" => 4,
                 "start_time" => "00:30:00",
                 "end_time" => "00:30:00",
                 "is_work_day" => 1,],
            [
                 "schedule_week_id" => 1,
                 "day_of_week" => 5,
                 "start_time" => "01:30:00",
                 "end_time" => "07:30:00",
                 "is_work_day" => 1,],
            [
                 "schedule_week_id" => 1,
                 "day_of_week" => 6,
                 "start_time" => "02:00:00",
                 "end_time" => "07:30:00",
                 "is_work_day" => 1,],
            [
                 "schedule_week_id" => 1,
                 "day_of_week" => 7,
                 "start_time" => "08:00:00",
                 "end_time" => "16:00:00",
                 "is_work_day" => 0,],
            [
                 "schedule_week_id" => 2,
                 "day_of_week" => 1,
                 "start_time" => "12:30:00",
                 "end_time" => "21:15:00",
                 "is_work_day" => 1,],
            [
                 "schedule_week_id" => 2,
                 "day_of_week" => 2,
                 "start_time" => "12:30:00",
                 "end_time" => "21:15:00",
                 "is_work_day" => 1,],
            [
                 "schedule_week_id" => 2,
                 "day_of_week" => 3,
                 "start_time" => "08:00:00",
                 "end_time" => "16:00:00",
                 "is_work_day" => 0,],
            [
                 "schedule_week_id" => 2,
                 "day_of_week" => 4,
                 "start_time" => "12:30:00",
                 "end_time" => "21:15:00",
                 "is_work_day" => 1,],
            [
                 "schedule_week_id" => 2,
                 "day_of_week" => 5,
                 "start_time" => "12:30:00",
                 "end_time" => "21:15:00",
                 "is_work_day" => 1,],
            [
                 "schedule_week_id" => 2,
                 "day_of_week" => 6,
                 "start_time" => "13:38:00",
                 "end_time" => "19:00:00",
                 "is_work_day" => 1,],
            [
                 "schedule_week_id" => 2,
                 "day_of_week" => 7,
                 "start_time" => "08:00:00",
                 "end_time" => "16:00:00",
                 "is_work_day" => 0,
             ],
            [
                 "schedule_week_id" => 3,
                 "day_of_week" => 1,
                 "start_time" => "01:00:00",
                 "end_time" => "07:30:00",
                 "is_work_day" => 1,
             ],
            [
                 "schedule_week_id" => 3,
                 "day_of_week" => 2,
                 "start_time" => "01:30:00",
                 "end_time" => "07:30:00",
                 "is_work_day" => 1,],
            [
                 "schedule_week_id" => 3,
                 "day_of_week" => 3,
                 "start_time" => "00:30:00",
                 "end_time" => "07:30:00",
                 "is_work_day" => 1,],
            [
                 "schedule_week_id" => 3,
                 "day_of_week" => 4,
                 "start_time" => "00:30:00",
                 "end_time" => "07:30:00",
                 "is_work_day" => 1,],
            [
                 "schedule_week_id" => 3,
                 "day_of_week" => 5,
                 "start_time" => "01:30:00",
                 "end_time" => "07:30:00",
                 "is_work_day" => 1,],
            [
                 "schedule_week_id" => 3,
                 "day_of_week" => 6,
                 "start_time" => "08:00:00",
                 "end_time" => "16:00:00",
                 "is_work_day" => 0,],
            [
                 "schedule_week_id" => 3,
                 "day_of_week" => 7,
                 "start_time" => "08:00:00",
                 "end_time" => "16:00:00",
                 "is_work_day" => 0,],
            [
                 "schedule_week_id" => 4,
                 "day_of_week" => 1,
                 "start_time" => "12:30:00",
                 "end_time" => "21:15:00",
                 "is_work_day" => 1,],
            [
                 "schedule_week_id" => 4,
                 "day_of_week" => 2,
                 "start_time" => "12:30:00",
                 "end_time" => "21:15:00",
                 "is_work_day" => 1,],
            [
                 "schedule_week_id" => 4,
                 "day_of_week" => 3,
                 "start_time" => "12:30:00",
                 "end_time" => "21:15:00",
                 "is_work_day" => 1,],
            [
                 "schedule_week_id" => 4,
                 "day_of_week" => 4,
                 "start_time" => "12:30:00",
                 "end_time" => "21:15:00",
                 "is_work_day" => 1,],
            [
                 "schedule_week_id" => 4,
                 "day_of_week" => 5,
                 "start_time" => "08:00:00",
                 "end_time" => "16:00:00",
                 "is_work_day" => 0,],
            [
                 "schedule_week_id" => 4,
                 "day_of_week" => 6,
                 "start_time" => "13:38:00",
                 "end_time" => "19:00:00",
                 "is_work_day" => 1,],
            [
                 "schedule_week_id" => 4,
                 "day_of_week" => 7,
                 "start_time" => "08:00:00",
                 "end_time" => "16:00:00",
                 "is_work_day" => 0,],
            [
                 "schedule_week_id" => 5,
                 "day_of_week" => 1,
                 "start_time" => "01:00:00",
                 "end_time" => "07:30:00",
                 "is_work_day" => 1,],
            [
                 "schedule_week_id" => 5,
                 "day_of_week" => 2,
                 "start_time" => "01:30:00",
                 "end_time" => "07:30:00",
                 "is_work_day" => 1,],
            [
                 "schedule_week_id" => 5,
                 "day_of_week" => 3,
                 "start_time" => "00:30:00",
                 "end_time" => "07:30:00",
                 "is_work_day" => 1,],
            [
                 "schedule_week_id" => 5,
                 "day_of_week" => 4,
                 "start_time" => "00:30:00",
                 "end_time" => "07:30:00",
                 "is_work_day" => 1,],
            [
                 "schedule_week_id" => 5,
                 "day_of_week" => 5,
                 "start_time" => "08:00:00",
                 "end_time" => "16:00:00",
                 "is_work_day" => 0,],
            [
                 "schedule_week_id" => 5,
                 "day_of_week" => 6,
                 "start_time" => "02:00:00",
                 "end_time" => "07:30:00",
                 "is_work_day" => 1,],
            [
                 "schedule_week_id" => 5,
                 "day_of_week" => 7,
                 "start_time" => "08:00:00",
                 "end_time" => "16:00:00",
                 "is_work_day" => 0,],
            [
                 "schedule_week_id" => 6,
                 "day_of_week" => 1,
                 "start_time" => "08:00:00",
                 "end_time" => "16:00:00",
                 "is_work_day" => 0,],
            [
                 "schedule_week_id" => 6,
                 "day_of_week" => 2,
                 "start_time" => "12:30:00",
                 "end_time" => "21:15:00",
                 "is_work_day" => 1,],
            [
                 "schedule_week_id" => 6,
                 "day_of_week" => 3,
                 "start_time" => "12:30:00",
                 "end_time" => "21:15:00",
                 "is_work_day" => 1,],
            [
                 "schedule_week_id" => 6,
                 "day_of_week" => 4,
                 "start_time" => "12:30:00",
                 "end_time" => "21:15:00",
                 "is_work_day" => 1,],
            [
                 "schedule_week_id" => 6,
                 "day_of_week" => 5,
                 "start_time" => "12:30:00",
                 "end_time" => "21:15:00",
                 "is_work_day" => 1,],
            [
                 "schedule_week_id" => 6,
                 "day_of_week" => 6,
                 "start_time" => "13:37:00",
                 "end_time" => "19:00:00",
                 "is_work_day" => 1,],
            [
                 "schedule_week_id" => 6,
                 "day_of_week" => 7,
                 "start_time" => "08:00:00",
                 "end_time" => "16:00:00",
                 "is_work_day" => 0,],
            [
                 "schedule_week_id" => 7,
                 "day_of_week" => 1,
                 "start_time" => "08:00:00",
                 "end_time" => "16:00:00",
                 "is_work_day" => 0,],
            [
                 "schedule_week_id" => 7,
                 "day_of_week" => 2,
                 "start_time" => "01:30:00",
                 "end_time" => "07:30:00",
                 "is_work_day" => 1,],
            [
                 "schedule_week_id" => 7,
                 "day_of_week" => 3,
                 "start_time" => "00:30:00",
                 "end_time" => "07:30:00",
                 "is_work_day" => 1,],
            [
                 "schedule_week_id" => 7,
                 "day_of_week" => 4,
                 "start_time" => "00:30:00",
                 "end_time" => "07:30:00",
                 "is_work_day" => 1,],
            [
                 "schedule_week_id" => 7,
                 "day_of_week" => 5,
                 "start_time" => "01:30:00",
                 "end_time" => "07:30:00",
                 "is_work_day" => 1,],
            [
                 "schedule_week_id" => 7,
                 "day_of_week" => 6,
                 "start_time" => "02:00:00",
                 "end_time" => "07:30:00",
                 "is_work_day" => 1,],
            [
                 "schedule_week_id" => 7,
                 "day_of_week" => 7,
                 "start_time" => "08:00:00",
                 "end_time" => "16:00:00",
                 "is_work_day" => 0,],
            [
                 "schedule_week_id" => 8,
                 "day_of_week" => 1,
                 "start_time" => "12:30:00",
                 "end_time" => "21:15:00",
                 "is_work_day" => 1,],
            [
                 "schedule_week_id" => 8,
                 "day_of_week" => 2,
                 "start_time" => "12:30:00",
                 "end_time" => "21:15:00",
                 "is_work_day" => 1,],
            [
                 "schedule_week_id" => 8,
                 "day_of_week" => 3,
                 "start_time" => "12:30:00",
                 "end_time" => "21:15:00",
                 "is_work_day" => 1,],
            [
                 "schedule_week_id" => 8,
                 "day_of_week" => 4,
                 "start_time" => "12:30:00",
                 "end_time" => "21:15:00",
                 "is_work_day" => 1,],
            [
                 "schedule_week_id" => 8,
                 "day_of_week" => 5,
                 "start_time" => "12:30:00",
                 "end_time" => "21:15:00",
                 "is_work_day" => 1,],
            [
                 "schedule_week_id" => 8,
                 "day_of_week" => 6,
                 "start_time" => "08:00:00",
                 "end_time" => "16:00:00",
                 "is_work_day" => 0,],
            [
                 "schedule_week_id" => 8,
                 "day_of_week" => 7,
                 "start_time" => "08:00:00",
                 "end_time" => "16:00:00",
                 "is_work_day" => 0,],
            [
                 "schedule_week_id" => 9,
                 "day_of_week" => 1,
                 "start_time" => "01:00:00",
                 "end_time" => "07:30:00",
                 "is_work_day" => 1,],
            [
                 "schedule_week_id" => 9,
                 "day_of_week" => 2,
                 "start_time" => "01:30:00",
                 "end_time" => "07:30:00",
                 "is_work_day" => 1,],
            [
                 "schedule_week_id" => 9,
                 "day_of_week" => 3,
                 "start_time" => "00:30:00",
                 "end_time" => "07:30:00",
                 "is_work_day" => 1,],
            [
                 "schedule_week_id" => 9,
                 "day_of_week" => 4,
                 "start_time" => "08:00:00",
                 "end_time" => "16:00:00",
                 "is_work_day" => 0,],
            [
                 "schedule_week_id" => 9,
                 "day_of_week" => 5,
                 "start_time" => "01:30:00",
                 "end_time" => "07:30:00",
                 "is_work_day" => 1,],
            [
                 "schedule_week_id" => 9,
                 "day_of_week" => 6,
                 "start_time" => "02:00:00",
                 "end_time" => "07:30:00",
                 "is_work_day" => 1,],
            [
                 "schedule_week_id" => 9,
                 "day_of_week" => 7,
                 "start_time" => "08:00:00",
                 "end_time" => "16:00:00",
                 "is_work_day" => 0,],
            [
                 "schedule_week_id" => 10,
                 "day_of_week" => 1,
                 "start_time" => "12:30:00",
                 "end_time" => "21:15:00",
                 "is_work_day" => 1,],
            [
                 "schedule_week_id" => 10,
                 "day_of_week" => 2,
                 "start_time" => "12:30:00",
                 "end_time" => "21:15:00",
                 "is_work_day" => 1,],
            [
                 "schedule_week_id" => 10,
                 "day_of_week" => 3,
                 "start_time" => "12:30:00",
                 "end_time" => "21:15:00",
                 "is_work_day" => 1,],
            [
                 "schedule_week_id" => 10,
                 "day_of_week" => 4,
                 "start_time" => "12:30:00",
                 "end_time" => "21:15:00",
                 "is_work_day" => 0,],
            [
                 "schedule_week_id" => 10,
                 "day_of_week" => 5,
                 "start_time" => "12:30:00",
                 "end_time" => "21:15:00",
                 "is_work_day" => 1,],
            [
                 "schedule_week_id" => 10,
                 "day_of_week" => 6,
                 "start_time" => "13:37:00",
                 "end_time" => "19:00:00",
                 "is_work_day" => 1,],
            [
                 "schedule_week_id" => 10,
                 "day_of_week" => 7,
                 "start_time" => "08:00:00",
                 "end_time" => "16:00:00",
                 "is_work_day" => 0,],
            [
                 "schedule_week_id" => 11,
                 "day_of_week" => 1,
                 "start_time" => "01:00:00",
                 "end_time" => "07:30:00",
                 "is_work_day" => 1,],
            [
                 "schedule_week_id" => 11,
                 "day_of_week" => 2,
                 "start_time" => "08:00:00",
                 "end_time" => "16:00:00",
                 "is_work_day" => 0,],
            [
                 "schedule_week_id" => 11,
                 "day_of_week" => 3,
                 "start_time" => "00:30:00",
                 "end_time" => "07:30:00",
                 "is_work_day" => 1,],
            [
                 "schedule_week_id" => 11,
                 "day_of_week" => 4,
                 "start_time" => "00:30:00",
                 "end_time" => "07:30:00",
                 "is_work_day" => 1,],
            [
                 "schedule_week_id" => 11,
                 "day_of_week" => 5,
                 "start_time" => "01:30:00",
                 "end_time" => "07:30:00",
                 "is_work_day" => 1,],
            [
                 "schedule_week_id" => 11,
                 "day_of_week" => 6,
                 "start_time" => "02:00:00",
                 "end_time" => "07:30:00",
                 "is_work_day" => 1,],
            [
                 "schedule_week_id" => 11,
                 "day_of_week" => 7,
                 "start_time" => "08:00:00",
                 "end_time" => "16:00:00",
                 "is_work_day" => 0,],
            [
                 "schedule_week_id" => 12,
                 "day_of_week" => 1,
                 "start_time" => "12:30:00",
                 "end_time" => "21:15:00",
                 "is_work_day" => 1,],
            [
                 "schedule_week_id" => 12,
                 "day_of_week" => 2,
                 "start_time" => "12:30:00",
                 "end_time" => "21:15:00",
                 "is_work_day" => 1,],
            [
                 "schedule_week_id" => 12,
                 "day_of_week" => 3,
                 "start_time" => "12:30:00",
                 "end_time" => "21:15:00",
                 "is_work_day" => 1,
             ],
            [
                 "schedule_week_id" => 12,
                 "day_of_week" => 4,
                 "start_time" => "12:30:00",
                 "end_time" => "21:15:00",
                 "is_work_day" => 1,],
            [
                 "schedule_week_id" => 12,
                 "day_of_week" => 5,
                 "start_time" => "12:30:00",
                 "end_time" => "21:15:00",
                 "is_work_day" => 1,],
            [
                 "schedule_week_id" => 12,
                 "day_of_week" => 6,
                 "start_time" => "08:00:00",
                 "end_time" => "16:00:00",
                 "is_work_day" => 0,],
            [
                 "schedule_week_id" => 12,
                 "day_of_week" => 7,
                 "start_time" => "08:00:00",
                 "end_time" => "16:00:00",
                 "is_work_day" => 0,
             ],
         ];

        // Dla każdego tygodnia utwórz domyślne zmiany
        $j = 0;
        foreach ($schedule->weeks as $week) {
            $scheduleShiftsData = [];
            for ($i = 1; $i <= 7; $i++) {
                $scheduleShiftsData[] = [
                    'day_of_week' => $scheduleWorkShifts[$j]['day_of_week'],
                    'start_time' => $scheduleWorkShifts[$j]['start_time'],
                    'end_time' => $scheduleWorkShifts[$j]['end_time'],
                    'is_work_day' => $scheduleWorkShifts[$j]['is_work_day'],
                ];
                $j++;
            }
            $week->workShifts()->createMany($scheduleShiftsData);
        }
    }
}
