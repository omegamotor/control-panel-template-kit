<div>
    <!-- Button trigger modal -->
    <div type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#createScheduleModal">
        <i class="fa-regular fa-calendar-plus"></i> Dodaj Harmonogram
    </div>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="createScheduleModal" tabindex="-1" aria-labelledby="createScheduleModalLabel" aria-hidden="true">
        <form wire:submit.prevent="createSchedule">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createScheduleModalLabel">Dodaj harmonogram</h5>
                        <button type="button" wire:click='cancel()' class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="inputScheduleTitle" class="form-label">Nazwa harmonogramu</label>
                            <input wire:model="title" type="text" class="form-control" id="inputScheduleTitle" required>
                            @error('title') <span class="text-danger"> {{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="inputScheduleCycleLength" class="form-label">Długość cyklu w tygodniach</label>
                            <input wire:model="cycleLength" type="number" class="form-control" id="inputScheduleCycleLength" max="50" min="1" required>
                            @error('cycleLength') <span class="text-danger"> {{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="inputScheduleCurentCycle" class="form-label">Aktualny tydzień cyklu</label>
                            <input wire:model="curentCycle" type="number" class="form-control" id="inputScheduleCurentCycle" max="50" min="1" required>
                            @error('curentCycle') <span class="text-danger"> {{ $message }}</span> @enderror
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" wire:click='cancel()' class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Zamknij</button>
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa-solid fa-check"></i> Dodaj</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
