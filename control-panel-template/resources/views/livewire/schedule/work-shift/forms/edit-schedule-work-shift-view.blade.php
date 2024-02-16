<div>
    <!-- Button trigger modal -->
    <div class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#editScheduleWorkShiftModal">
        <i class="fa-solid fa-pen-to-square"></i> Edytuj zmiany
    </div>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="editScheduleWorkShiftModal" tabindex="-1" aria-labelledby="editScheduleWorkShiftModalLabel" aria-hidden="true">
        <form wire:submit.prevent="editWorkSchifts">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editScheduleWorkShiftModalLabel">Edytuj zmiany: @if($schedule) {{$schedule->title}} @endif</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="d-flex flex-wrap justify-content-evenly">
                            @if ($schedule)
                                @foreach ($schedule->weeks as $week)
                                    <table class="table table-sm table-bordered mb-3" style="width:350px;" id="dataTable" width="100%" cellspacing="0">
                                        <thead class="table-secondary">
                                            <tr>
                                                <th>Tydzień nr {{$week->week_number}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($week->workShifts as $workShift)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="btn btn-sm btn-outline-primary @if($workShifts[$week->id][$workShift->id]['is_work_day']) active @endif" style="width: 100px" wire:click="selectDay('{{$week->id}}', '{{$workShift->id}}', '{{$workShifts[$week->id][$workShift->id]['is_work_day']}}')">
                                                                {{$days[$workShift->day_of_week - 1]}}
                                                            </div>
                                                            @if ($workShifts[$week->id][$workShift->id]['is_work_day'])
                                                                <div class="d-flex align-items-center mx-2">
                                                                    <div>
                                                                        <input type="time" name="" wire:model="workShifts.{{$week->id}}.{{$workShift->id}}.start_time" value="{{$workShift->start_time}}" id="work-shift-start-{{$workShift->id}}" class="form-control form-control-sm">
                                                                    </div>
                                                                    <div>
                                                                        <input type="time" name="" wire:model="workShifts.{{$week->id}}.{{$workShift->id}}.end_time" value="{{$workShift->end_time}}" id="work-shift-end-{{$workShift->id}}" class="form-control form-control-sm">
                                                                    </div>
                                                                </div>
                                                            @else
                                                                <div style="width: 167px; text-aligin:center">
                                                                    Wolne
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @endforeach
                            @else
                                @livewire('components.no-data-content')
                            @endif

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" wire:click='cancel()' class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Zamknij</button>
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa-solid fa-check"></i> Zapisz</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

</div>
