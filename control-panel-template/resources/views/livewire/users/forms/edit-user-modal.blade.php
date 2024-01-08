<div wire:ignore.self class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <form wire:submit.prevent="edit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editUserModalLabel">Edytuj użytkownika</h5>
                    <button type="button" wire:click='cancel()' class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if ($user)
                        <div class="mb-3">
                            <label for="inputName" class="form-label">Nazwa użytkownika</label>
                            <input wire:model="name" type="text" class="form-control" id="inputName" required>
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="inputEmail" class="form-label">Email</label>
                            <input wire:model="email" type="email" class="form-control" id="inputEmail" required>
                            @error('email') <span class="text-danger"> {{ $message }}</span> @enderror
                        </div>
                    @else
                        <livewire:components.loading >
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" wire:click='cancel()' class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Zamknij</button>
                    <button type="submit" class="btn btn-sm btn-primary"><i class="fa-solid fa-check"></i> Zapisz</button>
                </div>
            </div>
        </div>
    </form>
</div>
