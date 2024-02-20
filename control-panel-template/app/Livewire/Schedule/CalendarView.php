<?php

namespace App\Livewire\Schedule;

use App\Models\Schedule;
use Carbon\Carbon;
use Exception;
use Livewire\Component;
use Livewire\Attributes\On;

class CalendarView extends Component
{

    public $year;
    public $month;
    public $monthStr;
    public $dayLabels = ['Pon.', 'Wt.', 'Śr.', 'Czw.', 'Pt.', 'Sob.', 'Niedz.'];
    public $prevMonthDays = [];
    public $setMonthDays = [];
    public $nextMonthDays = [];
    public $currentWeek;

    public $currentWeekNr;
    public $selectedSchedule;

    public $today;
    public $selectDay = [
        'date' => '2024-02-14',
        'month' => 'Luty',
        'dayNr' => '14',
        'dayString' => 'Piątek',
        'workHour' => '8:00 - 16:00',
        'workShift' => 'day',
        'isWorkDay' => false,
    ];

    public $months = [
        'Styczeń',
        'Luty',
        'Marzec',
        'Kwiecień',
        'Maj',
        'Czerwiec',
        'Lipiec',
        'Sierpień',
        'Wrzesień',
        'Październik',
        'Listopad',
        'Grudzień',
    ];

    public $years = [];

    public function calendar($date = null)
    {
        $date = empty($date) ? Carbon::now() : Carbon::createFromDate($date);

        $this->year = $date->format('Y');
        $this->month = intval(ucfirst($date->isoFormat('MM')));
        $this->monthStr = ucfirst($date->isoFormat('MMMM'));

        $startOfCalendar = $date->copy()->firstOfMonth()->startOfWeek(Carbon::MONDAY);
        $endOfCalendar = $date->copy()->lastOfMonth()->endOfWeek(Carbon::SUNDAY);

        $this->reset('prevMonthDays', 'setMonthDays' ,'nextMonthDays');

        while($startOfCalendar <= $endOfCalendar)
        {
            if($startOfCalendar->format('m') == $date->format('m')){
                $this->setMonthDays[] =
                [
                    'fullDate' => $startOfCalendar->format('d-m-Y'),
                    'number' => $startOfCalendar->format('j'),
                    'today' => $startOfCalendar->isToday() ? true : false,
                ];
            }else if($startOfCalendar->format('j') < 10){
                $this->nextMonthDays[] = [
                    'fullDate' => $startOfCalendar->format('d-m-Y'),
                    'number' => $startOfCalendar->format('j'),
                ];
            }else{
                $this->prevMonthDays[] = [
                    'fullDate' => $startOfCalendar->format('d-m-Y'),
                    'number' => $startOfCalendar->format('j'),
                ];
            }

            $startOfCalendar->addDay();
        }
    }


    public function mount($selectedSchedule, $currentWeekNr){
        $this->updateCalendarData($selectedSchedule, $currentWeekNr);
    }

    #[On('schedule-selected-change')]
    public function updateCalendarData(Schedule $selectedSchedule, $currentWeekNr){

        $this->calendar();

        $this->currentWeekNr = $currentWeekNr;
        $this->selectedSchedule = $selectedSchedule;

        $this->setCalendarData($currentWeekNr, $selectedSchedule);
    }

