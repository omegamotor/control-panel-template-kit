<div>
    <div class="card shadow mb-4" >
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Dodaj plik</h6>
        </div>
        <div class="card-body">
            <div class="my-3 d-flex" style="align-items: baseline">
                <div class="my-3" style="align-items: baseline">
                    <form wire:submit.prevent="uploadFile" class="d-flex gap-3">
                        <input type="file" name="" wire:model='file' id="" required>
                        @error('file') <span class="text-danger">{{ $message }}</span> @enderror
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa-solid fa-upload"></i> Zapisz</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
