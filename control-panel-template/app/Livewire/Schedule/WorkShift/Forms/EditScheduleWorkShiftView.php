<?php

namespace App\Livewire\Schedule\WorkShift\Forms;

use App\Models\Schedule;
use App\Models\ScheduleWorkShift;
use Livewire\Component;
use Livewire\Attributes\On;

class EditScheduleWorkShiftView extends Component
{
    public $schedule;
    // public $days =  ['Pon', 'Wt.', 'Śr.', 'Czw.', 'Pt.', 'Sob.', 'Niedz.'];
    public $days =  ['Poniedziałek', 'Wtorek', 'Środa', 'Czwartek', 'Piątek', 'Sobota', 'Niedziela'];

    public $workShifts = []; // Przechowuje dane zmian pracy

    private function initWorkShiftsData()
    {
        foreach ($this->schedule->weeks as $week) {
            foreach ($week->workShifts as $workShift) {
                $this->workShifts[$week->id][$workShift->id] = [
                    'start_time' => $workShift->start_time,
                    'end_time' => $workShift->end_time,
                    'is_work_day' => $workShift->is_work_day ? 1 : 0,
                ];
            }
        }
    }

    public function selectDay($weekId, $shiftId, $set){
        $this->workShifts[$weekId][$shiftId]['is_work_day'] = !$set;
    }

    public function mount($selectedSchedule = null){
        if($selectedSchedule){
            $this->schedule = $selectedSchedule;
        }else{
            $this->schedule = Schedule::get()->first();
        }
        $this->initWorkShiftsData();
    }

    #[On('edit-schedule-work-shift-modal-open')]
    public function loadSchedule($scheduleId)
    {
        $this->schedule = Schedule::find($scheduleId);
        $this->initWorkShiftsData();
    }

    public function editWorkSchifts()
    {
        foreach ($this->workShifts as $weekId => $shifts) {
            foreach ($shifts as $shiftId => $shiftData) {
                $workShift = ScheduleWorkShift::find($shiftId);
                $workShift->update([
                    'start_time' => $shiftData['start_time'],
                    'end_time' => $shiftData['end_time'],
                    'is_work_day' => $shiftData['is_work_day'],
                ]);
            }
        }

        $type = 'SUCCESS';
        $message = 'Zmiany zostały zapisane.';

        session()->flash('alert-type', $type);
        session()->flash('message', $message);

        return redirect()->route('schedule.view');
    }

    public function render()
    {
        return view('livewire.schedule.work-shift.forms.edit-schedule-work-shift-view');
    }
}