    public function setCalendarData($currentWeekNr, $selectedSchedule){
        // $currentWeekNr +=12;
        // Dzisiejsza data
        $this->today['date'] = explode('T', Carbon::today()->toDateTimeLocalString())[0];

        // Dzisiejszy dzień tygodnia
        $this->today['dayOfWeek'] = Carbon::today()->dayOfWeek;
        $this->today['currentWeekNr'] = $currentWeekNr;

        // Sprawdzenie jaki jest aktualnie tydzień
        $schedule =  $selectedSchedule;


        $scheduleWeeksCount = $schedule->weeks()->count();


        // Jeśli to aktualny tydzień
        if($currentWeekNr > $scheduleWeeksCount){
            $p = intdiv($currentWeekNr, $scheduleWeeksCount);
            $b = $currentWeekNr / $scheduleWeeksCount;
            $h = $b - $p;
            if($b - $p == 0){
                $h = 1;
            }
            $currentWeekNr = $h * $scheduleWeeksCount;
        }


        // Wyciągnij aktualny tydzień
        $currentWeek = $schedule->weeks()->where('week_number', $currentWeekNr)->first();


        // Wyciągnięcie wszystkuch dni aktualnego tygodnia
        $curentWorkShifts = $currentWeek->workShifts;

        $i = 0;
        foreach($this->setMonthDays as $day){
            $weekOfYear1 = Carbon::parse($day['fullDate'])->weekOfYear;
            $weekOfYear2 = Carbon::now()->weekOfYear;

            $this->setMonthDays[$i]['weeksDifference'] = ($weekOfYear2 - $weekOfYear1) * -1;
            $this->setMonthDays[$i]['dayOfWeek'] = Carbon::parse($day['fullDate'])->dayOfWeek;

            // Według standartu system liczy pierwszy tydzień nowego roku
            // tam gdzie czwartek jest w styczniu przez co ostatni tydzień grudnia może uznawać za 1
            // tydzień nowego roku.

            // Prowadzi to do błędu przez który weekOfYear1 zamiast ustawić na
            // np. 54 dla niedzieli ustawia 1 i system sie sypie
            // Jeśli tydzień roku jest mniejszy od 2 a występuje grudzień
            if($weekOfYear1 < 2 && intval(substr($day['fullDate'], 3, 5)) == 12){
                // Jeśli aktualny dzień to poniedziałek wczytaj poprzedni numer tygodnia i dodaj 1
                if($this->setMonthDays[$i]['dayOfWeek'] == 1){
                    $this->setMonthDays[$i]['weeksDifference'] = $this->setMonthDays[$i - 1]['weeksDifference'] + 1;
                }else{
                    $this->setMonthDays[$i]['weeksDifference'] = $this->setMonthDays[$i - 1]['weeksDifference'];
                }
            }
            $i++;
        }



        $i = 0;

        // Dla każdego dnia aktualnego miesiąca
        foreach ($this->setMonthDays as $day) {
            $weekDifference = $this->setMonthDays[$i]['weeksDifference'];
            $dayOf = $this->getDayOf($day);

            // Jeśli to aktualny tydzień
            if($weekDifference === 0){
                $this->fillMonthDaysArray($i, $currentWeekNr, $curentWorkShifts[$dayOf]->getstarttime(), $curentWorkShifts[$dayOf]->getendtime(),$curentWorkShifts[$dayOf]['is_work_day']);
            }
            // Jeśli to następny albo poprzedni tydzień
            else{
                // Daty póżniejsze
                if ($weekDifference > 0) {
                    $weekNrForThisDay = $weekDifference + $currentWeekNr;
                    // Daty ponad wielokrotność tygodni harmonogramu
                    if($weekNrForThisDay > $scheduleWeeksCount){
                        // Ile razy numer aktualnego tygodnia zmieści się w liczbie max tygodni dla harmonogramu
                        $p = intdiv($weekNrForThisDay, $scheduleWeeksCount);

                        // zawsze $b > 1
                        // + 1 bo jeśli wyjdzie 0 np. 5/5 - 5*1, 10/5 - 5*2 wyjdzie bład
                        $b = $weekNrForThisDay / $scheduleWeeksCount;

                        // Wymnóż ilość ponad normę
                        $h = $b - $p;
                        if($b - $p == 0){
                            $h = 1;
                        }

                        // $weekNrForThisDay = $h * $scheduleWeeksCount + 1;
                        $weekNrForThisDay = $h * $scheduleWeeksCount;
                    }

                    if($schedule->weeks()->where('week_number', $weekNrForThisDay)->first()){
                        $curentWorkShiftsX = $schedule->weeks()->where('week_number', $weekNrForThisDay)->first()->workShifts;

                        $this->fillMonthDaysArray(
                            $i,
                            $weekNrForThisDay,
                            $curentWorkShiftsX[$dayOf]->getstarttime(),
                            $curentWorkShiftsX[$dayOf]->getendtime(),
                            $curentWorkShiftsX[$dayOf]['is_work_day'],
                        );
                    }else{
                        $this->setDayCalendarError($i, $weekNrForThisDay);
                    }
                }
                // Daty wcześniejsze $weekDifference < 0 // -1, -10, -15
                else{
                    $weekNrForThisDay = $currentWeekNr + $weekDifference;
                    // x = 3 + (-7) albo x = 3 + (-2)

                    // Sprawdź czy mieści się w przedziale tygodni
                    // Jeśli tak
                    if($weekNrForThisDay < 1){
                        // zapisz nowy numer tygodnia
                        $weekNrForThisDay = $scheduleWeeksCount + $weekNrForThisDay;

                    }else if($weekNrForThisDay > $scheduleWeeksCount){
                        // Ile razy numer aktualnego tygodnia zmieści się w liczbie max tygodni dla harmonogramu

                        // Ile razy numer aktualnego tygodnia zmieści się w liczbie max tygodni dla harmonogramu
                        $p = intdiv($weekNrForThisDay, $scheduleWeeksCount);

                        // zawsze $b > 1
                        // + 1 bo jeśli wyjdzie 0 np. 5/5 - 5*1, 10/5 - 5*2 wyjdzie bład
                        $b = $weekNrForThisDay / $scheduleWeeksCount;

                        // Wymnóż ilość ponad normę
                        $h = $b - $p;
                        if($b - $p == 0){
                            $h = 1;
                        }

                        $weekNrForThisDay = $h * $scheduleWeeksCount;
                        // x = (10/5 -2) * 10
                    }

                    if($schedule->weeks()->where('week_number', $weekNrForThisDay)->first()){
                        $curentWorkShiftsX = $schedule->weeks()->where('week_number', $weekNrForThisDay)->first()->workShifts;

                        $this->fillMonthDaysArray(
                            $i,
                            $weekNrForThisDay,
                            $curentWorkShiftsX[$dayOf]->getstarttime(),
                            $curentWorkShiftsX[$dayOf]->getendtime(),
                            $curentWorkShiftsX[$dayOf]['is_work_day'],
                            'Daty wcześniejsze'
                        );
                    }else{
                        // Bład
                        $this->setDayCalendarError($i, $weekNrForThisDay);
                    }
                }
            }

            if($this->setMonthDays[$i]['today']){
                $this->showDataForDay($this->setMonthDays[$i]);
            }

            $i++;
        }
    }

