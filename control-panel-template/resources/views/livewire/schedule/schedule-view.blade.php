<div>
    {{-- Modals --}}
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Harmonogram pracy</h1>
    </div>

    @livewire('components.alert')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Opcje</h6>
        </div>
        <div class="card-body">
           <div class="my-3 d-flex flex-wrap" style="align-items: baseline">
                <label for="scheduleViewScheduleSelect" class="form-label mr-2">Harmonogram: </label>
                <select wire:model.lazy="scheduleSelect" class="form-select form-select-sm mr-2" id="scheduleViewScheduleSelect">
                    @foreach ($schedules as $schedule)
                        <option value="{{$schedule->id}}">{{$schedule->title}}</option>
                    @endforeach
                </select>
            </div>
            @if ($selectedSchedule)
                <div>
                    Tydzień {{$currentWeek}} / {{$selectedSchedule->cycle_length}}
                    <p>Plan zaczął się: {{$selectedSchedule->start_date}}</p>
                </div>
            @endif
            <div class="d-flex flex-wrap gap-1">
                @livewire('schedule.forms.create-schedule-modal')
                @if ($selectedSchedule)
                    @livewire('schedule.work-shift.forms.edit-schedule-work-shift-view', ['selectedSchedule' => $selectedSchedule])

                    <div class="btn btn-sm btn-secondary btn-icon-split" wire:click="export('pdf')" wire:loading.attr='disabled'>
                        <span class="icon">
                            <i class="fa-solid fa-file-pdf"></i>
                        </span>
                        <span class="text">PDF</span>
                    </div>

                    {{-- <div class="btn btn-sm btn-success btn-icon-split" wire:click="export('xlsx')" wire:loading.attr='disabled'>
                        <span class="icon">
                            <i class="fa-solid fa-file-excel"></i>
                        </span>
                        <span class="text">XLSX</span>
                    </div> --}}
                @endif
            </div>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Harmonogram @if($selectedSchedule) - {{$selectedSchedule->title}}  @endif</h6>
        </div>
        <div class="card-body">
            @if($selectedSchedule)
                <div class="d-flex flex-wrap justify-content-evenly">
                    <div>
                        <livewire:schedule.calendar-view  :selectedSchedule="$selectedSchedule" :currentWeekNr="$currentWeek" />
                    </div>
                    <div class="d-flex flex-wrap gap-3 justify-content-evenly schedule-weeks-table-div">
                        @if($selectedSchedule->weeks)
                            @foreach ($selectedSchedule->weeks as $week)
                                <div class="week-table">
                                    <table class="table table-bordered mb-3" id="dataTable" width="100%" cellspacing="0">
                                        <thead >
                                            <tr>
                                                <th colspan="2" class="
                                                @if ($week->week_number == $currentWeek)
                                                    week-table__th-active
                                                @else
                                                    week-table__th
                                                @endif ">
                                                    Tydzień nr {{$week->week_number}}@if ($week->week_number == $currentWeek)- Aktualny tydzień @endif
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($week->workShifts as $workShift)
                                                <tr>
                                                    <td class="@if($week->week_number == $currentWeek && $currentDay == $loop->index) day-today-table-calendar  @endif">
                                                        {{$weekDays[$loop->index]}}
                                                    </td>
                                                    <td class="@if($week->week_number == $currentWeek && $currentDay == $loop->index) day-today-table-calendar  @endif">
                                                        <div class="calendar-current-day-day-title">
                                                            @if ($workShift->is_work_day)
                                                                @if(intval($workShift->getStartTime()) > 7)
                                                                    <i class="fa-solid fa-sun text-warning"></i> Dniówka
                                                                @else
                                                                    <i class="fa-solid fa-moon text-secondary"></i> Nocka
                                                                @endif

                                                            @else
                                                                <i class="fa-solid fa-house text-success"></i> Wolne
                                                            @endif
                                                        </div>
                                                        <div class="calendar-current-day-day-title">
                                                            @if ($workShift->is_work_day) {{$workShift->getStartTime()}} - {{$workShift->getEndTime()}} @endif
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            @else
                @livewire('components.no-data-content')
            @endif
        </div>
    </div>
</div>
