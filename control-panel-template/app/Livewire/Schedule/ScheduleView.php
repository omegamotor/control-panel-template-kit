<?php

namespace App\Livewire\Schedule;

use App\Models\Schedule;
use App\Traits\FilterTrait;
use Carbon\Carbon;
use Livewire\Component;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Response;
use Maatwebsite\Excel\Facades\Excel;

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
    public $scheduleSelect; // ID
    public $selectedSchedule; // Właściwość do przechowywania załadowanego modelu
    public $currentWeek = 1;
    public $currentDay = 1;

    public $weekDays = [
        'Poniedziałek',
        'Wtorek',
        'Środa',
        'Czwartek',
        'Piatek',
        'Sobota',
        'Niedziela',
    ];

    public function updatedScheduleSelect($value){
        $this->loadSelectedSchedule();
    }

    public function loadSelectedSchedule(){
        $this->selectedSchedule = Schedule::find($this->scheduleSelect);
        $this->dispatch('edit-schedule-work-shift-modal-open', $this->scheduleSelect);

        $startDate = Carbon::parse($this->selectedSchedule->start_date);

        // Ustawienie bieżącej daty
        $now = Carbon::now();
        $this->currentDay = ($now->dayOfWeek + 6) % 7;

        // Obliczenie różnicy w tygodniach
        $weeksDifference = $startDate->diffInWeeks($now);
        $this->currentWeek = $weeksDifference + 1;

        $this->dispatch('schedule-selected-change', $this->selectedSchedule, $this->currentWeek);
    }

    public function export($file){
        // dd($this->selectedSchedule);
        // $scheduleExport = new ScheduleExport($this->selectedSchedule);
        $fileName = 'Harmonogram Pracy ' . $this->selectedSchedule->title . ' - ' . date('d-m-Y') . '.' . $file;
        // $data = ['schedule' => $scheduleExport];
        $data = [
            'schedule' => $this->selectedSchedule,
            'weekDays' => $this->weekDays,

        ];

        abort_if(!in_array($file,['csv', 'xlsx', 'pdf']), Response::HTTP_NOT_FOUND);

        if($file == 'pdf'){
            $pdf = PDF::loadView('pdf/schedule-pdf', $data);
            $pdf->output();
            $domPdf = $pdf->getDomPDF();
            $canvas = $domPdf->get_canvas();
            $canvas->page_text(10, 10, "Strona {PAGE_NUM} z {PAGE_COUNT}", null, 10, [0, 0, 0]);
            return response()->streamDownload(function() use ($pdf){
                echo $pdf->stream();
            }, $fileName);

        }else if($file == 'xlsx'){
            // return Excel::download($scheduleExport, $fileName);
        }
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
