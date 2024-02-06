<div>
    <!-- Button trigger modal -->
    <div type="button" class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#createNewDirectoryModal">
        <i class="fa-solid fa-folder-plus"></i> Nowy folder
    </div>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="createNewDirectoryModal" tabindex="-1" aria-labelledby="createNewDirectoryModalLabel" aria-hidden="true">
        <form wire:submit.prevent="createFolder">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createNewDirectoryModalLabel">Dodaj nowy Folder</h5>
                        <button type="button" wire:click='cancel()' class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="fileName" class="form-label custom-file-input">Nazwa</label>
                            <input wire:model="fileName" type="text" placeholder="folder" class="form-control" id="inputFileName" autocomplete="off" required>
                            @error('fileName') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" wire:click='cancel()' class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Zamknij</button>
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa-solid fa-check"></i> Utwórz</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