    public function getDayOf($day){
        $dayOf = Carbon::parse($day['fullDate'])->dayOfWeek;
        $dayOf = ($dayOf + 6) % 7;
        return $dayOf;
    }

    public function setDayCalendarError($i, $weekNrForThisDay){
        $this->fillMonthDaysArray(
            $i,
            $weekNrForThisDay,
            'Bład',
            'Bład',
            'Bład'
        );
    }

    public function fillMonthDaysArray($i, $week = 0, $startWork = 0, $endWork = 0, $isWorkDay = 'day', $test = ''){
        $this->setMonthDays[$i]['week'] = $week;
        $this->setMonthDays[$i]['startWork'] = $startWork;
        $this->setMonthDays[$i]['endWork'] = $endWork;
        $this->setMonthDays[$i]['isWorkDay'] = $isWorkDay;
        $this->setMonthDays[$i]['test'] = $test;

        // Sprawdź rodzaj zmiany
        if(explode(':', $startWork)[0] >= 21 || explode(':', $startWork)[0] < 7){
            $this->setMonthDays[$i]['shiftType'] = 'night';
        }else{
            $this->setMonthDays[$i]['shiftType'] = 'day';
        }
    }

    public function showDataForDay($day){
        if(getType($day) === 'string'){
            $day = json_decode($day, true);
        }

        $date = Carbon::createFromDate($day['fullDate']);
        $this->selectDay = [
            'date' => $day['fullDate'],
            'month' => ucfirst($date->isoFormat('MMMM')),
            'dayNr' => $day['number'],
            'dayString' => ucfirst($date->isoFormat('dddd')),
            'workHour' => $day['startWork'] . ' - ' . $day['endWork'],
            'workShift' => $day['shiftType'],
            'isWorkDay' => $day['isWorkDay'],
        ];

    }

    public function updatedMonth(){$this->newDateSelected();}
    public function updatedYear(){$this->newDateSelected();}

    public function newDateSelected(){
        $date = $this->year . '-' . $this->month . '-01';
        $date = empty($date) ? Carbon::now() : Carbon::createFromDate($date);
        $this->calendar($date);
        $this->setCalendarData($this->currentWeekNr, $this->selectedSchedule);
    }

    public function render(){
        return view('livewire.schedule.calendar-view');
    }
}
