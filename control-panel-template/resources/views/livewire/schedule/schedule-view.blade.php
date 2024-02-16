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
            <div class="d-flex flex-wrap gap-1">
                @livewire('schedule.forms.create-schedule-modal')
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
                <div class="">
                    Tydzień {{$currentWeek}} / {{$selectedSchedule->cycle_length}}
                    <p>Plan zaczął się: {{$selectedSchedule->start_date}}</p>
                </div>

                @livewire('schedule.work-shift.forms.edit-schedule-work-shift-view', ['selectedSchedule' => $selectedSchedule])
                <div class="d-flex flex-wrap justify-content-evenly">
                    <div class="">
                        <livewire:schedule.calendar-view  :selectedSchedule="$selectedSchedule" :currentWeekNr="$currentWeek" />
                    </div>
                    <div class="">
                        @if($selectedSchedule->weeks)
                            @foreach ($selectedSchedule->weeks as $week)
                                <h2 class="mb-3" style="font-size: 1.5rem;">
                                    Tydzień nr {{$week->week_number}}
                                    @if ($week->week_number == $currentWeek)
                                    - Aktualny tydzień
                                    @endif
                                </h2>
                                <table class="table table-bordered mb-3" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="@if ($week->week_number == $currentWeek) table-primary @else table-secondary @endif">
                                        <tr>
                                            <th>Poniedziałek</th>
                                            <th>Wtorek</th>
                                            <th>Środa</th>
                                            <th>Czwartek</th>
                                            <th>Piątek</th>
                                            <th>Sobota</th>
                                            <th>Niedziela</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            @foreach ($week->workShifts as $workShift)
                                                <td>
                                                    @if ($workShift->is_work_day)
                                                        {{$workShift->getStartTime()}} - {{$workShift->getEndTime()}}
                                                    @else
                                                        Wolne
                                                    @endif
                                                </td>
                                            @endforeach
                                        </tr>

                                    </tbody>
                                </table>
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
