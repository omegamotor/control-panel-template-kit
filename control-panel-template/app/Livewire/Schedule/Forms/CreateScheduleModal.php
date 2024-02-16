<?php

namespace App\Livewire\Schedule\Forms;

use App\Models\Schedule;
use Carbon\Carbon;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateScheduleModal extends Component
{
    #[Validate('required|string|max:255|unique:schedules', 'Nazwa harmonogramu')]
    public $title;

    #[Validate('required|int|max:50', 'Ilość tygodni w cyklu')]
    public $cycleLength;

    #[Validate('required|int', 'Aktualny tydzień cyklu')]
    public $curentCycle;

    public function createSchedule()
    {
        $validatedData = $this->validate();
        $startDate = Carbon::today()
            ->subWeek($this->curentCycle - 1)
            ->startOfWeek()
            ->toDateString();

        $schedule = Schedule::create([
            'title' => $validatedData['title'],
            'cycle_length' => $validatedData['cycleLength'],
            'start_date' => $startDate,
        ]);

        // Utwórz tygodnie dla harmonogramu
        $scheduleWeeksData = [];
        for ($i = 1; $i <= $schedule->cycle_length; $i++) {
            $scheduleWeeksData[] = ['week_number' => $i];
        }

        $schedule->weeks()->createMany($scheduleWeeksData);
        // Dla każdego tygodnia utwórz domyślne zmiany
        foreach ($schedule->weeks as $week) {
            $scheduleShiftsData = [];
            for ($i = 1; $i <= 7; $i++) {
                $scheduleShiftsData[] = [
                    'day_of_week' => $i,
                    'start_time' => '08:00',
                    'end_time' => '16:00',
                    'is_work_day' => in_array($i, [6,7]) ? false : true,
                ];
            }
            $week->workShifts()->createMany($scheduleShiftsData);
        }

        if($schedule){
            $message = "Harmonogram zosał dodany!";
            $type = "SUCCESS";

        }else{
            $message = "Podczas dodawania harmonogramu wystąpił błąd!";
            $type = "ERROR";
        }

        session()->flash('alert-type', $type);
        session()->flash('message', $message);

        return redirect()->route('schedule.view');
    }

    public function cancel()
    {
        $this->reset('title', 'cycleLength', 'curentCycle');
    }


    public function render()
    {
        return view('livewire.schedule.forms.create-schedule-modal');
    }
}
