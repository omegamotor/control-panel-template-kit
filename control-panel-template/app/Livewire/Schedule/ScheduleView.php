<?php

namespace App\Livewire\Schedule;

use App\Models\Schedule;
use App\Traits\FilterTrait;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Collection;

class ScheduleView extends Component
{
    use FilterTrait;

    protected $queryString = [
        'selectedSchedule' => ['except' => '', 'as' => 'sSed'],
        'scheduleSelect' => ['except' => '', 'as' => 'sS'],
        'currentWeek' => ['except' => '', 'as' => 'cW'],
    ];

    // For save Filters (Trait Need this)
    private $filterSaveData = [
        'scheduleSelect' => 'schedule_work_schift-scheduleSelect',
        'selectedSchedule' => 'schedule_work_schift-selectedSchedule',
        'currentWeek' => 'schedule_work_schift-currentWeek',
    ];
    // --------------------------------------

    public $schedules;
    public $scheduleSelect;
    public $selectedSchedule; // Właściwość do przechowywania załadowanego modelu
    public $currentWeek = 1;

    public function updatedScheduleSelect($value){
        $this->loadSelectedSchedule();
    }

    public function loadSelectedSchedule(){
        $this->selectedSchedule = Schedule::find($this->scheduleSelect);
        $this->dispatch('edit-schedule-work-shift-modal-open', $this->scheduleSelect);

        $startDate = Carbon::parse($this->selectedSchedule->start_date);

        // Ustawienie bieżącej daty
        $now = Carbon::now();

        // Obliczenie różnicy w tygodniach
        $weeksDifference = $startDate->diffInWeeks($now);
        $this->currentWeek = $weeksDifference + 1;

        $this->dispatch('schedule-selected-change', $this->selectedSchedule, $this->currentWeek);
    }

    public function render(){
        $this->schedules = Schedule::all();
        if($this->schedules->isNotEmpty()){
            $this->scheduleSelect = $this->scheduleSelect ?? $this->schedules[0]->id;
            $this->loadSelectedSchedule();
        }

        return view('livewire.schedule.schedule-view', [
            'schedules' => $this->schedules
        ]);
    }
}
