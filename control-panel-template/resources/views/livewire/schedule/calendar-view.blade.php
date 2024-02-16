<div class="mb-3">
    <div class="my-3 d-flex flex-wrap" style="align-items: baseline">
       {{-- <label for="calendarViewYearSelect" class="form-label mr-2">Rok: </label>
       <select wire:model.lazy="year" class="form-select form-select-sm mr-2" id="calendarViewYearSelect">
            @foreach ($years as $year)
                <option value="{{$year}}">{{$year}}</option>
            @endforeach
       </select> --}}

       <label for="calendarViewMonthSelect" class="form-label mr-2">Miesiąc: </label>
       <select wire:model.lazy="month" class="form-select form-select-sm mr-2" id="calendarViewMonthSelect">
           @foreach ($months as $month)
                <option value="{{ $loop->iteration }}">{{$month}}</option>
           @endforeach

       </select>
    </div>

    <div class="">
        {{-- <h3>Dzisiaj jest: {{$today['date']}}</h3> --}}

        <div class="shadow p-2 mt-3 calendar-current-day">
            {{-- <h4>Wybrany dzień: {{$selectDay['day']}}</h4>
            <p>Status:</p>
            <p>Od:</p>
            <p>Do:</p> --}}
            <div class="calendar-current-day-title-month">
                {{$selectDay['month']}}
            </div>
            <div class="calendar-current-day-day-nr">
                {{$selectDay['dayNr']}}
            </div>
            <div class="calendar-current-day-day-title">

                <div class="calendar-current-day-day-title">
                    {{$selectDay['dayString']}}
                </div>
                <div class="calendar-current-day-day-title">
                    @if ($selectDay['isWorkDay'])
                        @if($selectDay['workShift'] == 'day')
                            <i class="fa-solid fa-sun text-warning"></i> Dniówka
                        @elseif($selectDay['workShift'] == 'night')
                        <i class="fa-solid fa-moon text-secondary"></i> Nocka
                        @endif
                    @else
                        <i class="fa-solid fa-house text-success"></i> Wolne
                    @endif
                </div>
                <div class="calendar-current-day-day-title">
                    @if ($selectDay['isWorkDay']) {{$selectDay['workHour']}} @endif
                </div>

            </div>
        </div>
    </div>

    <div class="calendar" wire:loading.remove>
        <div class="month-year">
            <span class="month">{{$monthStr}}</span>
            <span class="year">{{$year}}</span>
        </div>

        <div class="days" >
            @foreach ($dayLabels as $label)
                <span class="day-label">{{$label}}</span>
            @endforeach

            @foreach ($prevMonthDays as $day)
                <span class="day dull">
                    <span class="content">{{$day['number']}}</span>
                </span>
            @endforeach

            @foreach ($setMonthDays as $day)
                <span
                    wire:click="showDataForDay('{{ json_encode($day) }}','true')"
                    class="day @if($day['today']) today @endif
                    @if($day['isWorkDay'] && $day['shiftType'] == 'night') night-shift @endif
                    @if($day['isWorkDay'] && $day['shiftType'] == 'day') day-shift @endif"
                    title="Tydzień: {{$day['week']}} @if($day['isWorkDay']) Od: {{$day['startWork']}} Do: {{$day['endWork']}} @if($day['shiftType'] == 'night') Nocka @endif @if($day['shiftType'] == 'day') Dniówka @endif @endif"
                >
                    <span class="content">
                        {{$day['number']}}
                    </span>
                </span>
            @endforeach

            @foreach ($nextMonthDays as $day)
                <span class="day dull">
                    <span class="content">{{$day['number']}}</span>
                </span>
            @endforeach
        </div>
    </div>
    <div class="calendar" style="width: 410px; height:295px; padding:16px; margin:16px" wire:loading>
        @livewire('components.loading')
    </div>
</div>
